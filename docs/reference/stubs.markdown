---
layout: page
title: Codeception Stubs
---

# Stub

Class for easily create stubs in your unit tests. You can use this class even inside PHPUnit tests too. It's a useful wrapper on top of PHPUnit mock builder.

### Usage

* `make` - creates new class bypassing constructor
* `makeEmpty` - creates new class bypassing constructor with all methods return null.
* `construct` - creates new class throgh constructor.
* `constructEmpty` - creates new empty class throgh constructor with all methods return null.
* `copy` - copies object and redefines it's properties.

### Example 

{% highlight php %}
use \Codeception\Util\Stub as Stub;

// create class instance with name set method 'save' redefined.
$user = Stub::make('User', array('name' => 'davert', 'save' => function () { return true; }));

// create class instance with all empty methods (will return NULL)
$user = Stub::makeEmpty('User', array('getName' => function () { return 'davert'; }));
$user->save(); // is empty and returns NULL
$user->getName(); // return 'davert'

// create class with empty methods except one
$user = Stub::makeEmptyExcept('User', 'getName', array('name' => 'davert'));
$user->save(); // is empty and returns NULL
$user->getName(); // returns 'davert'

// create class instance through constructor
// second parameter is array, it's values will be passed to constructor.

// similar to $user = new User($con, $is_new);
$user = Stub::construct('User', array($con, $is_new), array('name' => 'davert'));

// similar is constructEmpty 
$user = Stub::constructEmpty('User', array($con, $is_new), array('getName' => function () { return 'davert'; }));

// and constructEmptyExcept
$user = Stub::constructEmptyExcept('User', 'getName', array($con, $is_new), array('name' => 'davert'));

// copy and redefine class instance
// can act with regular objects, not only stubs
$user->getName(); // returns 'davert'
$user2 = Stub::copy($user, array('name' => 'davert2'));
$user->getName(); // returns 'davert2'
{% endhighlight %}

