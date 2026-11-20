---
layout: doc
title: Module - Codeception - Documentation
---


## Codeception\Module


* *Uses* `Codeception\Util\Shared\Asserts`

Basic class for Modules and Helpers.
You must extend from it while implementing own helpers.

Public methods of this class start with `_` prefix in order to ignore them in actor classes.
Module contains **HOOKS** which allow to handle test execution routine.




#### $includeInheritedActions

*public static* **$includeInheritedActions**

By setting it to false module wan't inherit methods of parent class.


#### $onlyActions

*public static* **$onlyActions**

Allows to explicitly set what methods have this class.


#### $excludeActions

*public static* **$excludeActions**

Allows to explicitly exclude actions from module.


#### $aliases

*public static* **$aliases**

Allows to rename actions
#### __construct()

 *public* __construct($moduleContainer, array $config = null)


* `param \Codeception\Lib\ModuleContainer` $moduleContainer
* `param ?array` $config

Module constructor.

Requires module container (to provide access between modules of suite) and config.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L59)

#### _after()

 *public* _after($test)


* `param \Codeception\TestInterface` $test

**HOOK** executed after test

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L221)

#### _afterStep()

 *public* _afterStep($step)


* `param \Codeception\Step` $step

**HOOK** executed after step

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L207)

#### _afterSuite()

 *public* _afterSuite()


**HOOK** executed after suite

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L193)

#### _before()

 *public* _before($test)


* `param \Codeception\TestInterface` $test

**HOOK** executed before test

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L214)

#### _beforeStep()

 *public* _beforeStep($step)


* `param \Codeception\Step` $step

**HOOK** executed before step

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L200)

#### _beforeSuite()

 *public* _beforeSuite(array $settings = [])


* `param array` $settings

**HOOK** executed before suite

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L186)

#### _failed()

 *public* _failed($test, $fail)


* `param \Codeception\TestInterface` $test
* `param \Exception` $fail

**HOOK** executed when test fails but before `_after`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L228)

#### _getConfig()

 *public* _getConfig($key = null)


* `param string|null` $key
* `return mixed` the config item's value or null if it doesn't exist

Get config values or specific config item.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L299)

#### _getName()

 *public* _getName()


* `return string`

Returns a module name for a Module, a class name for Helper

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L159)

#### _hasRequiredFields()

 *public* _hasRequiredFields()


* `return bool`

Checks if a module has required fields

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L171)

#### _initialize()

 *public* _initialize()


**HOOK** triggered after module is created and configuration is loaded

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L179)

#### _reconfigure()

 *public* _reconfigure(array $config)


* `param array` $config
* `throws ModuleConfigException|ModuleException`
* `return void`

Allows to redefine config for a specific test.

Config is restored at the end of a test.

{% highlight php %}

<?php
// cleanup DB only for specific group of tests
public function _before(Test $test) {
    if (in_array('cleanup', $test->getMetadata()->getGroups()) {
        $this->getModule('Db')->_reconfigure(['cleanup' => true]);
    }
}

{% endhighlight %}

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L103)

#### _resetConfig()

 *public* _resetConfig()


* `return void`

Reverts config changed by `_reconfigure`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L121)

#### _setConfig()

 *public* _setConfig(array $config)


* `param array` $config
* `throws ModuleConfigException|ModuleException`
* `return void`

Allows to define initial module config.

Can be used in `_beforeSuite` hook of Helpers or Extensions

{% highlight php %}

<?php
public function _beforeSuite($settings = []) {
    $this->getModule('otherModule')->_setConfig($this->myOtherConfig);
}

{% endhighlight %}

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L80)

#### assert()

 *protected* assert(array $arguments, $not = false)


* `param array` $arguments
* `param bool` $not
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L19)

#### assertArrayHasKey()

 *protected* assertArrayHasKey($key, $array, $message = '')


* `param string|int` $key
* `param \ArrayAccess|array` $array
* `param string` $message
* `return void`

Asserts that an array has a specified key.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L20)

