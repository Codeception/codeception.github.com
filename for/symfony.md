---
layout: page
title: Codeception for Symfony
hero: symfony_hero.html
sidebar: |

  ## Features

  * Access Symfony services through the dependecy injection container: `$I->grabService(...)`
  * Use Doctrine to test against the database: `$I->seeInRepository(...);`
  * Assert that emails would have been sent: `$I->seeEmailIsSent();`
  * It's possible to have different Codeception setups for each Symfony bundle.
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

From Symfony 4 onwards there will be a top-level `tests` directory instead of a separate `Tests` directory in each bundle.
So to save you from reconfiguration in the future, it is recommended place unit, functional, and acceptance test files
into `/tests`.

### Project Setup

Codeception should be installed globally for a project. To start please run

```
php bin/codecept bootstrap --empty
```

which creates `codeception.yml` and `tests` directory. There are no test suites in `tests` directory. 

### Acceptance Testing

For UI testing you will have to create first suite for acceptance tests:

```
php bin/codecept g:suite acceptance
```

This will create `acceptance.suite.yml` and `acceptance` folder inside `tests`. Acceptance tests should be configured to work with Selenium WebDriver to test application inside a real browser. 

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - WebDriver:
            url: 'https://localhost/' # put your local url
            browser: firefox
        - \Helper\Acceptance            
```

Browser can be specified as `firefox`, `chrome`, `phantomjs`, or others. 

Acceptance tests should be described in Cest format. Run code generator 

```
php bin/codecept g:cest acceptance UserCest
```

to generate very first test `tests/acceptance/UserCest.php`. Each method of a class (except `_before` and `_after`) is a test. Tests use `$I` object (instance of `AcceptanceTester` class) to perform actions on a webpage. Methods of `AcceptanceTester` are proxified to corresponding modules, which in current case is `WebDriver`. 

To generate method stubs for `AcceptanceTester`.

```
php bin/codecept build
```


<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/03-AcceptanceTests">Acceptance Testing Guide &raquo;</a>
</div>

To run the tests you will need firefox browser, [selenium server running](http://codeception.com/docs/modules/WebDriver#Selenium). If this requirements met acceptance tests can be executed as

```
php bin/codecept run acceptance
```

### BDD

If you prefer to describe application with feature files, Codeception can turn them to acceptance tests. It is recommended to store feature files in `features` directory (like it does Behat) but symlinking it to `tests/acceptance/features` so they can be treated as tests too. 

```
ln -s $PWD/features tests/acceptance
```

Codeception allows to combine tests written in different formats. If are about to wirite a regression test it probably should not be described as a product's feature. That's why feature-files is subset of all acceptance tests, and they are stored in subfolder of `tests/acceptance`. 

There is no standard Gherkin steps built in. By writing your feature files you can get code snippets which should be added to `AcceptanceTester` class. 

```
php bin/codecept gherkin:snippets
```

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/07-BDD">Behavior Driven Development Guide &raquo;</a>
</div>

## Functional Testing

There is no need to use `WebTestCase` to write functional tests. Symfony functional tests are written in the same manner as acceptance tests but are executed inside a framework. Codeception has the [Symfony Module](http://codeception.com/docs/modules/Symfony) for it. To create a functional test suite, run:

```
php bin/codecept g:suite functional
```

Functional tests are written in the same manner as acceptance tests. They also use scenario and `$I` actor object. The only difference is how they are executed. To run tests as Symfony test you should enable corresponding module in functional suite configuration file `tests/functional.suite.yml`. Probably you want Doctrine to be included as well. Then you should use this configuration:

```yaml
class_name: FunctionalTester
modules:
    enabled:
        - Symfony:
            app_path: 'app'
            var_path: 'app'
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
php bin/codecept g:suite api
```

You will need to enable `REST`, `Symfony` and `Doctrine` module in `tests/api.suite.yml`:

```yaml
class_name: ApiTester
modules:
    enabled:
        - REST:
            url: /v1
            depends: Symfony
        - Doctrine2:
            depends: Symfony
        - \Helper\Api
    config:
        - Symfony:
            app_path: 'app'
            var_path: 'app'

```

Symfony module actions like `amOnPage` or `see` should not be available for testing API. This why Symfony module is not enabled but declared with `depends` for REST module. But Symfony module should be configured to load Kernel class from app_path.


<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/10-WebServices#REST">REST API Testing Guide &raquo;</a>.
</div>


### Unit Testing

Create a unit test suite with:

```
php bin/codecept g:suite unit
```

Codeception is powered by PHPUnit so unit and integration test work in a similar manner. To genereate a plain PHPUnit test for `Foo` class, run:

```
php bin/codecept g:phpunit unit Foo
```

This generates a standard test inherited from `PHPUnit_Framework_TestCase`. For integration tests you may use Codeception-enhanced format which allows accessing services DI container, Doctrine, and others. You will need to enable Doctrine2 and Symfony module in `unit.suite.yml` config. Such integration test is extending `Codeception\Test\Unit` class and created by running:

```
php bin/codecept g:test unit Foo
```

Actions of Symfony and Doctrine2 modules will be accessible from `$this->tester` inside a test of `Codeception\Test\Unit`.

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/05-UnitTests">Unit Testing Guide &raquo;</a>.
</div>
