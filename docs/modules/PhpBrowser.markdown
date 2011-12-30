---
layout: page
title: Codeception - Documentation
---


Opens the page.

 * param $page

__not documented__


Check matched checkbox or radiobutton.
 * param $option


Clicks on either link (for PHPBrowser) or on any selector for JS browsers.
Link text or css selector can be passed.

 * param $link


Check if current page doesn't contain the text specified.
Specify the css selector to match only specific region.

Examples:

{% highlight yaml %}
php
<?php
$I->dontSee('Login'); // I can suppose user is already logged in
$I->dontSee('Sign Up','h1'); // I can suppose it's not a signup page


{% endhighlight %}

 * param $text
 * param null $selector


Assert if the specified checkbox is unchecked.
Use css selector or xpath to match.

Example:

{% highlight php %}

<?php
$I->dontSeeCheckboxIsChecked('#agree'); // I suppose user didn't agree to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user didn't check the first checkbox in form.


{% endhighlight %}

 * param $selector


Checks matched field doesn't contain a value passed

 * param $field
 * param $value


Checks if page doesn't contain the link with text specified.
Specify url to narrow the results.

Examples:

{% highlight php %}

<?php
$I->dontSeeLink('Logout'); // I suppose user is not logged in


{% endhighlight %}

 * param $text
 * param null $url


Fill the field found by it's name with given value

 * param $field
 * param $value


Shortcut for filling multiple fields by their names.
Array with field names => values expected.


 * param array $fields


Moves back in history


Moves forward in history


Press the button, found by it's name.

 * param $button


Reloads current page


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


Assert if the specified checkbox is checked.
Use css selector or xpath to match.

Example:

{% highlight php %}

<?php
$I->seeCheckboxIsChecked('#agree'); // I suppose user agreed to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user agreed to terms, If there is only one checkbox in form.


{% endhighlight %}

 * param $selector


Checks if current url contains the $uri.
 * param $uri


Checks matched field has a passed value

 * param $field
 * param $value


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


Selects opition from selectbox.
Use CSS selector to match selectbox.
Either values or text of options can be used to fetch option.

 * param $select
 * param $option


If your page triggers an ajax request, you can perform it manually.
This action sends a GET ajax request with specified params.

See ->sendAjaxPostRequest for examples.

 * param $uri
 * param $params


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
/

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

{% highlight php %}

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


Uncheck matched checkbox or radiobutton.
 * param $option
