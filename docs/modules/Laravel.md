---
layout: doc
title: Laravel - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Laravel/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-laravel/tree/master/src/Codeception/Module/Laravel.php"><strong>source</strong></a></div>

# Laravel
### Installation

{% highlight yaml %}
composer require --dev codeception/module-laravel

{% endhighlight %}

### Description




This module allows you to run functional tests for Laravel 6.0+
It should **not** be used for acceptance tests.
See the Acceptance tests section below for more details.

### Demo project
<https://github.com/Codeception/laravel-module-tests>

### Config

* cleanup: `boolean`, default `true` - all database queries will be run in a transaction,
  which will be rolled back at the end of each test.
* run_database_migrations: `boolean`, default `false` - run database migrations before each test.
* database_migrations_path: `string`, default `null` - path to the database migrations, relative to the root of the application.
* run_database_seeder: `boolean`, default `false` - run database seeder before each test.
* database_seeder_class: `string`, default `` - database seeder class name.
* environment_file: `string`, default `.env` - the environment file to load for the tests.
* bootstrap: `string`, default `bootstrap/app.php` - relative path to app.php config file.
* root: `string`, default `` - root path of the application.
* packages: `string`, default `workbench` - root path of application packages (if any).
* vendor_dir: `string`, default `vendor` - optional relative path to vendor directory.
* disable_exception_handling: `boolean`, default `true` - disable Laravel exception handling.
* disable_middleware: `boolean`, default `false` - disable all middleware.
* disable_events: `boolean`, default `false` - disable events (does not disable model events).
* disable_model_events: `boolean`, default `false` - disable model events.
* url: `string`, default `` - the application URL.
* headers: `array<string, string>` - default headers are set before each test.

#### Example #1 (`Functional.suite.yml`)

Enabling module:

{% highlight yaml %}
yml
modules:
    enabled:
        - Laravel

{% endhighlight %}

#### Example #2 (`Functional.suite.yml`)

Enabling module with custom .env file

{% highlight yaml %}
yml
modules:
    enabled:
        - Laravel:
            environment_file: .env.testing

{% endhighlight %}

### API

* app - `Illuminate\Foundation\Application`
* config - `array`

### Parts

* `ORM`: Only include the database methods of this module:
    * dontSeeRecord
    * grabNumRecords
    * grabRecord
    * have
    * haveMultiple
    * haveRecord
    * make
    * makeMultiple
    * seedDatabase
    * seeNumRecords
    * seeRecord

