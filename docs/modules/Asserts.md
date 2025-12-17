---
layout: doc
title: Asserts - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Asserts/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-asserts/tree/master/src/Codeception/Module/Asserts.php"><strong>source</strong></a></div>

# Asserts
### Installation

{% highlight yaml %}
composer require --dev codeception/module-asserts

{% endhighlight %}

### Description



Special module for using asserts in your tests.

### Actions

#### assertArrayHasKey

* `param string|int` $key
* `param \ArrayAccess|array` $array
* `param string` $message
* `return void`

Asserts that an array has a specified key.


#### assertArrayNotHasKey

* `param string|int` $key
* `param \ArrayAccess|array` $array
* `param string` $message
* `return void`

Asserts that an array does not have a specified key.


#### assertClassHasAttribute

* `param string` $attributeName
* `param class-string` $className
* `param string` $message
* `return void`

Asserts that a class has a specified attribute.


#### assertClassHasStaticAttribute

* `param string` $attributeName
* `param class-string` $className
* `param string` $message
* `return void`

Asserts that a class has a specified static attribute.


#### assertClassNotHasAttribute

* `param string` $attributeName
* `param class-string` $className
* `param string` $message
* `return void`

Asserts that a class does not have a specified attribute.


#### assertClassNotHasStaticAttribute

* `param string` $attributeName
* `param class-string` $className
* `param string` $message
* `return void`

Asserts that a class does not have a specified static attribute.


#### assertContains

* `param mixed` $needle
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts that a haystack contains a needle.


#### assertContainsEquals

* `param mixed` $needle
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`


#### assertContainsOnly

* `param string` $type
* `param iterable<mixed>` $haystack
* `param ?bool` $isNativeType
* `param string` $message
* `return void`

Asserts that a haystack contains only values of a given type.


#### assertContainsOnlyInstancesOf

* `param class-string` $className
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts that a haystack contains only instances of a given class name.


#### assertCount

* `param int` $expectedCount
* `param \Countable|iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts the number of elements of an array, Countable or Traversable.


#### assertDirectoryDoesNotExist

* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory does not exist.


#### assertDirectoryExists

* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists.


#### assertDirectoryIsNotReadable

* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists and is not readable.


#### assertDirectoryIsNotWritable

* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists and is not writable.


#### assertDirectoryIsReadable

* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists and is readable.


#### assertDirectoryIsWritable

* `param string` $directory
* `param string` $message
* `return void`

Asserts that a directory exists and is writable.


#### assertDoesNotMatchRegularExpression

* `param string` $pattern
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string does not match a given regular expression.


#### assertEmpty

* `phpstan-assert` empty $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is empty.


#### assertEquals

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are equal.


#### assertEqualsCanonicalizing

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are equal (canonicalizing).


#### assertEqualsIgnoringCase

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are equal (ignoring case).


#### assertEqualsWithDelta

* `param mixed` $expected
* `param mixed` $actual
* `param float` $delta
* `param string` $message
* `return void`

Asserts that two variables are equal (with delta).


#### assertFalse

* `phpstan-assert` false $condition
* `param mixed` $condition
* `param string` $message
* `return void`

Asserts that a condition is false.


#### assertFileDoesNotExist

* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file does not exist.


#### assertFileEquals

* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is equal to the contents of another file.


#### assertFileEqualsCanonicalizing

* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is equal to the contents of another file (canonicalizing).


#### assertFileEqualsIgnoringCase

* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is equal to the contents of another file (ignoring case).


#### assertFileExists

* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file exists.


#### assertFileIsNotReadable

* `param string` $file
* `param string` $message
* `return void`

Asserts that a file exists and is not readable.


#### assertFileIsNotWritable

* `param string` $file
* `param string` $message
* `return void`

Asserts that a file exists and is not writable.


#### assertFileIsReadable

* `param string` $file
* `param string` $message
* `return void`

Asserts that a file exists and is readable.


