---
layout: doc
title: Filesystem - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.1/src/Codeception/Module/Filesystem.php">source</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/master/docs/modules/Filesystem.md">master</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.1/docs/modules/Filesystem.md"><strong>2.1</strong></a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.0/docs/modules/Filesystem.md">2.0</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/Filesystem.md">1.8</a></div>




Module for testing local filesystem.
Fork it to extend the module for FTP, Amazon S3, others.

### Status

* Maintainer: **davert**
* Stability: **stable**
* Contact: codecept@davert.mail.ua

Module was developed to test Codeception itself.


#### amInPath
 
Enters a directory In local filesystem.
Project root directory is used by default

 * `param` $path


#### cleanDir
 
Erases directory contents

{% highlight php %}

<?php
$I->cleanDir('logs');
?>

{% endhighlight %}

 * `param` $dirname


#### copyDir
 
Copies directory with all contents

{% highlight php %}

<?php
$I->copyDir('vendor','old_vendor');
?>

{% endhighlight %}

 * `param` $src
 * `param` $dst


#### deleteDir
 
Deletes directory with all subdirectories

{% highlight php %}

<?php
$I->deleteDir('vendor');
?>

{% endhighlight %}

 * `param` $dirname


#### deleteFile
 
Deletes a file

{% highlight php %}

<?php
$I->deleteFile('composer.lock');
?>

{% endhighlight %}

 * `param` $filename


#### deleteThisFile
 
Deletes a file


#### dontSeeFileFound
 
Checks if file does not exist in path

 * `param` $filename
 * `param string` $path


#### dontSeeInThisFile
 
Checks If opened file doesn't contain `text` in it

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->dontSeeInThisFile('codeception/codeception');
?>

{% endhighlight %}

 * `param` $text


#### openFile
 
Opens a file and stores it's content.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeInThisFile('codeception/codeception');
?>

{% endhighlight %}

 * `param` $filename


#### seeFileContentsEqual
 
Checks the strict matching of file contents.
Unlike `seeInThisFile` will fail if file has something more than expected lines.
Better to use with HEREDOC strings.
Matching is done after removing "\r" chars from file content.

{% highlight php %}

<?php
$I->openFile('process.pid');
$I->seeFileContentsEqual('3192');
?>

{% endhighlight %}

 * `param` $text


#### seeFileFound
 
Checks if file exists in path.
Opens a file when it's exists

{% highlight php %}

<?php
$I->seeFileFound('UserModel.php','app/models');
?>

{% endhighlight %}

 * `param` $filename
 * `param string` $path


#### seeInThisFile
 
Checks If opened file has `text` in it.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeInThisFile('codeception/codeception');
?>

{% endhighlight %}

 * `param` $text


#### writeToFile
 
Saves contents to file

 * `param` $filename
 * `param` $contents

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/tree/2.1/src/Codeception/Module/Filesystem.php">Help us to improve documentation. Edit module reference</a></div>