#### assertArrayNotHasKey()

 *protected* assertArrayNotHasKey($key, $array, $message = '')


* `param string|int` $key
* `param \ArrayAccess|array` $array
* `param string` $message
* `return void`

Asserts that an array does not have a specified key.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L29)

#### assertClassHasAttribute()

 *protected* assertClassHasAttribute($attributeName, $className, $message = '')


* `param string` $attributeName
* `param class-string` $className
* `param string` $message
* `return void`

Asserts that a class has a specified attribute.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L38)

#### assertClassHasStaticAttribute()

 *protected* assertClassHasStaticAttribute($attributeName, $className, $message = '')


* `param string` $attributeName
* `param class-string` $className
* `param string` $message
* `return void`

Asserts that a class has a specified static attribute.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L48)

#### assertClassNotHasAttribute()

 *protected* assertClassNotHasAttribute($attributeName, $className, $message = '')


* `param string` $attributeName
* `param class-string` $className
* `param string` $message
* `return void`

Asserts that a class does not have a specified attribute.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L59)

#### assertClassNotHasStaticAttribute()

 *protected* assertClassNotHasStaticAttribute($attributeName, $className, $message = '')


* `param string` $attributeName
* `param class-string` $className
* `param string` $message
* `return void`

Asserts that a class does not have a specified static attribute.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L69)

#### assertContains()

 *protected* assertContains($needle, $haystack, $message = '')


* `param mixed` $needle
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts that a haystack contains a needle.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L80)

#### assertContainsEquals()

 *protected* assertContainsEquals($needle, $haystack, $message = '')


* `param mixed` $needle
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L88)

#### assertContainsNotOnlyArray()

 *protected* assertContainsNotOnlyArray($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L104)

#### assertContainsNotOnlyBool()

 *protected* assertContainsNotOnlyBool($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L112)

#### assertContainsNotOnlyCallable()

 *protected* assertContainsNotOnlyCallable($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L120)

#### assertContainsNotOnlyClosedResource()

 *protected* assertContainsNotOnlyClosedResource($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L193)

#### assertContainsNotOnlyFloat()

 *protected* assertContainsNotOnlyFloat($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L128)

#### assertContainsNotOnlyInstancesOf()

 *protected* assertContainsNotOnlyInstancesOf($className, $haystack, $message = '')


* `param class-string` $className
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L137)

#### assertContainsNotOnlyInt()

 *protected* assertContainsNotOnlyInt($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L145)

#### assertContainsNotOnlyIterable()

 *protected* assertContainsNotOnlyIterable($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L153)

#### assertContainsNotOnlyNull()

 *protected* assertContainsNotOnlyNull($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L161)

#### assertContainsNotOnlyNumeric()

 *protected* assertContainsNotOnlyNumeric($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L169)

#### assertContainsNotOnlyObject()

 *protected* assertContainsNotOnlyObject($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L177)

#### assertContainsNotOnlyResource()

 *protected* assertContainsNotOnlyResource($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L185)

#### assertContainsNotOnlyScalar()

 *protected* assertContainsNotOnlyScalar($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L201)

#### assertContainsNotOnlyString()

 *protected* assertContainsNotOnlyString($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L209)

#### assertContainsOnly()

 *protected* assertContainsOnly($type, $haystack, $isNativeType = null, $message = '')


* `param string` $type
* `param iterable<mixed>` $haystack
* `param ?bool` $isNativeType
* `param string` $message
* `return void`

Asserts that a haystack contains only values of a given type.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L219)

#### assertContainsOnlyArray()

 *protected* assertContainsOnlyArray($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L277)

#### assertContainsOnlyBool()

 *protected* assertContainsOnlyBool($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L285)

#### assertContainsOnlyCallable()

 *protected* assertContainsOnlyCallable($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L293)

#### assertContainsOnlyClosedResource()

 *protected* assertContainsOnlyClosedResource($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L357)

#### assertContainsOnlyFloat()

 *protected* assertContainsOnlyFloat($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L301)

