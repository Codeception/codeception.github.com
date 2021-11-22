---
layout: post
title: "Working with PHPUnit and Selenium Webdriver "
date: 2013-11-12 22:03:50
---

In this post we will explore some basics of user acceptance testing with **Selenium**. We will do this with classical unit testing framework PHPUnit, web browser Firefox, and with new [php-webdriver](https://github.com/facebook/php-webdriver) library recently developed by Facebook. 

Selenium allows us to record user actions that we do inside a browser and then automate them. PHPUnit will be used to do various assertions and check them for fallacy. And `php-webdriver` is used to connect PHP with Selenium, in order to do browser manipulation in PHP.  

Probably you know, that PHPUnit itself can do Selenium manipulations via PHPUnit. There is [PHPUnit_Selenium](https://phpunit.de/manual/3.7/en/selenium.html) extension you may use. We will use php-webdriver instead because this implementation is modern and its API is more clean and looks much the same way as original Java Selenium API. That's why it is easier to learn, and much powerful, then the PHPUnit's one. For example, it allows you use send native touch events, which is important in era of mobile-ready web applications.

### Grab the tools

Let's install all the required tools using [Composer](https://packagist.org). For this we will need to have `composer.json` file created:

{% highlight json %}
{
    "require-dev": {
        "phpunit/phpunit": "*",
        "facebook/webdriver": "dev-master"
    }
}
{% endhighlight %}

We won't develop any application, thus we are ok, with `require-dev` section only. Let's run

{% highlight bash %}
php composer.phar install
{% endhighlight %}

and grab the latest versions of both libraries. We also will need [Selenium server](https://code.google.com/p/selenium/downloads/detail?name=selenium-server-standalone-2.37.0.jar&can=2&q=selenium-server-standalone-2) executable as well. You need Java installed in order to run the Selenium server. You can launch it by running this:

{% highlight bash %}
java -jar selenium-server-standalone-2.37.0.jar
{% endhighlight %}

And when the tools are prepared, let's write some tests.

### PHPUnit Test

So let's try to test something in the web. Let's start with something simple and well known, like Github. So, let's create a file and call it `GitHubTest`. 

{% highlight php %}
<?php
class GitHubTests extends PHPUnit_Framework_TestCase {
}
?>
{% endhighlight %}

As any PHPUnit test it should extend `PHPUnit_Framework_TestCase` (as it was mentioned, we are not using PHPUnit_Extensions_Selenium2TestCase here). For every test we will need to launch a browser, or in other words, we are starting a Selenium session. This is done by creating `RemoteWebDriver` instance:

{% highlight php %}
<?php
class GitHubTests extends PHPUnit_Framework_TestCase {

    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

	public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

}
?>
{% endhighlight %}

This initialization part is taken from php-webdriver README file. We don't have any test yet, so let's write something a very basic. Something like: "If I open https://github.com, page title should contain GitHub".

{% highlight php %}
<?php
class GitHubTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

	public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    protected $url = 'https://github.com';

    public function testGitHubHome()
    {
        $this->webDriver->get($this->url);
        // checking that page title contains word 'GitHub'
        $this->assertContains('GitHub', $this->webDriver->getTitle());
    }    

}
?>
{% endhighlight %}

Now we execute our first test with phpunit

{% highlight bash %}
vendor/bin/phpunit GitHubTest.php
{% endhighlight %}

and in a few seconds we should see a Firefox window with Github Page in it

![Opening web page with PHPUnit and Selenium](/images/webdriver/WebDriverStart.png)

*please notice the WebDriver text in the status bar, this tells you that this browser window is controlled by WebDriver*.

In a console we will see this output:

{% highlight bash %}
PHPUnit 3.7.28 by Sebastian Bergmann.


.

Time: 19.44 seconds, Memory: 1.75Mb

OK (1 test, 1 assertion)
{% endhighlight %}


We will see that test has finished, but the browser window stays opened. That is because we did not implement a `tearDown` method, that should be used to close the webdriver session:

{% highlight php %}
<?php
class GitHubTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

	public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    public function tearDown()
    {
        $this->webDriver->quit();
    }
}
?>
{% endhighlight %}

## Advanced Test

We didn't touch any of page elements in a previous test. We just opened the page and checked its title. But the power of webdriver reveals when you want to click elements, fill forms, drag and drop elements, etc. That's why we will write a test that demonstrates some of this features. 

But how can control the browser? Should we move the mouse in order to click on element? Well, not exactly. WebDriver allows us to locate element on page by its ID, class name, element name, CSS, or XPath. Let's list all possible locator types, taken from `WebDriverBy` class:

* `WebDriverBy::className()` - searches for element by its CSS class.
* `WebDriverBy::cssSelector()` - searches for element by its CSS selector (like jQuery).
* `WebDriverBy::id()` - searches for element by its id.
* `WebDriverBy::linkText()` - searches for a link whose visible text equals to the value provided.
* `WebDriverBy::partialLinkText()` - same as above, but link partly contain the value.
* `WebDriverBy::tagName()` - search for element by its tag name.
* `WebDriverBy::xpath()` - search for element by xpath. The most complex, yet, most powerful way for element location.


To find element we should use `webDriver->findElement` method, with locator specified with `WebDriverBy`. 


After the matched element is found we can click on it. Like this:

{% highlight php %}
<?php
class GitHubTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

	public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    public function tearDown()
    {
        $this->webDriver->close();
    }

    public function testSearch()
    {
        $this->webDriver->get($this->url);
        // find search field by its id
        $search = $this->webDriver->findElement(WebDriverBy::id('js-command-bar-field'));
        $search->click();
	}    
}
?>
{% endhighlight %}

