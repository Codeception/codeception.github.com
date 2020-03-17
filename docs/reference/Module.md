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

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L6)

#### assertArrayHasKey()

 *protected* assertArrayHasKey($key, $actual, $description = null) 

 * `param` $key
 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L369)

#### assertArrayNotHasKey()

 *protected* assertArrayNotHasKey($key, $actual, $description = null) 

 * `param` $key
 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L379)

#### assertArraySubset()

 *protected* assertArraySubset($subset, $array, $strict = null, $message = null) 

Checks that array contains subset.

 * `param array`  $subset
 * `param array`  $array
 * `param bool`   $strict
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L392)

#### assertContains()

 *protected* assertContains($needle, $haystack, $message = null) 

Checks that haystack contains needle

 * `param`        $needle
 * `param`        $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L133)

#### assertCount()

 *protected* assertCount($expectedCount, $actual, $description = null) 

 * `param` $expectedCount
 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L402)

#### assertEmpty()

 *protected* assertEmpty($actual, $message = null) 

Checks that variable is empty.

 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L205)

#### assertEquals()

 *protected* assertEquals($expected, $actual, $message = null, $delta = null) 

Checks that two variables are equal.

 * `param`        $expected
 * `param`        $actual
 * `param string` $message
 * `param float`  $delta

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L35)

#### assertEqualsCanonicalizing()

 *protected* assertEqualsCanonicalizing($expected, $actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L583)

#### assertEqualsIgnoringCase()

 *protected* assertEqualsIgnoringCase($expected, $actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L593)

#### assertEqualsWithDelta()

 *protected* assertEqualsWithDelta($expected, $actual, $delta, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L603)

#### assertFalse()

 *protected* assertFalse($condition, $message = null) 

Checks that condition is negative.

 * `param`        $condition
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L271)

#### assertFileExists()

 *protected* assertFileExists($filename, $message = null) 

Checks if file exists

 * `param string` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L318)

#### assertFileNotExists()

 *protected* assertFileNotExists($filename, $message = null) 

Checks if file doesn't exist

 * `param string` $filename
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L330)

#### assertGreaterOrEquals()

 *protected* assertGreaterOrEquals($expected, $actual, $description = null) 

 * `param` $expected
 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L340)

#### assertGreaterThan()

 *protected* assertGreaterThan($expected, $actual, $message = null) 

Checks that actual is greater than expected

 * `param`        $expected
 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L84)

#### assertGreaterThanOrEqual()

 *protected* assertGreaterThanOrEqual($expected, $actual, $message = null) 

Checks that actual is greater or equal than expected

 * `param`        $expected
 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L96)

#### assertInstanceOf()

 *protected* assertInstanceOf($class, $actual, $description = null) 

 * `param` $class
 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L412)

#### assertInternalType()

 *protected* assertInternalType($type, $actual, $description = null) 

 * `param` $type
 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L432)

#### assertIsArray()

 *protected* assertIsArray($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L483)

#### assertIsBool()

 *protected* assertIsBool($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L488)

#### assertIsCallable()

 *protected* assertIsCallable($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L528)

#### assertIsEmpty()

 *protected* assertIsEmpty($actual, $description = null) 

 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L359)

#### assertIsFloat()

 *protected* assertIsFloat($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L493)

#### assertIsInt()

 *protected* assertIsInt($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L498)

#### assertIsNotArray()

 *protected* assertIsNotArray($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L533)

#### assertIsNotBool()

 *protected* assertIsNotBool($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L538)

#### assertIsNotCallable()

 *protected* assertIsNotCallable($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L578)

#### assertIsNotFloat()

 *protected* assertIsNotFloat($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L543)

#### assertIsNotInt()

 *protected* assertIsNotInt($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L548)

#### assertIsNotNumeric()

 *protected* assertIsNotNumeric($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L553)

#### assertIsNotObject()

 *protected* assertIsNotObject($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L558)

#### assertIsNotResource()

 *protected* assertIsNotResource($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L563)

#### assertIsNotScalar()

 *protected* assertIsNotScalar($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L573)

#### assertIsNotString()

 *protected* assertIsNotString($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L568)

#### assertIsNumeric()

 *protected* assertIsNumeric($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L503)

#### assertIsObject()

 *protected* assertIsObject($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L508)

#### assertIsResource()

 *protected* assertIsResource($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L513)

#### assertIsScalar()

 *protected* assertIsScalar($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L523)

#### assertIsString()

 *protected* assertIsString($actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L518)

#### assertLessOrEquals()

 *protected* assertLessOrEquals($expected, $actual, $description = null) 

 * `param` $expected
 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L350)

#### assertLessThan()

 *protected* assertLessThan($expected, $actual, $message = null) 

