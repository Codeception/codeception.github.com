---
layout: doc
title: Acceptance Tests - Codeception Docs
---

<div class="alert alert-success">💡 <b>You are reading docs for latest Codeception 5</b>. <a href="/docs/4.x/AcceptanceTests">Read for 4.x</a></div>

# Acceptance Testing

Acceptance testing can be performed by a non-technical person. That person can be your tester, manager or even client.
If you are developing a web-application (and you probably are) the tester needs nothing more than a web browser
to check that your site works correctly. You can reproduce an acceptance tester's actions in scenarios
and run them automatically. Codeception keeps tests clean and simple
as if they were recorded from the words of an actual acceptance tester.

It makes no difference what (if any) CMS or framework is used on the site. You can even test sites created with different
languages, like Java, .NET, etc. It's always a good idea to add tests to your website.
At least you will be sure that site features work after the latest changes were made.

## Sample Scenario

Let's say the first test you would want to run, would be signing in.
In order to write such a test, we still require basic knowledge of PHP and HTML:

```php
$I->amOnPage('/login');
$I->fillField('username', 'davert');
$I->fillField('password', 'qwerty');
$I->click('LOGIN');
$I->see('Welcome, Davert!');
```

**This scenario can be performed either by PhpBrowser or by a real browser through WebDriver**.