#### assertFileIsWritable

* `param string` $file
* `param string` $message
* `return void`

Asserts that a file exists and is writable.


#### assertFileNotEquals

* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is not equal to the contents of another file.


#### assertFileNotEqualsCanonicalizing

* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is not equal to the contents of another file (canonicalizing).


#### assertFileNotEqualsIgnoringCase

* `param string` $expected
* `param string` $actual
* `param string` $message
* `return void`

Asserts that the contents of one file is not equal to the contents of another file (ignoring case).


#### assertFileNotExists

* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file does not exist.


#### assertFinite

* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is finite.


#### assertGreaterOrEquals

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is greater than or equal to another value.


#### assertGreaterThan

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is greater than another value.


#### assertGreaterThanOrEqual

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is greater than or equal to another value.


#### assertInfinite

* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is infinite.


#### assertInstanceOf

* `template` ExpectedType of object
* `phpstan-assert` =ExpectedType $actual
* `param class-string<ExpectedType>` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of a given type.


#### assertIsArray

* `phpstan-assert` array<mixed> $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type array.


#### assertIsBool

* `phpstan-assert` bool $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type bool.


#### assertIsCallable

* `phpstan-assert` callable $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type callable.


#### assertIsClosedResource

* `phpstan-assert` resource $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type resource and is closed.


#### assertIsEmpty

* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is empty.


#### assertIsFloat

* `phpstan-assert` float $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type float.


#### assertIsInt

* `phpstan-assert` int $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type int.


#### assertIsIterable

* `phpstan-assert` iterable<mixed> $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type iterable.


#### assertIsNotArray

* `phpstan-assert` !array<mixed> $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type array.


#### assertIsNotBool

* `phpstan-assert` !bool $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type bool.


#### assertIsNotCallable

* `phpstan-assert` !callable $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type callable.


#### assertIsNotClosedResource

* `phpstan-assert` !resource $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type resource.


#### assertIsNotFloat

* `phpstan-assert` !float $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type float.


#### assertIsNotInt

* `phpstan-assert` !int $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type int.


#### assertIsNotIterable

* `phpstan-assert` !iterable<mixed> $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type iterable.


#### assertIsNotNumeric

* `phpstan-assert` !numeric $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type numeric.


#### assertIsNotObject

* `phpstan-assert` !object $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type object.


#### assertIsNotReadable

* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file/dir exists and is not readable.


#### assertIsNotResource

* `phpstan-assert` !resource $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type resource.


#### assertIsNotScalar

* `psalm-assert` !scalar $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type scalar.


#### assertIsNotString

* `phpstan-assert` !string $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of type string.


#### assertIsNotWritable

* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file/dir exists and is not writable.


#### assertIsNumeric

* `phpstan-assert` numeric $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type numeric.


#### assertIsObject

* `phpstan-assert` object $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type object.


#### assertIsReadable

* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file/dir is readable.


#### assertIsResource

* `phpstan-assert` resource $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type resource.


#### assertIsScalar

* `phpstan-assert` scalar $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type scalar.


#### assertIsString

* `phpstan-assert` string $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is of type string.


#### assertIsWritable

* `param string` $filename
* `param string` $message
* `return void`

Asserts that a file/dir exists and is writable.


#### assertJson

* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that a string is a valid JSON string.


#### assertJsonFileEqualsJsonFile

* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message
* `return void`

Asserts that two JSON files are equal.


#### assertJsonFileNotEqualsJsonFile

* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message
* `return void`

Asserts that two JSON files are not equal.


#### assertJsonStringEqualsJsonFile

* `param string` $expectedFile
* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that the generated JSON encoded object and the content of the given file are equal.


#### assertJsonStringEqualsJsonString

* `param string` $expectedJson
* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that two given JSON encoded objects or arrays are equal.


#### assertJsonStringNotEqualsJsonFile

* `param string` $expectedFile
* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that the generated JSON encoded object and the content of the given file are not equal.


