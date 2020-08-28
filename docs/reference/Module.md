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

type `bool`


#### $onlyActions

*public static* **$onlyActions**

Allows to explicitly set what methods have this class.

type `array`


#### $excludeActions

*public static* **$excludeActions**

Allows to explicitly exclude actions from module.

type `array`


#### $aliases

*public static* **$aliases**

Allows to rename actions

type `array`
#### __construct()

 *public* __construct($moduleContainer, $config = null) 

Module constructor.

Requires module container (to provide access between modules of suite) and config.

 * `param ModuleContainer` $moduleContainer
 * `param array|null` $config

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L71)

#### _after()

 *public* _after($test) 

**HOOK** executed after test

 * `param TestInterface` $test

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L254)

#### _afterStep()

 *public* _afterStep($step) 

**HOOK** executed after step

 * `param Step` $step

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L236)

#### _afterSuite()

 *public* _afterSuite() 

**HOOK** executed after suite

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L218)

#### _before()

 *public* _before($test) 

**HOOK** executed before test

 * `param TestInterface` $test

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L245)

#### _beforeStep()

 *public* _beforeStep($step) 

**HOOK** executed before step

 * `param Step` $step

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L227)

#### _beforeSuite()

 *public* _beforeSuite($settings = null) 

**HOOK** executed before suite

 * `param array` $settings

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L211)

#### _failed()

 *public* _failed($test, $fail) 

**HOOK** executed when test fails but before `_after`

 * `param TestInterface` $test
 * `param \Exception` $fail

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L264)

#### _getConfig()

 *public* _getConfig($key = null) 

Get config values or specific config item.

 * `param mixed` $key
 * `return` mixed the config item's value or null if it doesn't exist

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L351)

#### _getName()

 *public* _getName() 

Returns a module name for a Module, a class name for Helper
 * `return` string

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L178)

#### _hasRequiredFields()

 *public* _hasRequiredFields() 

Checks if a module has required fields
 * `return` bool

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L194)

#### _initialize()

 *public* _initialize() 

**HOOK** triggered after module is created and configuration is loaded

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L202)

#### _reconfigure()

 *public* _reconfigure($config) 

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

 * `param` $config
 * `throws` Exception\ModuleConfigException
 * `throws` ModuleException

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L120)

#### _resetConfig()

 *public* _resetConfig() 

Reverts config changed by `_reconfigure`

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L138)

#### _setConfig()

 *public* _setConfig($config) 

Allows to define initial module config.
Can be used in `_beforeSuite` hook of Helpers or Extensions

{% highlight php %}

<?php
public function _beforeSuite($settings = []) {
    $this->getModule('otherModule')->_setConfig($this->myOtherConfig);
}

{% endhighlight %}

 * `param` $config
 * `throws` Exception\ModuleConfigException
 * `throws` ModuleException

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L96)

#### assert()

 *protected* assert($arguments, $not = null) 

 * `param` $arguments
 * `param bool` $not

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L17)

#### assertArrayHasKey()

 *protected* assertArrayHasKey($key, $array, $message = null) 

Asserts that an array has a specified key.

 * `param int|string` $key
 * `param array|ArrayAccess` $array
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L21)

#### assertArrayNotHasKey()

 *protected* assertArrayNotHasKey($key, $array, $message = null) 

Asserts that an array does not have a specified key.

 * `param int|string` $key
 * `param array|ArrayAccess` $array
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L33)

#### assertClassHasAttribute()

 *protected* assertClassHasAttribute($attributeName, $className, $message = null) 

Asserts that a class has a specified attribute.

 * `param string` $attributeName
 * `param string` $className
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L45)

#### assertClassHasStaticAttribute()

 *protected* assertClassHasStaticAttribute($attributeName, $className, $message = null) 

Asserts that a class has a specified static attribute.

 * `param string` $attributeName
 * `param string` $className
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L57)

#### assertClassNotHasAttribute()

 *protected* assertClassNotHasAttribute($attributeName, $className, $message = null) 

Asserts that a class does not have a specified attribute.

 * `param string` $attributeName
 * `param string` $className
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L69)

