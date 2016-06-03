---
layout: doc
title: Locator - Codeception - Documentation
---


## Codeception\Util\Locator



Set of useful functions for using CSS and XPath locators.
Please check them before writing complex functional or acceptance tests.



#### * static* combine($selector1, $selector2) 

Applies OR operator to any number of CSS or XPath selectors.
You can mix up CSS and XPath selectors here.

{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->see('Title', Locator::combine('h1','h2','h3'));
?>

{% endhighlight %}

This will search for `Title` text in either `h1`, `h2`, or `h3` tag.
You can also combine CSS selector with XPath locator:

{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->fillField(Locator::combine('form input[type=text]','//form/textarea[2]'), 'qwerty');
?>

{% endhighlight %}

As a result the Locator will produce a mixed XPath value that will be used in fillField action.

 * `static` 
 * `param` $selector1
 * `param` $selector2
 * `throws`  \Exception
 * `return`  string

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L46)

#### * static* contains($element, $text) 

Locates an element containing a text inside.
Either CSS or XPath locator can be passed, however they will be converted to XPath.

{% highlight php %}

Locator::contains('label', 'Name'); // label containing name
Locator::contains('div[ * `contenteditable=true]',`  'hello world');

{% endhighlight %}

 * `param` $element
 * `param` $text
 * `return`  string

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L199)

#### * static* elementAt($element, $position) 

Locates element at position.
Either CSS or XPath locator can be passed as locator,
position is an integer. If a negative value is provided, counting starts from the last element.
First element has index 1

{% highlight php %}

Locator::elementAt('//table/tr', 2); // second row
Locator::elementAt('//table/tr', -1); // last row
Locator::elementAt('table#grind>tr', -2); // previous than last row

{% endhighlight %}

 * `param` $element CSS or XPath locator
 * `param` $position xpath index
 * `return`  mixed

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L221)

#### * static* find($element, array $attributes) 

Finds element by it's attribute(s)

 * `static` 

 * `param` $element
 * `param` $attributes

 * `return`  string

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L137)

#### * static* firstElement($element) 

Locates first element of group elements.
Either CSS or XPath locator can be passed as locator,
Equal to `Locator::elementAt($locator, 1)`

{% highlight php %}

Locator::firstElement('//table/tr');

{% endhighlight %}

 * `param` $element
 * `return`  mixed

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L247)

#### * static* href($url) 

Matches the *a* element with given URL

{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->see('Log In', Locator::href('/login.php'));
?>

{% endhighlight %}

 * `static` 
 * `param` $url
 * `return`  string

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L73)

#### * static* humanReadableString($selector) 

Transforms strict locator, \Facebook\WebDriver\WebDriverBy into a string represenation

 * `param` $selector
 * `return`  string

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L275)

#### * static* isCSS($selector) 

 * `param` $selector
 * `return`  bool

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L154)

#### * static* isID($id) 

Checks that string and CSS selector for element by ID


[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L181)

#### * static* isXPath($locator) 

Checks that locator is an XPath

 * `param` $locator
 * `return`  bool

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L170)

#### * static* lastElement($element) 

Locates last element of group elements.
Either CSS or XPath locator can be passed as locator,
Equal to `Locator::elementAt($locator, -1)`

{% highlight php %}

Locator::lastElement('//table/tr');

{% endhighlight %}

 * `param` $element
 * `return`  mixed

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L264)

#### * static* option($value) 

Matches option by text

 * `param` $value

 * `return`  string

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L109)

#### * static* tabIndex($index) 

Matches the element with given tab index

Do you often use the `TAB` key to navigate through the web page? How do your site respond to this navigation?
You could try to match elements by their tab position using `tabIndex` method of `Locator` class.
{% highlight php %}

<?php
use \Codeception\Util\Locator;

$I->fillField(Locator::tabIndex(1), 'davert');
$I->fillField(Locator::tabIndex(2) , 'qwerty');
$I->click('Login');
?>

{% endhighlight %}

 * `static` 
 * `param` $index
 * `return`  string

[See source](https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php#L97)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/2.2/src/Codeception/Util/Locator.php">Help us to improve documentation. Edit module reference</a></div>
