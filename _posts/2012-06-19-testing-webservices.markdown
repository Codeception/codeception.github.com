---
layout: post
title: Test WebServices With Codeception
date: 2012-06-19 01:03:50
---

Codeception testing framework got significant improvements during last week. The first and the major one is that you don't even need PEAR and Composer to execute tests. Only one file `codecept.phar` required. This might save your time and mind of your testers.

So Installation is much simplier now:

1. [Download](http://codeception.com/thanks.html) archive.

2. Execute it with PHP `php codecept.phar`

Now you can start generating a test suite with  `php codecept.phar bootstrap` or execute existing tests with `php codecept.phar run`.

[Documentation](http://codeception.com/doc) section was created. New section Reference was added. There you can review Codeception commands and configuration values.

But the most cool stuff is new module for *testing web services*!

Modules for [SOAP](http://codeception.com/docs/modules/SOAP) and [REST](http://codeception.com/docs/modules/REST) were added recently. You know it's always hard to test the API manually. So why not to automate it?

This API modules keeps simple manner in describing tests. Take a look at sample REST test.

{% highlight php %}
<?php
$I = new ApiGuy($scenario);
$I->wantTo('create a new user by API');
$I->amHttpAuthenticated('davert','123456');
$I->haveHttpHeader('Content-Type','application/x-www-form-urlencoded');
$I->sendPOST('/users', array('name' => 'davert' ));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('result' => 'ok'));
{% endhighlight %}

And here goes a sample SOAP test:

{% highlight php %}
<?php
use \Codeception\Utils\Soap;

$I = new ApiGuy($scenario);
$I->wantTo('create a new user thorough API');
$I->haveSoapHeader('Auth', array('token' => '123123'));
$I->sendSoapRequest('CreateUser', Soap::request()
	->User
		->Name->val('davert')->parent()
		->Email->val('davert@codeception.com');
);
$I->seeSoapResponseIncludes(Soap::response()->result->val(1));
{% endhighlight %}

Ok, the one thing you may have noticed. We are working with JSON in first case and XML in second. But there is no JSON or XML in code! Well, we could have used it, but we didn't. Just because we can use PHP to set data in this formats. Json is built from PHP arrays and for XML is used jQuery-like styled [XMLBuilder](http://codeception.com/docs/reference/xmlbuilder) class. But you could possibly add a raw json or XMl into your tests. No problems with that!

Modules themselves are already documented and tested. Soon a complete guide on WebService API testing will be added.

The other thing worth to mention is new *finalizers* in test scenarios. If you need to execute code after test is finished and you don't want to put it in helper use the `$scenario->finilize` method. See it's usage example in new [Manual Cleanup](http://codeception.com/docs/08-Data#manual-cleanup) section of Guides.

This is Codeception 1.0.11. Download [new version](http://codeception.com/thanks.html) to run tests or update

via PEAR

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or via Composer

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}
