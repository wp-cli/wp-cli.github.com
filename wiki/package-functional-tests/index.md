---
layout: default
title: Package Functional Tests
---

# Package Functional Tests

This guide will demonstrate how to:

* Set up Behat functional tests for your command, using WP-CLI
* Run the tests locally

We're assuming you already have a WP-CLI command (aka "package") in a directory called "custom-command" with a valid composer.json file.

Let's get started:

1) Generate the command test files:

```bash
wp scaffold package-tests /path/to/custom-command/
```

This command will generate all the files needed for writing Behat tests for your package, including:

* Behat FeatureContext class and WP-CLI's defined steps.
* Sample Behat feature file that tests whether WP-CLI loads properly.
* Bash package test install script.

It also generates a `.travis.yml` file. If you host your package on Github and enable [Travis CI](http://about.travis-ci.org), the tests will be run automatically after every commit you make to the package.

3) Initialize the testing environment locally:

```bash
cd /path/to/custom-command/
bash bin/install-package-tests.sh
```

This script:

* Uses Composer to require Behat for --dev.
* Installs WP-CLI nightly to a temporary directory.
* Creates a config.yml file pointing to your command, for the tests to reference.
* Creates a `wp_cli_tests` database.

4) Run the package tests:

```bash
export WP_CLI_BIN_DIR=/tmp/wp-cli-phar
export WP_CLI_CONFIG_PATH=/tmp/wp-cli-phar/config.yml
./vendor/bin/behat
```
