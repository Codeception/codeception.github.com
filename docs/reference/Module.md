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

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L60)

#### _after()

 *public* _after($test)


* `param \Codeception\TestInterface` $test

**HOOK** executed after test

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L223)

#### _afterStep()

 *public* _afterStep($step)


* `param \Codeception\Step` $step

**HOOK** executed after step

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L209)

#### _afterSuite()

 *public* _afterSuite()


**HOOK** executed after suite

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L195)

#### _before()

 *public* _before($test)


* `param \Codeception\TestInterface` $test

**HOOK** executed before test

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L216)

#### _beforeStep()

 *public* _beforeStep($step)


* `param \Codeception\Step` $step

**HOOK** executed before step

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L202)

#### _beforeSuite()

 *public* _beforeSuite(array $settings = array ( ))


* `param array` $settings

**HOOK** executed before suite

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L188)

#### _failed()

 *public* _failed($test, $fail)


* `param \Codeception\TestInterface` $test
* `param \Exception` $fail

**HOOK** executed when test fails but before `_after`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L230)

#### _getConfig()

 *public* _getConfig($key = null)


* `param string|null` $key
* `return mixed` the config item's value or null if it doesn't exist

Get config values or specific config item.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L301)

#### _getName()

 *public* _getName()


* `return string`

Returns a module name for a Module, a class name for Helper

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L159)

#### _hasRequiredFields()

 *public* _hasRequiredFields()


* `return bool`

Checks if a module has required fields

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L173)

#### _initialize()

 *public* _initialize()


**HOOK** triggered after module is created and configuration is loaded

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L181)

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

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L104)

#### _resetConfig()

 *public* _resetConfig()


* `return void`

Reverts config changed by `_reconfigure`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L122)

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

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L81)

#### assert()

 *protected* assert(array $arguments, $not = false)


* `param array` $arguments
* `param bool` $not

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L16)

#### assertArrayHasKey()

 *protected* assertArrayHasKey($key, $array, $message = '')


* `param int|string` $key
* `param array|ArrayAccess` $array
* `param string` $message

Asserts that an array has a specified key.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L22)

#### assertArrayNotHasKey()

 *protected* assertArrayNotHasKey($key, $array, $message = '')


* `param int|string` $key
* `param array|ArrayAccess` $array
* `param string` $message

Asserts that an array does not have a specified key.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L33)

#### assertClassHasAttribute()

 *protected* assertClassHasAttribute($attributeName, $className, $message = '')


* `param string` $attributeName
* `param string` $className
* `param string` $message

Asserts that a class has a specified attribute.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L41)

#### assertClassHasStaticAttribute()

 *protected* assertClassHasStaticAttribute($attributeName, $className, $message = '')


* `param string` $attributeName
* `param string` $className
* `param string` $message

Asserts that a class has a specified static attribute.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L49)

#### assertClassNotHasAttribute()

 *protected* assertClassNotHasAttribute($attributeName, $className, $message = '')


* `param string` $attributeName
* `param string` $className
* `param string` $message

Asserts that a class does not have a specified attribute.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L57)

#### assertClassNotHasStaticAttribute()

 *protected* assertClassNotHasStaticAttribute($attributeName, $className, $message = '')


* `param string` $attributeName
* `param string` $className
* `param string` $message

Asserts that a class does not have a specified static attribute.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L65)

#### assertContains()

 *protected* assertContains($needle, $haystack, $message = '')


* `param mixed` $needle
* `param iterable` $haystack
* `param string` $message

Asserts that a haystack contains a needle.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L75)

#### assertContainsEquals()

 *protected* assertContainsEquals($needle, $haystack, $message = '')


