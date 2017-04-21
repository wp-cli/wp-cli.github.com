<?php
namespace WP_CLI_Org;

use WP_CLI;
use Mustache_Engine;

/**
 * WP-CLI commands for generating the docs
 */

/**
 * Run all generation commands to generate full website.
 *
 * @when before_wp_load
 */
function generate() {
	generate_homepage();
	generate_commands();
}
WP_CLI::add_command( 'website generate', 'WP_CLI_Org\generate' );

/**
 * Generate the homepage from WP-CLI's README.md
 *
 * @when before_wp_load
 */
function generate_homepage() {

	$ret = trim( shell_exec( 'which wp' ) );
	if ( empty( $ret ) ) {
		WP_CLI::error( 'Could not find path to wp executable.' );
	}
	if ( 'link' === filetype( $ret ) ) {
		$ret = readlink( $ret );
	}

	$readme_path = dirname( dirname( $ret ) ) . '/README.md';
	if ( ! is_file( $readme_path ) ) {
		WP_CLI::error( 'Could not find README.md in wp executable PATH. Please make sure wp executable points to git clone.' );
	}

	$contents = file_get_contents( $readme_path );
	$search = <<<EOT
WP-CLI
======
EOT;
	$replace = <<<EOT
---
layout: default
title: Command line interface for WordPress
---
EOT;
	$contents = str_replace( $search, $replace, $contents );
	file_put_contents( dirname( __FILE__ ) . '/index.md', $contents );
	WP_CLI::success( 'Updated index.md from project README.md.' );
}
WP_CLI::add_command( 'website generate-homepage', '\WP_CLI_Org\generate_homepage' );

/**
 * Generate the /commands/ page.
 *
 * @when before_wp_load
 */
function generate_commands() {
	$wp = invoke_wp_cli( 'wp --skip-packages cli cmd-dump' );

	foreach( $wp['subcommands'] as $k => $cmd ) {
		if ( in_array( $cmd['name'], array( 'website', 'api-dump' ) ) ) {
			unset( $wp['subcommands'][ $k ] );
		}
	}
	$wp['subcommands'] = array_values( $wp['subcommands'] );

	// generate main page
	file_put_contents( '_includes/cmd-list.html', render( 'cmd-list.mustache', $wp ) );
	WP_CLI::log( 'Generated /commands/' );

	foreach ( $wp['subcommands'] as $cmd ) {
		gen_cmd_pages( $cmd );
	}
	WP_CLI::success( 'Generated all command pages.' );
}
WP_CLI::add_command( 'website generate-commands', '\WP_CLI_Org\generate_commands' );

function gen_cmd_pages( $cmd, $parent = array() ) {
	$parent[] = $cmd['name'];

	$binding = $cmd;
	$binding['synopsis'] = implode( ' ', $parent );
	$binding['path'] = implode( '/', $parent );
	$path = '/commands/';
	$binding['breadcrumbs'] = '[Commands](' . $path . ')';
	foreach( $parent as $i => $p ) {
		$path .= $p . '/';
		if ( $i < ( count( $parent ) - 1 ) ) {
			$binding['breadcrumbs'] .= " &raquo; [{$p}]({$path})";
		} else {
			$binding['breadcrumbs'] .= " &raquo; {$p}";
		}
	}
	$binding['has-subcommands'] = isset( $cmd['subcommands'] ) ? array(true) : false;

	if ( $cmd['longdesc'] ) {
		$docs = $cmd['longdesc'];
		$docs = htmlspecialchars( $docs, ENT_COMPAT, 'UTF-8' );

		// decrease header level
		$docs = preg_replace( '/^## /m', '### ', $docs );

		// escape `--` so that it doesn't get converted into `&mdash;`
		$docs = preg_replace( '/^(\[?)--/m', '\1\--', $docs );
		$docs = preg_replace( '/^\s\s--/m', '  \1\--', $docs );

		// hack to prevent double encoding in code blocks
		$docs = preg_replace( '/ &lt; /', ' < ', $docs );
		$docs = preg_replace( '/ &gt; /', ' > ', $docs );
		$docs = preg_replace( '/ &lt;&lt;/', ' <<', $docs );
		$docs = preg_replace( '/&quot;/', '"', $docs );
		$docs = preg_replace( '/wp&gt; /', 'wp> ', $docs );
		$docs = preg_replace( '/=&gt;/', '=>', $docs );

		// Strip global parameters -> added in footer
		$docs = preg_replace( '/#?## GLOBAL PARAMETERS.+/s', '', $docs );

		$binding['docs'] = $docs;
		$binding['github_issues_link'] = 'https://github.com/wp-cli/wp-cli/issues?q=is%3Aopen+label%3A' . urlencode( 'command:' . str_replace( ' ', '-', $binding['synopsis'] ) ) . '+sort%3Aupdated-desc';
	}

	$path = __DIR__ . "/commands/" . $binding['path'];
	if ( !is_dir( $path ) ) {
		mkdir( $path );
	}
	file_put_contents( "$path/index.md", render( 'subcmd-list.mustache', $binding ) );
	WP_CLI::log( 'Generated /commands/' . $binding['path'] . '/' );

	if ( !isset( $cmd['subcommands'] ) )
		return;

	foreach ( $cmd['subcommands'] as $subcmd ) {
		gen_cmd_pages( $subcmd, $parent );
	}
}

function invoke_wp_cli( $cmd ) {
	ob_start();
	system( "WP_CLI_CONFIG_PATH=/dev/null $cmd", $return_code );
	$json = ob_get_clean();

	if ( $return_code ) {
		echo "WP-CLI returned error code: $return_code\n";
		exit(1);
	}

	return json_decode( $json, true );
}

function render( $path, $binding ) {
	$m = new Mustache_Engine;
	$template = file_get_contents( __DIR__ . "/_templates/$path" );
	return $m->render( $template, $binding );
}
