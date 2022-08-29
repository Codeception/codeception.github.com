---
layout: doc
title: Asserts - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Asserts/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-asserts/tree/master/src/Codeception/Module/Asserts.php"><strong>source</strong></a></div>

# Asserts
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-asserts

{% endhighlight %}

Alternatively, you can enable `Asserts` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



Special module for using asserts in your tests.

### Actions

#### assertArrayHasKey
 
Asserts that an array has a specified key.

 * `param int|string` $key
 * `param array|ArrayAccess` $array


#### assertArrayNotHasKey
 
Asserts that an array does not have a specified key.

 * `param int|string` $key
 * `param array|ArrayAccess` $array


#### assertClassHasAttribute
 
Asserts that a class has a specified attribute.


#### assertClassHasStaticAttribute
 
Asserts that a class has a specified static attribute.


#### assertClassNotHasAttribute
 
Asserts that a class does not have a specified attribute.


#### assertClassNotHasStaticAttribute
 
Asserts that a class does not have a specified static attribute.


#### assertContains
 
Asserts that a haystack contains a needle.

 * `param mixed` $needle


#### assertContainsEquals
 
 * `param mixed` $needle


#### assertContainsOnly
 
Asserts that a haystack contains only values of a given type.


#### assertContainsOnlyInstancesOf
 
Asserts that a haystack contains only instances of a given class name.


#### assertCount
 
Asserts the number of elements of an array, Countable or Traversable.

 * `param Countable|iterable` $haystack


#### assertDirectoryDoesNotExist
 
Asserts that a directory does not exist.


#### assertDirectoryExists
 
Asserts that a directory exists.


#### assertDirectoryIsNotReadable
 
Asserts that a directory exists and is not readable.


#### assertDirectoryIsNotWritable
 
Asserts that a directory exists and is not writable.


#### assertDirectoryIsReadable
 
Asserts that a directory exists and is readable.


#### assertDirectoryIsWritable
 
Asserts that a directory exists and is writable.


#### assertDoesNotMatchRegularExpression
 
Asserts that a string does not match a given regular expression.


#### assertEmpty
 
Asserts that a variable is empty.

 * `param mixed` $actual


#### assertEquals
 
Asserts that two variables are equal.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertEqualsCanonicalizing
 
Asserts that two variables are equal (canonicalizing).

 * `param mixed` $expected
 * `param mixed` $actual


#### assertEqualsIgnoringCase
 
Asserts that two variables are equal (ignoring case).

 * `param mixed` $expected
 * `param mixed` $actual


#### assertEqualsWithDelta
 
Asserts that two variables are equal (with delta).

 * `param mixed` $expected
 * `param mixed` $actual


#### assertFalse
 
Asserts that a condition is false.

 * `param mixed` $condition


#### assertFileDoesNotExist
 
Asserts that a file does not exist.


#### assertFileEquals
 
Asserts that the contents of one file is equal to the contents of another file.


#### assertFileEqualsCanonicalizing
 
Asserts that the contents of one file is equal to the contents of another file (canonicalizing).


#### assertFileEqualsIgnoringCase
 
Asserts that the contents of one file is equal to the contents of another file (ignoring case).


#### assertFileExists
 
Asserts that a file exists.


#### assertFileIsNotReadable
 
Asserts that a file exists and is not readable.


#### assertFileIsNotWritable
 
Asserts that a file exists and is not writable.


#### assertFileIsReadable
 
Asserts that a file exists and is readable.


#### assertFileIsWritable
 
Asserts that a file exists and is writable.


#### assertFileNotEquals
 
Asserts that the contents of one file is not equal to the contents of another file.


#### assertFileNotEqualsCanonicalizing
 
Asserts that the contents of one file is not equal to the contents of another file (canonicalizing).


#### assertFileNotEqualsIgnoringCase
 
Asserts that the contents of one file is not equal to the contents of another file (ignoring case).


#### assertFileNotExists
 
Asserts that a file does not exist.


#### assertFinite
 
Asserts that a variable is finite.

 * `param mixed` $actual


#### assertGreaterOrEquals
 
Asserts that a value is greater than or equal to another value.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertGreaterThan
 
Asserts that a value is greater than another value.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertGreaterThanOrEqual
 
Asserts that a value is greater than or equal to another value.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertInfinite
 
Asserts that a variable is infinite.

 * `param mixed` $actual


#### assertInstanceOf
 
Asserts that a variable is of a given type.

 * `param mixed` $actual


#### assertIsArray
 
Asserts that a variable is of type array.

 * `param mixed` $actual


#### assertIsBool
 
Asserts that a variable is of type bool.

 * `param mixed` $actual


#### assertIsCallable
 
Asserts that a variable is of type callable.

 * `param mixed` $actual


#### assertIsClosedResource
 
Asserts that a variable is of type resource and is closed.

 * `param mixed` $actual


