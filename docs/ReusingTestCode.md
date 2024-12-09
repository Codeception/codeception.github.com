---
layout: doc
title: Reusing Test Code - Codeception Docs
---

<div class="alert alert-success">💡 <b>You are reading docs for latest Codeception 5</b>. <a href="/docs/4.x/ReusingTestCode">Read for 4.x</a></div>

# Reusing Test Code

Codeception uses modularity to create a comfortable testing environment for every test suite you write.
Modules allow you to choose the actions and assertions that can be performed in tests.

## What are Actors

All actions and assertions that can be performed by the Actor object in a class are defined in modules.
It might look like Codeception limits you in testing, but that's not true. You can extend the testing suite
with your own actions and assertions, by writing them into a custom module, called a Helper.
We will get back to this later in this chapter, but for now let's look at the following test:

```php
$I->amOnPage('/');
$I->see('Hello');
$I->seeInDatabase('users', ['id' => 1]);
$I->seeFileFound('running.lock');
```

It can operate with different entities: the web page can be loaded with the PhpBrowser module,
the database assertion uses the Db module, and the file state can be checked with the Filesystem module.

Modules are attached to Actor classes in the suite config.
For example, in `tests/Acceptance.suite.yml` we should see:

```yaml
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: http://localhost
        - Db
        - Filesystem
```

The AcceptanceTester class has its methods defined in modules.
Let's see what's inside the `AcceptanceTester` class, which is located inside the `tests/Support` directory:

```php
<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */
}
```

The most important part is the `_generated\AcceptanceTesterActions` trait, which is used as a proxy for enabled modules.
It knows which module executes which action and passes parameters into it.
This trait was created by running `codecept build` and is regenerated each time module or configuration changes.

> Use actor classes to set common actions which can be used accross a suite.


## PageObjects

For acceptance and functional testing, we will not only need to have common actions being reused across different tests,
we should have buttons, links and form fields being reused as well. For those cases we need to implement
the [PageObject pattern](https://www.selenium.dev/documentation/en/guidelines_and_recommendations/page_object_models/),
which is widely used by test automation engineers. The PageObject pattern represents a web page as a class
and the DOM elements on that page as its properties, and some basic interactions as its methods.
PageObjects are very important when you are developing a flexible architecture of your acceptance or functional tests.
Do not hard-code complex CSS or XPath locators in your tests but rather move them into PageObject classes.

Codeception can generate a PageObject class for you with command:

```
php vendor/bin/codecept generate:pageobject Acceptance Login
```

> It is recommended to use page objects for acceptance testing only

This will create a `Login` class in `tests/Support/Page/Acceptance`.
The basic PageObject is nothing more than an empty class with a few stubs.

It is expected that you will populate it with the UI locators of a page it represents. Locators can be added as public properties:

```php
<?php

namespace Tests\Support\Page\Acceptance;

class Login
{
    public static $URL = '/login';

    public $usernameField = '#mainForm #username';
    public $passwordField = '#mainForm input[name=password]';
    public $loginButton = '#mainForm input[type=submit]';

    // ...
}
```

But let's move further. The PageObject concept specifies that the methods for the page interaction should also be stored in a PageObject class. 

Let's define a `login` method in this class:

```php
namespace Tests\Support\Page\Acceptance;

use Tests\Support\AcceptanceTester;

class Login
{
    public static $URL = '/login';

    public $usernameField = '#mainForm #username';
    public $passwordField = '#mainForm input[name=password]';
    public $loginButton = '#mainForm input[type=submit]';

    protected AcceptanceTester $tester;

    // we inject AcceptanceTester into our class
    public function __construct(AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function login($name, $password)
    {
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        $I->fillField($this->usernameField, $name);
        $I->fillField($this->passwordField, $password);
        $I->click($this->loginButton);
    }
}
```

If you specify which object you need for a test, Codeception will try to create it using the dependency injection container.
In the case of a PageObject you should declare a class as a parameter for a test method:

```php
<?php

namespace Tests\Acceptance;

use \Tests\Support\AcceptanceTester;
use \Tests\Support\Page\Acceptance\Login;

class UserCest
{
    function showUserProfile(AcceptanceTester $I, Login $loginPage)
    {
        $loginPage->login('bill evans', 'debby');
        $I->amOnPage('/profile');
        $I->see('Bill Evans Profile', 'h1');
    }
}
```

The dependency injection container can construct any object that requires any known class type.
For instance, `Page\Login` required `AcceptanceTester`, and so it was injected into `Page\Login` constructor,
and PageObject was created and passed into method arguments. You should explicitly specify
the types of required objects for Codeception to know what objects should be created for a test.
Dependency Injection will be described in the next chapter.

## StepObjects

StepObjects are great if you need some common functionality for a group of tests.
Let's say you are going to test an admin area of a site. You probably won't need the same actions from the admin area
while testing the front end, so it's a good idea to move these admin-specific tests into their own class.
We call such a classes StepObjects.

Lets create an Admin StepObject with the generator:

```
php vendor/bin/codecept generate:stepobject Acceptance Admin
```

You can supply optional action names. Enter one at a time, followed by a newline.
End with an empty line to continue to StepObject creation.

```
php vendor/bin/codecept generate:stepobject Acceptance Admin
Add action to StepObject class (ENTER to exit): loginAsAdmin
Add action to StepObject class (ENTER to exit):
StepObject was created in /tests/Acceptance/_support/Step/Acceptance/Admin.php
```

This will generate a class in `/tests/Support/Step/Acceptance/Admin.php` similar to this:

```php
<?php
namespace Tests\Support\Step\Acceptance;

use Tests\Support\AcceptanceTester;

class Admin extends AcceptanceTester
{
    public function loginAsAdmin()
    {
        $I = $this;
    }
}
```

As you see, this class is very simple. It extends the `AcceptanceTester` class,
meaning it can access all the methods and properties of `AcceptanceTester`.

The `loginAsAdmin` method may be implemented like this:

```php
<?php

namespace Tests\Support\Step\Acceptance;

use Tests\Support\AcceptanceTester;

class Admin extends AcceptanceTester
{
    public function loginAsAdmin()
    {
        $I = $this;
        $I->amOnPage('/admin');
        $I->fillField('username', 'admin');
        $I->fillField('password', '123456');
        $I->click('Login');
    }
}
```


StepObject can be instantiated automatically when used inside the Cest format:

```php
<?php
namespace Tests\Acceptance;

use Tests\Support\Step\Acceptance\Admin;

class UserCest
{
    function showUserProfile(Admin $I)
    {
        $I->loginAsAdmin();
        $I->amOnPage('/admin/profile');
        $I->see('Admin Profile', 'h1');
    }
}
```

If you have a complex interaction scenario, you may use several step objects in one test.
If you feel like adding too many actions into your Actor class
(which is AcceptanceTester in this case) consider moving some of them into separate StepObjects.

> Use StepObjects when you have multiple areas of applications or multiple roles.

## Conclusion

There are lots of ways to create reusable and readable tests. Group common actions together
and move them to an Actor class or StepObjects. Move CSS and XPath locators into PageObjects.
Write your custom actions and assertions in Helpers.
Scenario-driven tests should not contain anything more complex than `$I->doSomething` commands.
Following this approach will allow you to keep your tests clean, readable, stable and make them easy to maintain.


<div class="alert alert-warning"><a href="https://github.com/Codeception/codeception.github.com/edit/master/docs/ReusingTestCode.md"><strong>Improve</strong> this guide</a></div>