#### assertContainsOnlyInstancesOf()

 *protected* assertContainsOnlyInstancesOf($className, $haystack, $message = '')


* `param class-string` $className
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts that a haystack contains only instances of a given class name.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L269)

#### assertContainsOnlyInt()

 *protected* assertContainsOnlyInt($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L309)

#### assertContainsOnlyIterable()

 *protected* assertContainsOnlyIterable($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L317)

#### assertContainsOnlyNull()

 *protected* assertContainsOnlyNull($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L325)

#### assertContainsOnlyNumeric()

 *protected* assertContainsOnlyNumeric($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L333)

#### assertContainsOnlyObject()

 *protected* assertContainsOnlyObject($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L341)

#### assertContainsOnlyResource()

 *protected* assertContainsOnlyResource($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L349)

#### assertContainsOnlyScalar()

 *protected* assertContainsOnlyScalar($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L365)

#### assertContainsOnlyString()

 *protected* assertContainsOnlyString($haystack, $message = '')


* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L373)

#### assertCount()

 *protected* assertCount($expectedCount, $haystack, $message = '')


* `param int` $expectedCount
* `param \Countable|iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts the number of elements of an array, Countable or Traversable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L383)

#### assertDirectoryDoesNotExist()

 *protected* assertDirectoryDoesNotExist($directory, $message = '')


* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory does not exist.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L391)

#### assertDirectoryExists()

 *protected* assertDirectoryExists($directory, $message = '')


* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L399)

#### assertDirectoryIsNotReadable()

 *protected* assertDirectoryIsNotReadable($directory, $message = '')


* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists and is not readable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L407)

#### assertDirectoryIsNotWritable()

 *protected* assertDirectoryIsNotWritable($directory, $message = '')


* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists and is not writable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L415)

#### assertDirectoryIsReadable()

 *protected* assertDirectoryIsReadable($directory, $message = '')


* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists and is readable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L423)

#### assertDirectoryIsWritable()

 *protected* assertDirectoryIsWritable($directory, $message = '')


* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists and is writable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L431)

#### assertDoesNotMatchRegularExpression()

 *protected* assertDoesNotMatchRegularExpression($pattern, $string, $message = '')


* `param string` $pattern
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string does not match a given regular expression.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L439)

#### assertEmpty()

 *protected* assertEmpty($actual, $message = '')


* `phpstan-assert` empty $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is empty.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L451)

#### assertEquals()

 *protected* assertEquals($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L462)

#### assertEqualsCanonicalizing()

 *protected* assertEqualsCanonicalizing($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are equal (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L473)

#### assertEqualsIgnoringCase()

 *protected* assertEqualsIgnoringCase($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are equal (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L484)

#### assertEqualsWithDelta()

 *protected* assertEqualsWithDelta($expected, $actual, $delta, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param float` $delta
* `param string` $message
* `return void`

Asserts that two variables are equal (with delta).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L495)

#### assertFalse()

 *protected* assertFalse($condition, $message = '')


* `phpstan-assert` false $condition
* `param mixed` $condition
* `param string` $message
* `return void`

Asserts that a condition is false.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L507)

#### assertFileDoesNotExist()

 *protected* assertFileDoesNotExist($filename, $message = '')


* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file does not exist.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L515)

#### assertFileEquals()

 *protected* assertFileEquals($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is equal to the contents of another file.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L523)

#### assertFileEqualsCanonicalizing()

 *protected* assertFileEqualsCanonicalizing($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is equal to the contents of another file (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L531)

#### assertFileEqualsIgnoringCase()

 *protected* assertFileEqualsIgnoringCase($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is equal to the contents of another file (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L539)

#### assertFileExists()

 *protected* assertFileExists($filename, $message = '')


* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file exists.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L547)

#### assertFileIsNotReadable()

 *protected* assertFileIsNotReadable($file, $message = '')


* `param string` $file
* `param string` $message
* `return void`

Asserts that a file exists and is not readable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L555)

