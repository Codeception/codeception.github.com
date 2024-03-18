---
layout: doc
title: Stub - Codeception - Documentation
---


## Codeception\Stub



#### *public static* make($class, array $params = array ( ), $testCase = null)

* `template` RealInstanceType of object
* `param ` $class
* `param array` $params - properties and methods to set
* `param bool|PHPUnitTestCase` $testCase
* `throws RuntimeException` when class does not exist
* `throws Exception`
* `return PHPUnitMockObject&RealInstanceType` - mock

Instantiates a class without executing a constructor.

Properties and methods can be set as a second parameter.
Even protected and private properties can be set.

{% highlight php %}

<?php
Stub::make('User');
Stub::make('User', ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
Stub::make(new User, ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in second parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
Stub::make('User', ['save' => function () { return true; }]);
Stub::make('User', ['save' => true]);

{% endhighlight %}

**To create a mock, pass current testcase name as last argument:**

{% highlight php %}

<?php
Stub::make('User', [
     'save' => \Codeception\Stub\Expected::once()
], $this);

{% endhighlight %}

#### *public static* factory($class, $num = 1, array $params = array ( ))

* `param mixed` $class
* `param int` $num
* `param array` $params
* `throws Exception`
* `return array`

Creates $num instances of class through `Stub::make`.

#### *public static* makeEmptyExcept($class, $method, array $params = array ( ), $testCase = null)

* `template` RealInstanceType of object
* `param ` $class
* `param string` $method
* `param array` $params
* `param bool|PHPUnitTestCase` $testCase
* `throws Exception`
* `return PHPUnitMockObject&RealInstanceType`

Instantiates class having all methods replaced with dummies except one.

Constructor is not triggered.
Properties and methods can be replaced.
Even protected and private properties can be set.

{% highlight php %}

<?php
Stub::makeEmptyExcept('User', 'save');
Stub::makeEmptyExcept('User', 'save', ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
* Stub::makeEmptyExcept(new User, 'save');

{% endhighlight %}

To replace method provide it's name as a key in second parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
Stub::makeEmptyExcept('User', 'save', ['isValid' => function () { return true; }]);
Stub::makeEmptyExcept('User', 'save', ['isValid' => true]);

{% endhighlight %}

**To create a mock, pass current testcase name as last argument:**

{% highlight php %}

<?php
Stub::makeEmptyExcept('User', 'validate', [
     'save' => \Codeception\Stub\Expected::once()
], $this);

{% endhighlight %}

#### *public static* makeEmpty($class, array $params = array ( ), $testCase = null)

* `template` RealInstanceType of object
* `param ` $class
* `param array` $params
* `param bool|PHPUnitTestCase` $testCase
* `throws Exception`
* `return PHPUnitMockObject&RealInstanceType`

Instantiates class having all methods replaced with dummies.

Constructor is not triggered.
Properties and methods can be set as a second parameter.
Even protected and private properties can be set.

{% highlight php %}

<?php
Stub::makeEmpty('User');
Stub::makeEmpty('User', ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
Stub::makeEmpty(new User, ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in second parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
Stub::makeEmpty('User', ['save' => function () { return true; }]);
Stub::makeEmpty('User', ['save' => true]);

{% endhighlight %}

**To create a mock, pass current testcase name as last argument:**

{% highlight php %}

<?php
Stub::makeEmpty('User', [
     'save' => \Codeception\Stub\Expected::once()
], $this);

{% endhighlight %}

#### *public static* copy($obj, array $params = array ( ))

* `param ` $obj
* `param array` $params
* `throws Exception`
* `return mixed`

Clones an object and redefines it's properties (even protected and private)

#### *public static* construct($class, array $constructorParams = array ( ), array $params = array ( ), $testCase = null)

* `template` RealInstanceType of object
* `param ` $class
* `param array` $constructorParams
* `param array` $params
* `param bool|PHPUnitTestCase` $testCase
* `throws Exception`
* `return PHPUnitMockObject&RealInstanceType`

Instantiates a class instance by running constructor.

Parameters for constructor passed as second argument
Properties and methods can be set in third argument.
Even protected and private properties can be set.

{% highlight php %}

<?php
Stub::construct('User', ['autosave' => false]);
Stub::construct('User', ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
Stub::construct(new User, ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in third parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
Stub::construct('User', [], ['save' => function () { return true; }]);
Stub::construct('User', [], ['save' => true]);

{% endhighlight %}

**To create a mock, pass current testcase name as last argument:**

{% highlight php %}

<?php
Stub::construct('User', [], [
     'save' => \Codeception\Stub\Expected::once()
], $this);

{% endhighlight %}

#### *public static* constructEmpty($class, array $constructorParams = array ( ), array $params = array ( ), $testCase = null)

* `template` RealInstanceType of object
* `param ` $class
* `param array` $constructorParams
* `param array` $params
* `param bool|PHPUnitTestCase` $testCase
* `return PHPUnitMockObject&RealInstanceType`

Instantiates a class instance by running constructor with all methods replaced with dummies.

Parameters for constructor passed as second argument
Properties and methods can be set in third argument.
Even protected and private properties can be set.

{% highlight php %}

<?php
Stub::constructEmpty('User', ['autosave' => false]);
Stub::constructEmpty('User', ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
Stub::constructEmpty(new User, ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in third parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
Stub::constructEmpty('User', [], ['save' => function () { return true; }]);
Stub::constructEmpty('User', [], ['save' => true]);

{% endhighlight %}

**To create a mock, pass current testcase name as last argument:**

{% highlight php %}

<?php
Stub::constructEmpty('User', [], [
     'save' => \Codeception\Stub\Expected::once()
], $this);

{% endhighlight %}

#### *public static* constructEmptyExcept($class, $method, array $constructorParams = array ( ), array $params = array ( ), $testCase = null)

* `template` RealInstanceType of object
* `param ` $class
* `param string` $method
* `param array` $constructorParams
* `param array` $params
* `param bool|PHPUnitTestCase` $testCase
* `throws ReflectionException`
* `return PHPUnitMockObject&RealInstanceType`

Instantiates a class instance by running constructor with all methods replaced with dummies, except one.

Parameters for constructor passed as second argument
Properties and methods can be set in third argument.
Even protected and private properties can be set.

{% highlight php %}

<?php
Stub::constructEmptyExcept('User', 'save');
Stub::constructEmptyExcept('User', 'save', ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
Stub::constructEmptyExcept(new User, 'save', ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in third parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
Stub::constructEmptyExcept('User', 'save', [], ['save' => function () { return true; }]);
Stub::constructEmptyExcept('User', 'save', [], ['save' => true]);

{% endhighlight %}

**To create a mock, pass current testcase name as last argument:**

{% highlight php %}

<?php
Stub::constructEmptyExcept('User', 'save', [], [
     'save' => \Codeception\Stub\Expected::once()
], $this);

{% endhighlight %}

#### *public static* update($mock, array $params)

* `param PHPUnitMockObject|object` $mock
* `param array` $params
* `throws LogicException`
* `return object`

Replaces properties of current stub

#### *public static* consecutive()

* `return \Codeception\Stub\ConsecutiveMap`

Stubbing a method call to return a list of values in the specified order.

{% highlight php %}

<?php
$user = Stub::make('User', ['getName' => Stub::consecutive('david', 'emma', 'sam', 'amy')]);
$user->getName(); //david
$user->getName(); //emma
$user->getName(); //sam
$user->getName(); //amy

{% endhighlight %}


