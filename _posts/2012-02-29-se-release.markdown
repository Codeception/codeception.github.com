---
layout: post
title: Codeception 1.0.5 Released.
date: 2012-02-21 01:03:50
---

Almost every week Codeception gets a new release. I think it's quite good tempo. Every release contains not only bugfixes but a new features too.
I'm satisfied but today's release, because all changes were made by new Codeception contributors. Thank you, guys!

## Features

A new module for [Social Engine](http://codeception.com/docs/modules/SocialEngine) was created by [Artem Kovradin](http://tvorzasp.com/). He took the code of Zend Framework module and adopted it for Social Engine, which is build with powered by Zend Framework. With now on, you can simply test you social networks built on top of Social Engine.

## Bugfixes

* Windows command line problem solved, thanks to [Morf](https://github.com/Morf)
* There were problem in functional tests for forms with no submits ('<input type="submit"'). This bug was pointed by [svsool](https://github.com/svsool).

Also there were some encoding issues, but they are solved easily if you make sure your code and site has a UTF-8 encoding.

Thanks again to all contributors and reporters.

Please update your version via PEAR:

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or download updated Phar package.