#### assertFileIsNotWritable()

 *protected* assertFileIsNotWritable($file, $message = '')


* `param string` $file
* `param string` $message
* `return void`

Asserts that a file exists and is not writable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L563)

#### assertFileIsReadable()

 *protected* assertFileIsReadable($file, $message = '')


* `param string` $file
* `param string` $message
* `return void`

Asserts that a file exists and is readable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L571)

#### assertFileIsWritable()

 *protected* assertFileIsWritable($file, $message = '')


* `param string` $file
* `param string` $message
* `return void`

Asserts that a file exists and is writable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L579)

#### assertFileNotEquals()

 *protected* assertFileNotEquals($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is not equal to the contents of another file.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L587)

#### assertFileNotEqualsCanonicalizing()

 *protected* assertFileNotEqualsCanonicalizing($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is not equal to the contents of another file (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L595)

#### assertFileNotEqualsIgnoringCase()

 *protected* assertFileNotEqualsIgnoringCase($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is not equal to the contents of another file (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L603)

#### assertFileNotExists()

 *protected* assertFileNotExists($filename, $message = '')


* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file does not exist.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L55)

#### assertFinite()

 *protected* assertFinite($actual, $message = '')


* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is finite.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L613)

#### assertGreaterOrEquals()

 *protected* assertGreaterOrEquals($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is greater than or equal to another value.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L66)

#### assertGreaterThan()

 *protected* assertGreaterThan($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is greater than another value.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L624)

#### assertGreaterThanOrEqual()

 *protected* assertGreaterThanOrEqual($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is greater than or equal to another value.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L635)

#### assertInfinite()

 *protected* assertInfinite($actual, $message = '')


* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is infinite.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L645)

#### assertInstanceOf()

 *protected* assertInstanceOf($expected, $actual, $message = '')


* `template` ExpectedType of object
* `phpstan-assert` =ExpectedType $actual
* `param class-string<ExpectedType>` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of a given type.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L660)

#### assertIsArray()

 *protected* assertIsArray($actual, $message = '')


* `phpstan-assert` array<mixed> $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type array.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L671)

#### assertIsBool()

 *protected* assertIsBool($actual, $message = '')


* `phpstan-assert` bool $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type bool.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L683)

#### assertIsCallable()

 *protected* assertIsCallable($actual, $message = '')


* `phpstan-assert` callable $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type callable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L695)

#### assertIsClosedResource()

 *protected* assertIsClosedResource($actual, $message = '')


* `phpstan-assert` resource $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type resource and is closed.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L707)

#### assertIsEmpty()

 *protected* assertIsEmpty($actual, $message = '')


* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is empty.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L74)

#### assertIsFloat()

 *protected* assertIsFloat($actual, $message = '')


* `phpstan-assert` float $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type float.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L719)

#### assertIsInt()

 *protected* assertIsInt($actual, $message = '')


* `phpstan-assert` int $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type int.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L731)

#### assertIsIterable()

 *protected* assertIsIterable($actual, $message = '')


* `phpstan-assert` iterable<mixed> $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type iterable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L743)

#### assertIsNotArray()

 *protected* assertIsNotArray($actual, $message = '')


* `phpstan-assert` !array<mixed> $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type array.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L755)

#### assertIsNotBool()

 *protected* assertIsNotBool($actual, $message = '')


* `phpstan-assert` !bool $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type bool.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L767)

#### assertIsNotCallable()

 *protected* assertIsNotCallable($actual, $message = '')


* `phpstan-assert` !callable $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type callable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L779)

#### assertIsNotClosedResource()

 *protected* assertIsNotClosedResource($actual, $message = '')


* `phpstan-assert` !resource $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type resource.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L791)

#### assertIsNotFloat()

 *protected* assertIsNotFloat($actual, $message = '')


* `phpstan-assert` !float $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type float.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L803)

#### assertIsNotInt()

 *protected* assertIsNotInt($actual, $message = '')


