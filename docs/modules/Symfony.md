---
layout: doc
title: Symfony - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Symfony/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-symfony/tree/master/src/Codeception/Module/Symfony.php"><strong>source</strong></a></div>

# Symfony
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-symfony

{% endhighlight %}

Alternatively, you can enable `Symfony` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



This module uses [Symfony's DomCrawler](https://symfony.com/doc/current/components/dom_crawler.html)
and [HttpKernel Component](https://symfony.com/doc/current/components/http_kernel.html) to emulate requests and test response.

* Access Symfony services through the dependency injection container: [`$I->grabService(...)`](#grabService)
* Use Doctrine to test against the database: `$I->seeInRepository(...)` - see [Doctrine Module](https://codeception.com/docs/modules/Doctrine2)
* Assert that emails would have been sent: [`$I->seeEmailIsSent()`](#seeEmailIsSent)
* Tests are wrapped into Doctrine transaction to speed them up.
* Symfony Router can be cached between requests to speed up testing.

### Demo Project

<https://github.com/Codeception/symfony-module-tests>

### Config

#### Symfony 5.x or 4.4

* app_path: 'src' - Specify custom path to your app dir, where the kernel interface is located.
* environment: 'local' - Environment used for load kernel
* kernel_class: 'App\Kernel' - Kernel class name
* em_service: 'doctrine.orm.entity_manager' - Use the stated EntityManager to pair with Doctrine Module.
* debug: true - Turn on/off debug mode
* cache_router: 'false' - Enable router caching between tests in order to [increase performance](http://lakion.com/blog/how-did-we-speed-up-sylius-behat-suite-with-blackfire)
* rebootable_client: 'true' - Reboot client's kernel before each request

##### Example (`functional.suite.yml`) - Symfony 4 Directory Structure

    modules:
       enabled:
          - Symfony:
              app_path: 'src'
              environment: 'test'


### Public Properties

* kernel - HttpKernel instance
* client - current Crawler instance

### Parts

* `services`: Includes methods related to the Symfony dependency injection container (DIC):
    * grabService
    * persistService
    * persistPermanentService
    * unpersistService

See [WebDriver module](https://codeception.com/docs/modules/WebDriver#Loading-Parts-from-other-Modules)
for general information on how to load parts of a framework module.

Usage example:

{% highlight yaml %}

actor: AcceptanceTester
modules:
    enabled:
        - Symfony:
            part: services
        - Doctrine2:
            depends: Symfony
        - WebDriver:
            url: http://example.com
            browser: firefox

{% endhighlight %}

If you're using Symfony with Eloquent ORM (instead of Doctrine), you can load the [`ORM` part of Laravel module](https://codeception.com/docs/modules/Laravel5#Parts)
in addition to Symfony module.


### Actions

#### _findElements

*hidden API method, expected to be used from Helper classes*
 
Locates element using available Codeception locator types:

* XPath
* CSS
* Strict Locator

Use it in Helpers or GroupObject or Extension classes:

{% highlight php %}

<?php
$els = $this->getModule('Symfony')->_findElements('.items');
$els = $this->getModule('Symfony')->_findElements(['name' => 'username']);

$editLinks = $this->getModule('Symfony')->_findElements(['link' => 'Edit']);
// now you can iterate over $editLinks and check that all them have valid hrefs

{% endhighlight %}

WebDriver module returns `Facebook\WebDriver\Remote\RemoteWebElement` instances
PhpBrowser and Framework modules return `Symfony\Component\DomCrawler\Crawler` instances

 * `param` $locator
 * `return array` of interactive elements


#### _getResponseContent

*hidden API method, expected to be used from Helper classes*
 
Returns content of the last response
Use it in Helpers when you want to retrieve response of request performed by another module.

{% highlight php %}

<?php
// in Helper class
public function seeResponseContains($text)
{
   $this->assertStringContainsString($text, $this->getModule('Symfony')->_getResponseContent(), "response contains");
}

{% endhighlight %}

 * `return string` 
@throws ModuleException


#### _loadPage

*hidden API method, expected to be used from Helper classes*
 
Opens a page with arbitrary request parameters.
Useful for testing multi-step forms on a specific step.

{% highlight php %}

<?php
// in Helper class
public function openCheckoutFormStep2($orderId) {
    $this->getModule('Symfony')->_loadPage('POST', '/checkout/step2', ['order' => $orderId]);
}

{% endhighlight %}

 * `param string` $method
 * `param string` $uri
 * `param string` $content


#### _request

*hidden API method, expected to be used from Helper classes*
 
Send custom request to a backend using method, uri, parameters, etc.
Use it in Helpers to create special request actions, like accessing API
Returns a string with response body.

{% highlight php %}

<?php
// in Helper class
public function createUserByApi($name) {
    $userData = $this->getModule('Symfony')->_request('POST', '/api/v1/users', ['name' => $name]);
    $user = json_decode($userData);
    return $user->id;
}

{% endhighlight %}
Does not load the response into the module so you can't interact with response page (click, fill forms).
To load arbitrary page for interaction, use `_loadPage` method.

 * `param string` $method
 * `param string` $uri
 * `param string` $content
 * `return string` 
@throws ExternalUrlException
@see `_loadPage`


#### _savePageSource

*hidden API method, expected to be used from Helper classes*
 
Saves page source of to a file

{% highlight php %}

$this->getModule('Symfony')->_savePageSource(codecept_output_dir().'page.html');

{% endhighlight %}
 * `param` $filename


#### amHttpAuthenticated
 
Authenticates user for HTTP_AUTH

 * `param string` $username
 * `param string` $password


#### amLoggedInAs
 
Login with the given user object.
The `$user` object must have a persistent identifier.
If you have more than one firewall or firewall context, you can specify the desired one as a parameter.

{% highlight php %}

<?php
$user = $I->grabEntityFromRepository(User::class, [
    'email' => 'john_doe@example.com'
]);
$I->amLoggedInAs($user);

{% endhighlight %}

 * `param UserInterface` $user
 * `param string` $firewallName
 * `param null` $firewallContext


#### amOnAction
 
Opens web page by action name

{% highlight php %}

<?php
$I->amOnAction('PostController::index');
$I->amOnAction('HomeController');
$I->amOnAction('ArticleController', ['slug' => 'lorem-ipsum']);

{% endhighlight %}

 * `param string` $action
 * `param array` $params


#### amOnPage
 
Opens the page for the given relative URI.

{% highlight php %}

<?php
// opens front page
$I->amOnPage('/');
// opens /register page
$I->amOnPage('/register');

{% endhighlight %}

 * `param string` $page


#### amOnRoute
 
Opens web page using route name and parameters.

{% highlight php %}

<?php
$I->amOnRoute('posts.create');
$I->amOnRoute('posts.show', ['id' => 34]);

{% endhighlight %}

 * `param string` $routeName
 * `param array` $params


#### assertEmailAddressContains
 
Verify that an email contains addresses with a [header](https://datatracker.ietf.org/doc/html/rfc4021)
`$headerName` and its expected value `$expectedValue`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailAddressContains('To', 'jane_doe@example.com');

{% endhighlight %}


#### assertEmailAttachmentCount
 
Verify that an email has sent the specified number `$count` of attachments.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailAttachmentCount(1);

{% endhighlight %}


#### assertEmailHasHeader
 
Verify that an email has a [header](https://datatracker.ietf.org/doc/html/rfc4021) `$headerName`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailHasHeader('Bcc');

{% endhighlight %}


#### assertEmailHeaderNotSame
 
Verify that the [header](https://datatracker.ietf.org/doc/html/rfc4021)
`$headerName` of an email is not the expected one `$expectedValue`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailHeaderNotSame('To', 'john_doe@gmail.com');

{% endhighlight %}


#### assertEmailHeaderSame
 
Verify that the [header](https://datatracker.ietf.org/doc/html/rfc4021)
`$headerName` of an email is the same as expected `$expectedValue`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailHeaderSame('To', 'jane_doe@gmail.com');

{% endhighlight %}


#### assertEmailHtmlBodyContains
 
Verify that the HTML body of an email contains `$text`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailHtmlBodyContains('Successful registration');

{% endhighlight %}


#### assertEmailHtmlBodyNotContains
 
Verify that the HTML body of an email does not contain a text `$text`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailHtmlBodyNotContains('userpassword');

{% endhighlight %}


#### assertEmailNotHasHeader
 
Verify that an email does not have a [header](https://datatracker.ietf.org/doc/html/rfc4021) `$headerName`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailNotHasHeader('Bcc');

{% endhighlight %}


#### assertEmailTextBodyContains
 
Verify the text body of an email contains a `$text`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailTextBodyContains('Example text body');

{% endhighlight %}


#### assertEmailTextBodyNotContains
 
Verify that the text body of an email does not contain a `$text`.
If the Email object is not specified, the last email sent is used instead.

{% highlight php %}

<?php
$I->assertEmailTextBodyNotContains('My secret text body');

{% endhighlight %}


#### attachFile
 
Attaches a file relative to the Codeception `_data` directory to the given file upload field.

{% highlight php %}

<?php
// file is stored in 'tests/_data/prices.xls'
$I->attachFile('input[@type="file"]', 'prices.xls');
?>

{% endhighlight %}

 * `param` $field
 * `param` $filename


#### checkOption
 
Ticks a checkbox. For radio buttons, use the `selectOption` method instead.

{% highlight php %}

<?php
$I->checkOption('#agree');
?>

{% endhighlight %}

 * `param` $option


#### click
 
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
?>

{% endhighlight %}

 * `param` $link
 * `param` $context


#### deleteHeader
 
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

 * `param string` $name the name of the header to delete.


#### dontSee
 
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

 * `param string` $text
 * `param array|string` $selector optional


#### dontSeeAuthentication
 
Check that user is not authenticated.

{% highlight php %}

<?php
$I->dontSeeAuthentication();

{% endhighlight %}


#### dontSeeCheckboxIsChecked
 
Check that the specified checkbox is unchecked.

{% highlight php %}

<?php
$I->dontSeeCheckboxIsChecked('#agree'); // I suppose user didn't agree to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user didn't check the first checkbox in form.
?>

{% endhighlight %}

 * `param` $checkbox


#### dontSeeCookie
 
Checks that there isn't a cookie with the given name.
You can set additional cookie params like `domain`, `path` as array passed in last argument.

 * `param` $cookie

 * `param array` $params


#### dontSeeCurrentUrlEquals
 
Checks that the current URL doesn't equal the given string.
Unlike `dontSeeInCurrentUrl`, this only matches the full URL.

{% highlight php %}

<?php
// current url is not root
$I->dontSeeCurrentUrlEquals('/');
?>

{% endhighlight %}

 * `param string` $uri


#### dontSeeCurrentUrlMatches
 
Checks that current url doesn't match the given regular expression.

{% highlight php %}

<?php
// to match root url
$I->dontSeeCurrentUrlMatches('~^/users/(\d+)~');
?>

{% endhighlight %}

 * `param string` $uri


#### dontSeeElement
 
Checks that the given element is invisible or not present on the page.
You can also specify expected attributes of this element.

{% highlight php %}

<?php
$I->dontSeeElement('.error');
$I->dontSeeElement('//form/input[1]');
$I->dontSeeElement('input', ['name' => 'login']);
$I->dontSeeElement('input', ['value' => '123456']);
?>

{% endhighlight %}

 * `param` $selector
 * `param array` $attributes


#### dontSeeEmailIsSent
 
Checks that no email was sent.
The check is based on `\Symfony\Component\Mailer\EventListener\MessageLoggerListener`, which means:
If your app performs a HTTP redirect, you need to suppress it using [stopFollowingRedirects()](https://codeception.com/docs/modules/Symfony#stopFollowingRedirects) first; otherwise this check will *always* pass.
Starting with version 2.0.0, `codeception/module-symfony` requires your app to use [Symfony Mailer](https://symfony.com/doc/current/mailer.html). If your app still uses [Swift Mailer](https://symfony.com/doc/current/email.html), set your version constraint to `^1.6`.


#### dontSeeEventTriggered
 
Verifies that one or more event listeners were not called during the test.

{% highlight php %}

<?php
$I->dontSeeEventTriggered('App\MyEvent');
$I->dontSeeEventTriggered(new App\Events\MyEvent());
$I->dontSeeEventTriggered(['App\MyEvent', 'App\MyOtherEvent']);

{% endhighlight %}

 * `param string|object|string[]` $expected


#### dontSeeFormErrors
 
Verifies that there are no errors bound to the submitted form.

{% highlight php %}

<?php
$I->dontSeeFormErrors();

{% endhighlight %}


#### dontSeeInCurrentUrl
 
Checks that the current URI doesn't contain the given string.

{% highlight php %}

<?php
$I->dontSeeInCurrentUrl('/users/');
?>

{% endhighlight %}

 * `param string` $uri


#### dontSeeInField
 
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
?>

{% endhighlight %}

 * `param` $field
 * `param` $value


#### dontSeeInFormFields
 
Checks if the array of form parameters (name => value) are not set on the form matched with
the passed selector.

{% highlight php %}

<?php
$I->dontSeeInFormFields('form[name=myform]', [
     'input1' => 'non-existent value',
     'input2' => 'other non-existent value',
]);
?>

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
?>

{% endhighlight %}

Additionally, checkbox values can be checked with a boolean.

{% highlight php %}

<?php
$I->dontSeeInFormFields('#form-id', [
     'checkbox1' => true,        // fails if checked
     'checkbox2' => false,       // fails if unchecked
]);
?>

{% endhighlight %}

 * `param` $formSelector
 * `param` $params


#### dontSeeInSession
 
Assert that a session attribute does not exist, or is not equal to the passed value.

{% highlight php %}

<?php
$I->dontSeeInSession('attribute');
$I->dontSeeInSession('attribute', 'value');

{% endhighlight %}

 * `param string` $attribute
 * `param mixed|null` $value


#### dontSeeInSource
 
Checks that the current page contains the given string in its
raw source code.

{% highlight php %}

<?php
$I->dontSeeInSource('<h1>Green eggs &amp; ham</h1>');

{% endhighlight %}

 * `param`      $raw


#### dontSeeInTitle
 
Checks that the page title does not contain the given string.

 * `param` $title



#### dontSeeLink
 
Checks that the page doesn't contain a link with the given string.
If the second parameter is given, only links with a matching "href" attribute will be checked.

{% highlight php %}

<?php
$I->dontSeeLink('Logout'); // I suppose user is not logged in
$I->dontSeeLink('Checkout now', '/store/cart.php');
?>

{% endhighlight %}

 * `param string` $text
 * `param string` $url optional


#### dontSeeOptionIsSelected
 
Checks that the given option is not selected.

{% highlight php %}

<?php
$I->dontSeeOptionIsSelected('#form input[name=payment]', 'Visa');
?>

{% endhighlight %}

 * `param` $selector
 * `param` $optionText



#### dontSeeOrphanEvent
 
Verifies that there were no orphan events during the test.

An orphan event is an event that was triggered by manually executing the
[`dispatch()`](https://symfony.com/doc/current/components/event_dispatcher.html#dispatch-the-event) method
of the EventDispatcher but was not handled by any listener after it was dispatched.

{% highlight php %}

<?php
$I->dontSeeOrphanEvent();
$I->dontSeeOrphanEvent('App\MyEvent');
$I->dontSeeOrphanEvent(new App\Events\MyEvent());
$I->dontSeeOrphanEvent(['App\MyEvent', 'App\MyOtherEvent']);

{% endhighlight %}

 * `param string|object|string[]` $expected


#### dontSeeRememberedAuthentication
 
Check that user is not authenticated with the 'remember me' option.

{% highlight php %}

<?php
$I->dontSeeRememberedAuthentication();

{% endhighlight %}


#### dontSeeRenderedTemplate
 
Asserts that a template was not rendered in the response.

{% highlight php %}

<?php
$I->dontSeeRenderedTemplate('home.html.twig');

{% endhighlight %}

 * `param string` $template


#### dontSeeResponseCodeIs
 
Checks that response code is equal to value provided.

{% highlight php %}

<?php
$I->dontSeeResponseCodeIs(200);

// recommended \Codeception\Util\HttpCode
$I->dontSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);

{% endhighlight %}
 * `param int` $code


#### fillField
 
Fills a text field or textarea with the given string.

{% highlight php %}

<?php
$I->fillField("//input[@type='text']", "Hello World!");
$I->fillField(['name' => 'email'], 'jon@example.com');
?>

{% endhighlight %}

 * `param` $field
 * `param` $value


#### followRedirect
 
Follow pending redirect if there is one.

{% highlight php %}

<?php
$I->followRedirect();

{% endhighlight %}



#### goToLogoutPath
 
Go to the configured logout url (by default: `/logout`).
This method includes redirection to the destination page configured after logout.

See the Symfony documentation on ['Logging Out'](https://symfony.com/doc/current/security.html#logging-out).


#### grabAttributeFrom
 
Grabs the value of the given attribute value from the given element.
Fails if element is not found.

{% highlight php %}

<?php
$I->grabAttributeFrom('#tooltip', 'title');
?>

{% endhighlight %}

 * `param` $cssOrXpath
 * `param` $attribute



#### grabCookie
 
Grabs a cookie value.
You can set additional cookie params like `domain`, `path` in array passed as last argument.
If the cookie is set by an ajax request (XMLHttpRequest), there might be some delay caused by the browser, so try `$I->wait(0.1)`.

 * `param` $cookie

 * `param array` $params


#### grabFromCurrentUrl
 
Executes the given regular expression against the current URI and returns the first capturing group.
If no parameters are provided, the full URI is returned.

{% highlight php %}

<?php
$user_id = $I->grabFromCurrentUrl('~^/user/(\d+)/~');
$uri = $I->grabFromCurrentUrl();
?>

{% endhighlight %}

 * `param string` $uri optional



#### grabLastSentEmail
 
Returns the last sent email.
The function is based on `\Symfony\Component\Mailer\EventListener\MessageLoggerListener`, which means:
If your app performs a HTTP redirect after sending the email, you need to suppress it using [stopFollowingRedirects()](https://codeception.com/docs/modules/Symfony#stopFollowingRedirects) first.
Starting with version 2.0.0, `codeception/module-symfony` requires your app to use [Symfony Mailer](https://symfony.com/doc/current/mailer.html). If your app still uses [Swift Mailer](https://symfony.com/doc/current/email.html), set your version constraint to `^1.6`.
See also: [grabSentEmails()](https://codeception.com/docs/modules/Symfony#grabSentEmails)

{% highlight php %}

<?php
$email = $I->grabLastSentEmail();
$address = $email->getTo()[0];
$I->assertSame('john_doe@example.com', $address->getAddress());

{% endhighlight %}

 * `return \Symfony\Component\Mime\Email|null` 


#### grabMultiple
 
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
?>

{% endhighlight %}

 * `param` $cssOrXpath
 * `param` $attribute
 * `return string[]` 


#### grabNumRecords
 
Retrieves number of records from database
'id' is the default search parameter.

{% highlight php %}

<?php
$I->grabNumRecords('User::class', ['name' => 'davert']);

{% endhighlight %}

 * `param string` $entityClass  The entity class
 * `param array` $criteria      Optional query criteria
 * `return int` 


#### grabPageSource
 
Grabs current page source code.

@throws ModuleException if no page was opened.
 * `return string` Current page source code.


#### grabParameter
 
Grabs a Symfony parameter

{% highlight php %}

<?php
$I->grabParameter('app.business_name');

{% endhighlight %}

 * `param string` $name
 * `return mixed|null` 


#### grabRepository
 
Grab a Doctrine entity repository.
Works with objects, entities, repositories, and repository interfaces.

{% highlight php %}

<?php
$I->grabRepository($user);
$I->grabRepository(User::class);
$I->grabRepository(UserRepository::class);
$I->grabRepository(UserRepositoryInterface::class);

{% endhighlight %}

 * `param object|string` $mixed
 * `return \Doctrine\ORM\EntityRepository|null` 


#### grabSentEmails
 
Returns an array of all sent emails.
The function is based on `\Symfony\Component\Mailer\EventListener\MessageLoggerListener`, which means:
If your app performs a HTTP redirect after sending the email, you need to suppress it using [stopFollowingRedirects()](https://codeception.com/docs/modules/Symfony#stopFollowingRedirects) first.
Starting with version 2.0.0, `codeception/module-symfony` requires your app to use [Symfony Mailer](https://symfony.com/doc/current/mailer.html). If your app still uses [Swift Mailer](https://symfony.com/doc/current/email.html), set your version constraint to `^1.6`.
See also: [grabLastSentEmail()](https://codeception.com/docs/modules/Symfony#grabLastSentEmail)

{% highlight php %}

<?php
$emails = $I->grabSentEmails();

{% endhighlight %}

 * `return \Symfony\Component\Mime\Email[]` 


#### grabService
 
Grabs a service from the Symfony dependency injection container (DIC).
In "test" environment, Symfony uses a special `test.service_container`.
See the "[Accessing the Container](https://symfony.com/doc/current/testing.html#accessing-the-container)" documentation.
Services that aren't injected somewhere into your app, need to be defined as `public` to be accessible by Codeception.

{% highlight php %}

<?php
$em = $I->grabService('doctrine');

{% endhighlight %}

 * `[Part]` services
 * `param string` $serviceId
 * `return object` 


#### grabTextFrom
 
Finds and returns the text contents of the given element.
If a fuzzy locator is used, the element is found using CSS, XPath,
and by matching the full page source by regular expression.

{% highlight php %}

<?php
$heading = $I->grabTextFrom('h1');
$heading = $I->grabTextFrom('descendant-or-self::h1');
$value = $I->grabTextFrom('~<input value=(.*?)]~sgi'); // match with a regex
?>

{% endhighlight %}

 * `param` $cssOrXPathOrRegex



#### grabValueFrom
 
 * `param` $field

 * `return array|mixed|null|string` 


#### haveHttpHeader
 
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

 * `param string` $name the name of the request header
 * `param string` $value the value to set it to for subsequent
       requests


#### haveServerParameter
 
Sets SERVER parameter valid for all next requests.

{% highlight php %}

$I->haveServerParameter('name', 'value');

{% endhighlight %}
 * `param string` $name
 * `param string` $value


#### invalidateCachedRouter
 
Invalidate previously cached routes.


#### logout
 
Alias method for [`logoutProgrammatically()`](https://codeception.com/docs/modules/Symfony#logoutProgrammatically)

{% highlight php %}

<?php
$I->logout();

{% endhighlight %}


#### logoutProgrammatically
 
Invalidates the current user's session and expires the session cookies.
This method does not include any redirects after logging out.

{% highlight php %}

<?php
$I->logoutProgrammatically();

{% endhighlight %}


#### makeHtmlSnapshot
 
Use this method within an [interactive pause](https://codeception.com/docs/02-GettingStarted#Interactive-Pause) to save the HTML source code of the current page.

{% highlight php %}

<?php
$I->makeHtmlSnapshot('edit_page');
// saved to: tests/_output/debug/edit_page.html
$I->makeHtmlSnapshot();
// saved to: tests/_output/debug/2017-05-26_14-24-11_4b3403665fea6.html

{% endhighlight %}

 * `param null` $name


#### moveBack
 
Moves back in history.

 * `param int` $numberOfSteps (default value 1)


#### persistPermanentService
 
Get service $serviceName and add it to the lists of persistent services,
making that service persistent between tests.

 * `[Part]` services
 * `param string` $serviceName


#### persistService
 
Get service $serviceName and add it to the lists of persistent services.

 * `[Part]` services
 * `param string` $serviceName


#### rebootClientKernel
 
Reboot client's kernel.
Can be used to manually reboot kernel when 'rebootable_client' => false

{% highlight php %}

<?php

// Perform some requests

$I->rebootClientKernel();

// Perform other requests


{% endhighlight %}



#### resetCookie
 
Unsets cookie with the given name.
You can set additional cookie params like `domain`, `path` in array passed as last argument.

 * `param` $cookie

 * `param array` $params


#### runSymfonyConsoleCommand
 
Run Symfony console command, grab response and return as string.
Recommended to use for integration or functional testing.

{% highlight php %}

<?php
$result = $I->runSymfonyConsoleCommand('hello:world', ['arg' => 'argValue', 'opt1' => 'optValue'], ['input']);

{% endhighlight %}

 * `param string` $command          The console command to execute
 * `param array`  $parameters       Parameters (arguments and options) to pass to the command
 * `param array`  $consoleInputs    Console inputs (e.g. used for interactive questions)
 * `param int`    $expectedExitCode The expected exit code of the command
 * `return string` Returns the console output of the command


#### see
 
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

 * `param string` $text
 * `param array|string` $selector optional


#### seeAuthentication
 
Checks that a user is authenticated.

{% highlight php %}

<?php
$I->seeAuthentication();

{% endhighlight %}


#### seeCheckboxIsChecked
 
Checks that the specified checkbox is checked.

{% highlight php %}

<?php
$I->seeCheckboxIsChecked('#agree'); // I suppose user agreed to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user agreed to terms, If there is only one checkbox in form.
$I->seeCheckboxIsChecked('//form/input[@type=checkbox and @name=agree]');
?>

{% endhighlight %}

 * `param` $checkbox


#### seeCookie
 
Checks that a cookie with the given name is set.
You can set additional cookie params like `domain`, `path` as array passed in last argument.

{% highlight php %}

<?php
$I->seeCookie('PHPSESSID');
?>

{% endhighlight %}

 * `param` $cookie
 * `param array` $params


#### seeCurrentActionIs
 
Checks that current page matches action

{% highlight php %}

<?php
$I->seeCurrentActionIs('PostController::index');
$I->seeCurrentActionIs('HomeController');

{% endhighlight %}

 * `param string` $action


#### seeCurrentRouteIs
 
Checks that current url matches route.

{% highlight php %}

<?php
$I->seeCurrentRouteIs('posts.index');
$I->seeCurrentRouteIs('posts.show', ['id' => 8]);

{% endhighlight %}

 * `param string` $routeName
 * `param array` $params


#### seeCurrentTemplateIs
 
Asserts that the current template matches the expected template.

{% highlight php %}

<?php
$I->seeCurrentTemplateIs('home.html.twig');

{% endhighlight %}

 * `param string` $expectedTemplate


#### seeCurrentUrlEquals
 
Checks that the current URL is equal to the given string.
Unlike `seeInCurrentUrl`, this only matches the full URL.

{% highlight php %}

<?php
// to match root url
$I->seeCurrentUrlEquals('/');
?>

{% endhighlight %}

 * `param string` $uri


#### seeCurrentUrlMatches
 
Checks that the current URL matches the given regular expression.

{% highlight php %}

<?php
// to match root url
$I->seeCurrentUrlMatches('~^/users/(\d+)~');
?>

{% endhighlight %}

 * `param string` $uri


#### seeElement
 
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
?>

{% endhighlight %}

 * `param` $selector
 * `param array` $attributes


#### seeEmailIsSent
 
Checks if the given number of emails was sent (default `$expectedCount`: 1).
The check is based on `\Symfony\Component\Mailer\EventListener\MessageLoggerListener`, which means:
If your app performs a HTTP redirect after sending the email, you need to suppress it using [stopFollowingRedirects()](https://codeception.com/docs/modules/Symfony#stopFollowingRedirects) first.
Starting with version 2.0.0, `codeception/module-symfony` requires your app to use [Symfony Mailer](https://symfony.com/doc/current/mailer.html). If your app still uses [Swift Mailer](https://symfony.com/doc/current/email.html), set your version constraint to `^1.6`.

{% highlight php %}

<?php
$I->seeEmailIsSent(2);

{% endhighlight %}

 * `param int` $expectedCount The expected number of emails sent


#### seeEventTriggered
 
Verifies that one or more event listeners were called during the test.

{% highlight php %}

<?php
$I->seeEventTriggered('App\MyEvent');
$I->seeEventTriggered(new App\Events\MyEvent());
$I->seeEventTriggered(['App\MyEvent', 'App\MyOtherEvent']);

{% endhighlight %}

 * `param string|object|string[]` $expected


#### seeFormErrorMessage
 
Verifies that a form field has an error.
You can specify the expected error message as second parameter.

{% highlight php %}

<?php
$I->seeFormErrorMessage('username');
$I->seeFormErrorMessage('username', 'Username is empty');

{% endhighlight %}

 * `param string` $field
 * `param string|null` $message


#### seeFormErrorMessages
 
Verifies that multiple fields on a form have errors.

If you only specify the name of the fields, this method will
verify that the field contains at least one error of any type:

{% highlight php %}

<?php
$I->seeFormErrorMessages(['telephone', 'address']);

{% endhighlight %}

If you want to specify the error messages, you can do so
by sending an associative array instead, with the key being
the name of the field and the error message the value.

This method will validate that the expected error message
is contained in the actual error message, that is,
you can specify either the entire error message or just a part of it:

{% highlight php %}

<?php
$I->seeFormErrorMessages([
    'address'   => 'The address is too long'
    'telephone' => 'too short', // the full error message is 'The telephone is too short'
]);

{% endhighlight %}

If you don't want to specify the error message for some fields,
you can pass `null` as value instead of the message string,
or you can directly omit the value of that field. If that is the case,
it will be validated that that field has at least one error of any type:

{% highlight php %}

<?php
$I->seeFormErrorMessages([
    'telephone' => 'too short',
    'address'   => null,
    'postal code',
]);

{% endhighlight %}

 * `param string[]` $expectedErrors


#### seeFormHasErrors
 
Verifies that there are one or more errors bound to the submitted form.

{% highlight php %}

<?php
$I->seeFormHasErrors();

{% endhighlight %}


#### seeInCurrentRoute
 
Checks that current url matches route.
Unlike seeCurrentRouteIs, this can matches without exact route parameters

{% highlight php %}

<?php
$I->seeInCurrentRoute('my_blog_pages');

{% endhighlight %}

 * `param string` $routeName


#### seeInCurrentUrl
 
Checks that current URI contains the given string.

{% highlight php %}

<?php
// to match: /home/dashboard
$I->seeInCurrentUrl('home');
// to match: /users/1
$I->seeInCurrentUrl('/users/');
?>

{% endhighlight %}

 * `param string` $uri


#### seeInField
 
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
?>

{% endhighlight %}

 * `param` $field
 * `param` $value


#### seeInFormFields
 
Checks if the array of form parameters (name => value) are set on the form matched with the
passed selector.

{% highlight php %}

<?php
$I->seeInFormFields('form[name=myform]', [
     'input1' => 'value',
     'input2' => 'other value',
]);
?>

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
?>

{% endhighlight %}

Additionally, checkbox values can be checked with a boolean.

{% highlight php %}

<?php
$I->seeInFormFields('#form-id', [
     'checkbox1' => true,        // passes if checked
     'checkbox2' => false,       // passes if unchecked
]);
?>

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
$I->submitForm('//form[@id=my-form]', $form, 'submitButton');
// $I->amOnPage('/path/to/form-page') may be needed
$I->seeInFormFields('//form[@id=my-form]', $form);
?>

{% endhighlight %}

 * `param` $formSelector
 * `param` $params


#### seeInSession
 
Assert that a session attribute exists.

{% highlight php %}

<?php
$I->seeInSession('attribute');
$I->seeInSession('attribute', 'value');

{% endhighlight %}

 * `param string` $attribute
 * `param mixed|null` $value


#### seeInSource
 
Checks that the current page contains the given string in its
raw source code.

{% highlight php %}

<?php
$I->seeInSource('<h1>Green eggs &amp; ham</h1>');

{% endhighlight %}

 * `param`      $raw


#### seeInTitle
 
Checks that the page title contains the given string.

{% highlight php %}

<?php
$I->seeInTitle('Blog - Post #1');
?>

{% endhighlight %}

 * `param` $title



#### seeLink
 
Checks that there's a link with the specified text.
Give a full URL as the second parameter to match links with that exact URL.

{% highlight php %}

<?php
$I->seeLink('Logout'); // matches <a href="#">Logout</a>
$I->seeLink('Logout','/logout'); // matches <a href="/logout">Logout</a>
?>

{% endhighlight %}

 * `param string` $text
 * `param string` $url optional


#### seeNumRecords
 
Checks that number of given records were found in database.
'id' is the default search parameter.

{% highlight php %}

<?php
$I->seeNumRecords(1, User::class, ['name' => 'davert']);
$I->seeNumRecords(80, User::class);

{% endhighlight %}

 * `param int` $expectedNum Expected number of records
 * `param string` $className A doctrine entity
 * `param array` $criteria Optional query criteria


#### seeNumberOfElements
 
Checks that there are a certain number of elements matched by the given locator on the page.

{% highlight php %}

<?php
$I->seeNumberOfElements('tr', 10);
$I->seeNumberOfElements('tr', [0,10]); // between 0 and 10 elements
?>

{% endhighlight %}
 * `param` $selector
 * `param mixed` $expected int or int[]


#### seeOptionIsSelected
 
Checks that the given option is selected.

{% highlight php %}

<?php
$I->seeOptionIsSelected('#form input[name=payment]', 'Visa');
?>

{% endhighlight %}

 * `param` $selector
 * `param` $optionText



#### seeOrphanEvent
 
Verifies that one or more orphan events were dispatched during the test.

An orphan event is an event that was triggered by manually executing the
[`dispatch()`](https://symfony.com/doc/current/components/event_dispatcher.html#dispatch-the-event) method
of the EventDispatcher but was not handled by any listener after it was dispatched.

{% highlight php %}

<?php
$I->seeOrphanEvent('App\MyEvent');
$I->seeOrphanEvent(new App\Events\MyEvent());
$I->seeOrphanEvent(['App\MyEvent', 'App\MyOtherEvent']);

{% endhighlight %}

 * `param string|object|string[]` $expected


#### seePageIsAvailable
 
Verifies that a page is available.
By default it checks the current page, specify the `$url` parameter to change it.

{% highlight php %}

<?php
$I->amOnPage('/dashboard');
$I->seePageIsAvailable();

$I->seePageIsAvailable('/dashboard'); // Same as above

{% endhighlight %}

 * `param string|null` $url


#### seePageNotFound
 
Asserts that current page has 404 response status code.


#### seePageRedirectsTo
 
Goes to a page and check that it redirects to another.

{% highlight php %}

<?php
$I->seePageRedirectsTo('/admin', '/login');

{% endhighlight %}

 * `param string` $page
 * `param string` $redirectsTo


#### seeRememberedAuthentication
 
Checks that a user is authenticated with the 'remember me' option.

{% highlight php %}

<?php
$I->seeRememberedAuthentication();

{% endhighlight %}


#### seeRenderedTemplate
 
Asserts that a template was rendered in the response.
That includes templates built with [inheritance](https://twig.symfony.com/doc/3.x/templates.html#template-inheritance).

{% highlight php %}

<?php
$I->seeRenderedTemplate('home.html.twig');
$I->seeRenderedTemplate('layout.html.twig');

{% endhighlight %}

 * `param string` $template


#### seeRequestTimeIsLessThan
 
Asserts that the time a request lasted is less than expected.

If the page performed a HTTP redirect, only the time of the last request will be taken into account.
You can modify this behavior using [stopFollowingRedirects()](https://codeception.com/docs/modules/Symfony#stopFollowingRedirects) first.

Also, note that using code coverage can significantly increase the time it takes to resolve a request,
which could lead to unreliable results when used together.

It is recommended to set [`rebootable_client`](https://codeception.com/docs/modules/Symfony#Config) to `true` (=default),
cause otherwise this assertion gives false results if you access multiple pages in a row, or if your app performs a redirect.

 * `param int|float` $expectedMilliseconds The expected time in milliseconds


#### seeResponseCodeIs
 
Checks that response code is equal to value provided.

{% highlight php %}

<?php
$I->seeResponseCodeIs(200);

// recommended \Codeception\Util\HttpCode
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

{% endhighlight %}

 * `param int` $code


#### seeResponseCodeIsBetween
 
Checks that response code is between a certain range. Between actually means [from <= CODE <= to]

 * `param int` $from
 * `param int` $to


#### seeResponseCodeIsClientError
 
Checks that the response code is 4xx


#### seeResponseCodeIsRedirection
 
Checks that the response code 3xx


#### seeResponseCodeIsServerError
 
Checks that the response code is 5xx


#### seeResponseCodeIsSuccessful
 
Checks that the response code 2xx


#### seeSessionHasValues
 
Assert that the session has a given list of values.

{% highlight php %}

<?php
$I->seeSessionHasValues(['key1', 'key2']);
$I->seeSessionHasValues(['key1' => 'value1', 'key2' => 'value2']);

{% endhighlight %}

 * `param array` $bindings


#### seeUserHasRole
 
Check that the current user has a role

{% highlight php %}

<?php
$I->seeUserHasRole('ROLE_ADMIN');

{% endhighlight %}

 * `param string` $role


#### seeUserHasRoles
 
Verifies that the current user has multiple roles

{% highlight php %}

<?php
$I->seeUserHasRoles(['ROLE_USER', 'ROLE_ADMIN']);

{% endhighlight %}

 * `param string[]` $roles


#### seeUserPasswordDoesNotNeedRehash
 
Checks that the user's password would not benefit from rehashing.
If the user is not provided it is taken from the current session.

You might use this function after performing tasks like registering a user or submitting a password update form.

{% highlight php %}

<?php
$I->seeUserPasswordDoesNotNeedRehash();
$I->seeUserPasswordDoesNotNeedRehash($user);

{% endhighlight %}

 * `param UserInterface|null` $user


#### selectOption
 
Selects an option in a select tag or in radio button group.

{% highlight php %}

<?php
$I->selectOption('form select[name=account]', 'Premium');
$I->selectOption('form input[name=payment]', 'Monthly');
$I->selectOption('//form/select[@name=account]', 'Monthly');
?>

{% endhighlight %}

Provide an array for the second argument to select multiple options:

{% highlight php %}

<?php
$I->selectOption('Which OS do you use?', array('Windows','Linux'));
?>

{% endhighlight %}

Or provide an associative array for the second argument to specifically define which selection method should be used:

{% highlight php %}

<?php
$I->selectOption('Which OS do you use?', array('text' => 'Windows')); // Only search by text 'Windows'
$I->selectOption('Which OS do you use?', array('value' => 'windows')); // Only search by value 'windows'
?>

{% endhighlight %}

 * `param` $select
 * `param` $option


#### sendAjaxGetRequest
 
Sends an ajax GET request with the passed parameters.
See `sendAjaxPostRequest()`

 * `param` $uri
 * `param` $params


#### sendAjaxPostRequest
 
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

 * `param string` $uri
 * `param array` $params


#### sendAjaxRequest
 
Sends an ajax request, using the passed HTTP method.
See `sendAjaxPostRequest()`
Example:
{% highlight php %}

<?php
$I->sendAjaxRequest('PUT', '/posts/7', ['title' => 'new title']);

{% endhighlight %}

 * `param` $method
 * `param` $uri
 * `param array` $params


#### setCookie
 
Sets a cookie with the given name and value.
You can set additional cookie params like `domain`, `path`, `expires`, `secure` in array passed as last argument.

{% highlight php %}

<?php
$I->setCookie('PHPSESSID', 'el4ukv0kqbvoirg7nkp4dncpk3');
?>

{% endhighlight %}

 * `param` $name
 * `param` $val
 * `param array` $params



#### setMaxRedirects
 
Sets the maximum number of redirects that the Client can follow.

{% highlight php %}

<?php
$I->setMaxRedirects(2);

{% endhighlight %}

 * `param int` $maxRedirects


#### setServerParameters
 
Sets SERVER parameters valid for all next requests.
this will remove old ones.

{% highlight php %}

$I->setServerParameters([]);

{% endhighlight %}


#### startFollowingRedirects
 
Enables automatic redirects to be followed by the client.

{% highlight php %}

<?php
$I->startFollowingRedirects();

{% endhighlight %}



#### stopFollowingRedirects
 
Prevents automatic redirects to be followed by the client.

{% highlight php %}

<?php
$I->stopFollowingRedirects();

{% endhighlight %}



#### submitForm
 
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

 * `param` $selector
 * `param` $params
 * `param` $button


#### submitSymfonyForm
 
Submit a form specifying the form name only once.

Use this function instead of [`$I->submitForm()`](#submitForm) to avoid repeating the form name in the field selectors.
If you customized the names of the field selectors use `$I->submitForm()` for full control.

{% highlight php %}

<?php
$I->submitSymfonyForm('login_form', [
    '[email]'    => 'john_doe@example.com',
    '[password]' => 'secretForest'
]);

{% endhighlight %}

 * `param string` $name The `name` attribute of the `<form>` (you cannot use an array as selector here)
 * `param string[]` $fields


#### switchToIframe
 
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

 * `param string` $name


#### uncheckOption
 
Unticks a checkbox.

{% highlight php %}

<?php
$I->uncheckOption('#notify');
?>

{% endhighlight %}

 * `param` $option


#### unpersistService
 
Remove service $serviceName from the lists of persistent services.

 * `[Part]` services
 * `param string` $serviceName

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-symfony/tree/master/src/Codeception/Module/Symfony.php">Help us to improve documentation. Edit module reference</a></div>
