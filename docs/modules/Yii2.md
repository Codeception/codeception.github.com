---
layout: doc
title: Yii2 - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Yii2/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-yii2/tree/master/src/Codeception/Module/Yii2.php"><strong>source</strong></a></div>

# Yii2
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-yii2

{% endhighlight %}

Alternatively, you can enable `Yii2` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



This module provides integration with [Yii framework](https://www.yiiframework.com/) (2.0).

It initializes the Yii framework in a test environment and provides actions
for functional testing.

### Application state during testing

This section details what you can expect when using this module.

* You will get a fresh application in `\Yii::$app` at the start of each test
  (available in the test and in `_before()`).
* Inside your test you may change application state; however these changes
  will be lost when doing a request if you have enabled `recreateApplication`.
* When executing a request via one of the request functions the `request`
  and `response` component are both recreated.
* After a request the whole application is available for inspection /
  interaction.
* You may use multiple database connections, each will use a separate
  transaction; to prevent accidental mistakes we will warn you if you try to
  connect to the same database twice but we cannot reuse the same connection.

### Config

* `configFile` *required* - path to the application config file. The file
  should be configured for the test environment and return a configuration
  array.
* `applicationClass` - Fully qualified class name for the application. There are
  several ways to define the application class. Either via a `class` key in the Yii
  config, via specifying this codeception module configuration value or let codeception
  use its default value `yii\web\Application`. In a standard Yii application, this
  value should be either `yii\console\Application`, `yii\web\Application` or unset.
* `entryUrl` - initial application url (default: http://localhost/index-test.php).
* `entryScript` - front script title (like: index-test.php). If not set it's
  taken from `entryUrl`.
* `transaction` - (default: `true`) wrap all database connection inside a
  transaction and roll it back after the test. Should be disabled for
  acceptance testing.
* `cleanup` - (default: `true`) cleanup fixtures after the test
* `ignoreCollidingDSN` - (default: `false`) When 2 database connections use
  the same DSN but different settings an exception will be thrown. Set this to
  true to disable this behavior.
* `fixturesMethod` - (default: `_fixtures`) Name of the method used for
  creating fixtures.
* `responseCleanMethod` - (default: `clear`) Method for cleaning the
  response object. Note that this is only for multiple requests inside a
  single test case. Between test cases the whole application is always
  recreated.
* `requestCleanMethod` - (default: `recreate`) Method for cleaning the
  request object. Note that this is only for multiple requests inside a single
  test case. Between test cases the whole application is always recreated.
* `recreateComponents` - (default: `[]`) Some components change their state
  making them unsuitable for processing multiple requests. In production
  this is usually not a problem since web apps tend to die and start over
  after each request. This allows you to list application components that
  need to be recreated before each request.  As a consequence, any
  components specified here should not be changed inside a test since those
  changes will get discarded.
* `recreateApplication` - (default: `false`) whether to recreate the whole
  application before each request

You can use this module by setting params in your `functional.suite.yml`:

{% highlight yaml %}

actor: FunctionalTester
modules:
    enabled:
        - Yii2:
            configFile: 'path/to/config.php'

{% endhighlight %}

### Parts

By default all available methods are loaded, but you can also use the `part`
option to select only the needed actions and to avoid conflicts. The
available parts are:

* `init` - use the module only for initialization (for acceptance tests).
* `orm` - include only `haveRecord/grabRecord/seeRecord/dontSeeRecord` actions.
* `fixtures` - use fixtures inside tests with `haveFixtures/grabFixture/grabFixtures` actions.
* `email` - include email actions `seeEmailsIsSent/grabLastSentEmail/...`

See [WebDriver module](https://codeception.com/docs/modules/WebDriver#Loading-Parts-from-other-Modules)
for general information on how to load parts of a framework module.

#### Example (`acceptance.suite.yml`)

{% highlight yaml %}

actor: AcceptanceTester
modules:
    enabled:
        - WebDriver:
            url: http://127.0.0.1:8080/
            browser: firefox
        - Yii2:
            configFile: 'config/test.php'
            part: orm # allow to use AR methods
            transaction: false # don't wrap test in transaction
            cleanup: false # don't cleanup the fixtures
            entryScript: index-test.php

{% endhighlight %}

### Fixtures

This module allows to use
[fixtures](https://www.yiiframework.com/doc-2.0/guide-test-fixtures.html)
inside a test. There are two ways to do that. Fixtures can either be loaded
with the [haveFixtures](#haveFixtures) method inside a test:

{% highlight php %}

<?php
$I->haveFixtures(['posts' => PostsFixture::class]);

{% endhighlight %}

or, if you need to load fixtures before the test, you
can specify fixtures in the `_fixtures` method of a test case:

{% highlight php %}

<?php
// inside Cest file or Codeception\TestCase\Unit
public function _fixtures()
{
    return ['posts' => PostsFixture::class]
}

{% endhighlight %}

### URL

With this module you can also use Yii2's URL format for all codeception
commands that expect a URL:

{% highlight php %}

<?php
$I->amOnPage('index-test.php?site/index');
$I->amOnPage('http://localhost/index-test.php?site/index');
$I->sendAjaxPostRequest(['/user/update', 'id' => 1], ['UserForm[name]' => 'G.Hopper']);

{% endhighlight %}

### Status

Maintainer: **samdark**
Stability: **stable**

@property \Codeception\Lib\Connector\Yii2 $client

### Actions

#### _findElements

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param mixed` $locator
* `return iterable`

Locates element using available Codeception locator types:

* XPath
* CSS
* Strict Locator

Use it in Helpers or GroupObject or Extension classes:

{% highlight php %}

<?php
$els = $this->getModule('Yii2')->_findElements('.items');
$els = $this->getModule('Yii2')->_findElements(['name' => 'username']);

$editLinks = $this->getModule('Yii2')->_findElements(['link' => 'Edit']);
// now you can iterate over $editLinks and check that all them have valid hrefs

{% endhighlight %}

WebDriver module returns `Facebook\WebDriver\Remote\RemoteWebElement` instances
PhpBrowser and Framework modules return `Symfony\Component\DomCrawler\Crawler` instances


#### _getResponseContent

*hidden API method, expected to be used from Helper classes*

* `api` 
* `throws ModuleException`
* `return string`

Returns content of the last response
Use it in Helpers when you want to retrieve response of request performed by another module.

{% highlight php %}

<?php
// in Helper class
public function seeResponseContains($text)
{
   $this->assertStringContainsString($text, $this->getModule('Yii2')->_getResponseContent(), "response contains");
}

{% endhighlight %}


#### _loadPage

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param string` $method
* `param string` $uri
* `param array` $parameters
* `param array` $files
* `param array` $server
* `param ?string` $content
* `return void`

Opens a page with arbitrary request parameters.

Useful for testing multi-step forms on a specific step.

{% highlight php %}

<?php
// in Helper class
public function openCheckoutFormStep2($orderId) {
    $this->getModule('Yii2')->_loadPage('POST', '/checkout/step2', ['order' => $orderId]);
}

{% endhighlight %}


#### _request

*hidden API method, expected to be used from Helper classes*

* `api` 
* `see` `_loadPage`
* `param string` $method
* `param string` $uri
* `param array` $parameters
* `param array` $files
* `param array` $server
* `param ?string` $content
* `throws ExternalUrlException|ModuleException`
* `return ?string`

Send custom request to a backend using method, uri, parameters, etc.

Use it in Helpers to create special request actions, like accessing API
Returns a string with response body.

{% highlight php %}

<?php
// in Helper class
public function createUserByApi($name) {
    $userData = $this->getModule('Yii2')->_request('POST', '/api/v1/users', ['name' => $name]);
    $user = json_decode($userData);
    return $user->id;
}

{% endhighlight %}
Does not load the response into the module so you can't interact with response page (click, fill forms).
To load arbitrary page for interaction, use `_loadPage` method.


#### _savePageSource

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param string` $filename
* `return void`

Saves page source of to a file

{% highlight php %}

$this->getModule('Yii2')->_savePageSource(codecept_output_dir().'page.html');

{% endhighlight %}


#### amHttpAuthenticated

* `param string` $username
* `param string` $password
* `return void`

Authenticates user for HTTP_AUTH


#### amLoggedInAs

* `param ` $user
* `throws \Codeception\Exception\ModuleException`

Authenticates a user on a site without submitting a login form.

Use it for fast pragmatic authorization in functional tests.

{% highlight php %}

<?php
// User is found by id
$I->amLoggedInAs(1);

// User object is passed as parameter
$admin = \app\models\User::findByUsername('admin');
$I->amLoggedInAs($admin);

{% endhighlight %}
Requires the `user` component to be enabled and configured.


#### amOnPage

* `param string|array` $page the URI or route in array format
* `return void`

Opens the page for the given relative URI or route.

{% highlight php %}

<?php
// opens front page
$I->amOnPage('/');
// opens /register page
$I->amOnPage('/register');

{% endhighlight %}


#### amOnRoute

* `param string` $route A route
* `param array` $params Additional route parameters
* `return void`

Similar to `amOnPage` but accepts a route as first argument and params as second

{% highlight yaml %}
$I->amOnRoute('site/view', ['page' => 'about']);

{% endhighlight %}


#### attachFile

* `param ` $field
* `param string` $filename
* `return void`

Attaches a file relative to the Codeception `_data` directory to the given file upload field.

{% highlight php %}

<?php
// file is stored in 'tests/_data/prices.xls'
$I->attachFile('input[@type="file"]', 'prices.xls');

{% endhighlight %}


#### checkOption

* `param ` $option
* `return void`

Ticks a checkbox. For radio buttons, use the `selectOption` method instead.

{% highlight php %}

<?php
$I->checkOption('#agree');

{% endhighlight %}


#### click

* `param string|array` $link
* `param ` $context
* `return void`

Perform a click on a link or a button, given by a locator.

If a fuzzy locator is given, the page will be searched for a button, link, or image matching the locator string.
For buttons, the "value" attribute, "name" attribute, and inner text are searched.
For links, the link text is searched.
For images, the "alt" attribute and inner text of any parent links are searched.

The second parameter is a context (CSS or XPath locator) to narrow the search.

Note that if the locator matches a button of type `submit`, the form will be submitted.

{% highlight php %}

<?php
// simple link
$I->click('Logout');
// button of form
$I->click('Submit');
// CSS button
$I->click('#form input[type=submit]');
// XPath
$I->click('//form/*[@type="submit"]');
// link in context
$I->click('Logout', '#nav');
// using strict locator
$I->click(['link' => 'Login']);

{% endhighlight %}


#### createAndSetCsrfCookie

* `param string` $val The value of the CSRF token
* `return string[]` Returns an array containing the name of the CSRF param and the masked CSRF token.

Creates the CSRF Cookie.


#### deleteHeader

* `param string` $name the name of the header to delete.
* `return void`

Deletes the header with the passed name.  Subsequent requests
will not have the deleted header in its request.

Example:
{% highlight php %}

<?php
$I->haveHttpHeader('X-Requested-With', 'Codeception');
$I->amOnPage('test-headers.php');
// ...
$I->deleteHeader('X-Requested-With');
$I->amOnPage('some-other-page.php');

{% endhighlight %}


#### dontSee

* `param string` $text
* `param array|string` $selector optional
* `return void`

Checks that the current page doesn't contain the text specified (case insensitive).

Give a locator as the second parameter to match a specific region.

{% highlight php %}

<?php
$I->dontSee('Login');                         // I can suppose user is already logged in
$I->dontSee('Sign Up','h1');                  // I can suppose it's not a signup page
$I->dontSee('Sign Up','//body/h1');           // with XPath
$I->dontSee('Sign Up', ['css' => 'body h1']); // with strict CSS locator

{% endhighlight %}

Note that the search is done after stripping all HTML tags from the body,
so `$I->dontSee('strong')` will fail on strings like:

  - `<p>I am Stronger than thou</p>`
  - `<script>document.createElement('strong');</script>`

But will ignore strings like:

  - `<strong>Home</strong>`
  - `<div class="strong">Home</strong>`
  - `<!-- strong -->`

For checking the raw source code, use `seeInSource()`.


#### dontSeeCheckboxIsChecked

* `param ` $checkbox
* `return void`

Check that the specified checkbox is unchecked.

{% highlight php %}

<?php
$I->dontSeeCheckboxIsChecked('#agree'); // I suppose user didn't agree to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user didn't check the first checkbox in form.

{% endhighlight %}


#### dontSeeCookie

* `param ` $cookie
* `param ` $params
* `return mixed|void`

Checks that there isn't a cookie with the given name.

You can set additional cookie params like `domain`, `path` as array passed in last argument.


#### dontSeeCurrentUrlEquals

* `param string` $uri
* `return void`

Checks that the current URL doesn't equal the given string.

Unlike `dontSeeInCurrentUrl`, this only matches the full URL.

{% highlight php %}

<?php
// current url is not root
$I->dontSeeCurrentUrlEquals('/');

{% endhighlight %}


#### dontSeeCurrentUrlMatches

* `param string` $uri
* `return void`

Checks that current url doesn't match the given regular expression.

{% highlight php %}

<?php
// to match root url
$I->dontSeeCurrentUrlMatches('~^/users/(\d+)~');

{% endhighlight %}


#### dontSeeElement

* `param ` $selector
* `param array` $attributes
* `return void`

Checks that the given element is invisible or not present on the page.

You can also specify expected attributes of this element.

{% highlight php %}

<?php
$I->dontSeeElement('.error');
$I->dontSeeElement('//form/input[1]');
$I->dontSeeElement('input', ['name' => 'login']);
$I->dontSeeElement('input', ['value' => '123456']);

{% endhighlight %}


#### dontSeeEmailIsSent

* `part` email
* `return void`

Checks that no email was sent


#### dontSeeInCurrentUrl

* `param string` $uri
* `return void`

Checks that the current URI doesn't contain the given string.

{% highlight php %}

<?php
$I->dontSeeInCurrentUrl('/users/');

{% endhighlight %}


#### dontSeeInField

* `param string|array` $field
* `param ` $value
* `return void`

Checks that an input field or textarea doesn't contain the given value.

For fuzzy locators, the field is matched by label text, CSS and XPath.

{% highlight php %}

<?php
$I->dontSeeInField('Body','Type your comment here');
$I->dontSeeInField('form textarea[name=body]','Type your comment here');
$I->dontSeeInField('form input[type=hidden]','hidden_value');
$I->dontSeeInField('#searchform input','Search');
$I->dontSeeInField('//form/*[@name=search]','Search');
$I->dontSeeInField(['name' => 'search'], 'Search');

{% endhighlight %}


#### dontSeeInFormFields

* `param ` $formSelector
* `param array` $params
* `return void`

Checks if the array of form parameters (name => value) are not set on the form matched with
the passed selector.

{% highlight php %}

<?php
$I->dontSeeInFormFields('form[name=myform]', [
     'input1' => 'non-existent value',
     'input2' => 'other non-existent value',
]);

{% endhighlight %}

To check that an element hasn't been assigned any one of many values, an array can be passed
as the value:

{% highlight php %}

<?php
$I->dontSeeInFormFields('.form-class', [
     'fieldName' => [
         'This value shouldn\'t be set',
         'And this value shouldn\'t be set',
     ],
]);

{% endhighlight %}

Additionally, checkbox values can be checked with a boolean.

{% highlight php %}

<?php
$I->dontSeeInFormFields('#form-id', [
     'checkbox1' => true,        // fails if checked
     'checkbox2' => false,       // fails if unchecked
]);

{% endhighlight %}


#### dontSeeInSource

* `param string` $raw
* `return void`

Checks that the current page contains the given string in its
raw source code.

{% highlight php %}

<?php
$I->dontSeeInSource('<h1>Green eggs &amp; ham</h1>');

{% endhighlight %}


#### dontSeeInTitle

* `param ` $title
* `return mixed|void`

Checks that the page title does not contain the given string.


#### dontSeeLink

* `param string` $text
* `param string` $url
* `return void`

Checks that the page doesn't contain a link with the given string.

If the second parameter is given, only links with a matching "href" attribute will be checked.

{% highlight php %}

<?php
$I->dontSeeLink('Logout'); // I suppose user is not logged in
$I->dontSeeLink('Checkout now', '/store/cart.php');

{% endhighlight %}


#### dontSeeOptionIsSelected

* `param ` $selector
* `param ` $optionText
* `return mixed|void`

Checks that the given option is not selected.

{% highlight php %}

<?php
$I->dontSeeOptionIsSelected('#form input[name=payment]', 'Visa');

{% endhighlight %}


#### dontSeeRecord

* `part` orm
* `param ` $model
* `param array` $attributes
* `return void`

Checks that a record does not exist in the database.

{% highlight php %}

$I->dontSeeRecord('app\models\User', array('name' => 'davert'));

{% endhighlight %}


#### dontSeeResponseCodeIs

* `param int` $code
* `return void`

Checks that response code is equal to value provided.

{% highlight php %}

<?php
$I->dontSeeResponseCodeIs(200);

// recommended \Codeception\Util\HttpCode
$I->dontSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);

{% endhighlight %}


#### fillField

* `param ` $field
* `param ` $value
* `return void`

Fills a text field or textarea with the given string.

{% highlight php %}

<?php
$I->fillField("//input[@type='text']", "Hello World!");
$I->fillField(['name' => 'email'], 'jon@example.com');

{% endhighlight %}


#### followRedirect

* `return void`

Follow pending redirect if there is one.

{% highlight php %}

<?php
$I->followRedirect();

{% endhighlight %}


#### getInternalDomains

* `return array`

Returns a list of regex patterns for recognized domain names


#### grabAttributeFrom

* `param ` $cssOrXpath
* `param string` $attribute
* `return mixed`

Grabs the value of the given attribute value from the given element.

Fails if element is not found.

{% highlight php %}

<?php
$I->grabAttributeFrom('#tooltip', 'title');

{% endhighlight %}


#### grabComponent

@deprecated
* `param ` $component
* `throws \Codeception\Exception\ModuleException`
* `return mixed`

Gets a component from the Yii container. Throws an exception if the
component is not available

{% highlight php %}

<?php
$mailer = $I->grabComponent('mailer');

{% endhighlight %}


#### grabCookie

* `param string` $cookie
* `param array` $params
* `return mixed`

Grabs a cookie value.

You can set additional cookie params like `domain`, `path` in array passed as last argument.
If the cookie is set by an ajax request (XMLHttpRequest), there might be some delay caused by the browser, so try `$I->wait(0.1)`.


#### grabFixture

* `part` fixtures
* `param ` $name
* `param ` $index
* `throws \Codeception\Exception\ModuleException` if the fixture is not found
* `return mixed`

Gets a fixture by name.

Returns a Fixture instance. If a fixture is an instance of
`\yii\test\BaseActiveFixture` a second parameter can be used to return a
specific model:

{% highlight php %}

<?php
$I->haveFixtures(['users' => UserFixture::class]);

$users = $I->grabFixture('users');

// get first user by key, if a fixture is an instance of ActiveFixture
$user = $I->grabFixture('users', 'user1');

{% endhighlight %}


#### grabFixtures

* `part` fixtures
* `return array`

Returns all loaded fixtures.

Array of fixture instances


#### grabFromCurrentUrl

* `param ?string` $uri
* `return mixed`

Executes the given regular expression against the current URI and returns the first capturing group.

If no parameters are provided, the full URI is returned.

{% highlight php %}

<?php
$user_id = $I->grabFromCurrentUrl('~^/user/(\d+)/~');
$uri = $I->grabFromCurrentUrl();

{% endhighlight %}


#### grabLastSentEmail

* `part` email
* `return object`

Returns the last sent email:

{% highlight php %}

<?php
$I->seeEmailIsSent();
$message = $I->grabLastSentEmail();
$I->assertEquals('admin@site,com', $message->getTo());

{% endhighlight %}


#### grabMultiple

* `param ` $cssOrXpath
* `param ?string` $attribute
* `return string[]`

Grabs either the text content, or attribute values, of nodes
matched by $cssOrXpath and returns them as an array.

{% highlight html %}

<a href="#first">First</a>
<a href="#second">Second</a>
<a href="#third">Third</a>

{% endhighlight %}

{% highlight php %}

<?php
// would return ['First', 'Second', 'Third']
$aLinkText = $I->grabMultiple('a');

// would return ['#first', '#second', '#third']
$aLinks = $I->grabMultiple('a', 'href');

{% endhighlight %}


#### grabPageSource

* `throws ModuleException` if no page was opened.
* `return string` Current page source code.

Grabs current page source code.


#### grabRecord

* `part` orm
* `param ` $model
* `param array` $attributes
* `return mixed`

Retrieves a record from the database

{% highlight php %}

$category = $I->grabRecord('app\models\User', array('name' => 'davert'));

{% endhighlight %}


#### grabSentEmails

* `part` email
* `throws \Codeception\Exception\ModuleException`
* `return array`

Returns array of all sent email messages.

Each message implements the `yii\mail\MessageInterface` interface.
Useful to perform additional checks using the `Asserts` module:

{% highlight php %}

<?php
$I->seeEmailIsSent();
$messages = $I->grabSentEmails();
$I->assertEquals('admin@site,com', $messages[0]->getTo());

{% endhighlight %}


#### grabTextFrom

* `param ` $cssOrXPathOrRegex
* `return mixed`

Finds and returns the text contents of the given element.

If a fuzzy locator is used, the element is found using CSS, XPath,
and by matching the full page source by regular expression.

{% highlight php %}

<?php
$heading = $I->grabTextFrom('h1');
$heading = $I->grabTextFrom('descendant-or-self::h1');
$value = $I->grabTextFrom('~<input value=(.*?)]~sgi'); // match with a regex

{% endhighlight %}


#### grabValueFrom

* `param ` $field
* `return mixed`

Finds the value for the given form field.

If a fuzzy locator is used, the field is found by field name, CSS, and XPath.

{% highlight php %}

<?php
$name = $I->grabValueFrom('Name');
$name = $I->grabValueFrom('input[name=username]');
$name = $I->grabValueFrom('descendant-or-self::form/descendant::input[@name = 'username']');
$name = $I->grabValueFrom(['name' => 'username']);

{% endhighlight %}


#### haveFixtures

* `part` fixtures
* `param ` $fixtures

Creates and loads fixtures from a config.

The signature is the same as for the `fixtures()` method of `yii\test\FixtureTrait`

{% highlight php %}

<?php
$I->haveFixtures([
    'posts' => PostsFixture::class,
    'user' => [
        'class' => UserFixture::class,
        'dataFile' => '@tests/_data/models/user.php',
     ],
]);

{% endhighlight %}

Note: if you need to load fixtures before a test (probably before the
cleanup transaction is started; `cleanup` option is `true` by default),
you can specify the fixtures in the `_fixtures()` method of a test case

{% highlight php %}

<?php
// inside Cest file or Codeception\TestCase\Unit
public function _fixtures(){
    return [
        'user' => [
            'class' => UserFixture::class,
            'dataFile' => codecept_data_dir() . 'user.php'
        ]
    ];
}

{% endhighlight %}
instead of calling `haveFixtures` in Cest `_before`


#### haveHttpHeader

* `param string` $name the name of the request header
* `param string` $value the value to set it to for subsequent
       requests
* `return void`

Sets the HTTP header to the passed value - which is used on
subsequent HTTP requests through PhpBrowser.

Example:
{% highlight php %}

<?php
$I->haveHttpHeader('X-Requested-With', 'Codeception');
$I->amOnPage('test-headers.php');

{% endhighlight %}

To use special chars in Header Key use HTML Character Entities:
Example:
Header with underscore - 'Client_Id'
should be represented as - 'Client&#x0005F;Id' or 'Client&#95;Id'

{% highlight php %}

<?php
$I->haveHttpHeader('Client&#95;Id', 'Codeception');

{% endhighlight %}


#### haveRecord

* `part` orm
* `param ` $model
* `param array` $attributes
* `return mixed`

Inserts a record into the database.

{% highlight php %}

<?php
$user_id = $I->haveRecord('app\models\User', array('name' => 'Davert'));
?>

{% endhighlight %}


#### haveServerParameter

* `param string` $name
* `param string` $value
* `return void`

Sets SERVER parameter valid for all next requests.

{% highlight php %}

$I->haveServerParameter('name', 'value');

{% endhighlight %}


#### makeHtmlSnapshot

* `param ?string` $name
* `return void`

Use this method within an [interactive pause](https://codeception.com/docs/02-GettingStarted#Interactive-Pause) to save the HTML source code of the current page.

{% highlight php %}

<?php
$I->makeHtmlSnapshot('edit_page');
// saved to: tests/_output/debug/edit_page.html
$I->makeHtmlSnapshot();
// saved to: tests/_output/debug/2017-05-26_14-24-11_4b3403665fea6.html

{% endhighlight %}


#### moveBack

* `param int` $numberOfSteps (default value 1)
* `return void`

Moves back in history.


#### resetCookie

* `param ` $cookie
* `param ` $params
* `return mixed|void`

Unsets cookie with the given name.

You can set additional cookie params like `domain`, `path` in array passed as last argument.


#### see

* `param string` $text
* `param array|string` $selector optional
* `return void`

Checks that the current page contains the given string (case insensitive).

You can specify a specific HTML element (via CSS or XPath) as the second
parameter to only search within that element.

{% highlight php %}

<?php
$I->see('Logout');                        // I can suppose user is logged in
$I->see('Sign Up', 'h1');                 // I can suppose it's a signup page
$I->see('Sign Up', '//body/h1');          // with XPath
$I->see('Sign Up', ['css' => 'body h1']); // with strict CSS locator

{% endhighlight %}

Note that the search is done after stripping all HTML tags from the body,
so `$I->see('strong')` will return true for strings like:

  - `<p>I am Stronger than thou</p>`
  - `<script>document.createElement('strong');</script>`

But will *not* be true for strings like:

  - `<strong>Home</strong>`
  - `<div class="strong">Home</strong>`
  - `<!-- strong -->`

For checking the raw source code, use `seeInSource()`.


#### seeCheckboxIsChecked

* `param ` $checkbox
* `return void`

Checks that the specified checkbox is checked.

{% highlight php %}

<?php
$I->seeCheckboxIsChecked('#agree'); // I suppose user agreed to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user agreed to terms, If there is only one checkbox in form.
$I->seeCheckboxIsChecked('//form/input[@type=checkbox and @name=agree]');

{% endhighlight %}


#### seeCookie

* `param ` $cookie
* `param ` $params
* `return mixed|void`

Checks that a cookie with the given name is set.

You can set additional cookie params like `domain`, `path` as array passed in last argument.

{% highlight php %}

<?php
$I->seeCookie('PHPSESSID');

{% endhighlight %}


#### seeCurrentUrlEquals

* `param string` $uri
* `return void`

Checks that the current URL is equal to the given string.

Unlike `seeInCurrentUrl`, this only matches the full URL.

{% highlight php %}

<?php
// to match root url
$I->seeCurrentUrlEquals('/');

{% endhighlight %}


#### seeCurrentUrlMatches

* `param string` $uri
* `return void`

Checks that the current URL matches the given regular expression.

{% highlight php %}

<?php
// to match root url
$I->seeCurrentUrlMatches('~^/users/(\d+)~');

{% endhighlight %}


#### seeElement

* `param ` $selector
* `param array` $attributes
* `return void`

Checks that the given element exists on the page and is visible.

You can also specify expected attributes of this element.

{% highlight php %}

<?php
$I->seeElement('.error');
$I->seeElement('//form/input[1]');
$I->seeElement('input', ['name' => 'login']);
$I->seeElement('input', ['value' => '123456']);

// strict locator in first arg, attributes in second
$I->seeElement(['css' => 'form input'], ['name' => 'login']);

{% endhighlight %}


#### seeEmailIsSent

* `part` email
* `param int` $num
* `throws \Codeception\Exception\ModuleException`
* `return void`

Checks that an email is sent.

{% highlight php %}

<?php
// check that at least 1 email was sent
$I->seeEmailIsSent();

// check that only 3 emails were sent
$I->seeEmailIsSent(3);

{% endhighlight %}


#### seeInCurrentUrl

* `param string` $uri
* `return void`

Checks that current URI contains the given string.

{% highlight php %}

<?php
// to match: /home/dashboard
$I->seeInCurrentUrl('home');
// to match: /users/1
$I->seeInCurrentUrl('/users/');

{% endhighlight %}


#### seeInField

* `param string|array` $field
* `param ` $value
* `return void`

Checks that the given input field or textarea *equals* (i.e. not just contains) the given value.

Fields are matched by label text, the "name" attribute, CSS, or XPath.

{% highlight php %}

<?php
$I->seeInField('Body','Type your comment here');
$I->seeInField('form textarea[name=body]','Type your comment here');
$I->seeInField('form input[type=hidden]','hidden_value');
$I->seeInField('#searchform input','Search');
$I->seeInField('//form/*[@name=search]','Search');
$I->seeInField(['name' => 'search'], 'Search');

{% endhighlight %}


#### seeInFormFields

* `param ` $formSelector
* `param array` $params
* `return void`

Checks if the array of form parameters (name => value) are set on the form matched with the
passed selector.

{% highlight php %}

<?php
$I->seeInFormFields('form[name=myform]', [
     'input1' => 'value',
     'input2' => 'other value',
]);

{% endhighlight %}

For multi-select elements, or to check values of multiple elements with the same name, an
array may be passed:

{% highlight php %}

<?php
$I->seeInFormFields('.form-class', [
     'multiselect' => [
         'value1',
         'value2',
     ],
     'checkbox[]' => [
         'a checked value',
         'another checked value',
     ],
]);

{% endhighlight %}

Additionally, checkbox values can be checked with a boolean.

{% highlight php %}

<?php
$I->seeInFormFields('#form-id', [
     'checkbox1' => true,        // passes if checked
     'checkbox2' => false,       // passes if unchecked
]);

{% endhighlight %}

Pair this with submitForm for quick testing magic.

{% highlight php %}

<?php
$form = [
     'field1' => 'value',
     'field2' => 'another value',
     'checkbox1' => true,
     // ...
];
$I->submitForm('//form[@id=my-form]', string $form, 'submitButton');
// $I->amOnPage('/path/to/form-page') may be needed
$I->seeInFormFields('//form[@id=my-form]', string $form);

{% endhighlight %}


#### seeInSource

* `param string` $raw
* `return void`

Checks that the current page contains the given string in its
raw source code.

{% highlight php %}

<?php
$I->seeInSource('<h1>Green eggs &amp; ham</h1>');

{% endhighlight %}


#### seeInTitle

* `param ` $title
* `return mixed|void`

Checks that the page title contains the given string.

{% highlight php %}

<?php
$I->seeInTitle('Blog - Post #1');

{% endhighlight %}


#### seeLink

* `param string` $text
* `param ?string` $url
* `return void`

Checks that there's a link with the specified text.

Give a full URL as the second parameter to match links with that exact URL.

{% highlight php %}

<?php
$I->seeLink('Logout'); // matches <a href="#">Logout</a>
$I->seeLink('Logout','/logout'); // matches <a href="/logout">Logout</a>

{% endhighlight %}


#### seeNumberOfElements

* `param ` $selector
* `param int|int[]` $expected
* `return void`

Checks that there are a certain number of elements matched by the given locator on the page.

{% highlight php %}

<?php
$I->seeNumberOfElements('tr', 10);
$I->seeNumberOfElements('tr', [0,10]); // between 0 and 10 elements

{% endhighlight %}


#### seeOptionIsSelected

* `param ` $selector
* `param ` $optionText
* `return mixed|void`

Checks that the given option is selected.

{% highlight php %}

<?php
$I->seeOptionIsSelected('#form input[name=payment]', 'Visa');

{% endhighlight %}


#### seePageNotFound

* `return void`

Asserts that current page has 404 response status code.


#### seeRecord

* `part` orm
* `param ` $model
* `param array` $attributes
* `return void`

Checks that a record exists in the database.

{% highlight php %}

$I->seeRecord('app\models\User', array('name' => 'davert'));

{% endhighlight %}


#### seeResponseCodeIs

* `param int` $code
* `return void`

Checks that response code is equal to value provided.

{% highlight php %}

<?php
$I->seeResponseCodeIs(200);

// recommended \Codeception\Util\HttpCode
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

{% endhighlight %}


#### seeResponseCodeIsBetween

* `param int` $from
* `param int` $to
* `return void`

Checks that response code is between a certain range. Between actually means [from <= CODE <= to]


#### seeResponseCodeIsClientError

* `return void`

Checks that the response code is 4xx


#### seeResponseCodeIsRedirection

* `return void`

Checks that the response code 3xx


#### seeResponseCodeIsServerError

* `return void`

Checks that the response code is 5xx


#### seeResponseCodeIsSuccessful

* `return void`

Checks that the response code 2xx


#### selectOption

* `param ` $select
* `param ` $option
* `return void`

Selects an option in a select tag or in radio button group.

{% highlight php %}

<?php
$I->selectOption('form select[name=account]', 'Premium');
$I->selectOption('form input[name=payment]', 'Monthly');
$I->selectOption('//form/select[@name=account]', 'Monthly');

{% endhighlight %}

Provide an array for the second argument to select multiple options:

{% highlight php %}

<?php
$I->selectOption('Which OS do you use?', array('Windows','Linux'));

{% endhighlight %}

Or provide an associative array for the second argument to specifically define which selection method should be used:

{% highlight php %}

<?php
$I->selectOption('Which OS do you use?', array('text' => 'Windows')); // Only search by text 'Windows'
$I->selectOption('Which OS do you use?', array('value' => 'windows')); // Only search by value 'windows'

{% endhighlight %}


#### sendAjaxGetRequest

* `param string` $uri
* `param array` $params
* `return void`

Sends an ajax GET request with the passed parameters.

See `sendAjaxPostRequest()`


#### sendAjaxPostRequest

* `param string` $uri
* `param array` $params
* `return void`

Sends an ajax POST request with the passed parameters.

The appropriate HTTP header is added automatically:
`X-Requested-With: XMLHttpRequest`
Example:
{% highlight php %}

<?php
$I->sendAjaxPostRequest('/add-task', ['task' => 'lorem ipsum']);

{% endhighlight %}
Some frameworks (e.g. Symfony) create field names in the form of an "array":
`<input type="text" name="form[task]">`
In this case you need to pass the fields like this:
{% highlight php %}

<?php
$I->sendAjaxPostRequest('/add-task', ['form' => [
    'task' => 'lorem ipsum',
    'category' => 'miscellaneous',
]]);

{% endhighlight %}


#### sendAjaxRequest

* `param string` $method
* `param string` $uri
* `param array` $params
* `return void`

Sends an ajax request, using the passed HTTP method.

See `sendAjaxPostRequest()`
Example:
{% highlight php %}

<?php
$I->sendAjaxRequest('PUT', '/posts/7', ['title' => 'new title']);

{% endhighlight %}


#### setCookie

* `param string` $name The name of the cookie
* `param string` $val The value of the cookie
* `param array` $params Additional cookie params like `domain`, `path`, `expires` and `secure`.

Sets a cookie and, if validation is enabled, signs it.


#### setMaxRedirects

* `param int` $maxRedirects
* `return void`

Sets the maximum number of redirects that the Client can follow.

{% highlight php %}

<?php
$I->setMaxRedirects(2);

{% endhighlight %}


#### setServerParameters

* `param array` $params
* `return void`

Sets SERVER parameters valid for all next requests.

this will remove old ones.

{% highlight php %}

$I->setServerParameters([]);

{% endhighlight %}


#### startFollowingRedirects

* `return void`

Enables automatic redirects to be followed by the client.

{% highlight php %}

<?php
$I->startFollowingRedirects();

{% endhighlight %}


#### stopFollowingRedirects

* `return void`

Prevents automatic redirects to be followed by the client.

{% highlight php %}

<?php
$I->stopFollowingRedirects();

{% endhighlight %}


#### submitForm

* `param ` $selector
* `param array` $params
* `param ?string` $button
* `return void`

Submits the given form on the page, with the given form
values.  Pass the form field's values as an array in the second
parameter.

Although this function can be used as a short-hand version of
`fillField()`, `selectOption()`, `click()` etc. it has some important
differences:

 * Only field *names* may be used, not CSS/XPath selectors nor field labels
 * If a field is sent to this function that does *not* exist on the page,
   it will silently be added to the HTTP request.  This is helpful for testing
   some types of forms, but be aware that you will *not* get an exception
   like you would if you called `fillField()` or `selectOption()` with
   a missing field.

Fields that are not provided will be filled by their values from the page,
or from any previous calls to `fillField()`, `selectOption()` etc.
You don't need to click the 'Submit' button afterwards.
This command itself triggers the request to form's action.

You can optionally specify which button's value to include
in the request with the last parameter (as an alternative to
explicitly setting its value in the second parameter), as
button values are not otherwise included in the request.

Examples:

{% highlight php %}

<?php
$I->submitForm('#login', [
    'login' => 'davert',
    'password' => '123456'
]);
// or
$I->submitForm('#login', [
    'login' => 'davert',
    'password' => '123456'
], 'submitButtonName');


{% endhighlight %}

For example, given this sample "Sign Up" form:

{% highlight html %}

<form id="userForm">
    Login:
    <input type="text" name="user[login]" /><br/>
    Password:
    <input type="password" name="user[password]" /><br/>
    Do you agree to our terms?
    <input type="checkbox" name="user[agree]" /><br/>
    Subscribe to our newsletter?
    <input type="checkbox" name="user[newsletter]" value="1" checked="checked" /><br/>
    Select pricing plan:
    <select name="plan">
        <option value="1">Free</option>
        <option value="2" selected="selected">Paid</option>
    </select>
    <input type="submit" name="submitButton" value="Submit" />
</form>

{% endhighlight %}

You could write the following to submit it:

{% highlight php %}

<?php
$I->submitForm(
    '#userForm',
    [
        'user' => [
            'login' => 'Davert',
            'password' => '123456',
            'agree' => true
        ]
    ],
    'submitButton'
);

{% endhighlight %}
Note that "2" will be the submitted value for the "plan" field, as it is
the selected option.

To uncheck the pre-checked checkbox "newsletter", call `$I->uncheckOption(['name' => 'user[newsletter]']);` *before*,
then submit the form as shown here (i.e. without the "newsletter" field in the `$params` array).

You can also emulate a JavaScript submission by not specifying any
buttons in the third parameter to submitForm.

{% highlight php %}

<?php
$I->submitForm(
    '#userForm',
    [
        'user' => [
            'login' => 'Davert',
            'password' => '123456',
            'agree' => true
        ]
    ]
);

{% endhighlight %}

This function works well when paired with `seeInFormFields()`
for quickly testing CRUD interfaces and form validation logic.

{% highlight php %}

<?php
$form = [
     'field1' => 'value',
     'field2' => 'another value',
     'checkbox1' => true,
     // ...
];
$I->submitForm('#my-form', $form, 'submitButton');
// $I->amOnPage('/path/to/form-page') may be needed
$I->seeInFormFields('#my-form', $form);

{% endhighlight %}

Parameter values can be set to arrays for multiple input fields
of the same name, or multi-select combo boxes.  For checkboxes,
you can use either the string value or boolean `true`/`false` which will
be replaced by the checkbox's value in the DOM.

{% highlight php %}

<?php
$I->submitForm('#my-form', [
     'field1' => 'value',
     'checkbox' => [
         'value of first checkbox',
         'value of second checkbox',
     ],
     'otherCheckboxes' => [
         true,
         false,
         false
     ],
     'multiselect' => [
         'first option value',
         'second option value'
     ]
]);

{% endhighlight %}

Mixing string and boolean values for a checkbox's value is not supported
and may produce unexpected results.

Field names ending in `[]` must be passed without the trailing square
bracket characters, and must contain an array for its value.  This allows
submitting multiple values with the same name, consider:

{% highlight php %}

<?php
// This will NOT work correctly
$I->submitForm('#my-form', [
    'field[]' => 'value',
    'field[]' => 'another value',  // 'field[]' is already a defined key
]);

{% endhighlight %}

The solution is to pass an array value:

{% highlight php %}

<?php
// This way both values are submitted
$I->submitForm('#my-form', [
    'field' => [
        'value',
        'another value',
    ]
]);

{% endhighlight %}


#### switchToIframe

* `param string` $name
* `return void`

Switch to iframe or frame on the page.

Example:
{% highlight html %}

<iframe name="another_frame" src="http://example.com">

{% endhighlight %}

{% highlight php %}

<?php
# switch to iframe
$I->switchToIframe("another_frame");

{% endhighlight %}


#### uncheckOption

* `param ` $option
* `return void`

Unticks a checkbox.

{% highlight php %}

<?php
$I->uncheckOption('#notify');

{% endhighlight %}

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-yii2/tree/master/src/Codeception/Module/Yii2.php">Help us to improve documentation. Edit module reference</a></div>
