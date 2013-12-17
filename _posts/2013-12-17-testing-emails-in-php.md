---
layout: post
title: "Testing Emails in PHP. Part 1: PHPUnit"
date: 2013-12-15 22:03:50
---

So how do you check that your applications sends email correctly? It looks like dealing with emails is always a challenge. How would you verify that email message is formatted and delivered correctly, without actually sending them to your clients? That's the first question. And the second question is: how can we automate testing of emails?

For both questions we have an answer. There are two awesome services that is developed to help developers in dealing with email hell. It is [Mailtrap](http://mailtrap.io) and [Mailcatcher](http://mailcatcher.me/). Both services run SMTP server that does not deliver emails, but store them locally. They both have a web interface in which you can review all the outgoing emails. The difference between this services are: mailtrap runs as a web service, and mailcatcher is a ruby gem that can be installed locally. 

![mailcatcher](http://f.cl.ly/items/3w2T1p0F3g003b2i1F2z/Screen%20shot%202011-06-23%20at%2011.39.03%20PM.png)

Its up to you which one to use. Definitely they will simplify your life while developing a web application. Do they have something to offer for testing? Sure! We can access all handled emails via REST API and verify our assertions.

In this post we will marry Mailcatcher with PHPUnit testing frameworks. We've chosen Mailcatcher for not to rely on 3rd-party web service and have all the tests run locally. We will write methods for both PHPUnit and Codeception in order to provide different solutions and compare them.

Before we start we need to make sure that Mailcatcher is installed and running. When done you can access its web interface on `1080` port and use `1025` port for fake SMTP server. Configure your web application to use exactly that port in your application when running in test environment.

## Testing emails in PHPUnit

Mailcatcher has a really simple REST API that is used for email access. Here is a quote from their official site.

> A fairly RESTful URL schema means you can download a list of messages in JSON from /messages, each message's metadata with /messages/:id.json, and then the pertinent parts with /messages/:id.html and /messages/:id.plain for the default HTML and plain text version, /messages/:id/:cid for individual attachments by CID, or the whole message with /messages/:id.source.

What was not mentioned that you can also clear all emails by sending `DELETE` request to `/messages`. The most complete documentation on API is [its code](https://github.com/sj26/mailcatcher/blob/master/lib/mail_catcher/web.rb). Even you don't know Ruby it is really fair.

Thus, we will need to send `GET` and `DELETE` requests and parse json response. To send them we will use [Guzzle](https://github.com/guzzle/guzzle) framework. PHPUnit and Guzzle can be easily installed via Composer:

{% highlight json %}
{
    "require-dev": {
    	"phpunit/phpunit": "*",
    	"guzzle/guzzle": "~3.7"
    }
}
{% endhighlight %}

Let's create `EmailTestCase` file and place MailCatcher API calls into it.

{% highlight php %}
<?php
class EmailTestCase extends PHPUnit_Framework_TestCase {

    /**
     * @var \Guzzle\Http\Client
     */
    private $mailcatcher;

    public function setUp()
    {
        $this->mailcatcher = new \Guzzle\Http\Client('http://127.0.0.1:1080');

        // clean emails between tests
        $this->cleanMessages();
    }

    // api calls
    public function cleanMessages()
    {
        $this->mailcatcher->delete('/messages')->send();
    }

    public function getLastMessage()
    {
        $messages = $this->getMessages();
        if (empty($messages)) {
            $this->fail("No messages received");
        }
        // messages are in descending order
        return reset($messages);
    }

    public function getMessages()
    {
        $jsonResponse = $this->mailcatcher->get('/messages')->send();
        return json_decode($jsonResponse->getBody());
    }
?>    
{% endhighlight %}

That's enough for fetching list of all delivered emails. All the emails will be cleaned between tests, so test will be executed in isolation. Let's implement some assertion methods to check sender, recipient, subject and body of the email.

{% highlight php %}
<?php
    // assertions
    public function assertEmailIsSent($description = '')
    {
        $this->assertNotEmpty($this->getMessages(), $description);
    }
    
    public function assertEmailSubjectContains($needle, $email, $description = '')
    {
        $this->assertContains($needle, $email->subject, $description);
    }

    public function assertEmailSubjectEquals($expected, $email, $description = '')
    {
        $this->assertContains($expected, $email->subject, $description);
    }

    public function assertEmailHtmlContains($needle, $email, $description = '')
    {
        $response = $this->mailcatcher->get("/messages/{$email->id}.html")->send();
        $this->assertContains($needle, (string)$response->getBody(), $description);
    }

    public function assertEmailTextContains($needle, $email, $description = '')
    {
        $response = $this->mailcatcher->get("/messages/{$email->id}.plain")->send();
        $this->assertContains($needle, (string)$response->getBody(), $description);
    }

    public function assertEmailSenderEquals($expected, $email, $description = '')
    {
        $response = $this->mailcatcher->get("/messages/{$email->id}.json")->send();
        $email = json_decode($response->getBody());
        $this->assertEquals($expected, $email->sender, $description);
    }

    public function assertEmailRecipientsContain($needle, $email, $description = '')
    {
        $response = $this->mailcatcher->get("/messages/{$email->id}.json")->send();
        $email = json_decode($response->getBody());
        $this->assertContains($needle, $email->recipients, $description);
    }
?>
{% endhighlight %}

The [complete code listing](https://gist.github.com/DavertMik/7969053) is published as gist.

## Example

How a test using this may this `EmailTestCase` class may look like? 

{% highlight php %}
<?php		
	function testNotificationIsSent()
	{
		// ... trigger notifications

        $email = $this->getLastMessage();
        $this->assertEmailSenderEquals('<bugira@bugira.com>', $email);
        $this->assertEmailRecipientsContain('<davert@ukr.net>', $email);
        $this->assertEmailSubjectEquals('[Bugira] Ticket #2 has been closed', $email);
        $this->assertEmailSubjectContains('Ticket #2', $email);
        $this->assertEmailHtmlContains('#2 integer pede justo lacinia eget tincidunt', $email);
    }
?>    
{% endhighlight %}

We got a really simple class for testing emails from your application. Ok, that's not a unit testing. For unit testing you should use mocking framework to fake the delivery in your PHP code. But you can use this class in acceptance tests (with Selenium) or integration tests. It is much simpler to test emails this way, then to dig into internals of your email sending library and defining mocks. The drawback here is usage of standalone daemon, and reconfiguring your application to use its SMTP server.

---

It looks like this post is long enough to be published. We will continue email testing next time with Codeception framework. We will develop `EmailHelper` class for scenario-driven tests of Codeception. 

[EmailTestCase Source](https://gist.github.com/DavertMik/7969053)