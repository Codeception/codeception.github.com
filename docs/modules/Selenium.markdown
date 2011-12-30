---
layout: page
title: Codeception - Documentation
---

## Selenium

Uses Mink to launch and manipulate Selenium Server (formerly the Selenium RC Server).

Note, all method takes CSS selectors to fetch elements.
For links, buttons, fields you can use names/values/ids of elements.
For form fields you can use name of matched label.

Will save a screenshot of browser window to log directory on fail.

### Installation

Take Selenium Server from http://seleniumhq.org/download

Execute it: java -jar selenium-server-standalone-x.xx.xxx.jar

Best used with Firefox browser.

Don't forget to turn on Db repopulation if you are using database.

### Configuration

* url *required* - start url for your app
* browser *required* - browser that would be launched
* host  - Selenium server host (localhost by default)
* port - Selenium server port (4444 by default)

### Public Properties

* session - contains Mink Session

### Actions


nPage


Opens the page.

 * param $page


achFileToField



r



ckOption


Check matched checkbox or radiobutton.
 * param $option


ck


Clicks on either link (for PHPBrowser) or on any selector for JS browsers.
Link text or css selector can be passed.

 * param $link


ckWithRightButton



tSee


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


tSeeCheckboxIsChecked


Assert if the specified checkbox is unchecked.
Use css selector or xpath to match.

Example:

{% highlight php %}

<?php
$I->dontSeeCheckboxIsChecked('#agree'); // I suppose user didn't agree to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user didn't check the first checkbox in form.


{% endhighlight %}

 * param $selector


tSeeInField


Checks matched field doesn't contain a value passed

 * param $field
 * param $value


tSeeLink


Checks if page doesn't contain the link with text specified.
Specify url to narrow the results.

Examples:

{% highlight php %}

<?php
$I->dontSeeLink('Logout'); // I suppose user is not logged in


{% endhighlight %}

 * param $text
 * param null $url


bleClick



gAndDrop


Drag first element to second

 * param $el1
 * param $el2


cuteJs



lField


Fill the field found by it's name with given value

 * param $field
 * param $value


lFields


Shortcut for filling multiple fields by their names.
Array with field names => values expected.


 * param array $fields


us



eBack


Moves back in history


eForward


Moves forward in history


eMouseOver



ss


Press the button, found by it's name.

 * param $button


ssKey



ssKeyDown



ssKeyUp



oadPage


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


CheckboxIsChecked


Assert if the specified checkbox is checked.
Use css selector or xpath to match.

Example:

{% highlight php %}

<?php
$I->seeCheckboxIsChecked('#agree'); // I suppose user agreed to terms
$I->seeCheckboxIsChecked('#signup_form input[type=checkbox]'); // I suppose user agreed to terms, If there is only one checkbox in form.


{% endhighlight %}

 * param $selector


Element


Checks element visibility.
Fails if element exists but is invisible to user.

 * param $css


InCurrentUrl


Checks if current url contains the $uri.
 * param $uri


InField


Checks matched field has a passed value

 * param $field
 * param $value


Link


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


ectOption


Selects opition from selectbox.
Use CSS selector to match selectbox.
Either values or text of options can be used to fetch option.

 * param $select
 * param $option


heckOption


Uncheck matched checkbox or radiobutton.
 * param $option


t



tForJS

