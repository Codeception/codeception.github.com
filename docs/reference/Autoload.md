---
layout: doc
title: Autoload - Codeception - Documentation
---


## Codeception\Util\Autoload



Autoloader, which is fully compatible with PSR-4,
and can be used to autoload your `Helper`, `Page`, and `Step` classes.


#### addNamespace()

 *public static* addNamespace($prefix, $baseDir, $prepend = false)


* `param string` $prefix The namespace prefix.
* `param string` $baseDir A base directory for class files in the namespace.
* `param bool` $prepend If true, prepend the base directory to the stack instead of appending it;
                     this causes it to be searched first rather than last.
* `return void`

Adds a base directory for a namespace prefix.

Example:

{% highlight php %}

<?php
// app\Codeception\UserHelper will be loaded from '/path/to/helpers/UserHelper.php'
Autoload::addNamespace('app\Codeception', '/path/to/helpers');

// LoginPage will be loaded from '/path/to/pageobjects/LoginPage.php'
Autoload::addNamespace('', '/path/to/pageobjects');

Autoload::addNamespace('app\Codeception', '/path/to/controllers');

{% endhighlight %}

[See source](https://github.com/Codeception/Codeception/blob/5.1/src/Codeception/Util/Autoload.php#L53)

#### load()

 *public static* load($class)


* `param string` $class
* `return string|false`

[See source](https://github.com/Codeception/Codeception/blob/5.1/src/Codeception/Util/Autoload.php#L80)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/5.1/src/Codeception/Util/Autoload.php">Help us to improve documentation. Edit module reference</a></div>
