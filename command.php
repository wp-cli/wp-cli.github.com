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
