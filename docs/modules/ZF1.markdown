---
layout: doc
title: Codeception - Documentation
---

## ZF1 Module

This module allows you to run tests inside Zend Framework.
It acts just like ControllerTestCase, but with usage of Codeception syntax.
Currently this module is a bit *alpha* as I have a little bit experience with ZF. Thus, contributions are welcome.

It assumes, you have standard structure with __APPLICATION_PATH__ set to './application'
and LIBRARY_PATH set to './library'. If it's not redefine this constants in bootstrap file of your suite.

### Config

* env  - environment used for testing ('testing' by default).
* config - relative path to your application config ('application/configs/application.ini' by default).

### API

* client - BrowserKit client
* db - current instance of Zend_Db_Adapter
* bootstrap - current bootstrap file.

### Cleaning up

For Doctrine1 and Doctrine2 all queries are put inside rollback transaction. If you are using one of this ORMs connect their modules to speed up testing.

Unfortunately Zend_Db doesn't support nested transactions, thus, for cleaning your database you should either use standard Db module or
[implement nested transactions yourself](http://blog.ekini.net/2010/03/05/zend-framework-how-to-use-nested-transactions-with-zend_db-and-mysql/).

If your database supports nested transactions (MySQL doesn't) or you implemented them you can put all your code inside a transaction.
Use a generated helper TestHelper. Usse this code inside of it.

{% highlight php %}

<?php
namespace Codeception\Module;
class TestHelper extends \Codeception\Module {
     function _before($test) {
         $this->getModule('ZF1')->db->beginTransaction();
     }

     function _after($test) {
         $this->getModule('ZF1')->db->rollback();
     }
}
?>

{% endhighlight %}

This will make your functional tests run super-fast.


### Actions


#### amOnPage


Opens the page.
Requires relative uri as parameter

Example:

{% highlight php %}

<?php
// opens front page
$I->amOnPage('/');
// opens /register page
$I->amOnPage('/register');
?>

{% endhighlight %}

 * param $page


#### attachFile


Attaches file from Codeception data directory to upload field.

Example:

{% highlight php %}

<?php
// file is stored in 'tests/data/tests.xls'
$I->attachFile('prices.xls');
?>

{% endhighlight %}

 * param $field
 * param $filename


#### checkOption


Ticks a checkbox.

 * param $option


#### click


Perform a click on link or button.
Link or button are found by their names or CSS selector.
Submits a form if button is a submit type.

If link is an image it's found by alt attribute value of image.
If button is image button is found by it's value
If link or button can't be found by name they are searched by CSS selector.

Examples:

{% highlight php %}

<?php
// simple link
$I->click('Logout');
// button of form
$I->click('Submit');
// CSS button
$I->click('#form input[type=submit]');
?>

{% endhighlight %}
 * param $link


#### dontSee


Check if current page doesn't contain the text specified.
Specify the css selector to match only specific region.

Examples:

{% highlight php %}

<?php
$I->dontSee('Login'); // I can suppose user is already logged in
$I->dontSee('Sign Up','h1'); // I can suppose it's not a signup page


{% endhighlight %}

 * param $text
 * param null $selector


#### dontSeeCheckboxIsChecked


Assert if the specified checkbox is unchecked.
Use css selector or xpath to match.

Example:

{% highlight php %}

<?php
$I->dontSeeCheckboxIsChecked('#agree'); // I suppose user didn't agree to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user didn't check the first checkbox in form.


{% endhighlight %}

 * param $checkbox


#### dontSeeInField


Checks that an input field or textarea doesn't contain value.

Example:

{% highlight php %}

<?php
$I->dontSeeInField('form textarea[name=body]','Type your comment here');
$I->dontSeeInField('form input[type=hidden]','hidden_value');
$I->dontSeeInField('#searchform input','Search');
?>

{% endhighlight %}

 * param $field
 * param $value


#### dontSeeLink


Checks if page doesn't contain the link with text specified.
Specify url to narrow the results.

Examples:

{% highlight php %}

<?php
$I->dontSeeLink('Logout'); // I suppose user is not logged in


{% endhighlight %}

 * param $text
 * param null $url


#### fillField


Fills a text field or textarea with value.

 * param $field
 * param $value


#### formatResponse

__not documented__


#### see


Check if current page contains the text specified.
Specify the css selector to match only specific region.

Examples:

{% highlight php %}

<?php
$I->see('Logout'); // I can suppose user is logged in
$I->see('Sign Up','h1'); // I can suppose it's a signup page


{% endhighlight %}

 * param $text
 * param null $selector


#### seeCheckboxIsChecked


Assert if the specified checkbox is checked.
Use css selector or xpath to match.

Example:

{% highlight php %}

<?php
$I->seeCheckboxIsChecked('#agree'); // I suppose user agreed to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user agreed to terms, If there is only one checkbox in form.


{% endhighlight %}

 * param $checkbox


#### seeInCurrentUrl


Checks that current uri contains value

 * param $uri


#### seeInField


Checks that an input field or textarea contains value.

Example:

{% highlight php %}

<?php
$I->seeInField('form textarea[name=body]','Type your comment here');
$I->seeInField('form input[type=hidden]','hidden_value');
$I->seeInField('#searchform input','Search');
?>

{% endhighlight %}

 * param $field
 * param $value


#### seeLink


Checks if there is a link with text specified.
Specify url to match link with exact this url.

Examples:

{% highlight php %}

<?php
$I->seeLink('Logout'); // matches <a href="#">Logout</a>
$I->seeLink('Logout','/logout'); // matches <a href="/logout">Logout</a>


{% endhighlight %}

 * param $text
 * param null $url


#### selectOption


Selects an option in select tag or in radio button group.

Example:

{% highlight php %}

<?php
$I->selectOption('form select[name=account]', 'Premium');
$I->selectOption('form input[name=payment]', 'Monthly');
?>

{% endhighlight %}

 * param $select
 * param $option


#### sendAjaxGetRequest


If your page triggers an ajax request, you can perform it manually.
This action sends a GET ajax request with specified params.

See ->sendAjaxPostRequest for examples.

 * param $uri
 * param $params


#### sendAjaxPostRequest


If your page triggers an ajax request, you can perform it manually.
This action sends a POST ajax request with specified params.
Additional params can be passed as array.

Example:

Imagine that by clicking checkbox you trigger ajax request which updates user settings.
We emulate that click by running this ajax request manually.

{% highlight php %}

<?php
$I->sendAjaxPostRequest('/updateSettings', array('notifications' => true); // POST
$I->sendAjaxGetRequest('/updateSettings', array('notifications' => true); // GET


{% endhighlight %}

 * param $uri
 * param $params


#### submitForm


Submits a form located on page.
Specify the form by it's css or xpath selector.
Fill the form fields values as array.

Skipped fields will be filled by their values from page.
You don't need to click the 'Submit' button afterwards.
This command itself triggers the request to form's action.

Examples:

{% highlight php %}

<?php
$I->submitForm('#login', array('login' => 'davert', 'password' => '123456'));


{% endhighlight %}

For sample Sign Up form:

{% highlight html %}

<form action="/sign_up">
    Login: <input type="text" name="user[login]" /><br/>
    Password: <input type="password" name="user[password]" /><br/>
    Do you agree to out terms? <input type="checkbox" name="user[agree]" /><br/>
    Select pricing plan <select name="plan"><option value="1">Free</option><option value="2" selected="selected">Paid</option></select>
    <input type="submit" value="Submit" />
</form>

{% endhighlight %}
I can write this:

{% highlight php %}

<?php
$I->submitForm('#userForm', array('user' => array('login' => 'Davert', 'password' => '123456', 'agree' => true)));


{% endhighlight %}
Note, that pricing plan will be set to Paid, as it's selected on page.

 * param $selector
 * param $params


#### uncheckOption


Unticks a checkbox.

 * param $option
