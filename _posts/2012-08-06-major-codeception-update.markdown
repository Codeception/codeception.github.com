---
layout: post
title: Major Codeception Update
date: 2012-08-07 01:03:50
---

Hi, last week Codeception got it's first major update. Welcome the __Codeception 1.1__. Many core classes were refactored to solve the common issues and reduce the level of dark magic inside. Only white magic left. And that's really cool 'cause you don't need to study to source code to implement your custom hooks now. Codeception is rapidly evolving to be the professional testing tool, ready to use by testers and developers through out the PHP world.

## Test Execution Remastered

Did you ever were wondered why you can't receive values in test and pass it to next steps? To do something like this:

{% highlight php %}
<?php
$user_name = $I->grabTextFrom('#user_name');
$I->fillField('username', $user_name);
?>
{% endhighlight %}

Actually, there is no any good reason for not doing so. The only reason was - the code was not designed to execute test file in runtime. The steps were recorded, analyzed, and only then they were executed, without touching the test file again. That is the source of dark magic that was removed in Codeception 1.1. This magic was awful because you didn't control the test execution. So, usage of custom PHP code in test was leading to unpredictable results. Even simple tasks was encouraged to be done in helpers, not in test code itself, to be run properly. 

So what changed in Codeception 1.1? There is no magic in test execution, test file is required and executed, that's all. Still the analyzes step is not skipped, so test is run two times: first to record scenario, validate and analyze all steps, second to execute them. With that simple idea you can use ANY php code in your tests if only you define the stage when it should be executed. The additional bootstrap files should be loaded one time before the analyses:

{% highlight php %}
<?php
if ($scenario->preload()) {
	require '_user_fixtures.php';
}
$I = new WebGuy($scenario);
$I->loginAs($user);
// ...
?>
{% endhighlight %}

And when you need something to be executed in runtime, like cleaning the fixture data, please use the following:

{% highlight php %}
<?php
// ..
$I->loginAs($user);
$I->see('Hello, '.$user->name);
if ($scenario->running()) {
	$user->delete();
}
?>
{% endhighlight %}

In this example user is removed in the very end of scenario. `$scenario->running` method allows you to execute any code in the runtime. 
But please, always specify the stage when the custom code should be executed, or it will be executed 2 times.

In Codeception 1.0.x the `build` command was optional, when updating configuration. But now __it's required to run every time__ the modules are added or removed in suite config file. That's the only new issue, but Guy-classes look much better now.

## Grabbers

As the result of changed described above, you can finally return values to scenario and use them in next steps. The new grabbers commands were introduced:

{% highlight php %}
<?php
$text = $I->grabTextFrom($element);
$value = $I->grabValueFrom($form_field);
$attr = $I->grabAttributeFrom($element, 'attribute');

$name = $I->grabFromDatabase('users', 'name', array('id' => 1));
// ....
?>
{% endhighlight %}

You can write your own grabbers. Just return values from your helper methods and you can use them in test.
Please review the modules to see new commands there!

## XPath Introduction

Codeception is a tool for testing, and many testers like specifying locators by XPath. CSS selectors have their limitations, so why not to use XPath in tests too?
Sure, why not! You can freely use XPath selectors in your tests from now. But no new methods added for this! Really. The old methods were updated to support CSS and XPath as well. So whenever you need to pass a selector you can either pass CSS or XPath and Codeception is smart enough to guess what did you pass and how to use it.

{% highlight php %}
<?php
$I->click('New User');
$I->click('#user_1 .user_new');
$I->click("descendant::*[@id = 'user_1']/descendant::a");
?>
{% endhighlight %}

All the methods where CSS was used were updated to support XPath. Try it!

## Unit Tests

There was no common idea how to deal with unit tests in Codeception. As you know, Codeception can run standard PHPUnit tests as well as the hybrid scenario-driven unit tests. Scenario driven tests for many cases looked to complex to use. But they allowed to use Codeception modules in them. Why not to provide standard PHPUnit tests to use Codeception features? For Codeception 1.1 the [new chapter of Guides](https://codeception.com/docs/06-UnitTests-TEST) describing unit tests is written. In brief: you can use the `CodeGuy` class inside your tests! Include any modules and use it as you need it. Use them to perform database cleanups, use them to check values in database, use them to work with file system. They are just wonderful helpers in your work. 

And yep, new unit tests can be generated by command: `generate:test`.

## Bugfixes and Minor changes

* nested array logging was done by [tiger-seo](https://github.com/tiger-seo)
* ability to specify different configs for test execution, also done by ([tiger-seo](https://github.com/tiger-seo))
* ZF1 module fixes by [insside](https://github.com/insside)

## Upgrade notes.

* right after updating Codeception please run the `build` command. 
* remove all chained method executions in your tests. The $I object can return values, not self. 

Codeception 1.1 can be [downloaded from site](https://codeception.com/thanks.html),

via PEAR

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or via Composer

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}

P.S. Documentation was updated for 1.1 version.