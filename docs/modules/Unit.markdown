---
layout: page
title: Codeception - Documentation
---


Updates selected properties for object passed.
Can update even private and protected properties.

 * param $obj
 * param array $values


Updates property of selected object
Can update even private and protected properties.

 * param $obj
 * param $property
 * param $value

__not documented__


Executes the method which is tested.
If method is not static, the class instance should be provided.
Otherwise bypass the first parameter blank

Include additional arguments as parameter.

Examples:

For non-static methods:

{% highlight php %}

<?php
$I->executeTestedMethod($object, 1, 'hello', array(5,4,5));

{% endhighlight %}

The same for static method

{% highlight php %}

<?php
$I->executeTestedMethod(1, 'hello', array(5,4,5));

{% endhighlight %}

 * param $object null
 * throws \InvalidArgumentException


Alias for executeTestedMethod, only for non-static methods

 * alias executeTestedMethod
 * param $object

__not documented__


Adds a stub to internal registry.
Use this command if you need to convert this stub to mock.
Without adding stub to registry you can't trace it's method invocations.

 * param $instance


Alias for haveFakeClass

 * alias haveFakeClass
 * param $instance

__not documented__

__not documented__




 * magic
 * see createMocks
 * param $mock
 * param $method
 * param array $params



 * magic
 * see createMocks
 * param $mock
 * param $method
 * param $times
 * param array $params



 * magic
 * see createMocks
 * param $mock
 * param $method
 * param array $params



 * magic
 * see createMocks
 * param $mock
 * param $method
 * param array $params

__not documented__

__not documented__

__not documented__


Asserts that the last result from tested method is equal to value

 * param $value

__not documented__

__not documented__


Registers a class/method which will be tested.
When you run 'execute' this method will be invoked.
Please, not that it also update the feature section of scenario.

For non-static methods:

{% highlight php %}

<?php
$I->testMethod('ClassName.MethodName'); // I will need ClassName instance for this

{% endhighlight %}

For static methods:

{% highlight php %}

<?php
$I->testMethod('ClassName::MethodName');

{% endhighlight %}

 * param $signature
