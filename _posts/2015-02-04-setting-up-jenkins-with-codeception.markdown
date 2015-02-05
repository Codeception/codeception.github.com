---
layout: post
title: "Setting up Jenkins with Codeception"
date: 2015-02-04 01:03:50
---

![Jenkins](/images/jenkins/Jenk1.png)

A frequent question that appear from time to time is How to set up Codeception with [Jenkins](http://jenkins-ci.org/). Despite the growth of popularity of various Continuous Integration solutions Jenkins is still the most popular open-source solution on market. It is easy to setup and is easy to customize by applying various 3rd-party plugins. In this post we will take a look on how to setup testing process of **PHP project with Jenkins CI and Codeception**.  

![Create new job in Jenkins](/images/jenkins/Jenk2.png)

## Preparing Jenkins

We will start from an empty Jenkins Server executed on localhost. Let's create a new Job for project tested with Codeception and name it   PHPCodeceptionProject. Before we proceed to configuring it, lets install required plugins:

* **Git Plugin** - for building tests for Git repo
* **Green Balls** - to display success results in green.
* **xUnit Plugin**, **jUnit Plugin** - to process and display Codeception XML reports
* **HTML Publisher Plugin** - to process Codeception HTML reports
* **AnsiColor** - to show colorized console output.

![Jenkins Plugins](/images/jenkins/Jenk3.png)

## Basic Setup

Once everything is installed lets get back to configuring our newly created PHPCodeceptionProject. At first we will set up Git to checkout code and build. Depending on your needs you can set up periodical build or trigger build once the change is pushed to GitHub (you will need GitHub plugin for that). You may also set up **Jenkins as alternative to Travis CI** to build your pull requests with `GitHub pull request builder plugin`. 

We will enable colors in console using Ansi Color 

![Jenkins ANSI color](/images/jenkins/Jenk4.png)

Next and the most important part is to define build step. We won't create any sofisticated environment settings like setting up database and services. We assume that all we need to execute tests is to inctall composer dependencies and run codeception tests:

{% highlight bash %}
composer install
./vendor/bin/codecept run
{% endhighlight %}

![Jenkins Codeception Build Step](/images/jenkins/Jenk5.png)

And that's the absolute minimum we need to execute tests in Jenkins. We can save project and execute the job. Jenkins will clone repository from Git, install composer dependencies and run Codeception tests. If tests fail you can review the console output to discover what went wrong. 

![Jenkins Console Output](/images/jenkins/Jenk6.png)

## XML Reports

But we don't want to analyze console output for each failing build. Especially If Jenkins can collect and display the results inside its web UI. Codeception can export its results using JUnit XML format. To generate XML report on each build we will need to append `--xml` option to Codeception execution command. Codeception will print `result.xml` file containing information about test status with steps and stack traces for failing tests. Unfortunately Jenkins can't process such special like Codeception steps. So we will need to configure to print data only which strictly applies to xUnit xml format. This should be done in `codeception.yml`

{% highlight yaml %}
settings:
    strict_xml: true
{% endhighlight %}

Now let's update our build step to generate xml:

{% highlight bash %}
composer install
./vendor/bin/codecept run --xml
{% endhighlight %}

and ask Jenkins to collect resulted XML. This can be done as part of Post-build actions. Let's add *Publish xUnit test result report* action and configure it to use with PHPUnit reports.

![Use PHPUnit xUnit builder for Jenkins](/images/jenkins/Jenk7.png)

Now we should specify path to PHPUnit style XML reports. In case of standard Codeception setup we should specify `tests/_output/*.xml` as a pattern for matching resulted XMLs. Now we save the project and rebuild it.

![Jenkins Result Trend](/images/jenkins/Jenk8.png)

Now for all builds we will see results trend graph that shows us percentage of passing and failing tests. We also will see a **Latest Test Result** link which will lead to to the page where all executed tests and their stats listed in a table.


## HTML Reports

To get more details on steps executed you can ask Codeception to generate HTML report. Jenkins can display them as well. 

{% highlight bash %}
composer install
./vendor/bin/codecept run --html
{% endhighlight %}

Now we need HTML Publisher plugin configured to display generated HTML files. It should be added as post-build action similar way we did it for XML reports.

![Jenkins Codeception HTML Setup](/images/jenkins/Jenk9.png)

Jenkins should locate `report.html` located at `tests/_output/`. Now Jenkins will display HTML reports for each build.

![Jenkins HTML Report](/images/jenkins/Jenki10.png)
![Jenkins Codeception HTML Results](/images/jenkins/Jenki11.png)

That's pretty much everything you need to get a simple Jenkins setup with Codeception. 