#### assertJsonStringNotEqualsJsonString

* `param string` $expectedJson
* `param string` $actualJson
* `param string` $message
* `return void`

Asserts that two given JSON encoded objects or arrays are not equal.


#### assertLessOrEquals

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is smaller than or equal to another value.


#### assertLessThan

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is smaller than another value.


#### assertLessThanOrEqual

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a value is smaller than or equal to another value.


#### assertMatchesRegularExpression

* `param string` $pattern
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string matches a given regular expression.


#### assertNan

* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is nan.


#### assertNotContains

* `param mixed` $needle
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts that a haystack does not contain a needle.


#### assertNotContainsEquals

* `param mixed` $needle
* `param iterable<mixed>` $haystack
* `param string` $message
* `return void`


#### assertNotContainsOnly

* `param string` $type
* `param iterable<mixed>` $haystack
* `param ?bool` $isNativeType
* `param string` $message
* `return void`

Asserts that a haystack does not contain only values of a given type.


#### assertNotCount

* `param int` $expectedCount
* `param \Countable|iterable<mixed>` $haystack
* `param string` $message
* `return void`

Asserts the number of elements of an array, Countable or Traversable.


#### assertNotEmpty

* `phpstan-assert` !empty $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not empty.


#### assertNotEquals

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are not equal.


#### assertNotEqualsCanonicalizing

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are not equal (canonicalizing).


#### assertNotEqualsIgnoringCase

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables are not equal (ignoring case).


#### assertNotEqualsWithDelta

* `param mixed` $expected
* `param mixed` $actual
* `param float` $delta
* `param string` $message
* `return void`

Asserts that two variables are not equal (with delta).


#### assertNotFalse

* `phpstan-assert` !false $condition
* `param mixed` $condition
* `param string` $message
* `return void`

Asserts that a condition is not false.


#### assertNotInstanceOf

* `template` ExpectedType of object
* `phpstan-assert` !ExpectedType $actual
* `param class-string<ExpectedType>` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not of a given type.


#### assertNotNull

* `phpstan-assert` !null $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is not null.


#### assertNotRegExp

* `param string` $pattern
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string does not match a given regular expression.


#### assertNotSame

* `param mixed` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables do not have the same type and value.


#### assertNotSameSize

* `param \Countable|iterable<mixed>` $expected
* `param \Countable|iterable<mixed>` $actual
* `param string` $message
* `return void`

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is not the same.


#### assertNotTrue

* `phpstan-assert` !true $condition
* `param mixed` $condition
* `param string` $message
* `return void`

Asserts that a condition is not true.


#### assertNull

* `phpstan-assert` null $actual
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that a variable is null.


#### assertObjectHasAttribute

* `param string` $attributeName
* `param object` $object
* `param string` $message
* `return void`

Asserts that an object has a specified attribute.


#### assertObjectNotHasAttribute

* `param string` $attributeName
* `param object` $object
* `param string` $message
* `return void`

Asserts that an object does not have a specified attribute.


#### assertRegExp

* `param string` $pattern
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string matches a given regular expression.


#### assertSame

* `template` ExpectedType
* `phpstan-assert` =ExpectedType $actual
* `param ExpectedType` $expected
* `param mixed` $actual
* `param string` $message
* `return void`

Asserts that two variables have the same type and value.

Used on objects, it asserts that two variables reference
the same object.


#### assertSameSize

* `param \Countable|iterable<mixed>` $expected
* `param \Countable|iterable<mixed>` $actual
* `param string` $message
* `return void`

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is the same.


#### assertStringContainsString

* `param string` $needle
* `param string` $haystack
* `param string` $message
* `return void`


#### assertStringContainsStringIgnoringCase

* `param string` $needle
* `param string` $haystack
* `param string` $message
* `return void`


#### assertStringEndsNotWith

* `param non-empty-string` $suffix
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string ends not with a given suffix.