* `phpstan-assert` !int $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type int.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L815)

#### assertIsNotIterable()

 *protected* assertIsNotIterable($actual, $message = '')


* `phpstan-assert` !iterable<mixed> $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type iterable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L827)

#### assertIsNotNumeric()

 *protected* assertIsNotNumeric($actual, $message = '')


* `phpstan-assert` !numeric $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type numeric.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L839)

#### assertIsNotObject()

 *protected* assertIsNotObject($actual, $message = '')


* `phpstan-assert` !object $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type object.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L851)

#### assertIsNotReadable()

 *protected* assertIsNotReadable($filename, $message = '')


* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file/dir exists and is not readable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L859)

#### assertIsNotResource()

 *protected* assertIsNotResource($actual, $message = '')


* `phpstan-assert` !resource $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type resource.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L871)

#### assertIsNotScalar()

 *protected* assertIsNotScalar($actual, $message = '')


* `psalm-assert` !scalar $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type scalar.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L883)

#### assertIsNotString()

 *protected* assertIsNotString($actual, $message = '')


* `phpstan-assert` !string $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type string.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L895)

#### assertIsNotWritable()

 *protected* assertIsNotWritable($filename, $message = '')


* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file/dir exists and is not writable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L903)

#### assertIsNumeric()

 *protected* assertIsNumeric($actual, $message = '')


* `phpstan-assert` numeric $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type numeric.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L915)

#### assertIsObject()

 *protected* assertIsObject($actual, $message = '')


* `phpstan-assert` object $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type object.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L927)

#### assertIsReadable()

 *protected* assertIsReadable($filename, $message = '')


* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file/dir is readable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L935)

#### assertIsResource()

 *protected* assertIsResource($actual, $message = '')


* `phpstan-assert` resource $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type resource.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L947)

#### assertIsScalar()

 *protected* assertIsScalar($actual, $message = '')


* `phpstan-assert` scalar $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type scalar.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L959)

#### assertIsString()

 *protected* assertIsString($actual, $message = '')


* `phpstan-assert` string $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type string.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L971)

#### assertIsWritable()

 *protected* assertIsWritable($filename, $message = '')


* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file/dir exists and is writable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L979)

#### assertJson()

 *protected* assertJson($actualJson, $message = '')


* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that a string is a valid JSON string.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L987)

#### assertJsonFileEqualsJsonFile()

 *protected* assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')


* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message
* `return void`

Asserts that two JSON files are equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L995)

#### assertJsonFileNotEqualsJsonFile()

 *protected* assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')


* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message
* `return void`

Asserts that two JSON files are not equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1003)

#### assertJsonStringEqualsJsonFile()

 *protected* assertJsonStringEqualsJsonFile($expectedFile, $actualJson, $message = '')


* `param string` $expectedFile
* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that the generated JSON encoded object and the content of the given file are equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1011)

#### assertJsonStringEqualsJsonString()

 *protected* assertJsonStringEqualsJsonString($expectedJson, $actualJson, $message = '')


* `param string` $expectedJson
* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that two given JSON encoded objects or arrays are equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1019)

#### assertJsonStringNotEqualsJsonFile()

 *protected* assertJsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = '')


* `param string` $expectedFile
* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that the generated JSON encoded object and the content of the given file are not equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1027)

#### assertJsonStringNotEqualsJsonString()

 *protected* assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = '')


* `param string` $expectedJson
* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that two given JSON encoded objects or arrays are not equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1035)

#### assertLessOrEquals()

 *protected* assertLessOrEquals($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is smaller than or equal to another value.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L82)

#### assertLessThan()

 *protected* assertLessThan($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is smaller than another value.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1046)

#### assertLessThanOrEqual()

 *protected* assertLessThanOrEqual($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is smaller than or equal to another value.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1057)

#### assertMatchesRegularExpression()

 *protected* assertMatchesRegularExpression($pattern, $string, $message = '')


* `param string` $pattern
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string matches a given regular expression.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1065)

