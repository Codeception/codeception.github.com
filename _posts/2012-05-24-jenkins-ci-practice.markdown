---
layout: post
title: "Continuous Integration In Practice: Codeception, Jenkins, Xvfb"
date: 2013-05-24 22:03:50
---

*Another blogpost from Ragazzo containing some practical information. If you ever wanted to ask how to set up a Continuous Integration with Codeception, you can read it here. He shares some useful tips you should be aware of.*

It is very good to automate maximum of the things you can. Once we automated testing process, build should be automated too. I use [Jenkins](http://jenkins-ci.org/) as my primary continuous integration server. It can be installed and executed on all popular operating systems with Java enabled. 


<img src="http://jenkins-ci.org/sites/default/files/images/headshot.png" style="float: right;" />


As for PHPUnit I use JUnit format for error reports and some **Jenkins** plugins to make it work with Code Coverage. For **Behat** and **Codeception** I also use JUnit output log format and [Jenkins PHPUnit Plugin](http://jenkins-php.org/). 

Thus, my application have 4 jobs in Jenkins they named in that way:

* MyProject_Testing_Unit # via phpunit
* MyProject_Testing_Func # via behat
* MyProject_Testing_Func_Web  # codeception functional
* MyProject_Testing_Accep_Web # codeception acceptance

And of course one job for bulding packages for demo and for developer:

* MyProject_Build_Dist

 I scheduled jobs to run one by one so the first goes "Unit", then it triggers "Func", then "Func" triggers "Func_Web" and so on. "Build" is not triggered automatically, I start it by myself.

#### COnfiguring Builds 

Lets pay attention on two of them that include Codeception. I'm using **Ant** build tool to execute them.
Bascially for JUnit output you need nothing more then running codeception with `--xml` option. Like this:

{% highlight bash %}
codecept.phar --xml run functional
{% endhighlight %}

This will produce the `report.xml` file in `tests/_log` directory, which will be analyzed by Jenkins. In my Ant task I'm also clearing a _log directory before running tests.

{% highlight xml %}
<project name="{SomeMyProject}_Testing_Func_Web" default="build" basedir=".">
<target name="clean">
    <delete dir="${basedir}/build/src/protected/tests/codeception/tests/_log" includes="**/*" />
</target>
    <target name="codeception">
      <exec dir="${basedir}/build/src/protected/tests/codeception" executable="php" failonerror="true">
        <arg line="codecept.phar --xml run functional" />
      </exec>
    </target>
  <target name="build" depends="clean, codeception"/>
</project>
{% endhighlight %}

Also you may want to add the `--html` option for execution. That would produce a readable HTML report, that you can show to your boss. You will need [HTML Publisher Plugin](https://wiki.jenkins-ci.org/display/JENKINS/HTML+Publisher+Plugin) to display it in Jenkins web interface.

### Using Selenium2 and Xvfb

To run acceptance web tests correctly on server you don't need to install desktop environment like Gnome or XFCE just to launch a browser. Better to use Virtual Framebuffer [Xvfb](http://en.wikipedia.org/wiki/Xvfb) for running Selenium tests without showing them on screen. 

You need to install Xfvb and then run Selenium2 with this options:

{% highlight bash %}
export DISPLAY=":1" && java -jar selenium-server-standalone.jar
{% endhighlight %}

Then start your Codeception acceptance tests as usual. By the way, I suggest you to use [this Xvfb init script](https://gist.github.com/jterrace/2911875) in Ubuntu.

*There is nothing hard in setting up Jenkins. You can use Codeception with it or in any other CI server. If you already did that, please share your experience with community. We really need more personal experiences and blogposts from the community. Documentation can't cover all use cases, that's why your thought are much appreciated. If you don't have a blog we can publish your blogpost here.

P.S. Just to mention, If you are using **Bamboo** CI server, pls enable the `--no-exit` option to run tests correctly.*