* `param mixed` $needle
* `param iterable` $haystack
* `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L83)

#### assertContainsOnly()

 *protected* assertContainsOnly($type, $haystack, $isNativeType = null, $message = '')


* `param string` $type
* `param iterable` $haystack
* `param ?bool` $isNativeType
* `param string` $message

Asserts that a haystack contains only values of a given type.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L91)

#### assertContainsOnlyInstancesOf()

 *protected* assertContainsOnlyInstancesOf($className, $haystack, $message = '')


* `param string` $className
* `param iterable` $haystack
* `param string` $message

Asserts that a haystack contains only instances of a given class name.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L99)

#### assertCount()

 *protected* assertCount($expectedCount, $haystack, $message = '')


* `param Countable|iterable` $haystack
* `param int` $expectedCount
* `param string` $message

Asserts the number of elements of an array, Countable or Traversable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L109)

#### assertDirectoryDoesNotExist()

 *protected* assertDirectoryDoesNotExist($directory, $message = '')


* `param string` $directory
* `param string` $message

Asserts that a directory does not exist.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L117)

#### assertDirectoryExists()

 *protected* assertDirectoryExists($directory, $message = '')


* `param string` $directory
* `param string` $message

Asserts that a directory exists.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L125)

#### assertDirectoryIsNotReadable()

 *protected* assertDirectoryIsNotReadable($directory, $message = '')


* `param string` $directory
* `param string` $message

Asserts that a directory exists and is not readable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L133)

#### assertDirectoryIsNotWritable()

 *protected* assertDirectoryIsNotWritable($directory, $message = '')


* `param string` $directory
* `param string` $message

Asserts that a directory exists and is not writable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L141)

#### assertDirectoryIsReadable()

 *protected* assertDirectoryIsReadable($directory, $message = '')


* `param string` $directory
* `param string` $message

Asserts that a directory exists and is readable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L149)

#### assertDirectoryIsWritable()

 *protected* assertDirectoryIsWritable($directory, $message = '')


* `param string` $directory
* `param string` $message

Asserts that a directory exists and is writable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L157)

#### assertDoesNotMatchRegularExpression()

 *protected* assertDoesNotMatchRegularExpression($pattern, $string, $message = '')


* `param string` $pattern
* `param string` $string
* `param string` $message

Asserts that a string does not match a given regular expression.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L165)

#### assertEmpty()

 *protected* assertEmpty($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is empty.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L175)

#### assertEquals()

 *protected* assertEquals($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that two variables are equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L186)

#### assertEqualsCanonicalizing()

 *protected* assertEqualsCanonicalizing($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that two variables are equal (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L197)

#### assertEqualsIgnoringCase()

 *protected* assertEqualsIgnoringCase($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that two variables are equal (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L208)

#### assertEqualsWithDelta()

 *protected* assertEqualsWithDelta($expected, $actual, $delta, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param float` $delta
* `param string` $message

Asserts that two variables are equal (with delta).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L219)

#### assertFalse()

 *protected* assertFalse($condition, $message = '')


* `param mixed` $condition
* `param string` $message

Asserts that a condition is false.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L229)

#### assertFileDoesNotExist()

 *protected* assertFileDoesNotExist($filename, $message = '')


* `param string` $filename
* `param string` $message

Asserts that a file does not exist.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L237)

#### assertFileEquals()

 *protected* assertFileEquals($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message

Asserts that the contents of one file is equal to the contents of another file.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L245)

#### assertFileEqualsCanonicalizing()

 *protected* assertFileEqualsCanonicalizing($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message

Asserts that the contents of one file is equal to the contents of another file (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L253)

#### assertFileEqualsIgnoringCase()

 *protected* assertFileEqualsIgnoringCase($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message

Asserts that the contents of one file is equal to the contents of another file (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L261)

#### assertFileExists()

 *protected* assertFileExists($filename, $message = '')


* `param string` $filename
* `param string` $message

Asserts that a file exists.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L269)

#### assertFileIsNotReadable()

 *protected* assertFileIsNotReadable($file, $message = '')


* `param string` $file
* `param string` $message

Asserts that a file exists and is not readable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L277)

#### assertFileIsNotWritable()

 *protected* assertFileIsNotWritable($file, $message = '')


* `param string` $file
* `param string` $message

Asserts that a file exists and is not writable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L285)

#### assertFileIsReadable()

 *protected* assertFileIsReadable($file, $message = '')


* `param string` $file
* `param string` $message

Asserts that a file exists and is readable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L293)

#### assertFileIsWritable()

 *protected* assertFileIsWritable($file, $message = '')


* `param string` $file
* `param string` $message

Asserts that a file exists and is writable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L301)

#### assertFileNotEquals()

 *protected* assertFileNotEquals($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message

Asserts that the contents of one file is not equal to the contents of another file.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L309)

#### assertFileNotEqualsCanonicalizing()

 *protected* assertFileNotEqualsCanonicalizing($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message

Asserts that the contents of one file is not equal to the contents of another file (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L317)

#### assertFileNotEqualsIgnoringCase()

 *protected* assertFileNotEqualsIgnoringCase($expected, $actual, $message = '')


* `param string` $expected
* `param string` $actual
* `param string` $message

Asserts that the contents of one file is not equal to the contents of another file (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L325)

#### assertFileNotExists()

 *protected* assertFileNotExists($filename, $message = '')


* `param string` $filename
* `param string` $message

Asserts that a file does not exist.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L41)

