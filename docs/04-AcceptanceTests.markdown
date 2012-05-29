---
layout: page
title: Codeception - Documentation
---

# Acceptance Testing
Acceptance testing is testing that can be performed by a non-technical person. That person can be your tester, manager or even client.
If you are developing a web-application (and probably you are) the tester needs nothing more then a web browser to check that your site works correctly. In Codeception we call such testers a WebGuy. You can reproduce a WebGuy's actions in scenarios and run them automatically after each site change. Codeception keeps tests clean and simple, since they were recorded from the words of WebGuy. 

It makes no difference what CMS or Framework is used on the site. You can event test sites created on different platforms, like Java, .NET, etc. It's always a good idea to add tests to your web site. At least you will be sure that site features work after the last changes were made. 

## Sample Scenario

Probably the first test you would want to run would be signing in. In order to write such a test, we still require basic knowledge of PHP and HTML.

{% highlight php %}

{% endhighlight %}

This scenario can probably be read by non-technical people. Codeception can even 'naturalize' this scenario, converting it into plain English:

{% highlight yaml %}

I WANT TO SIGN IN
I am on page '/login'
I fill field ['signin[username]', 'davert']
I fill field ['signin[password]', 'qwerty']
I click 'LOGIN'
I see 'Welcome, Davert!'

{% endhighlight %}

Such transformations can be done by command: 

{% highlight yaml %}
bash
$ codecept generate:scenarios

{% endhighlight %}

Generated scenarios will be stored in your data dir within text files.

This scenario can be performed either by a simple PHP browser or by a browser through Selenium (also Sahi or ZombieJS). We will start writing our first acceptance tests with a PHP Browser. This is a good place to start If you don't have experience working with Selenium Server or Sahi. 

## PHP Browser

This is the fastest way to run acceptance tests, since it doesn't require running an actual browser. We use a PHP web spider, which acts like a browser: it sends a request, then receives and parses the response. For such a browser Codeception uses [Goutte Web Scrapper](https://github.com/fabpot/Goutte) driven by [Mink](http://mink.behat.org). Unlike common browsers Goutte has no rendering or javascript processing engine, so you can't test actual visibility of elements, or javascript interactions. The good thing about Goutte is that it can be run in any environment, with just PHP required.

Before we start we need a local copy of the site running on your host. We need to specify the url parameter in the acceptance suite config (tests/acceptance.suite.yml).

