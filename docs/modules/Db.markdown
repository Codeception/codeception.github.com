---
layout: page
title: Codeception - Documentation
---


Effect is opposite to ->seeInDatabase

Checks if there is no record with such column values in database.
Provide table name and column values.

Example:

{% highlight php %}

<?php
$I->seeInDatabase('users', array('name' => 'Davert', 'email' => 'davert * mail.com'));


{% endhighlight %}
Will generate:

{% highlight yaml %}
 sql
SELECT COUNT(*) FROM `users` WHERE `name` = 'Davert' AND `email` = 'davert * mail.com'

{% endhighlight %}
Fails if such user was found.

 * param $table
 * param array $criteria


Checks if a row with given column values exists.
Provide table name and column values.

Example:

{% highlight php %}

<?php
$I->seeInDatabase('users', array('name' => 'Davert', 'email' => 'davert * mail.com'));


{% endhighlight %}
Will generate:

{% highlight yaml %}
 sql
SELECT COUNT(*) FROM `users` WHERE `name` = 'Davert' AND `email` = 'davert * mail.com'

{% endhighlight %}
Fails if no such user found.

 * param $table
 * param array $criteria
