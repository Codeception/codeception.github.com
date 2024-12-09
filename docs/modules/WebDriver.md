---
layout: doc
title: WebDriver - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-WebDriver/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-webdriver/tree/master/src/Codeception/Module/WebDriver.php"><strong>source</strong></a></div>

# WebDriver
### Installation

{% highlight yaml %}
composer require --dev codeception/module-webdriver

{% endhighlight %}

### Description



Run tests in real browsers using the W3C [WebDriver protocol](https://www.w3.org/TR/webdriver/).
There are multiple ways of running browser tests using WebDriver:

### Selenium (Recommended)

* Java is required
* NodeJS is required

The fastest way to get started is to [Install and launch Selenium using selenium-standalone NodeJS package](https://www.npmjs.com/package/selenium-standalone).

Launch selenium standalone in separate console window:

{% highlight yaml %}
selenium-standalone start

{% endhighlight %}

Update configuration in `Acceptance.suite.yml`:

{% highlight yaml %}

modules:
   enabled:
      - WebDriver:
         url: 'http://localhost/'
         browser: chrome # 'chrome' or 'firefox'

{% endhighlight %}

### Headless Chrome Browser

To enable headless mode (launch tests without showing a window) for Chrome browser using Selenium use this config in `Acceptance.suite.yml`:

{% highlight yaml %}

modules:
   enabled:
      - WebDriver:
         url: 'http://localhost/'
         browser: chrome
         capabilities:
            goog:chromeOptions:
               args: ["--headless"]

{% endhighlight %}

### Headless Selenium in Docker

Docker can ship Selenium Server with all its dependencies and browsers inside a single container.
Running tests inside Docker is as easy as pulling [official selenium image](https://github.com/SeleniumHQ/docker-selenium) and starting a container with Chrome:

{% highlight yaml %}
docker run --net=host --shm-size 2g selenium/standalone-chrome

{% endhighlight %}

By using `--net=host` allow Selenium to access local websites.

### Local Chrome and/or Firefox

Tests can be executed directly through ChromeDriver or GeckoDriver (for Firefox). Consider using this option if you don't plan to use Selenium.

#### ChromeDriver

* Download and install [ChromeDriver](https://sites.google.com/chromium.org/driver/downloads?authuser=0)
* Launch ChromeDriver in a separate console window: `chromedriver --url-base=/wd/hub`.

Configuration in `Acceptance.suite.yml`:

{% highlight yaml %}

modules:
   enabled:
      - WebDriver:
         browser: chrome
         url: 'http://localhost/'
         window_size: 2000x1000
         port: 9515
         capabilities:
             goog:chromeOptions:
                 args: ["--headless"] # Run Chrome in headless mode
                 prefs:
                     download.default_directory: "..."

{% endhighlight %}
See here for additional [Chrome options](https://sites.google.com/a/chromium.org/chromedriver/capabilities)


#### GeckoDriver

* [GeckoDriver](https://github.com/mozilla/geckodriver/releases) must be installed
* Start GeckoDriver in a separate console window: `geckodriver`.

Configuration in `Acceptance.suite.yml`:

{% highlight yaml %}

modules:
   enabled:
      - WebDriver:
         browser: firefox
         url: 'http://localhost/'
         window_size: 2000x1000
         path: ''
         capabilities:
             acceptInsecureCerts: true # allow self-signed certificates
             moz:firefoxOptions:
                 args: ["-headless"] # Run Firefox in headless mode
                 prefs:
                     intl.accept_languages: "de-AT" # Set HTTP-Header `Accept-Language: de-AT` for requests

{% endhighlight %}
See here for [Firefox capabilities](https://developer.mozilla.org/en-US/docs/Web/WebDriver/Capabilities#List_of_capabilities)

### Cloud Testing

Cloud Testing services can run your WebDriver tests in the cloud.
In case you want to test a local site or site behind a firewall
you should use a tunnel application provided by a service.

#### SauceLabs

1. Create an account at [SauceLabs.com](https://saucelabs.com/) to get your username and access key
2. In the module configuration use the format `username`:`access_key`@ondemand.saucelabs.com' for `host`
3. Configure `platformName` under `capabilities` to define the [Operating System](https://docs.saucelabs.com/basics/platform-configurator/)
4. run a tunnel app if your site can't be accessed from Internet

{% highlight yaml %}

    modules:
       enabled:
          - WebDriver:
             url: http://mysite.com
             host: '<username>:<access key>@ondemand.saucelabs.com'
             port: 80
             browser: chrome
             capabilities:
                 platformName: 'Windows 10'

{% endhighlight %}

#### BrowserStack

1. Create an account at [BrowserStack](https://www.browserstack.com/) to get your username and access key
2. In the module configuration use the format `username`:`access_key`@hub.browserstack.com' for `host`
3. Configure `os` and `os_version` under `capabilities` to define the operating System
4. If your site is available only locally or via VPN you should use a tunnel app. In this case add `browserstack.local` capability and set it to true.

{% highlight yaml %}

 modules:
     enabled:
         - WebDriver:
             url: http://mysite.com
             host: '<username>:<access key>@hub.browserstack.com'
             port: 80
             browser: chrome
             capabilities:
                 bstack:options:
                     os: Windows
                     osVersion: 10
                     local: true # for local testing

{% endhighlight %}

#### LambdaTest

1. Create an account at [LambdaTest](https://www.lambdatest.com) to get your username and access key
2. In the module configuration use the format `username`:`access key`@hub.lambdatest.com' for `host`
3. Configure `platformName`, 'browserVersion', and 'browserName' under `LT:Options` to define test environments.
4. If your website is available only locally or via VPN you should use LambdaTest tunnel. In this case, you can add capability "tunnel":true;.

{% highlight yaml %}

 modules:
     enabled:
           - WebDriver:
               url: "https://openclassrooms.com"
               host: 'hub.lambdatest.com'
               port: 80
               browser: 'Chrome'
               capabilities:
                   LT:Options:
                   platformName: 'Windows 10'
                   browserVersion: 'latest-5'
                   browserName: 'Chrome'
                   tunnel: true #for Local testing

{% endhighlight %}

#### TestingBot

1. Create an account at [TestingBot](https://testingbot.com/) to get your key and secret
2. In the module configuration use the format `key`:`secret`@hub.testingbot.com' for `host`
3. Configure `platformName` under `capabilities` to define the [Operating System](https://testingbot.com/support/getting-started/browsers.html)
4. Run [TestingBot Tunnel](https://testingbot.com/support/other/tunnel) if your site can't be accessed from Internet

{% highlight yaml %}

modules:
   enabled:
      - WebDriver:
         url: http://mysite.com
         host: '<key>:<secret>@hub.testingbot.com'
         port: 80
         browser: chrome
         capabilities:
             platformName: Windows 10

{% endhighlight %}

### Configuration

* `url` *required* - Base URL for your app (amOnPage opens URLs relative to this setting).
* `browser` *required* - Browser to launch.
* `host` - Selenium server host (127.0.0.1 by default).
* `port` - Selenium server port (4444 by default).
* `restart` - Set to `false` (default) to use the same browser window for all tests, or set to `true` to create a new window for each test. In any case, when all tests are finished the browser window is closed.
* `start` - Autostart a browser for tests. Can be disabled if browser session is started with `_initializeSession` inside a Helper.
* `window_size` - Initial window size. Set to `maximize` or a dimension in the format `640x480`.
* `clear_cookies` - Set to false to keep cookies, or set to true (default) to delete all cookies between tests.
* `wait` (default: 0 seconds) - Whenever element is required and is not on page, wait for n seconds to find it before fail.
* `capabilities` - Sets Selenium [desired capabilities](https://github.com/SeleniumHQ/selenium/wiki/DesiredCapabilities). Should be a key-value array.
* `connection_timeout` - timeout for opening a connection to remote selenium server (30 seconds by default).
* `request_timeout` - timeout for a request to return something from remote selenium server (30 seconds by default).
* `pageload_timeout` - amount of time to wait for a page load to complete before throwing an error (default 0 seconds).
* `http_proxy` - sets http proxy server url for testing a remote server.
* `http_proxy_port` - sets http proxy server port
* `ssl_proxy` - sets ssl(https) proxy server url for testing a remote server.
* `ssl_proxy_port` - sets ssl(https) proxy server port
* `debug_log_entries` - how many selenium entries to print with `debugWebDriverLogs` or on fail (0 by default).
* `log_js_errors` - Set to true to include possible JavaScript to HTML report, or set to false (default) to deactivate.
* `webdriver_proxy` - sets http proxy to tunnel requests to the remote Selenium WebDriver through
* `webdriver_proxy_port` - sets http proxy server port to tunnel requests to the remote Selenium WebDriver through

Example (`Acceptance.suite.yml`)

{% highlight yaml %}

modules:
   enabled:
      - WebDriver:
         url: 'http://localhost/'
         browser: firefox
         window_size: 1024x768
         capabilities:
             unhandledPromptBehaviour: 'accept'
             moz:firefoxOptions:
                 profile: '~/firefox-profiles/codeception-profile.zip.b64'

{% endhighlight %}

### Loading Parts from other Modules

While all Codeception modules are designed to work stand-alone, it's still possible to load *several* modules at once. To use e.g. the [Asserts module](https://codeception.com/docs/modules/Asserts) in your acceptance tests, just load it like this in your `Acceptance.suite.yml`:

{% highlight yaml %}

modules:
    enabled:
        - WebDriver
        - Asserts

{% endhighlight %}

However, when loading a framework module (e.g. [Symfony](https://codeception.com/docs/modules/Symfony)) like this, it would lead to a conflict: When you call `$I->amOnPage()`, Codeception wouldn't know if you want to access the page using WebDriver's `amOnPage()`, or Symfony's `amOnPage()`. That's why possibly conflicting modules are separated into "parts". Here's how to load just the "services" part from e.g. Symfony:
{% highlight yaml %}

modules:
    enabled:
        - WebDriver
        - Symfony:
            part: services

{% endhighlight %}
To find out which parts each module has, look at the "Parts" header on the module's page.

### Usage

#### Locating Elements

Most methods in this module that operate on a DOM element (e.g. `click`) accept a locator as the first argument,
which can be either a string or an array.

If the locator is an array, it should have a single element,
with the key signifying the locator type (`id`, `name`, `css`, `xpath`, `link`, or `class`)
and the value being the locator itself.
This is called a "strict" locator.
Examples:

* `['id' => 'foo']` matches `<div id="foo">`
* `['name' => 'foo']` matches `<div name="foo">`
* `['css' => 'input[type=input][value=foo]']` matches `<input type="input" value="foo">`
* `['xpath' => "//input[@type='submit'][contains(@value, 'foo')]"]` matches `<input type="submit" value="foobar">`
* `['link' => 'Click here']` matches `<a href="google.com">Click here</a>`
* `['class' => 'foo']` matches `<div class="foo">`

Writing good locators can be tricky.
The Mozilla team has written an excellent guide titled [Writing reliable locators for Selenium and WebDriver tests](https://blog.mozilla.org/webqa/2013/09/26/writing-reliable-locators-for-selenium-and-webdriver-tests/).

If you prefer, you may also pass a string for the locator. This is called a "fuzzy" locator.
In this case, Codeception uses a a variety of heuristics (depending on the exact method called) to determine what element you're referring to.
For example, here's the heuristic used for the `submitForm` method:

1. Does the locator look like an ID selector (e.g. "#foo")? If so, try to find a form matching that ID.
2. If nothing found, check if locator looks like a CSS selector. If so, run it.
3. If nothing found, check if locator looks like an XPath expression. If so, run it.
4. Throw an `ElementNotFound` exception.

Be warned that fuzzy locators can be significantly slower than strict locators.
Especially if you use Selenium WebDriver with `wait` (aka implicit wait) option.
In the example above if you set `wait` to 5 seconds and use XPath string as fuzzy locator,
`submitForm` method will wait for 5 seconds at each step.
That means 5 seconds finding the form by ID, another 5 seconds finding by CSS
until it finally tries to find the form by XPath).
If speed is a concern, it's recommended you stick with explicitly specifying the locator type via the array syntax.

#### Get Scenario Metadata

You can inject `\Codeception\Scenario` into your test to get information about the current configuration:
{% highlight php %}

use Codeception\Scenario;

public function myTest(AcceptanceTester $I, Scenario $scenario)
{
    if ('firefox' === $scenario->current('browser')) {
        // ...
    }
}

{% endhighlight %}
See [Get Scenario Metadata](https://codeception.com/docs/07-AdvancedUsage#Get-Scenario-Metadata) for more information on `$scenario`.

### Public Properties

* `webDriver` - instance of `\Facebook\WebDriver\Remote\RemoteWebDriver`. Can be accessed from Helper classes for complex WebDriver interactions.

{% highlight php %}

// inside Helper class
$this->getModule('WebDriver')->webDriver->getKeyboard()->sendKeys('hello, webdriver');

{% endhighlight %}


### Actions

#### _backupSession

*hidden API method, expected to be used from Helper classes*

* `api` 
* `return \Facebook\WebDriver\WebDriver`

Returns current WebDriver session for saving


#### _capabilities

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param \Closure` $capabilityFunction
* `return void`

Change capabilities of WebDriver. Should be executed before starting a new browser session.

This method expects a function to be passed which returns array or [WebDriver Desired Capabilities](https://github.com/php-webdriver/php-webdriver/blob/main/lib/Remote/DesiredCapabilities.php) object.
Additional [Chrome options](https://github.com/php-webdriver/php-webdriver/wiki/ChromeOptions) (like adding extensions) can be passed as well.

{% highlight php %}

<?php // in helper
public function _before(TestInterface $test)
{
    $this->getModule('WebDriver')->_capabilities(function($currentCapabilities) {
        // or new \Facebook\WebDriver\Remote\DesiredCapabilities();
        return \Facebook\WebDriver\Remote\DesiredCapabilities::firefox();
    });
}

{% endhighlight %}

to make this work load `\Helper\Acceptance` before `WebDriver` in `Acceptance.suite.yml`:

{% highlight yaml %}

modules:
    enabled:
        - \Helper\Acceptance
        - WebDriver

{% endhighlight %}

For instance, [**BrowserStack** cloud service](https://www.browserstack.com/automate/capabilities) may require a test name to be set in capabilities.
This is how it can be done via `_capabilities` method from `Helper\Acceptance`:

{% highlight php %}

<?php
// inside Helper\Acceptance
public function _before(TestInterface $test)
{
     $name = $test->getMetadata()->getName();
     $this->getModule('WebDriver')->_capabilities(function($currentCapabilities) use ($name) {
         $currentCapabilities['name'] = $name;
         return $currentCapabilities;
     });
}

{% endhighlight %}
In this case, please ensure that `\Helper\Acceptance` is loaded before WebDriver so new capabilities could be applied.


#### _closeSession

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param RemoteWebDriver|null` $webDriver a specific webdriver session instance
* `return void`

Manually closes current WebDriver session.

{% highlight php %}

<?php
$this->getModule('WebDriver')->_closeSession();

// close a specific session
$webDriver = $this->getModule('WebDriver')->webDriver;
$this->getModule('WebDriver')->_closeSession($webDriver);

{% endhighlight %}


#### _findClickable

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param WebDriverSearchContext` $page WebDriver instance or an element to search within
* `param string|array|WebDriverBy` $link A link text or locator to click
* `return ?\Facebook\WebDriver\WebDriverElement`

Locates a clickable element.

Use it in Helpers or GroupObject or Extension classes:

{% highlight php %}

<?php
$module = $this->getModule('WebDriver');
$page = $module->webDriver;

// search a link or button on a page
$el = $module->_findClickable($page, 'Click Me');

// search a link or button within an element
$topBar = $module->_findElements('.top-bar')[0];
$el = $module->_findClickable($topBar, 'Click Me');


{% endhighlight %}


#### _findElements

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param ` $locator
* `return array`

Locates element using available Codeception locator types:

* XPath
* CSS
* Strict Locator

Use it in Helpers or GroupObject or Extension classes:

{% highlight php %}

<?php
$els = $this->getModule('WebDriver')->_findElements('.items');
$els = $this->getModule('WebDriver')->_findElements(['name' => 'username']);

$editLinks = $this->getModule('WebDriver')->_findElements(['link' => 'Edit']);
// now you can iterate over $editLinks and check that all them have valid hrefs

{% endhighlight %}

WebDriver module returns `Facebook\WebDriver\Remote\RemoteWebElement` instances
PhpBrowser and Framework modules return `Symfony\Component\DomCrawler\Crawler` instances


#### _getCurrentUri

*hidden API method, expected to be used from Helper classes*

* `api` 
* `throws ModuleException`
* `return string`

Uri of currently opened page.


#### _getUrl

*hidden API method, expected to be used from Helper classes*

* `api` 
* `throws ModuleConfigException`
* `return mixed`

Returns URL of a host.


#### _initializeSession

*hidden API method, expected to be used from Helper classes*

* `api` 
* `return void`

Manually starts a new browser session.

{% highlight php %}

<?php
$this->getModule('WebDriver')->_initializeSession();

{% endhighlight %}


#### _loadSession

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param RemoteWebDriver` $session
* `return void`

Loads current RemoteWebDriver instance as a session


#### _restart

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param array` $config
* `return void`

Restarts a web browser.

Can be used with `_reconfigure` to open browser with different configuration

{% highlight php %}

<?php
// inside a Helper
$this->getModule('WebDriver')->_restart(); // just restart
$this->getModule('WebDriver')->_restart(['browser' => $browser]); // reconfigure + restart

{% endhighlight %}


#### _savePageSource

*hidden API method, expected to be used from Helper classes*

* `param string` $filename
* `return void`

Saves HTML source of a page to a file


#### _saveScreenshot

*hidden API method, expected to be used from Helper classes*

* `api` 
* `param string` $filename

Saves screenshot of current page to a file

{% highlight php %}

$this->getModule('WebDriver')->_saveScreenshot(codecept_output_dir().'screenshot_1.png');

{% endhighlight %}


#### acceptPopup

* `return void`

Accepts the active JavaScript native popup window, as created by `window.alert`|`window.confirm`|`window.prompt`.

Don't confuse popups with modal windows,
as created by [various libraries](https://jster.net/category/windows-modals-popups).


#### amOnPage

* `param ` $page
* `return void`

Opens the page for the given relative URI.

{% highlight php %}

<?php
// opens front page
$I->amOnPage('/');
// opens /register page
$I->amOnPage('/register');

{% endhighlight %}


#### amOnSubdomain

* `param string` $subdomain
* `return void`

Changes the subdomain for the 'url' configuration parameter.

Does not open a page; use `amOnPage` for that.

{% highlight php %}

<?php
// If config is: 'https://mysite.com'
// or config is: 'https://www.mysite.com'
// or config is: 'https://company.mysite.com'

$I->amOnSubdomain('user');
$I->amOnPage('/');
// moves to https://user.mysite.com/

{% endhighlight %}


#### amOnUrl

* `param ` $url
* `return void`

Open web page at the given absolute URL and sets its hostname as the base host.

{% highlight php %}

<?php
$I->amOnUrl('https://codeception.com');
$I->amOnPage('/quickstart'); // moves to https://codeception.com/quickstart

{% endhighlight %}


#### appendField

* `param string|array|WebDriverBy` $field
* `param string` $value
* `throws ElementNotFound`
* `return void`

Append the given text to the given element.

Can also add a selection to a select box.

{% highlight php %}

<?php
$I->appendField('#mySelectbox', 'SelectValue');
$I->appendField('#myTextField', 'appended');

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


#### cancelPopup

* `return void`

Dismisses the active JavaScript popup, as created by `window.alert`, `window.confirm`, or `window.prompt`.


#### checkOption

* `param ` $option
* `return void`

Ticks a checkbox. For radio buttons, use the `selectOption` method instead.

{% highlight php %}

<?php
$I->checkOption('#agree');

{% endhighlight %}


#### clearField

* `param string|array|WebDriverBy` $field
* `return void`

Clears given field which isn't empty.

{% highlight php %}

<?php
$I->clearField('#username');

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


#### clickWithLeftButton

* `param null|string|array|WebDriverBy` $cssOrXPath css or xpath of the web element (body by default).
* `param ?int` $offsetX
* `param ?int` $offsetY
* `throws ElementNotFound`
* `return void`

Performs click with the left mouse button on an element.

If the first parameter `null` then the offset is relative to the actual mouse position.
If the second and third parameters are given,
then the mouse is moved to an offset of the element's top-left corner.
Otherwise, the mouse is moved to the center of the element.

{% highlight php %}

<?php
$I->clickWithLeftButton(['css' => '.checkout']);
$I->clickWithLeftButton(null, 20, 50);
$I->clickWithLeftButton(['css' => '.checkout'], 20, 50);

{% endhighlight %}


#### clickWithRightButton

* `param null|string|array|WebDriverBy` $cssOrXPath css or xpath of the web element (body by default).
* `param ?int` $offsetX
* `param ?int` $offsetY
* `throws ElementNotFound`
* `return void`

Performs contextual click with the right mouse button on an element.

If the first parameter `null` then the offset is relative to the actual mouse position.
If the second and third parameters are given,
then the mouse is moved to an offset of the element's top-left corner.
Otherwise, the mouse is moved to the center of the element.

{% highlight php %}

<?php
$I->clickWithRightButton(['css' => '.checkout']);
$I->clickWithRightButton(null, 20, 50);
$I->clickWithRightButton(['css' => '.checkout'], 20, 50);

{% endhighlight %}


#### closeTab

* `return void`

Closes current browser tab and switches to previous active tab.

{% highlight php %}

<?php
$I->closeTab();

{% endhighlight %}


#### debugWebDriverLogs

* `param ?\Codeception\TestInterface` $test
* `return void`

Print out latest Selenium Logs in debug mode


#### deleteSessionSnapshot

* `param ` $name
* `return mixed`

Deletes session snapshot.

See [saveSessionSnapshot](#saveSessionSnapshot)


#### dontSee

* `param ` $text
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
* `param array` $params
* `param bool` $showDebug
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


#### dontSeeElementInDOM

* `param string|array|WebDriverBy` $selector
* `param array` $attributes
* `return void`

Opposite of `seeElementInDOM`.


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


#### dontSeeInPageSource

* `param string` $text
* `return void`

Checks that the page source doesn't contain the given string.


#### dontSeeInPopup

* `param string` $text
* `throws ModuleException`
* `return void`

Checks that the active JavaScript popup,
as created by `window.alert`|`window.confirm`|`window.prompt`, does NOT contain the given string.


#### dontSeeInSource

* `param ` $raw
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


#### doubleClick

* `param string|array|WebDriverBy` $cssOrXPath
* `throws ElementNotFound`
* `return void`

Performs a double click on an element matched by CSS or XPath.


#### dragAndDrop

* `param string|array|WebDriverBy` $source (CSS ID or XPath)
* `param string|array|WebDriverBy` $target (CSS ID or XPath)
* `return void`

Performs a simple mouse drag-and-drop operation.

{% highlight php %}

<?php
$I->dragAndDrop('#drag', '#drop');

{% endhighlight %}


#### executeAsyncJS

* `param string` $script
* `param array` $arguments
* `return mixed`

Executes asynchronous JavaScript.

A callback should be executed by JavaScript to exit from a script.
Callback is passed as a last element in `arguments` array.
Additional arguments can be passed as array in second parameter.

{% highlight yaml %}
js
// wait for 1200 milliseconds my running `setTimeout`
* $I->executeAsyncJS('setTimeout(arguments[0], 1200)');

$seconds = 1200; // or seconds are passed as argument
$I->executeAsyncJS('setTimeout(arguments[1], arguments[0])', [$seconds]);

{% endhighlight %}


#### executeInSelenium

* `param Closure` $function
* `return mixed`

Low-level API method.

If Codeception commands are not enough, this allows you to use Selenium WebDriver methods directly:

{% highlight php %}

$I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
  $webdriver->get('https://google.com');
});

{% endhighlight %}

This runs in the context of the
[RemoteWebDriver class](https://github.com/php-webdriver/php-webdriver/blob/master/lib/remote/RemoteWebDriver.php).
Try not to use this command on a regular basis.
If Codeception lacks a feature you need, please implement it and submit a patch.


#### executeJS

* `param string` $script
* `param array` $arguments
* `return mixed`

Executes JavaScript commands.

{% highlight php %}

<?php
$myVar = $I->executeJS('return document.getElementById("myField").value');

// Additional arguments can be passed as array. E.g. this will alert `Hello World`:
$I->executeJS("window.alert(arguments[0])", ['Hello world']);

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


#### grabAttributeFrom

* `param ` $cssOrXpath
* `param ` $attribute
* `return ?string`

Returns the value of the given attribute value from the given HTML element. For some attributes, the string `true` is returned instead of their literal value (e.g. `disabled="disabled"` or `required="required"`).

Fails if the element is not found. Returns `null` if the attribute is not present on the element.

{% highlight php %}

<?php
$I->grabAttributeFrom('#tooltip', 'title');

{% endhighlight %}


#### grabCookie

* `param ` $cookie
* `param array` $params
* `return mixed`

Grabs a cookie value.

You can set additional cookie params like `domain`, `path` in array passed as last argument.
If the cookie is set by an ajax request (XMLHttpRequest), there might be some delay caused by the browser, so try `$I->wait(0.1)`.


#### grabFromCurrentUrl

* `param ` $uri
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
* `param ` $attribute
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
* `return ?string`

Finds the value for the given form field.

If a fuzzy locator is used, the field is found by field name, CSS, and XPath.

{% highlight php %}

<?php
$name = $I->grabValueFrom('Name');
$name = $I->grabValueFrom('input[name=username]');
$name = $I->grabValueFrom('descendant-or-self::form/descendant::input[@name = 'username']');
$name = $I->grabValueFrom(['name' => 'username']);

{% endhighlight %}


#### loadSessionSnapshot

* `param ` $name
* `param bool` $showDebug
* `return mixed`

Loads cookies from a saved snapshot.

Allows to reuse same session across tests without additional login.

See [saveSessionSnapshot](#saveSessionSnapshot)


#### makeElementScreenshot

* `param WebDriverBy|array` $selector
* `param ?string` $name
* `return void`

Takes a screenshot of an element of the current window and saves it to `tests/_output/debug`.

{% highlight php %}

<?php
$I->amOnPage('/user/edit');
$I->makeElementScreenshot('#dialog', 'edit_page');
// saved to: tests/_output/debug/edit_page.png
$I->makeElementScreenshot('#dialog');
// saved to: tests/_output/debug/2017-05-26_14-24-11_4b3403665fea6.png

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


#### makeScreenshot

* `param ?string` $name
* `return void`

Takes a screenshot of the current window and saves it to `tests/_output/debug`.

{% highlight php %}

<?php
$I->amOnPage('/user/edit');
$I->makeScreenshot('edit_page');
// saved to: tests/_output/debug/edit_page.png
$I->makeScreenshot();
// saved to: tests/_output/debug/2017-05-26_14-24-11_4b3403665fea6.png

{% endhighlight %}


#### maximizeWindow

* `return void`

Maximizes the current window.


#### moveBack

* `return void`

Moves back in history.


#### moveForward

* `return void`

Moves forward in history.


#### moveMouseOver

* `param null|string|array|WebDriverBy` $cssOrXPath css or xpath of the web element
* `param ?int` $offsetX
* `param ?int` $offsetY
* `throws ElementNotFound`
* `return void`

Move mouse over the first element matched by the given locator.

If the first parameter null then the page is used.
If the second and third parameters are given,
then the mouse is moved to an offset of the element's top-left corner.
Otherwise, the mouse is moved to the center of the element.

{% highlight php %}

<?php
$I->moveMouseOver(['css' => '.checkout']);
$I->moveMouseOver(null, 20, 50);
$I->moveMouseOver(['css' => '.checkout'], 20, 50);

{% endhighlight %}


#### openNewTab

* `return void`

Opens a new browser tab and switches to it.

{% highlight php %}

<?php
$I->openNewTab();

{% endhighlight %}
The tab is opened with JavaScript's `window.open()`, which means:
* Some ad-blockers might restrict it.
* The sessionStorage is copied to the new tab (contrary to a tab that was manually opened by the user)


#### performOn

* `param string|array|WebDriverBy` $element
* `param callable|array|\Codeception\Util\ActionSequence` $actions
* `param int` $timeout
* `return void`

Waits for element and runs a sequence of actions inside its context.

Actions can be defined with array, callback, or `Codeception\Util\ActionSequence` instance.

Actions as array are recommended for simple to combine "waitForElement" with assertions;
`waitForElement($el)` and `see('text', $el)` can be simplified to:

{% highlight php %}

<?php
$I->performOn($el, ['see' => 'text']);

{% endhighlight %}

List of actions can be pragmatically build using `Codeception\Util\ActionSequence`:

{% highlight php %}

<?php
$I->performOn('.model', ActionSequence::build()
    ->see('Warning')
    ->see('Are you sure you want to delete this?')
    ->click('Yes')
);

{% endhighlight %}

Actions executed from array or ActionSequence will print debug output for actions, and adds an action name to
exception on failure.

Whenever you need to define more actions a callback can be used. A WebDriver module is passed for argument:

{% highlight php %}

<?php
$I->performOn('.rememberMe', function (WebDriver $I) {
     $I->see('Remember me next time');
     $I->seeElement('#LoginForm_rememberMe');
     $I->dontSee('Login');
});

{% endhighlight %}

In 3rd argument you can set number a seconds to wait for element to appear


#### pressKey

* `param string|array|WebDriverBy` $element
* `param ` $chars
* `throws ElementNotFound`
* `return void`

Presses the given key on the given element.

To specify a character and modifier (e.g. <kbd>Ctrl</kbd>, Alt, Shift, Meta), pass an array for `$char` with
the modifier as the first element and the character as the second.
For special keys, use the constants from [`Facebook\WebDriver\WebDriverKeys`](https://github.com/php-webdriver/php-webdriver/blob/main/lib/WebDriverKeys.php).

{% highlight php %}

<?php
// <input id="page" value="old">
$I->pressKey('#page', 'a'); // => olda
$I->pressKey('#page', ['ctrl', 'a'],'new'); //=> new
$I->pressKey('#page', ['shift', '111'],'1','x'); //=> old!!!1x
$I->pressKey('descendant-or-self::*[@id='page']','u'); //=> oldu
$I->pressKey('#name', ['ctrl', 'a'], \Facebook\WebDriver\WebDriverKeys::DELETE); //=>''

{% endhighlight %}


#### reloadPage

* `return void`

Reloads the current page.


#### resetCookie

* `param ` $cookie
* `param array` $params
* `param bool` $showDebug
* `return mixed|void`

Unsets cookie with the given name.

You can set additional cookie params like `domain`, `path` in array passed as last argument.


#### resizeWindow

* `param int` $width
* `param int` $height
* `return void`

Resize the current window.

{% highlight php %}

<?php
$I->resizeWindow(800, 600);


{% endhighlight %}


#### saveSessionSnapshot

* `param ` $name
* `return mixed`

Saves current cookies into named snapshot in order to restore them in other tests
This is useful to save session state between tests.

For example, if user needs log in to site for each test this scenario can be executed once
while other tests can just restore saved cookies.

{% highlight php %}

<?php
// inside AcceptanceTester class:

public function login()
{
     // if snapshot exists - skipping login
     if ($I->loadSessionSnapshot('login')) return;

     // logging in
     $I->amOnPage('/login');
     $I->fillField('name', 'jon');
     $I->fillField('password', '123345');
     $I->click('Login');

     // saving snapshot
     $I->saveSessionSnapshot('login');
}

{% endhighlight %}


#### scrollTo

* `param string|array|WebDriverBy` $selector
* `param ?int` $offsetX
* `param ?int` $offsetY
* `return void`

Move to the middle of the given element matched by the given locator.

Extra shift, calculated from the top-left corner of the element,
can be set by passing $offsetX and $offsetY parameters.

{% highlight php %}

<?php
$I->scrollTo(['css' => '.checkout'], 20, 50);

{% endhighlight %}


#### see

* `param ` $text
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
* `param array` $params
* `param bool` $showDebug
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


#### seeElementInDOM

* `param string|array|WebDriverBy` $selector
* `param array` $attributes
* `return void`

Checks that the given element exists on the page, even it is invisible.

{% highlight php %}

<?php
$I->seeElementInDOM('//form/input[type=hidden]');

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


#### seeInPageSource

* `param string` $text
* `return void`

Checks that the page source contains the given string.

{% highlight php %}

<?php
$I->seeInPageSource('<link rel="apple-touch-icon"');

{% endhighlight %}


#### seeInPopup

* `param string` $text
* `throws ModuleException`
* `return void`

Checks that the active JavaScript popup,
as created by `window.alert`|`window.confirm`|`window.prompt`, contains the given string.


#### seeInSource

* `param ` $raw
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


#### seeNumberOfElementsInDOM

* `param string|array|WebDriverBy` $selector
* `param int|array` $expected
* `throws ModuleException`


#### seeNumberOfTabs

* `param int` $number
* `return void`

Checks current number of opened tabs

{% highlight php %}

<?php
$I->seeNumberOfTabs(2);

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


#### setCookie

* `param ` $name
* `param ` $value
* `param array` $params
* `param ` $showDebug
* `return mixed|void`

Sets a cookie with the given name and value.

You can set additional cookie params like `domain`, `path`, `expires`, `secure` in array passed as last argument.

{% highlight php %}

<?php
$I->setCookie('PHPSESSID', 'el4ukv0kqbvoirg7nkp4dncpk3');

{% endhighlight %}


#### submitForm

* `param string|array|WebDriverBy` $selector
* `param array` $params
* `param string|array|WebDriverBy|null` $button
* `return void`

Submits the given form on the page, optionally with the given form
values.  Give the form fields values as an array. Note that hidden fields
can't be accessed.

Skipped fields will be filled by their values from the page.
You don't need to click the 'Submit' button afterwards.
This command itself triggers the request to form's action.

You can optionally specify what button's value to include
in the request with the last parameter as an alternative to
explicitly setting its value in the second parameter, as
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

<form action="/sign_up">
    Login:
    <input type="text" name="user[login]"><br>
    Password:
    <input type="password" name="user[password]"><br>
    Do you agree to our terms?
    <input type="checkbox" name="user[agree]"><br>
    Select pricing plan:
    <select name="plan">
        <option value="1">Free</option>
        <option value="2" selected="selected">Paid</option>
    </select>
    <input type="submit" name="submitButton" value="Submit">
</form>

{% endhighlight %}

You could write the following to submit it:

{% highlight php %}

<?php
$I->submitForm(
    '#userForm',
    [
        'user[login]' => 'Davert',
        'user[password]' => '123456',
        'user[agree]' => true
    ],
    'submitButton'
);

{% endhighlight %}
Note that "2" will be the submitted value for the "plan" field, as it is
the selected option.

Also note that this differs from PhpBrowser, in that
{% highlight yaml %}
'user' => [ 'login' => 'Davert' ]
{% endhighlight %} is not supported at the moment.
Named array keys *must* be included in the name as above.

Pair this with seeInFormFields for quick testing magic.

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

{% endhighlight %}

Parameter values must be set to arrays for multiple input fields
of the same name, or multi-select combo boxes.  For checkboxes,
either the string value can be used, or boolean values which will
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
         false,
     ],
     'multiselect' => [
         'first option value',
         'second option value',
     ]
]);

{% endhighlight %}

Mixing string and boolean values for a checkbox's value is not supported
and may produce unexpected results.

Field names ending in "[]" must be passed without the trailing square
bracket characters, and must contain an array for its value.  This allows
submitting multiple values with the same name, consider:

{% highlight php %}

$I->submitForm('#my-form', [
    'field[]' => 'value',
    'field[]' => 'another value', // 'field[]' is already a defined key
]);

{% endhighlight %}

The solution is to pass an array value:

{% highlight php %}

// this way both values are submitted
$I->submitForm('#my-form', [
    'field' => [
        'value',
        'another value',
    ]
]);

{% endhighlight %}

The `$button` parameter can be either a string, an array or an instance
of Facebook\WebDriver\WebDriverBy. When it is a string, the
button will be found by its "name" attribute. If $button is an
array then it will be treated as a strict selector and a WebDriverBy
will be used verbatim.

For example, given the following HTML:

{% highlight html %}

<input type="submit" name="submitButton" value="Submit">

{% endhighlight %}

`$button` could be any one of the following:
  - 'submitButton'
  - ['name' => 'submitButton']
  - WebDriverBy::name('submitButton')


#### switchToFrame

* `param string|null` $locator (name, CSS or XPath)
* `return void`

Switch to another frame on the page.

Example:
{% highlight html %}

<frame name="another_frame" id="fr1" src="https://example.com">


{% endhighlight %}

{% highlight php %}

<?php
# switch to frame by name
$I->switchToFrame("another_frame");
# switch to frame by CSS or XPath
$I->switchToFrame("#fr1");
# switch to parent page
$I->switchToFrame();


{% endhighlight %}


#### switchToIFrame

* `param string|null` $locator (name, CSS or XPath)
* `return void`

Switch to another iframe on the page.

Example:
{% highlight html %}

<iframe name="another_frame" id="fr1" src="https://example.com">


{% endhighlight %}

{% highlight php %}

<?php
# switch to iframe by name
$I->switchToIFrame("another_frame");
# switch to iframe by CSS or XPath
$I->switchToIFrame("#fr1");
# switch to parent page
$I->switchToIFrame();


{% endhighlight %}


#### switchToNextTab

* `param int` $offset
* `return void`

Switches to next browser tab.

An offset can be specified.

{% highlight php %}

<?php
// switch to next tab
$I->switchToNextTab();
// switch to 2nd next tab
$I->switchToNextTab(2);

{% endhighlight %}


#### switchToPreviousTab

* `param int` $offset
* `return void`

Switches to previous browser tab.

An offset can be specified.

{% highlight php %}

<?php
// switch to previous tab
$I->switchToPreviousTab();
// switch to 2nd previous tab
$I->switchToPreviousTab(2);

{% endhighlight %}


#### switchToWindow

* `param ?string` $name
* `return void`

Switch to another window identified by name.

The window can only be identified by name. If the $name parameter is blank, the parent window will be used.

Example:
{% highlight html %}

<input type="button" value="Open window" onclick="window.open('https://example.com', 'another_window')">

{% endhighlight %}

{% highlight php %}

<?php
$I->click("Open window");
# switch to another window
$I->switchToWindow("another_window");
# switch to parent window
$I->switchToWindow();

{% endhighlight %}

If the window has no name, match it by switching to next active tab using `switchToNextTab` method.

Or use native Selenium functions to get access to all opened windows:

{% highlight php %}

<?php
$I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
     $handles=$webdriver->getWindowHandles();
     $last_window = end($handles);
     $webdriver->switchTo()->window($last_window);
});

{% endhighlight %}


#### type

* `param string` $text
* `param int` $delay [sec]
* `return void`

Type in characters on active element.

With a second parameter you can specify delay between key presses.

{% highlight php %}

<?php
// activate input element
$I->click('#input');

// type text in active element
$I->type('Hello world');

// type text with a 1sec delay between chars
$I->type('Hello World', 1);

{% endhighlight %}

This might be useful when you an input reacts to typing and you need to slow it down to emulate human behavior.
For instance, this is how Credit Card fields can be filled in.


#### typeInPopup

* `param string` $keys
* `throws ModuleException`
* `return void`

Enters text into a native JavaScript prompt popup, as created by `window.prompt`.


#### uncheckOption

* `param ` $option
* `return void`

Unticks a checkbox.

{% highlight php %}

<?php
$I->uncheckOption('#notify');

{% endhighlight %}


#### unselectOption

* `param string|array|WebDriverBy` $select
* `param string|array|WebDriverBy` $option
* `return void`

Unselect an option in the given select box.


#### wait

* `param int|float` $timeout secs
* `throws TestRuntimeException`
* `return void`

Wait for $timeout seconds.


#### waitForElement

* `param string|array|WebDriverBy` $element
* `param int` $timeout seconds
* `throws Exception`
* `return void`

Waits up to $timeout seconds for an element to appear on the page.

If the element doesn't appear, a timeout exception is thrown.

{% highlight php %}

<?php
$I->waitForElement('#agree_button', 30); // secs
$I->click('#agree_button');

{% endhighlight %}


#### waitForElementChange

* `param string|array|WebDriverBy` $element
* `param \Closure` $callback
* `param int` $timeout
* `throws ElementNotFound`
* `return void`

Waits up to `$timeout` seconds for the given element to change.

Element "change" is determined by a callback function which is called repeatedly
until the return value evaluates to true.

{% highlight php %}

<?php
use Facebook\WebDriver\WebDriverElement;

$I->waitForElementChange('#menu', function(WebDriverElement $element) {
    return $element->isDisplayed();
}, 5);

{% endhighlight %}


#### waitForElementClickable

* `param string|array|WebDriverBy` $element
* `param int` $timeout seconds
* `throws Exception`
* `return void`

Waits up to $timeout seconds for the given element to be clickable.

If element doesn't become clickable, a timeout exception is thrown.

{% highlight php %}

<?php
$I->waitForElementClickable('#agree_button', 30); // secs
$I->click('#agree_button');

{% endhighlight %}


#### waitForElementNotVisible

* `param string|array|WebDriverBy` $element
* `param int` $timeout seconds
* `throws Exception`
* `return void`

Waits up to $timeout seconds for the given element to become invisible.

If element stays visible, a timeout exception is thrown.

{% highlight php %}

<?php
$I->waitForElementNotVisible('#agree_button', 30); // secs

{% endhighlight %}


#### waitForElementVisible

* `param string|array|WebDriverBy` $element
* `param int` $timeout seconds
* `throws Exception`
* `return void`

Waits up to $timeout seconds for the given element to be visible on the page.

If element doesn't appear, a timeout exception is thrown.

{% highlight php %}

<?php
$I->waitForElementVisible('#agree_button', 30); // secs
$I->click('#agree_button');

{% endhighlight %}


#### waitForJS

* `param string` $script
* `param int` $timeout seconds
* `return void`

Executes JavaScript and waits up to $timeout seconds for it to return true.

In this example we will wait up to 60 seconds for all jQuery AJAX requests to finish.

{% highlight php %}

<?php
$I->waitForJS("return $.active == 0;", 60);

{% endhighlight %}


#### waitForText

* `param string` $text
* `param int` $timeout seconds
* `param null|string|array|WebDriverBy` $selector
* `throws Exception`
* `return void`

Waits up to $timeout seconds for the given string to appear on the page.

Can also be passed a selector to search in, be as specific as possible when using selectors.
waitForText() will only watch the first instance of the matching selector / text provided.
If the given text doesn't appear, a timeout exception is thrown.

{% highlight php %}

<?php
$I->waitForText('foo', 30); // secs
$I->waitForText('foo', 30, '.title'); // secs

{% endhighlight %}

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-webdriver/tree/master/src/Codeception/Module/WebDriver.php">Help us to improve documentation. Edit module reference</a></div>