#### assertFinite()

 *protected* assertFinite($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is finite.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L335)

#### assertGreaterOrEquals()

 *protected* assertGreaterOrEquals($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that a value is greater than or equal to another value.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L52)

#### assertGreaterThan()

 *protected* assertGreaterThan($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that a value is greater than another value.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L346)

#### assertGreaterThanOrEqual()

 *protected* assertGreaterThanOrEqual($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that a value is greater than or equal to another value.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L357)

#### assertInfinite()

 *protected* assertInfinite($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is infinite.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L367)

#### assertInstanceOf()

 *protected* assertInstanceOf($expected, $actual, $message = '')


* `param mixed` $actual
* `param string` $expected
* `param string` $message

Asserts that a variable is of a given type.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L377)

#### assertIsArray()

 *protected* assertIsArray($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type array.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L387)

#### assertIsBool()

 *protected* assertIsBool($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type bool.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L397)

#### assertIsCallable()

 *protected* assertIsCallable($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type callable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L407)

#### assertIsClosedResource()

 *protected* assertIsClosedResource($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type resource and is closed.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L417)

#### assertIsEmpty()

 *protected* assertIsEmpty($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is empty.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L62)

#### assertIsFloat()

 *protected* assertIsFloat($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type float.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L427)

#### assertIsInt()

 *protected* assertIsInt($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type int.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L437)

#### assertIsIterable()

 *protected* assertIsIterable($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type iterable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L447)

#### assertIsNotArray()

 *protected* assertIsNotArray($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type array.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L457)

#### assertIsNotBool()

 *protected* assertIsNotBool($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type bool.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L467)

#### assertIsNotCallable()

 *protected* assertIsNotCallable($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type callable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L477)

#### assertIsNotClosedResource()

 *protected* assertIsNotClosedResource($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type resource.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L487)

#### assertIsNotFloat()

 *protected* assertIsNotFloat($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type float.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L497)

#### assertIsNotInt()

 *protected* assertIsNotInt($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type int.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L507)

#### assertIsNotIterable()

 *protected* assertIsNotIterable($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type iterable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L517)

#### assertIsNotNumeric()

 *protected* assertIsNotNumeric($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type numeric.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L527)

#### assertIsNotObject()

 *protected* assertIsNotObject($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type object.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L537)

#### assertIsNotReadable()

 *protected* assertIsNotReadable($filename, $message = '')


* `param string` $filename
* `param string` $message

Asserts that a file/dir exists and is not readable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L545)

#### assertIsNotResource()

 *protected* assertIsNotResource($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type resource.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L555)

#### assertIsNotScalar()

 *protected* assertIsNotScalar($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type scalar.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L565)

#### assertIsNotString()

 *protected* assertIsNotString($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not of type string.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L575)

#### assertIsNotWritable()

 *protected* assertIsNotWritable($filename, $message = '')


* `param string` $filename
* `param string` $message

Asserts that a file/dir exists and is not writable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L583)

#### assertIsNumeric()

 *protected* assertIsNumeric($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type numeric.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L593)

#### assertIsObject()

 *protected* assertIsObject($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type object.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L603)

#### assertIsReadable()

 *protected* assertIsReadable($filename, $message = '')


* `param string` $filename
* `param string` $message

Asserts that a file/dir is readable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L611)

#### assertIsResource()

 *protected* assertIsResource($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type resource.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L621)

#### assertIsScalar()

 *protected* assertIsScalar($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type scalar.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L631)

#### assertIsString()

 *protected* assertIsString($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is of type string.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L641)

#### assertIsWritable()

 *protected* assertIsWritable($filename, $message = '')


* `param string` $filename
* `param string` $message

Asserts that a file/dir exists and is writable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L649)

#### assertJson()

 *protected* assertJson($actualJson, $message = '')


* `param string` $actualJson
* `param string` $message

Asserts that a string is a valid JSON string.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L657)

#### assertJsonFileEqualsJsonFile()

 *protected* assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')


* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message

Asserts that two JSON files are equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L665)

#### assertJsonFileNotEqualsJsonFile()

 *protected* assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')


* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message

