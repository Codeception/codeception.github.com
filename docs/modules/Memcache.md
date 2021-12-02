---
layout: doc
title: Memcache - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Memcache/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-memcache/tree/master/src/Codeception/Module/Memcache.php"><strong>source</strong></a></div>

# Memcache
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-memcache

{% endhighlight %}

Alternatively, you can enable `Memcache` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



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
 * `return array|string` 


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

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-memcache/tree/master/src/Codeception/Module/Memcache.php">Help us to improve documentation. Edit module reference</a></div>
