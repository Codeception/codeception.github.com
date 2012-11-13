---
title: Protips 2 - Extending Modules
layout: post
date: 2012-11-13 01:03:50
---

Today, we will continue covering advanced topics on Codeception. The main power of Codeception is it's modules, there are already plenty of them, even though you might want to extend one of them. Let's say you are using **Symfony2** and you want to add additional actions, you actually miss in current module, like dealing with FOSUserBundle: registering, authenticating, etc.
You can create a helper and connect with Symfony2 module, get access to dependency injection container and do anything you need there. Sometimes you might want to change the module initialization scripts. This happens if your application configured in a custom way and module doesn't work properly because of it.

In both cases you might want to improve current Symfony2 (or any other module) implementation. That's pretty easy, because we can use just the simple OOP inheritance. You can create your own module `Symfony2Helper` and inherit it from default Symfony2 module. This module will act as a regular Helper, and should be placed to `tests/_helpers` dir.

In the next example we will redefine initialization for working with Symfony2 applications located in `app/frontend` path with Kernel class located in `app`.

{% highlight php %}
<?php
class Symfony2Helper extends \Codeception\Module\Symfony2
{
	// overriding standard initialization
    public function _initialize() {
    	// bootstrap
        require_once getcwd().'app/frontend/bootstrap.php.cache';
        // kernel class
        require_once  getcwd().'/FrontendKernel.php';

        $this->kernel = new FrontendKernel('test', true);
        $this->kernel->boot();

        $dispatcher = $this->kernel->getContainer()->get('event_dispatcher');
        $dispatcher->addListener('kernel.exception', function ($event) {
            throw $event->getException();
        });
    }	
}
?>
{% endhighlight %}

Please, refer to the `_initialize` [method implementation](https://github.com/Codeception/Codeception/blob/master/src/Codeception/Module/Symfony2.php#L37) to understand the default behavior. To get the idea whether you need to inherit and redeclare methods of module, you need to review it's code. If you see your requirements can't be met by using config options, please override. 

By using inheriteance you can redeclare all the methods or initialization hooks you don't like. The API of parent module is pretty clean and even when you use the `phar` version of Codeception, you can read it's code on GitHub. If you stuck because Codeception module works improperly, you are free to fix that. 

And yep, if your improved module is worth sharing with community, submit a patch and it will be added to official distribution. After all, that's how the Open Source works.

Thanks for reading. Use Codeception professionally.