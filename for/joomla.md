---
layout: page
title: Codeception for Joomla
hero: joomla_hero.html
sidebar: |

  ## Codeception Tests

  * Combine **all testing levels** (acceptance, functional, unit)
  * **Scenario-Driven**:  described in easy to get PHP DSL
  * Provide common actions and assertions

  ## Reference

  * [Joomla Browser](http://codeception.com/addons#joomla-browserhttpsgithubcomjoomla-projectsjoomla-browser) 
  * [Demo Tested Extension](https://github.com/joomla-extensions/weblinks#tests)

---

## Setup

With Codeception you can create [Unit](http://codeception.com/docs/05-UnitTests), [Functional](http://codeception.com/docs/04-FunctionalTests) and [Api](http://codeception.com/docs/10-WebServices) tests, but the present documentation will covers only how to start with  [Acceptance](http://codeception.com/docs/03-AcceptanceTests) tests in Joomla and Joomla Extensions in order to  check the UI and work of a system as a whole. 

### Project Setup
Create a Joomla website in your local webserver.

Go to the folder where your website is located and run:

```bash
composer require codeception/codeception --dev
```

Codeception should be installed globally for a project. To start please run

```
vendor/bin/codecept bootstrap --empty
```

which creates `codeception.yml` and `tests` directory. There are no test suites in `tests` directory. 

### Acceptance Testing

For UI testing you will have to create first suite for acceptance tests:

```
vendor/bin/codecept generate:suite acceptance
```

This will create `acceptance.suite.yml` and `acceptance` folder inside `tests`. Acceptance tests should be configured to work with Selenium WebDriver to test application inside a real browser. 

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: http://joomla.box/codeception/
        - \Helper\Acceptance          
```

Acceptance tests should be described in Cest format. Run code generator 

```
vendor/bin/codecept generate:cest acceptance AdminLoginCest
```

to generate very first test `tests/acceptance/AdminLoginCest.php`. Each method of a class (except `_before` and `_after`) is a test. Tests use `$I` object (instance of `AcceptanceTester` class) to perform actions on a webpage. 

Modify your `tests/acceptance/AdminLoginCest.php` using the following example code:

```php
<?php

class AdminLoginCest
{
    public function login(AcceptanceTester $I)
    {
        $I->amOnPage('/administrator/index.php');
        $I->comment('Fill Username Text Field');
        $I->fillField(['id' => 'mod-login-username'], 'admin');
        $I->comment('Fill Password Text Field');
        $I->fillField(['id' => 'mod-login-password'], 'admin');
        $I->comment('I click Login button');
        $I->click('Log in');
        $I->comment('I wait to see Administrator Control Panel');
    }
}
```

To generate method stubs for `AcceptanceTester`.

```
vendor/bin/codecept build
```

Now you are able to run your first test. Type:


```
vendor/bin/codecept run acceptance
```

Previous execution was done using a headless browser. If you want to run your test on a real browser like Firefox you are required to use the Codeception Webdriver Module.

To learn more about testing over real browsers use the [Joomla Browser](http://codeception.com/addons#joomla-browserhttpsgithubcomjoomla-projectsjoomla-browser) Codeception Module. You can find an example of useage at the [Weblinks Joomla Official supported extension](https://github.com/joomla-extensions/weblinks#tests).

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/03-AcceptanceTests">Acceptance Testing Guide &raquo;</a>
</div>

To run the tests you will need firefox browser, [selenium server running](http://codeception.com/docs/modules/WebDriver#Selenium). If this requirements met acceptance tests can be executed as



### BDD

If you prefer to describe application with feature files, Codeception can turn them to acceptance tests.

Your previous test would look like:

```gherkin
Feature: administrator login
  In order to manage my web application
  As administrator
  I need to be able to login

  Scenario: Successful login
    Given I am registered administrator named "admin"
    When I login into Joomla Administrator with username "admin" and password "admin"
    Then I should see administrator dashboard
```

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/07-BDD">Behavior Driven Development Guide &raquo;</a>
</div>