#### assertStringEndsWith

* `param non-empty-string` $suffix
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string ends with a given suffix.


#### assertStringEqualsFile

* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is equal to the contents of a file.


#### assertStringEqualsFileCanonicalizing

* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is equal to the contents of a file (canonicalizing).


#### assertStringEqualsFileIgnoringCase

* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is equal to the contents of a file (ignoring case).


#### assertStringMatchesFormat

* `param string` $format
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string matches a given format string.


#### assertStringMatchesFormatFile

* `param string` $formatFile
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string matches a given format file.


#### assertStringNotContainsString

* `param string` $needle
* `param string` $haystack
* `param string` $message
* `return void`


#### assertStringNotContainsStringIgnoringCase

* `param string` $needle
* `param string` $haystack
* `param string` $message
* `return void`


#### assertStringNotEqualsFile

* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is not equal to the contents of a file.


#### assertStringNotEqualsFileCanonicalizing

* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is not equal to the contents of a file (canonicalizing).


#### assertStringNotEqualsFileIgnoringCase

* `param string` $expectedFile
* `param string` $actualString
* `param string` $message
* `return void`

Asserts that the contents of a string is not equal to the contents of a file (ignoring case).


#### assertStringNotMatchesFormat

* `param string` $format
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string does not match a given format string.


#### assertStringNotMatchesFormatFile

* `param string` $formatFile
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string does not match a given format string.


#### assertStringStartsNotWith

* `param non-empty-string` $prefix
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string starts not with a given prefix.


#### assertStringStartsWith

* `param non-empty-string` $prefix
* `param string` $string
* `param string` $message
* `return void`

Asserts that a string starts with a given prefix.


#### assertThat

* `param mixed` $value
* `param \PHPUnit\Framework\Constraint\Constraint` $constraint
* `param string` $message
* `return void`

Evaluates a PHPUnit\Framework\Constraint matcher object.


#### assertThatItsNot

* `param mixed` $value
* `param \PHPUnit\Framework\Constraint\Constraint` $constraint
* `param string` $message
* `return void`

Evaluates a PHPUnit\Framework\Constraint matcher object.


#### assertTrue

* `phpstan-assert` true $condition
* `param mixed` $condition
* `param string` $message
* `return void`

Asserts that a condition is true.


#### assertXmlFileEqualsXmlFile

* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message
* `return void`

Asserts that two XML files are equal.


#### assertXmlFileNotEqualsXmlFile

* `param string` $expectedFile
* `param string` $actualFile
* `param string` $message
* `return void`

Asserts that two XML files are not equal.


#### assertXmlStringEqualsXmlFile

* `param string` $expectedFile
* `param \DOMDocument|string` $actualXml
* `param string` $message
* `return void`

Asserts that two XML documents are equal.


#### assertXmlStringEqualsXmlString

* `param \DOMDocument|string` $expectedXml
* `param \DOMDocument|string` $actualXml
* `param string` $message
* `return void`

Asserts that two XML documents are equal.


#### assertXmlStringNotEqualsXmlFile

* `param string` $expectedFile
* `param \DOMDocument|string` $actualXml
* `param string` $message
* `return void`

Asserts that two XML documents are not equal.


#### assertXmlStringNotEqualsXmlString

* `param \DOMDocument|string` $expectedXml
* `param \DOMDocument|string` $actualXml
* `param string` $message
* `return void`

Asserts that two XML documents are not equal.


#### expectThrowable

* `param \Throwable|string` $throwable
* `param callable` $callback
* `return void`

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


#### fail

* `param string` $message
* `return never`

Fails a test with the given message.


#### markTestIncomplete

* `param string` $message
* `return never`

Mark the test as incomplete.


#### markTestSkipped

* `param string` $message
* `return never`

Mark the test as skipped.

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-asserts/tree/master/src/Codeception/Module/Asserts.php">Help us to improve documentation. Edit module reference</a></div>
