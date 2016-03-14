---
layout: doc
title: Commands Cookbook
description: The full 101 on writing a command.
category: Guides
quick_links:
  - Overview
  - Anatomy of a Command
  - PHPDoc
  - Distributing
---

Creating your own custom WP-CLI command can be easier than it looks.

## Overview

WP-CLI's goal is to offer a complete alternative to the WordPress admin; for any action you might want to perform in the WordPress admin, there should be an equivalent WP-CLI command. A **command** is an atomic unit of WP-CLI functionality. `wp plugin install` ([doc](/commands/plugin/install/)) is one such command, as is `wp plugin activate` ([doc](/commands/plugin/activate/)). Commands are useful because they can offer simple, precise interfaces for performing complex tasks.

_But_, the WordPress admin is a Swiss Army knife of infinite complexity. There's no way just this project could handle every use case. This is why WP-CLI includes a set of [common internal commands](/commands/), while also offering a rich API for third-parties to register and [distribute their own commands](/package-index/).

### Command types

Internal commands:

* Usually cover functionality offered by a standard install WordPress. There are exceptions to this rule though, notably `wp search-replace` ([doc](/commands/search-replace/)).
* Do not depend on other components such as plugins, themes etc.
* Are maintained by the WP-CLI team.

Third-party commands:

* Can be defined in plugins or themes.
* Can be distributed independent of a plugin or theme in the [Package Index](/package-index/).

## Anatomy of a Command

WP-CLI supports registering any callable class, function, or closure as a command. `WP_CLI::add_command()` ([doc](/docs/internal-api/wp-cli-add-command/)) is used for both internal and third-party command registration.

The **synopsis** of a command defines which **positional** and **associative** arguments a command accepts. Let's take a look at the synopsis for `wp plugin install`:

    $ wp plugin install
    usage: wp plugin install <plugin|zip|url>... [--version=<version>] [--force] [--activate] [--activate-network]

In this example, `<plugin|zip|url>...` is the accepted **positional** argument. In fact, `wp plugin install` accepts the same positional argument (the slug, ZIP, or URL of a plugin to install) multiple times. `[--version=<version>]` is one of the accepted **associative** arguments. It's used to denote the version of the plugin to install. Notice, too, the square brackets around the argument definition; square brackets mean the argument is optional.

WP-CLI also has a [series of **global** arguments](/config/) which work with all commands. For instance, including `--debug` means your command execution will display all PHP errors, and add extra verbosity to the WP-CLI bootstrap process.

### Required arguments

When registering a command, the two required arguments for `WP_CLI::add_command()` are `$name` and `$callable`:

1. `$name` is the command's name within WP-CLI's namespace (e.g. `plugin install` or `post list`).
2. `$callable` is the implementation of the command, as a callable class, function, or closure.

For instance, here are three ways of registering a functionally-equivalent command:

~~~
// 1. Command is a function
function foo_command( $args ) {
    WP_CLI::success( $args[0] );
}
WP_CLI::add_command( 'foo', 'foo_command' );

// 2. Command is a closure
$foo_command = function( $args ) {
    WP_CLI::success( $args[0] );
}
WP_CLI::add_command( 'foo', $foo_command );

// 3. Command is a method on a class
class Foo_Command {
    public function __invoke( $args ) {
        WP_CLI::success( $args[0] );
    }
}
WP_CLI::add_command( 'foo', 'Foo_Command' );
~~~

Importantly, classes behave a bit differently than functions and closures in that:

* Any public methods on a class are registered as subcommands of the command. For instance, given the examples above, a method `bar()` on the class `Foo` would be registered as `wp foo bar`. But...
* `__invoke()` is treated as a magic method. If a class implements `__invoke()`, the command name will be registered to that method and no other methods of that class will be registered as commands.

### Optional arguments

WP-CLI supports two ways of registering optional arguments for your command: through the callable's PHPDoc, or passed as a third `$args` parameter to `WP_CLI::add_command()`.

#### PHPDoc

A typical WP-CLI class looks like this:

~~~
<?php
/**
 * Implements example command.
 */
class Example_Command extends WP_CLI_Command {

	/**
	 * Prints a greeting.
	 *
	 * ## OPTIONS
	 *
	 * <name>
	 * : The name of the person to greet.
	 *
	 * [--type=<type>]
	 * : Whether or not to greet the person with success or error.
	 * ---
	 * default: success
	 * options:
	 *   - success
	 *   - error
	 * ---
	 *
	 * ## EXAMPLES
	 *
	 *     wp example hello Newman
	 *
	 */
	function hello( $args, $assoc_args ) {
		list( $name ) = $args;

		// Print the message with type
		$type = $assoc_args['type'];
		WP_CLI::$type( "Hello, $name!" );
	}
}

WP_CLI::add_command( 'example', 'Example_Command' );
~~~

The command PHPDoc comment has 3 parts:

#### Shortdesc

The shortdesc is the first line in the PHPDoc:

~~~
	/**
	 * Prints a greeting.
~~~

#### Longdesc

The longdesc is middle part of the PHPDoc:

~~~
	 * ## OPTIONS
	 *
	 * <name>
	 * : The name of the person to greet.
	 *
	 * [--type=<type>]
	 * : Whether or not to greet the person with success or error.
	 * ---
	 * default: success
	 * options:
	 *   - success
	 *   - error
	 * ---
	 *
	 * ## EXAMPLES
	 *
	 *     wp example hello Newman
~~~

Options defined in the longdesc are interpreted as the command's **synopsis**:

* `<name>` is a required positional argument.
* `[--type=<type>]` is an optional associative argument which defaults to 'success' and accepts either 'success' or 'error'.

A command's synopsis is used for validating the arguments, before passing them to the implementation.

The longdesc is also displayed when calling the `help` command, for example, `wp help example hello`.

#### Docblock tags

This is the last section and it starts immediately after the longdesc:

~~~
	 * @when before_wp_load
	 */
~~~

Here's the list of defined tags:

`@subcommand`

There are cases where you can't make the method name have the name of the subcommand. For example, you can't have a method named `list`, because `list` is a reserved keyword in PHP.

That's when the `@subcommand` tag comes to the rescue:

~~~
	/**
	 * @subcommand list
	 */
	function _list( $args, $assoc_args ) {
		...
	}

	/**
	 * @subcommand do-chores
	 */
	function do_chores( $args, $assoc_args ) {
		...
	}
~~~

`@alias`

With the `@alias` tag, you can add another way of calling a subcommand. Example:

~~~
	/**
	 * @alias hi
	 */
	function hello( $args, $assoc_args ) {
		...
	}
~~~

~~~
$ wp example hi Joe
Success: Hello, Joe!
~~~

`@when`

This is a special tag that tells WP-CLI when to execute the command. As of WP-CLI 0.11, it only supports a single value:

~~~
@when before_wp_load
~~~

It has no effect if the command using it is loaded from a plugin or a theme, because by that time WordPress itself will have already been loaded.

#### `$args` parameter

Each of the configuration options supported by PHPDoc can instead be passed as the third argument in command registration:

~~~
$hello_command = function( $args, $assoc_args ) {
	list( $name ) = $args;
	$type = $assoc_args['type'];
	WP_CLI::$type( "Hello, $name!" );
}
WP_CLI::add_command( 'example hello', $hello_command, array(
	'shortdesc' => 'Prints a greeting.',
	'synopsis' => array(
		array(
			'type'     => 'positional',
			'name'     => 'name',
			'optional' => false,
			'multiple' => false,
		),
		array(
			'type'     => 'assoc',
			'name'     => 'type',
			'optional' => true,
			'default'  => 'success',
			'options'  => array( 'success', 'error' ),
		),
	),
	'when' => 'before_wp_load',
) );
~~~

### Command internals

Your command can do whatever it wants!

As an example, say you were tasked with finding all unused themes on a multisite network ([#2523](https://github.com/wp-cli/wp-cli/issues/2523)). If you had to perform this task manually through the WordPress admin, it would probably take hours, if not days, of effort. However, if you're familiar with writing WP-CLI commands, you could complete the task in 15 minutes or less.

Here's what such a command looks like:

~~~
/**
 * Find unused themes on a multisite network.
 *
 * Iterates through all sites on a network to find themes which aren't enabled
 * on any site.
 */
$find_unused_themes_command = function() {
	$response = WP_CLI::launch_self( 'site list', array(), array( 'format' => 'json' ), false, true );
	$sites = json_decode( $response->stdout );
	$unused = array();
	$used = array();
	foreach( $sites as $site ) {
		WP_CLI::log( "Checking {$site->url} for unused themes..." );
		$response = WP_CLI::launch_self( 'theme list', array(), array( 'url' => $site->url, 'format' => 'json' ), false, true );
		$themes = json_decode( $response->stdout );
		foreach( $themes as $theme ) {
			if ( 'no' == $theme->enabled && 'inactive' == $theme->status && ! in_array( $theme->name, $used ) ) {
				$unused[ $theme->name ] = $theme;
			} else {
				if ( isset( $unused[ $theme->name ] ) ) {
					unset( $unused[ $theme->name ] );
				}
				$used[] = $theme->name;
			}
		}
	}
	WP_CLI\Utils\format_items( 'table', $unused, array( 'name', 'version' ) );
};
WP_CLI::add_command( 'find-unused-themes', $find_unused_themes_command, array(
	'before_invoke' => function(){
		if ( ! is_multisite() ) {
			WP_CLI::error( 'This is not a multisite install.' );
		}
	},
) );
~~~

Let's run through the [internal APIs](/docs/internal-apis/) this command uses to achieve its goal:

* `WP_CLI::add_command()` ([doc](/docs/internal-api/wp-cli-add-command/)) is used to register a `find-unused-themes` command to the `$find_unused_themes_command` closure. The `before_invoke` argument makes it possible to verify the command is running on a multisite install, and error if not.
* `WP_CLI::error()` ([doc](/docs/internal-api/wp-cli-error/)) renders a nicely formatted error message and exits.
* `WP_CLI::launch_self()` ([doc](/docs/internal-api/wp-cli-launch-self/)) initially spawns a process to get a list of all sites, then is later used to get the list of themes for a given site.
* `WP_CLI::log()` ([doc](/docs/internal-api/wp-cli-log/)) renders informational output to the end user.
* `WP_CLI\Utils\format_items()` ([doc](/docs/internal-api/wp-cli-utils-format-items/)) renders the list of unused themes after the command has completed its discovery.

### Writing tests

tk

## Distributing

tk

### Including a command in your plugin

    if ( defined( 'WP_CLI' ) && WP_CLI ) {
        require_once dirname( __FILE__ ) . '/inc/class-plugin-cli-command.php';
    }

### Publishing a WP-CLI package