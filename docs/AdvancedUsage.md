---
layout: doc
title: Advanced Usage - Codeception Docs
---

<div class="alert alert-success">💡 <b>You are reading docs for latest Codeception 5</b>. <a href="/docs/4.x/AdvancedUsage">Read for 4.x</a></div>

# Advanced Usage

In this chapter, we will cover some techniques and options that you can use to improve your testing experience
and keep your project better organized.

## Cest Classes
Cest is a common test format for Codeception, it is "Test" with the first C letter in it.
It is scenario-driven format so all tests written in it are executed step by step.
Unless you need direct access to application code inside a test, Cest format is recommended.
As it provides more readable code for functional, api, and acceptance tests.

A new Cest class can be created via `g:cest` command:

```
php vendor/bin/codecept generate:cest suitename CestName
```

The generated file will look like this:

```php
<?php
namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class BasicCest
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

**Each public method of Cest (except those starting with `_`) will be executed as a test**
and will receive an instance of the Actor class as the first parameter and the `$scenario` variable as the second one.

In `_before` and `_after` methods you can use common setups and teardowns for the tests in the class.

As you see, we are passing the Actor object into `tryToTest` method. This allows us to write scenarios the way we did before:

```php
<?php
namespace Tests\Acceptance;

use \Tests\Support\AcceptanceTester;

class BasicCest
{
    // test
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Login');
        $I->fillField('username', 'john');
        $I->fillField('password', 'coltrane');
        $I->click('Enter');
        $I->see('Hello, John');
        $I->seeInCurrentUrl('/account');
    }
}
```

As you see, Cest classes have no parents.
This is done intentionally. It allows you to extend your classes with common behaviors and workarounds
that may be used in child classes. But don't forget to make these methods `protected` so they won't be executed as tests.

Cest format also can contain hooks based on test results:

* `_failed` will be executed for failed test
* `_passed` will be executed for passed test

```php
public function _failed(AcceptanceTester $I)
{
    // will be executed on test failure
}

public function _passed(AcceptanceTester $I)
{
    // will be executed when test is successful
}
```

## Skip Tests

To mark test as skipped `Skip` attribute can be used:

```php
<?php
namespace Tests\Acceptance;

use Codeception\Attribute\Skip;
use Codeception\Scenario;

class UserCest {

    #[Skip]
    public function notImportantTest(AcceptanceTester $I)
    {
        // this test should not be executed
    }

    // you can explain the reason to skip test in attribute
    #[Skip('this one is not needed anymore')]
    public function alsoNotImportantTest(AcceptanceTester $I)
    {
    }
}
```

If you need to skip a test on a condition, inject `Codeception\Scenario` into the test:

```php
public function worksOnCondition(AcceptanceTester $I, Scenario $scenario)
{
    // some condition to execute test or not
    if ($this->shouldNotBeExecuted) {
        // skip test on condition
        // please note that `_before` is still executed for this test
        // and browser is launched in case of acceptance test
        $scenario->skip('This test is skipped on this condition');
    }
    // test body
}
```

Unit tests can be skipped via the attribute or by using `markTestSkipped` method:

```php
<?php
namespace Tests\Unit;

use Codeception\Attribute\Skip;

class UserTest extends \Codeception\Test\Unit
{

    #[Skip]
    public function testToBeSkipped()
    {
    }

    #[Skip('this one is flaky')]
    public function testToAlsoBeSkipped()
    {
    }

    public function testToSkipOnCondition()
    {
        if ($this->shouldNotBeExecuted) {
            $this->markTestSkipped();
        }
    }
}
```

## Incomplete Tests

Tests can be marked as Incomplete, in this case, they also will be skipped.
To mark a test as incomplete use `Codeception\Attribute\Incomplete` which should be used similarly to `Skip` attribute:

```php
use Codeception\Attribute\Incomplete;

// ---

#[Incomplete]
public function testNotReadyYet()
{
}

#[Incomplete('I will implement it tomorrow, I promise')]
public function testNotReadyToday()
{
}
```

## Groups

There are several ways to execute a bunch of tests. You can run tests from a specific directory:

```
php vendor/bin/codecept run tests/Acceptance/admin
```

You can execute one (or several) specific groups of tests:

```
php vendor/bin/codecept run -g admin -g editor
```

The concept of groups was taken from PHPUnit and behaves in the same way. You can use the `Group` attribute to add a test to a group.

```php
<?php
namespace Tests\Acceptance;

