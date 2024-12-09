---
layout: doc
title: Apc - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Apc/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-apc/tree/master/src/Codeception/Module/Apc.php"><strong>source</strong></a></div>

# Apc
### Installation

{% highlight yaml %}
composer require --dev codeception/module-apc

{% endhighlight %}

### Description



This module interacts with the [Alternative PHP Cache (APC)](https://php.net/manual/en/intro.apcu.php)
using _APCu_ extension.

Performs a cleanup by flushing all values after each test run.

### Status

* Maintainer: **Serghei Iakovlev**
* Stability: **stable**
* Contact: serghei@phalcon.io

#### Example (`Unit.suite.yml`)

{% highlight yaml %}

   modules:
       - Apc

{% endhighlight %}

Be sure you don't use the production server to connect.


### Actions

#### dontSeeInApc

* `param string` $key
* `param mixed` $value
* `return void`

Checks item in APCu doesn't exist or is the same as expected.

Examples:

{% highlight php %}

<?php
// With only one argument, only checks the key does not exist
$I->dontSeeInApc('users_count');

// Checks a 'users_count' exists does not exist or its value is not the one provided
$I->dontSeeInApc('users_count', 200);

{% endhighlight %}


#### flushApc

* `return void`

Clears the APCu cache


#### grabValueFromApc

* `param string` $key
* `return mixed`

Grabs value from APCu by key.

Example:

{% highlight php %}

<?php
$users_count = $I->grabValueFromApc('users_count');

{% endhighlight %}


#### haveInApc

* `param string` $key
* `param mixed` $value
* `param int` $expiration
* `return string`

Stores an item `$value` with `$key` on the APCu.

Examples:

{% highlight php %}

<?php
// Array
$I->haveInApc('users', ['name' => 'miles', 'email' => 'miles@davis.com']);

// Object
$I->haveInApc('user', UserRepository::findFirst());

// Key as array of 'key => value'
$entries = [];
$entries['key1'] = 'value1';
$entries['key2'] = 'value2';
$entries['key3'] = ['value3a','value3b'];
$entries['key4'] = 4;
$I->haveInApc($entries, null);

{% endhighlight %}


#### seeInApc

* `param string` $key
* `param mixed` $value
* `return void`

Checks item in APCu exists and the same as expected.

Examples:

{% highlight php %}

<?php
// With only one argument, only checks the key exists
$I->seeInApc('users_count');

// Checks a 'users_count' exists and has the value 200
$I->seeInApc('users_count', 200);

{% endhighlight %}

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-apc/tree/master/src/Codeception/Module/Apc.php">Help us to improve documentation. Edit module reference</a></div>
