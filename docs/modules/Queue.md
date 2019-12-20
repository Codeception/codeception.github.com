---
layout: doc
title: Queue - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-warning" href="https://github.com/Codeception/module-Queue/releases">Changelog</a><a class="btn btn-default" href="https://github.com/Codeception/module-queue/tree/master/src/Codeception/Module/Queue.php"><strong>source</strong></a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/3.1/docs/modules/Queue.md">3.1</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.5/docs/modules/Queue.md">2.5</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/Queue.md">1.8</a></div>

# Queue
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/codeception/module-queue

{% endhighlight %}

Alternatively, you can enable `Queue` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description




Works with Queue servers.

Testing with a selection of remote/local queueing services, including Amazon's SQS service
Iron.io service and beanstalkd service.

Supported and tested queue types are:

* [Iron.io](http://iron.io/)
* [Beanstalkd](http://kr.github.io/beanstalkd/)
* [Amazon SQS](http://aws.amazon.com/sqs/)

The following dependencies are needed for the listed queue servers:

* Beanstalkd: pda/pheanstalk ~3.0
* Amazon SQS: aws/aws-sdk-php
* IronMQ: iron-io/iron_mq

### Status

* Stability:
    - Iron.io:    **stable**
    - Beanstalkd: **stable**
    - Amazon SQS: **stable**

### Config

The configuration settings depending on which queueing service is being used, all the options are listed
here. Refer to the configuration examples below to identify the configuration options required for your chosen
service.

* type - type of queueing server (defaults to beanstalkd).
* host - hostname/ip address of the queue server or the host for the iron.io when using iron.io service.
* port: 11300 - port number for the queue server.
* timeout: 90 - timeout settings for connecting the queue server.
* token - Iron.io access token.
* project - Iron.io project ID.
* key - AWS access key ID.
* version - AWS version (e.g. latest)
* endpoint - The full URI of the webservice. This is only required when connecting to a custom endpoint (e.g., a local version of SQS).
* secret - AWS secret access key.
     Warning:
         Hard-coding your credentials can be dangerous, because it is easy to accidentally commit your credentials
         into an SCM repository, potentially exposing your credentials to more people than intended.
         It can also make it difficult to rotate credentials in the future.
* profile - AWS credential profile
          - it should be located in ~/.aws/credentials file
          - eg:  [default]
                 aws_access_key_id = YOUR_AWS_ACCESS_KEY_ID
                 aws_secret_access_key = YOUR_AWS_SECRET_ACCESS_KEY
                 [project1]
                 aws_access_key_id = YOUR_AWS_ACCESS_KEY_ID
                 aws_secret_access_key = YOUR_AWS_SECRET_ACCESS_KEY
         - Note: Using IAM roles is the preferred technique for providing credentials
                 to applications running on Amazon EC2
                 http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/credentials.html?highlight=credentials

* region - A region parameter is also required for AWS, refer to the AWS documentation for possible values list.

#### Example
##### Example (beanstalkd)

    modules:
       enabled: [Queue]
       config:
          Queue:
             type: 'beanstalkd'
             host: '127.0.0.1'
             port: 11300
             timeout: 120

##### Example (Iron.io)

    modules:
       enabled: [Queue]
       config:
          Queue:
             'type': 'iron',
             'host': 'mq-aws-us-east-1.iron.io',
             'token': 'your-token',
             'project': 'your-project-id'

##### Example (AWS SQS)

    modules:
       enabled: [Queue]
       config:
          Queue:
             'type': 'aws',
             'key': 'your-public-key',
             'secret': 'your-secret-key',
             'region': 'us-west-2'

##### Example AWS SQS using profile credentials

    modules:
       enabled: [Queue]
       config:
          Queue:
             'type': 'aws',
             'profile': 'project1', //see documentation
             'region': 'us-west-2'

##### Example AWS SQS running on Amazon EC2 instance

    modules:
       enabled: [Queue]
       config:
          Queue:
             'type': 'aws',
             'region': 'us-west-2'


### Actions

#### addMessageToQueue
 
Add a message to a queue/tube

{% highlight php %}

<?php
$I->addMessageToQueue('this is a messages', 'default');
?>

{% endhighlight %}

 * `param string` $message Message Body
 * `param string` $queue Queue Name


#### clearQueue
 
Clear all messages of the queue/tube

{% highlight php %}

<?php
$I->clearQueue('default');
?>

{% endhighlight %}

 * `param string` $queue Queue Name


#### dontSeeEmptyQueue
 
Check if a queue/tube is NOT empty of all messages

{% highlight php %}

<?php
$I->dontSeeEmptyQueue('default');
?>

{% endhighlight %}

 * `param string` $queue Queue Name


#### dontSeeQueueExists
 
Check if a queue/tube does NOT exist on the queueing server.

{% highlight php %}

<?php
$I->dontSeeQueueExists('default');
?>

{% endhighlight %}

 * `param string` $queue Queue Name


#### dontSeeQueueHasCurrentCount
 
Check if a queue/tube does NOT have a given current number of messages

{% highlight php %}

<?php
$I->dontSeeQueueHasCurrentCount('default', 10);
?>

{% endhighlight %}

 * `param string` $queue Queue Name
 * `param int` $expected Number of messages expected


#### dontSeeQueueHasTotalCount
 
Check if a queue/tube does NOT have a given total number of messages

{% highlight php %}

<?php
$I->dontSeeQueueHasTotalCount('default', 10);
?>

{% endhighlight %}

 * `param string` $queue Queue Name
 * `param int` $expected Number of messages expected


#### grabQueueCurrentCount
 
Grabber method to get the current number of messages on the queue/tube (pending/ready)

{% highlight php %}

<?php
    $I->grabQueueCurrentCount('default');
?>

{% endhighlight %}
 * `param string` $queue Queue Name

 * `return` int Count


#### grabQueueTotalCount
 
Grabber method to get the total number of messages on the queue/tube

{% highlight php %}

<?php
    $I->grabQueueTotalCount('default');
?>

{% endhighlight %}

 * `param` $queue Queue Name

 * `return` int Count


#### grabQueues
 
Grabber method to get the list of queues/tubes on the server

{% highlight php %}

<?php
$queues = $I->grabQueues();
?>

{% endhighlight %}

 * `return` array List of Queues/Tubes


#### seeEmptyQueue
 
Check if a queue/tube is empty of all messages

{% highlight php %}

<?php
$I->seeEmptyQueue('default');
?>

{% endhighlight %}

 * `param string` $queue Queue Name


#### seeQueueExists
 
Check if a queue/tube exists on the queueing server.

{% highlight php %}

<?php
$I->seeQueueExists('default');
?>

{% endhighlight %}

 * `param string` $queue Queue Name


#### seeQueueHasCurrentCount
 
Check if a queue/tube has a given current number of messages

{% highlight php %}

<?php
$I->seeQueueHasCurrentCount('default', 10);
?>

{% endhighlight %}

 * `param string` $queue Queue Name
 * `param int` $expected Number of messages expected


#### seeQueueHasTotalCount
 
Check if a queue/tube has a given total number of messages

{% highlight php %}

<?php
$I->seeQueueHasTotalCount('default', 10);
?>

{% endhighlight %}

 * `param string` $queue Queue Name
 * `param int` $expected Number of messages expected

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-queue/tree/master/src/Codeception/Module/Queue.php">Help us to improve documentation. Edit module reference</a></div>
