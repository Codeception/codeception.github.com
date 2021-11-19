---
layout: post
title: "Codeception 1.6.2: Subdomains Support"
date: 2013-05-25 22:03:50
---

Looks like a good time for a new release. We decided to stick to features that was asked a lot and to merge all uesful PRs that were submitted.

One of them is **Subdomain support**. If you were wondering how to deal with subdomains of your app, we have a new `amOnSubdomain` command for you. It will prepend a subdomain name to your current url you put in config.

{% highlight php %}
<?php
// configured url is http://user.site.com
$I->amOnSubdomain('user');
$I->amOnPage('/');
// moves to http://user.site.com/
?>
{% endhighlight %}

But... well, this would be much easier to implement by anyone if only you had an option to dynamically pass configuration to modules. And yes, it's also possible now. You can use new `_reconfigure` method of a module. In helper you can access it and replace the keys with required values. 

{% highlight php %}
<?php
$this->getModule('Selenium2')->_reconfigure(array('browser' => 'chrome'));
?>
{% endhighlight %}

In the end of a test, all changed options will be rolled back to configuration values.

Some new nice improvements and fixes from our contributors:

* Cookie methods like `getCookie`, `setCookie` can now be used in acceptance tests (thanks **igorsantos07**)
* Curl options are now correctly passed to PhpBrowser (thanks to **mrtimp**)
* Also `X-Requested-With` is cleared in Ajax requests of PhpBrowser (thanks to **vinu**)
* Non-strict matching for links (with `normalize-space` XPath) was proposed by **brutuscat**.
* Symfony1 module fixed (by **walkietalkie**)
* Lots of small fixes and tests by **Ragazzo**.
* fix to `haveInDatabase` method by davert.

### Update

[redownload](https://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
wget https://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}
