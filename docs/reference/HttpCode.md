---
layout: doc
title: HttpCode - Codeception - Documentation
---


## Codeception\Util\HttpCode



Class containing constants of HTTP Status Codes
and method to print HTTP code with its description.

Usage:

{% highlight php %}

<?php
use \Codeception\Util\HttpCode;

// using REST, PhpBrowser, or any Framework module
$I->seeResponseCodeIs(HttpCode::OK);
$I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);

{% endhighlight %}


#### getDescription()

 *public static* getDescription($code)


* `param int` $code
* `return string|int`

Returns string with HTTP code and its description

{% highlight php %}

<?php
HttpCode::getDescription(200); // '200 (OK)'
HttpCode::getDescription(401); // '401 (Unauthorized)'

{% endhighlight %}

[See source](https://github.com/Codeception/lib-innerbrowser/blob/master/src/Codeception/Util/HttpCode.php#L350)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/lib-innerbrowser/blob/master/src/Codeception/Util/HttpCode.php">Help us to improve documentation. Edit module reference</a></div>