#### assertClassNotHasStaticAttribute()

 *protected* assertClassNotHasStaticAttribute($attributeName, $className, $message = null) 

Asserts that a class does not have a specified static attribute.

 * `param string` $attributeName
 * `param string` $className
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L81)

#### assertContains()

 *protected* assertContains($needle, $haystack, $message = null) 

Asserts that a haystack contains a needle.

 * `param` $needle
 * `param` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L93)

#### assertContainsEquals()

 *protected* assertContainsEquals($needle, $haystack, $message = null) 

 * `param` $needle
 * `param` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L103)

#### assertContainsOnly()

 *protected* assertContainsOnly($type, $haystack, $isNativeType = null, $message = null) 

Asserts that a haystack contains only values of a given type.

 * `param string` $type
 * `param` $haystack
 * `param bool|null` $isNativeType
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L116)

#### assertContainsOnlyInstancesOf()

 *protected* assertContainsOnlyInstancesOf($className, $haystack, $message = null) 

Asserts that a haystack contains only instances of a given class name.

 * `param string` $className
 * `param` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L128)

#### assertCount()

 *protected* assertCount($expectedCount, $haystack, $message = null) 

Asserts the number of elements of an array, Countable or Traversable.

 * `param int` $expectedCount
 * `param Countable|iterable` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L140)

#### assertDirectoryDoesNotExist()

 *protected* assertDirectoryDoesNotExist($directory, $message = null) 

Asserts that a directory does not exist.

 * `param string` $directory
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L151)

#### assertDirectoryExists()

 *protected* assertDirectoryExists($directory, $message = null) 

Asserts that a directory exists.

 * `param string` $directory
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L162)

#### assertDirectoryIsNotReadable()

 *protected* assertDirectoryIsNotReadable($directory, $message = null) 

Asserts that a directory exists and is not readable.

 * `param string` $directory
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L173)

#### assertDirectoryIsNotWritable()

 *protected* assertDirectoryIsNotWritable($directory, $message = null) 

Asserts that a directory exists and is not writable.

 * `param string` $directory
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L184)

#### assertDirectoryIsReadable()

 *protected* assertDirectoryIsReadable($directory, $message = null) 

Asserts that a directory exists and is readable.

 * `param string` $directory
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L195)

#### assertDirectoryIsWritable()

 *protected* assertDirectoryIsWritable($directory, $message = null) 

Asserts that a directory exists and is writable.

 * `param string` $directory
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L206)

#### assertDoesNotMatchRegularExpression()

 *protected* assertDoesNotMatchRegularExpression($pattern, $string, $message = null) 

Asserts that a string does not match a given regular expression.

 * `param string` $pattern
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L218)

#### assertEmpty()

 *protected* assertEmpty($actual, $message = null) 

Asserts that a variable is empty.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L229)

#### assertEquals()

 *protected* assertEquals($expected, $actual, $message = null) 

Asserts that two variables are equal.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L241)

#### assertEqualsCanonicalizing()

 *protected* assertEqualsCanonicalizing($expected, $actual, $message = null) 

Asserts that two variables are equal (canonicalizing).

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L253)

#### assertEqualsIgnoringCase()

 *protected* assertEqualsIgnoringCase($expected, $actual, $message = null) 

Asserts that two variables are equal (ignoring case).

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L265)

#### assertEqualsWithDelta()

 *protected* assertEqualsWithDelta($expected, $actual, $delta, $message = null) 

Asserts that two variables are equal (with delta).

 * `param` $expected
 * `param` $actual
 * `param float` $delta
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L278)

#### assertFalse()

 *protected* assertFalse($condition, $message = null) 

Asserts that a condition is false.

 * `param` $condition
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L289)

#### assertFileDoesNotExist()

 *protected* assertFileDoesNotExist($filename, $message = null) 

Asserts that a file does not exist.

 * `param string` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L300)

#### assertFileEquals()

 *protected* assertFileEquals($expected, $actual, $message = null) 

Asserts that the contents of one file is equal to the contents of another file.

 * `param string` $expected
 * `param string` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L312)

#### assertFileEqualsCanonicalizing()

 *protected* assertFileEqualsCanonicalizing($expected, $actual, $message = null) 

