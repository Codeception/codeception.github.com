---
layout: page
title: Codeception for WordPress
hero: wp_hero.html
sidebar: |

  ## Codeception Tests

  * Combine **all testing levels** (acceptance, functional, unit)
  * use WordPress defined functions, constants, classes and methods in any test
  * can be written in **BDD** format with Gherkin

  ## Reference

  * [WPBrowser modules library](https://github.com/lucatume/wp-browser)
  * [Tools and Tutorials](http://theaveragedev.com)
  * [WordPress demo plugin](https://github.com/lucatume/idlikethis)

  ---

  Written by [**Luca Tumedei**](https://github.com/lucatume)

---

## Install

Install latest stable Codeception via Composer:

```bash
composer require codeception/codeception --dev
```

Install latest stable WPBrowser package via Composer:

```bash
composer require lucatume/wp-browser --dev
```

## Setup

To fully use the WordPress specific modules of the WPBrowser suite you need to setup a local WordPress installation; this is in no way different from what's required to locally develop a WordPress theme or plugin.  
In the examples below I assume that the local WordPress installation root directory is `/var/www/wordpress`, that it responds at the `http://wordpress.dev` URL and that I am developing a plugin called "Acme Plugin".  
While it's possible to start from a default Codeception configuration the WPBrowser package comes with its own CLI tool (`wpcept`) and its own bootstrap command.  
Scaffold the tests using the latter

```bash
wpcept bootstrap
```

The command creates the `tests` directory and scaffold the `acceptance`, `functional`, `integration` and `unit` suites creating a `tests` sub-directory and a configuration file for each.  
Edit the `codeception.yml` file to match your local WordPress setup and point the modules to the local WordPress installation folder, the local WordPress URL and so on.  
If you are using the `WPLoader` module in your tests take care to create a dedicated database for it and not to use the same database the `Db` or `WPDb` modules might use.  
The use of the modules defined in the WPBrowser package is not tied to this bootstrap though so feel free to set up Codeception in any other way.

## Integration Tests
Commonly "WordPress unit tests" are not related to classical unit tests but to integration tests. The difference is that unit tests are supposed to test a class methods in complete isolation, while integration tests check how components work inside WordPress. That's why, to prepare WordPress for testing, you should enable `WPLoader` module into `integration.suite.yml`.  
The `WPLoader` module: it takes care of loading, installing and configuring a fresh WordPress installation before each test method runs.  
To handle the heavy lifting the module requires some information about the local WordPress installation: in the `codeception.yml` file configure it to match your local setup; with reference to the example above the module configuration might be:

```yaml
modules:
    config:
        WPLoader:
            wpRootFolder: /var/www/wordpress
            dbName: wordpress-tests
            dbHost: localhost
            dbUser: root
            dbPassword: root
            wpDebug: true
            tablePrefix: wptests_
            domain: wordpress.dev
            plugins:
                - acme-plugin/plugin.php
            activatePlugins:
                - acme-plugin/plugin.php
```

The module is wrapping and augmenting the [WordPress Core automated testing suite](https://make.wordpress.org/core/handbook/testing/automated-testing/phpunit/) and to generate a test case that uses Codeception and the methods provided by the Core testing suite you can use the `wpcept` command again:

```bash
wpcept generate:wpunit integration "Acme\SomeClass"
```

The generated test case extends the `WPTestCase` class and it exposes all the mehtods defined by `Codeception\Test\Unit` test case and the Core suite `\WP_UnitTestCase`.  
Additional test method generation possibilities are available to cover the primitive test cases offered in the Core testing suite using `wpajax`, `wprest`, `wpcanonical`, `wpxmlrpc` as arguments for the `generate` sub-command.  

Any database interaction is wrapped in a transaction to guarantee isolation between tests.

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/05-UnitTests">Unit Testing Guide &raquo;</a>.
</div>

## WordPress Functional Tests
Functional tests are meant to test requests handling and end-to-end interactions.  
WPBrowser will scaffold functional tests to use the `WPBrowser`, `WPDb` and `Filesystem` modules.  
While the latter is the one defined by the Codeception suite `WPBrowser` and `WPDb` modules extend the Codeception `PHPBrowser` and `Db` modules with WordPress specific methods.  
The modules will require some WordPress specific setup parameters:

```yaml
modules:
    enabled:
        WPBrowser:
            url: 'http://wordpress.dev'
            adminUsername: admin
            adminPassword: password
            adminUrl: /wp-admin
        WPDb:
            dsn: 'mysql:host=localhost;dbname=wordpress'
            user: root
            password: root
            dump: tests/_data/wp.sql
            populate: true
            cleanup: true
            url: 'http://wordpress.dev'
            tablePrefix: wp_
```

To generate a functional test use the default `codecept` commmand.

```bash
codecept generate:cept functional "PostInsertion"
```

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/04-FunctionalTests">Functional Teseting Guide &raquo;</a>.
</div>

## Acceptance Tests

To test a WordPress theme or plugin functionalities using its UI you should simulate the user interaction with a browser both in the site front-end and back-end.  
You can use the `WebDriver` and `Db` modules defined by Codeception but the WPBrowser package extends those modules in the `WPWebDriver` and `WPDb` modules to add WordPress specific methods to each.  
The `WPWebDriver` module drives a real browser in the same way the `WebDriver` does.  
The modules require some WordPress specific parameters to work:

```yaml
modules:
    enabled:
        WPWebDriver:
            url: 'http://wordpress.dev'
            browser: phantomjs
            port: 4444
            restart: true
            wait: 2
            adminUsername: admin
            adminPassword: password
            adminUrl: /wp-admin
```

As the `WebDriver` module the `WPWebDriver` module require a Selenium or PhantomJS server to run.
The `WPDb` module allows for quick interactions with the WordPress database API like quick generation of multiple posts, database value fetching and more:

```php
<?php
$I->haveManyPostsInDatabase(10, ['post_type' => 'custom_post_type']);
$transient = $I->grabTransientFromDatabase('some_transient');
```
`WPWebDriver` methods wrap complex interactions with the WordPress UI into sugar methods like:

```php
<?php
$I->loginAsAdmin();
$I->amOnPluginsPage();
$I->activatePlugin('acme-plugin');
```

## BDD

If you prefer to describe application with feature files, Codeception can turn them to acceptance or functional tests. It is recommended to store feature files in `features` directory (like it does Behat) but symlinking it to `tests/acceptance/features` or `tests/functional/features` so they can be treated as tests too. For using BDD with acceptance tests you need to run:

```
ln -s $PWD/features tests/acceptance
```

Codeception allows to combine tests written in different formats. If are about to wirite a regression test it probably should not be described as a product's feature. That's why feature-files is subset of all acceptance tests, and they are stored in subfolder of `tests/acceptance`. 

There is no standard Gherkin steps built in. By writing your feature files you can get code snippets which should be added to `AcceptanceTester` class. 

```
composer exec codecept gherkin:snippets
```

In the same manner features can be set up as functional tests.

Methods defined in WPBrowser `WPWebDriver` and `WPDb` modules can offer a base to implement the steps:

```php
<?php
/**
 * @Given I login as administrator
 */
public function iLoginAsAdministrator()
{
  // from WPBrowser or WPWebDriver module
  $this->loginAsAdmin();
}

/**
 * @Then I see CSS option is set
 */
public function iSeeCssOptionIsSet()
{
  // from WPDb module
  $this->seeOptionInDatabase('acme_css_option');
}
```

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/07-BDD">Behavior Driven Development Guide &raquo;</a>
</div>
