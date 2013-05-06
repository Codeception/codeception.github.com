---
layout: post
title: "Specification or Testing: The Comparison of Behat and Codeception"
date: 2013-05-06 22:03:50
---

*This is guest post by [Ragazzo](https://github.com/Ragazzo). He uses Behat as well as Codeception for making his project better. He was often asked to do a **comparison between Codeception, Behat, and PhpUnit**. In this post he explains the commons and different parts of this products.*

In nowadays almost everyone knows how it is important to have stable and tested application. It is very difficult to create good application without involving different specific tools in your project. It is very important to develop your application through testing, according to TDD principle. There are different ways to write tests in PHP: 

* Classical unit-tests with PhpUnit;
* Functional (integration / end-to-end) tests with PhpUnit
* Functional web tests with Codeception / Behat+Mink
* Acceptance web tests with Codeception / Behat+Mink.

### My vision of BDD.

Main difference between usual functional and acceptance tests is that in acceptance tests you can not manipulate directly with some "underground" application code. All you can do is just interact with things that was given to you by application. In functional tests you can interact with application internals, proceed some checks and conditions that can involve application parts not available for end-user. 

If we are talking about "classical" functional tests also known as "end-to-end" or "integration" tests then simple example can be when you have to test some behavior of 2-3 components together, like logging, writing configs, etc. **For functional tests (but not web) I prefer to use Behat** by itself. And I have some reasons for that.

**Behavior Driven Development**  helps you to start developing project from "how it must behave" and not from "what concrete components it must include in particular".

It can be said that you write your thoughts about behavior of your application. And this helps you to build not simply a couple of classes powered by unit-tests, but an application with good design based on specific behavior. **Behat** is very powerful tool, but it has some common pitfalls that maybe looks weird to the user:

* It could be said that it is a **feature driven development**. Thats why it is not so easy to use *subcontexts* in Behat. For example, if you have 30-40 tests it could be hard to maintain them, because of the same PhpDoc definitions for matching methods.
* If you use Behat+Mink for functional and acceptance tests, it also requires from you a good knowledge of  Mink's internals to create your own methods to interact with a page.

Lets see the example on how you can determine what components you need in your application in a "BDD" way.
Here we are creating dummy application for managing football clubs. Lets write some 2-3 scenarios in **Gherkin**:

{% highlight gherkin %}
#football_clubs.feature

Feature: football_clubs
  As a football club owner
  I want to perform different actions with it.

  Scenario: transfer player to the club
    Given I have a football club "MyClub"
    Given Football club budget is 100 mln. dollars
    Given Football player "GoodSkilledPlayer" costs 35 mln. dollars
    When I try to buy this player
    And He see is available for transfer
    Then I sign player contract with 10 mln. dollars salary
    And I see player club is now "MyClub"

  Scenario: get list of injured players
    Given I have a football club "MyClub"
    When I get a list of injured players
    Then I see players in list:
    """
    FirstFootballPlayer
    SecondFootballPlayer
    """
    And I dont see players in list:
    """
    ThirdFootballPlayer
    """
{% endhighlight %}

  Thats all. We just wrote some thoughts on how an application should behave. From here we know what exactly we need: "Football Player" object, "Football Club" object, "Transfers Market" object. **If you know how they must behave you do not need to think for hours on what unit-test you need to write, and whether they are really needed in the component behavior.**

  Lets see another example of functional tests with Behat, for example we need to test config files of our system. Feature for that can be like this:

{% highlight gherkin %}
#config.feature
Feature:
  In order to proceed config files for MyModule
  As a system root user i should be able
  to write correct info in files

  Scenario: write some users "context" info
  Given I have users in system:
    | username | email              |
    | first    | first@example.com  |
    | second   | second@example.com |
  When I dump users info to config file
  Then I should see
  """
  #users
  username=first
  email=first@example.com

  username=second
  email=second@example.com
  """
{% endhighlight %}

As you see it is easy to read and also easy to understand. Thats why I prefer ```Behat``` for "classic" functional tests against usage of PhpUnit to test behavior of 2-3 components.

## Ways of Writing Acceptance Tests
 
Now lets talk about functional and acceptance tests for web. Now we know difference between acceptance and functional tests, so in web tests difference is the same. There is a couple of tools to use for web functional and acceptance tests:

* PhpUnit + Selenium
* Behat + Mink
* Codeception
 
**I do prefer Codeception over Behat+Mink for web acceptance and functional tests** for these reasons:

* In web it is not very important to develop pages from how they need to behave. So there all power of Gherkin could not be applied. In this case Gherkin works just as simple translator and nothing more. My decision is to use right things for right purposes.
* As I've pointed out above you also need to know Mink "internals" (API) to proceed some your custom methods.
* Testing web-pages can lead to many ambiguous or redundant Gherkin steps.

Of course there are some things to avoid this, but i prefer "easy-to-learn things" in this situation.
 
In that case Codeception offeres you a simple and very easy way to test your web application. Also I need to
notice that Codeception takes low-level Mink's API and provides a high-level commands for end-user.
 
For example lets see simple ```Codeception``` Cept test case:
 
{% highlight php %}
<?php
$I = new TestGuy($scenario);
$I->wantTo('Test index page');
$I->amOnPage('/index.php');
$I->see('My Web Application','#header #logo');
$I->click('Login');
$I->see('Login','h1');
$I->see('Username');
$I->amGoingTo('login in the test app');
$I->fillField('#LoginForm_username','demo');
$I->fillField('#LoginForm_password','demo');
$I->click('#login-form input[type="submit"]');
$I->seeLink('Logout (demo)');
$I->click('Logout (demo)');
$I->seeLink('Login');
?>
{% endhighlight %}
 
As you can see it is easy to read, and one really great thing is it is easy to write, because of auto-completion. In Behat when using Gherkin you can get some *"Undefined steps"* errors, just because you mistyped something. And it happens to be annoying. 

Codeception bundled with modules for functional and acceptance tests: PhpBrowser (functional tests over curl), Selenium (1,2) for acceptance tests, etc. There are also some nice modules for REST, SOAP and XML-RPC that can help you to test your API.

It is need to be noticed that there are two types of web tests in Codeception: some require webserver and others not - all requests are processed directly by your applcation using Symfony's BrowserKit Component.
 
Overall, my choice in Codeception is to use "PhpBrowser" module (requires a web-server) for headless web functional tests, and "Selenium2" module for complete web acceptance tests. Codeception also can generate BDD-style scenarios for you based on your Cepts.

Also need to notice that maybe Codeception is not a "true" BDD, unlike Behat. Behat+Gherkin helps you to use and design your application. Codeception helps you to test it nicely.

*This post was intended to be a start to series. In next posts you will learn how to use newcoming Cest format for testing and integrate Codeception with Continious integration tools. Stay tuned!*