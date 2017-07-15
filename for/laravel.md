---
layout: page
title: Codeception for Laravel
hero: laravel_hero.html
sidebar: |

  ## Codeception Tests

  * Combine **all testing levels** (acceptance, functional, unit)
  * Allow **multi-request** functional tests
  * **Fast**: Tests are wrapped into Eloquent transaction
  * **Scenario-Driven**:  described in easy to get PHP DSL
  * can be written in **BDD** format with Gherkin
  * Great for **REST** and SOAP API testing

  ## Reference

  * [Laravel5 Module](/docs/modules/Laravel5) 
  * [Demo Application](https://github.com/janhenkgerritsen/codeception-laravel5-sample)

---

## Install

Install latest stable Codeception via Composer:

```bash
composer require codeception/codeception --dev
```

## Setup

It is easy to setup tests by running bootstrap command:

```
composer exec codecept bootstrap
```

This will create `tests` directory and configuration file `codeception.yml`. This also prepares 3 suites for testing: acceptance, functional, and unit. You will also need to prepare .env file for testing environment:

```
cp .env .env.testing
```

## Functional Tests

Functional tests allow test application by simulating user actions, this is done by sending requests to framework kernel and checking HTML as a result. Unilke internal tests of Laravel, Codeception doesn't limit you to testing only one request per test. You can **test complex interactions involving different actions and controllers**. This way you can easily cover your specifictions with functional tests.

To start you need to configure `tests/functional.suite.yml` to use Laravel5 module:

```yaml
class_name: FunctionalTester
modules:
    enabled:
        - Laravel5:
            environment_file: .env.testing
        - \AppBundle\Helper\Functional
```


<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/04-FunctionalTests">Functional Testing Guide &raquo;</a>
</div>

Codeception will also use **Eloquent to cleanup changes to database** by wrapping tests into transaction and rolling it back in the end of a test. This makes tests isolated and fast. Laravel5 module allows to access services from DIC container, user authentication methods, fixture generators, check form validations and more. 

To create first functional test for `Login` you should run:

```
composer exec codecept g:cest functional Login
```

## Unit Tests

Codeception is powered by PHPUnit so unit and integration test work in a similar manner. To genereate a unit test run:

```
composer exec codecept g:test unit "Foo\Bar"
```
This generates `Codeception\Test\Unit` testcase which is inherited from PHPUnit but provides a module access.
Enable Laravel5 module in `unit.suite.yml` to have its methods inside a testcase. They are available injected into `$this->tester` property of a testcase.

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/05-UnitTests">Unit Testing Guide &raquo;</a>.
</div>


### Acceptance Tests

To test an application in a real environment by using its UI you should use a real browser. Codeception uses Selenium Webdriver and corresponding WebDriver module to interact with a browser. You should configure `acceptance.suite.yml` to use WebDriver module and a browser of your choice. 

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

Acceptance tests will be executed in development environment using real web server, so settings from `.env.testing` can't be passed to them. 

You can also use Eloquent to create data for acceptance tests. This way you can use data factories and models to prepare and cleanup data for tests. You should enable Laravel5 module with ORM part to add ActiveRecord methods:

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - WebDriver:
            url: 'https://localhost/' # put your local url
            browser: firefox
        - Laravel5:
            part: ORM
            cleanup: false # can't wrap into transaction
        - \Helper\Acceptance            
```

Laravel5 module won't be able to wrap test execution in a transaction but methods like `haveRecord` or `haveModel` will delete objects they created when test ends. 

### API Tests

API Tests are done at functional testing level but instead of testing HTML responses on user actions, they test requests and responses via protocols like REST or SOAP. To create api tests you should create a suite for them

```
composer exec codecept g:suite api
```

You will need to enable `REST`, `Laravel5` module in `tests/api.suite.yml`:

```yaml
class_name: ApiTester
modules:
    enabled:
        - REST:
            url: /api/v1
            depends: Laravel5
        - \Helper\Api
    config:
        - Laravel5:
            environment_file: .env.testing

```

Laravel5 module actions like `amOnPage` or `see` should not be available for testing API. This why Laravel5 module is not enabled but declared with `depends` for REST module. Laravel5 should use testing environment which is specified in `config` section


<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/10-WebServices#REST">REST API Testing Guide &raquo;</a>.
</div>

### BDD

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

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/07-BDD">Behavior Driven Development Guide &raquo;</a>
</div>
