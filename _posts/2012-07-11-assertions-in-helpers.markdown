---
layout: post
title: 1.0.14 - Custom Assertions In Helpers
date: 2012-07-12 01:03:50
---

Hi, that's been a while from the last release. But still Codeception is evolving. And today's release notes I'm going to start with some thoughts on Codeception installation strategy.

For a long time a PEAR was the primary method for install. It had some issues and develoeprs got stuck with it. Nowdays alternative is a [Composer[(https://packagist.org)] which Codeception uses too. But nevertheless we consider it a bit complex too. Codeception is tool where everything is kept simple. We are trying to make it work even for junior developers and testers. So our primary goal is to provide a standalone version 'codecept.phar' which was introduced recently. In future version we will try to make it autoupdate itself (as Composer does).

It's really cool cause it simplifies integration with CI systems and has less requirements to your PHP environment. Right now Codeception phar archive includes Symfony Components, Mink, PHPUnit in one file. So if you ever wanted to run PHPUnit tests without PEAR, the Codeception can be used that way too.

The major feature is related to current installation strategy. We finally added custom assertions to modules and user helper classes. Before that you should have used PHPUnit's static methods for assertions. But now you can just write `this->assertXXX` in a helper class.

In next example we connect PhpBrowser module to helper and use assertion to check a menu exists for current user.

{% highlight php %}
<?php
class WebHelper extends \Codeception\Module {

	function seeEditingToolsMenu()
	{
		$content = $this->getModule('PhpBrowser')->session->getPage()->getContent();
		$this->assertContains('<a id="menu" href="#">Edit Post</a>',$content);
	}

}
?>
{% endhighlight %}

The [Helpers](https://codeception.com/docs/03-Modules#helpers) section in Guides was totally rewritten to represent this change and provide more examples.

In this release a new module [WebDebug](https://codeception.com/docs/modules/WebDebug) was intorduced. It provides means to make screenshots with a single command. In case a screenshot can't be saved, it tries at least save the HTML response to file. After the test you can review all saved files to see what actually happened during test.

Thanks to Andrey Popov for contributions.

### Bugfixes

* `click` method for frameworks now accepts CSS selectors.


This is Codeception 1.0.14. Download [new version](https://codeception.com/thanks.html) to run tests or update

via PEAR

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or via Composer

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}
