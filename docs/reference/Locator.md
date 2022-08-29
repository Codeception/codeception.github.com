---
layout: doc
title: Locator - Codeception - Documentation
---


## Codeception\Util\Locator



Set of useful functions for using CSS and XPath locators.
Please check them before writing complex functional or acceptance tests.



#### combine()

 *public static* combine($selector1, $selector2) 

Applies OR operator to any number of CSS or XPath selectors.
You can mix up CSS and XPath selectors here.

{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->see('Title', Locator::combine('h1','h2','h3'));

{% endhighlight %}

This will search for `Title` text in either `h1`, `h2`, or `h3` tag.
You can also combine CSS selector with XPath locator:

{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->fillField(Locator::combine('form input[type=text]','//form/textarea[2]'), 'qwerty');

{% endhighlight %}

As a result the Locator will produce a mixed XPath value that will be used in fillField action.
 * `static`  * `throws` Exception

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L61)

#### contains()

 *public static* contains($element, $text) 

Locates an element containing a text inside.
Either CSS or XPath locator can be passed, however they will be converted to XPath.

{% highlight php %}

<?php
use Codeception\Util\Locator;

Locator::contains('label', 'Name'); // label containing name
Locator::contains('div[@contenteditable=true]', 'hello world');

{% endhighlight %}

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L256)

#### elementAt()

 *public static* elementAt($element, $position) 

Locates element at position.
Either CSS or XPath locator can be passed as locator,
position is an integer. If a negative value is provided, counting starts from the last element.
First element has index 1

{% highlight php %}

<?php
use Codeception\Util\Locator;

Locator::elementAt('//table/tr', 2); // second row
Locator::elementAt('//table/tr', -1); // last row
Locator::elementAt('table#grind>tr', -2); // previous than last row

{% endhighlight %}

 * `param string` $element CSS or XPath locator
 * `param int|string` $position xPath index

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L280)

#### find()

 *public static* find($element, array $attributes) 

Finds element by it's attribute(s)

{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->seeElement(Locator::find('img', ['title' => 'diagram']));

{% endhighlight %}
 * `static` 
[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L147)

#### firstElement()

 *public static* firstElement($element) 

Locates first element of group elements.
Either CSS or XPath locator can be passed as locator,
Equal to `Locator::elementAt($locator, 1)`

{% highlight php %}

<?php
use Codeception\Util\Locator;

Locator::firstElement('//table/tr');

{% endhighlight %}

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L306)

#### href()

 *public static* href($url) 

Matches the *a* element with given URL

{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->see('Log In', Locator::href('/login.php'));

{% endhighlight %}
 * `static` 
[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L84)

#### humanReadableString()

 *public static* humanReadableString($selector) 

Transforms strict locator, \Facebook\WebDriver\WebDriverBy into a string representation

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L331)

#### isCSS()

 *public static* isCSS($selector) 

Checks that provided string is CSS selector

{% highlight php %}

<?php
Locator::isCSS('#user .hello') => true
Locator::isCSS('body') => true
Locator::isCSS('//body/p/user') => false

{% endhighlight %}

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L170)

#### isClass()

 *public static* isClass($class) 

Checks that a string is valid CSS class

{% highlight php %}

<?php
Locator::isClass('.hello') => true
Locator::isClass('body') => false
Locator::isClass('//body/p/user') => false

{% endhighlight %}

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L239)

#### isID()

 *public static* isID($id) 

Checks that a string is valid CSS ID

{% highlight php %}

<?php
Locator::isID('#user') => true
Locator::isID('body') => false
Locator::isID('//body/p/user') => false

{% endhighlight %}

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L224)

#### isPrecise()

 *public static* isPrecise($locator) 

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L197)

#### isXPath()

 *public static* isXPath($locator) 

Checks that locator is an XPath

{% highlight php %}

<?php
Locator::isXPath('#user .hello') => false
Locator::isXPath('body') => false
Locator::isXPath('//body/p/user') => true

{% endhighlight %}

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L190)

#### lastElement()

 *public static* lastElement($element) 

Locates last element of group elements.
Either CSS or XPath locator can be passed as locator,
Equal to `Locator::elementAt($locator, -1)`

{% highlight php %}

<?php
use Codeception\Util\Locator;

Locator::lastElement('//table/tr');

{% endhighlight %}

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L323)

#### option()

 *public static* option($value) 

Matches option by text:

{% highlight php %}

<?php
use Codeception\Util\Locator;

$I->seeElement(Locator::option('Male'), '#select-gender');

{% endhighlight %}

[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L119)

#### tabIndex()

 *public static* tabIndex($index) 

Matches the element with given tab index

Do you often use the `TAB` key to navigate through the web page? How do your site respond to this navigation?
You could try to match elements by their tab position using `tabIndex` method of `Locator` class.
{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->fillField(Locator::tabIndex(1), 'davert');
$I->fillField(Locator::tabIndex(2) , 'qwerty');
$I->click('Login');

{% endhighlight %}
 * `static` 
[See source](https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php#L104)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/lib-web/blob/master/src/Codeception/Util/Locator.php">Help us to improve documentation. Edit module reference</a></div>
