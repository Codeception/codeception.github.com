---
layout: doc
title: XmlBuilder - Codeception - Documentation
---


## Codeception\Util\XmlBuilder


* *Implements* `Stringable`

That's a pretty simple yet powerful class to build XML structures in jQuery-like style.
With no XML line actually written!
Uses DOM extension to manipulate XML data.

{% highlight php %}

<?php
$xml = new \Codeception\Util\XmlBuilder();
$xml->users
   ->user
       ->val(1)
       ->email
           ->val('davert@mail.ua')
           ->attr('valid','true')
           ->parent()
       ->cart
           ->attr('empty','false')
           ->items
               ->item
                   ->val('useful item');
               ->parents('user')
       ->active
           ->val(1);
echo $xml;

{% endhighlight %}

This will produce this XML

{% highlight xml %}

<?xml version="1.0"?>
<users>
   <user>
       1
       <email valid="true">davert@mail.ua</email>
       <cart empty="false">
           <items>
               <item>useful item</item>
           </items>
       </cart>
       <active>1</active>
   </user>
</users>

{% endhighlight %}

### Usage

Builder uses chained calls. So each call to builder returns a builder object.
Except for `getDom` and `__toString` methods.

 * `$xml->node` - create new xml node and go inside of it.
 * `$xml->node->val('value')` - sets the inner value of node
 * `$xml->attr('name','value')` - set the attribute of node
 * `$xml->parent()` - go back to parent node.
 * `$xml->parents('user')` - go back through all parents to `user` node.

Export:

 * `$xml->getDom` - get a DOMDocument object
 * `$xml->__toString` - get a string representation of XML.

[Source code](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Util/XmlBuilder.php)


#### __construct()

 *public* __construct()



[See source](https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php#L80)

#### __get()

 *public* __get($tag)


* `param string` $tag
* `return \Codeception\Util\XmlBuilder`

Appends child node

[See source](https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php#L89)

#### __toString()

 *public* __toString()


* `return string`

[See source](https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php#L152)

#### attr()

 *public* attr($attr, $val)


* `param string` $attr
* `param string` $val
* `return \Codeception\Util\XmlBuilder`

Sets attribute for current node

[See source](https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php#L106)

#### getDom()

 *public* getDom()


* `return \DOMDocument`

[See source](https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php#L162)

#### parent()

 *public* parent()


* `return \Codeception\Util\XmlBuilder`

Traverses to parent

[See source](https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php#L118)

#### parents()

 *public* parents($tagName)


* `param string` $tagName
* `throws Exception`
* `return \Codeception\Util\XmlBuilder`

Traverses to parent with $tagName

[See source](https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php#L132)

#### val()

 *public* val($val)


* `param string` $val
* `return \Codeception\Util\XmlBuilder`

[See source](https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php#L97)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/lib-xml/blob/master/src/Codeception/Util/XmlBuilder.php">Help us to improve documentation. Edit module reference</a></div>