#### assertNan()

 *protected* assertNan($actual, $message = '')


* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is nan.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1075)

#### assertNot()

 *protected* assertNot(array $arguments)


* `param array` $arguments
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L47)

#### assertNotContains()

 *protected* assertNotContains($needle, $haystack, $message = '')


* `param mixed` $needle
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts that a haystack does not contain a needle.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1085)

#### assertNotContainsEquals()

 *protected* assertNotContainsEquals($needle, $haystack, $message = '')


* `param mixed` $needle
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L96)

#### assertNotContainsOnly()

 *protected* assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = '')


* `param string` $type
* `param iterable<mixed>` $haystack
* `param ?bool` $isNativeType
* `param string` $message
* `return void`

Asserts that a haystack does not contain only values of a given type.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1095)

#### assertNotCount()

 *protected* assertNotCount($expectedCount, $haystack, $message = '')


* `param int` $expectedCount
* `param \Countable|iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts the number of elements of an array, Countable or Traversable.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1145)

#### assertNotEmpty()

 *protected* assertNotEmpty($actual, $message = '')


* `phpstan-assert` !empty $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not empty.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1157)

#### assertNotEquals()

 *protected* assertNotEquals($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are not equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1168)

#### assertNotEqualsCanonicalizing()

 *protected* assertNotEqualsCanonicalizing($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are not equal (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1179)

#### assertNotEqualsIgnoringCase()

 *protected* assertNotEqualsIgnoringCase($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are not equal (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1190)

#### assertNotEqualsWithDelta()

 *protected* assertNotEqualsWithDelta($expected, $actual, $delta, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param float` $delta
* `param string` $message
* `return void`

Asserts that two variables are not equal (with delta).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1201)

#### assertNotFalse()

 *protected* assertNotFalse($condition, $message = '')


* `phpstan-assert` !false $condition
* `param mixed` $condition
* `param string` $message
* `return void`

Asserts that a condition is not false.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1213)

#### assertNotInstanceOf()

 *protected* assertNotInstanceOf($expected, $actual, $message = '')


* `template` ExpectedType of object
* `phpstan-assert` !ExpectedType $actual
* `param class-string<ExpectedType>` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of a given type.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1228)

#### assertNotNull()

 *protected* assertNotNull($actual, $message = '')


* `phpstan-assert` !null $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not null.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1240)

#### assertNotRegExp()

 *protected* assertNotRegExp($pattern, $string, $message = '')


* `param string` $pattern
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string does not match a given regular expression.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L90)

#### assertNotSame()

 *protected* assertNotSame($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables do not have the same type and value.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1251)

#### assertNotSameSize()

 *protected* assertNotSameSize($expected, $actual, $message = '')


* `param \Countable|iterable<mixed>` $expected
* `param \Countable|iterable<mixed>` $actual
* `param string` $message
* `return void`

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is not the same.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1262)

#### assertNotTrue()

 *protected* assertNotTrue($condition, $message = '')


* `phpstan-assert` !true $condition
* `param mixed` $condition
* `param string` $message
* `return void`

Asserts that a condition is not true.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1274)

#### assertNull()

 *protected* assertNull($actual, $message = '')


* `phpstan-assert` null $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is null.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1286)

#### assertObjectHasAttribute()

 *protected* assertObjectHasAttribute($attributeName, $object, $message = '')


* `param string` $attributeName
* `param object` $object
* `param string` $message
* `return void`

Asserts that an object has a specified attribute.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1294)

#### assertObjectNotHasAttribute()

 *protected* assertObjectNotHasAttribute($attributeName, $object, $message = '')


* `param string` $attributeName
* `param object` $object
* `param string` $message
* `return void`

Asserts that an object does not have a specified attribute.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1308)

#### assertRegExp()

 *protected* assertRegExp($pattern, $string, $message = '')


* `param string` $pattern
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string matches a given regular expression.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L98)

#### assertSame()

 *protected* assertSame($expected, $actual, $message = '')