Asserts that two JSON files are not equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L673)

#### assertJsonStringEqualsJsonFile()

 *protected* assertJsonStringEqualsJsonFile($expectedFile, $actualJson, $message = '')


* `param string` $expectedFile
* `param string` $actualJson
* `param string` $message

Asserts that the generated JSON encoded object and the content of the given file are equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L681)

#### assertJsonStringEqualsJsonString()

 *protected* assertJsonStringEqualsJsonString($expectedJson, $actualJson, $message = '')


* `param string` $expectedJson
* `param string` $actualJson
* `param string` $message

Asserts that two given JSON encoded objects or arrays are equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L689)

#### assertJsonStringNotEqualsJsonFile()

 *protected* assertJsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = '')


* `param string` $expectedFile
* `param string` $actualJson
* `param string` $message

Asserts that the generated JSON encoded object and the content of the given file are not equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L697)

#### assertJsonStringNotEqualsJsonString()

 *protected* assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = '')


* `param string` $expectedJson
* `param string` $actualJson
* `param string` $message

Asserts that two given JSON encoded objects or arrays are not equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L705)

#### assertLessOrEquals()

 *protected* assertLessOrEquals($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that a value is smaller than or equal to another value.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L73)

#### assertLessThan()

 *protected* assertLessThan($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that a value is smaller than another value.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L716)

#### assertLessThanOrEqual()

 *protected* assertLessThanOrEqual($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that a value is smaller than or equal to another value.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L727)

#### assertMatchesRegularExpression()

 *protected* assertMatchesRegularExpression($pattern, $string, $message = '')


* `param string` $pattern
* `param string` $string
* `param string` $message

Asserts that a string matches a given regular expression.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L735)

#### assertNan()

 *protected* assertNan($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is nan.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L745)

#### assertNot()

 *protected* assertNot($arguments)


* `param ` $arguments

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L33)

#### assertNotContains()

 *protected* assertNotContains($needle, $haystack, $message = '')


* `param mixed` $needle
* `param iterable` $haystack
* `param string` $message

Asserts that a haystack does not contain a needle.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L755)

#### assertNotContainsEquals()

 *protected* assertNotContainsEquals($needle, $haystack, $message = '')


* `param ` $needle
* `param iterable` $haystack
* `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L760)

#### assertNotContainsOnly()

 *protected* assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = '')


* `param string` $type
* `param iterable` $haystack
* `param ?bool` $isNativeType
* `param string` $message

Asserts that a haystack does not contain only values of a given type.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L768)

#### assertNotCount()

 *protected* assertNotCount($expectedCount, $haystack, $message = '')


* `param Countable|iterable` $haystack
* `param int` $expectedCount
* `param string` $message

Asserts the number of elements of an array, Countable or Traversable.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L778)

#### assertNotEmpty()

 *protected* assertNotEmpty($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not empty.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L788)

#### assertNotEquals()

 *protected* assertNotEquals($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that two variables are not equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L799)

#### assertNotEqualsCanonicalizing()

 *protected* assertNotEqualsCanonicalizing($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that two variables are not equal (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L810)

#### assertNotEqualsIgnoringCase()

 *protected* assertNotEqualsIgnoringCase($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that two variables are not equal (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L821)

#### assertNotEqualsWithDelta()

 *protected* assertNotEqualsWithDelta($expected, $actual, $delta, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param float` $delta
* `param string` $message

Asserts that two variables are not equal (with delta).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L832)

#### assertNotFalse()

 *protected* assertNotFalse($condition, $message = '')


* `param mixed` $condition
* `param string` $message

Asserts that a condition is not false.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L842)

#### assertNotInstanceOf()

 *protected* assertNotInstanceOf($expected, $actual, $message = '')


* `param mixed` $actual
* `param string` $expected
* `param string` $message

Asserts that a variable is not of a given type.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L852)

#### assertNotNull()

 *protected* assertNotNull($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is not null.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L862)

#### assertNotRegExp()

 *protected* assertNotRegExp($pattern, $string, $message = '')


* `param string` $pattern
* `param string` $string
* `param string` $message

Asserts that a string does not match a given regular expression.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L81)

#### assertNotSame()

 *protected* assertNotSame($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that two variables do not have the same type and value.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L873)

#### assertNotSameSize()

 *protected* assertNotSameSize($expected, $actual, $message = '')