| | PhpBrowser | WebDriver |
| --- | --- | --- |
| Browser Engine | Guzzle + Symfony BrowserKit | Chrome or Firefox |
| JavaScript | No | Yes |
| `see`/`seeElement` checks if… | …text is present in the HTML source | …text is actually visible to the user |
| Access to HTTP response headers and status codes | Yes | No |
| System requirements | PHP with [ext-curl](https://php.net/manual/book.curl.php) | Chrome or Firefox; optionally with Selenium Standalone Server |
| Speed | Fast | Slow |

We will start writing our first acceptance tests with PhpBrowser.

## PhpBrowser

This is the fastest way to run acceptance tests since it doesn't require running an actual browser.
We use a PHP web scraper, which acts like a browser: It sends a request, then receives and parses the response.
Codeception uses [Guzzle](https://guzzlephp.org) and [Symfony BrowserKit](https://symfony.com/doc/current/components/browser_kit.html) to interact with HTML web pages.

Common PhpBrowser drawbacks:

* You can only click on links with valid URLs or form submit buttons
* You can't fill in fields that are not inside a form

We need to specify the `url` parameter in the acceptance suite config:

```yaml
# acceptance.suite.yml
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: http://www.example.com/
```

We should start by creating a test with the next command:

```
php vendor/bin/codecept g:cest acceptance Signin
```

It will be placed into `tests/Acceptance` directory.

```php
class SigninCest
{
    public function tryToTest(AcceptanceTester $I)
    {
    }
}
```

The `$I` object is used to write all interactions.
The methods of the `$I` object are taken from the [PhpBrowser Module](https://codeception.com/docs/modules/PhpBrowser). We will briefly describe them here:

```php
$I->amOnPage('/login');
```

We will assume that all actions starting with `am` and `have` describe the initial environment.
The `amOnPage` action sets the starting point of a test to the `/login` page.

With the `PhpBrowser` you can click the links and fill in the forms. That will probably be the majority of your actions.

#### Click

Emulates a click on valid anchors. The URL referenced in the `href` attribute will be opened.
As a parameter, you can specify the link name or a valid CSS or XPath selector.

```php
$I->click('Log in');
// CSS selector applied
$I->click('#login a');
// XPath
$I->click('//a[@id=login]');
// Using context as second argument
$I->click('Login', '.nav');
```

Codeception tries to locate an element by its text, name, CSS or XPath.
You can specify the locator type manually by passing an array as a parameter. We call this a **strict locator**.
Available strict locator types are:

* id
* name
* css
* xpath
* link
* class

```php
// By specifying locator type
$I->click(['link' => 'Login']);
$I->click(['class' => 'btn']);
```

There is a special class [`Codeception\Util\Locator`](https://codeception.com/docs/reference/Locator)
which may help you to generate complex XPath locators.
For instance, it can easily allow you to click an element on the last row of a table:

```php
$I->click('Edit' , \Codeception\Util\Locator::elementAt('//table/tr', -1));
```

#### Forms

Clicking links is probably not what takes the most time during the testing of a website.
The most routine waste of time goes into the testing of forms. Codeception provides several ways of testing forms.

Let's submit this sample form inside the Codeception test:

```html
<form method="post" action="/update" id="update_form">
     <label for="user_name">Name</label>
     <input type="text" name="user[name]" id="user_name" />
     <label for="user_email">Email</label>
     <input type="text" name="user[email]" id="user_email" />
     <label for="user_gender">Gender</label>
     <select id="user_gender" name="user[gender]">
          <option value="m">Male</option>
          <option value="f">Female</option>
     </select>
     <input type="submit" name="submitButton" value="Update" />
</form>
```

From a user's perspective, a form consists of fields which should be filled in, and then a submit button clicked:

```php
// we are using label to match user_name field
$I->fillField('Name', 'Miles');
// we can use input name or id
$I->fillField('user[email]','miles@davis.com');
$I->selectOption('Gender','Male');
$I->click('Update');
```

To match fields by their labels, you should write a `for` attribute in the `label` tag.

From the developer's perspective, submitting a form is just sending a valid POST request to the server.
Sometimes it's easier to fill in all of the fields at once and send the form without clicking a 'Submit' button.
A similar scenario can be rewritten with only one command:

```php
$I->submitForm('#update_form', array('user' => array(
     'name' => 'Miles',
     'email' => 'Davis',
     'gender' => 'm'
)));
```

The `submitForm` is not emulating a user's actions, but it's quite useful
in situations when the form is not formatted properly, for example, to discover that labels aren't set
or that fields have unclean names or badly written IDs, or the form is sent by a JavaScript call.

By default, `submitForm` doesn't send values for buttons.  The last parameter allows specifying
what button values should be sent, or button values can be explicitly specified in the second parameter:

```php
$I->submitForm('#update_form', array('user' => array(
     'name' => 'Miles',
     'email' => 'Davis',
     'gender' => 'm'
)), 'submitButton');
// this would have the same effect, but the value has to be explicitly specified
$I->submitForm('#update_form', array('user' => array(
     'name' => 'Miles',
     'email' => 'Davis',
     'gender' => 'm',
     'submitButton' => 'Update'
)));
```

##### Hiding Sensitive Data

If you need to fill in sensitive data (like passwords) and hide it in logs, 
you can pass instance `\Codeception\Step\Argument\PasswordArgument` with the data which needs to be hidden.

```php
use \Codeception\Step\Argument\PasswordArgument;

$I->amOnPage('/form/password_argument');
$I->fillField('password', new PasswordArgument('thisissecret'));
```

`thisissecret` will be filled into a form but it won't be shown in output and logs.

#### Assertions

In the `PhpBrowser` you can test the page contents.
In most cases, you just need to check that the required text or element is on the page.

The most useful method for this is `see()`:

```php
// We check that 'Thank you, Miles' is on the page.
$I->see('Thank you, Miles');
// We check that 'Thank you, Miles' is inside an element with 'notice' class.
$I->see('Thank you, Miles', '.notice');
// Or using XPath locators
$I->see('Thank you, Miles', "//table/tr[2]");
// We check this message is *not* on the page.
$I->dontSee('Form is filled incorrectly');
```

You can check that a specific HTML element exists (or doesn't) on a page:

```php
$I->seeElement('.notice');
$I->dontSeeElement('.error');
```

We also have other useful commands to perform checks. Please note that they all start with the `see` prefix:

```php
$I->seeInCurrentUrl('/user/miles');
$I->seeCheckboxIsChecked('#agree');
$I->seeInField('user[name]', 'Miles');
$I->seeLink('Login');
```

#### Conditional Assertions

Usually, as soon as any assertion fails, further assertions of this test will be skipped.
Sometimes you don't want this - maybe you have a long-running test and you want it to run to the end.
In this case, you can use conditional assertions.
Each `see` method has a corresponding `canSee` method, and `dontSee` has a `cantSee` method:

```php
$I->canSeeInCurrentUrl('/user/miles');
$I->canSeeCheckboxIsChecked('#agree');
$I->cantSeeInField('user[name]', 'Miles');
```

Each failed assertion will be shown in the test results, but it won't stop the test.

Conditional assertions are disabled in bootstrap setup. To enable them you should add corresponding step decorators to suite config:

> If you started project as `codecept init acceptance` they should be already enabled in config

```yaml
# in acceptance.suite.yml 
# or in codeception.yml inside suites section
step_decorators:
  - \Codeception\Step\ConditionalAssertion
```

Then rebuild actors with `codecept build` command.

#### Comments

Within a long scenario, you should describe what actions you are going to perform and what results should be achieved.
Comment methods like `amGoingTo`, `expect`, `expectTo` help you in making tests more descriptive:

```php
$I->amGoingTo('submit user form with invalid values');
$I->fillField('user[email]', 'miles');
$I->click('Update');
$I->expect('the form is not submitted');
$I->see('Form is filled incorrectly');
```

#### Grabbers

These commands retrieve data that can be used in the test. Imagine your site generates a password for every user
and you want to check that the user can log into the site using this password:

```php
$I->fillField('email', 'miles@davis.com');
$I->click('Generate Password');
$password = $I->grabTextFrom('#password');
$I->click('Login');
$I->fillField('email', 'miles@davis.com');
$I->fillField('password', $password);
$I->click('Log in!');
```

Grabbers allow you to get a single value from the current page with commands:

```php
$token = $I->grabTextFrom('.token');
$password = $I->grabTextFrom("descendant::input/descendant::*[@id = 'password']");
$api_key = $I->grabValueFrom('input[name=api]');
```

#### Cookies, URLs, Title, etc

Actions for cookies:

```php
$I->setCookie('auth', '123345');
$I->grabCookie('auth');
$I->seeCookie('auth');
```

Actions for checking the page title:

```php
$I->seeInTitle('Login');
$I->dontSeeInTitle('Register');
```

Actions for URLs:

```php
$I->seeCurrentUrlEquals('/login');
$I->seeCurrentUrlMatches('~^/users/(\d+)~');
$I->seeInCurrentUrl('user/1');
$user_id = $I->grabFromCurrentUrl('~^/user/(\d+)/~');
```

## WebDriver

A nice feature of Codeception is that most scenarios are similar, no matter of how they are executed.
`PhpBrowser` was emulating browser requests but how to execute such test in a real browser like Chrome or Firefox?
Selenium WebDriver can drive them so in our acceptance tests we can automate scenarios we used to test manually.
In such tests, we should concentrate more on **testing the UI** than on testing functionality.

"[WebDriver](https://www.w3.org/TR/webdriver/)" is the name of a protocol (specified by W3C)
to drive browsers automatically. This specification is implemented for all modern desktop and mobile browsers.
Codeception uses [php-webdriver/php-webdriver](https://github.com/php-webdriver/php-webdriver) as a PHP implementation of the WebDriver protocol.

To control the browsers you need to use a program or a service to start/stop browser sessions.
In the next section, we will overview the most popular solutions.

### Local Setup

### Selenium Server

[Selenium](https://www.selenium.dev) is required to launch and control browsers from Codeception.
Selenium Server is required to be installed and started before running tests.

The fastest way of getting Selenium is using [selenium-standalone](https://www.npmjs.com/package/selenium-standalone) NodeJS Package.
It automatically installs Selenium and all required dependencies and starts server. It requires **NodeJS and Java** to be installed.

```
npm install selenium-standalone -g
selenium-standalone install
```

Launch this command in a separate terminal:

```
selenium-standalone start
```

![](https://raw.githubusercontent.com/vvo/selenium-standalone/HEAD/screencast.gif)

Now, you are ready to run WebDriver tests using Codeception.

> Alternatively, Selenium Server can be installed manually. [Download it](https://www.selenium.dev/downloads/) from the official site and launch a server with Java: `java -jar selenium-server-....jar`. In this case ChromeDriver and GeckoDriver must be installed separately.

* For more information refer to [Installation Instructions](https://codeception.com/docs/modules/WebDriver#Selenium)
* Enable [RunProcess](https://codeception.com/extensions#RunProcess) extension to start/stop Selenium automatically *(optional)*.


### Configuration

To execute a test in a browser you need to change the suite configuration to use **WebDriver** module.

Modify your `acceptance.suite.yml` file:

```yaml
actor: AcceptanceTester
modules:
    enabled:
        - WebDriver:
            url: {{your site URL}}
            browser: chrome
```

See [WebDriver Module](https://codeception.com/docs/modules/WebDriver) for details.

Please note that actions executed in a browser will behave differently. For instance, `seeElement` won't just check that the element exists on a page,
but it will also check that element is actually visible to the user:

```php
$I->seeElement('#modal');
```

While WebDriver duplicates the functionality of PhpBrowser, it has its limitations: It can't check headers since browsers don't provide APIs for that.
WebDriver also adds browser-specific functionality:

#### Wait

While testing web application, you may need to wait for JavaScript events to occur. Due to its asynchronous nature,
complex JavaScript interactions are hard to test. That's why you may need to use waiters, actions with `wait` prefix.
They can be used to specify what event you expect to occur on a page, before continuing the test.

For example:

```php
$I->waitForElement('#agree_button', 30); // secs
$I->click('#agree_button');
```

In this case, we are waiting for the 'agree' button to appear and then click it. If it didn't appear after 30 seconds,
the test will fail. There are other `wait` methods you may use, like [waitForText](https://codeception.com/docs/modules/WebDriver#waitForText),
[waitForElementVisible](https://codeception.com/docs/modules/WebDriver#waitForElementVisible) and others.

If you don't know what exact element you need to wait for, you can simply pause execution with using `$I->wait()`

```php
$I->wait(3); // wait for 3 secs
```

#### SmartWait

It is possible to wait for elements pragmatically.
If a test uses element which is not on a page yet, Codeception will wait for few extra seconds before failing.
This feature is based on [Implicit Wait](https://www.seleniumhq.org/docs/04_webdriver_advanced.jsp#implicit-waits) of Selenium.
Codeception enables implicit wait only when searching for a specific element and disables in all other cases. Thus, the performance of a test is not affected.

SmartWait can be enabled by setting `wait` option in WebDriver config. It expects the number of seconds to wait. Example:

```yaml
wait: 5
```

With this config we have the following test:

```php
// we use wait: 5 instead of
// $I->waitForElement(['css' => '#click-me'], 5);
// to wait for element on page
$I->click(['css' => '#click-me']);
```

It is important to understand that SmartWait works only with a specific locators:

* `#locator` - CSS ID locator, works
* `//locator` - general XPath locator, works
* `['css' => 'button'']` - strict locator, works

But it won't be executed for all other locator types.
See the example:

```php
$I->click('Login'); // DISABLED, not a specific locator
$I->fillField('user', 'davert'); // DISABLED, not a specific locator
$I->fillField(['name' => 'password'], '123456'); // ENABLED, strict locator
$I->click('#login'); // ENABLED, locator is CSS ID
$I->see('Hello, Davert'); // DISABLED, Not a locator
$I->seeElement('#userbar'); // ENABLED
$I->dontSeeElement('#login'); // DISABLED, can't wait for element to hide
$I->seeNumberOfElements(['css' => 'button.link'], 5); // DISABLED, can wait only for one element
```

#### Retry

When it's hard to define condition to wait for, we can retry a command few times until it succeeds.
For instance, if you try to click while it's animating you can try to do it few times until it freezes.
Each action and assertion have an alias prefixed with `retry` which allows to retry a flaky command.

```php
$I->retryClick('flaky element');
$I->retrySee('Something changed');
```

Retry can be configured via `$I->retry()` command, where you can set number of retries and initial interval:
interval will be doubled on each unsuccessful execution.

```php
// Retry up to 6 sec: 4 times, for 400ms initial interval => 400ms + 800ms + 1600ms + 3200ms = 6000ms
$I->retry(4, 400);
```

`$I->retry` takes 2 parameters:
* number of retries (1 by default)
* initial interval (200ms by default)

Retries are disabled by default. To enable them you should add retry step decorators to suite config:

> If you started project as `codecept init acceptance` they should be already enabled in config

```yaml
# in acceptance.suite.yml 
# or in codeception.yml inside suites section
step_decorators:
  - \Codeception\Step\Retry
```

Then add `\Codeception\Lib\Actor\Shared\Retry` trait into `AcceptanceTester` class:

```php
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;
    
    use \Codeception\Lib\Actor\Shared\Retry; 
}
```

Run `codecept build` to recreate actions. New `retry*` actions are available for tests. 
Keep in mind, that you can change retry policy dynamically for each test.

#### Wait and Act

To combine `waitForElement` with actions inside that element you can use the [performOn](https://codeception.com/docs/modules/WebDriver#performOn) method.
Let's see how you can perform some actions inside an HTML popup:

```php
$I->performOn('.confirm', \Codeception\Util\ActionSequence::build()
    ->see('Warning')
    ->see('Are you sure you want to delete this?')
    ->click('Yes')
);
```
Alternatively, this can be executed using a callback, in this case the `WebDriver` instance is passed as argument

```php
$I->performOn('.confirm', function(\Codeception\Module\WebDriver $I) {
    $I->see('Warning');
    $I->see('Are you sure you want to delete this?');
    $I->click('Yes');
});
```

For more options see [`performOn()` reference](https://codeception.com/docs/modules/WebDriver#performOn).

#### A/B Testing

When a web site acts unpredictably you may need to react on that change.
This happens if site configured for A/B testing, or shows different popups, based on environment.

Since Codeception 3.0 you can have some actions to fail silently, if they are errored.
Let's say, you open a page and some times there is a popup which should be closed. 
We may try to hit the "close" button but if this action fails (no popup on page) we just continue the test.

This is how it can be implemented:

```php
$I->amOnPage('/');
$I->tryToClick('x', '.alert'); 
// continue execution
```

You can also use `tryTo` as condition for your tests:

```php
if ($I->tryToSeeElement('.alert')) {
    $I->waitForText('Do you accept cookies?');
    $I->click('Yes');
}
```

A/B testing is disabled by default. To enable it you should add corresponding step decorators to suite config:

> If you started project as `codecept init acceptance` in Codeception >= 3.0 they should be already enabled in config

```yaml
# in acceptance.suite.yml 
# or in codeception.yml inside suites section
step_decorators:
  - \Codeception\Step\TryTo
```

Then rebuild actors with `codecept build` command.

### Multi Session Testing

Codeception allows you to execute actions in concurrent sessions. The most obvious case for this
is testing realtime messaging between users on a site. In order to do it, you will need to launch two browser windows
at the same time for the same test. Codeception has a very smart concept for doing this. It is called **Friends**:

```php
$I->amOnPage('/messages');
$nick = $I->haveFriend('nick');
$nick->does(function(AcceptanceTester $I) {
    $I->amOnPage('/messages/new');
    $I->fillField('body', 'Hello all!');
    $I->click('Send');
    $I->see('Hello all!', '.message');
});
$I->wait(3);
$I->see('Hello all!', '.message');
```

In this case, we performed, or 'did', some actions in the second window with the `does` method on a friend object.

Sometimes you may want to close a webpage before the end of the test. For such cases, you may use `leave()`.
You can also specify roles for a friend:

```php
$nickAdmin = $I->haveFriend('nickAdmin', adminStep::class);
$nickAdmin->does(function(adminStep $I) {
    // Admin does ...
});
$nickAdmin->leave();
```

Multi session testing is disabled by default. To enable it, add `\Codeception\Lib\Actor\Shared\Friend` into `AcceptanceTester`.

```php
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;
    
    use \Codeception\Lib\Actor\Shared\Friend; 
}
```

### Cloud Testing

Some environments are hard to be reproduced manually, testing Internet Explorer 6-8 on Windows XP may be a hard thing,
especially if you don't have Windows XP installed. This is where Cloud Testing services come to help you.
Services such as [SauceLabs](https://saucelabs.com), [BrowserStack](https://www.browserstack.com/)
and [others](https://codeception.com/docs/modules/WebDriver#Cloud-Testing) can create virtual machines on demand
and set up Selenium Server and the desired browser. Tests are executed on a remote machine in a cloud,
to access local files cloud testing services provide a special application called **Tunnel**.
Tunnel operates on a secured protocol and allows browsers executed in a cloud to connect to a local web server.

Cloud Testing services work with the standard WebDriver protocol. This makes setting up cloud testing really easy.
You just need to set the [WebDriver configuration](https://codeception.com/docs/modules/WebDriver#Cloud-Testing) to:

* specify the host to connect to (depends on the cloud provider)
* authentication details (to use your account)
* browser
* OS

We recommend using [params](https://codeception.com/docs/06-ModulesAndHelpers#Dynamic-Configuration-With-Params)
to provide authorization credentials.

It should be mentioned that Cloud Testing services are not free. You should investigate their pricing models
and choose one that fits your needs. They also may work painfully slowly if ping times between the local server
and the cloud is too high. This may lead to random failures in acceptance tests.

### Debugging

Codeception modules can print valuable information while running.
Just execute tests with the `--debug` option to see running details. For any custom output use the `codecept_debug` function:

```php
codecept_debug($I->grabTextFrom('#name'));
```

On each failure, the snapshot of the last shown page will be stored in the `tests/_output` directory.
PhpBrowser will store the HTML code and WebDriver will save a screenshot of the page.

Additional debugging features by Codeception:

* [Interactive Pause](https://codeception.com/docs/02-GettingStarted#Interactive-Pause) is a REPL that allows to type and check commands for instant feedback.
* [Recorder Extension](https://codeception.com/addons#CodeceptionExtensionRecorder) allows to record tests step-by-steps and show them in slideshow

### Common Cases

Let's see how common problems of acceptance testing can be solved with Codeception.

#### Login

It is recommended to put widely used actions inside an Actor class. A good example is the `login` action
which would probably be actively involved in acceptance or functional testing:

```php
class AcceptanceTester extends \Codeception\Actor
{
    // do not ever remove this line!
    use _generated\AcceptanceTesterActions;

    public function login($name, $password)
    {
        $I = $this;
        $I->amOnPage('/login');
        $I->submitForm('#loginForm', [
            'login' => $name,
            'password' => $password
        ]);
        $I->see($name, '.navbar');
    }
}
```

Now you can use the `login` method inside your tests:

```php
// $I is AcceptanceTester
$I->login('miles', '123456');
```

However, implementing all actions for reuse in a single actor class may lead to
breaking the [Single Responsibility Principle](https://en.wikipedia.org/wiki/Single_responsibility_principle).

#### Single Login

If you need to authorize a user for each test, you can do so by submitting the login form at the beginning of every test.
Running those steps takes time, and in the case of Selenium tests (which are slow by themselves)
that time loss can become significant.

Codeception allows you to share cookies between tests, so a test user can stay logged in for other tests.

Let's improve the code of our `login` method, executing the form submission only once
and restoring the session from cookies for each subsequent login function call:

```php
public function login($name, $password)
    {
        $I = $this;
        // if snapshot exists - skipping login
        if ($I->loadSessionSnapshot('login')) {
            return;
        }
        // logging in
        $I->amOnPage('/login');
        $I->submitForm('#loginForm', [
            'login' => $name,
            'password' => $password
        ]);
        $I->see($name, '.navbar');
         // saving snapshot
        $I->saveSessionSnapshot('login');
    }
```

Note that session restoration only works for `WebDriver` modules
(modules implementing `Codeception\Lib\Interfaces\SessionSnapshot`).


### Custom Browser Sessions

By default, WebDriver module is configured to automatically start browser before the test and stop afterward.
However, this can be switched off with `start: false` module configuration.
To start a browser you will need to write corresponding methods in Acceptance [Helper](https://codeception.com/docs/06-ModulesAndHelpers#Helpers).

WebDriver module provides advanced methods for the browser session, however, they can only be used from Helpers.

* [_initializeSession](https://codeception.com/docs/modules/WebDriver#_initializeSession) - starts a new browser session
* [_closeSession](https://codeception.com/docs/modules/WebDriver#_closeSession) - stops the browser session
* [_restart](https://codeception.com/docs/modules/WebDriver#_restart) - updates configuration and restarts browser
* [_capabilities](https://codeception.com/docs/modules/WebDriver#_capabilities) - set [desired capabilities](https://github.com/SeleniumHQ/selenium/wiki/DesiredCapabilities) programmatically.

Those methods can be used to create custom commands like `$I->startBrowser()` or used in [before/after](https://codeception.com/docs/06-ModulesAndHelpers#Hooks) hooks.

## Conclusion

Writing acceptance tests with Codeception and PhpBrowser is a good start.
You can easily test your Joomla, Drupal, WordPress sites, as well as those made with frameworks.
Writing acceptance tests is like describing a tester's actions in PHP. They are quite readable and very easy to write.
If you need to access the database, you can use the [Db Module](https://codeception.com/docs/modules/Db).

<div class="alert alert-warning"><a href="https://github.com/Codeception/codeception.github.com/edit/master/docs/AcceptanceTests.md"><strong>Improve</strong> this guide</a></div>
