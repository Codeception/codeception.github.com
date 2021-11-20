---
title: Headless Browser Testing with Selenium2 and PhantomJS
layout: post
date: 2013-05-13 01:03:50
---

*This is a guest blogpost by [Jon Phipps](https://jonstuff.blogspot.com/). Jon explains how to use PhantomJS -- the most anticipated testing backend in Codeception.*

If you're running acceptance tests in [Codeception](https://codeception.com/) that require interaction with JavaScript, or have scripts that manipulate the DOM, the speedy [Php Browser](https://codeception.com/docs/modules/PhpBrowser) driver won't help you since it doesn't support JavaScript. The best options for running tests using JavaScript are the [Selenium2](https://codeception.com/docs/modules/Selenium2) and [ZombieJS](https://codeception.com/docs/modules/ZombieJS) drivers. 

The **Selenium2** driver actually loads and runs an active browser session, manipulating the browser just as a human would. **ZombieJS** is a 'headless' browser that provides all of the features of a regular browser, but without a display interface. Without the extra time spent waiting for the display to actually render, a headless browser like ZombieJS can run far faster than a normal browser, so you're tests will execute in as little as half the time. But ZombieJS requires installing Node.js and can be a little buggy, plus it has its own API (which has both pros and cons). The Selenium2 driver is well tested and implements a standard API -- the **WebDriver Wire Protocol** -- across all of the browsers it has drivers for. 

Now there's a headless browser that includes a WebDriver Wire Protocol implementation -- **[PhantomJS](https://phantomjs.org/index.html)**. The latest version of PhantomJS is an easy to install, stand-alone binary that doesn't require installing Node.js or any other dependencies, and ships with its own **'Ghost Driver'** for implementing the WebDriver Wire Protocol. Which means you can drive it using the Selenium2 driver in Codeception, and anything that you can test in Chrome, Firefox, Safari, or IE using Selenium2, you can now test in half the time using PhantomJS

Even though it's not needed to run the most recent PhantomJS, it's a good idea to have Selenium2 installed so you can test in other browsers. If you haven't installed Selenium2, you just need to follow the [instructions](https://codeception.com/docs/modules/Selenium2) on the Codeception web site for installing and running the Selenium2 driver. It's pretty simple, but totally optional.

To get started with PhantomJS, just [download PhantomJS](https://phantomjs.org/download.html). The binary is setup and ready to use for Linux, Mac OSX, and Windows. Put it, or a symlink to it, somewhere in your path so you can launch it from anywhere. 

You're done with installation!

Next, open up a new terminal window and launch PhantomJS, telling it to use the its built-in WebDriver extension to use the port Codeception is listening to (4444 is the default), and leave the window open:

{% highlight bash %}
$ phantomjs --webdriver=4444
{% endhighlight %}

You should see a response like this in your terminal:

{% highlight bash %}
PhantomJS is launching GhostDriver...
[INFO  - 2013-05-10T14:11:05.076Z] GhostDriver - Main - running on port 4444
{% endhighlight %}

Now just enable the Selenium2 driver in your `acceptance.suite.yml` file and use the browser setting `browser: phantomjs` (an example file is on the [Selenium2 driver page](https://codeception.com/docs/modules/Selenium2)). If you're changing _modules_ then you should also run `php codecept.phar build`. 

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

I have no idea if capabilities from the larger list of Selenium [DesiredCapabilities](https://code.google.com/p/selenium/wiki/DesiredCapabilities) that are not on the list you see reported from the driver are enabled for PhantomJS. 

Headless testing can be a bit of a challenge, since it's impossible to 'see' what failed. But in this case, Codeceptions default logging and screenshot capture on failure can be extremely helpful, since you can then actually see the state of the browser at the point of failure.

There's quite a bit more that you can do with PhantomJS. The [CasperJS](https://casperjs.org/index.html) project makes good use of the PhantomJS API and if you already have NodeJS installed it's a quick and easy way to play with some of the PhantomJS capabilities. CapserJS, aside from requiring NodeJS, only drives PhantomJS. So its not a reasonable alternative to Codeception. Maybe at some point there will be a native Mink driver for the PhantomJS API which will more fully exploit it.

Happy testing.
