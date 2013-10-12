---
layout: post
title: "Codeception 1.7: WebDriver"
date: 2013-10-11 22:03:50
---

This is new Codeception with awaited **WebDriver** module in it. WebDriver module is new incarnation of Selenium implementation. As it was mentioned in [previous post](http://codeception.com/08-29-2013/codeception-sequences-new-webdriver.html) this WebDriver module is based on [facebook/php-webdriver](https://github.com/facebook/php-webdriver) bindings. The most valuable thing in new Selenium bindings that they can be used just the same way Selenium is used in Java. It's very important project for PHP community, and we say "thank you" to all the Facebook behind it. One day PHP will be used in acceptance testing as widely as Java or Ruby is used. 

## WebDriver

WebDriver module is pretty new, yet you may want to switch to it from Selenium2. It uses just the same interface, so migration should come smoothly. If you have issues, then no hurry, stay with Selenium2 for a while. Let's list a few features that WebDriver module has:

### Implicit waits

{% highlight php %}
<?php
$I->waitForText('foo', 30); // secs
$I->waitForElement('#agree_button', 30);
$I->waitForElementChange('#menu', function(\WebDriverElement $el) {
    return $el->isDisplayed();
}, 100);
$I->waitForJS("return $.active == 0;", 60);
?>
{% endhighlight %}

### Better Keyboard Manipoluation

{% highlight php %}
<?php
// <input id="page" value="old" />
$I->pressKey('#page','a'); // => olda
$I->pressKey('#page',array('ctrl','a'),'new'); //=> new
$I->pressKey('#page',array('shift','111'),'1','x'); //=> old!!!1x
$I->pressKey('descendant-or-self::*[@id='page']','u'); //=> old!!!1xu
$I->pressKey('#name', array('ctrl', 'a'), WebDriverKeys::DELETE); //=>''
?>
{% endhighlight %}

### submitForm

A submit form method was implemented in WebDriver.

{% highlight php %}
<?php
$I->submitForm('#login', array('login' => 'davert', 'password' => '123456'));
?>
{% endhighlight %}


### Common Selenium API

Thus If you got any Selenium questions any answers on StackOverflow will help you.
PHP implementation is so close to Java that you can use any answer in PHP.

You can invoke WebDriver methods directly with `executeInSelenium`

{% highlight php %}
<?php
$I->executeInSelenium(function(\WebDriver $webdriver) {
  $webdriver->get('http://google.com');
});
?>
{% endhighlight %}

## Symfony Output

You will notice a better output formatting in your console.
That's because we migrated to Symfony Console output. 
As you may know, Symfony console has 3 levels of verbosity, that can set via `-v` option.
Codeception now support them. If you want to get all available information about test, run with `-vvv` option.
The `--debug` option is now equivalent for running `-vv`. That's right, you can get even more information with `vvv`. The output will be improved during the development of 1.7 branch. We hope to get completely different output depending on level of verbosity set.

## Cest Annotations

Cests are now much smarter then they were before. 
If you were using StepObject you might wondered how can you pass step object class into it. 
That was not really obvious, as by default you get Guy class defined in config.
But now you can use `guy` annotation to specify which guy class to use.

{% highlight php %}
<?php
/**
 * @guy WebGuy\AdminSteps
 */
class AdminCest {

	function banUser(WebGuy\AdminSteps $I)
	{
		// ...
	}

}
?>
{% endhighlight %}

Alternatively you can use `guy` annotation for the method itself.

Also you can now use `before` and `after` annotations to define whic methods of Cest class should be executed before the current one. Thus you can move similar actions into protected methods and invoke them via annotations.

{% highlight php %}
<?php
class ModeratorCest {

	protected function login(WebGuy $I)
	{
		$I->amOnPage('/login');
		// ...
	}

	/**
	 * @before login
	 */
	function banUser(WebGuy $I)
	{
		$I->see('Logout');
		// ...
	}

}
?>
{% endhighlight %}

Just by using annotations you can control the invokations of methods of the Cest class. Sure, you should define your support methods with `protected`, so they won't be executed as tests themselves. Another thing worth to mention, that callbacks defined in `after` annotation will be called even the main test has failed, thus it makes them useful for clean ups.

We still maintain and bugfix 1.6 branch and there will be 1.6 bugfix releases. The old release `1.6.9` (yep, 1.6.9 was released to with minor bugfixes) can be downloaded from [http://codeception.com/releases/1.6.9/codecept.phar](http://codeception.com/releases/1.6.9/codecept.phar).

## Removed Dependencies

Optional dependencies were removed from the core, so if you use Composer version and one of the following packages:

{% highlight json %}
    "behat/mink-selenium-driver": "1.1.*",
    "facebook/php-sdk": "3.*",
    "behat/mink-zombie-driver": "1.1.*",
    "videlalvaro/php-amqplib": "*"
{% endhighlight %}

you should include them manually in your `composer.json`. 
If you use phar version - nothing is changed for you.

### Update

[redownload](http://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
wget http://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}