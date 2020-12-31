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

  Written by [**Javier Gomez**](https://github.com/javigomez)

---

## Setup
Create a Joomla website in your local web server.

Go to the folder where your website is located and run:

```bash
composer require codeception/codeception codeception/module-phpbrowser codeception/module-asserts --dev
```

Then run:

```
vendor/bin/codecept bootstrap --empty
```

Previous command will have createed `codeception.yml` and `tests` directory.

### Acceptance Testing

#### Using headless browser

To test the User Interface of a Joomla Template or an Extension (plugin, module, component, language pack,...) you should simulate the user interaction with a browser.

For UI testing you will the first step will be to create an  acceptance tests suite:

```
vendor/bin/codecept generate:suite acceptance
```

This will create `acceptance.suite.yml` and `acceptance` folder inside `tests`. 

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: http://joomla.box/codeception/
        - \Helper\Acceptance          
```

Acceptance tests should be described in Cest format. Run Cest test generator to generate your very first test `tests/acceptance/AdminLoginCest.php`: 

```
vendor/bin/codecept generate:cest acceptance AdminLoginCest
```

Each method of a Cest class (except `_before` and `_after`) is a test. Tests use `$I` object (instance of `AcceptanceTester` class) to perform actions on a webpage. 

Modify your `tests/acceptance/AdminLoginCest.php` using the following example code:

```php
<?php

class AdminLoginCest
{
    public function login(AcceptanceTester $I)
    {
        $I->amOnPage('/administrator/index.php');
        $I->comment('Fill Username Text Field');
        $I->fillField('#mod-login-username', 'admin');
        $I->comment('Fill Password Text Field');
        $I->fillField('#mod-login-password', 'admin');
        $I->comment('I click Login button');
        $I->click('Log in');
        $I->comment('I see Administrator Control Panel');
        $I->see('Control Panel', '.page-title');
    }
}
```

To generate method stubs for `AcceptanceTester` run:

```
vendor/bin/codecept build
```

Now you are able to run your first test:


```
vendor/bin/codecept run acceptance
```

Or, try this command to see the execution step by step:

```
vendor/bin/codecept run acceptance --steps
```

#### Using a real browser

Previous execution was done using a headless browser: PHPBrowser.  This is the fastest way to run User Interface tests since it doesn’t require running an actual browser. Instead, uses a PHP web scraper, which acts like a browser (it sends a request, then receives and parses the response). Read more about PHPBrowser at [http://codeception.com/docs/03-AcceptanceTests#PHP-Browser](http://codeception.com/docs/03-AcceptanceTests#PHP-Browser).

If you prefer to run your test on a real browser like Firefox you are required to use the Codeception Webdriver Module. Unlike PHPBrowser it will allow you to test the visibility of elements or test javascript interactions (but the test execution will be considerably slower).

The Joomla Community provides an extended Webdriver Codeception Module called [Joomla-Browser](http://codeception.com/addons#Joomla-Browser). With Joomla-Browser you can execute, with one command, common joomla actions like: install Joomla, do Adminitrator Login, publish a module, and many more. See the full list at [Joomla Browser Documentation](https://github.com/joomla-projects/joomla-browser#joomla-browser-codeception-module).

In the following example we are going to refactor our previous "administrator login test" by using Joomla-Browser and executing it in a Firefox browser:

First, install Joomla-browser:

```bash
composer require joomla-projects/joomla-browser --dev
```

Modify your acceptance.suite.yml file like as follows:

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - JoomlaBrowser
        - AcceptanceHelper
    config:
        JoomlaBrowser:
            url: 'http://localhost/tests/joomla-cms3'     # the url that points to the joomla installation at /tests/system/joomla-cms
            browser: 'firefox'
            window_size: 1024x768
            capabilities:
              unexpectedAlertBehaviour: 'accept'
            username: 'admin'                      # UserName for the Administrator
            password: 'admin'                      # Password for the Administrator
            database host: 'localhost'             # place where the Application is Hosted #server Address
            database user: 'root'                  # MySQL Server user ID, usually root
            database password: ''                  # MySQL Server password, usually empty or root
            database name: 'testjoomla'            # DB Name, at the Server
            database type: 'mysqli'                # type in lowercase one of the options: MySQL\MySQLi\PDO
            database prefix: 'jos_'                # DB Prefix for tables
            install sample data: 'No'              # Do you want to Download the Sample Data Along with Joomla Installation, then keep it Yes
            sample data: 'Default English (GB) Sample Data'    # Default Sample Data
            admin email: 'admin@mydomain.com'      # email Id of the Admin
            language: 'English (United Kingdom)'   # Language in which you want the Application to be Installed
            joomla folder: 'home/.../path to Joomla Folder' # Path to Joomla installation where we execute the tests

```

Modify your previous `tests/acceptance/AdminLoginCest.php` using the following example code:

```php
<?php

class AdminLoginCest
{
    public function login(AcceptanceTester $I)
    {
        $I->doAdministratorLogin();
    }
}
```

Run the test:

```
vendor/bin/codecept run acceptance --steps
```

**Important note**, in order to run the previous test you need to have [Selenium](http://docs.seleniumhq.org/download/) running in your system. If you are new to Selenium, you can find an example of useage at the [Weblinks Joomla Official supported extension](https://github.com/joomla-extensions/weblinks#tests). Just follow the "running the tests" instructions to learn how to easily lauch Selenium in your system.

<div class="alert alert-warning">
  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
  Continue to <a href="http://codeception.com/docs/03-AcceptanceTests">Acceptance Testing Guide &raquo;</a>
</div>



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

