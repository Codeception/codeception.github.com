---
layout: post
title: "Codeception 2.1 Beta"
date: 2015-05-02 01:03:50
---

We are glad to announce the first release of Codeception 2.1. It was a long time of developing the next major version of our testing framework. We delayed the release many times trying to bring as many cool features as we could. Today we can say that master branch is stabilized and we are prepared to share results of our work with you. Codeception 2.1 tries to do its best in test codebase organizing, improving ux, and customization.  

[Take a look](http://codeception.com/slides/codecept21) what is landed in Codeception 2.1.


<script async class="speakerdeck-embed" data-id="aa35edd4591343369f634ce29944134d" data-ratio="1.41436464088398" src="//speakerdeck.com/assets/embed.js"></script>



Full list of features is available in [changelog](https://github.com/Codeception/Codeception/blob/master/CHANGELOG.md#210-beta). [Documentation was updated](https://github.com/Codeception/Codeception/pull/1878/files?diff=unified) accordingly. 

You can install Codeception 2.1 via composer by requiring `2.1.0-beta` version, or by [downloading phar](/releases/2.1.0-beta/codecept.phar).

Give new Codeception a try and send us feedback. As always [use GitHub issues](https://github.com/Codeception/Codeception/issues) for that. Thanks for being with us all that time! We hope you will love this release.

Stable 2.1.0 is expected by the middle-end of May


## Upgrade Notes

* If you are upgrading from Codeception 2.0 delete actor classes in `tests/acceptance`, `tests/functional`, etc, and rebuild actor classes. They will be recreated in `tests/_support`.
* Try to execute new tests. If there are unmet dependencies, or module conflicts, you will be notified by exception with an advice how to resolve it.
* It is recommended to recreate Helpers per suite with `g:helper` generator, like `codecept g:helper Acceptance`. New helpers will be store in `tests/_support/Helper`. 
* Same for PageObjects and StepObjects, they should be moved to `_support`.