Asserts that the contents of one file is equal to the contents of another file (canonicalizing).

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L324)

#### assertFileEqualsIgnoringCase()

 *protected* assertFileEqualsIgnoringCase($expected, $actual, $message = null) 

Asserts that the contents of one file is equal to the contents of another file (ignoring case).

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L336)

#### assertFileExists()

 *protected* assertFileExists($filename, $message = null) 

Asserts that a file exists.

 * `param string` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L347)

#### assertFileIsNotReadable()

 *protected* assertFileIsNotReadable($file, $message = null) 

Asserts that a file exists and is not readable.

 * `param string` $file
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L358)

#### assertFileIsNotWritable()

 *protected* assertFileIsNotWritable($file, $message = null) 

Asserts that a file exists and is not writable.

 * `param string` $file
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L369)

#### assertFileIsReadable()

 *protected* assertFileIsReadable($file, $message = null) 

Asserts that a file exists and is readable.

 * `param string` $file
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L380)

#### assertFileIsWritable()

 *protected* assertFileIsWritable($file, $message = null) 

Asserts that a file exists and is writable.

 * `param string` $file
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L391)

#### assertFileNotEquals()

 *protected* assertFileNotEquals($expected, $actual, $message = null) 

Asserts that the contents of one file is not equal to the contents of another file.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L403)

#### assertFileNotEqualsCanonicalizing()

 *protected* assertFileNotEqualsCanonicalizing($expected, $actual, $message = null) 

Asserts that the contents of one file is not equal to the contents of another file (canonicalizing).

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L415)

#### assertFileNotEqualsIgnoringCase()

 *protected* assertFileNotEqualsIgnoringCase($expected, $actual, $message = null) 

Asserts that the contents of one file is not equal to the contents of another file (ignoring case).

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L427)

#### assertFileNotExists()

 *protected* assertFileNotExists($filename, $message = null) 

Asserts that a file does not exist.

 * `param string` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L44)

#### assertFinite()

 *protected* assertFinite($actual, $message = null) 

Asserts that a variable is finite.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L438)

#### assertGreaterOrEquals()

 *protected* assertGreaterOrEquals($expected, $actual, $message = null) 

Asserts that a value is greater than or equal to another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L56)

#### assertGreaterThan()

 *protected* assertGreaterThan($expected, $actual, $message = null) 

Asserts that a value is greater than another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L450)

#### assertGreaterThanOrEqual()

 *protected* assertGreaterThanOrEqual($expected, $actual, $message = null) 

Asserts that a value is greater than or equal to another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L462)

#### assertInfinite()

 *protected* assertInfinite($actual, $message = null) 

Asserts that a variable is infinite.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L473)

#### assertInstanceOf()

 *protected* assertInstanceOf($expected, $actual, $message = null) 

Asserts that a variable is of a given type.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L485)

#### assertIsArray()

 *protected* assertIsArray($actual, $message = null) 

Asserts that a variable is of type array.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L496)

#### assertIsBool()

 *protected* assertIsBool($actual, $message = null) 

Asserts that a variable is of type bool.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L507)

#### assertIsCallable()

 *protected* assertIsCallable($actual, $message = null) 

Asserts that a variable is of type callable.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L518)

#### assertIsClosedResource()

 *protected* assertIsClosedResource($actual, $message = null) 

Asserts that a variable is of type resource and is closed.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L529)

#### assertIsEmpty()

 *protected* assertIsEmpty($actual, $message = null) 

Asserts that a variable is empty.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L67)

#### assertIsFloat()

 *protected* assertIsFloat($actual, $message = null) 

Asserts that a variable is of type float.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L540)

#### assertIsInt()

 *protected* assertIsInt($actual, $message = null) 

Asserts that a variable is of type int.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L551)

#### assertIsIterable()

 *protected* assertIsIterable($actual, $message = null) 

Asserts that a variable is of type iterable.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L562)

#### assertIsNotArray()

 *protected* assertIsNotArray($actual, $message = null) 

Asserts that a variable is not of type array.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L573)

#### assertIsNotBool()

 *protected* assertIsNotBool($actual, $message = null) 