{% highlight yaml %}
yaml
class_name: WebGuy
modules:
    enabled:
        - PhpBrowser
        - WebHelper
        - Db
    config:
        PhpBrowser:
            url: [your site's url]

{% endhighlight %}

We should start by creating a 'Cept' file in the __tests/acceptance__ dir. Let's call it __SigninCept.php__. We will write the first lines into it.

{% highlight php %}

{% endhighlight %}

The `wantTo` section describes your scenario in brief. There are additional comment methods that are useful to make a Codeception scenario a BDD Story. If you have ever written a BDD scenario in Gherkin, you can translate a classic story into Codeception code.

{% highlight yaml %}
bash
As an Account Holder
I want to withdraw cash from an ATM
So that I can get money when the bank is closed


{% endhighlight %}

Becomes:

{% highlight php %}

{% endhighlight %}

After we have described the story background, let's start writing a scenario. 

The `$I` object is used to write all interactions. The methods of the `$I` object are taken from the `PHPBrowser` and `Db` modules. We will briefly describe them here, but for the full reference look into the modules reference, here on (Codeception.com)[http://codeception.com]. 

{% highlight php %}

{% endhighlight %}

We assume that all `am` commands should describe the starting environment. The `amOnPage` command sets the starting point of test on the __/login page__. By default the browser starts on the front page of your local site. 

With the `PhpBrowser` you can click the links and fill the forms. Probably that will be the majority of your actions.

#### Click

Emulates a click on valid anchors. The page from the "href" parameter will be opened.
As a parameter you can specify the link name or a valid CSS selector. Before clicking the link you can perform a check if the link really exists on a page. This can be done by the `seeLink` action.

{% highlight php %}

{% endhighlight %}

#### Forms

Clicking the links is not what takes the most time during testing a web site. If your site consists only of links you can skip test automation.
The most routine waste of time goes into the testing of forms. Codeception provides several ways of doing that.

Let's submit this sample form inside the Codeception test.

{% highlight php %}

{% endhighlight %}

From a user's perspective, a form consists of fields which should be filled, and then an Update button clicked. 

{% highlight php %}

{% endhighlight %}

To match fields by their labels, you should write a `for` attribute in the label tag.

From the developer's perspective, submitting a form is just sending a valid post request to the server.
Sometimes it's easier to fill all of the fields at once and send the form without clicking a 'Submit' button.
Similar scenario can be rewritten with only one command.

{% highlight php %}

{% endhighlight %}

The `submitForm` is not emulating a user's actions, but it's quite useful in situations when the form is not formatted properly.
Whether labels aren't set, or fields have unclean names, or badly written ids, or the form is sent by a javascript call, `submitForm` is quite useful. 
Consider using this action for testing pages with bad html-code.

Also you should note that `submitForm` can't be run in Selenium. 

#### AJAX Emulation

As we know, PHP browser can't process javascript. Still, all the ajax calls can be easily emulated, by sending the proper GET or POST request to the server.
Consider using these methods for ajax interactions.

{% highlight php %}

{% endhighlight %}

#### Assertions

In the PHP browser you can test the page contents. In most cases you just need to check that the required text or element is on the page.
The most useful command for this is `see`.

{% highlight php %}

{% endhighlight %}

We also have other useful commands to perform checks. Please note that they all start with the `see` prefix.

{% highlight php %}

{% endhighlight %}

#### Comments

Within a long scenario you should describe what actions you are going to perform and what results to achieve.
Commands like amGoingTo, expect, expectTo helps you in making tests more descriptive.

{% highlight php %}

{% endhighlight %}

## Selenium

A nice feature of Codeception is that most scenarios can be easily ported between the testing backends.
Your PhpBrowser tests we wrote previously can be performed by Selenium. The only thing we need to change is to reconfigure and rebuild the WebGuy class, to use Selenium instead of PhpBrowser.

{% highlight yaml %}
yaml
class_name: WebGuy
modules:
    enabled:
        - Selenium
        - WebHelper
    config:
        Selenium:
            url: 'http://localhost/myapp/'
            browser: firefox            

{% endhighlight %}

Remember, running tests with PhpBrowser and Selenium is quite different. There are some actions which do not exist in both modules, like the `submitForm` action we reviewed before. 

In order to run Selenium tests you need to [download Selenium Server](http://seleniumhq.org/download/) and get it running. 

If you run acceptance tests with Selenium, Firefox will be started and all actions will be performed step by step. 
The commands we use for Selenium are mostly like those we have for PHPBrowser. Nevertheless, their behavior may be slightly different.
All of the actions performed on a page will trigger javascript events, which might update the page contents. So the `click` action is not just loading the page from the  'href' parameter of an anchor, but also may start the ajax request, or toggle visibility of an element.

By the way, the `see` command with element set, won't just check that the text exists inside the element, but it will also check that this element is actually visible to the user. 

{% highlight php %}

{% endhighlight %}

See the Selenium module documentation for the full reference.

### Cleaning things up

While testing, your actions may change the data on the site. Tests will fail if trying to create or update the same data twice. To avoid this problem, your database should be repopulated for each test. Codeception provides a `Db` module for that purpose. It will load a database dump after each passed test. To make repopulation work, create an sql dump of your database and put it into the __/tests/data__ dir. Set the database connection and path to the dump in the global Codeception config.

{% highlight yaml %}
`yaml
# in codeception.yml:
modules:
    config:
        Db:
            dsn: '[set pdo dsn here]'
            user: '[set user]'
            password: '[set password]'
            dump: tests/_data/dump.sql

{% endhighlight %}`

### Debugging

The PhpBrowser module can output valuable information while running. Just execute tests with the `--debug` option to see additional output. On each fail, the snapshot of the last shown page will be stored in the __tests/log__ directory. PHPBrowser will store html code, and Selenium will save the screenshot of a page.

## Conclusion

Writing acceptance tests with Codeception and PhpBrowser is a good start. You can easily test your Joomla, Drupal, Wordpress sites, as well as those made with frameworks. Writing acceptance tests is like describing a tester's actions in PHP. They are quite readable and very easy to write. Don't forget to repopulate the database on each test run.
