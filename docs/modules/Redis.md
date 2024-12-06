---
layout: doc
title: Redis - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Redis/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-redis/tree/master/src/Codeception/Module/Redis.php"><strong>source</strong></a></div>

# Redis
### Installation

{% highlight yaml %}
composer require --dev codeception/module-redis

{% endhighlight %}

### Description



This module uses the [Predis](https://github.com/nrk/predis) library
to interact with a Redis server.

### Status

* Stability: **beta**

### Configuration

* **`host`** (`string`, default `'127.0.0.1'`) - The Redis host
* **`port`** (`int`, default `6379`) - The Redis port
* **`database`** (`int`, no default) - The Redis database. Needs to be specified.
* **`username`** (`string`, no default) - When ACLs are enabled on Redis >= 6.0, both username and password are required for user authentication.
* **`password`** (`string`, no default) - The Redis password/secret.
* **`cleanupBefore`**: (`string`, default `'never'`) - Whether/when to flush the database:
    * `suite`: at the beginning of every suite
    * `test`: at the beginning of every test
    * Any other value: never

Note: The full configuration list can be found on Predis' github.

#### Example (`Unit.suite.yml`)

{% highlight yaml %}

   modules:
       - Redis:
           host: '127.0.0.1'
           port: 6379
           database: 0
           cleanupBefore: 'never'

{% endhighlight %}

### Public Properties

* **driver** - Contains the Predis client/driver

@author Marc Verney <marc@marcverney.net>

### Actions

#### cleanup

* `throws ModuleException`
* `return void`

Delete all the keys in the Redis database


#### dontSeeInRedis

* `param string` $key The key name
* `param mixed` $value Optional. If specified, also checks the key has this
value. Booleans will be converted to 1 and 0 (even inside arrays)
* `return void`

Asserts that a key does not exist or, optionally, that it doesn't have the
provided $value

Examples:

{% highlight php %}

<?php
// With only one argument, only checks the key does not exist
$I->dontSeeInRedis('example:string');

// Checks a String does not exist or its value is not the one provided
$I->dontSeeInRedis('example:string', 'life');

// Checks a List does not exist or its value is not the one provided (order of elements is compared).
$I->dontSeeInRedis('example:list', ['riri', 'fifi', 'loulou']);

// Checks a Set does not exist or its value is not the one provided (order of members is ignored).
$I->dontSeeInRedis('example:set', ['riri', 'fifi', 'loulou']);

// Checks a ZSet does not exist or its value is not the one provided (scores are required, order of members is compared)
$I->dontSeeInRedis('example:zset', ['riri' => 1, 'fifi' => 2, 'loulou' => 3]);

// Checks a Hash does not exist or its value is not the one provided (order of members is ignored).
$I->dontSeeInRedis('example:hash', ['riri' => true, 'fifi' => 'Dewey', 'loulou' => 2]);

{% endhighlight %}


#### dontSeeRedisKeyContains

* `param string` $key The key
* `param mixed` $item The item
* `param mixed` $itemValue Optional and only used for zsets and hashes. If
specified, the method will also check that the $item has this value/score
* `return void`

Asserts that a given key does not contain a given item

Examples:

{% highlight php %}

<?php
// Strings: performs a substring search
$I->dontSeeRedisKeyContains('string', 'bar');

// Lists
$I->dontSeeRedisKeyContains('example:list', 'poney');

// Sets
$I->dontSeeRedisKeyContains('example:set', 'cat');

// ZSets: check whether the zset has this member
$I->dontSeeRedisKeyContains('example:zset', 'jordan');

// ZSets: check whether the zset has this member with this score
$I->dontSeeRedisKeyContains('example:zset', 'jordan', 23);

// Hashes: check whether the hash has this field
$I->dontSeeRedisKeyContains('example:hash', 'magic');

// Hashes: check whether the hash has this field with this value
$I->dontSeeRedisKeyContains('example:hash', 'magic', 32);

{% endhighlight %}


#### grabFromRedis

* `param string` $key The key name
* `throws ModuleException` if the key does not exist
* `return array|string|null`

Returns the value of a given key

Examples:

{% highlight php %}

<?php
// Strings
$I->grabFromRedis('string');

// Lists: get all members
$I->grabFromRedis('example:list');

// Lists: get a specific member
$I->grabFromRedis('example:list', 2);

// Lists: get a range of elements
$I->grabFromRedis('example:list', 2, 4);

// Sets: get all members
$I->grabFromRedis('example:set');

// ZSets: get all members
$I->grabFromRedis('example:zset');

// ZSets: get a range of members
$I->grabFromRedis('example:zset', 3, 12);

// Hashes: get all fields of a key
$I->grabFromRedis('example:hash');

// Hashes: get a specific field of a key
$I->grabFromRedis('example:hash', 'foo');

{% endhighlight %}


#### haveInRedis

* `param string` $type The type of the key
* `param string` $key The key name
* `param mixed` $value The value
* `throws ModuleException`
* `return void`

Creates or modifies keys

If $key already exists:

- Strings: its value will be overwritten with $value
- Other types: $value items will be appended to its value

Examples:

{% highlight php %}

<?php
// Strings: $value must be a scalar
$I->haveInRedis('string', 'Obladi Oblada');

// Lists: $value can be a scalar or an array
$I->haveInRedis('list', ['riri', 'fifi', 'loulou']);

// Sets: $value can be a scalar or an array
$I->haveInRedis('set', ['riri', 'fifi', 'loulou']);

// ZSets: $value must be an associative array with scores
$I->haveInRedis('zset', ['riri' => 1, 'fifi' => 2, 'loulou' => 3]);

// Hashes: $value must be an associative array
$I->haveInRedis('hash', ['obladi' => 'oblada']);

{% endhighlight %}


#### seeInRedis

* `param string` $key The key name
* `param mixed` $value Optional. If specified, also checks the key has this
value. Booleans will be converted to 1 and 0 (even inside arrays)
* `return void`

Asserts that a key exists, and optionally that it has the provided $value

Examples:

{% highlight php %}

<?php
// With only one argument, only checks the key exists
$I->seeInRedis('example:string');

// Checks a String exists and has the value "life"
$I->seeInRedis('example:string', 'life');

// Checks the value of a List. Order of elements is compared.
$I->seeInRedis('example:list', ['riri', 'fifi', 'loulou']);

// Checks the value of a Set. Order of members is ignored.
$I->seeInRedis('example:set', ['riri', 'fifi', 'loulou']);

// Checks the value of a ZSet. Scores are required. Order of members is compared.
$I->seeInRedis('example:zset', ['riri' => 1, 'fifi' => 2, 'loulou' => 3]);

// Checks the value of a Hash. Order of members is ignored.
$I->seeInRedis('example:hash', ['riri' => true, 'fifi' => 'Dewey', 'loulou' => 2]);

{% endhighlight %}


#### seeRedisKeyContains

* `param string` $key The key
* `param mixed` $item The item
* `param mixed` $itemValue Optional and only used for zsets and hashes. If
specified, the method will also check that the $item has this value/score
* `return void`

Asserts that a given key contains a given item

Examples:

{% highlight php %}

<?php
// Strings: performs a substring search
$I->seeRedisKeyContains('example:string', 'bar');

// Lists
$I->seeRedisKeyContains('example:list', 'poney');

// Sets
$I->seeRedisKeyContains('example:set', 'cat');

// ZSets: check whether the zset has this member
$I->seeRedisKeyContains('example:zset', 'jordan');

// ZSets: check whether the zset has this member with this score
$I->seeRedisKeyContains('example:zset', 'jordan', 23);

// Hashes: check whether the hash has this field
$I->seeRedisKeyContains('example:hash', 'magic');

// Hashes: check whether the hash has this field with this value
$I->seeRedisKeyContains('example:hash', 'magic', 32);

{% endhighlight %}


#### sendCommandToRedis

* `param string` $command The command name
* `return mixed`

Sends a command directly to the Redis driver. See documentation at
https://github.com/nrk/predis
Every argument that follows the $command name will be passed to it.

Examples:

{% highlight php %}

<?php
$I->sendCommandToRedis('incr', 'example:string');
$I->sendCommandToRedis('strLen', 'example:string');
$I->sendCommandToRedis('lPop', 'example:list');
$I->sendCommandToRedis('zRangeByScore', 'example:set', '-inf', '+inf', ['withscores' => true, 'limit' => [1, 2]]);
$I->sendCommandToRedis('flushdb');

{% endhighlight %}

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-redis/tree/master/src/Codeception/Module/Redis.php">Help us to improve documentation. Edit module reference</a></div>
