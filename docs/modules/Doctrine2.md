---
layout: doc
title: Doctrine2 - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Doctrine2/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-doctrine2/tree/master/src/Codeception/Module/Doctrine2.php"><strong>source</strong></a></div>

# Doctrine2
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-doctrine2

{% endhighlight %}

Alternatively, you can enable `Doctrine2` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



Access the database using [Doctrine2 ORM](https://docs.doctrine-project.org/projects/doctrine-orm/en/latest/).

When used with Symfony or Zend Framework 2, Doctrine's Entity Manager is automatically retrieved from Service Locator.
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
            connection_callback: ['MyDb', 'createEntityManager'] # Call the static method `MyDb::createEntityManager()` to get the Entity Manager

{% endhighlight %}

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

{% endhighlight %}

You cannot use `cleanup: true` in an acceptance test, since Codeception and your app (i.e. browser) are using two
different connections to the database, so Codeception can't wrap changes made by the app into a transaction.

Change purge mode of doctrine fixtures:
{% highlight yaml %}

modules:
    enabled:
        - Doctrine2:
            purge_mode: 1 //1 - DELETE, 2 - TRUNCATE, default DELETE

{% endhighlight %}

### Status

* Maintainer: **davert**
* Stability: **stable**
* Contact: codecept@davert.mail.ua

### Config

### Public Properties

* `em` - Entity Manager

### Note on parameters

Every method that expects some parameters to be checked against values in the database (`see...()`,
`dontSee...()`, `grab...()`) can accept instance of
[\Doctrine\Common\Collections\Criteria](https://www.doctrine-project.org/api/collections/latest/Doctrine/Common/Collections/Criteria.html)
for more flexibility, e.g.:

{% highlight php %}

$I->seeInRepository(User::class, [
    'name' => 'John',
    Criteria::create()->where(
        Criteria::expr()->endsWith('email', '@domain.com')
    ),
]);

{% endhighlight %}

If criteria is just a `->where(...)` construct, you can pass just expression without criteria wrapper:

{% highlight php %}

$I->seeInRepository(User::class, [
    'name' => 'John',
    Criteria::expr()->endsWith('email', '@domain.com'),
]);

{% endhighlight %}

Criteria can be used not only to filter data, but also to change the order of results:

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
$users = $I->grabEntitiesFromRepository(User::class, ['name' => 'davert']);
?>

{% endhighlight %}

 * `Available since` 1.1
 * `param` $entity
 * `param array` $params. For `IS NULL`, use `['field' => null]`
 * `return array` 


#### grabEntityFromRepository
 
Selects a single entity from repository.
It builds query based on array of parameters.
You can use entity associations to build complex queries.

Example:

{% highlight php %}

<?php
$user = $I->grabEntityFromRepository(User::class, ['id' => '1234']);
?>

{% endhighlight %}

 * `Available since` 1.1
 * `param` $entity
 * `param array` $params. For `IS NULL`, use `['field' => null]`
 * `return object` 


#### grabFromRepository
 
Selects field value from repository.
It builds query based on array of parameters.
You can use entity associations to build complex queries.

Example:

{% highlight php %}

<?php
$email = $I->grabFromRepository(User::class, 'email', ['name' => 'davert']);
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

$I->haveFakeRepository(User::class, ['findByUsername' => function($username) { return null; }]);


{% endhighlight %}

This creates a stub class for Entity\User repository with redefined method findByUsername,
which will always return the NULL value.

 * `param` $classname
 * `param array` $methods


#### haveInRepository
 
Persists a record into the repository.
This method creates an entity, and sets its properties directly (via reflection).
Setters of the entity won't be executed, but you can create almost any entity and save it to the database.
If the entity has a constructor, for optional parameters the default value will be used and for non-optional parameters the given fields (with a matching name) will be passed when calling the constructor before the properties get set directly (via reflection).

Returns the primary key of the newly created entity. The primary key value is extracted using Reflection API.
If the primary key is composite, an array of values is returned.

{% highlight php %}

$I->haveInRepository(User::class, ['name' => 'davert']);

{% endhighlight %}

This method also accepts instances as first argument, which is useful when the entity constructor
has some arguments:

{% highlight php %}

$I->haveInRepository(new User($arg), ['name' => 'davert']);

{% endhighlight %}

Alternatively, constructor arguments can be passed by name. Given User constructor signature is `__constructor($arg)`, the example above could be rewritten like this:

{% highlight php %}

$I->haveInRepository(User::class, ['arg' => $arg, 'name' => 'davert']);

{% endhighlight %}

If the entity has relations, they can be populated too. In case of
[OneToMany](https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#one-to-many-bidirectional)
the following format is expected:

{% highlight php %}

$I->haveInRepository(User::class, [
    'name' => 'davert',
    'posts' => [
        ['title' => 'Post 1'],
        ['title' => 'Post 2'],
    ],
]);

{% endhighlight %}

For [ManyToOne](https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#many-to-one-unidirectional)
the format is slightly different:

{% highlight php %}

$I->haveInRepository(User::class, [
    'name' => 'davert',
    'post' => [
        'title' => 'Post 1',
    ],
]);

{% endhighlight %}

This works recursively, so you can create deep structures in a single call.

Note that `$em->persist()`, `$em->refresh()`, and `$em->flush()` are called every time.

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

This method requires [`doctrine/data-fixtures`](https://github.com/doctrine/data-fixtures) to be installed.

 * `param string|string[]|object[]` $fixtures
 * `param bool` $append
@throws ModuleException
@throws ModuleRequireException


#### onReconfigure
 
HOOK to be executed when config changes with `_reconfigure`.


#### persistEntity
 
This method is deprecated in favor of `haveInRepository()`. Its functionality is exactly the same.


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
$I->seeInRepository(User::class, ['name' => 'davert']);
$I->seeInRepository(User::class, ['name' => 'davert', 'Company' => ['name' => 'Codegyre']]);
$I->seeInRepository(Client::class, ['User' => ['Company' => ['name' => 'Codegyre']]]);
?>

{% endhighlight %}

Fails if record for given criteria can\'t be found,

 * `param` $entity
 * `param array` $params

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-doctrine2/tree/master/src/Codeception/Module/Doctrine2.php">Help us to improve documentation. Edit module reference</a></div>