Asserts that a variable is not of type bool.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L584)

#### assertIsNotCallable()

 *protected* assertIsNotCallable($actual, $message = null) 

Asserts that a variable is not of type callable.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L595)

#### assertIsNotClosedResource()

 *protected* assertIsNotClosedResource($actual, $message = null) 

Asserts that a variable is not of type resource.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L606)

#### assertIsNotFloat()

 *protected* assertIsNotFloat($actual, $message = null) 

Asserts that a variable is not of type float.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L617)

#### assertIsNotInt()

 *protected* assertIsNotInt($actual, $message = null) 

Asserts that a variable is not of type int.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L628)

#### assertIsNotIterable()

 *protected* assertIsNotIterable($actual, $message = null) 

Asserts that a variable is not of type iterable.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L639)

#### assertIsNotNumeric()

 *protected* assertIsNotNumeric($actual, $message = null) 

Asserts that a variable is not of type numeric.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L650)

#### assertIsNotObject()

 *protected* assertIsNotObject($actual, $message = null) 

Asserts that a variable is not of type object.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L661)

#### assertIsNotReadable()

 *protected* assertIsNotReadable($filename, $message = null) 

Asserts that a file/dir exists and is not readable.

 * `param string` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L672)

#### assertIsNotResource()

 *protected* assertIsNotResource($actual, $message = null) 

Asserts that a variable is not of type resource.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L683)

#### assertIsNotScalar()

 *protected* assertIsNotScalar($actual, $message = null) 

Asserts that a variable is not of type scalar.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L694)

#### assertIsNotString()

 *protected* assertIsNotString($actual, $message = null) 

Asserts that a variable is not of type string.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L705)

#### assertIsNotWritable()

 *protected* assertIsNotWritable($filename, $message = null) 

Asserts that a file/dir exists and is not writable.

 * `param` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L716)

#### assertIsNumeric()

 *protected* assertIsNumeric($actual, $message = null) 

Asserts that a variable is of type numeric.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L727)

#### assertIsObject()

 *protected* assertIsObject($actual, $message = null) 

Asserts that a variable is of type object.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L738)

#### assertIsReadable()

 *protected* assertIsReadable($filename, $message = null) 

Asserts that a file/dir is readable.

 * `param` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L749)

#### assertIsResource()

 *protected* assertIsResource($actual, $message = null) 

Asserts that a variable is of type resource.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L760)

#### assertIsScalar()

 *protected* assertIsScalar($actual, $message = null) 

Asserts that a variable is of type scalar.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L771)

#### assertIsString()

 *protected* assertIsString($actual, $message = null) 

Asserts that a variable is of type string.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L782)

#### assertIsWritable()

 *protected* assertIsWritable($filename, $message = null) 

Asserts that a file/dir exists and is writable.

 * `param` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L793)

#### assertJson()

 *protected* assertJson($actualJson, $message = null) 

Asserts that a string is a valid JSON string.

 * `param string` $actualJson
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L804)

#### assertJsonFileEqualsJsonFile()

 *protected* assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = null) 

Asserts that two JSON files are equal.

 * `param string` $expectedFile
 * `param string` $actualFile
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L816)

#### assertJsonFileNotEqualsJsonFile()

 *protected* assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = null) 

Asserts that two JSON files are not equal.

 * `param string` $expectedFile
 * `param string` $actualFile
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L828)

#### assertJsonStringEqualsJsonFile()

 *protected* assertJsonStringEqualsJsonFile($expectedFile, $actualJson, $message = null) 

Asserts that the generated JSON encoded object and the content of the given file are equal.

 * `param string` $expectedFile
 * `param string` $actualJson
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L840)

#### assertJsonStringEqualsJsonString()

 *protected* assertJsonStringEqualsJsonString($expectedJson, $actualJson, $message = null) 

Asserts that two given JSON encoded objects or arrays are equal.

 * `param string` $expectedJson
 * `param string` $actualJson
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L852)

#### assertJsonStringNotEqualsJsonFile()

 *protected* assertJsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = null) 

