---
layout: doc
title: JsonType - Codeception - Documentation
---


## Codeception\Util\JsonType



JsonType matches JSON structures against templates.
You can specify the type of fields in JSON or add additional validation rules.

JsonType is used by REST module in `seeResponseMatchesJsonType` and `dontSeeResponseMatchesJsonType` methods.

Usage example:

{% highlight php %}

<?php
$jsonType = new JsonType(['name' => 'davert', 'id' => 1, 'data' => []]);
$jsonType->matches([
  'name' => 'string:!empty',
  'id' => 'integer:>0|string:>0',
  'data' => 'array:empty',
]); // => true

$jsonType->matches([
  'id' => 'string',
]); // => `id: 1` is not of type string

{% endhighlight %}

Class JsonType
@package Codeception\Util


#### __construct()

 *public* __construct($jsonArray)


* `param ` $jsonArray array|JsonArray

Creates instance of JsonType
Pass an array or `\Codeception\Util\JsonArray` with data.

If non-associative array is passed - the very first element of it will be used for matching.

[See source](https://github.com/Codeception/module-rest/blob/master/src/Codeception/Util/JsonType.php#L48)

#### addCustomFilter()

 *public static* addCustomFilter($name, callable $callable)


* `param string` $name
* `param callable` $callable
* `return void`

Adds custom filter to JsonType list.

You should specify a name and parameters of a filter.

Example:

{% highlight php %}

<?php
JsonType::addCustomFilter('slug', function($value) {
    return strpos(' ', $value) !== false;
});
// => use it as 'string:slug'

// add custom function to matcher with `len($val)` syntax
// parameter matching patterns should be valid regex and start with `/` char
JsonType::addCustomFilter('/len\((.*?)\)/', function($value, $len) {
  return strlen($value) == $len;
});
// use it as 'string:len(5)'

{% endhighlight %}

[See source](https://github.com/Codeception/module-rest/blob/master/src/Codeception/Util/JsonType.php#L78)

#### cleanCustomFilters()

 *public static* cleanCustomFilters()


* `return void`

Removes all custom filters

[See source](https://github.com/Codeception/module-rest/blob/master/src/Codeception/Util/JsonType.php#L86)

#### matches()

 *public* matches(array $jsonType)


* `param array` $jsonType
* `return string|bool`

Checks data against passed JsonType.

If matching fails function returns a string with a message describing failure.
On success returns `true`.

[See source](https://github.com/Codeception/module-rest/blob/master/src/Codeception/Util/JsonType.php#L96)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/module-rest/blob/master/src/Codeception/Util/JsonType.php">Help us to improve documentation. Edit module reference</a></div>
