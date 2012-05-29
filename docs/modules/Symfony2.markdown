---
layout: page
title: Codeception - Documentation
---

## Symfony2 Module

This module uses Symfony2 Crawler and HttpKernel to emulate requests and get response.

It implements common Framework interface.

### Config

* app_path: 'app' - specify custom path to your app dir, where bootstrap cache and kernel interface is located.

### Public Properties

* kernel - HttpKernel instance
* client - current Crawler instance


### Actions


#### amHttpAuthenticated


Authenticates user for HTTP_AUTH 

 * param $username
 * param $password


#### amOnPage


Opens the page.
Requires relative uri as parameter

Example:

{% highlight php %}
 
{% endhighlight %}

 * param $page


#### attachFile


Attaches file from Codeception data directory to upload field.

Example:

{% highlight php %}
 
{% endhighlight %}

 * param $field
 * param $filename


#### checkOption


Ticks a checkbox.

 * param $option


#### click


Perform a click on link or button.
Link or button are found by their names.
Submits a form if button is a submit type.

If link is an image it's found by alt attribute value of image.
If button is image button is found by it's value

Examples:

{% highlight php %}
 
{% endhighlight %}
 * param $link


#### dontSee


Check if current page doesn't contain the text specified.
Specify the css selector to match only specific region.

Examples:

{% highlight php %}

{% endhighlight %}

 * param $text
 * param null $selector


#### dontSeeCheckboxIsChecked


Assert if the specified checkbox is unchecked.
Use css selector or xpath to match.

Example:

{% highlight php %}
 
{% endhighlight %}

 * param $checkbox


#### dontSeeInField


Checks that an input field or textarea doesn't contain value.

Example:

{% highlight php %}
 
{% endhighlight %}

 * param $field
 * param $value


#### dontSeeLink


Checks if page doesn't contain the link with text specified.
Specify url to narrow the results.

Examples:

{% highlight php %}
 
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
 
{% endhighlight %}

 * param $text
 * param null $selector


#### seeCheckboxIsChecked


Assert if the specified checkbox is checked.
Use css selector or xpath to match.

Example:

{% highlight php %}
 
{% endhighlight %}

 * param $checkbox


#### seeEmailIsSent


Checks if any email were sent by last request

 * throws \LogicException


#### seeInCurrentUrl


Checks that current uri contains value

 * param $uri


#### seeInField


Checks that an input field or textarea contains value.

Example:

{% highlight php %}
 
{% endhighlight %}

 * param $field
 * param $value


#### seeLink


Checks if there is a link with text specified.
Specify url to match link with exact this url.

Examples:

{% highlight php %}
 
{% endhighlight %}

 * param $text
 * param null $url


#### selectOption


Selects an option in select tag or in radio button group.

Example:

{% highlight php %}
 
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
 
{% endhighlight %}

For sample Sign Up form:

{% highlight php %}
 
{% endhighlight %}
I can write this:

{% highlight php %}
 
{% endhighlight %}
Note, that pricing plan will be set to Paid, as it's selected on page.

 * param $selector
 * param $params


#### uncheckOption


Unticks a checkbox.

 * param $option
