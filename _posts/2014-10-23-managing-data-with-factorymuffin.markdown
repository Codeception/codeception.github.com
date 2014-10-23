---
layout: post
title: "Managing Data with FactoryMuffin"
date: 2014-10-23 01:03:50
---

One of the greatest things of testing Ruby on Rails applications was usage of Factories, managed by [FactoryGirl](https://github.com/thoughtbot/factory_girl). It changed the way the test data was managed in test. Instead of defining fixtures one by one, in a single `.yml` configuration, it allowed to generate required models per test. This concept is very convenient, however it is not widespread in PHP world. Probably, this was because, there is no single ORM in PHP, like ActiveRecord is for Ruby. We have Doctrine, Eloquent, and each major framework has its own ORM layer, so that we it is pretty hard to deal with models of those frameworks in one manner.

But it looks like factories finally came to PHP! [The League of Extraordinary Packages](http://thephpleague.com/) produced a great package, self-claimed as factory_girl for PHP. Meet [Factory Muffin](http://factory-muffin.thephpleague.com/). It allows simple generation of database records for integration and functional testing. Let's see how it can be used with Codeception.

## Setup in Codeception

At first lets add `league/factory-muffin": "~2.0` to `composer.json`:

{% highlight bash %}
"require-dev": {
    "codeception/codeception": "~2.0",
    "league/factory-muffin": "~2.0"
}
{% endhighlight %}

Then we execute `composer install`.

{% highlight bash %}
Loading composer repositories with package information
Updating dependencies (including require-dev)
  - Installing fzaninotto/faker (v1.4.0)
    Downloading: 100%         

  - Installing league/factory-muffin (v2.1.1)
    Downloading: 100%         

Writing lock file
Generating autoload files
Generating optimized class loader
{% endhighlight %}

As you may noticed, FactoryMuffin uses awesome [Faker](https://github.com/fzaninotto/Faker) library for generating random data for models. 

For using factories inside tests we will create `FactoryHelper`:

{% highlight bash %}
php vendor/bin/codecept g:helper Factory
Helper /home/davert/project/tests/_support/FactoryHelper.php created
{% endhighlight %}

We will define factories in the `_initialize` method of `FactoryHelper`.
Let's say we have two models, `Post` and `User` in application. This is how we specify rules for generating new objects of these models. 

{% highlight php %}
<?php
class FactoryHelper extends \Codeception\Module
{
    /**
     * @var \League\FactoryMuffin\Factory
     */
    protected $factory;
    
    public function _initialize()
    {
        $this->factory = new \League\FactoryMuffin\Factory;
        $this->factory->define('Post', array(
            'title'    => 'sentence|5', // title with random 5 words
            'body'   => 'text', // random text
        ));

        $this->factory->define('User', array(
            'email' => 'unique:email', // random unique email
        ));
    }
}
?>
{% endhighlight %}

This is how generation of Post and User is defined. From the box, Muffin is designed to work with ActiveRecord models, and with Eloquent in particular. So you can use it in Yii, Phalcon, yet we will **demonstrate its usage in Laravel application**. FactoryMuffin can also be customized to work with Doctrine as well.

## Using Factories in Laravel

To use FactoryMuffin in Laravel functional tests we need to create additional methods in `FactoryHelper` for generating and saving records: `havePosts` and `haveUsers` methods. They will populate database with number of records specified. We will need to clean up those records at the end of a test.

{% highlight php %}
<?php
class FactoryHelper extends \Codeception\Module
{
    /**
     * @var \League\FactoryMuffin\Factory
     */
    protected $factory;
    
    public function _initialize()
    {
        $this->factory = new \League\FactoryMuffin\Factory;
        $this->factory->define('Post', array(
            'title'    => 'sentence|5', // title with random 5 words
            'body'   => 'text', // random text
        ));

        $this->factory->define('User', array(
            'email' => 'unique:email', // random unique email
        ));
    }

    public function havePosts($num)
    {
        $this->factory->seed($num, 'Post');
    }

    public function haveUsers($num)
    {
        $this->factory->seed($num, 'Post');
    }

    public function _after(\Codeception\TestCase $test)
    {
        // actually this is not needed
        // if you use cleanup: true option 
        // in Laravel4 module
        $this->factory->deleteSaved();
    }
}
?>
{% endhighlight %}

By including FactoryHelper to the functional suite config, we can use it inside the actor (`$I`) object. 

This allows us to test features like pagination. For instance, we can check that only 20 posts are listed on a page:

{% highlight php %}
<?php
$I = new FunctionalTester($scenario);
$I->wantTo('check that only 20 posts are listed');
$I->havePosts(40);
$I->amOnPage('/posts');
$I->seeNumberOfElements('.post', 20);
?>
{% endhighlight %}

[Source code of this example is on GitHub](https://github.com/Codeception/sample-l4-app/commit/7057518d41eaff6bbba2d4bea7aee400cf504492).

## Factories in Unit Tests

Factories can also be used in unit testing. Let's say user can create posts, and in order to optimize queries we are saving number of user posts in `num_posts` column of `users` table. We are going to test that this column is updated each time a new post by user is created. 

We will need one more method added into `FactoryHelper` class:

{% highlight php %}
<?php
public function produce($model, $attributes = array())
{
    return $this->factory->create($model, $attributes);
}
?>
{% endhighlight %}

After we include `FactoryHelper` into unit suite we can use its methods in tests:

{% highlight php %}
<?php
class UserTest extends \Codeception\TestCase\Test
{
    /**
     * @var UnitTester
     */
    protected $tester;

    function testCounterCache()
    {
        $user = $this->tester->produce('User');
        $this->assertEquals(0, $user->num_posts);

        $this->tester->produce('Post', ['user_id' => $user->id]);
        $this->assertEquals(1, User::find($user->id)->num_posts);

        $this->tester->produce('Post', ['user_id' => $user->id]);
        $this->assertEquals(2, User::find($user->id)->num_posts);
    }
}
?>
{% endhighlight %}

## Conclusion

As you see, factories make your tests clean and expressive. 
Forget about managing test data manually, forget about fixtures. Use [FactoryMuffin](http://factory-muffin.thephpleague.com/).

**Update** [FactoryHelper for Symfony2 and Doctrine modules](https://github.com/DavertMik/SymfonyCodeceptionApp/blob/factories/tests/_support/FactoryHelper.php)