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

?>

{% endhighlight %}



#### add()

 *public static* add($name, $data) 

[See source](https://github.com/Codeception/Codeception/blob/4.2/src/Codeception/Util/Fixtures.php#L21)

#### cleanup()

 *public static* cleanup($name = null) 

[See source](https://github.com/Codeception/Codeception/blob/4.2/src/Codeception/Util/Fixtures.php#L35)

#### exists()

 *public static* exists($name) 

[See source](https://github.com/Codeception/Codeception/blob/4.2/src/Codeception/Util/Fixtures.php#L45)

#### get()

 *public static* get($name) 

[See source](https://github.com/Codeception/Codeception/blob/4.2/src/Codeception/Util/Fixtures.php#L26)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/4.2/src/Codeception/Util/Fixtures.php">Help us to improve documentation. Edit module reference</a></div>
