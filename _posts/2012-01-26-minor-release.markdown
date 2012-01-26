---
layout: post
title: [BUGFIX RELEASE] Update to 1.0.1
date: 2012-01-26 01:03:50
---

This relese fixes two reported bugs.

* using __see__ commands on pages with <!DOCTYPE
* using __see__ commands with non-latin characters. PhpBrowser, Selenium, Frameworks modules were updated.

Please update your version via PEAR:

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or download updated Phar package. It's important to update Codeception now.  

In next releases an automatic updater will be added. 