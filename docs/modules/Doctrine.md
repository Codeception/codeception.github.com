---
layout: doc
title: Doctrine - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Doctrine/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-doctrine/tree/master/src/Codeception/Module/Doctrine.php"><strong>source</strong></a></div>

# Doctrine
### Installation

{% highlight yaml %}
composer require --dev codeception/module-doctrine

{% endhighlight %}

### Description



Access the database using [Doctrine ORM](https://docs.doctrine-project.org/projects/doctrine-orm/en/latest/).

When used with Symfony or Zend Framework 2, Doctrine's Entity Manager is automatically retrieved from Service Locator.
Set up your `Functional.suite.yml` like this:

{% highlight yaml %}

modules:
    enabled:
        - Symfony # 'ZF2' or 'Symfony'
        - Doctrine:
            depends: Symfony # Tells Doctrine to fetch the Entity Manager through Symfony
            cleanup: true # All doctrine queries will be wrapped in a transaction, which will be rolled back at the end of each test

{% endhighlight %}

If you don't provide a `depends` key, you need to specify a callback function to retrieve the Entity Manager:

{% highlight yaml %}

modules:
    enabled:
        - Doctrine:
            connection_callback: ['MyDb', 'createEntityManager'] # Call the static method `MyDb::createEntityManager()` to get the Entity Manager

{% endhighlight %}

By default, the module will wrap everything into a transaction for each test and roll it back afterwards
(this is controlled by the `cleanup` setting).
By doing this, tests will run much faster and will be isolated from each other.

To use the Doctrine Module in acceptance tests, set up your `Acceptance.suite.yml` like this:

{% highlight yaml %}

modules:
    enabled:
        - Symfony:
            part: SERVICES
        - Doctrine:
            depends: Symfony

{% endhighlight %}

You cannot use `cleanup: true` in an acceptance test, since Codeception and your app (i.e. browser) are using two
different connections to the database, so Codeception can't wrap changes made by the app into a transaction.

Set the SQL statement that Doctrine fixtures ([`doctrine/data-fixtures`](https://github.com/doctrine/data-fixtures))
are using to purge the database tables:
{% highlight yaml %}

modules:
    enabled:
        - Doctrine:
            purge_mode: 1 # 1: DELETE (=default), 2: TRUNCATE

{% endhighlight %}

### Grabbing Entities with Symfony

For Symfony users, the recommended way to query for entities is not to use this module's `grab...()` methods, but rather
"inject" Doctrine's repository:

{% highlight php %}

public function _before(FunctionalTester $I): void
{
    $this->fooRepository = $I->grabService(FooRepository::class);
}

{% endhighlight %}

Now you have access to all your familiar repository methods in your tests, e.g.:

{% highlight php %}

$greenFoo = $this->fooRepository->findOneBy(['color' => 'green']);

{% endhighlight %}

### Public Properties

* `em` - Entity Manager

### Doctrine `Criteria` as query parameters

Every method that expects some query parameters (`see...()`,
`dontSee...()`, `grab...()`) also accepts an instance of
[\Doctrine\Common\Collections\Criteria](https://www.doctrine-project.org/projects/doctrine-collections/en/stable/expressions.html)
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

* `return void`

Performs $em->clear():

{% highlight php %}

$I->clearEntityManager();

{% endhighlight %}


#### dontSeeInRepository

* `param class-string` $entity
* `param array` $params
* `return void`

Flushes changes to database and performs `findOneBy()` call for current repository.


#### flushToDatabase

* `return void`

Performs $em->flush();


#### grabEntitiesFromRepository

* `template` T of object
* `param class-string<T>` $entity
* `param array` $params . For `IS NULL`, use `['field' => null]`
* `return list<T>`

Selects entities from repository.

It builds a query based on an array of parameters.
You can use entity associations to build complex queries.
For Symfony users, it's recommended to [use the entity's repository instead](#Grabbing-Entities-with-Symfony)

Example:

{% highlight php %}

<?php
$users = $I->grabEntitiesFromRepository(User::class, ['name' => 'davert']);

{% endhighlight %}


#### grabEntityFromRepository

* `template` T of object
* `version` 1.1
* `param class-string<T>` $entity
* `param array` $params . For `IS NULL`, use `['field' => null]`
* `return T`

Selects a single entity from repository.

It builds a query based on an array of parameters.
You can use entity associations to build complex queries.
For Symfony users, it's recommended to [use the entity's repository instead](#Grabbing-Entities-with-Symfony)

Example:

{% highlight php %}

<?php
$user = $I->grabEntityFromRepository(User::class, ['id' => '1234']);

{% endhighlight %}


#### grabFromRepository

* `param class-string` $entity
* `param string` $field
* `param array` $params
* `return mixed`

Selects field value from repository.

It builds a query based on an array of parameters.
You can use entity associations to build complex queries.
For Symfony users, it's recommended to [use the entity's repository instead](#Grabbing-Entities-with-Symfony)

Example:

{% highlight php %}

<?php
$email = $I->grabFromRepository(User::class, 'email', ['name' => 'davert']);

{% endhighlight %}


#### haveFakeRepository

* `param class-string` $className
* `param array` $methods
* `return void`

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


#### haveInRepository

* `template` T of object
* `param class-string<T>|T` $classNameOrInstance
* `param array` $data
* `return mixed`

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


#### loadFixtures

* `param class-string<FixtureInterface>|class-string<FixtureInterface>[]|list<FixtureInterface>` $fixtures
* `param bool` $append
* `throws ModuleException`
* `throws ModuleRequireException`
* `return void`

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


#### onReconfigure

* `return void`

HOOK to be executed when config changes with `_reconfigure`.


#### refreshEntities

* `param object|object[]` $entities
* `return void`

Performs $em->refresh() on every passed entity:

{% highlight php %}

$I->refreshEntities($user);
$I->refreshEntities([$post1, $post2, $post3]]);

{% endhighlight %}

This can useful in acceptance tests where entity can become invalid due to
external (relative to entity manager used in tests) changes.


#### seeInRepository

* `param class-string` $entity
* `param array` $params
* `return void`

Flushes changes to database, and executes a query with parameters defined in an array.

You can use entity associations to build complex queries.

Example:

{% highlight php %}

<?php
$I->seeInRepository(User::class, ['name' => 'davert']);
$I->seeInRepository(User::class, ['name' => 'davert', 'Company' => ['name' => 'Codegyre']]);
$I->seeInRepository(Client::class, ['User' => ['Company' => ['name' => 'Codegyre']]]);

{% endhighlight %}

Fails if record for given criteria can\'t be found,

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-doctrine/tree/master/src/Codeception/Module/Doctrine.php">Help us to improve documentation. Edit module reference</a></div>