Asserts that the generated JSON encoded object and the content of the given file are not equal.

 * `param string` $expectedFile
 * `param string` $actualJson
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L864)

#### assertJsonStringNotEqualsJsonString()

 *protected* assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = null) 

Asserts that two given JSON encoded objects or arrays are not equal.

 * `param string` $expectedJson
 * `param string` $actualJson
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L876)

#### assertLessOrEquals()

 *protected* assertLessOrEquals($expected, $actual, $message = null) 

Asserts that a value is smaller than or equal to another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L79)

#### assertLessThan()

 *protected* assertLessThan($expected, $actual, $message = null) 

Asserts that a value is smaller than another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L888)

#### assertLessThanOrEqual()

 *protected* assertLessThanOrEqual($expected, $actual, $message = null) 

Asserts that a value is smaller than or equal to another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L900)

#### assertMatchesRegularExpression()

 *protected* assertMatchesRegularExpression($pattern, $string, $message = null) 

Asserts that a string matches a given regular expression.

 * `param string` $pattern
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L912)

#### assertNan()

 *protected* assertNan($actual, $message = null) 

Asserts that a variable is nan.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L923)

#### assertNot()

 *protected* assertNot($arguments) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L33)

#### assertNotContains()

 *protected* assertNotContains($needle, $haystack, $message = null) 

Asserts that a haystack does not contain a needle.

 * `param` $needle
 * `param` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L935)

#### assertNotContainsEquals()

 *protected* assertNotContainsEquals($needle, $haystack, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L940)

#### assertNotContainsOnly()

 *protected* assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = null) 

Asserts that a haystack does not contain only values of a given type.

 * `param string` $type
 * `param` $haystack
 * `param bool|null` $isNativeType
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L953)

#### assertNotCount()

 *protected* assertNotCount($expectedCount, $haystack, $message = null) 

Asserts the number of elements of an array, Countable or Traversable.

 * `param int` $expectedCount
 * `param Countable|iterable` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L965)

#### assertNotEmpty()

 *protected* assertNotEmpty($actual, $message = null) 

Asserts that a variable is not empty.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L976)

#### assertNotEquals()

 *protected* assertNotEquals($expected, $actual, $message = null) 

Asserts that two variables are not equal.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L988)

#### assertNotEqualsCanonicalizing()

 *protected* assertNotEqualsCanonicalizing($expected, $actual, $message = null) 

Asserts that two variables are not equal (canonicalizing).

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1000)

#### assertNotEqualsIgnoringCase()

 *protected* assertNotEqualsIgnoringCase($expected, $actual, $message = null) 

Asserts that two variables are not equal (ignoring case).

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1012)

#### assertNotEqualsWithDelta()

 *protected* assertNotEqualsWithDelta($expected, $actual, $delta, $message = null) 

Asserts that two variables are not equal (with delta).

 * `param` $expected
 * `param` $actual
 * `param float` $delta
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1025)

#### assertNotFalse()

 *protected* assertNotFalse($condition, $message = null) 

Asserts that a condition is not false.

 * `param` $condition
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1036)

#### assertNotInstanceOf()

 *protected* assertNotInstanceOf($expected, $actual, $message = null) 

Asserts that a variable is not of a given type.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1048)

#### assertNotNull()

 *protected* assertNotNull($actual, $message = null) 

Asserts that a variable is not null.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1059)

#### assertNotRegExp()

 *protected* assertNotRegExp($pattern, $string, $message = null) 

Asserts that a string does not match a given regular expression.

 * `param string` $pattern
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L91)

#### assertNotSame()

 *protected* assertNotSame($expected, $actual, $message = null) 

Asserts that two variables do not have the same type and value.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1071)

#### assertNotSameSize()

 *protected* assertNotSameSize($expected, $actual, $message = null) 

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is not the same.

 * `param Countable|iterable` $expected
 * `param Countable|iterable` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1083)

#### assertNotTrue()

 *protected* assertNotTrue($condition, $message = null) 

Asserts that a condition is not true.

 * `param` $condition
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1094)

#### assertNull()

 *protected* assertNull($actual, $message = null) 

Asserts that a variable is null.

 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1105)

