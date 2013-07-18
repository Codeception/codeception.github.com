---
layout: post
title: "Codeception 1.6.4: PageObjects and Friends"
date: 2013-07-18 22:03:50
---

Another release that despite the minor version change brings major improvements. Meet `1.6.4`, which adds lots of new ways to customize your test automation platform and improve your tests. And yes, before reading this post take a cup of coffee. We prepared lots of features for you and this long post.

## PageObjects

Long awaited feature of adding PageObjects into the core.
Codeception looks pretty different from other testing frameworks in Java or Ruby.
So it was hard to understand in which way the PageObject should be implemented.

Actually you can choose is pageobject will be just a storage of your UI locators (UI Map).

{% highlight php %}
<?php
class ArticlesPage {

	const URL = '/articles';

	static $articleList = '#list';
	static $newArticleButton = '#toolbar a.new';

	static function row($id)
	{
		return $articleList ." .article-#id".
	}
}
?>
{% endhighlight %}

In a test you can use a pageobject this way:

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('find article #1 in a list and edit it');
$I->amOnPage(ArticlesPage::URL);
$I->seeElement(ArticlesPage::$articleList);
$I->click('Edit', ArticlesPage::row(1));
$I->see('Editing Article #1');
?>
{% endhighlight %}

As you see, such page objects are easy to use. But they do not store any page logic inside.
Can we improve that? Sure! A PageObject class can also contain methods for page interaction.
In a test they may look like:

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('find article #1 in a list and edit it');
ArticlesPage::of($I)
	->visit()
	->openArticleForEditing(1);
$I->see('Editing Article #1');
?>
{% endhighlight %}

We have moved some logic into the PageObject class, and so we can reuse its methods in other tests.
[Read more on generating PageObjects on newly updated Guides page](http://codeception.com/docs/07-AdvancedUsage#PageObjects).

## StepObject

Alternatively, interaction logic can be kept in StepObject classes. In which we recommend to define actions that may require passing through several pages. Also it may be useful if you want to define actions based on user roles.

{% highlight php %}
<?php
$I = new WebGuy\AdminSteps($scenario);
$I->am('admin');
$I->wantTo('create a new admin check his account');
$I->logIntoAdminArea();
$I->createUser('davert','123456', 'admin');
$I->logout();
$I->login();
$I->see('Admin Actions', '#toolbar');
?>
{% endhighlight %}

`AdminSteps` class inherits from `WebGuy` class, thus you have common actions from modules, as well as newly defined customized actions like `createUser`, `login`, `logout` in your tests.

[StepObjects are now in Guides too.](http://codeception.com/docs/07-AdvancedUsage#StepObjects)

## Groups && Extensions

Now it is possible to include 3rd party code into Codeception. Current options are pretty limited, you can extend Codeception only by listening to its internal events. Why do you need that? Not sure. But check out our [Notifier](https://github.com/Codeception/Notifier) extension that we prepared to demonstrate the power of extensions. Also you can develop your own [alternative output formatter](https://github.com/Codeception/Codeception/blob/master/tests/data/claypit/tests/_data/MyOutputFormatter.php).

Group Classes are special extensions, that listen to events from a tests of a specific group. Thus, they are very if some tests require common environment setup. Group classes are also good for loading fixtures.

Here is the sample group class:

{% highlight php %}
<?php
class AdminGroup extends \Codeception\Platform\Group {

    static $group = 'admin';

    public function _before(\Codeception\Event\Test $e)
    {
        $this->writeln("Preparing for [admin] test...");
    }

    public function _after(\Codeception\Event\Test $e)
    {
        $this->writeln("Finishing [admin] test...");
    }
}
?>
{% endhighlight %}

[Read more about Groups and Extensions](http://codeception.com/docs/08-Customization#Extension-classes).

## Conditional Asserts

Pretty simple, yet useful feature when you want your test not to be stopped on failure.

{% highlight php %}
<?php
$I->canSee('Hello World');
$I->see('Hello World');
?>
{% endhighlight %}

This two assertions do just the same, but if `canSee` fails to match 'Hello World' text on a page, it doesn't stop the test. Still failed assertion will be displayed in final report.

[Guides section about that](http://codeception.com/docs/04-AcceptanceTests#Conditional-Assertions).

### Assertion Failure Messages Improved

For most Framework and Mink modules we improved the error messages that happen on failures. No more mystic messages like `failed asserting that 0 greater then 0`. Better exceptions with better error reports. 

### Comments Simplified

{% highlight php %}
<?php
$I['comments can be easily added to a test'];
$I['and displayed in output when executed'];
$I['and added to HTML reports'];
$I['pretty cool when you follow BDD or ATDD'];
$I['describe everything in comments and then automate them'];
?>
{% endhighlight %}

### Minor Fixes and Improvements

* codecoverage for multiple runner is now stored into right dir, thanks **piccagliani**.
* header actions were added to **REST** module by **brutuscat**.
* added environment management to **Symfony2** module by **SimonEast**.

### Update

**It is very important to execute "build" after the update**.
Also this update has lots of changes, if you have an issues with them, please report them to Github.
We are planning to stabilize core and introduce more humane development flow in next releases. That changes shangewill be announced soon.

[redownload](http://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
wget http://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}