---
layout: post
title: "Sponsorship Announcement"
date: 2013-06-03 22:03:50
---


<img src="http://2amigos.us/img/logo.png" style="float: right" />

We are pleased to make a special announcement, today. From now on **the development of Codeception will be sponsored by [2amigOS!](http://2amigos.us/)**, a web development and consultancy company from Miami. They are widely known in the **Yii** community by [their open source works](https://github.com/2amigos). They use Codeception in their daily development, as well as recommend it to their clients. They decided give back to provide a sponsorship to our testing framework. 

What does this mean for the Codeception project? You can be certain that nothing is changing with the development process or license, and Codeception will remain absolutely free and open source with MIT license. Essentially, this means that now, **Michael Bodnarchuk "Davert"**, will get more time to devote to it to make it even more robust. 

What does this mean for you, Codeception users? This means that Codeception is making a serious step towards becoming a professional testing tool.
However, being professional also requires some reliability and more efficient support, marketing, and business strategy. Certainly, that is not a task one person (or Codegyre developer team) could handle. With this partnership we will improve the support, documentation and definitely will start to bring more features to this product. Also, as some point in the future we will launch commercial support and trainings (for those who are interested in them).

The only term [2amigOS!](http://2amigos.us/) have asked for their sponsorship was a small refactoring in code. You will need to update your tests according to this example:

{% highlight php %}
<?php
// for acceptance tests
$I = new WebAmigo($scenario);

// for functional tests
$I = new TestAmigo($scenario);

// for api tests
$I = new ApiAmigo($scenario);
?>
{% endhighlight %}

Just kidding :) Instead of renaming Guy classes, we decided to thank [2amigOS!](http://2amigos.us/) by putting their logo on the site to show their support and dedication.

*We are looking forward to some great new things and a good future, so... 
Please spread the word about Codeception. Encourage your friends to try it, and add your company to [this list](https://github.com/Codeception/Codeception/wiki/Who-is-using-it%3F). Thanks for those who are already using it, and special thanks for those of you who contribute.*

P.S. Btw, don't miss **Nettuts+ course on Codeception** which started today. [Take your seats](https://tutsplus.com/course/modern-testing-in-php-with-codeception/) and say thanks to Jeffrey Way for it.