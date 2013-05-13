---
title: Headless Browser Testing with Selenium2 and PhantomJS
layout: post
date: 2013-05-13 01:03:50
---

*This is a guest blogpost was brought to you by [Jon Phipps](http://jonstuff.blogspot.ca/). Jon explains how to use PhantomJS -- the most anticipated testing backend in Codeception.*

If you're running acceptance tests in [Codeception](http://codeception.com/) that require interaction with JavaScript, or have scripts that manipulate the DOM, the speedy [Php Browser](http://codeception.com/docs/modules/PhpBrowser) driver won't help you since it doesn't support JavaScript. The best options for running tests using JavaScript are the [Selenium2](http://codeception.com/docs/modules/Selenium2) and [ZombieJS](http://codeception.com/docs/modules/ZombieJS) drivers. 

The **Selenium2** driver actually loads and runs an active browser session, manipulating the browser just as a human would. **ZombieJS** is a 'headless' browser that provides all of the features of a regular browser, but without a display interface. Without the extra time spent waiting for the display to actually render, a headless browser like ZombieJS can run far faster than a normal browser, so you're tests will execute in as little as half the time. But ZombieJS requires installing Node.js and can be a little buggy, plus it has its own API (which has both pros and cons). The Selenium2 driver is well tested and implements a standard API -- the WebDriver Wire Protocol -- across all of the browsers it has drivers for. 

Now there's a headless browser that includes a **WebDriver Wire Protocol** implementation -- [PhantomJS](http://phantomjs.org/index.html). The latest version of PhantomJS is an easy to install, stand-alone binary that doesn't require installing Node.js or any other dependencies, and ships with its own **'Ghost Driver'** for implementing the WebDriver Wire Protocol. Which means you can drive it using the Selenium2 driver in Codeception, and anything that you can test in Chrome, Firefox, Safari, or IE using Selenium2, you can now test in half the time using PhantomJS

To get started, if you haven't installed Selenium2, you just need to follow the [instructions](http://codeception.com/docs/modules/Selenium2) on the Codeception web site for installing and running the Selenium2 driver. 

Next [download PhantomJS](http://phantomjs.org/download.html). The binary is setup and ready to use for Linux, Mac OSX, and Windows. Put it, or a symlink to it, somewhere in your path so you can launch it from anywhere. 

You're done with installation!

Now open up a new terminal window and fire up an instance of Selenium Server, leaving the terminal window open:

{% highlight bash %}
$ java -jar selenium-server-standalone-2.0b2.jar
{% endhighlight %}

This will launch the server listening on the default port of 4444. You should see something like this in the terminal:

{% highlight bash %}
May 10, 2013 9:41:38 AM org.openqa.grid.selenium.GridLauncher main
INFO: Launching a standalone server
09:41:46.852 INFO - Java: Apple Inc. 20.45-b01-451
09:41:46.857 INFO - OS: Mac OS X 10.7.5 x86_64
09:41:46.941 INFO - v2.32.0, with Core v2.32.0. Built from revision 6c40c18
09:41:47.774 INFO - RemoteWebDriver instances should connect to: http://127.0.0.1:4444/wd/hub
09:41:47.775 INFO - Version Jetty/5.1.x
09:41:47.775 INFO - Started HttpContext[/selenium-server/driver,/selenium-server/driver]
09:41:47.776 INFO - Started HttpContext[/selenium-server,/selenium-server]
09:41:47.777 INFO - Started HttpContext[/,/]
09:41:47.983 INFO - Started org.openqa.jetty.jetty.servlet.ServletHandler@1f25fefa
09:41:47.983 INFO - Started HttpContext[/wd,/wd]
09:41:48.011 INFO - Started SocketListener on 0.0.0.0:4444
09:41:48.011 INFO - Started org.openqa.jetty.jetty.Server@16a4e743
{% endhighlight %}

If you already have a listener on that port, you'll see a handy error message:

{% highlight bash %}
09:50:34.172 WARN - Failed to start: SocketListener0@0.0.0.0:4444
Exception in thread "main" java.net.BindException: 
Selenium is already running on port 4444. Or some other service is.
{% endhighlight %}

Next, open up a new terminal window and launch PhantomJS, telling it to use the its built-in WebDriver extension to talk to Selenium on the port Selenium is listening to, and leave that window open too:

{% highlight bash %}
$ phantomjs --webdriver=4444
{% endhighlight %}

You should see a response like this in your terminal:

{% highlight bash %}
PhantomJS is launching GhostDriver...
[INFO  - 2013-05-10T14:11:05.076Z] GhostDriver - Main - running on port 4444
{% endhighlight %}

Now just change the `browser` setting in your `acceptance.suite.yml` file (an example file is on the [Selenium2 driver page](http://codeception.com/docs/modules/Selenium2)) to `browser: phantomjs`. If you're changing _modules_ then you should also run `php codecept.phar build`. 

Check it out by doing a fresh Codeception run:

{% highlight bash %}
$ php codecept.phar run acceptance
{% endhighlight %}

Your tests should now run quietly and silently, and much faster.

You should see some output in your PhantomJS terminal window providing some useful feedback on this session's capabilities provisioning. This happens on every run (the output below are the defaults):

{% highlight bash %}
[INFO  - 2013-05-10T14:33:43.796Z] Session [9dbc5700-b97e-11e2-8dc9-976d2e8732bf] - 
CONSTRUCTOR - Desired Capabilities:{
  "browserName" : "PhantomJS",
  "version" : "9",
  "platform" : "ANY",
  "browserVersion" : "9",
  "browser" : "firefox",
  "name" : "Codeception Test",
  "deviceOrientation" : "portrait",
  "deviceType" : "tablet",
  "selenium-version" : "2.31.0"
}
[INFO  - 2013-05-10T14:33:43.796Z] Session [9dbc5700-b97e-11e2-8dc9-976d2e8732bf] - 
CONSTRUCTOR - Negotiated Capabilities: {
  "browserName" : "phantomjs",
  "version" : "1.9.0",
  "driverName" : "ghostdriver",
  "driverVersion" : "1.0.3",
  "platform" : "mac-10.7 (Lion)-32bit",
  "javascriptEnabled" : true,
  "takesScreenshot" : true,
  "handlesAlerts" : false,
  "databaseEnabled" : false,
  "locationContextEnabled" : false,
  "applicationCacheEnabled" : false,
  "browserConnectionEnabled" : false,
  "cssSelectorsEnabled" : true,
  "webStorageEnabled" : false,
  "rotatable" : false,
  "acceptSslCerts" : false,
  "nativeEvents" : true,
  "proxy" : {
    "proxyType" : "direct"
  }
}
[INFO  - 2013-05-10T14:33:43.796Z] SessionManagerReqHand - _postNewSessionCommand - 
New Session Created: 9dbc5700-b97e-11e2-8dc9-976d2e8732bf
{% endhighlight %}

You can adjust these capabilities in your `acceptance.suite.yml` file like so:

{% highlight bash %}
modules:
   enabled: [Selenium2]
   config:
      Selenium2:
         url: 'http://localhost/'
         browser: phantomjs
         capabilities:
             webStorageEnabled: true
{% endhighlight %}

I have no idea if capabilities from the larger list of Selenium [DesiredCapabilities](http://code.google.com/p/selenium/wiki/DesiredCapabilities) that are not on the list you see reported from the driver are enabled for PhantomJS. 

Headless testing can be a bit of a challenge, since it's impossible to 'see' what failed. But in this case, Codeceptions default logging and screenshot capture on failure can be extremely helpful, since you can then actually see the state of the browser at the point of failure.

There's quite a bit more that you can do with PhantomJS. The [CasperJS](http://casperjs.org/index.html) project makes good use of the PhantomJS API and if you already have NodeJS installed it's a quick and easy way to play with some of the PhantomJS capabilities. CapserJS, aside from requiring NodeJS, only drives PhantomJS. So its not a reasonable alternative to Codeception. Maybe at some point there will be a native Mink driver for the PhantomJS API which will more fully exploit it.

Happy testing.