#### assertIsEmpty
 
Asserts that a variable is empty.

 * `param mixed` $actual


#### assertIsFloat
 
Asserts that a variable is of type float.

 * `param mixed` $actual


#### assertIsInt
 
Asserts that a variable is of type int.

 * `param mixed` $actual


#### assertIsIterable
 
Asserts that a variable is of type iterable.

 * `param mixed` $actual


#### assertIsNotArray
 
Asserts that a variable is not of type array.

 * `param mixed` $actual


#### assertIsNotBool
 
Asserts that a variable is not of type bool.

 * `param mixed` $actual


#### assertIsNotCallable
 
Asserts that a variable is not of type callable.

 * `param mixed` $actual


#### assertIsNotClosedResource
 
Asserts that a variable is not of type resource.

 * `param mixed` $actual


#### assertIsNotFloat
 
Asserts that a variable is not of type float.

 * `param mixed` $actual


#### assertIsNotInt
 
Asserts that a variable is not of type int.

 * `param mixed` $actual


#### assertIsNotIterable
 
Asserts that a variable is not of type iterable.

 * `param mixed` $actual


#### assertIsNotNumeric
 
Asserts that a variable is not of type numeric.

 * `param mixed` $actual


#### assertIsNotObject
 
Asserts that a variable is not of type object.

 * `param mixed` $actual


#### assertIsNotReadable
 
Asserts that a file/dir exists and is not readable.


#### assertIsNotResource
 
Asserts that a variable is not of type resource.

 * `param mixed` $actual


#### assertIsNotScalar
 
Asserts that a variable is not of type scalar.

 * `param mixed` $actual


#### assertIsNotString
 
Asserts that a variable is not of type string.

 * `param mixed` $actual


#### assertIsNotWritable
 
Asserts that a file/dir exists and is not writable.


#### assertIsNumeric
 
Asserts that a variable is of type numeric.

 * `param mixed` $actual


#### assertIsObject
 
Asserts that a variable is of type object.

 * `param mixed` $actual


#### assertIsReadable
 
Asserts that a file/dir is readable.


#### assertIsResource
 
Asserts that a variable is of type resource.

 * `param mixed` $actual


#### assertIsScalar
 
Asserts that a variable is of type scalar.

 * `param mixed` $actual


#### assertIsString
 
Asserts that a variable is of type string.

 * `param mixed` $actual


#### assertIsWritable
 
Asserts that a file/dir exists and is writable.


#### assertJson
 
Asserts that a string is a valid JSON string.


#### assertJsonFileEqualsJsonFile
 
Asserts that two JSON files are equal.


#### assertJsonFileNotEqualsJsonFile
 
Asserts that two JSON files are not equal.


#### assertJsonStringEqualsJsonFile
 
Asserts that the generated JSON encoded object and the content of the given file are equal.


#### assertJsonStringEqualsJsonString
 
Asserts that two given JSON encoded objects or arrays are equal.


#### assertJsonStringNotEqualsJsonFile
 
Asserts that the generated JSON encoded object and the content of the given file are not equal.


#### assertJsonStringNotEqualsJsonString
 
Asserts that two given JSON encoded objects or arrays are not equal.


#### assertLessOrEquals
 
Asserts that a value is smaller than or equal to another value.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertLessThan
 
Asserts that a value is smaller than another value.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertLessThanOrEqual
 
Asserts that a value is smaller than or equal to another value.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertMatchesRegularExpression
 
Asserts that a string matches a given regular expression.


#### assertNan
 
Asserts that a variable is nan.

 * `param mixed` $actual


#### assertNotContains
 
Asserts that a haystack does not contain a needle.

 * `param mixed` $needle


#### assertNotContainsEquals
__not documented__


#### assertNotContainsOnly
 
Asserts that a haystack does not contain only values of a given type.


#### assertNotCount
 
Asserts the number of elements of an array, Countable or Traversable.

 * `param Countable|iterable` $haystack


#### assertNotEmpty
 
Asserts that a variable is not empty.

 * `param mixed` $actual


#### assertNotEquals
 
Asserts that two variables are not equal.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertNotEqualsCanonicalizing
 
Asserts that two variables are not equal (canonicalizing).

 * `param mixed` $expected
 * `param mixed` $actual


#### assertNotEqualsIgnoringCase
 
Asserts that two variables are not equal (ignoring case).

 * `param mixed` $expected
 * `param mixed` $actual


#### assertNotEqualsWithDelta
 
Asserts that two variables are not equal (with delta).

 * `param mixed` $expected
 * `param mixed` $actual


#### assertNotFalse
 
Asserts that a condition is not false.

 * `param mixed` $condition


#### assertNotInstanceOf
 
Asserts that a variable is not of a given type.

 * `param mixed` $actual


#### assertNotNull
 
Asserts that a variable is not null.

 * `param mixed` $actual


#### assertNotRegExp
 
