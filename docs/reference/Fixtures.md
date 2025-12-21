---
layout: doc
title: Fixtures - Codeception - Documentation
---


## Codeception\Util\Fixtures



Really basic class to store data in global array and use it in Cests/Tests.

{% highlight php %}

<?php
Fixtures::add('user1', ['name' => 'davert']);
Fixtures::get('user1');
Fixtures::exists('user1');

{% endhighlight %}


#### add()

 *public static* add($name, $data)


* `param string` $name
* `param ` $data
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/5.3/src/Codeception/Util/Fixtures.php#L23)

#### cleanup()

 *public static* cleanup($name = '')


* `param string` $name
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/5.3/src/Codeception/Util/Fixtures.php#L37)

#### exists()

 *public static* exists($name)


* `param string` $name
* `return bool`

[See source](https://github.com/Codeception/Codeception/blob/5.3/src/Codeception/Util/Fixtures.php#L47)

#### get()

 *public static* get($name)


* `param string` $name

[See source](https://github.com/Codeception/Codeception/blob/5.3/src/Codeception/Util/Fixtures.php#L28)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/5.3/src/Codeception/Util/Fixtures.php">Help us to improve documentation. Edit module reference</a></div>