Checks that actual is less than expected

 * `param`        $expected
 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L108)

#### assertLessThanOrEqual()

 *protected* assertLessThanOrEqual($expected, $actual, $message = null) 

Checks that actual is less or equal than expected

 * `param`        $expected
 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L120)

#### assertNot()

 *protected* assertNot($arguments) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L22)

#### assertNotContains()

 *protected* assertNotContains($needle, $haystack, $message = null) 

Checks that haystack doesn't contain needle.

 * `param`        $needle
 * `param`        $haystack
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L145)

#### assertNotEmpty()

 *protected* assertNotEmpty($actual, $message = null) 

Checks that variable is not empty.

 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L216)

#### assertNotEquals()

 *protected* assertNotEquals($expected, $actual, $message = null, $delta = null) 

Checks that two variables are not equal

 * `param`        $expected
 * `param`        $actual
 * `param string` $message
 * `param float`  $delta

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L48)

#### assertNotEqualsCanonicalizing()

 *protected* assertNotEqualsCanonicalizing($expected, $actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L588)

#### assertNotEqualsIgnoringCase()

 *protected* assertNotEqualsIgnoringCase($expected, $actual, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L598)

#### assertNotEqualsWithDelta()

 *protected* assertNotEqualsWithDelta($expected, $actual, $delta, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L608)

#### assertNotFalse()

 *protected* assertNotFalse($condition, $message = null) 

Checks that the condition is NOT false (everything but false)

 * `param`        $condition
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L282)

#### assertNotInstanceOf()

 *protected* assertNotInstanceOf($class, $actual, $description = null) 

 * `param` $class
 * `param` $actual
 * `param` $description

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L422)

#### assertNotNull()

 *protected* assertNotNull($actual, $message = null) 

Checks that variable is not NULL

 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L238)

#### assertNotRegExp()

 *protected* assertNotRegExp($pattern, $string, $message = null) 

Checks that string not match with pattern

 * `param string` $pattern
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L169)

#### assertNotSame()

 *protected* assertNotSame($expected, $actual, $message = null) 

Checks that two variables are not same

 * `param`        $expected
 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L72)

#### assertNotTrue()

 *protected* assertNotTrue($condition, $message = null) 

Checks that the condition is NOT true (everything but true)

 * `param`        $condition
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L260)

#### assertNull()

 *protected* assertNull($actual, $message = null) 

Checks that variable is NULL

 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L227)

#### assertRegExp()

 *protected* assertRegExp($pattern, $string, $message = null) 

Checks that string match with pattern

 * `param string` $pattern
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L157)

#### assertSame()

 *protected* assertSame($expected, $actual, $message = null) 

Checks that two variables are same

 * `param`        $expected
 * `param`        $actual
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L60)

#### assertStringContainsString()

 *protected* assertStringContainsString($needle, $haystack, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L447)

#### assertStringContainsStringIgnoringCase()

 *protected* assertStringContainsStringIgnoringCase($needle, $haystack, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L457)

#### assertStringEndsNotWith()

 *protected* assertStringEndsNotWith($suffix, $string, $message = null) 
 * `since` 1.1.0 of module-asserts

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L478)

#### assertStringEndsWith()

 *protected* assertStringEndsWith($suffix, $string, $message = null) 
 * `since` 1.1.0 of module-asserts

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L470)

#### assertStringNotContainsString()

 *protected* assertStringNotContainsString($needle, $haystack, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L452)

#### assertStringNotContainsStringIgnoringCase()

 *protected* assertStringNotContainsStringIgnoringCase($needle, $haystack, $message = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L462)

#### assertStringStartsNotWith()

 *protected* assertStringStartsNotWith($prefix, $string, $message = null) 

Checks that a string doesn't start with the given prefix.

 * `param string` $prefix
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L193)

#### assertStringStartsWith()

 *protected* assertStringStartsWith($prefix, $string, $message = null) 

Checks that a string starts with the given prefix.

 * `param string` $prefix
 * `param string` $string
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L181)

#### assertThat()

 *protected* assertThat($haystack, $constraint, $message = null) 


 * `param`        $haystack
 * `param`        $constraint
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L293)

#### assertThatItsNot()

 *protected* assertThatItsNot($haystack, $constraint, $message = null) 

Checks that haystack doesn't attend

 * `param`        $haystack
 * `param`        $constraint
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L305)

#### assertTrue()

 *protected* assertTrue($condition, $message = null) 

Checks that condition is positive.

 * `param`        $condition
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L249)

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

 *protected* fail($message) 

Fails the test with message.

 * `param` $message

[See source](https://github.com/Codeception/Codeception/blob/4.1/src/Codeception/Module.php#L442)

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