* `template` ExpectedType
* `phpstan-assert` =ExpectedType $actual
* `param ExpectedType` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables have the same type and value.

Used on objects, it asserts that two variables reference
the same object.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1330)

#### assertSameSize()

 *protected* assertSameSize($expected, $actual, $message = '')


* `param \Countable|iterable<mixed>` $expected
* `param \Countable|iterable<mixed>` $actual
* `param string` $message
* `return void`

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is the same.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1340)

#### assertStringContainsString()

 *protected* assertStringContainsString($needle, $haystack, $message = '')


* `param string` $needle
* `param string` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1345)

#### assertStringContainsStringIgnoringCase()

 *protected* assertStringContainsStringIgnoringCase($needle, $haystack, $message = '')


* `param string` $needle
* `param string` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1350)

#### assertStringEndsNotWith()

 *protected* assertStringEndsNotWith($suffix, $string, $message = '')


* `param non-empty-string` $suffix
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string ends not with a given suffix.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1359)

#### assertStringEndsWith()

 *protected* assertStringEndsWith($suffix, $string, $message = '')


* `param non-empty-string` $suffix
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string ends with a given suffix.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1368)

#### assertStringEqualsFile()

 *protected* assertStringEqualsFile($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is equal to the contents of a file.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1376)

#### assertStringEqualsFileCanonicalizing()

 *protected* assertStringEqualsFileCanonicalizing($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is equal to the contents of a file (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1384)

#### assertStringEqualsFileIgnoringCase()

 *protected* assertStringEqualsFileIgnoringCase($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is equal to the contents of a file (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1392)

#### assertStringMatchesFormat()

 *protected* assertStringMatchesFormat($format, $string, $message = '')


* `param string` $format
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string matches a given format string.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1400)

#### assertStringMatchesFormatFile()

 *protected* assertStringMatchesFormatFile($formatFile, $string, $message = '')


* `param string` $formatFile
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string matches a given format file.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1408)

#### assertStringNotContainsString()

 *protected* assertStringNotContainsString($needle, $haystack, $message = '')


* `param string` $needle
* `param string` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1413)

#### assertStringNotContainsStringIgnoringCase()

 *protected* assertStringNotContainsStringIgnoringCase($needle, $haystack, $message = '')


* `param string` $needle
* `param string` $haystack
* `param string` $message
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1418)

#### assertStringNotEqualsFile()

 *protected* assertStringNotEqualsFile($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is not equal to the contents of a file.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1426)

#### assertStringNotEqualsFileCanonicalizing()

 *protected* assertStringNotEqualsFileCanonicalizing($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is not equal to the contents of a file (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1434)

#### assertStringNotEqualsFileIgnoringCase()

 *protected* assertStringNotEqualsFileIgnoringCase($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is not equal to the contents of a file (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1442)

#### assertStringNotMatchesFormat()

 *protected* assertStringNotMatchesFormat($format, $string, $message = '')


* `param string` $format
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string does not match a given format string.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1450)

#### assertStringNotMatchesFormatFile()

 *protected* assertStringNotMatchesFormatFile($formatFile, $string, $message = '')


* `param string` $formatFile
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string does not match a given format string.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1460)

#### assertStringStartsNotWith()

 *protected* assertStringStartsNotWith($prefix, $string, $message = '')


* `param non-empty-string` $prefix
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string starts not with a given prefix.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1475)

#### assertStringStartsWith()

 *protected* assertStringStartsWith($prefix, $string, $message = '')


* `param non-empty-string` $prefix
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string starts with a given prefix.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1484)

#### assertThat()

 *protected* assertThat($value, $constraint, $message = '')


* `param mixed` $value
* `param \PHPUnit\Framework\Constraint\Constraint` $constraint
* `param string` $message
* `return void`

Evaluates a PHPUnit\Framework\Constraint matcher object.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1494)

#### assertThatItsNot()

 *protected* assertThatItsNot($value, $constraint, $message = '')


