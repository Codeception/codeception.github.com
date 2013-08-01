---
layout: post
title: "Testing WordPress Plugins with Codeception. Part 2"
date: 2013-07-24 22:03:50
---

In [previous part of this tutorial](http://codeception.com/07-24-2013/testing-wordpress-plugins.html) we installed Codeception and got a simple test for [User Submitted Posts](http://wordpress.org/plugins/user-submitted-posts/) plugin. We tested that user can send a post and see a message that the post was successfully sent. Nothing more. 

Let's remind the test `SubmitPostCept` we done previously:

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('submitted a post by user and publish it as admin');
$I->amOnPage('/');
$I->click('Submit a Post');
$I->fillField('Your Name', 'Michael');
$I->fillField('Your URL','http://drone-rules.com');
$I->fillField('Post Title', 'Game of Drones Review');
$I->fillField('Post Tags', 'review book rob-starkraft');
$I->selectOption('select[name=user-submitted-category]', 'Game of Drones');
$I->fillField('Post Content', 'This story is epic and characters are amazing.');
$I->click('Submit Post');
$I->see('Success! Thank you for your submission.');
?>
{% endhighlight %}

But well, we didn't verify that the admin has received this post. And it can be published after a moderation.
Thus, we will require few more steps to make a test complete. We will need to login to WordPress admin dashboard.

![Dashboard](/images/wordpress/wp2_dashboard.png)

Test commands which allow us to do that are pretty obvious. To keep the code shorter we won't show the code from previous lesson. But you should understand that we just append new commands to the previous steps.

{% highlight php %}
<?php
$I->amOnPage('/wp-login.php');
$I->fillField('Username', 'admin');
$I->fillField('Password','admin');
$I->click('Log In');
$I->see('Dashboard');
?>
{% endhighlight %}

Then we go to **Posts** section to get all the post listed. We expect to see the "Game of Drones" post in the list. 

![Posts](/images/wordpress/wp2_posts.png)

Let's also check that it was not published by default and it is in `Pending` state. `Game of Drones Review - Pending` should be found inside the `table` html tag, right? We can even specify the CSS class `.posts` for that table.

{% highlight php %}
<?php
$I->amOnPage('/wp-login.php');
$I->fillField('Username', 'admin');
$I->fillField('Password','admin');
$I->click('Log In');
$I->see('Dashboard');
$I->click('Posts');
$I->see('Game of Drones Review','table.posts');
?>
{% endhighlight %}

That's right, the `see` command we use for assertions (and the test will fail if assertions fail) has a second parameter which allow us to narrow the results from the whole page, to a particular area on a page, which we can define by CSS:

![Posts CSS](/images/wordpress/wp2_posts_table_css.png)

What's left? We need to review and publish this post, right?
The result we expect... Well, we will trust the notifications once again, and message **Post published** should be enough for us.

![Published](/images/wordpress/wp2_published.png)

And that's how we will do that in test.

{% highlight php %}
<?php
$I->amOnPage('/wp-login.php');
$I->fillField('Username', 'admin');
$I->fillField('Password','admin');
$I->click('Log In');
$I->see('Dashboard');
$I->click('Posts');
$I->see('Game of Drones Review','table.posts');
$I->click('Game of Drones Review','table.posts');
$I->click('Publish');
$I->see('Post published');
?>
{% endhighlight %}

And that would be a good point to execute tests once again. Probably you remember, that you need execute `codecept.phar` with `run` parameter from console.

{% highlight bash %}
php codecept.phar run
{% endhighlight %}

What we are seeing now? Oh no. Just another fail.

![Fail](/images/wordpress/wp2_fail.png)

What could go wrong? Hopefully Codeception gives us a suggestion to look for the complete HTML code in `_log` directory. This directory, actually  `tests/_log`, was meant to store all data re.lated to test execution. We can see there two log files, and the file which we actually need: `SubmitPostCept.php.page.fail.html`.

![Log](/images/wordpress/wp2_log.png)

This file, named after our test name, stores the HTML that was on page, before the fail. Let's open it in a browser to get a clue might go wrong here.

![Publish](/images/wordpress/wp2_publish.png)

It looks like we are still on the **Edit Post** page we were before. And the post status is still `Pending Review`, it looks like `click('Publish')` didn't do what we expected. As we can see, the **Publish** text occur in a few other places on a page. Probably, we are just trying to click the wrong one? What should we do in this case? Yes, we should narrow the result to click only that blue button `Publish`. How will we specify that? That's right, with CSS.

Codeception can use CSS instead of names for clicking the elements. It would be much easier to find the `Publish` button not by its name, but by its CSS. The button have `id` attribute, thus, it can be found by `#publish` CSS selector. That what we probably would do if we were using jQuery.

{% highlight php %}
<?php
$I->amOnPage('/wp-login.php');
$I->fillField('Username', 'admin');
$I->fillField('Password','admin');
$I->click('Log In');
$I->see('Dashboard');
$I->click('Posts');
$I->see('Game of Drones Review','table.posts');
$I->click('Game of Drones Review');
$I->see('Edit Post');
$I->click('#publish'); // id of "Publish" button
$I->see('Post published');
?>
{% endhighlight %}

And that fixes the test. You can check that by executing test once again. Let's not trust the notification test and check that a post really is on site. We can click `View Post` link right near the `Post updated` message.

![Page](/images/wordpress/wp2_page.png)

What we will check that there is site motto on a page (thus we know, we see the blog theme),
and that post title is shown in `.entry-title` class. And yep, we see this story is "epic and amazing".
Let's face the final and complete code of our test:

<?php
$I = new WebGuy($scenario);
$I->wantTo('submitted a post by user and publish it as admin');
$I->amOnPage('/');
$I->click('Submit a Post');
$I->fillField('Your Name', 'Michael');
$I->fillField('Your URL','http://drone-rules.com');
$I->fillField('Post Title', 'Game of Drones Review');
$I->fillField('Post Tags', 'review book rob-starkraft');
$I->selectOption('select[name=user-submitted-category]', 'Game of Drones');
$I->fillField('Post Content', 'This story is epic and characters are amazing.');
$I->click('Submit Post');
$I->see('Success! Thank you for your submission.');

$I->amOnPage('/wp-login.php');
$I->fillField('Username', 'admin');
$I->fillField('Password','admin');
$I->click('Log In');
$I->see('Dashboard');
$I->click('Posts');
$I->see('Game of Drones Review','table.posts');
$I->click('Game of Drones Review');
$I->see('Edit Post');
$I->click('#publish');
$I->see('Post published');
$I->click('View Post');
$I->see('Just another WordPress site');
$I->see('Game of Drones Review','.entry-title');
$I->see('This story is epic and characters are amazing.');?>
{% endhighlight %}

Well, we did a good job. But the test is like too long. And we can't understand what was going on here.
We can add comments to the code, and Codeception has some valuable helpers to add extra text informations with `expect` and `amGoingTo` commands.

<?php
$I = new WebGuy($scenario);
$I->wantTo('submitted a post by user and publish it as admin');

$I->amGoingTo('submit a post as a regular user');
$I->amOnPage('/');
$I->click('Submit a Post');
$I->fillField('Your Name', 'Michael');
$I->fillField('Your URL','http://drone-rules.com');
$I->fillField('Post Title', 'Game of Drones Review');
$I->fillField('Post Tags', 'review book rob-starkraft');
$I->selectOption('select[name=user-submitted-category]', 'Game of Drones');
$I->fillField('Post Content', 'This story is epic and characters are amazing.');
$I->click('Submit Post');
$I->see('Success! Thank you for your submission.');

$I->amGoingTo('log in as admin');
$I->amOnPage('/wp-login.php');
$I->fillField('Username', 'admin');
$I->fillField('Password','admin');
$I->click('Log In');
$I->see('Dashboard');

$I->expect('submitted post was added to a list');
$I->click('Posts');
$I->see('Game of Drones Review','table.posts');
$I->click('Game of Drones Review');

$I->amGoingTo('publish this post');
$I->see('Edit Post');
$I->click('#publish');
$I->see('Post published');

$I->expect('post is available on blog');
$I->click('View Post');
$I->see('Just another WordPress site');
$I->see('Game of Drones Review','.entry-title');
$I->see('This story is epic and characters are amazing.');
?>
{% endhighlight %}

We divided our test scenario into logical parts. At least we have left some notice about what is going on and what we were going to achieve. If we execute test with `--steps` option, we will get a output with all passed steps listed:

{% highlight bash %}
php codecept.phar run --steps
{% endhighlight %}

![Final](/images/wordpress/wp2_final.png)

Our comments were added to list of passed steps, thus we can easily understand what was going on.
And that's quite enough for today. Our test is pretty mature, and covers not only plugin functionality, but WordPress core functions too. Whenever this plugin gets updated, this test should pass to ensure we did everything right.

But the only thing left. After we executed tests several times, we got this picture on `Posts` screen.

![Previous Posts](/images/wordpress/wp2_trash.png)

We have Attack of Clones here. Yep, each test created its own post and published it. Probably, it is not a good idea to pollute the blog with dozens of similar names. We use post title and content in a test, so probably we can't be sure, what post we are working with: current, or it is the post left from a previous test execution. 

That will lead us to the idea of data cleanup. Probably we should delete post after it was published, to revert all our changes. Alternatively we can install [WordPress Rest Plugin](http://wordpress.org/plugins/wordpress-reset/) to reset WordPress to its initial state. In both cases we will need to append some steps to our test to get data cleaned before the next test.

Let's make this your home task. In next lesson we will try to refactor this test and get a few more of them. Don't worry, they will be much shorter than this one. See you soon!