* `param Countable|iterable` $expected
* `param Countable|iterable` $actual
* `param string` $message

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is not the same.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L884)

#### assertNotTrue()

 *protected* assertNotTrue($condition, $message = '')


* `param mixed` $condition
* `param string` $message

Asserts that a condition is not true.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L894)

#### assertNull()

 *protected* assertNull($actual, $message = '')


* `param mixed` $actual
* `param string` $message

Asserts that a variable is null.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L904)

#### assertObjectHasAttribute()

 *protected* assertObjectHasAttribute($attributeName, $object, $message = '')


* `param string` $attributeName
* `param object` $object
* `param string` $message

Asserts that an object has a specified attribute.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L912)

#### assertObjectNotHasAttribute()

 *protected* assertObjectNotHasAttribute($attributeName, $object, $message = '')


* `param string` $attributeName
* `param object` $object
* `param string` $message

Asserts that an object does not have a specified attribute.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L920)

#### assertRegExp()

 *protected* assertRegExp($pattern, $string, $message = '')


* `param string` $pattern
* `param string` $string
* `param string` $message

Asserts that a string matches a given regular expression.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L89)

#### assertSame()

 *protected* assertSame($expected, $actual, $message = '')


* `param mixed` $expected
* `param mixed` $actual
* `param string` $message

Asserts that two variables have the same type and value.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L931)

#### assertSameSize()

 *protected* assertSameSize($expected, $actual, $message = '')


* `param Countable|iterable` $expected
* `param Countable|iterable` $actual
* `param string` $message

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is the same.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L942)

#### assertStringContainsString()

 *protected* assertStringContainsString($needle, $haystack, $message = '')


* `param string` $needle
* `param string` $haystack
* `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L947)

#### assertStringContainsStringIgnoringCase()

 *protected* assertStringContainsStringIgnoringCase($needle, $haystack, $message = '')


* `param string` $needle
* `param string` $haystack
* `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L952)

#### assertStringEndsNotWith()

 *protected* assertStringEndsNotWith($suffix, $string, $message = '')


* `param string` $suffix
* `param string` $string
* `param string` $message

Asserts that a string ends not with a given suffix.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L960)

#### assertStringEndsWith()

 *protected* assertStringEndsWith($suffix, $string, $message = '')


* `param string` $suffix
* `param string` $string
* `param string` $message

Asserts that a string ends with a given suffix.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L968)

#### assertStringEqualsFile()

 *protected* assertStringEqualsFile($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message

Asserts that the contents of a string is equal to the contents of a file.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L976)

#### assertStringEqualsFileCanonicalizing()

 *protected* assertStringEqualsFileCanonicalizing($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message

Asserts that the contents of a string is equal to the contents of a file (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L984)

#### assertStringEqualsFileIgnoringCase()

 *protected* assertStringEqualsFileIgnoringCase($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message

Asserts that the contents of a string is equal to the contents of a file (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L992)

#### assertStringMatchesFormat()

 *protected* assertStringMatchesFormat($format, $string, $message = '')


* `param string` $format
* `param string` $string
* `param string` $message

Asserts that a string matches a given format string.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1000)

#### assertStringMatchesFormatFile()

 *protected* assertStringMatchesFormatFile($formatFile, $string, $message = '')


* `param string` $formatFile
* `param string` $string
* `param string` $message

Asserts that a string matches a given format file.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1008)

#### assertStringNotContainsString()

 *protected* assertStringNotContainsString($needle, $haystack, $message = '')


* `param string` $needle
* `param string` $haystack
* `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1013)

#### assertStringNotContainsStringIgnoringCase()

 *protected* assertStringNotContainsStringIgnoringCase($needle, $haystack, $message = '')


* `param string` $needle
* `param string` $haystack
* `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1018)

#### assertStringNotEqualsFile()

 *protected* assertStringNotEqualsFile($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message

Asserts that the contents of a string is not equal to the contents of a file.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1026)

#### assertStringNotEqualsFileCanonicalizing()

 *protected* assertStringNotEqualsFileCanonicalizing($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message

Asserts that the contents of a string is not equal to the contents of a file (canonicalizing).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1034)

#### assertStringNotEqualsFileIgnoringCase()

 *protected* assertStringNotEqualsFileIgnoringCase($expectedFile, $actualString, $message = '')


* `param string` $expectedFile
* `param string` $actualString
* `param string` $message

Asserts that the contents of a string is not equal to the contents of a file (ignoring case).

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1042)

