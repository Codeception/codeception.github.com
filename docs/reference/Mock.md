---
layout: doc
title: Mock - Codeception - Documentation
---

# Mocks

Declare mocks inside `Codeception\Test\Unit` class.
If you want to use mocks outside it, check the reference for [Codeception/Stub](https://github.com/Codeception/Stub) library.      


#### *public* make($class, array $params = array ( ))

* `template` RealInstanceType of object
* `param class-string<RealInstanceType>|RealInstanceType|callable():` $ class-string<RealInstanceType> $class - A class to be mocked
* `param array` $params - properties and methods to set
* `param ` $class
* `throws RuntimeException` when class does not exist
* `throws Exception`
* `return MockObject&RealInstanceType` - mock

Instantiates a class without executing a constructor.

Properties and methods can be set as a second parameter.
Even protected and private properties can be set.

{% highlight php %}

<?php
$this->make('User');
$this->make('User', ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
$this->make(new User, ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in second parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
$this->make('User', ['save' => function () { return true; }]);
$this->make('User', ['save' => true]);

{% endhighlight %}

#### *public* makeEmpty($class, array $params = array ( ))

* `template` RealInstanceType of object
* `param class-string<RealInstanceType>|RealInstanceType|callable():` $ class-string<RealInstanceType> $class - A class to be mocked
* `param array` $params
* `param ` $class
* `throws Exception`
* `return MockObject&RealInstanceType`

Instantiates class having all methods replaced with dummies.

Constructor is not triggered.
Properties and methods can be set as a second parameter.
Even protected and private properties can be set.

{% highlight php %}

<?php
$this->makeEmpty('User');
$this->makeEmpty('User', ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
$this->makeEmpty(new User, ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in second parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
$this->makeEmpty('User', ['save' => function () { return true; }]);
$this->makeEmpty('User', ['save' => true]);

{% endhighlight %}

#### *public* makeEmptyExcept($class, $method, array $params = array ( ))

* `template` RealInstanceType of object
* `param class-string<RealInstanceType>|RealInstanceType|callable():` $ class-string<RealInstanceType> $class - A class to be mocked
* `param ` $class
* `param string` $method
* `param array` $params
* `throws Exception`
* `return \PHPUnit\Framework\MockObject\MockObject&RealInstanceType`

Instantiates class having all methods replaced with dummies except one.

Constructor is not triggered.
Properties and methods can be replaced.
Even protected and private properties can be set.

{% highlight php %}

<?php
$this->makeEmptyExcept('User', 'save');
$this->makeEmptyExcept('User', 'save', ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
* $this->makeEmptyExcept(new User, 'save');

{% endhighlight %}

To replace method provide it's name as a key in second parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
$this->makeEmptyExcept('User', 'save', ['isValid' => function () { return true; }]);
$this->makeEmptyExcept('User', 'save', ['isValid' => true]);

{% endhighlight %}

#### *public* construct($class, array $constructorParams = array ( ), array $params = array ( ))

* `template` RealInstanceType of object
* `param class-string<RealInstanceType>|RealInstanceType|callable():` $ class-string<RealInstanceType> $class - A class to be mocked
* `param ` $class
* `param array` $constructorParams
* `param array` $params
* `throws Exception`
* `return MockObject&RealInstanceType`

Instantiates a class instance by running constructor.

Parameters for constructor passed as second argument
Properties and methods can be set in third argument.
Even protected and private properties can be set.

{% highlight php %}

<?php
$this->construct('User', ['autosave' => false]);
$this->construct('User', ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
$this->construct(new User, ['autosave' => false), ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in third parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
$this->construct('User', [], ['save' => function () { return true; }]);
$this->construct('User', [], ['save' => true]);

{% endhighlight %}

#### *public* constructEmpty($class, array $constructorParams = array ( ), array $params = array ( ))

* `template` RealInstanceType of object
* `param class-string<RealInstanceType>|RealInstanceType|callable():` $ class-string<RealInstanceType> $class - A class to be mocked
* `param ` $class
* `param array` $constructorParams
* `param array` $params
* `return MockObject&RealInstanceType`

Instantiates a class instance by running constructor with all methods replaced with dummies.

Parameters for constructor passed as second argument
Properties and methods can be set in third argument.
Even protected and private properties can be set.

{% highlight php %}

<?php
$this->constructEmpty('User', ['autosave' => false]);
$this->constructEmpty('User', ['autosave' => false), ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
$this->constructEmpty(new User, ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in third parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
$this->constructEmpty('User', array(), array('save' => function () { return true; }));
$this->constructEmpty('User', array(), array('save' => true));

{% endhighlight %}

**To create a mock, pass current testcase name as last argument:**

{% highlight php %}

<?php
$this->constructEmpty('User', [], [
     'save' => \Codeception\Stub\Expected::once()
]);

{% endhighlight %}

#### *public* constructEmptyExcept($class, $method, array $constructorParams = array ( ), array $params = array ( ))

* `template` RealInstanceType of object
* `param class-string<RealInstanceType>|RealInstanceType|callable():` $ class-string<RealInstanceType> $class - A class to be mocked
* `param ` $class
* `param string` $method
* `param array` $constructorParams
* `param array` $params
* `return MockObject&RealInstanceType`

Instantiates a class instance by running constructor with all methods replaced with dummies, except one.

Parameters for constructor passed as second argument
Properties and methods can be set in third argument.
Even protected and private properties can be set.

{% highlight php %}

<?php
$this->constructEmptyExcept('User', 'save');
$this->constructEmptyExcept('User', 'save', ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

Accepts either name of class or object of that class

{% highlight php %}

<?php
$this->constructEmptyExcept(new User, 'save', ['autosave' => false], ['name' => 'davert']);

{% endhighlight %}

To replace method provide it's name as a key in third parameter
and it's return value or callback function as parameter

{% highlight php %}

<?php
$this->constructEmptyExcept('User', 'save', [], ['save' => function () { return true; }]);
$this->constructEmptyExcept('User', 'save', [], ['save' => true]);

{% endhighlight %}




#### *public static* never($params = null)

* `param mixed` $params
* `return \Codeception\Stub\StubMarshaler`

Checks if a method never has been invoked

If method invoked, it will immediately throw an
exception.

{% highlight php %}

<?php
use \Codeception\Stub\Expected;

$user = $this->make('User', [
     'getName' => Expected::never(),
     'someMethod' => function() {}
]);
$user->someMethod();

{% endhighlight %}

#### *public static* once($params = null)

* `param mixed` $params
* `return \Codeception\Stub\StubMarshaler`

Checks if a method has been invoked exactly one
time.

If the number is less or greater it will later be checked in verify() and also throw an
exception.

{% highlight php %}

<?php
use \Codeception\Stub\Expected;

$user = $this->make(
    'User',
    array(
        'getName' => Expected::once('Davert'),
        'someMethod' => function() {}
    )
);
$userName = $user->getName();
$this->assertEquals('Davert', $userName);

{% endhighlight %}
Alternatively, a function can be passed as parameter:

{% highlight php %}

<?php
Expected::once(function() { return Faker::name(); });

{% endhighlight %}

#### *public static* atLeastOnce($params = null)

* `param mixed` $params
* `return \Codeception\Stub\StubMarshaler`

Checks if a method has been invoked at least one
time.

If the number of invocations is 0 it will throw an exception in verify.

{% highlight php %}

<?php
use \Codeception\Stub\Expected;

$user = $this->make(
    'User',
    array(
        'getName' => Expected::atLeastOnce('Davert')),
        'someMethod' => function() {}
    )
);
$user->getName();
$userName = $user->getName();
$this->assertEquals('Davert', $userName);

{% endhighlight %}

Alternatively, a function can be passed as parameter:

{% highlight php %}

<?php
Expected::atLeastOnce(function() { return Faker::name(); });

{% endhighlight %}

#### *public static* exactly($count, $params = null)

* `param mixed` $params
* `param int` $count
* `return \Codeception\Stub\StubMarshaler`

Checks if a method has been invoked a certain amount
of times.

If the number of invocations exceeds the value it will immediately throw an
exception,
If the number is less it will later be checked in verify() and also throw an
exception.

{% highlight php %}

<?php
use \Codeception\Stub;
use \Codeception\Stub\Expected;

$user = $this->make(
    'User',
    array(
        'getName' => Expected::exactly(3, 'Davert'),
        'someMethod' => function() {}
    )
);
$user->getName();
$user->getName();
$userName = $user->getName();
$this->assertEquals('Davert', $userName);

{% endhighlight %}
Alternatively, a function can be passed as parameter:

{% highlight php %}

<?php
Expected::exactly(function() { return Faker::name() });

{% endhighlight %}


