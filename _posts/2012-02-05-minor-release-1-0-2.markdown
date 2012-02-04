---
layout: post
title: Codeception 1.0.2 Released.
date: 2012-02-05 01:03:50
---

As you may know, **Codeception a BDD-style testing framework** has tools for cleaning up tested database between tests.
This week tools for database repopulation in Codeception were improved and it's usage was covered in [new chapter of Guides](http://codeception.com/docs/08-Data). To get your database populated before tests, just provide an SQL dump and set up PDO connection. For functional and unit testing best way to clean up your database faster is not to pollute it at all. All database queries can be taken into transaction and rolled back at test end. This behavior is introduced within new [Dbh](http://codeception.com/docs/modules/Dbh) module, and in ORM modules for Doctrine1 and Doctrine2. To speed up data repopulation in acceptance tests we recommend you to move database to SQLite.

Database repopulation is the subject of the new Guide: [Working with Data](http://codeception.com/docs/08-Data) was started. It explains different strategies for database cleanups and usage of fixtures in Codeception. 

Codeception is now tested for loading and cleaning up SQLite, MySQL, and PostgreSQL dumps.

#### Bugfixes:

* configuration merged improperly (reported and fixed by zzmaster).
* steps are printed in realtime and not buffered anymore.
* asserts on html pages doesn't echo all page texts for strings longer then 500 chars.
* tests are sorted by name when loading.

Please update your version via PEAR:

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or download updated Phar package.