Asserts that a string does not match a given regular expression.


#### assertNotSame
 
Asserts that two variables do not have the same type and value.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertNotSameSize
 
Assert that the size of two arrays (or `Countable` or `Traversable` objects) is not the same.

 * `param Countable|iterable` $expected
 * `param Countable|iterable` $actual


#### assertNotTrue
 
Asserts that a condition is not true.

 * `param mixed` $condition


#### assertNull
 
Asserts that a variable is null.

 * `param mixed` $actual


#### assertObjectHasAttribute
 
Asserts that an object has a specified attribute.


#### assertObjectNotHasAttribute
 
Asserts that an object does not have a specified attribute.


#### assertRegExp
 
Asserts that a string matches a given regular expression.


#### assertSame
 
Asserts that two variables have the same type and value.

 * `param mixed` $expected
 * `param mixed` $actual


#### assertSameSize
 
Assert that the size of two arrays (or `Countable` or `Traversable` objects) is the same.

 * `param Countable|iterable` $expected
 * `param Countable|iterable` $actual


#### assertStringContainsString
__not documented__


#### assertStringContainsStringIgnoringCase
__not documented__


#### assertStringEndsNotWith
 
Asserts that a string ends not with a given suffix.


#### assertStringEndsWith
 
Asserts that a string ends with a given suffix.


#### assertStringEqualsFile
 
Asserts that the contents of a string is equal to the contents of a file.


#### assertStringEqualsFileCanonicalizing
 
Asserts that the contents of a string is equal to the contents of a file (canonicalizing).


#### assertStringEqualsFileIgnoringCase
 
Asserts that the contents of a string is equal to the contents of a file (ignoring case).


#### assertStringMatchesFormat
 
Asserts that a string matches a given format string.


#### assertStringMatchesFormatFile
 
Asserts that a string matches a given format file.


#### assertStringNotContainsString
__not documented__


#### assertStringNotContainsStringIgnoringCase
__not documented__


#### assertStringNotEqualsFile
 
Asserts that the contents of a string is not equal to the contents of a file.


#### assertStringNotEqualsFileCanonicalizing
 
Asserts that the contents of a string is not equal to the contents of a file (canonicalizing).


#### assertStringNotEqualsFileIgnoringCase
 
Asserts that the contents of a string is not equal to the contents of a file (ignoring case).


#### assertStringNotMatchesFormat
 
Asserts that a string does not match a given format string.


#### assertStringNotMatchesFormatFile
 
Asserts that a string does not match a given format string.


#### assertStringStartsNotWith
 
Asserts that a string starts not with a given prefix.


#### assertStringStartsWith
 
Asserts that a string starts with a given prefix.


#### assertThat
 
Evaluates a PHPUnit\Framework\Constraint matcher object.

 * `param mixed` $value


#### assertThatItsNot
 
Evaluates a PHPUnit\Framework\Constraint matcher object.

 * `param mixed` $value


#### assertTrue
 
Asserts that a condition is true.

 * `param mixed` $condition


#### assertXmlFileEqualsXmlFile
 
Asserts that two XML files are equal.


#### assertXmlFileNotEqualsXmlFile
 
Asserts that two XML files are not equal.


#### assertXmlStringEqualsXmlFile
 
Asserts that two XML documents are equal.

 * `param DOMDocument|string` $actualXml


#### assertXmlStringEqualsXmlString
 
Asserts that two XML documents are equal.

 * `param DOMDocument|string` $expectedXml
 * `param DOMDocument|string` $actualXml


#### assertXmlStringNotEqualsXmlFile
 
Asserts that two XML documents are not equal.

 * `param DOMDocument|string` $actualXml


#### assertXmlStringNotEqualsXmlString
 
Asserts that two XML documents are not equal.

 * `param DOMDocument|string` $expectedXml
 * `param DOMDocument|string` $actualXml


#### expectThrowable
 
Handles and checks throwables (Exceptions/Errors) called inside the callback function.
Either throwable class name or throwable instance should be provided.

{% highlight php %}

<?php
$I->expectThrowable(MyThrowable::class, function() {
    $this->doSomethingBad();
});

$I->expectThrowable(new MyException(), function() {
    $this->doSomethingBad();
});

{% endhighlight %}
If you want to check message or throwable code, you can pass them with throwable instance:
{% highlight php %}

<?php
// will check that throwable MyError is thrown with "Don't do bad things" message
$I->expectThrowable(new MyError("Don't do bad things"), function() {
    $this->doSomethingBad();
});

{% endhighlight %}

 * `param \Throwable|string` $throwable


#### fail
 
Fails a test with the given message.


#### markTestIncomplete
 
Mark the test as incomplete.


#### markTestSkipped
 
Mark the test as skipped.

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-asserts/tree/master/src/Codeception/Module/Asserts.php">Help us to improve documentation. Edit module reference</a></div>