#### assertObjectHasAttribute()

 *protected* assertObjectHasAttribute($attributeName, $object, $message = null) 

Asserts that an object has a specified attribute.

 * `param string` $attributeName
 * `param object` $object
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1117)

#### assertObjectNotHasAttribute()

 *protected* assertObjectNotHasAttribute($attributeName, $object, $message = null) 

Asserts that an object does not have a specified attribute.

 * `param string` $attributeName
 * `param object` $object
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1129)

#### assertRegExp()

 *protected* assertRegExp($pattern, $string, $message = null) 

Asserts that a string matches a given regular expression.

 * `param string` $pattern
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L103)

#### assertSame()

 *protected* assertSame($expected, $actual, $message = null) 

Asserts that two variables have the same type and value.

 * `param` $expected
 * `param` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1141)

#### assertSameSize()

 *protected* assertSameSize($expected, $actual, $message = null) 

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is the same.

 * `param Countable|iterable` $expected
 * `param Countable|iterable` $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1153)

#### assertStringContainsString()

 *protected* assertStringContainsString($needle, $haystack, $message = null) 

 * `param string` $needle
 * `param string` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1163)

#### assertStringContainsStringIgnoringCase()

 *protected* assertStringContainsStringIgnoringCase($needle, $haystack, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1168)

#### assertStringEndsNotWith()

 *protected* assertStringEndsNotWith($suffix, $string, $message = null) 

Asserts that a string ends not with a given suffix.

 * `param string` $suffix
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1180)

#### assertStringEndsWith()

 *protected* assertStringEndsWith($suffix, $string, $message = null) 

Asserts that a string ends with a given suffix.

 * `param string` $suffix
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1192)

#### assertStringEqualsFile()

 *protected* assertStringEqualsFile($expectedFile, $actualString, $message = null) 

Asserts that the contents of a string is equal to the contents of a file.

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1204)

#### assertStringEqualsFileCanonicalizing()

 *protected* assertStringEqualsFileCanonicalizing($expectedFile, $actualString, $message = null) 

Asserts that the contents of a string is equal to the contents of a file (canonicalizing).

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1216)

#### assertStringEqualsFileIgnoringCase()

 *protected* assertStringEqualsFileIgnoringCase($expectedFile, $actualString, $message = null) 

Asserts that the contents of a string is equal to the contents of a file (ignoring case).

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1228)

#### assertStringMatchesFormat()

 *protected* assertStringMatchesFormat($format, $string, $message = null) 

Asserts that a string matches a given format string.

 * `param string` $format
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1240)

#### assertStringMatchesFormatFile()

 *protected* assertStringMatchesFormatFile($formatFile, $string, $message = null) 

Asserts that a string matches a given format file.

 * `param string` $formatFile
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1252)

#### assertStringNotContainsString()

 *protected* assertStringNotContainsString($needle, $haystack, $message = null) 

 * `param string` $needle
 * `param string` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1262)

#### assertStringNotContainsStringIgnoringCase()

 *protected* assertStringNotContainsStringIgnoringCase($needle, $haystack, $message = null) 

 * `param string` $needle
 * `param string` $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1272)

#### assertStringNotEqualsFile()

 *protected* assertStringNotEqualsFile($expectedFile, $actualString, $message = null) 

Asserts that the contents of a string is not equal to the contents of a file.

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1284)

#### assertStringNotEqualsFileCanonicalizing()

 *protected* assertStringNotEqualsFileCanonicalizing($expectedFile, $actualString, $message = null) 

Asserts that the contents of a string is not equal to the contents of a file (canonicalizing).
 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1295)

#### assertStringNotEqualsFileIgnoringCase()

 *protected* assertStringNotEqualsFileIgnoringCase($expectedFile, $actualString, $message = null) 

Asserts that the contents of a string is not equal to the contents of a file (ignoring case).

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1307)

#### assertStringNotMatchesFormat()

 *protected* assertStringNotMatchesFormat($format, $string, $message = null) 

Asserts that a string does not match a given format string.

 * `param string` $format
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1319)

#### assertStringNotMatchesFormatFile()

 *protected* assertStringNotMatchesFormatFile($formatFile, $string, $message = null) 

