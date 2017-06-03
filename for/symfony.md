---
layout: page
title: Codeception for Symfony
hero: symfony_hero.html
sidebar: |

  ## Codeception Tests

  * Combine **all testing levels** (acceptance, functional, unit)
  * **Fast**: Tests are wrapped into Doctrine transaction
  * **Scenario-Driven**:  described in easy to get PHP DSL
  * Provide common actions and assertions
  * Great for **REST** and SOAP API testing

  ## Reference

  * [Symfony Module](/docs/modules/Symfony) 
  * [Demo Application](https://github.com/Codeception/symfony-demo)

---

## Features of Codeception's Symfony Module

* Access Symfony services through the dependecy injection container: `$I->grabService('my_service');`
* Use Doctrine to access the database (in combination with Codeception's [Doctrine2 Module](http://codeception.com/docs/modules/Doctrine2)): `$I->seeInRepository('AppBundle:User', array('name' => 'davert'));`
* Assert that emails would have been sent: `$I->seeEmailIsSent();`
* It's possible to have different Codeception setups for each Symfony bundle

[Full reference of the Symfony Module] (http://codeception.com/docs/modules/Symfony)

## Install

Install Codeception via Composer:

```bash
composer require codeception/codeception --dev
```

## Setup

It is recommended to have unit and functional testing set up per each bundle and acceptance tests for set globally. Unit and Functional tests will check that each bundle work as expected while acceptance tests will check the UI and work of a system as a whole. 

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

## Bundle Setup

Each bundle should have its own Codeception setup. To have test configuration for `AppBundle` you should run:

```
php bin/codecept bootstrap --empty src/AppBundle --namespace AppBundle
```

This will create `tests` dir inside `src/AppBundle`. 

### Functional Testing

There is no need to use `WebTestCase` to write functional tests. Symfony functional tests are written in the same manner as acceptance tests but are executed inside a framework. Codeception has `Symfony` module for it. It is a good idea to separate functional and unit tests so it is recommended to create a new test suite for AppBundle

```
php bin/codecept g:suite functional -c src/AppBundle
```

Functional tests are written in the same manner as acceptance tests. They also use scenario and `$I` actor object. The only difference is how they are executed. To run tests as Symfony test you should enable corresponding module in functional suite configureation file `src/Appundle/tests/functional.suite.yml`. Probably you want Doctrine to be included as well. Then you should use this configuration:

```yaml
class_name: FunctionalTester
modules:
    enabled:
        - Symfony:
            app_path: '../../app'
            var_path: '../../app'
        - Doctrine2:
            depends: Symfony
        - \AppBundle\Helper\Functional
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

API Tests are done at functional testing level but instead of testing HTML responses on user actions, they test requests and responses via protocols like REST or SOAP. To create api tests for `ApiBundle` bundle you should create a suite for them

```
php bin/codecept g:suite api -c src/ApiBundle
```

You will need to enable `REST`, `Symfony` and `Doctrine` module in `src/ApiBundle/tests/api.suite.yml`:

```yaml
class_name: ApiTester
modules:
    enabled:
        - REST:
            url: /v1
            depends: Symfony
        - Doctrine2:
            depends: Symfony
        - \ApiBundle\Helper\Api
    config:
        - Symfony:
            app_path: '../../app'
            var_path: '../../app'

```

Symfony module actions like `amOnPage` or `see` should not be available for testing API. This why Symfony module is not enabled but declared with `depends` for REST module. But Symfony module should be configured to load Kernel class from app_path.


<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/10-WebServices#REST">REST API Testing Guide &raquo;</a>.
</div>


### Unit Testing

You should put your unit tests for AppBundle into `src/AppBundle/tests/unit`. It is done to not mix them with functional and API tests. To start unit test suite for `AppBundle` shoule be created:

```
php bin/codecept g:suite unit -c src/AppBundle
```

Codeception is powered by PHPUnit so unit and integration test work in a similar manner. To genereate a plain PHPUnit test for `Foo` class inside `AppBundle` please run

```
php bin/codecept g:phpunit unit Foo -c src/AppBundle
```

This generates a standard test inherited from `PHPUnit_Framework_TestCase`. For integration tests you may use Codeception-enhanced format which allows accessing services DI container, Doctrine, and others. You will need to enable Doctrine2 and Symfony module in `unit.suite.yml` config. Such integration test is extending `Codeception\Test\Unit` class and created by running:

```
php bin/codecept g:test unit Foo -c src/AppBundle
```

Actions of Symfony and Doctrine2 modules will be accessible from `$this->tester` inside a test of `Codeception\Test\Unit`.

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/05-UnitTests">Unit Testing Guide &raquo;</a>.
</div>


### Running it all together

Codeception allows to execute all tests with different configurations in one runner. To execute all tests at once with `codecept run` you should include bundle configurations into global configuration file `codeception.yml` in the root of a project:

```yaml
include:
    - src/*Bundle
```

Then running codeception tests from root directory will execute tests from all bundles as well as acceptance tests.
