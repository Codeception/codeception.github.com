---
layout: doc
title: Filesystem - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Filesystem/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-filesystem/tree/master/src/Codeception/Module/Filesystem.php"><strong>source</strong></a></div>

# Filesystem
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-filesystem

{% endhighlight %}

Alternatively, you can enable `Filesystem` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



Module for testing local filesystem.
Fork it to extend the module for FTP, Amazon S3, others.

### Status

* Maintainer: **davert**
* Stability: **stable**
* Contact: codecept@davert.mail.ua

Module was developed to test Codeception itself.

### Actions

#### amInPath
 
Enters a directory In local filesystem.
Project root directory is used by default


#### cleanDir
 
Erases directory contents

{% highlight php %}

<?php
$I->cleanDir('logs');

{% endhighlight %}


#### copyDir
 
Copies directory with all contents

{% highlight php %}

<?php
$I->copyDir('vendor','old_vendor');

{% endhighlight %}


#### deleteDir
 
Deletes directory with all subdirectories

{% highlight php %}

<?php
$I->deleteDir('vendor');

{% endhighlight %}


#### deleteFile
 
Deletes a file

{% highlight php %}

<?php
$I->deleteFile('composer.lock');

{% endhighlight %}


#### deleteThisFile
 
Deletes a file


#### dontSeeFileFound
 
Checks if file does not exist in path


#### dontSeeInThisFile
 
Checks If opened file doesn't contain `text` in it

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->dontSeeInThisFile('codeception/codeception');

{% endhighlight %}


#### openFile
 
Opens a file and stores it's content.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeInThisFile('codeception/codeception');

{% endhighlight %}


#### seeFileContentsEqual
 
Checks the strict matching of file contents.
Unlike `seeInThisFile` will fail if file has something more than expected lines.
Better to use with HEREDOC strings.
Matching is done after removing "\r" chars from file content.

{% highlight php %}

<?php
$I->openFile('process.pid');
$I->seeFileContentsEqual('3192');

{% endhighlight %}


#### seeFileFound
 
Checks if file exists in path.
Opens a file when it's exists

{% highlight php %}

<?php
$I->seeFileFound('UserModel.php','app/models');

{% endhighlight %}


#### seeInThisFile
 
Checks If opened file has `text` in it.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeInThisFile('codeception/codeception');

{% endhighlight %}


#### seeNumberNewLines
 
Checks If opened file has the `number` of new lines.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeNumberNewLines(5);

{% endhighlight %}

 * `param int` $number New lines


#### seeThisFileMatches
 
Checks that contents of currently opened file matches $regex


#### writeToFile
 
Saves contents to file

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-filesystem/tree/master/src/Codeception/Module/Filesystem.php">Help us to improve documentation. Edit module reference</a></div>
