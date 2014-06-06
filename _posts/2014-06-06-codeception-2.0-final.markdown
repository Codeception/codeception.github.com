---
layout: post
title: "Codeception 2.0 Final"
date: 2014-06-06 01:03:50
---

Codeception 2.0 is out. It was a long journey to get here but it was worth it.
Main purpose of making Codeception 2.0 was not to break things up. Instead we focused on making Codeception simpler in use and reduce that awkward WTF moments you were experiencing rebuilding Guy classes and discovering dark magic of `Maybe` object.

That's it. Codeception does not have 2-phases of execution and runs your tests as native PHP scenarios. It also does not require you to rebuild actor classes on configuration change - it is done automatically. And at last we don't have Guys anymore. They were renamed in more neutral `Tester` objects. But it is up to you how will you call your actors: Testers, Guys, or even ninjas, those names can be configured!

### Naming Conventions

We decided to change some naming conventions in Codeception. 

* `_log` directory was renamed to `_output`. It was logical decision, as Codeception does not print any logs by default, but constantly uses `_log` directory for printing debug information and reports. 
* `_helpers` was renamed to `_support`. Now it is more obvious that this directory may contain not only helpers but any kind of support code required for tests.

As it was said, Guys were renamed to Testers. Actor classes and helpers are named by suite. For instance, acceptance test will start with this line:

{% highlight php %}
<?php
$I = new AcceptanceTester($scenario);
// and uses AcceptanceHelper
?>
{% endhighlight %}

In unit tests we simplified access to actor classes by just using `$this->tester` property (actor title). Looks a bit more readable. 

{% highlight php %}
<?php
function testSavingUser()
{
    $user = new User();
    $user->setName('Miles Davis');
    $user->save();
    $this->tester->seeInDatabase('users',array('name' => 'Miles', 'surname' => 'Davis'));
}
?>
{% endhighlight %}

If you are upgrading from 1.x you can still use `codeGuy` as it was left for compatibility.

**Listed naming changes are recommended defaults. You don't need to follow them if you plan to upgrade from 1.x**. 

### Changes

Let's briefly name some important changes added in Codeception 2.0 

* PHP >= 5.4
* Upgraded to PHPUnit 4.x
* Upgraded to Guzzle 4.x
* Removed Mink (and Selenium, Selenium2, ZombieJS modules)
* Removed Goutte
* Logger moved to extension and disabled by default
* Naming conventions changed
* One-time execution for all tests
* Autorebuild of actor classes
* MultiSession testing with Friends
* Strict Locators introduced
* Fail fast option `-f` added to `run` command
* Coverage options changed behavior in `run` command
* Parallel Execution (!!!)

### Guides

Guides were reviewed and updated for 2.0 release. Unit Testing guide was completely rewritten, and new chapter Parallel Execution was added. Please note that parallel running tests is advanced feature and will require some time for you for set everything up correctly. But If your tests run longer then 30 minutes, you will get a real benefit of it.

### The Most Important Bug Fixed

The Most Important Bug was reported by many of our users:

<blockquote class="twitter-tweet" lang="uk"><p><a href="https://twitter.com/codeception">@codeception</a> Nice website footer: © 2011 - &lt;?php date(&#39;Y&#39;) ?&gt;&#10;You should create a test for that ;-)</p>&mdash; Bret R. Zaun (@bretrzaun) <a href="https://twitter.com/bretrzaun/statuses/401300578246352896">November 15, 2013</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<blockquote class="twitter-tweet" lang="uk"><p>Hey, <a href="https://twitter.com/codeception">@codeception</a> you have unparsed PHP in your footer.</p>&mdash; Phil Kershaw (@PhilKershaw) <a href="https://twitter.com/PhilKershaw/statuses/454226393401135104">April 10, 2014</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>


<blockquote class="twitter-tweet" lang="uk"><p>Oh <a href="https://twitter.com/codeception">@codeception</a> !!!!!! Should _really_ fix this. lol. &lt;3&lt;3&lt;3 <a href="http://t.co/Wi3szPMKMN">pic.twitter.com/Wi3szPMKMN</a></p>&mdash; Darren Nolan (@DarrenNolan_) <a href="https://twitter.com/DarrenNolan_/statuses/469972297613185026">May 23, 2014</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

We decided to fix it for 2.0 release. Now the date in footer is displayed **correctly** according to PHP rules (using `<?=`). 


### Upgrading

Codeception 2.0 was publishing pre-releases since February. Lots of developers already gave it a try and reported their issues. We hope the upgrade will go smoothly for you. Basically what you need is to:

* run `build` command 
* remove any internal usage of Mink or Goutte
* remove any usage of `$scenario->prepare()` as it always return false now
* *optionally* remove `$scenario->running()` calls and `$I->execute` calls. They are not required anymore. 
* take a look into PhpBrowser module which is uses Guzzle4 directly. You may have issues with using it (as it was completely rewritten). Please report those issues to GitHub.
* Selenium2 module should be replaced with WebDriver (as you already didn't do so).

If you have issues during upgrade send issues to GitHub and we will make upgrade more smoother. 


{% highlight bash %}
wget http://codeception.com/codecept.phar
{% endhighlight %}

Via Composer:

{% highlight bash %}
composer require --dev "codeception/codeception:2.0.0" 
{% endhighlight %}

P.S. Codeception 1.8.6 was released as well. List of its changes will go tomorrow. 

