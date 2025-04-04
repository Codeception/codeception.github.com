---
layout: doc
title: GettingStarted - Codeception 4 Documentation
---

<div class="alert alert-warning">👴 <b>You are reading docs for Codeception 4</b>. Current version is 5.x <a href="/docs/GettingStarted">Read for latest version</a></div>

# Getting Started

Let's take a look at Codeception's architecture. We'll assume that you have already [installed](https://codeception.com/install) it
and bootstrapped your first test suites. Codeception has generated three of them: unit, functional, and acceptance.
They are well described in the [previous chapter](https://codeception.com/docs/01-Introduction). Inside your __/tests__ folder you will have three `.yml` config files and three directories
with names corresponding to these suites: `unit`, `functional`, `acceptance`. Suites are independent groups of tests with a common purpose.

## The Codeception Syntax

Codeception follows simple naming rules to make it easy to remember (as well as easy to understand) its method names.

* **Actions** start with a plain english verb, like "click" or "fill". Examples:
    {% highlight php %}

    <?php
    $I->click('Login');
    $I->fillField('#input-username', 'John Dough');
    $I->pressKey('#input-remarks', 'foo');
    
{% endhighlight %}
* **Assertions** always start with "see" or "dontSee". Examples:
    {% highlight php %}

    <?php
    $I->see('Welcome');
    $I->seeInTitle('My Company');
    $I->seeElement('nav');
    $I->dontSeeElement('#error-message');
    $I->dontSeeInPageSource('<section class="foo">');
    
{% endhighlight %}
* **Grabbers** take information. The return value of those are meant to be saved as variables and used later. Example:
    {% highlight php %}

    <?php
    $method = $I->grabAttributeFrom('#login-form', 'method');
    $I->assertEquals('post', $method);
    
{% endhighlight %}

## Actors

One of the main concepts of Codeception is representation of tests as actions of a person. We have a UnitTester, who executes functions and tests the code. We also have a FunctionalTester, a qualified tester,
who tests the application as a whole, with knowledge of its internals. Lastly we have an AcceptanceTester, a user who works with our application
through an interface that we provide.

Methods of actor classes are generally taken from [Codeception Modules](https://codeception.com/docs/06-ModulesAndHelpers). Each module provides predefined actions for different testing purposes, and they can be combined to fit the testing environment.
Codeception tries to solve 90% of possible testing issues in its modules, so you don't have to reinvent the wheel.
We think that you can spend more time on writing tests and less on writing support code to make those tests run.
By default, AcceptanceTester relies on PhpBrowser module, which is set in the `tests/acceptance.suite.yml` configuration file:

{% highlight yaml %}

actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: http://localhost/myapp/
        - \Helper\Acceptance

{% endhighlight %}

In this configuration file you can enable/disable and reconfigure modules for your needs.
When you change the configuration, the actor classes are rebuilt automatically. If the actor classes are not created or updated as you expect,
try to generate them manually with the `build` command:

{% highlight bash %}

php vendor/bin/codecept build

{% endhighlight %}

## Writing a Sample Test

Codeception has its own testing format called Cest (Codecept + Test). 
To start writing a test we need to create a new Cest file. We can do that by running the following command:

{% highlight bash %}

php vendor/bin/codecept generate:cest acceptance Signin

{% endhighlight %}

This will generate `SigninCest.php` file inside `tests/acceptance` directory. Let's open it:

{% highlight php %}

<?php
class SigninCest
{
    function _before(AcceptanceTester $I)
    {
    }
    
    public function _after(AcceptanceTester $I)
    {        
    }

    public function tryToTest(AcceptanceTester $I)
    {
       // todo: write test
    }
}

{% endhighlight %}

We have `_before` and `_after` methods to run some common actions before and after a test. And we have a placeholder action `tryToTest` which we need to implement.
If we try to test a signin process it's a good start to test a successful signin. Let's rename this method to `signInSuccessfully`.

We'll assume that we have a 'login' page where we get authenticated by providing a username and password. 
Then we are sent to a user page, where we see the text `Hello, %username%`. Let's look at how this scenario is written in Codeception:

{% highlight php %}

<?php
class SigninCest
{
    public function signInSuccessfully(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('Username','davert');
        $I->fillField('Password','qwerty');
        $I->click('Login');
        $I->see('Hello, davert');
    }
}

{% endhighlight %}

This scenario can probably be read by non-technical people. If you just remove all special chars like braces, arrows and `$`,
this test transforms into plain English text:

{% highlight yaml %}
I amOnPage '/login'
I fillField 'Username','davert'
I fillField 'Password','qwerty'
I click 'Login'
I see 'Hello, davert'

{% endhighlight %}

Codeception generates this text representation from PHP code by executing:

{% highlight bash %}

php vendor/bin/codecept generate:scenarios

{% endhighlight %}

These generated scenarios will be stored in your `_data` directory in text files.

Before we execute this test, we should make sure that the website is running on a local web server.
Let's open the `tests/acceptance.suite.yml` file and replace the URL with the URL of your web application:

{% highlight yaml %}

actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: 'http://myappurl.local'
        - \Helper\Acceptance

{% endhighlight %}

After configuring the URL we can run this test with the `run` command:

{% highlight bash %}

php vendor/bin/codecept run

{% endhighlight %}

This is the output we should see:

{% highlight bash %}

Acceptance Tests (1) -------------------------------
✔ SigninCest: sign in successfully
----------------------------------------------------

Time: 1 second, Memory: 21.00Mb

OK (1 test, 1 assertions)

{% endhighlight %}

Let's get some detailed output:

{% highlight bash %}

php vendor/bin/codecept run acceptance --steps

{% endhighlight %}

We should see a step-by-step report on the performed actions:

{% highlight bash %}

Acceptance Tests (1) -------------------------------
SigninCest: Login to website
Signature: SigninCest.php:signInSuccessfully
Test: tests/acceptance/SigninCest.php:signInSuccessfully
Scenario --
 I am on page "/login"
 I fill field "Username" "davert"
 I fill field "Password" "qwerty"
 I click "Login"
 I see "Hello, davert"
 OK
----------------------------------------------------

Time: 0 seconds, Memory: 21.00Mb

OK (1 test, 1 assertions)

{% endhighlight %}

This simple test can be extended to a complete scenario of site usage, therefore,
by emulating the user's actions, you can test any of your websites.

To run more tests create a public method for each of them. Include `AcceptanceTester` object as `$I` as a method parameter and use the same `$I->` API you've seen before.
If your tests share common setup actions put them into `_before` method. 

For instance, to test CRUD we want 4 methods to be implemented and all next tests should start at `/task` page:

{% highlight php %}

<?php
class TaskCrudCest
{
    function _before(AcceptanceTester $I)
    {
        // will be executed at the beginning of each test
        $I->amOnPage('/task');
    }

    function createTask(AcceptanceTester $I)
    {
       // todo: write test
    }

    function viewTask(AcceptanceTester $I)
    {
       // todo: write test
    }

    function updateTask(AcceptanceTester $I)
    {
        // todo: write test
    }

    function deleteTask(AcceptanceTester $I)
    {
       // todo: write test
    }
}

{% endhighlight %}

Learn more about the [Cest format](https://codeception.com/docs/07-AdvancedUsage#Cest-Classes) in the Advanced Testing section.

## Interactive Pause

It's hard to write a complete test at once. 
You will need to try different commands with different arguments before you find a correct path.

Execution can be paused at any point and enter an interactive shell where you will be able to try different commands in action.
All you need to do is **call `$I->pause()`** somewhere in your test, then run the test in [debug mode](#Debugging).

Interactive Pause requires [`hoa/console`](https://hoa-project.net/) which is not installed by default. To install it, run:

{% highlight bash %}

php composer.phar require --dev hoa/console

{% endhighlight %}

{% highlight php %}

<?php
// use pause inside a test:
$I->pause(); 

{% endhighlight %}

The execution of the test is stopped at this point, and a console is shown where you can try all available commands "live". 
This can be very useful when you write functional, acceptance, or api test.

![](https://user-images.githubusercontent.com/220264/54929617-875ad180-4f1e-11e9-8fea-fc1b02423050.gif)

Inside Interactive Pause you can use the entire power of the PHP interpreter: variables, functions, etc.
You can access the result of the last executed command in a variable called `$result`.

In acceptance or functional test you can save page screenshot or html snapshot.

{% highlight php %}

<?php
// inside PhpBrowser, WebDriver, frameworks
// saves current HTML and prints a path to created file 
$I->makeHtmlSnapshot();

// inside WebDriver
// saves screenshot and prints a path to created file
$I->makeScreenshot();

{% endhighlight %}

To try commands without running a single test you can launch interactive console:

{% highlight bash %}

$ php vendor/bin/codecept console suitename

{% endhighlight %}

Now you can execute all the commands of a corresponding Actor class and see the results immediately.

## BDD

Codeception allows execution of user stories in Gherkin format in a similar manner as is done in Cucumber or Behat.
Please refer to [the BDD chapter](https://codeception.com/docs/07-BDD) to learn more.

## Configuration

Codeception has a global configuration in `codeception.yml` and a config for each suite. We also support `.dist` configuration files.
If you have several developers in a project, put shared settings into `codeception.dist.yml` and personal settings into `codeception.yml`.
The same goes for suite configs. For example, the `unit.suite.yml` will be merged with `unit.suite.dist.yml`.

## Running Tests

Tests can be started with the `run` command:

{% highlight bash %}

php vendor/bin/codecept run

{% endhighlight %}

With the first argument you can run all tests from one suite:

{% highlight bash %}

php vendor/bin/codecept run acceptance

{% endhighlight %}

To limit tests run to a single class, add a second argument. Provide a local path to the test class, from the suite directory:

{% highlight bash %}

php vendor/bin/codecept run acceptance SigninCest.php

{% endhighlight %}

Alternatively you can provide the full path to test file:

{% highlight bash %}

php vendor/bin/codecept run tests/acceptance/SigninCest.php

{% endhighlight %}

You can further filter which tests are run by appending a method name to the class, separated by a colon (for Cest or Test formats):

{% highlight bash %}

php vendor/bin/codecept run tests/acceptance/SigninCest.php:^anonymousLogin$

{% endhighlight %}

You can provide a directory path as well. This will execute all acceptance tests from the `backend` dir:

{% highlight bash %}

php vendor/bin/codecept run tests/acceptance/backend

{% endhighlight %}

Using regular expressions, you can even run many different test methods from the same directory or class.
For example, this will execute all acceptance tests from the `backend` dir beginning with the word "login":

{% highlight bash %}

php vendor/bin/codecept run tests/acceptance/backend:^login

{% endhighlight %}

To execute a group of tests that are not stored in the same directory, you can organize them in [groups](https://codeception.com/docs/07-AdvancedUsage#Groups).

### Reports

To generate JUnit XML output, you can provide the `--xml` option, and `--html` for HTML report.

{% highlight bash %}

php vendor/bin/codecept run --steps --xml --html

{% endhighlight %}

This command will run all tests for all suites, displaying the steps, and building HTML and XML reports. Reports will be stored in the `tests/_output/` directory.

To see all the available options, run the following command:

{% highlight bash %}

php vendor/bin/codecept help run

{% endhighlight %}

## Debugging

To receive detailed output, tests can be executed with the `--debug` option.
You may print any information inside a test using the `codecept_debug` function.

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

We have taken a look into the Codeception structure. Most of the things you need were already generated by the `bootstrap` command.
After you have reviewed the basic concepts and configurations, you can start writing your first scenario.




* **Next Chapter: [AcceptanceTests >](/docs/03-AcceptanceTests)**
* **Previous Chapter: [< Introduction](/docs/01-Introduction)**

<div class="alert alert-warning"><a href="https://github.com/Codeception/codeception.github.com/edit/master/docs/4.x/GettingStarted.md"><strong>Edit</strong> this page on GitHub</a></div>
