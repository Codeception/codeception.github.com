---
layout: post
title: "Codeception 2.0 RC: Strict Locators"
date: 2014-05-01 01:03:50
---

Codeception 2.0 is almost ready for final release. Thanks for everyone who already running alpha/beta version of Codeception and provides us with valuable feedback. If everything goes well the final release will be published in a week. The delay between releases is dictated by the need to allow parallel tests execution. As it was said before: Codeception won't provide parallel test running out of the box, yet we will add a new chapter into guides where you will learn how to implement parallelism model that matches needs of your project.

## Improvements

### Strict Locators

In order to provide better element locations you can now specify locators explicitly like this: `['css' => 'input.name']`. This will work for PHPBrowser, Frameworks modules, and WebDriver.

{% highlight php %}
<?php
$I->fillField(['css' => 'input.name'], 'jon');
$I->click(['link' => 'Submit']);
$I->seeElement(['xpath' => './/div[@data-name="jon"]']);
?>
{% endhighlight %} 

Allowed locator mechanisms are:

* id    
* name    
* css    
* xpath    
* link    
* class    

You can use strict locators in your Page Object classes as well.

### See Element with Attributes

To improve checking element with expected attributes `seeElement` now takes second parameter:

{% highlight php %}
$I->amOnPage('/form/field');
$I->seeElement('input[name=login]');
$I->seeElement('input', ['name' => 'login']); // same as above
{% endhighlight %}

`dontSeeElement` works in corresponding manner.

### grabAttributeFrom method added

To fetch value of attribute of element:

{% highlight php %}
$I->amOnPage('/search');
$attr = $I->grabAttributeFrom('form', 'method');
$attr == 'GET'
{% endhighlight %}

---

Also `makeScreenshot` method of WebDriver was simplified. Filename of saved screenshot does not include a test name.

## Try it

Download:

{% highlight bash %}
wget http://codeception.com/releases/2.0.0-RC/codecept.phar
{% endhighlight %}

Via Composer:

{% highlight bash %}
composer require --dev "codeception/codeception:2.0.0-RC" 
{% endhighlight %}