use Codeception\Attribute\Group;
use Tests\Support\AcceptanceTester

class UserCest {

    #[Group('admin')] // set a group for this test
    #[Group('slow', 'important')] // add groups in a single attribute
    public function testAdminUser(AcceptanceTester $I)
    {
    }
}
```

For `.feature`-files (Gherkin) use tags:


```gherkin
@admin @editor
Feature: Admin area
```

## Examples Attribute

What if you want to execute the same test scenario with different data? In this case you can inject examples
as `\Codeception\Example` instances.
Data is defined via the `Examples` attribute

```php
<?php
namespace Tests\Api;

use \Tests\Support\ApiTester;
use \Codeception\Attribute\Examples;
use \Codeception\Example;

class EndpointCest
{

  #[Examples('/api', 200)]
  #[Examples('/api/protected', 401)]
  #[Examples('/api/not-found-url', 404)]
  #[Examples('/api/faulty', 500)]
  public function checkEndpoints(ApiTester $I, Example $example)
  {
    $I->sendGet($example[0]);
    $I->seeResponseCodeIs($example[1]);
  }
}
```

## Example Annotation

As well as the `\Codeception\Attribute\Examples` attribute, available for Cest tests, the `@example` attribute allows you to
inject test parameters in place of an actual [DataProvider](#dataprovider-attribute) for Unit tests.

```php
<?php
namespace Tests\Unit;

class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @param mixed $value
     * @example [3.14159]
     * @example ["a string"]
     * @example [["this", "is", "an", "array"]]
     * @example [{"associative": "array"}]
     */
    public function testExample($value)
    {
        $this->assertNotEmpty($value, "Expected a value");
    }
}
```
> `@testWith`: as of [Codeception 5.0](https://github.com/Codeception/Codeception/pull/6491), PHPUnit's `@testWith` is no longer supported. `@example` is a good, almost drop-in, replacement.

## DataProvider Attribute

You can also use the `@dataProvider` annotation for creating dynamic examples for [Cest classes](#Cest-Classes), using a **protected method** for providing example data:

```php
<?php
namespace Tests\Acceptance;

use \Codeception\Attribute\DataProvider;
use \Codeception\Example;

class PageCest
{
    #[DataProvider('pageProvider')]
    public function staticPages(AcceptanceTester $I, \Codeception\Example $example)
    {
        $I->amOnPage($example['url']);
        $I->see($example['title'], 'h1');
        $I->seeInTitle($example['title']);
    }

    protected function pageProvider() : array  // to make it public use `_` prefix
    {
        return [
            ['url'=>"/", 'title'=>"Welcome"],
            ['url'=>"/info", 'title'=>"Info"],
            ['url'=>"/about", 'title'=>"About Us"],
            ['url'=>"/contact", 'title'=>"Contact Us"]
        ];
    }
}
```

## Before/After Attributes 

You can control execution flow with `#[Before]` and `#[After]` attributes. You may move common actions
into protected (i.e. non-test) methods and invoke them before or after the test method by putting them into attributes.
When adding multiple `#[Before]` or `#[After]` attributes, methods are invoked in order from top to bottom.

```php
<?php
namespace Tests\Functional;

use \Tests\Support\FunctionalTester;
use Codeception\Attribute\Before;
use Codeception\Attribute\After;

class ModeratorCest {

    protected function login(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('Username', 'miles');
        $I->fillField('Password', 'davis');
        $I->click('Login');
    }

    #[Before('login')]
    public function banUser(AcceptanceTester $I)
    {
        $I->amOnPage('/users/charlie-parker');
        $I->see('Ban', '.button');
        $I->click('Ban');
    }

    // you can specify multiple before and after methods:
    #[Before('login', 'cleanup')]
    #[After('logout', 'close')]
    public function addUser(AcceptanceTester $I)
    {
        $I->amOnPage('/users/charlie-parker');
        $I->see('Ban', '.button');
        $I->click('Ban');
    }
}
```


### Dependencies

With the `#[Depends]` attribute, you can specify a test that should be passed before the current one.
If that test fails, the current test will be skipped. You should pass the method name of the test you are relying on.

