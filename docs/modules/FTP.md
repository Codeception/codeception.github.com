---
layout: doc
title: FTP - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-FTP/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-ftp/tree/master/src/Codeception/Module/FTP.php"><strong>source</strong></a></div>

# FTP
### Installation

{% highlight yaml %}
composer require --dev codeception/module-ftp

{% endhighlight %}

### Description




Works with SFTP/FTP servers.

In order to test the contents of a specific file stored on any remote FTP/SFTP system
this module downloads a temporary file to the local system. The temporary directory is
defined by default as {% highlight yaml %}
tests/_data
{% endhighlight %} to specify a different directory set the tmp config
option to your chosen path.

Don't forget to create the folder and ensure its writable.

Supported and tested FTP types are:

* FTP
* SFTP

Connection uses php build in FTP client for FTP,
connection to SFTP uses [phpseclib](http://phpseclib.sourceforge.net/) pulled in using composer.

For SFTP, add [phpseclib](http://phpseclib.sourceforge.net/) to require list.
{% highlight yaml %}
"require": {
 "phpseclib/phpseclib": "^2.0.14"
}

{% endhighlight %}

### Status

* Stability:
    - FTP: **stable**
    - SFTP: **stable**

### Config

* type: ftp - type of connection ftp/sftp (defaults to ftp).
* host *required* - hostname/ip address of the ftp server.
* port: 21 - port number for the ftp server
* timeout: 90 - timeout settings for connecting the ftp server.
* user: anonymous - user to access ftp server, defaults to anonymous authentication.
* password - password, defaults to empty for anonymous.
* key - path to RSA key for sftp.
* tmp - path to local directory for storing tmp files.
* passive: true - Turns on or off passive mode (FTP only)
* cleanup: true - remove tmp files from local directory on completion.

#### Example
##### Example (FTP)

    modules:
       enabled: [FTP]
       config:
          FTP:
             type: ftp
             host: '127.0.0.1'
             port: 21
             timeout: 120
             user: 'root'
             password: 'root'
             key: ~/.ssh/id_rsa
             tmp: 'tests/_data/ftp'
             passive: true
             cleanup: false

##### Example (SFTP)

    modules:
       enabled: [FTP]
       config:
          FTP:
             type: sftp
             host: '127.0.0.1'
             port: 22
             timeout: 120
             user: 'root'
             password: 'root'
             key: ''
             tmp: 'tests/_data/ftp'
             cleanup: false


This module extends the Filesystem module, file contents methods are inherited from this module.

### Actions

#### amInPath

* `param string` $path
* `return void`

Enters a directory on the ftp system - FTP root directory is used by default


#### cleanDir

* `param string` $dirname
* `return void`

Erases directory contents on the FTP/SFTP server

{% highlight php %}

<?php
$I->cleanDir('logs');

{% endhighlight %}


#### copyDir

* `param string` $src
* `param string` $dst
* `return void`

Currently not supported in this module, overwrite inherited method


#### deleteDir

* `param string` $dirname
* `return void`

Deletes directory with all subdirectories on the remote FTP/SFTP server

{% highlight php %}

<?php
$I->deleteDir('vendor');

{% endhighlight %}


#### deleteFile

* `param string` $filename
* `return void`

Deletes a file on the remote FTP/SFTP system

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

Checks if file does not exist in path on the remote FTP/SFTP system


#### dontSeeFileFoundMatches

* `param string` $regex
* `param string` $path
* `return void`

Checks if file does not exist in path on the remote FTP/SFTP system, using regular expression as filename.

DOES NOT OPEN the file when it's exists


#### dontSeeInThisFile

* `param string` $text
* `return void`

Checks If opened file doesn't contain `text` in it

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->dontSeeInThisFile('codeception/codeception');

{% endhighlight %}


#### grabDirectory

* `return string`

Grabber method to return current working directory

{% highlight php %}

<?php
$pwd = $I->grabDirectory();

{% endhighlight %}


#### grabFileCount

* `param string` $path
* `param bool` $ignore - suppress '.', '..' and '.thumbs.db'
* `return int`

Grabber method for returning file/folders count in directory

{% highlight php %}

<?php
$count = $I->grabFileCount();
$count = $I->grabFileCount('TEST', false); // Include . .. .thumbs.db

{% endhighlight %}


#### grabFileList

* `param string` $path
* `param bool` $ignore - suppress '.', '..' and '.thumbs.db'
* `return array`

Grabber method for returning file/folders listing in an array

{% highlight php %}

<?php
$files = $I->grabFileList();
$count = $I->grabFileList('TEST', false); // Include . .. .thumbs.db

{% endhighlight %}


#### grabFileModified

* `param string` $filename
* `return int`

Grabber method to return last modified timestamp

{% highlight php %}

<?php
$time = $I->grabFileModified('test.txt');

{% endhighlight %}


#### grabFileSize

* `param string` $filename
* `return int`

Grabber method to return file size

{% highlight php %}

<?php
$size = $I->grabFileSize('test.txt');

{% endhighlight %}


#### loginAs

* `param string` $user
* `param string` $password
* `return void`

Change the logged in user mid-way through your test, this closes the
current connection to the server and initialises and new connection.

On initiation of this modules you are automatically logged into
the server using the specified config options or defaulted
to anonymous user if not provided.

{% highlight php %}

<?php
$I->loginAs('user','password');

{% endhighlight %}


#### makeDir

* `param string` $dirname
* `return void`

Create a directory on the server

{% highlight php %}

<?php
$I->makeDir('vendor');

{% endhighlight %}


#### openFile

* `param string` $filename
* `return void`

Opens a file (downloads from the remote FTP/SFTP system to a tmp directory for processing)
and stores it's content.

Usage:

{% highlight php %}

<?php
$I->openFile('composer.json');
$I->seeInThisFile('codeception/codeception');

{% endhighlight %}


#### renameDir

* `param string` $dirname
* `param string` $rename
* `return void`

Rename/Move directory on the FTP/SFTP server

{% highlight php %}

<?php
$I->renameDir('vendor', 'vendor_old');

{% endhighlight %}


#### renameFile

* `param string` $filename
* `param string` $rename
* `return void`

Rename/Move file on the FTP/SFTP server

{% highlight php %}

<?php
$I->renameFile('composer.lock', 'composer_old.lock');

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

Checks if file exists in path on the remote FTP/SFTP system.

DOES NOT OPEN the file when it's exists

{% highlight php %}

<?php
$I->seeFileFound('UserModel.php','app/models');

{% endhighlight %}


#### seeFileFoundMatches

* `param string` $regex
* `param string` $path
* `return void`

Checks if file exists in path on the remote FTP/SFTP system, using regular expression as filename.

DOES NOT OPEN the file when it's exists

 {% highlight php %}

<?php
$I->seeFileFoundMatches('/^UserModel_([0-9]{6}).php$/','app/models');

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

Saves contents to tmp file and uploads the FTP/SFTP system.

Overwrites current file on server if exists.

{% highlight php %}

<?php
$I->writeToFile('composer.json', 'some data here');

{% endhighlight %}

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-ftp/tree/master/src/Codeception/Module/FTP.php">Help us to improve documentation. Edit module reference</a></div>
