---
layout: doc
title: Memcache - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.5/src/Codeception/Module/Memcache.php">source</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/master/docs/modules/Memcache.md">master</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.3/docs/modules/Memcache.md">2.3</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.2/docs/modules/Memcache.md">2.2</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.1/docs/modules/Memcache.md">2.1</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.0/docs/modules/Memcache.md">2.0</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/Memcache.md">1.8</a></div>

# Memcache


Connects to [memcached](http://www.memcached.org/) using either _Memcache_ or _Memcached_ extension.

Performs a cleanup by flushing all values after each test run.

### Status

* Maintainer: **davert**
* Stability: **beta**
* Contact: davert@codeception.com

### Configuration

* **`host`** (`string`, default `'localhost'`) - The memcached host
* **`port`** (`int`, default `11211`) - The memcached port

#### Example (`unit.suite.yml`)

{% highlight yaml %}

   modules:
       - Memcache:
           host: 'localhost'
           port: 11211

{% endhighlight %}

Be sure you don't use the production server to connect.

### Public Properties

* **memcache** - instance of _Memcache_ or _Memcached_ object


### Actions

#### clearMemcache
 
Flushes all Memcached data.


#### dontSeeInMemcached
 
Checks item in Memcached doesn't exist or is the same as expected.

Examples:

{% highlight php %}

<?php
// With only one argument, only checks the key does not exist
$I->dontSeeInMemcached('users_count');

// Checks a 'users_count' exists does not exist or its value is not the one provided
$I->dontSeeInMemcached('users_count', 200);
?>

{% endhighlight %}

 * `param` $key
 * `param` $value


#### grabValueFromMemcached
 
Grabs value from memcached by key.

Example:

{% highlight php %}

<?php
$users_count = $I->grabValueFromMemcached('users_count');
?>

{% endhighlight %}

 * `param` $key
 * `return` array|string


#### haveInMemcached
 
Stores an item `$value` with `$key` on the Memcached server.

 * `param string` $key
 * `param mixed` $value
 * `param int` $expiration


#### seeInMemcached
 
Checks item in Memcached exists and the same as expected.

Examples:

{% highlight php %}

<?php
// With only one argument, only checks the key exists
$I->seeInMemcached('users_count');

// Checks a 'users_count' exists and has the value 200
$I->seeInMemcached('users_count', 200);
?>

{% endhighlight %}

 * `param` $key
 * `param` $value

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/tree/2.5/src/Codeception/Module/Memcache.php">Help us to improve documentation. Edit module reference</a></div>
