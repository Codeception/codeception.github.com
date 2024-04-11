---
layout: doc
title: Getting Started - Codeception Docs
---

<div class="alert alert-success">💡 <b>You are reading docs for latest Codeception 5</b>. <a href="/docs/4.x/GettingStarted">Read for 4.x</a></div>

# Getting Started

Let's take a look at Codeception's architecture. We'll assume that you have already [installed](https://codeception.com/install) it
and bootstrapped your first test suites. Codeception has generated three of them: Unit, Functional, and Acceptance.
They are well described in the [Introduction](https://codeception.com/docs/Introduction). Inside your __/tests__ folder you will have three `.yml` config files and three directories: `Unit`, `Functional`, `Acceptance`.

## The Codeception Syntax

Codeception follows simple naming rules to make it easy to remember (as well as easy to understand) its method names.

* **Actions** start with a plain english verb, like "click" or "fill". Examples:

  ```php
  $I->click('Login');
  $I->fillField('#input-username', 'John Dough');
  $I->pressKey('#input-remarks', 'foo');
  ```    

* **Assertions** always start with "see" or "dontSee". Examples:

  ```php
  $I->see('Welcome');
  $I->seeInTitle('My Company');
  $I->seeElement('nav');
  $I->dontSeeElement('#error-message');
  $I->dontSeeInPageSource('<section class="foo">');
  ```    

* **Grabbers** take information. The return value of those is meant to be saved as a variable and used later. Example:

  ```php
  $method = $I->grabAttributeFrom('#login-form', 'method');
  $I->assertSame('post', $method);
  ```

## Actors

One of the main concepts of Codeception is the representation of tests as actions of a person. We have a "UnitTester", who executes functions and tests the code. We also have a "FunctionalTester", a qualified tester,
who tests the application as a whole, with knowledge of its internals. Lastly we have an "AcceptanceTester", a user who works with our application
in a real browser.

Methods of actor classes are generally taken from [Codeception Modules](https://codeception.com/docs/ModulesAndHelpers). Each module provides predefined actions for different testing purposes, and they can be combined to fit the testing environment.
Codeception tries to solve 90% of possible testing issues in its modules, so you don't have to reinvent the wheel.
We think that you can spend more time on writing tests and less on writing support code to make those tests run.
By default, AcceptanceTester relies on the [PhpBrowser](https://codeception.com/docs/modules/PhpBrowser) module, which is set in the `tests/Acceptance.suite.yml` configuration file:

```yaml
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: 'http://localhost/myapp/'
```

In this configuration file you can enable/disable and reconfigure modules for your needs.
When you change the configuration, the actor classes are rebuilt automatically. If the actor classes are not created or updated as you expect,
try to generate them manually with the `build` command:

```bash
php vendor/bin/codecept build
```

## Writing a Sample Test

Codeception has its own testing format called "Cest" (a combination of "Codecept" and "Test"). 
To start writing a test we need to create a new Cest file. We can do that by running the following command:

```bash
php vendor/bin/codecept generate:cest Acceptance Signin
```

This will generate the `SigninCest.php` file inside the `tests/Acceptance` directory. Let's open it:

```php
<?php
namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class SigninCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
}
```

We have `_before` and `_after` methods to run some common actions before and after a test. And we have a placeholder method `tryToTest`.
If we want to test a signin process it's a good start to test a successful signin. Let's rename this method to `signInSuccessfully`.

```php
<?php
namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

final class SigninCest
{
    public function signInSuccessfully(AcceptanceTester $I): void
    {
        $I->amOnPage('/login');
        $I->fillField('Username', 'davert');
        $I->fillField('Password', 'qwerty');
        $I->click('Login');
        $I->see('Hello, davert');
    }
}
```

This scenario can probably be read by everybody, even non-developers. If you just remove all special characters,
this test transforms into plain english text:

```yaml
I amOnPage '/login'
I fillField 'Username', 'davert'
I fillField 'Password', 'qwerty'
I click 'Login'
I see 'Hello, davert'
```

Codeception generates this text representation from PHP code by executing:

```bash
php vendor/bin/codecept generate:scenarios Acceptance
```

These generated scenarios will be stored in your `tests/Support/Data/scenarios/Functional` directory in `*.txt` files.

Before we execute this test, we should make sure that the website is running on a local web server.
Let's open the `tests/Acceptance.suite.yml` file and fill in the URL of your web application:

```yaml
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: 'http://myappurl.local'
```

After configuring the URL we can run this test with the `run` command:

```bash
php vendor/bin/codecept run
```


This is the output we should see:

```bash
Acceptance Tests (1) -------------------------------
✔ SigninCest: sign in successfully (0.00s)
----------------------------------------------------

Time: 00:00.019, Memory: 12.00 MB

OK (1 test, 1 assertion)
```

Let's get some detailed output:

```
php vendor/bin/codecept run Acceptance --steps
```

We should see a step-by-step report on the performed actions:

```bash
Acceptance Tests (1) -------------------------------
SigninCest: Login to website
Signature: SigninCest.php:signInSuccessfully
Test: tests/Acceptance/SigninCest.php:signInSuccessfully
Scenario --
 I am on page "/login"
 I fill field "Username" "davert"
 I fill field "Password" "qwerty"
 I click "Login"
 I see "Hello, davert"
 PASSED
----------------------------------------------------

Time: 00:00.019, Memory: 12.00 MB

OK (1 test, 1 assertion)
```

This simple test can be extended to a complete scenario of site usage, therefore, by emulating the user's actions, you can test any of your websites.

To run more tests, create a public method for each of them. If your tests share common setup actions, put them into the `_before()` method:

```php
<?php
namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

final class TaskCrudCest
{
    public function _before(AcceptanceTester $I): void
    {
        // will be executed at the beginning of each test
        $I->amOnPage('/task');
    }
}
```

Learn more about the [Cest format](https://codeception.com/docs/AdvancedUsage#Cest-Classes) in the Advanced Testing chapter.

## Behavior Driven Development (BDD)

Codeception allows execution of user stories in Gherkin format in a similar manner as it is done in Cucumber or Behat.
Please refer to [the BDD chapter](https://codeception.com/docs/BDD) to learn more.

## Configuration

Codeception has a global configuration file `codeception.yml` and a config for each suite. We also support `.dist` configuration files.
If you have several developers in a project, put shared settings into `codeception.dist.yml` and personal settings into `codeception.yml`.
The same goes for suite configs. For example, the `Unit.suite.yml` will be merged with `Unit.suite.dist.yml`.

## Running Tests

Tests can be started with the `run` command:

```bash
php vendor/bin/codecept run
```

With the first argument you can run all tests from one suite:

```bash
php vendor/bin/codecept run Acceptance
```

To limit tests run to a single class, add a second argument. Provide a local path to the test class, from the suite directory:

```bash
php vendor/bin/codecept run Acceptance SigninCest.php
```

Alternatively you can provide the full path to the test file:

```bash
php vendor/bin/codecept run tests/Acceptance/SigninCest.php
```

You can further filter which tests to run by appending a method name to the class, separated by a colon:

```bash
php vendor/bin/codecept run tests/Acceptance/SigninCest.php:^anonymousLogin$
```

You can provide a directory path as well. This will execute all Acceptance tests from the `backend` dir:

```bash
php vendor/bin/codecept run tests/Acceptance/backend
```

Using regular expressions, you can even run many different test methods from the same directory or class.
For example, this will execute all Acceptance tests from the `backend` dir beginning with the word "login":

```bash
php vendor/bin/codecept run tests/Acceptance/backend:^login
```

To execute a group of tests that are not stored in the same directory, you can organize them in [groups](https://codeception.com/docs/AdvancedUsage#Groups).

### Reports

To generate JUnit XML output, you can provide the `--xml` option, and `--html` for HTML report.

```bash
php vendor/bin/codecept run --steps --xml --html
```


This command will run all tests for all suites, displaying the steps, and building HTML and XML reports. The reports will be stored in the `tests/_output/` directory.

Learn more about [available reports](/docs/Reporting).

## Debugging

To receive detailed output, tests can be executed with the `--debug` option.

Learn more about [debugging](/docs/Debugging).

### Generators

There are plenty of useful Codeception commands:

* `generate:cest` *suite* *filename* - Generates a sample Cest test
* `generate:test` *suite* *filename* - Generates a sample PHPUnit Test with Codeception hooks
* `generate:feature` *suite* *filename* - Generates Gherkin feature file
* `generate:suite` *suite* *actor* - Generates a new suite with the given Actor class name
* `generate:scenarios` *suite* - Generates text files containing scenarios from tests
* `generate:helper` *filename* - Generates a sample Helper File
* `generate:pageobject` *suite* *filename* - Generates a sample Page object
* `generate:stepobject` *suite* *filename* - Generates a sample Step object
* `generate:environment` *env* - Generates a sample Environment configuration
* `generate:groupobject` *group* - Generates a sample Group Extension

## Conclusion

We have taken a look into Codeception's structure. Most of the things you need were already generated by the `bootstrap` command.
After you have reviewed the basic concepts and configurations, you can start writing your first scenario.

<div class="alert alert-warning"><a href="https://github.com/Codeception/codeception.github.com/edit/master/docs/GettingStarted.md"><strong>Improve</strong> this guide</a></div>