```php
<?php
namespace Tests\Acceptance;

use Codeception\Attribute\Depends;

class ModeratorCest {

    public function login(AcceptanceTester $I)
    {
        // logs moderator in
    }

    #[Depends('login')]
    public function banUser(AcceptanceTester $I)
    {
        // bans user
    }
}
```

`Depends` attribute applies to the `Cest` and `Codeception\Test\Unit` formats. Dependencies can be set across different classes.

To specify a dependent test from another file you should provide a *test signature*.
Normally, the test signature matches the `className:methodName` format.
But to get the exact test signature just run the test with the `--steps` option to see it:

```
Signature: ModeratorCest:login`
```

Codeception reorders tests so dependent tests will always be executed before the tests that rely on them.


## Environments

For cases where you need to run tests with different configurations, you can define different config environments.
The most typical use cases are running acceptance tests in different browsers,
or running database tests using different database engines.

Let's demonstrate the usage of environments for multi-browser testing.

We need to add some new lines to `Acceptance.suite.yml`:

```yaml
actor: AcceptanceTester
modules:
    enabled:
        - WebDriver
    config:
        WebDriver:
            url: 'http://127.0.0.1:8000/'
            browser: 'firefox'
env:
    chrome:
         modules:
            config:
                WebDriver:
                    browser: 'chrome'

    firefox:
        # nothing changed
```

Basically you can define different environments inside the `env` root, name them (`chrome`, `firefox` etc.),
and then redefine any configuration parameters that were set before.

You can also define environments in separate configuration files placed in the directory specified by the `envs` option in
the `paths` configuration:

```yaml
paths:
    envs: tests/_envs
```

The names of these files are used as environment names (e.g. `chrome.yml` or `chrome.dist.yml` for an environment named `chrome`).
You can generate a new file with this environment configuration by using the `generate:environment` command:

```
php vendor/bin/codecept g:env chrome
```

In that file you can specify just the options you wish to override:

```yaml
modules:
    config:
        WebDriver:
            browser: 'chrome'

```

The environment configuration files are merged into the main configuration before the suite configuration is merged.

You can easily switch between those configs by running tests with `--env` option.
To run the tests only for Firefox you just need to pass `--env firefox` as an option:

```
php vendor/bin/codecept run Acceptance --env firefox
```

To run the tests in all browsers, list all the environments:

```
php vendor/bin/codecept run Acceptance --env chrome --env firefox
```

The tests will be executed 3 times, each time in a different browser.

It's also possible to merge multiple environments into a single configuration by separating them with a comma:

```
php vendor/bin/codecept run Acceptance --env dev,firefox --env dev,chrome --env dev,firefox
```

The configuration is merged in the order given.
This way you can easily create multiple combinations of your environment configurations.

Depending on the environment, you may choose which tests are to be executed.
For example, you might need some tests to be executed in Firefox only, and some tests in Chrome only.

The desired environments can be specified with the `Env` attribute:

```php
<?php
namespace Tests\Acceptance;

use Codeception\Attribute\Env;

class UserCest
{
    /**
     * This test will be executed only in 'firefox' and 'chrome' environments
     */
    #[Env('firefox')]
    #[Env('chrome')]
    public function webkitOnlyTest(AcceptanceTester $I)
    {
        // I do something
    }
}
```

Multiple values can be set in one attribute:

```php
#[Env('chrome', 'firefox')]
```

This way you can easily control which tests will be executed for each environment.

It is possible to combine environments. For instance, if a test should be executed only in chrome on staging, this can be declared as a combined environment:

```php
#[Env('chrome,staging')]
```

Test marked with this attribute will be executed only if both environments are set:

```php
php vendor/bin/codecept run --env chrome,staging
```

## Get Test Metadata

Sometimes you may need to change the test behavior in real-time.
For instance, the behavior of the same test may differ in Firefox and in Chrome.
In runtime, we can retrieve the current environment name, test name,
or list of enabled modules by calling the `$scenario->current()` method.

```php
// retrieve current environment
$scenario->current('env');

// list of all enabled modules
$scenario->current('modules');

// test name
$scenario->current('name');

// browser name (if WebDriver module enabled)
$scenario->current('browser');

// capabilities (if WebDriver module enabled)
$scenario->current('capabilities');

```

You can inject `\Codeception\Scenario` like this:

```php
use Codeception\Scenario $scenario;

