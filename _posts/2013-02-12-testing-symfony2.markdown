---
title: Testing Symfony2 Apps with Codeception
layout: post
date: 2013-02-12 01:03:50
---

From the beginning of it's existence Codeception was in good relations with Symfony2 framework. Codeception was built on Symfony Components and uses BrowserKit and HttpKernel components for launching functional tests. It's a shame we didn't have a complete Symfony2 integration tutorial before. But we will try to fill this gap today. 

What benefits you get by using Codeception with Symfony2?
Let's list all of them:

* user-friendly syntax for functional tests
* access to container in unit tests
* testing REST and SOAP services built on Symfony
* fastest data cleanup when using with Doctrine2

The installation is pretty simple. You can use [Composer](http://codeception.com/install) (as you are used to it), but we'd recommend to try [phar package](http://codeception.com/thanks). In this case you can avoid unnecessary dependencies. But all this versions are equal. And when you installed Codeception and executed a `bootstrap` command you should configure your functional test suite.

In file `tests/functional.suite.yml`:

{% highlight yaml %}
class_name: TestGuy
modules:
    enabled: [Symfony2, Doctrine2, TestHelper]
{% endhighlight %}

And nothing more. You just need to declare that you will be using Symfony2 and Doctrine2. The Symfony2 module will search for `AppKrenel` on initialization (in `app`) and use it for functional tests. Doctrine2 module will find that Symfony2 module is declared and will try to receive default database connection from container. Of course, If you use non-standard setup this behavior can be reconfigured.

## Functional Testing

Let's create a first functional test. We use `generate:cept functional TestName` command.

{% highlight php %}
<?php
$I = new TestGuy($scenario);
$I->wantTo('log in to site');
$I->amOnPage('/');
$I->click('Login');
$I->fillField('username', 'admin');
// ....
?>
{% endhighlight %}

And so on. Unlike standard Symfony2 tests you don't need to deal with filters, CSS, and XPaths. Well, you can use CSS or XPath in any selector, if you need to. But on start you can keep your test simple and compact. 

The commands we use here are common for most modules that perform testing of web application. That means, that once you discover a need for Selenium, this test can be executed inside a web browser using Selenium2 module. But some commands are unique to Symfony2 module. For example, you can use `seeEmailIsSent` command that checks if application has submitted an email during the last request. Check [Symfony2](http://codeception.com/docs/modules/Symfony2) module reference for all commands we provide.

## Unit Testing

Codeception's unit tests are a bit improved PHPUnit's tests. Inside a unit tests you have access to initialized modules and guy classes.

{% highlight php %}
<?php
class PaginateTest extends \Codeception\TestCase\Test
{
    private $serviceContainer;
    protected $codeGuy;

    protected function _before()
    {
    	// accessing container
        $this->serviceContainer = $this->getModule('Symfony2')->container;
        $this->serviceContainer->enterScope('request');
    }

    public function testDefaults()
    {
    	// using container
        $this->serviceContainer->set('request', new Request(), 'request');
        $paginate = new Paginate($this->getModule('Symfony2')->container);
        $this->assertEquals(1, $paginate->getCurrentPage());
        $this->assertEquals(0, $paginate->getCount());
        $this->assertEquals(20, $paginate->getLimit());

        // checking data in repository
        $this->codeGuy->seeInRepository('SettingsBundle:Settings', ['pager_limit' => 20]);
    }
}    
?>    
{% endhighlight %}

If you want to bypass Codeception hooks for PHPUnit you can create a plain PHPUnit test with `generate:phpunit` command and get a traiditional PHPUnit's test. 
Then you can put this test into bundle. 

## Conclusion

Ok, you will probably ask: why is it better then Behat. We have a [wide answer for that](http://codeception.com/12-20-2012/not-bdd.html). A short is: Codeception is for testing, Behat is for Behavior Driven Development. If you need a professional testing tool that supports [PageObject](http://codeception.com/10-30-2012/pro-tips-1.html) pattern, complex [Locators](http://codeception.com/09-24-2012/locator.html), refactoring capabilities and [CodeCoverage](http://codeception.com/docs/11-Codecoverage) - Codeception is a good choice for that. 

We say thanks to @everzet for wonderful Mink (that is used for acceptance tests) and to Sebastian Bergmann for it's PHPUnit. Codeception uses their powers, but makes them a bit simpler in use.