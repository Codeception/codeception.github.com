---
layout: page
title: Codeception for Phalcon
hero: phalcon_hero.html
sidebar: |

  ## Features

  * Access Phalcon services through the dependency injection container: `$I->grabService(...)`
  * Combine **all testing levels** (unit, functional, acceptance)

  ## Reference

  * [Phalcon 4 Module](/docs/modules/Phalcon4)
  * [Demo Application](https://github.com/Codeception/phalcon-demo)

---

## Install

Install Codeception the Phalcon module and optional dependencies via Composer:

```bash
composer require codeception/codeception codeception/module-phalcon4 codeception/module-phpbrowser codeception/module-asserts --dev
```

## Setup

It is easy to setup tests by running bootstrap command:

```
vendor/bin/codecept bootstrap
```

This will create `tests` directory and configuration file `codeception.yml`. This also prepares 3 suites for testing: unit, functional and acceptance.

### Unit Testing

Add Phalcon to your unit test by adding the following to your `Unit.suite.yml`:
```yaml
# Codeception Test Suite Configuration
#
# Suite for unit or integration tests.

actor: UnitTester
modules:
    enabled:
        - Asserts
        - \Helper\Unit
        - Phalcon4:
          bootstrap: public/index.php
          cleanup: true
          savepoints: true
    step_decorators: ~
```

To generate a plain PHPUnit test for class `Users`, run:

```
vendor/bin/codecept g:test Unit Users
```

Actions of the Phalcon module will be accessible from `$this->tester` inside a test of `Codeception\Test\Unit`.

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="https://codeception.com/docs/05-UnitTests">Unit Testing Guide &raquo;</a>.
</div>

## Functional Tests

When it comes to test real features of web applications you can’t go with unit testing only. You want to test how application handles the requests, what responses it provides, what data is saved to database and so on. To test application in near user environment but without launching real webserver or a browser you can use functional tests. They are far more simpler than unit tests in a way they are written. They describe interaction scenario in a simple DSL so you don’t need to deal with application directly but describe actions from a user’s perspective.

Enable Phalcon for your Functional tests first:

```yaml
# Codeception Test Suite Configuration
#
# Suite for functional tests
# Emulate web requests and make application process them
# Include one of framework modules (Symfony2, Yii2, Laravel5, Phalcon4) to use it
# Remove this suite if you don't use frameworks

actor: FunctionalTester
modules:
    enabled:
        # add a framework module here
        - \Helper\Functional
        - Phalcon4:
          bootstrap: public/index.php
          cleanup: true
          savepoints: true
    step_decorators: ~        
```

Then use [Cest](https://codeception.com/docs/07-AdvancedUsage) or Cept to create a test.
```
vendor/bin/codecept g:cest Functional Login
```
Then add your test case
```php
<?php 

class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->wantTo('login as regular user');
        
        $I->amOnPage('/');
        $I->click('Log In/Sign Up');
        $I->seeInCurrentUrl('/session/index');
        
        $I->see('Log In', "//*[@id='login-header']");
        $I->see("Don't have an account yet?", "//*[@id='signup-header']");
        
        $I->fillField('email',    'demo@phalconphp.com');
        $I->fillField('password', 'phalcon');
        
        $I->click('Login');
        $I->seeInCurrentUrl('/session/start');
        
        $I->see('Welcome Phalcon Demo');
        $I->seeLink('Log Out');
    }
}
```

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="https://codeception.com/docs/04-FunctionalTests">Functional Testing Guide &raquo;</a>
</div>

### Acceptance Testing

Sample configuration of `tests/Acceptance.suite.yml`:

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - WebDriver:
            url: 'https://localhost/' # put your local url
            browser: chrome
        - \Helper\Acceptance            
```

Browser can be specified as `chrome`, `firefox`, `phantomjs`, or others. 

To create a sample test called, run:

```
vendor/bin/codecept g:cest Acceptance Login
```

This will create the file `tests/Acceptance/LoginCest.php`. Each method of a class (except `_before` and `_after`) is a test. Tests use `$I` object (instance of `AcceptanceTester` class) to perform actions on a webpage. Methods of `AcceptanceTester` are proxified to corresponding modules, which in current case is `WebDriver`. 

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="https://codeception.com/docs/03-AcceptanceTests">Acceptance Testing Guide &raquo;</a>
</div>

To run the tests you will need chrome browser, [selenium server running](https://codeception.com/docs/modules/WebDriver#Selenium). If this requirements met acceptance tests can be executed as

```
vendor/bin/codecept run Acceptance
```

### BDD

If you prefer to describe application with feature files, Codeception can turn them to acceptance tests. It is recommended to store feature files in `features` directory (like Behat does it) but symlinking it to `tests/acceptance/features` so they can be treated as tests too. 

```
ln -s $PWD/features tests/Acceptance
```

Codeception allows to combine tests written in different formats. If you are about to write a regression test it probably should not be described as a product's feature. That's why feature-files are a subset of all acceptance tests, and they are stored in subfolder of `tests/acceptance`. 

There are no standard Gherkin steps built in. By writing your feature files you can get code snippets which should be added to `AcceptanceTester` class. 

```
vendor/bin/codecept gherkin:snippets
```

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="https://codeception.com/docs/07-BDD">Behavior Driven Development Guide &raquo;</a>
</div>

### API Tests

API Tests are done at functional testing level but instead of testing HTML responses on user actions, they test requests and responses via protocols like REST or SOAP. To create api tests, you should create a suite for them:

```
vendor/bin/codecept g:suite api
```

You will need to enable `REST` and `Phalcon` module in `tests/api.suite.yml`:

```yaml
class_name: ApiTester
modules:
    enabled:
        - Phalcon4:
            bootstrap: public/index.php
            cleanup: true
            savepoints: true
        - REST:
            url: /v1
            depends: Phalcon4
        - \Helper\Api
```

Phalcon [module](/docs/modules/Phalcon4) actions like `amOnPage` or `see` should not be available for testing API. This is why Phalcon module is not enabled but declared with `depends` for REST module. But Phalcon module should be configured to load Kernel class from `app_path`.


<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="https://codeception.com/docs/10-APITesting#REST-API">REST API Testing Guide &raquo;</a>.
</div>

[Edit this page on GitHub](https://github.com/Codeception/codeception.github.com/blob/master/for/phalcon.md)
