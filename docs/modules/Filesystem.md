---
layout: doc
title: Filesystem - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Filesystem/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-filesystem/tree/master/src/Codeception/Module/Filesystem.php"><strong>source</strong></a></div>

# Filesystem
### Installation

{% highlight yaml %}
composer require --dev codeception/module-filesystem

{% endhighlight %}

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

* `param string` $path
* `return void`

Enters a directory In local filesystem.

Project root directory is used by default


#### cleanDir

* `param string` $dirname
* `return void`

Erases directory contents

{% highlight php %}

<?php
$I->cleanDir('logs');

{% endhighlight %}


#### copyDir

* `param string` $src
* `param string` $dst
* `return void`

Copies directory with all contents

{% highlight php %}

<?php
$I->copyDir('vendor','old_vendor');

{% endhighlight %}


#### deleteDir

* `param string` $dirname
* `return void`

Deletes directory with all subdirectories

{% highlight php %}

<?php
$I->deleteDir('vendor');

{% endhighlight %}


#### deleteFile

* `param string` $filename
* `return void`

Deletes a file

{% highlight php %}

<?php
$I->deleteFile('composer.lock');

{% endhighlight %}


#### deleteThisFile

* `return void`

Deletes a file


#### dontSeeFileFound

* `param string` $filename
* `param string` $path
* `return void`

Checks if file does not exist in path


#### dontSeeInThisFile

* `param string` $text
* `return void`

Checks If opened file doesn't contain `text` in it

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->dontSeeInThisFile('codeception/codeception');

{% endhighlight %}


#### openFile

* `param string` $filename
* `return void`

Opens a file and stores it's content.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeInThisFile('codeception/codeception');

{% endhighlight %}


#### seeFileContentsEqual

* `param string` $text
* `return void`

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

* `param string` $filename
* `param string` $path
* `return void`

Checks if file exists in path.

Opens a file when it's exists

{% highlight php %}

<?php
$I->seeFileFound('UserModel.php','app/models');

{% endhighlight %}


#### seeInThisFile

* `param string` $text
* `return void`

Checks If opened file has `text` in it.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeInThisFile('codeception/codeception');

{% endhighlight %}


#### seeNumberNewLines

* `param int` $number New lines
* `return void`

Checks If opened file has the `number` of new lines.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeNumberNewLines(5);

{% endhighlight %}


#### seeThisFileMatches

* `param string` $regex
* `return void`

Checks that contents of currently opened file matches $regex


#### writeToFile

* `param string` $filename
* `param string` $contents
* `return void`

Saves contents to file

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-filesystem/tree/master/src/Codeception/Module/Filesystem.php">Help us to improve documentation. Edit module reference</a></div>