![Locating Web Element in Firefox](/images/webdriver/WebDriverSearch.png)

We are clicking the GitHub global search field, located in top menu bar, matched by its id. By the way, how did we get the element's id? That's a good question. Searching for element locators is the most important task in acceptance testing. For every test we need to get the elements that are involved in it. Let's show some simple tricks that will definitely help you in writing complex acceptance tests.

## Locating Elements: Tips & Tricks

The first thing we can do is to pause the test execution. While browser window is still open, we can use it to find the locator. To pause the test execution lets write this helper method inside a test class:

{% highlight php %}
<?php
    protected function waitForUserInput()
    {
        if(trim(fgets(fopen("php://stdin","r"))) != chr(13)) return;
    }
?>
{% endhighlight %}

If we use it somewhere in our tests, PHPUnit will wait for `Enter` key pressed in console before going on.

{% highlight php %}
<?php
    public function testSearch()
    {
        $this->webDriver->get($this->url);
		$this->waitForUserInput(); // paused       
    }    
?>
{% endhighlight %}

Now when the browser window is opened we are free to search for required element with no hurry. We are using Firfox Developer Tools for that. With the Element Inspector within we can point to element and get its unique CSS locator. 

![Using WebDriver with PHPUnit to test GitHub](/images/webdriver/WebDriverSelector.png)

That is how we got search field id: `#js-command-bar-field`. Doing the sample steps, let's continue writing our test and find `php-webdriver` repository on GitHub.

{% highlight php %}
<?php
class GitHubTest extends PHPUnit_Framework_TestCase {

    protected $url = 'https://github.com';
    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

	public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    public function tearDown()
    {
        $this->webDriver->close();
    }

    public function testSearch()
    {
        $this->webDriver->get($this->url);
        
        // find search field by its id
        $search = $this->webDriver->findElement(WebDriverBy::id('js-command-bar-field'));
        $search->click();
        
        // typing into field
        $this->webDriver->getKeyboard()->sendKeys('php-webdriver');
        
        // pressing "Enter"
        $this->webDriver->getKeyboard()->pressKey(WebDriverKeys::ENTER);
        
        $firstResult = $this->webDriver->findElement(
            // some CSS selectors can be very long:
            WebDriverBy::cssSelector('li.public:nth-child(1) > h3:nth-child(3) > a:nth-child(1) > em:nth-child(2)')
        );
        
        $firstResult->click();
        
        // we expect that facebook/php-webdriver was the first result
        $this->assertContains("php-webdriver",$this->webDriver->getTitle());
        
        // checking current url
        $this->assertEquals(
        	'https://github.org/facebook/php-webdriver', 
        	$this->webDriver->getCurrentURL()
        );
    }


    protected function waitForUserInput()
    {
        if(trim(fgets(fopen("php://stdin","r"))) != chr(13)) return;
    }

}
?>
{% endhighlight %}

If we run this test we will see that it is failing on the last step:

![PHPUnit Test is Failing on Assertion](/images/webdriver/WebDriverFail.png)

That's because we forgot that GitHub uses `https` by default, and GitHub is a company and not a non-profit  organization (as we used to think of it, he-he). Though let's change the expected url to 'https://github.com/facebook/php-webdriver' and see the test is passing.

## Element Not Found 

