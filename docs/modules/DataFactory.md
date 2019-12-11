---
layout: doc
title: DataFactory - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-datafactory/tree/master/src/Codeception/Module/DataFactory.php"><strong>source</strong></a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/3.1/docs/modules/DataFactory.md">3.1</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.5/docs/modules/DataFactory.md">2.5</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/DataFactory.md">1.8</a></div>

# DataFactory
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/codeception/module-datafactory

{% endhighlight %}

Alternatively, you can enable `DataFactory` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



DataFactory allows you to easily generate and create test data using [**FactoryMuffin**](https://github.com/thephpleague/factory-muffin).
DataFactory uses an ORM of your application to define, save and cleanup data. Thus, should be used with ORM or Framework modules.

This module requires packages installed:

{% highlight json %}

{
 "league/factory-muffin": "^3.0",
}

{% endhighlight %}

Generation rules can be defined in a factories file. You will need to create `factories.php` (it is recommended to store it in `_support` dir)
Follow [FactoryMuffin documentation](https://github.com/thephpleague/factory-muffin) to set valid rules.
Random data provided by [Faker](https://github.com/fzaninotto/Faker) library.

{% highlight php %}

<?php
use League\FactoryMuffin\Faker\Facade as Faker;

$fm->define(User::class)->setDefinitions([
 'name'   => Faker::name(),

    // generate email
   'email'  => Faker::email(),
   'body'   => Faker::text(),

   // generate a profile and return its Id
   'profile_id' => 'factory|Profile'
]);

{% endhighlight %}

Configure this module to load factory definitions from a directory.
You should also specify a module with an ORM as a dependency.

{% highlight yaml %}

modules:
    enabled:
        - Yii2:
            configFile: path/to/config.php
        - DataFactory:
            factories: tests/_support/factories
            depends: Yii2

{% endhighlight %}

(you can also use Laravel5 and Phalcon).

In this example factories are loaded from `tests/_support/factories` directory. Please note that this directory is relative from the codeception.yml file (so for Yii2 it would be codeception/_support/factories).
You should create this directory manually and create PHP files in it with factories definitions following [official documentation](https://github.com/thephpleague/factory-muffin#usage).

In cases you want to use data from database inside your factory definitions you can define them in Helper.
For instance, if you use Doctrine, this allows you to access `EntityManager` inside a definition.

To proceed you should create Factories helper via `generate:helper` command and enable it:

{% highlight yaml %}
modules:
    enabled:
        - DataFactory:
            depends: Doctrine2
        - \Helper\Factories


{% endhighlight %}

In this case you can define factories from a Helper class with `_define` method.

{% highlight php %}

<?php
public function _beforeSuite()
{
     $factory = $this->getModule('DataFactory');
     // let us get EntityManager from Doctrine
     $em = $this->getModule('Doctrine2')->_getEntityManager();

     $factory->_define(User::class, [

         // generate random user name
         // use League\FactoryMuffin\Faker\Facade as Faker;
         'name' => Faker::name(),

         // get real company from database
         'company' => $em->getRepository(Company::class)->find(),

         // let's generate a profile for each created user
         // receive an entity and set it via `setProfile` method
         // UserProfile factory should be defined as well
         'profile' => 'entity|'.UserProfile::class
     ]);
}

{% endhighlight %}

Factory Definitions are described in official [Factory Muffin Documentation](https://github.com/thephpleague/factory-muffin)

#### Related Models Generators

If your module relies on other model you can generate them both.
To create a related module you can use either `factory` or `entity` prefix, depending on ORM you use.

In case your ORM expects an Id of a related record (Eloquent) to be set use `factory` prefix:

{% highlight php %}

'user_id' => 'factory|User'

{% endhighlight %}

In case your ORM expects a related record itself (Doctrine) then you should use `entity` prefix:

{% highlight php %}

'user' => 'entity|User'

{% endhighlight %}

### Actions

#### have
 
Generates and saves a record,.

{% highlight php %}

$I->have('User'); // creates user
$I->have('User', ['is_active' => true]); // creates active user

{% endhighlight %}

Returns an instance of created user.

 * `param string` $name
 * `param array` $extraAttrs

 * `return` object


#### haveMultiple
 
Generates and saves a record multiple times.

{% highlight php %}

$I->haveMultiple('User', 10); // create 10 users
$I->haveMultiple('User', 10, ['is_active' => true]); // create 10 active users

{% endhighlight %}

 * `param string` $name
 * `param int` $times
 * `param array` $extraAttrs

 * `return` \object[]


#### make
 
Generates a record instance.

This does not save it in the database. Use `have` for that.

{% highlight php %}

$user = $I->make('User'); // return User instance
$activeUser = $I->make('User', ['is_active' => true]); // return active user instance

{% endhighlight %}

Returns an instance of created user without creating a record in database.

 * `param string` $name
 * `param array` $extraAttrs

 * `return` object


#### onReconfigure
 
@throws ModuleException

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-datafactory/tree/master/src/Codeception/Module/DataFactory.php">Help us to improve documentation. Edit module reference</a></div>
