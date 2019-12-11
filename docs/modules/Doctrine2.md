---
layout: doc
title: Doctrine2 - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-doctrine2/tree/master/src/Codeception/Module/Doctrine2.php"><strong>source</strong></a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/3.1/docs/modules/Doctrine2.md">3.1</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.5/docs/modules/Doctrine2.md">2.5</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/Doctrine2.md">1.8</a></div>

# Doctrine2
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/codeception/module-doctrine2

{% endhighlight %}

Alternatively, you can enable `Doctrine2` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



Access the database using [Doctrine2 ORM](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/).

When used with Zend Framework 2 or Symfony2, Doctrine's Entity Manager is automatically retrieved from Service Locator.
Set up your `functional.suite.yml` like this:

{% highlight yaml %}
modules:
    enabled:
        - Symfony # 'ZF2' or 'Symfony'
        - Doctrine2:
            depends: Symfony
            cleanup: true # All doctrine queries will be wrapped in a transaction, which will be rolled back at the end of each test

{% endhighlight %}

If you don't use Symfony or Zend Framework, you need to specify a callback function to retrieve the Entity Manager:

{% highlight yaml %}
modules:
    enabled:
        - Doctrine2:
            connection_callback: ['MyDb', 'createEntityManager']
            cleanup: true # All doctrine queries will be wrapped in a transaction, which will be rolled back at the end of each test


{% endhighlight %}

This will use static method of `MyDb::createEntityManager()` to establish the Entity Manager.

By default, the module will wrap everything into a transaction for each test and roll it back afterwards
(this is controlled by the `cleanup` setting).
By doing this, tests will run much faster and will be isolated from each other.

To use the Doctrine2 Module in acceptance tests, set up your `acceptance.suite.yml` like this:

{% highlight yaml %}

modules:
    enabled:
        - Symfony:
            part: SERVICES
        - Doctrine2:
            depends: Symfony
``

You cannot use `cleanup: true` in an acceptance test, since Codeception and your app (i.e. browser) are using two
different connections to the database, so Codeception can't wrap changes made by the app into a transaction.

### Status

* Maintainer: **davert**
* Stability: **stable**
* Contact: codecept@davert.mail.ua

### Config

### Public Properties

* `em` - Entity Manager

### Note on parameters

Every method that expects some parameters to be checked against values in the database (`see...()`,
`dontSee...()`, `grab...()`) can accept instance of \Doctrine\Common\Collections\Criteria for more
flexibility, e.g.:


{% endhighlight %} php
$I->seeInRepository('User', [
    'name' => 'John',
    Criteria::create()->where(
        Criteria::expr()->endsWith('email', '@domain.com')
    ),
]);
```

If criteria is just a `->where(...)` construct, you can pass just expression without criteria wrapper:

{% highlight php %}

$I->seeInRepository('User', [
    'name' => 'John',
    Criteria::expr()->endsWith('email', '@domain.com'),
]);

{% endhighlight %}

Criteria can be used not only to filter data, but also to change order of results:

{% highlight php %}

$I->grabEntitiesFromRepository('User', [
    'status' => 'active',
    Criteria::create()->orderBy(['name' => 'asc']),
]);

{% endhighlight %}

Note that key is ignored, because actual field name is part of criteria and/or expression.

### Actions

#### clearEntityManager
 
Performs $em->clear():

{% highlight php %}

$I->clearEntityManager();

{% endhighlight %}


#### dontSeeInRepository
 
Flushes changes to database and performs `findOneBy()` call for current repository.

 * `param` $entity
 * `param array` $params


#### flushToDatabase
 
Performs $em->flush();


#### grabEntitiesFromRepository
 
Selects entities from repository.
It builds query based on array of parameters.
You can use entity associations to build complex queries.

Example:

{% highlight php %}

<?php
$users = $I->grabEntitiesFromRepository('AppBundle:User', array('name' => 'davert'));
?>

{% endhighlight %}

 * `Available since` 1.1
 * `param` $entity
 * `param array` $params. For `IS NULL`, use `array('field'=>null)`
 * `return` array


#### grabEntityFromRepository
 
Selects a single entity from repository.
It builds query based on array of parameters.
You can use entity associations to build complex queries.

Example:

{% highlight php %}

<?php
$user = $I->grabEntityFromRepository('User', array('id' => '1234'));
?>

{% endhighlight %}

 * `Available since` 1.1
 * `param` $entity
 * `param array` $params. For `IS NULL`, use `array('field'=>null)`
 * `return` object


#### grabFromRepository
 
Selects field value from repository.
It builds query based on array of parameters.
You can use entity associations to build complex queries.

Example:

{% highlight php %}

<?php
$email = $I->grabFromRepository('User', 'email', array('name' => 'davert'));
?>

{% endhighlight %}

 * `Available since` 1.1
 * `param` $entity
 * `param` $field
 * `param array` $params


#### haveFakeRepository
 
Mocks the repository.

With this action you can redefine any method of any repository.
Please, note: this fake repositories will be accessible through entity manager till the end of test.

Example:

{% highlight php %}

<?php

$I->haveFakeRepository('Entity\User', array('findByUsername' => function($username) {  return null; }));


{% endhighlight %}

This creates a stub class for Entity\User repository with redefined method findByUsername,
which will always return the NULL value.

 * `param` $classname
 * `param array` $methods


#### haveInRepository
 
Persists record into repository.
This method creates an entity, and sets its properties directly (via reflection).
Setters of entity won't be executed, but you can create almost any entity and save it to database.
If the entity has a constructor, for optional parameters the default value will be used and for non-optional parameters the given fields (with a matching name) will be passed when calling the constructor before the properties get set directly (via reflection).

Returns primary key of newly created entity. Primary key value is extracted using Reflection API.
If primary key is composite, array of values is returned.

{% highlight php %}

$I->haveInRepository('Entity\User', array('name' => 'davert'));

{% endhighlight %}

This method also accepts instances as first argument, which is useful when entity constructor
has some arguments:

{% highlight php %}

$I->haveInRepository(new User($arg), array('name' => 'davert'));

{% endhighlight %}

Alternatively, constructor arguments can be passed by name. Given User constructor signature is `__constructor($arg)`, the example above could be rewritten like this:

{% highlight php %}

$I->haveInRepository('Entity\User', array('arg' => $arg, 'name' => 'davert'));

{% endhighlight %}

If entity has relations, they can be populated too. In case of OneToMany the following format
ie expected:

{% highlight php %}

$I->haveInRepository('Entity\User', array(
    'name' => 'davert',
    'posts' => array(
        array(
            'title' => 'Post 1',
        ),
        array(
            'title' => 'Post 2',
        ),
    ),
));

{% endhighlight %}

For ManyToOne format is slightly different:

{% highlight php %}

$I->haveInRepository('Entity\User', array(
    'name' => 'davert',
    'post' => array(
        'title' => 'Post 1',
    ),
));

{% endhighlight %}

This works recursively, so you can create deep structures in a single call.

Note that both `$em->persist(...)`, $em->refresh(...), and `$em->flush()` are called every time.

 * `param string|object` $classNameOrInstance
 * `param array` $data


#### loadFixtures
 
Loads fixtures. Fixture can be specified as a fully qualified class name,
an instance, or an array of class names/instances.

{% highlight php %}

<?php
$I->loadFixtures(AppFixtures::class);
$I->loadFixtures([AppFixtures1::class, AppFixtures2::class]);
$I->loadFixtures(new AppFixtures);

{% endhighlight %}

By default fixtures are loaded in 'append' mode. To replace all
data in database, use `false` as second parameter:

{% highlight php %}

<?php
$I->loadFixtures(AppFixtures::class, false);

{% endhighlight %}

Note: this method requires `doctrine/data-fixtures` package to be installed.

 * `param string|string[]|object[]` $fixtures
 * `param bool` $append
@throws ModuleException
@throws ModuleRequireException


#### onReconfigure
 
HOOK to be executed when config changes with `_reconfigure`.


#### persistEntity
 
This method is deprecated in favor of `haveInRepository()`. It's functionality is exactly the same.


#### refreshEntities
 
Performs $em->refresh() on every passed entity:

{% highlight php %}

$I->refreshEntities($user);
$I->refreshEntities([$post1, $post2, $post3]]);

{% endhighlight %}

This can useful in acceptance tests where entity can become invalid due to
external (relative to entity manager used in tests) changes.

 * `param object|object[]` $entities


#### seeInRepository
 
Flushes changes to database, and executes a query with parameters defined in an array.
You can use entity associations to build complex queries.

Example:

{% highlight php %}

<?php
$I->seeInRepository('AppBundle:User', array('name' => 'davert'));
$I->seeInRepository('User', array('name' => 'davert', 'Company' => array('name' => 'Codegyre')));
$I->seeInRepository('Client', array('User' => array('Company' => array('name' => 'Codegyre')));
?>

{% endhighlight %}

Fails if record for given criteria can\'t be found,

 * `param` $entity
 * `param array` $params

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-doctrine2/tree/master/src/Codeception/Module/Doctrine2.php">Help us to improve documentation. Edit module reference</a></div>