* `param mixed` $value
* `param \PHPUnit\Framework\Constraint\Constraint` $constraint
* `param string` $message
* `return void`

Evaluates a PHPUnit\Framework\Constraint matcher object.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L106)

#### assertTrue()

 *protected* assertTrue($condition, $message = '')


* `phpstan-assert` true $condition
* `param mixed` $condition
* `param string` $message
* `return void`

Asserts that a condition is true.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1506)

#### assertXmlFileEqualsXmlFile()

 *protected* assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')


* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message
* `return void`

Asserts that two XML files are equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1514)

#### assertXmlFileNotEqualsXmlFile()

 *protected* assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')


* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message
* `return void`

Asserts that two XML files are not equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1522)

#### assertXmlStringEqualsXmlFile()

 *protected* assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')


* `param string` $expectedFile
* `param \DOMDocument|string` $actualXml
* `param string` $message
* `return void`

Asserts that two XML documents are equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1530)

#### assertXmlStringEqualsXmlString()

 *protected* assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')


* `param \DOMDocument|string` $expectedXml
* `param \DOMDocument|string` $actualXml
* `param string` $message
* `return void`

Asserts that two XML documents are equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1544)

#### assertXmlStringNotEqualsXmlFile()

 *protected* assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')


* `param string` $expectedFile
* `param \DOMDocument|string` $actualXml
* `param string` $message
* `return void`

Asserts that two XML documents are not equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1566)

#### assertXmlStringNotEqualsXmlString()

 *protected* assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')


* `param \DOMDocument|string` $expectedXml
* `param \DOMDocument|string` $actualXml
* `param string` $message
* `return void`

Asserts that two XML documents are not equal.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1583)

#### debug()

 *protected* debug($message)


* `param mixed` $message
* `return void`

Print debug message to the screen.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L235)

#### debugSection()

 *protected* debugSection($title, $msg)


* `param string` $title
* `param mixed` $msg
* `return void`

Print debug message with a title

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L243)

#### fail()

 *protected* fail($message = '')


* `param string` $message
* `return never`

Fails a test with the given message.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1603)

#### getModule()

 *protected* getModule($name)


* `param string` $name
* `throws ModuleException`
* `return \Codeception\Module`

Get another module by its name:

{% highlight php %}

<?php
$this->getModule('WebDriver')->_findElements('.items');

{% endhighlight %}

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L285)

#### getModules()

 *protected* getModules()


* `return array`

Get all enabled modules

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L270)

#### hasModule()

 *protected* hasModule($name)


* `param string` $name
* `return bool`

Checks that module is enabled.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L262)

#### hasStaticAttribute()

 *private static* hasStaticAttribute($attributeName, $className)


* `see` https://github.com/sebastianbergmann/phpunit/blob/9.6/src/Framework/Constraint/Object/ClassHasStaticAttribute.php
* `param string` $attributeName
* `param class-string` $className
* `return bool`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1628)

#### markTestIncomplete()

 *protected* markTestIncomplete($message = '')


* `param string` $message
* `return never`

Mark the test as incomplete.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1611)

#### markTestSkipped()

 *protected* markTestSkipped($message = '')


* `param string` $message
* `return never`

Mark the test as skipped.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L1619)

#### onReconfigure()

 *protected* onReconfigure()


HOOK to be executed when config changes with `_reconfigure`.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L113)

#### scalarizeArray()

 *protected* scalarizeArray(array $array)


* `param array` $array
* `return array`

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L304)

#### shortenMessage()

 *protected* shortenMessage($message, $chars = 150)


* `param string` $message
* `param int` $chars
* `return string`

Short text message to an amount of chars

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L254)

#### validateConfig()

 *protected* validateConfig()


* `throws ModuleConfigException|ModuleException`
* `return void`

Validates current config for required fields and required packages.

[See source](https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php#L131)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/main/src/Codeception/Module.php">Help us to improve documentation. Edit module reference</a></div>