Asserts that a string does not match a given format string.

 * `param string` $formatFile
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1331)

#### assertStringStartsNotWith()

 *protected* assertStringStartsNotWith($prefix, $string, $message = null) 

Asserts that a string starts not with a given prefix.

 * `param string` $prefix
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1343)

#### assertStringStartsWith()

 *protected* assertStringStartsWith($prefix, $string, $message = null) 

Asserts that a string starts with a given prefix.

 * `param string` $prefix
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1355)

#### assertThat()

 *protected* assertThat($value, $constraint, $message = null) 

Evaluates a PHPUnit\Framework\Constraint matcher object.

 * `param` $value
 * `param Constraint` $constraint
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1367)

#### assertThatItsNot()

 *protected* assertThatItsNot($value, $constraint, $message = null) 

Evaluates a PHPUnit\Framework\Constraint matcher object.

 * `param` $value
 * `param Constraint` $constraint
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L115)

#### assertTrue()

 *protected* assertTrue($condition, $message = null) 

Asserts that a condition is true.

 * `param` $condition
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1378)

#### assertXmlFileEqualsXmlFile()

 *protected* assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = null) 

Asserts that two XML files are equal.

 * `param string` $expectedFile
 * `param string` $actualFile
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1390)

#### assertXmlFileNotEqualsXmlFile()

 *protected* assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = null) 

Asserts that two XML files are not equal.

 * `param string` $expectedFile
 * `param string` $actualFile
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1402)

#### assertXmlStringEqualsXmlFile()

 *protected* assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = null) 

Asserts that two XML documents are equal.

 * `param string` $expectedFile
 * `param DOMDocument|string` $actualXml
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1414)

#### assertXmlStringEqualsXmlString()

 *protected* assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = null) 

Asserts that two XML documents are equal.

 * `param DOMDocument|string` $expectedXml
 * `param DOMDocument|string` $actualXml
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1426)

#### assertXmlStringNotEqualsXmlFile()

 *protected* assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = null) 

Asserts that two XML documents are not equal.

 * `param string` $expectedFile
 * `param DOMDocument|string` $actualXml
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1438)

#### assertXmlStringNotEqualsXmlString()

 *protected* assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = null) 

Asserts that two XML documents are not equal.

 * `param DOMDocument|string` $expectedXml
 * `param DOMDocument|string` $actualXml
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1450)

#### debug()

 *protected* debug($message) 

Print debug message to the screen.

 * `param` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L273)

#### debugSection()

 *protected* debugSection($title, $message) 

Print debug message with a title

 * `param` $title
 * `param` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L284)

#### fail()

 *protected* fail($message = null) 

Fails a test with the given message.

 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1460)

#### getModule()

 *protected* getModule($name) 

Get another module by its name:

{% highlight php %}

<?php
$this->getModule('WebDriver')->_findElements('.items');

{% endhighlight %}

 * `param` $name
 * `return` Module
 * `throws` ModuleException

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L337)

#### getModules()

 *protected* getModules() 

Get all enabled modules
 * `return` array

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L320)

#### hasModule()

 *protected* hasModule($name) 

Checks that module is enabled.

 * `param` $name
 * `return` bool

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L310)

#### markTestIncomplete()

 *protected* markTestIncomplete($message = null) 

Mark the test as incomplete.

 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1470)

#### markTestSkipped()

 *protected* markTestSkipped($message = null) 

Mark the test as skipped.

 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L1480)

#### onReconfigure()

 *protected* onReconfigure() 

HOOK to be executed when config changes with `_reconfigure`.

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L130)

#### scalarizeArray()

 *protected* scalarizeArray($array) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L362)

#### shortenMessage()

 *protected* shortenMessage($message, $chars = null) 

Short text message to an amount of chars

 * `param` $message
 * `param` $chars
 * `return` string

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L299)

#### validateConfig()

 *protected* validateConfig() 

Validates current config for required fields and required packages.
 * `throws` Exception\ModuleConfigException
 * `throws` ModuleException

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L149)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php">Help us to improve documentation. Edit module reference</a></div>
