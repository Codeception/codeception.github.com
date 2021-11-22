---
layout: post
title: "Using Codeception for Symfony Projects"
date: 2015-09-04 01:03:50
---

Codeception Testing Framework from its roots was a plugin of symfony 1 framework. Today Codeception is powered by Symfony components and can be used to run functional tests for practically any popular PHP framework. 

Why would you someone ever choose Codeception if Symfony already has mature testing infrastructure. Well, here are our reasons. Codeception tests are: 

* **fast**, as each functional/integration test is wrapped into transaction using Doctrine ORM
* **scenario-driven**, it means that tests are linear, described in easy to get PHP DSL
* can be used for **testing complex interactions** inside functional tests.
* **easy to write**, as Codeception already provides bundled actions and assertions for most popular use cases.  
* combine **all testing levels** (acceptance, functional, unit) in one tool.


Today we will write how Codeception can be installed into a Symfony project and fit with its structure: we will put functional and unit tests to corresponding bundles, write acceptance tests for complete application, and use one runner to execute them all at once.

![symfony-demo](https://farm8.staticflickr.com/7720/17002708897_fb52f39a39_o.png)

We will use official [symfony-demo](https://symfony.com/blog/introducing-the-symfony-demo-application) application in this example. Once you get it [installed](https://github.com/symfony/symfony-demo#installation) you should add Codeception testing framework to dev dependencies list in `composer.json`:  

{% highlight bash %}
composer require --dev "codeception/codeception:~2.1"
{% endhighlight %}

As you may know Codeception has `bootstrap` command which create common file structure for acceptance, functional, and unit tests. However, as we decided we will follow Symfony way and skip creating global functional and unit tests. So we start with bootstrapping empty project without predefined suites.

{% highlight bash %}
php bin/codecept bootstrap --empty
{% endhighlight %}

As you may see, we got new `tests` directory and `codeception.yml` file created. Let's have acceptance tests there:

{% highlight bash %}
php bin/codecept g:suite acceptance
{% endhighlight %}

Acceptance tests are expected to test the site from an end-user's perspective. No matter how many unit tests you have in your projects you can't get without acceptance testing. What if you see a blank page even all unit tests passed. How could this happen? Maybe you rendered wrong template, maybe some scripts or styles were not loaded. Those things can't be handled with internal: unit or functional testing, however with acceptance tests you may be confident that UI is available for customers. 

That's why we recommend to have tests with real browser interaction. You can [learn more about acceptance testing](https://codeception.com/docs/03-AcceptanceTests) from our guides.

But what about unit and functional tests? As we decided we will put them into bundles. *Symfony-demo* has only *AppBundle* included, so we will create new Codeception setup in `src/AppBundle`. Take a note that we want those tests to be placed in their own namespace:

{% highlight bash %}
php bin/codecept bootstrap --empty src/AppBundle --namespace AppBundle
{% endhighlight %}

We will also create `unit` and `functional` suites there:

{% highlight bash %}
php bin/codecept g:suite functional -c src/AppBundle
php bin/codecept g:suite unit -c src/AppBundle
{% endhighlight %}

As you noticed we specify path to different Codeception setup with `-c` or `--config` option. 

Unit tests of Codeception are not quite different from regular PHPUnit tests. You can even copy your old PHPUnit tests to `src/AppBundle/tests/unit` and have Codeception run them. It is much more interesting to use Codeception to have functional tests replacing ones extending `Symfony\Bundle\FrameworkBundle\Test\WebTestCase` class. 

Let's have a test that will check that there is specific number of posts on a page. Symfony-demo app has the [similar test](https://github.com/symfony/symfony-demo/blob/master/src%2FAppBundle%2FTests%2FController%2FBlogControllerTest.php#L29) included:

{% highlight php %} 
<?php
namespace AppBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\Post;

class BlogControllerTest extends WebTestCase
{
  public function testIndex()
  {
      $client = static::createClient();
      $crawler = $client->request('GET', '/en/blog/');
      $this->assertCount(
          Post::NUM_ITEMS,
          $crawler->filter('article.post'),
          'The homepage displays the right number of posts.'
      );
  }
}
{% endhighlight %} 


We will rewrite it in Codeception manner. At first we are generating new empty test case for it. We use scenario-driven test format called Cest:

{% highlight bash %}
php bin/codecept g:cest functional BlogCest -c src/AppBundle
{% endhighlight %}

And here goes the test:

{% highlight php %} 
<?php
namespace AppBundle;
use AppBundle\Entity\Post;

class BlogCest 
{
    public function postsOnIndexPage(FunctionalTester $I)
    {
        $I->amOnPage('/en/blog/');
        $I->seeNumberOfElements('article.post', Post::NUM_ITEMS);
    }
}
?>
{% endhighlight %} 

As you see, Codeception test is shorter. It is simple, clean, and can be easily extended for more complex interactions. However, we are not ready to run it yet. We need to prepare Codeception to run functional tests inside Symfony context. For this we need to edit `src/AppBundle/tests/functional.yml` configuration file to enable modules: `Symfony2` and `Doctrine2` to use:

{% highlight yaml %}
class_name: FunctionalTester
modules:
    enabled:
        - Symfony2:
            app_path: '../../app'
            var_path: '../../app'
        - Doctrine2:
            depends: Symfony2
        - \AcmeBundle\Helper\Functional
{% endhighlight %} 

The most important thing here is to provide valid app and var paths for Symfony. Also we are specifying that Doctrine's EntityManager should be taken from Symfony DIC. Let's run functional tests of AppBundle:

{% highlight bash %}
php bin/codecept run functional -c src/AppBundle
{% endhighlight %}

In this case you will see following output:

{% highlight bash %}
Codeception PHP Testing Framework v2.1.2
Powered by PHPUnit 4.8.2 by Sebastian Bergmann and contributors.

AcmeBundle.functional Tests (1) ------------------------
Posts on index page (BlogCest::postsOnIndexPage)     Ok
--------------------------------------------------------


Time: 274 ms, Memory: 36.00Mb

OK (1 test, 1 assertion)
{% endhighlight %}

But you can do much more with functional testing. You can insert/assert data with Doctrine by using prepared methods like `haveInRepository`, `seeInRepository` of [Doctrine2](https://codeception.com/docs/modules/Doctrine2) module. You can perform complex web interactions like filling forms, clicking links, following redirects and much more with methods of [Symfony2](https://codeception.com/docs/modules/Symfony2) module. Those modules are combined together and their methods are available in `FunctionalTester` class you are supposed to use for writing functional tests. If you are interested to see more complex Codeception tests, we've got [them for you](https://github.com/Codeception/symfony-demo/blob/2.1/src%2FAppBundle%2Ftest%2Ffunctional%2FPostCrudCest.php).

Btw, you can use Symfony2 and Doctrine2 module for writing your unit and integration tests as well. 

---

But how can we run acceptance tests of a project with tests from AppBundle together? We need to edit `codeception.yml` configuration file in project root to make it. Let's add those lines there:

{% highlight yaml %}
include:
    - src/*Bundle
{% endhighlight %}

That's it. For now Codeception will include all installations stored in Bundles on run. If you execute:

{% highlight bash %}
php bin/codecept run
{% endhighlight %}

you will probably see that `BlogCest` of `AppBundle` was executed as it was expected to. 


---

![tests](https://github.com/Codeception/symfony-demo/raw/2.1/app/data/demo.png)

The most complex thing in starting using Codeception with Symfony is have it configured. Despite Codeception is auto-connecting to Symfony framework and Doctrine you still have to do some changes to follow Symfony structure. Please **take a detailed look into [our forked version of symfony-demo project](https://github.com/Codeception/symfony-demo)** 
which we configured in the manner we described in this post. Please use similar configuration for all your Symfony projects.

Start using Codeception and discover how complex things can be tested in really simple manner. And once again, even functional and integration tests are really fast, as we start transaction before each test and rollback it afterwards. Write them as many as you need to, do not rely on unit tests only!

**P.S.** Symfony2 and Doctrine2 module is seeking for an active maintainer. If you work with Symfony and Codeception please [contact us](https://codeception.com/credits) to join Codeception team!