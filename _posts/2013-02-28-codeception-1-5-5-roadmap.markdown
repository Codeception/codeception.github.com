---
title: Codeception 1.5.5 and Roadmap Announced
layout: post
date: 2013-02-28 01:03:50
---

Yes, here is a new version of Codception with more features and bugfixes in it.
We have a flexible relase cycle, so the new version comes when we have a set of updates that you might be needed.
We want to say "thank you" for all contributors, and for everyone who helps making Codeption better. 
It's always nice to get pull requests or [follow discussions](https://github.com/Codeception/Codeception/issues/) in our issues secition.
So let us sum up the work was done during last 2 weeks and share it with you.

### Use Codeception in Different Places

All codeception commands got `-c` option to provide a custom path to tests.
The exception is `bootstrap` command. It accepts a custom directory as a second argument:

{% highlight bash %}
php codecept.phar bootstrap ~/mynewproject
php codecept.phar generate:cept acceptance Login -c ~/mynewproject
php codecept.phar generate:test unit MyFirstTest -c ~/mynewproject
php codecept.phar run -c ~/mynewproject
php codecept.phar generate:scenarios acceptance -c ~/mynewproject
{% endhighlight %}

Alternatively you may specify path to `codeception.yml` file in `-c` option: `php codecept.phar run -c ~/mynewproject/codeception.yml`

Thus, you don't need to keep your `codecept.phar` in the root of your project anymore. Use `-c` option and one local runner for all your projects.

### Skipping Tests

Skipping and marking tests of incomplete was improved. We did a new solid implementation for it (it was very basic in `1.5.4`).
Now If a test is marked to skip, no modules will be touched.
This feature required to rework some core classes (like Step and TestCase and Scenario) but hopefully we got smaller and simpler code.

{% highlight php %}
<?php
$scenario->skip('this is not ready yet, move along');

$I = new WebGuy($scenario);
$I->wanTo('do something, but I would rather not');
$I->amOnPage('/');
//.....
?>
{% endhighlight %}

### Bugfixes

* `acceptPopup` with Selenium 2 does not trigger Exception any more
* error handling was improved to skip blocked alerts, `@` yet to throw `ErrorException` for notices, warnings, errors.
* ZombieJS configuration was fixed. Now the `url` parameter is required to specify app's local url.
* REST `seeStatusCodeIs` method works correctly with Symfony2 now.

### Update

 [redownload](http://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
wget http://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}

## Roadmap

For the first time we will announce the roadmap for Codeception. Actually we need your opinion: what features you'd like to see in new releases, and what things can be postponed. The list below is not a precise plan, but just a list of features we have in mind:

* Make a PageObject pattern first-class citizen in Codeception. Add generators and guides to use PageObjects (for acceptance tests).
* Multiple sessions for tests execution ([see discission on GitHub](https://github.com/Codeception/Codeception/issues/154))
* **Silex**, **Laravel 4**, **Zend Framework 2**, **Drupal 8**, **Phalcon** integrations. The key problem here: we can't do this on our own. We need a real users of these frameworks, to create integration and test it on their projects. We have reworked [functional testing guide](http://codeception.com/docs/05-FunctionalTests) to help you with this. Also use GitHub or personal contacts if you want to make a module.
* **Scenario Unit Tests to be rethinked**. We have 2 options here: dump scenario driven unit tests (or mark them as deprecated) or rework them. Actually we need your real opinion. [Here is an example of what new Cests may look like](https://gist.github.com/DavertMik/5042537). They will dramatically improve the way you work with mocks and stubs in PHP. But will you use it? Please, let us know your opinion.

To summarize: we'd appreciate contributions, feedbacks and ideas for next releases.