public function myTest(Scenario $scenario)
{
    // list all metadata variables
    codecept_debug($scenario->current());

    // do some actions according to conditions
    if ($scenario->current('browser') === 'chrome') {
      // ...
    }
}
```

`Codeception\Scenario` is also available in Actor classes and StepObjects. You can access it with `$this->getScenario()`.

## Shuffle

By default, Codeception runs tests in alphabetic order.
To ensure that tests are not depending on each other (unless explicitly declared via `@depends`) you can enable `shuffle` option.

```yaml
# inside codeception.yml
settings:
    shuffle: true
```

Alternatively, you may run tests in the shuffle without changing the config:

```yaml
codecept run -o "settings: shuffle: true"
```

Tests will be randomly reordered on each run. When tests are executed in shuffle mode a seed value will be printed.
Copy this seed value from the output to be able to rerun tests in the same order.

```yaml
$ codecept run
Codeception PHP Testing Framework v2.4.5
Powered by PHPUnit 5.7.27 by Sebastian Bergmann and contributors.
[Seed] 1872290562
```

Pass the copied seed into `--seed` option:  

```yaml
codecept run --seed 1872290562
```

## Dependency Injection

Codeception supports simple dependency injection for `Cest` and `Codeception\Test\Unit` classes.
It means that you can specify which classes you need as parameters of the special `_inject()` method,
and Codeception will automatically create the respective objects and invoke this method,
passing all dependencies as arguments. This may be useful when working with Helpers. Here's an example for Cest:

```php
<?php
namespace Tests\Unit;

use Tests\Support\AcceptanceTester;
use Tests\Support\Helper\SignUp;
use Tests\Support\Helper\NavBar;

class SignUpCest
{
    protected SignUp $signUp;
    protected NavBar $navBar;

    protected function _inject(SignUp $signUp, NavBar $navBar)
    {
        $this->signUp = $signUp;
        $this->navBar = $navBar;
    }

    public function signUp(AcceptanceTester $I)
    {
        $this->navBar->click('Sign up');
        $this->signUp->register([
            'first_name'            => 'Joe',
            'last_name'             => 'Jones',
            'email'                 => 'joe@jones.com',
            'password'              => '1234',
            'password_confirmation' => '1234'
        ]);
    }
}
```

And for Test classes:

```php
<?php
namespace Tests\Unit;

use Codeception\Test\Unit;
use Tests\Support\UnitTester;
use Tests\Support\Helper\Math;

class MathTest extends Unit
{
    protected UnitTester $tester;
    protected Math $math;

    protected function _inject(Math $math)
    {
        $this->math = $math;
    }

    public function testAll()
    {
        $this->assertEquals(3, $this->math->add(1, 2));
        $this->assertEquals(1, $this->math->subtract(3, 2));
    }
}
```

However, Dependency Injection is not limited to this. It allows you to **inject any class**,
which can be constructed with arguments known to Codeception.

In order to make auto-wiring work, you will need to implement the `_inject()` method with the list of desired arguments.
It is important to specify the type of arguments, so Codeception can guess which objects are expected to be received.
The `_inject()` will only be invoked once, just after the creation of the TestCase object (either Cest or Test).
Dependency Injection will also work in a similar manner for Helper and Actor classes.

Each test of a Cest class can declare its own dependencies and receive them from method arguments:

```php
<?php
namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Tests\Support\Helper\User as UserHelper;
use Tests\Support\Page\User as UserPage;

class UserCest
{
    function updateUser(UserHelper $u, AcceptanceTester $I, UserPage $userPage)
    {
        $user = $u->createDummyUser();
        $userPage->login($user->getName(), $user->getPassword());
        $userPage->updateProfile(['name' => 'Bill']);
        $I->see('Profile was saved');
        $I->see('Profile of Bill','h1');
    }
}
```

Moreover, Codeception can resolve dependencies recursively (when `A` depends on `B`, and `B` depends on `C` etc.)
and handle parameters of primitive types with default values (like `$param = 'default'`).
Of course, you are not allowed to have *cyclic dependencies*.


<div class="alert alert-warning"><a href="https://github.com/Codeception/codeception.github.com/edit/master/docs/AdvancedUsage.md"><strong>Improve</strong> this guide</a></div>