Probably we will also want to check if element is located on a page. If we were using `Selenium2TestCase` of PHPUnit, we would have several nice assertion that we can use just for that. In case of php-webdriver library we will need to implement them on our own. But that's pretty easy. Php-Webdriver throws various [exceptions](https://github.com/facebook/php-webdriver/blob/master/lib/WebDriverExceptions.php), which we can handle and transform into PHPUnit's assertions:


{% highlight php %}
<?php
    protected function assertElementNotFound($by)
    {
        $els = $this->webDriver->findElements($by);
        if (count($els)) {
            $this->fail("Unexpectedly element was found");
        }
        // increment assertion counter
        $this->assertTrue(true);        
    }

?>
{% endhighlight %}

You can create similar assertion just in the same manner. 

We will use newly created `assertElementNotFound` method to check that there is no user avatar on "facebook/php-webdriver" page.

{% highlight php %}
<?php
class GitHubTest extends PHPUnit_Framework_TestCase {

    protected $url = 'https://github.com';
    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

	public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    public function tearDown()
    {
        $this->webDriver->close();
    }

    public function testGitHubHome()
    {
        $this->webDriver->get($this->url);
        // checking that page title contains word 'GitHub'
        $this->assertContains('GitHub', $this->webDriver->getTitle());
    }

    public function testSearch()
    {
        $this->webDriver->get($this->url);

        // find search field by its id
        $search = $this->webDriver->findElement(WebDriverBy::id('js-command-bar-field'));
        $search->click();

        // typing into field
        $this->webDriver->getKeyboard()->sendKeys('php-webdriver');

        // pressing "Enter"
        $this->webDriver->getKeyboard()->pressKey(WebDriverKeys::ENTER);

        $firstResult = $this->webDriver->findElement(
            // some CSS selectors can be very long:
            WebDriverBy::cssSelector('li.public:nth-child(1) > h3:nth-child(3) > a:nth-child(1) > em:nth-child(2)')
        );

        $firstResult->click();

        // we expect that facebook/php-webdriver was the first result
        $this->assertContains("php-webdriver",$this->webDriver->getTitle());

        $this->assertEquals('https://github.com/facebook/php-webdriver', $this->webDriver->getCurrentURL());

        $this->assertElementNotFound(WebDriverBy::className('avatar'));

    }

    protected function waitForUserInput()
    {
        if(trim(fgets(fopen("php://stdin","r"))) != chr(13)) return;
    }

    protected function assertElementNotFound($by)
    {
        $els = $this->webDriver->findElements($by);
        if (count($els)) {
            $this->fail("Unexpectedly element was found");
        }
        // increment assertion counter
        $this->assertTrue(true);
        
    }
}
?>
{% endhighlight %}

## Refactoring

To clean up some things we will separate test methods and support methods. It is a good idea to **move custom assertions into trait**: `WebDriverAssertions`. And the pause switcher `waitForUserInput` can be moved into `WebDriverDevelop` trait. We can enable this trait in a test class, when we develop a test, and turn it off once we finished.

The complete demo project, after this basic refactoring, you can [find on GitHub](https://github.com/DavertMik/php-webdriver-demo).

## And what about Codeception?

So you did notice that this is Codeception blog. But we didn't use [Codeception framework](https://codeception.com) at all in this tutorial. Sure, we need to mention, that Codeception includes php-webdriver library and [WebDriver](https://codeception.com/docs/modules/WebDriver) module out of the box starting from version 1.7. In Codeception you can perform all the web manipulations in a [much simpler manner using the WebGuy APIs](https://codeception.com/docs/03-AcceptanceTests). If you use Codeception you don't need to implement your own WebDriver assertions nor write boilerplate code.

## Conclusions

No matter you are using Codeception or not it is a good idea to understand how to perform browser based acceptance testing using just the php-webdriver by itself. Php-webdriver library provides very clean and flexible APIs you will enjoy working with. 

PHP is a language popular for web development, but not for web testing. Test automation engineers prefer Java and Ruby over it. And there is a serious reason for that. There is no such thing like "official Selenium bindings" for PHP, i.e. there is no Selenium client library for PHP created by Selenium team. Developers of [php-webdriver](https://github.com/facebook/php-webdriver) get very close to the official Selenium client APIs. That's why you should use php-webdriver - it really feels and works like native and official Selenium libraries. That is especially important if you have an experience writing acceptance tests in Java or Ruby. Moving to PHP is not that hard, when all the APIs are the same.
