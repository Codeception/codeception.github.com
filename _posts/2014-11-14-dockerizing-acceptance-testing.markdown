---
layout: post
title: "Acceptance Testing With No Selenium or PhantomJS Installed"
date: 2014-11-14 01:03:50
---

![Selenium](http://www.seleniumhq.org/images/big-logo.png)
![PhantomJS](https://cdn.tutsplus.com/net/uploads/legacy/2161_phantom/preview.png)

This post summarizes some recent work that was done for creating portable testing environments. The idea was to reduce dependencies required by acceptance testing. As you know, testing of web pages require Selenium or PhanromJS servers, which allow to interact with web page, and execute user scripts on page. However, installing those dependencies, can be a pain. Especially Selenium. If you are not running it inside desktop environment you probably need to have Firefox or Chromium, and they can't be run without virtual framebuffer, as they have some display server to run on. Setting up those packages can take liters of sweat and bunch of nerves.

That's why we decided to pack **Selenium and PhantomJS into portable Docker containers**. Did you hear about [Docker](http://docker.com)? If not - you probably should take some time to look at it. Docker allows you to create virtual environments on Linux hosts without real virtualization. Docker creates an isolated environment inside the host machine without recreating operating system. 

Docker containers are lightweight and easy to use. If you have Linux. Probably all your servers use Linux, so you might find docker images of Selenium and PhantomJS pretty useful!

### Selenium From Container

OK, lets assume **you are using Linux and Docker >=1.2**. 
From now on running Selenium won't take from you anything more then running those commands:

{% highlight bash %}
docker run -i -t -p 4444:4444 davert/selenium-env
{% endhighlight %}

This will start virtual display server (Xvfb) and Selenium inside a container. Please note, you don't need anything of those installed on your host. Not even Java, required to run Selenium. Only Docker is needed and you can run Selenium in one line!

By running this command you will see this output:

{% highlight bash %}
Running Selenium Env: Selenium Server, and Xvfb with Firefox and Chromium
Host IP: 172.17.42.1
[dix] Could not init font path element /usr/share/fonts/X11/cyrillic, removing from list!
[dix] Could not init font path element /usr/share/fonts/X11/100dpi/:unscaled, removing from list!
[dix] Could not init font path element /usr/share/fonts/X11/75dpi/:unscaled, removing from list!
[dix] Could not init font path element /usr/share/fonts/X11/Type1, removing from list!
[dix] Could not init font path element /usr/share/fonts/X11/100dpi, removing from list!
[dix] Could not init font path element /usr/share/fonts/X11/75dpi, removing from list!
[dix] Could not init font path element /var/lib/defoma/x-ttcidfont-conf.d/dirs/TrueType, removing from list!
02:02:30.641 INFO - Launching a standalone server
02:02:30.670 INFO - Java: Oracle Corporation 24.60-b09
02:02:30.670 INFO - OS: Linux 3.16.0-24-generic amd64
02:02:30.684 INFO - v2.44.0, with Core v2.44.0. Built from revision 76d78cf
02:02:30.735 INFO - Default driver org.openqa.selenium.ie.InternetExplorerDriver registration is skipped: registration capabilities Capabilities [{platform=WINDOWS, ensureCleanSession=true, browserName=internet explorer, version=}] does not match with current platform: LINUX
02:02:30.790 INFO - RemoteWebDriver instances should connect to: http://127.0.0.1:4444/wd/hub
02:02:30.791 INFO - Version Jetty/5.1.x
02:02:30.792 INFO - Started HttpContext[/selenium-server/driver,/selenium-server/driver]
02:02:30.792 INFO - Started HttpContext[/selenium-server,/selenium-server]
02:02:30.793 INFO - Started HttpContext[/,/]
02:02:30.806 INFO - Started org.openqa.jetty.jetty.servlet.ServletHandler@1a966bcb
02:02:30.807 INFO - Started HttpContext[/wd,/wd]
02:02:30.809 INFO - Started SocketListener on 0.0.0.0:4444
02:02:30.809 INFO - Started org.openqa.jetty.jetty.Server@2b6ea258
{% endhighlight %}

By specifying `-p 4444:4444` option in `docker run` we mapped container's port 4444, which is default for Selenium to the same port on our host machine. So, any process can connect to Selenium on its standard port, even Selenium is completely isolated from other processes.

And here comes a tricky question. If Selenium is completely isolated, how can we test applications running on a local web server? We have a solution for that. If your application is served by nginx or any other web server, you can probably access it by hostname (other than localhost). What we can do is to pass hostname inside a container. 

{% highlight bash %}
docker run -i -t -p 4444:4444 -e APP_HOST=myhost davert/selenium-env
{% endhighlight %}

This will bind `myhost` to your host machine IP. So, container, and Firefox, Chromium, can get access to your local web site from inside container. 

Similar idea is used for application executed on specific port. If you use PHP built-in server, you can start it at specific port, and pass it into container as well. Please note, that to make server accessible from container, it should be started on `0.0.0.0` IP:

{% highlight bash %}
php -S 0.0.0.0:8000
# in new terminal window
docker run -i -t -p 4444:4444 -e APP_PORT=8000 davert/selenium-env 
# in new terminal window
codecept run acceptance
{% endhighlight %}

### PhantomJS From Container

Instructions are the same for **running PhantomJS**. It can be started with 

{% highlight bash %}
docker run -i -t -p 4444:4444 davert/phantomjs-env
{% endhighlight %}

Everything else is pretty similar. Also you can easily switch from Selenium to PhantomJS by starting or stopping those two containers. Isn't that useful?

## Images and Source Code

[SeleniumEnv](https://github.com/Codeception/SeleniumEnv) and [PhantomJS](https://github.com/Codeception/PhantomJsEnv) are created from [Travis CI Cookbooks](https://github.com/travis-ci/travis-cookbooks) and packed into containers. They are free to use and free to modify for custom needs. 

If you need to have Selenium Server from version other than 2.44.0 (which is latest for today), you should update Docker file and build an image from it. 

SeleniumEnv and PhantomEnv may simplify testing for all Linux users. They will definitely simplify setting up Continuous Integration servers. You can even **recreate a complete testing environment inside a container**. Take a look into [RoboCI](https://github.com/Codegyre/RoboCI) project for this. It allows you to build Travis CI-like service on your own host!

Use them and enjoy :)

P.S. Feedback, Pull Requests, and Issues, are welcome )