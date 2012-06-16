---
layout: page
title: Codeception Xml Builder
---

# Xml Builder

That's a pretty simple yet powerful class to build XML structures in jQuery-like style. With no XML line actually written!
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

Easy, right?

### Usage

Builder uses chained calls. So each call to builder returns a builder object. Except for `getDom` and `__toString` methods.

* `$xml->node` - create new xml node and go inside of it. 
* `$xml->node->val('value')` - sets the inner value of node
* `$xml->attr('name','value')` - set the attribute of node
* `$xml->parent()` - go back to parent node.
* `$xml->parents('user')` - go back through all parents to `user` node.

Export:

* `$xml->getDom` - get a DOMDocument object
* `$xml->__toString` - get a string representation of XML.

[Source code](https://github.com/Codeception/Codeception/blob/master/src/Codeception/Util/XmlBuilder.php)