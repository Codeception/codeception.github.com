---
layout: doc
title: InitTemplate - Codeception - Documentation
---


## Codeception\InitTemplate


* *Uses* `Codeception\Command\Shared\FileSystem`, `Codeception\Command\Shared\Style`

Codeception templates allow creating a customized setup and configuration for your project.
An abstract class for installation template. Each init template should extend it and implement a `setup` method.
Use it to build a custom setup class which can be started with `codecept init` command.


{% highlight php %}

<?php
namespace Codeception\Template; // it is important to use this namespace so codecept init could locate this template
class CustomInstall extends \Codeception\InitTemplate
{
     public function setup()
     {
        // implement this
     }
}

{% endhighlight %}
This class provides various helper methods for building customized setup


#### __construct()

 *public* __construct($input, $output) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L66)

#### addModulesToComposer()

 *protected* addModulesToComposer($modules) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L260)

#### addStyles()

 *public* addStyles($output) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L9)

#### ask()

 *protected* ask($question, $answer = null) 

{% highlight php %}

<?php
// propose firefox as default browser
$this->ask('select the browser of your choice', 'firefox');

// propose firefox or chrome possible options
$this->ask('select the browser of your choice', ['firefox', 'chrome']);

// ask true/false question
$this->ask('do you want to proceed (y/n)', true);

{% endhighlight %}

 * `param string` $question
 * `param mixed` $answer
 * `return` mixed|string

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L108)

#### breakParts()

 *protected* breakParts($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L6)

#### checkInstalled()

 *protected* checkInstalled($dir = null) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L218)

#### completeSuffix()

 *protected* completeSuffix($filename, $suffix) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L25)

#### createActor()

 *protected* createActor($name, $directory, $suiteConfig) 

Create an Actor class and generate actions for it.
Requires a suite config as array in 3rd parameter.

 * `param` $name
 * `param` $directory
 * `param` $suiteConfig

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L233)

#### createDirectoryFor()

 *protected* createDirectoryFor($basePath, $className = null) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L10)

#### createEmptyDirectory()

 *protected* createEmptyDirectory($dir) 

Create an empty directory and add a placeholder file into it
 * `param` $dir

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L205)

#### createFile()

 *protected* createFile($filename, $contents, $force = null, $flags = null) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L46)

#### createHelper()

 *protected* createHelper($name, $directory) 

Create a helper class inside a directory

 * `param` $name
 * `param` $directory

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L184)

#### getNamespaceHeader()

 *protected* getNamespaceHeader($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L25)

#### getNamespaceString()

 *protected* getNamespaceString($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L19)

#### getNamespaces()

 *protected* getNamespaces($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L34)

#### getShortClassName()

 *protected* getShortClassName($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L13)

#### gitIgnore()

 *protected* gitIgnore($path) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L211)

#### initDir()

 *public* initDir($workDir) 

Change the directory where Codeception should be installed.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L76)

#### removeSuffix()

 *protected* removeSuffix($classname, $suffix) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L40)

#### say()

 *protected* say($message = null) 

Print a message to console.

{% highlight php %}

<?php
$this->say('Welcome to Setup');

{% endhighlight %}


 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L137)

#### sayError()

 *protected* sayError($message) 

Print error message
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L155)

#### sayInfo()

 *protected* sayInfo($message) 

Print info message
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L173)

#### saySuccess()

 *protected* saySuccess($message) 

Print a successful message
 * `param string` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L146)

#### sayWarning()

 *protected* sayWarning($message) 

Print warning message
 * `param` $message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L164)

#### setup()

 *abstract public* setup() 

Override this class to create customized setup.
 * `return` mixed

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L89)

#### updateComposerClassMap()

 *private* updateComposerClassMap($vendorDir = null) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L336)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php">Help us to improve documentation. Edit module reference</a></div>