See [WebDriver module](https://codeception.com/docs/modules/WebDriver#Loading-Parts-from-other-Modules)
for general information on how to load parts of a framework module.

### Acceptance tests

You should not use this module for acceptance tests.
If you want to use Eloquent within your acceptance tests (paired with WebDriver) enable only
ORM part of this module:

#### Example (`Acceptance.suite.yml`)

{% highlight yaml %}

modules:
    enabled:
        - WebDriver:
            browser: chrome
            url: http://127.0.0.1:8000
        - Laravel:
            part: ORM
            environment_file: .env.testing

{% endhighlight %}

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
$els = $this->getModule('Laravel')->_findElements('.items');
$els = $this->getModule('Laravel')->_findElements(['name' => 'username']);

$editLinks = $this->getModule('Laravel')->_findElements(['link' => 'Edit']);
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
   $this->assertStringContainsString($text, $this->getModule('Laravel')->_getResponseContent(), "response contains");
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
    $this->getModule('Laravel')->_loadPage('POST', '/checkout/step2', ['order' => $orderId]);
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
    $userData = $this->getModule('Laravel')->_request('POST', '/api/v1/users', ['name' => $name]);
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

$this->getModule('Laravel')->_savePageSource(codecept_output_dir().'page.html');

{% endhighlight %}


#### amActingAs

* `param \Illuminate\Contracts\Auth\Authenticatable` $user
* `param ?string` $guardName
* `return void`

Set the given user object to the current or specified Guard.

{% highlight php %}

<?php
$I->amActingAs($user);

{% endhighlight %}


#### amHttpAuthenticated

* `param string` $username
* `param string` $password
* `return void`

Authenticates user for HTTP_AUTH


#### amLoggedAs

* `param Authenticatable|array` $user
* `param string|null` $guardName
* `return void`

Set the currently logged in user for the application.

Unlike 'amActingAs', this method does update the session, fire the login events
and remember the user as it assigns the corresponding Cookie.

{% highlight php %}

<?php
// provide array of credentials
$I->amLoggedAs(['username' => 'jane@example.com', 'password' => 'password']);

// provide User object that implements the User interface
$I->amLoggedAs( new User );

// can be verified with $I->seeAuthentication();

{% endhighlight %}


#### amOnAction

* `param string` $action
* `param mixed` $parameters
* `return void`

Opens web page by action name

{% highlight php %}

<?php
// Laravel 6 or 7:
$I->amOnAction('PostsController@index');

// Laravel 8+:
$I->amOnAction(PostsController::class . '@index');

{% endhighlight %}


#### amOnPage

* `param string` $page
* `return void`

Opens the page for the given relative URI.

{% highlight php %}

<?php
// opens front page
$I->amOnPage('/');
// opens /register page
$I->amOnPage('/register');

{% endhighlight %}


#### amOnRoute

* `param string` $routeName
* `param mixed` $params
* `return void`

Opens web page using route name and parameters.

{% highlight php %}

<?php
$I->amOnRoute('posts.create');

{% endhighlight %}


#### assertAuthenticatedAs

* `param \Illuminate\Contracts\Auth\Authenticatable` $user
* `param ?string` $guardName
* `return void`

Assert that the user is authenticated as the given user.

{% highlight php %}

<?php
$I->assertAuthenticatedAs($user);

{% endhighlight %}


#### assertCredentials

* `param array` $credentials
* `param ?string` $guardName
* `return void`

Assert that the given credentials are valid.

{% highlight php %}

<?php
$I->assertCredentials([
    'email' => 'john_doe@gmail.com',
    'password' => '123456'
]);

{% endhighlight %}


#### assertInvalidCredentials

* `param array` $credentials
* `param ?string` $guardName
* `return void`

Assert that the given credentials are invalid.

{% highlight php %}

<?php
$I->assertInvalidCredentials([
    'email' => 'john_doe@gmail.com',
    'password' => 'wrong_password'
]);

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


#### callArtisan

* `param string` $command
* `param array` $parameters
* `param ?\Symfony\Component\Console\Output\OutputInterface` $output
* `return string|void`

Call an Artisan command.

{% highlight php %}

<?php
$I->callArtisan('command:name');
$I->callArtisan('command:name', ['parameter' => 'value']);

{% endhighlight %}
Use 3rd parameter to pass in custom `OutputInterface`


#### checkOption

* `param ` $option
* `return void`

Ticks a checkbox. For radio buttons, use the `selectOption` method instead.

{% highlight php %}

<?php
$I->checkOption('#agree');

{% endhighlight %}


#### clearApplicationHandlers

* `return void`

Clear the registered application handlers.

{% highlight php %}

<?php
$I->clearApplicationHandlers();

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


#### deleteHeader

@deprecated
* `param string` $name
* `return void`


#### disableEvents

* `return void`

Disable events for the next requests.

This method does not disable model events.
To disable model events you have to use the disableModelEvents() method.

{% highlight php %}

<?php
$I->disableEvents();

{% endhighlight %}


#### disableExceptionHandling

* `return void`

Disable Laravel exception handling.

{% highlight php %}

<?php
$I->disableExceptionHandling();

{% endhighlight %}


#### disableMiddleware

* `param string|array|null` $middleware
* `return void`

Disable middleware for the next requests.

{% highlight php %}

<?php
$I->disableMiddleware();

{% endhighlight %}


#### disableModelEvents

* `return void`

Disable model events for the next requests.

{% highlight php %}

<?php
$I->disableModelEvents();

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


#### dontSeeAuthentication

* `param ?string` $guardName
* `return void`

Check that user is not authenticated.

{% highlight php %}

<?php
$I->dontSeeAuthentication();

{% endhighlight %}


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


#### dontSeeEventTriggered

* `param string|object|string[]` $expected
* `return void`

Make sure events did not fire during the test.

{% highlight php %}

<?php
$I->dontSeeEventTriggered('App\MyEvent');
$I->dontSeeEventTriggered(new App\Events\MyEvent());
$I->dontSeeEventTriggered(['App\MyEvent', 'App\MyOtherEvent']);

{% endhighlight %}


#### dontSeeFormErrors

* `return void`

Assert that there are no form errors bound to the View.

{% highlight php %}

<?php
$I->dontSeeFormErrors();

{% endhighlight %}


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


#### dontSeeInSession

* `param string|array` $key
* `param mixed|null` $value
* `return void`

Assert that a session attribute does not exist, or is not equal to the passed value.

{% highlight php %}

<?php
$I->dontSeeInSession('attribute');
$I->dontSeeInSession('attribute', 'value');

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
* `param string|class-string|object` $table
* `param array` $attributes
* `return void`

Checks that record does not exist in database.

You can pass the name of a database table or the class name of an Eloquent model as the first argument.

{% highlight php %}

<?php
$I->dontSeeRecord($user);
$I->dontSeeRecord('users', ['name' => 'Davert']);
$I->dontSeeRecord('App\Models\User', ['name' => 'Davert']);

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


#### dontSeeSessionHasValues

* `param array` $bindings
* `return void`

Assert that the session does not have a particular list of values.

{% highlight php %}

<?php
$I->dontSeeSessionHasValues(['key1', 'key2']);
$I->dontSeeSessionHasValues(['key1' => 'value1', 'key2' => 'value2']);

{% endhighlight %}


#### enableExceptionHandling

* `return void`

Enable Laravel exception handling.

{% highlight php %}

<?php
$I->enableExceptionHandling();

{% endhighlight %}


#### enableMiddleware

* `param string|array|null` $middleware
* `return void`

Enable the given middleware for the next requests.

{% highlight php %}

<?php
$I->enableMiddleware();

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


#### flushSession

* `return void`

Flush all of the current session data.

{% highlight php %}

<?php
$I->flushSession();

{% endhighlight %}


#### followRedirect

* `return void`

Follow pending redirect if there is one.

{% highlight php %}

<?php
$I->followRedirect();

{% endhighlight %}


#### getApplication

* `return \Illuminate\Contracts\Foundation\Application`

Provides access the Laravel application object.

{% highlight php %}

<?php
$app = $I->getApplication();

{% endhighlight %}


#### grabAttributeFrom

* `param ` $cssOrXpath
* `param string` $attribute
* `return mixed`

Returns the value of the given attribute value from the given HTML element. For some attributes, the string `true` is returned instead of their literal value (e.g. `disabled="disabled"` or `required="required"`).

Fails if the element is not found. Returns `null` if the attribute is not present on the element.

{% highlight php %}

<?php
$I->grabAttributeFrom('#tooltip', 'title');

{% endhighlight %}


#### grabCookie

* `param string` $cookie
* `param array` $params
* `return mixed`

Grabs a cookie value.

You can set additional cookie params like `domain`, `path` in array passed as last argument.
If the cookie is set by an ajax request (XMLHttpRequest), there might be some delay caused by the browser, so try `$I->wait(0.1)`.


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


#### grabNumRecords

* `part` orm
* `param string` $table
* `param array` $attributes
* `return int`

Retrieves number of records from database
You can pass the name of a database table or the class name of an Eloquent model as the first argument.

{% highlight php %}

<?php
$I->grabNumRecords('users', ['name' => 'Davert']);
$I->grabNumRecords('App\Models\User', ['name' => 'Davert']);

{% endhighlight %}


#### grabPageSource

* `throws \Codeception\Exception\ModuleException` if no page was opened.
* `return string` Current page source code.

Grabs current page source code.


#### grabRecord

* `part` orm
* `param string` $table
* `param array` $attributes
* `return array|EloquentModel`

Retrieves record from database
If you pass the name of a database table as the first argument, this method returns an array.

You can also pass the class name of an Eloquent model, in that case this method returns an Eloquent model.

{% highlight php %}

<?php
$record = $I->grabRecord('users', ['name' => 'Davert']); // returns array
$record = $I->grabRecord('App\Models\User', ['name' => 'Davert']); // returns Eloquent model

{% endhighlight %}


#### grabService

* `param string` $class
* `return mixed`

Return an instance of a class from the Laravel service container.

(https://laravel.com/docs/7.x/container)

{% highlight php %}

<?php
// In Laravel
App::bind('foo', function($app) {
    return new FooBar;
});

// Then in test
$service = $I->grabService('foo');

// Will return an instance of FooBar, also works for singletons.

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


#### have

* `part` orm
* `see` https://laravel.com/docs/7.x/database-testing#using-factories
* `param string` $model
* `param array` $attributes
* `param string` $name
* `return mixed`

Use Laravel model factory to create a model.

{% highlight php %}

<?php
$I->have('App\Models\User');
$I->have('App\Models\User', ['name' => 'John Doe']);
$I->have('App\Models\User', [], 'admin');

{% endhighlight %}


#### haveApplicationHandler

* `param callable` $handler
* `return void`

Register a handler than can be used to modify the Laravel application object after it is initialized.

The Laravel application object will be passed as an argument to the handler.

{% highlight php %}

<?php
$I->haveApplicationHandler(function($app) {
    $app->make('config')->set(['test_value' => '10']);
});

{% endhighlight %}


#### haveBinding

* `param string` $abstract
* `param Closure|string|null` $concrete
* `param bool` $shared
* `return void`

Add a binding to the Laravel service container.

(https://laravel.com/docs/7.x/container)

{% highlight php %}

<?php
$I->haveBinding('My\Interface', 'My\Implementation');

{% endhighlight %}


#### haveContextualBinding

* `param string` $concrete
* `param string` $abstract
* `param Closure|string` $implementation
* `return void`

Add a contextual binding to the Laravel service container.

(https://laravel.com/docs/7.x/container)

{% highlight php %}

<?php
$I->haveContextualBinding('My\Class', '$variable', 'value');

// This is similar to the following in your Laravel application
$app->when('My\Class')
    ->needs('$variable')
    ->give('value');

{% endhighlight %}


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


#### haveInSession

* `param array` $data
* `return void`

Set the session to the given array.

{% highlight php %}

<?php
$I->haveInSession(['myKey' => 'MyValue']);

{% endhighlight %}


#### haveInstance

* `param string` $abstract
* `param object` $instance
* `return void`

Add an instance binding to the Laravel service container.

(https://laravel.com/docs/7.x/container)

{% highlight php %}

<?php
$I->haveInstance('App\MyClass', new App\MyClass());

{% endhighlight %}


#### haveMultiple

* `part` orm
* `see` https://laravel.com/docs/7.x/database-testing#using-factories
* `param string` $model
* `param int` $times
* `param array` $attributes
* `param string` $name
* `return EloquentModel|EloquentCollection`

Use Laravel model factory to create multiple models.

{% highlight php %}

<?php
$I->haveMultiple('App\Models\User', 10);
$I->haveMultiple('App\Models\User', 10, ['name' => 'John Doe']);
$I->haveMultiple('App\Models\User', 10, [], 'admin');

{% endhighlight %}


#### haveRecord

* `part` orm
* `param string` $table
* `param array` $attributes
* `throws RuntimeException`
* `return EloquentModel|int`

Inserts record into the database.

If you pass the name of a database table as the first argument, this method returns an integer ID.
You can also pass the class name of an Eloquent model, in that case this method returns an Eloquent model.

{% highlight php %}

<?php
$user_id = $I->haveRecord('users', ['name' => 'Davert']); // returns integer
$user = $I->haveRecord('App\Models\User', ['name' => 'Davert']); // returns Eloquent model

{% endhighlight %}


#### haveServerParameter

* `param string` $name
* `param string` $value
* `return void`

Sets SERVER parameter valid for all next requests.

{% highlight php %}

$I->haveServerParameter('name', 'value');

{% endhighlight %}


#### haveSingleton

* `param string` $abstract
* `param Closure|string|null` $concrete
* `return void`

Add a singleton binding to the Laravel service container.

(https://laravel.com/docs/7.x/container)

{% highlight php %}

<?php
$I->haveSingleton('App\MyInterface', 'App\MySingleton');

{% endhighlight %}


#### logout

* `return void`

Logout user.

{% highlight php %}

<?php
$I->logout();

{% endhighlight %}


#### make

* `part` orm
* `see` https://laravel.com/docs/7.x/database-testing#using-factories
* `param string` $model
* `param array` $attributes
* `param string` $name
* `return EloquentCollection|EloquentModel`

Use Laravel model factory to make a model instance.

{% highlight php %}

<?php
$I->make('App\Models\User');
$I->make('App\Models\User', ['name' => 'John Doe']);
$I->make('App\Models\User', [], 'admin');

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


#### makeMultiple

* `part` orm
* `see` https://laravel.com/docs/7.x/database-testing#using-factories
* `param string` $model
* `param int` $times
* `param array` $attributes
* `param string` $name
* `return EloquentCollection|EloquentModel`

Use Laravel model factory to make multiple model instances.

{% highlight php %}

<?php
$I->makeMultiple('App\Models\User', 10);
$I->makeMultiple('App\Models\User', 10, ['name' => 'John Doe']);
$I->makeMultiple('App\Models\User', 10, [], 'admin');

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


#### seeAuthentication

* `param ?string` $guardName
* `return void`

Checks that a user is authenticated.

{% highlight php %}

<?php
$I->seeAuthentication();

{% endhighlight %}


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


#### seeCurrentActionIs

* `param string` $action
* `return void`

Checks that current url matches action

{% highlight php %}

<?php
// Laravel 6 or 7:
$I->seeCurrentActionIs('PostsController@index');

// Laravel 8+:
$I->seeCurrentActionIs(PostsController::class . '@index');

{% endhighlight %}


#### seeCurrentRouteIs

* `param string` $routeName
* `return void`

Checks that current url matches route

{% highlight php %}

<?php
$I->seeCurrentRouteIs('posts.index');

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
Only works if `<html>` tag is present.

{% highlight php %}

<?php
$I->seeElement('.error');
$I->seeElement('//form/input[1]');
$I->seeElement('input', ['name' => 'login']);
$I->seeElement('input', ['value' => '123456']);

// strict locator in first arg, attributes in second
$I->seeElement(['css' => 'form input'], ['name' => 'login']);

{% endhighlight %}


#### seeEventTriggered

* `param string|object|string[]` $expected
* `return void`

Make sure events fired during the test.

{% highlight php %}

<?php
$I->seeEventTriggered('App\MyEvent');
$I->seeEventTriggered(new App\Events\MyEvent());
$I->seeEventTriggered(['App\MyEvent', 'App\MyOtherEvent']);

{% endhighlight %}


#### seeFormErrorMessage

* `param string` $field
* `param ?string` $errorMessage
* `return void`

Assert that a specific form error message is set in the view.

If you want to assert that there is a form error message for a specific key
but don't care about the actual error message you can omit `$expectedErrorMessage`.

If you do pass `$expectedErrorMessage`, this method checks if the actual error message for a key
contains `$expectedErrorMessage`.

{% highlight php %}

<?php
$I->seeFormErrorMessage('username');
$I->seeFormErrorMessage('username', 'Invalid Username');

{% endhighlight %}


#### seeFormErrorMessages

* `param array` $expectedErrors
* `return void`

Verifies that multiple fields on a form have errors.

This method will validate that the expected error message
is contained in the actual error message, that is,
you can specify either the entire error message or just a part of it:

{% highlight php %}

<?php
$I->seeFormErrorMessages([
    'address'   => 'The address is too long',
    'telephone' => 'too short' // the full error message is 'The telephone is too short'
]);

{% endhighlight %}

If you don't want to specify the error message for some fields,
you can pass `null` as value instead of the message string.
If that is the case, it will be validated that
that field has at least one error of any type:

{% highlight php %}

<?php
$I->seeFormErrorMessages([
    'telephone' => 'too short',
    'address'   => null
]);

{% endhighlight %}


#### seeFormHasErrors

* `return void`

Assert that form errors are bound to the View.

{% highlight php %}

<?php
$I->seeFormHasErrors();

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


#### seeInSession

* `param string|array` $key
* `param mixed|null` $value
* `return void`

Assert that a session variable exists.

{% highlight php %}

<?php
$I->seeInSession('key');
$I->seeInSession('key', 'value');

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


#### seeNumRecords

* `part` orm
* `param int` $expectedNum
* `param string` $table
* `param array` $attributes
* `return void`

Checks that number of given records were found in database.

You can pass the name of a database table or the class name of an Eloquent model as the first argument.

{% highlight php %}

<?php
$I->seeNumRecords(1, 'users', ['name' => 'Davert']);
$I->seeNumRecords(1, 'App\Models\User', ['name' => 'Davert']);

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
* `param string|class-string|object` $table
* `param array` $attributes
* `return void`

Checks that record exists in database.

You can pass the name of a database table or the class name of an Eloquent model as the first argument.

{% highlight php %}

<?php
$I->seeRecord($user);
$I->seeRecord('users', ['name' => 'Davert']);
$I->seeRecord('App\Models\User', ['name' => 'Davert']);

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


#### seeSessionHasValues

* `param array` $bindings
* `return void`

Assert that the session has a given list of values.

{% highlight php %}

<?php
$I->seeSessionHasValues(['key1', 'key2']);
$I->seeSessionHasValues(['key1' => 'value1', 'key2' => 'value2']);

{% endhighlight %}


#### seedDatabase

* `param class-string|class-string[]` $seeders
* `return void`

Seed a given database connection.


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
$I->selectOption('Which OS do you use?', ['Windows', 'Linux']);

{% endhighlight %}

Or provide an associative array for the second argument to specifically define which selection method should be used:

{% highlight php %}

<?php
$I->selectOption('Which OS do you use?', ['text' => 'Windows']); // Only search by text 'Windows'
$I->selectOption('Which OS do you use?', ['value' => 'windows']); // Only search by value 'windows'

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


#### setApplication

* `param \Illuminate\Contracts\Foundation\Application` $app
* `return void`


#### setCookie

* `param ` $name
* `param ` $val
* `param ` $params
* `return mixed|void`

Sets a cookie with the given name and value.

You can set additional cookie params like `domain`, `path`, `expires`, `secure` in array passed as last argument.

{% highlight php %}

<?php
$I->setCookie('PHPSESSID', 'el4ukv0kqbvoirg7nkp4dncpk3');

{% endhighlight %}


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


#### unsetHttpHeader

* `param string` $name the name of the header to unset.
* `return void`

Unsets a HTTP header (that was originally added by [haveHttpHeader()](#haveHttpHeader)),
so that subsequent requests will not send it anymore.

Example:
{% highlight php %}

<?php
$I->haveHttpHeader('X-Requested-With', 'Codeception');
$I->amOnPage('test-headers.php');
// ...
$I->unsetHeader('X-Requested-With');
$I->amOnPage('some-other-page.php');

{% endhighlight %}

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-laravel/tree/master/src/Codeception/Module/Laravel.php">Help us to improve documentation. Edit module reference</a></div>
