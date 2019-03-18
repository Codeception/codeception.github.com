---
layout: page
title: Codeception for Symfony
hero: symfony_hero.html
sidebar: |

  ## Features

  * Access Symfony services through the dependecy injection container: `$I->grabService(...)`
  * Use Doctrine to test against the database: `$I->seeInRepository(...)`
  * Assert that emails would have been sent: `$I->seeEmailIsSent()`
  * Tests are wrapped into Doctrine transaction to speed them up.
  * Symfony Router can be cached between requests to speed up testing.

  ## Reference

  * [Symfony Module](/docs/modules/Symfony) 
  * [Doctrine2 Module](http://codeception.com/docs/modules/Doctrine2)
  * [Demo Application](https://github.com/Codeception/symfony-demo)

---

## Install

Install Codeception via Composer:

```bash
composer require codeception/codeception --dev
```

## Setup

For Symfony >= 4 there is a top-level `tests` directory, instead of a separate `Tests` directory in each bundle.
It is recommended to place unit, functional, and acceptance test files into `tests`.

### Acceptance Testing

Sample configuration of `tests/acceptance.suite.yml`:

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
vendor/bin/codecept g:cest acceptance UserCest
```

This will create the file `tests/acceptance/UserCest.php`. Each method of a class (except `_before` and `_after`) is a test. Tests use `$I` object (instance of `AcceptanceTester` class) to perform actions on a webpage. Methods of `AcceptanceTester` are proxified to corresponding modules, which in current case is `WebDriver`. 

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/03-AcceptanceTests">Acceptance Testing Guide &raquo;</a>
</div>

To run the tests you will need chrome browser, [selenium server running](http://codeception.com/docs/modules/WebDriver#Selenium). If this requirements met acceptance tests can be executed as

```
vendor/bin/codecept run acceptance
```

### BDD

If you prefer to describe application with feature files, Codeception can turn them to acceptance tests. It is recommended to store feature files in `features` directory (like Behat does it) but symlinking it to `tests/acceptance/features` so they can be treated as tests too. 

```
ln -s $PWD/features tests/acceptance
```

Codeception allows to combine tests written in different formats. If are about to wirite a regression test it probably should not be described as a product's feature. That's why feature-files is subset of all acceptance tests, and they are stored in subfolder of `tests/acceptance`. 

There is no standard Gherkin steps built in. By writing your feature files you can get code snippets which should be added to `AcceptanceTester` class. 

```
vendor/bin/codecept gherkin:snippets
```

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/07-BDD">Behavior Driven Development Guide &raquo;</a>
</div>

## Functional Testing

There is no need to use `WebTestCase` to write functional tests. Symfony functional tests are written in the same manner as acceptance tests but are executed inside the framework. Codeception has the [Symfony Module](http://codeception.com/docs/modules/Symfony) for it. 

Functional tests also use scenario and `$I` actor object. The only difference is how they are executed. To run tests as Symfony test you should enable the corresponding module in functional suite configuration file `tests/functional.suite.yml`. Probably you want Doctrine to be included as well. Then you should use this configuration:

```yaml
class_name: FunctionalTester
modules:
    enabled:
        - Symfony:
            app_path: 'src'
            environment: 'test'
        - Doctrine2:
            depends: Symfony
        - \Helper\Functional
```

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Learn more about starting with Symfony in <a href="http://codeception.com/09-04-2015/using-codeception-for-symfony-projects.html">our blogpost &raquo;</a>
</div>

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/04-FunctionalTests">Functional Testing Guide &raquo;</a>
</div>

### API Tests

API Tests are done at functional testing level but instead of testing HTML responses on user actions, they test requests and responses via protocols like REST or SOAP. To create api tests, you should create a suite for them:

```
vendor/bin/codecept g:suite api
```

You will need to enable `REST`, `Symfony` and `Doctrine` module in `tests/api.suite.yml`:

```yaml
class_name: ApiTester
modules:
    enabled:
        - Symfony:
            app_path: 'src'
            environment: 'test'
        - REST:
            url: /v1
            depends: Symfony
        - Doctrine2:
            depends: Symfony
        - \Helper\Api
```

Symfony module actions like `amOnPage` or `see` should not be available for testing API. This is why Symfony module is not enabled but declared with `depends` for REST module. But Symfony module should be configured to load Kernel class from `app_path`.


<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/10-WebServices#REST">REST API Testing Guide &raquo;</a>.
</div>


### Unit Testing

Codeception is powered by PHPUnit so unit and integration tests work in a similar manner. To genereate a plain PHPUnit test for class `Foo`, run:

```
vendor/bin/codecept g:test unit Foo
```

Actions of Symfony and Doctrine2 modules will be accessible from `$this->tester` inside a test of `Codeception\Test\Unit`.

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/05-UnitTests">Unit Testing Guide &raquo;</a>.
</div>

[Edit this page on GitHub](https://github.com/Codeception/codeception.github.com/blob/master/for/symfony.md)
