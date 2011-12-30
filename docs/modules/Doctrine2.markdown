---
layout: page
title: Codeception - Documentation
---

## Doctrine2

Allows integration and testing for projects with Doctrine2 ORM.

Doctrine2 uses EntityManager to perform all database operations.
As the module uses active connection and active entity manager, instance of this object should be passed to this module.

It can be done in bootstrap file, by setting static $em property:

{% highlight php %}

<?php

\Codeception\Module\Doctrine2::$em = $em


{% endhighlight %}

### Config
* cleanup: true - all doctrine queries will be run in transaction, which will be rolled back at the end of test.

### Actions


tSeeInRepository


Flushes changes to database and performs ->findOneBy() call for current repository.

 * param $entity
 * param array $params


shToDatabase


Performs $em->flush();


eFakeRepository


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


sistEntity


Adds entity to repository and flushes. You can redefine it's properties with the second parameter.

Example:

{% highlight php %}

<?php
$I->persistEntity($user, array('name' => 'Miles'));

{% endhighlight %}

 * param $obj
 * param array $values


InRepository


Flushes changes to database and performs ->findOneBy() call for current repository.
Fails if record for given criteria can\'t be found,

 * param $entity
 * param array $params
