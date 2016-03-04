---
layout: default
title: Commands Cookbook
---

# Commands Cookbook

Making a command is easy. Please read through this cookbook to get started.

## Command types

**Internal commands**:

* Usually cover functionality offered by WordPress
* Do not depend on other components such as plugins, themes etc.
* Are maintained by the WP-CLI team

**Third-party commands**:

* commands defined inside plugins
* commands defined in [Community Packages](https://github.com/wp-cli/wp-cli/wiki/Community-Packages)

If you're a plugin author and you want to integrate with WP-CLI, we recommend you add the command directly to your existing plugin.

## Loading

Bundled commands are loaded automatically, from the `php/commands/` directory.

Third-party commands can be loaded in a variety of ways:

A) by using the `--require` parameter to load the file where the command class is defined:

```
wp --require=my-command.php my-command
```

For example using the example code below assuming you have saved it as example.php in the current directory:

```
wp --require=example.php example hello Newman
```

B) by requiring the command file from inside an active plugin or theme:

```php
<?php
// Plugin Name: My CLI Command

if ( defined('WP_CLI') && WP_CLI ) {
	include __DIR__ . '/my-command.php';
}
```

C) for [community packages](https://github.com/wp-cli/wp-cli/wiki/Community-Packages), by editing the `composer.json` file:

```json
"autoload": {
    "files": [ "my-command.php" ]
}
```

## Anatomy

Each command has its own class; the public methods of that class are its subcommands.

Alternatively, if you define an `__invoke()` method, the command will have no subcommands and will instead use `__invoke()` for the main command.

A typical WP-CLI class looks like this:

```php
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
	 * ## EXAMPLES
	 * 
	 *     wp example hello Newman
	 *
	 * @synopsis <name>
	 */
	function hello( $args, $assoc_args ) {
		list( $name ) = $args;

		// Print a success message
		WP_CLI::success( "Hello, $name!" );
	}
}

WP_CLI::add_command( 'example', 'Example_Command' );
```

The command PHPDoc comment has 3 parts:

### Shortdesc

It's the first line in the PHPDoc:

```php
	/**
	 * Prints a greeting.
```

### Longdesc

It's the middle part in the PHPDoc:

```php
	 * ## OPTIONS
	 * 
	 * <name>
	 * : The name of the person to greet.
	 * 
	 * ## EXAMPLES
	 * 
	 *     wp example hello Newman
```

It's displayed when calling the `help` command, for example, `wp help example hello`.

The syntax is [Markdown Extra](http://michelf.ca/projects/php-markdown/extra/) and this is how it is handled by WP-CLI:

 * The longdesc is generally treated as a free-form text. The `OPTIONS` and `EXAMPLES` section names are not enforced, just common and recommended.
 * Sections names (`## NAME`) are colorized and printed with zero indentation.
 * Everything else is indented by 2 characters, option descriptions are further indented by additional 2 characters.
 * Word-wrapping is a bit tricky. If you want to utilize as much space on each line as possible and don't get word-wrapping artifacts like one or two words on the next line, follow these rules:
     * Hard-wrap option descriptions at **75 chars** after the colon and a space.
     * Hard-wrap everything else at **90 chars**. 

Word-wrapping example:

```php
    /**
	 * Some long text here. Hard-wrap it at *90 characters* to get the best output. Count
     * from the logical begining of the line, i.e., the characters before "Some long text here"
     * don't count.
     *
     * The longest line that properly wraps is:
     * 012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
	 * 
	 * ## OPTIONS
	 * 
	 * <name>
	 * : Hard-wrap option descriptions at *75 characters*. The colon and the space
     * don't count (and are optional except for the first line). The longest line
     * that properly wraps is:
     * 012345678901234567890123456789012345678901234567890123456789012345678901234
     */ 
```



### Docblock tags

This is the last section and it starts immediately after the longdesc:

```php
	 * @synopsis <name>
	 */
```

Here's the list of defined tags:

#### `@synopsis`

The `@synopsis` describes the positional and associative arguments that the command accepts.

Example:

```php
	/**
	 * @synopsis <name> [<other-name>] --foo=<bar> [--foo2=<bar2>] [--flag]
	 */
	function hello( $args, $assoc_args ) {
		...
	}
```

`<name>` is a mandatory positional argument.

`[<other-name>]` is an optional positional argument.

`--foo=<bar>` is a mandatory associative argument.

`[--foo2=<bar2>]` is an optional associative argument.

`[--flag]` is an optional flag.

Also note that the synopsis is used for validating the arguments, before passing them to the implementation.

#### `@subcommand`

There are cases where you can't make the method name have the name of the subcommand. For example, you can't have a method named `list`, because `list` is a reserved keyword in PHP.

That's when the `@subcommand` tag comes to the rescue:

```php
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
```

#### `@alias`

With the `@alias` tag, you can add another way of calling a subcommand. Example:

```php
	/**
	 * @alias hi
	 */
	function hello( $args, $assoc_args ) {
		...
	}
```

```
$ wp example hi Joe
Success: Hello, Joe!
```

#### `@when`

This is a special tag that tells WP-CLI when to execute the command. As of WP-CLI 0.11, it only supports a single value:

```
@when before_wp_load
```

It has no effect if the command using it is loaded from a plugin or a theme, because by that time WordPress itself will have already been loaded.


### Help rendering

The PHPDoc is rendered using the `help` command. The output is ordered like this:

 1. Short description
 2. Synopsis
 3. Long description (OPTIONS, EXAMPLES etc.)
 4. Global parameters


### Arguments

In order to handle command arguments, you have to add two parameters to your sub-command: `$args` and `$assoc_args`

```php
	function hello( $args, $assoc_args ) {
	  /* Code goes here*/
	}
```

`$args` variable will store all the positional arguments:

```
$ wp example hello Joe Doe
```

```php
WP_CLI::line( $args[0] ); // Joe
WP_CLI::line( $args[1] ); // Doe
```

`$assoc_args` variable will store all the arguments defined like `--key=value` or `--flag` or `--no-flag`

```
$ wp example hello --name='Joe Doe' --verbose --no-option
```

```php
WP_CLI::line( $assoc_args['name'] ); // Joe Doe
WP_CLI::line( $assoc_args['verbose'] ); // true
WP_CLI::line( $assoc_args['option'] ); // false
```

Also, you can combine argument types:

```
$ wp example hello --name=Joe foo --verbose bar
```

```php
WP_CLI::line( $assoc_args['name'] ); // Joe
WP_CLI::line( $assoc_args['verbose'] ); // true
WP_CLI::line( $args[0] ); // foo
WP_CLI::line( $args[1] ); // bar
```