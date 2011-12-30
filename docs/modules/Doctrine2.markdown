---
layout: page
title: Codeception - Documentation
---


Flushes changes to database and performs ->findOneBy() call for current repository.

 * param $entity
 * param array $params


Performs $em->flush();


Mocks the repository.

With this action you can redefine any method of any repository.
Please, note: this fake repositories will be accessible through entity manager till the end of test.

Example:

{% highlight php %}

<?php

$I->haveFakeRepository('Entity\User', array('findByUsername' => function($username) {  return null; }));


{% endhighlight %}

This creates a stub class for Entity\User repository with redefined method findByUsername, which will always return the NULL value.

 * param $classname
 * param array $methods


Adds entity to repository and flushes. You can redefine it's properties with the second parameter.

Example:

{% highlight php %}

<?php
$I->persistEntity($user, array('name' => 'Miles'));

{% endhighlight %}

 * param $obj
 * param array $values


Flushes changes to database and performs ->findOneBy() call for current repository.
Fails if record for given criteria can\'t be found,

 * param $entity
 * param array $params