#### assertStringNotMatchesFormat()

 *protected* assertStringNotMatchesFormat($format, $string, $message = '')


* `param string` $format
* `param string` $string
* `param string` $message

Asserts that a string does not match a given format string.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1050)

#### assertStringNotMatchesFormatFile()

 *protected* assertStringNotMatchesFormatFile($formatFile, $string, $message = '')


* `param string` $formatFile
* `param string` $string
* `param string` $message

Asserts that a string does not match a given format string.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1058)

#### assertStringStartsNotWith()

 *protected* assertStringStartsNotWith($prefix, $string, $message = '')


* `param string` $prefix
* `param string` $string
* `param string` $message

Asserts that a string starts not with a given prefix.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1066)

#### assertStringStartsWith()

 *protected* assertStringStartsWith($prefix, $string, $message = '')


* `param string` $prefix
* `param string` $string
* `param string` $message

Asserts that a string starts with a given prefix.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1074)

#### assertThat()

 *protected* assertThat($value, $constraint, $message = '')


* `param mixed` $value
* `param \PHPUnit\Framework\Constraint\Constraint` $constraint
* `param string` $message

Evaluates a PHPUnit\Framework\Constraint matcher object.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1084)

#### assertThatItsNot()

 *protected* assertThatItsNot($value, $constraint, $message = '')


* `param mixed` $value
* `param \PHPUnit\Framework\Constraint\Constraint` $constraint
* `param string` $message

Evaluates a PHPUnit\Framework\Constraint matcher object.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L99)

#### assertTrue()

 *protected* assertTrue($condition, $message = '')


* `param mixed` $condition
* `param string` $message

Asserts that a condition is true.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1094)

#### assertXmlFileEqualsXmlFile()

 *protected* assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')


* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message

Asserts that two XML files are equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1102)

#### assertXmlFileNotEqualsXmlFile()

 *protected* assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')


* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message

Asserts that two XML files are not equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1110)

#### assertXmlStringEqualsXmlFile()

 *protected* assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')


* `param DOMDocument|string` $actualXml
* `param string` $expectedFile
* `param string` $message

Asserts that two XML documents are equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1120)

#### assertXmlStringEqualsXmlString()

 *protected* assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')


* `param DOMDocument|string` $expectedXml
* `param DOMDocument|string` $actualXml
* `param string` $message

Asserts that two XML documents are equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1131)

#### assertXmlStringNotEqualsXmlFile()

 *protected* assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')


* `param DOMDocument|string` $actualXml
* `param string` $expectedFile
* `param string` $message

Asserts that two XML documents are not equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1141)

#### assertXmlStringNotEqualsXmlString()

 *protected* assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')


* `param DOMDocument|string` $expectedXml
* `param DOMDocument|string` $actualXml
* `param string` $message

Asserts that two XML documents are not equal.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1152)

#### debug()

 *protected* debug($message)


* `param mixed` $message
* `return void`

Print debug message to the screen.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L237)

#### debugSection()

 *protected* debugSection($title, $message)


* `param string` $title
* `param mixed` $message
* `return void`

Print debug message with a title

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L245)

#### fail()

 *protected* fail($message = '')


* `param string` $message

Fails a test with the given message.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1160)

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

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L287)

#### getModules()

 *protected* getModules()


* `return array`

Get all enabled modules

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L272)

#### hasModule()

 *protected* hasModule($name)


* `param string` $name
* `return bool`

Checks that module is enabled.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L264)

#### markTestIncomplete()

 *protected* markTestIncomplete($message = '')


* `param string` $message

Mark the test as incomplete.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1168)

#### markTestSkipped()

 *protected* markTestSkipped($message = '')


* `param string` $message

Mark the test as skipped.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L1176)

#### onReconfigure()

 *protected* onReconfigure()


HOOK to be executed when config changes with `_reconfigure`.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L114)

#### scalarizeArray()

 *protected* scalarizeArray(array $array)


* `param array` $array
* `return array`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L312)

#### shortenMessage()

 *protected* shortenMessage($message, $chars = 150)


* `param string` $message
* `param int` $chars
* `return string`

Short text message to an amount of chars

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L256)

#### validateConfig()

 *protected* validateConfig()


* `throws ModuleConfigException|ModuleException`
* `return void`

Validates current config for required fields and required packages.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php#L132)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/Module.php">Help us to improve documentation. Edit module reference</a></div>
