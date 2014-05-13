---
layout: post
title: "Codeception 2.0 RC2: Guzzle 4"
date: 2014-05-13 01:03:50
---

Unfortunately this is not a final release of Codeception 2.0 you may have expected. Still we had to get another release candidate in order to implement one breaking and important change: upgrade to Guzzle version 4.

As you know PHPBroswer of Codeception used Mink, Goutte, and Guzzle to emulate visiting pages, filling forms, and other user-like web interaction. Recently Guzzle got a new major release, so we had to upgrade Codeception as well. We also removed Mink and Goutte and Codeception uses Guzzle directly. This will allow us faster to hunt down and fix the issues which may appear in future.

Guzzle changed their package name and namespace in latest release. If you were using Guzzle 3 and you want to upgrade to Codeception 2 you won't get any conflicts in dependencies. But if you were using `Guzzle\Http\Client` class in your tests or helpers you will to change it to `GuzzleHttp\Client`.

## PHPBrowser additional configuration

Guzzle4 got very flexible configuration. You may omit `CURL_` constants and use [request parameters](http://docs.guzzlephp.org/en/latest/clients.html#request-options) to set headers, auth, cookies, and SSL verification. Codeception now accepts all request parameters of Guzzle in module configuration part:

{% highlight yaml %} 
modules:
   enabled: [PhpBrowser]
   config:
      PhpBrowser:
         url: 'http://localhost'
         auth: ['admin', '123345]
         headers:
            'User-Agent': 'Codeception'
            Accept: 'application/json'
         curl:
             CURLOPT_RETURNTRANSFER: true
{% endhighlight %}

And yes, `curl` configuration section is left for more advanced options and for backwards compatibility. BTW, SSL settings should be also defined via new configuration using `verify`, `cert`, `ssl_key` request options. 

## Try it

As usual we need your feedback. Guzzle upgrade is very dramatic change and we recommend to try it on your test suites. If you have issues report them and we will try to fix them before the final release, which is schenduled for next week. 

Download:

{% highlight bash %}
wget http://codeception.com/releases/2.0.0-RC2/codecept.phar
{% endhighlight %}

Via Composer:

{% highlight bash %}
composer require --dev "codeception/codeception:2.0.0-RC2" 
{% endhighlight %}