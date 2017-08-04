---
layout: post
title: "Writing Better Tests: Riding The Command Bus"
date: 2017-08-04 01:03:50
---

Before writing any line of test code we should think of how meaningful this test would be. The best code is the code you never write, you know. So if you ever begin to think of which parts of the application you should cover with tests.

* [Part 1: Expectation vs Implementation](http://codeception.com/12-21-2016/writing-better-tests-expectation-vs-implementation.html)
* [Part 2: Obtaining Specification](http://codeception.com/04-21-2017/writing-better-tests-obtaining-specification.html)

Let's start with a heart of your application, the Business Logic.

### Layered Architecture

Depending on architecture Business logic could be in Controller (ough), in Model (ough-ough), or in a special Service layer, which is the most preferred way. Business Logic responsible for taking decisions: which entities are valid and which are not, who can create entities, what happens when the entity is stored. Service layer should delegate the database operations to the infrastructure level.

![](/images/layered.png)

Infrastructure level is purely technical. It just takes orders from Service layer and executes them. It doesn't make any decisions on its own. In most cases, ORM should be at the infrastructure level.

While models or repositories do not contain any decision making logic **it is not that important what ORM type to use**: ActiveRecord or DataMapper.

### CommandBus and Domain Events

One of the solution to separate business logic from everything would be the 
**CommandBus** architecture.

![](/images/architecture.png)

CommandBus is well-known in PHP community. Learn more about it from 

* [A wave of command buses](https://php-and-symfony.matthiasnoback.nl/2015/01/a-wave-of-command-buses/) blogpost by Matthias Noback
* [Laracats](https://laracasts.com/series/commands-and-domain-events)
* [Tactician](https://tactician.thephpleague.com) library by Ross Tuck

If the application implements CommandBus pattern it is easy to find the business logic. 
It is located in command handlers. So let's test them!

### Testing CommandHandler

CommandHandler takes a command, calls the infrastructure services, and sends the domain events. In theory, CommandHandlers can be tested in isolation, with unit tests. Infrastructure services can be mocked and domain events can be caught. However, those tests may have a little sense. And here is why/

"Trust me, I will save this to database" - may say the test with mocked infrastructure. But there is no trust to it. To make the command handler reliable and reusable we need to ensure it does what it is expected to do. 

Also, mocks comes with their price. While integration test is really similar to the actual business code, unit test is bloated with mock definitions. It will get hard to maintain and support it really soon:

```php
<?php
// is that a business logic test?
// but no business inside of it
$eventDispatcher = $this->createMock(EventDispatcher::class);
$busDispatcher = $this->getMockBuilder(BusDispatcher::class)
   ->setMethods(['dispatch'])
   ->getMock();

$busDispatcher->expects($this->exactly(2))
   ->method('dispatch')
   ->withConsecutive(
       [$this->isInstanceOf(CreateAccount::class)],
       [$this->isInstanceOf(CreateCompany::class)]
   );

$handler = new RegisterUserHandler($eventDispatcher, $busDispatcher);
// ... 
```

Here we also mix [implementation with a specification](http://codeception.com/12-21-2016/writing-better-tests-expectation-vs-implementation.html), which is a pure sin. What if `dispatch` method will be renamed? What if we fire more than 2 commands in a call? How is this related to business?

Even you can mock services you shouldn't always do it.

In most cases, **business logic should be tested with an integration test**. Because the database is an essential part of your application. You can't deliver an app without a database. The same way you can't make sure domain logic works as expected when nothing is stored in the database.

### Testing Flarum Forum

As an example let's pick [Flarum](https://flarum.org) project which is a forum built on top of Illuminate components (Laravel) and Symfony Components. What is most important that it has the [Commands and CommandHandlers](https://github.com/flarum/core/tree/master/src/Core/Command). By looking at one directory we can learn what Flarum does. That's awesome!

Looks like the #1 priority is to get all those Command Handlers tested.
We can use [StartDiscussionHandler](https://github.com/flarum/core/blob/master/src/Core/Command/StartDiscussionHandler.php) to start.

For integration tests, we need to initialize Application with its Dependency Injection Container. Then, we fetch `StartDiscussionHandler` out of it:

```php
<?php
protected function _before()
{
    // initialize Flarum app
    $server = new \Flarum\Forum\Server(codecept_root_dir());
    $app = $server->getApp();
    // get StartDiscussionHandler from container
    $this->handler = $app->make(StartDiscussionHandler::class);
}
```

When the handler is prepared we can write the first basic test:

```php
<?php
public function testAdminCanStartADiscussion()
{
    // ARRANGE: create command object with all required params
    $admin = User::find(1); // User #1 is admin
    $command = new StartDiscussion($admin, [ // create command
        'attributes' => [
            'title' => 'How about some tests?',
            'content' => 'We discuss testing in this thread'
        ]
    ], '127.0.0.1');
    // ACT: proceed with handler
    $discussion = $this->handler->handle($command);
    // ASSERT: check response
    $this->assertNotNull($discussion);
    $this->assertEquals('How about some tests?', $discussion->title);
}
```

How do you like this test? This test so tiny and so easy to read. Sure, we should add more assertions to find out that all the business rules are applied, but for now it's ok to try the very basic scenario. Maintaining and extending this test will be a pleasure.

### A bit of Stubs and Mocks

Integration test represents a part of a system, a working component. 
Once it triggers the outer service, it should be mocked. 
In layered architecture, a class from a layer should have access to its neighbors, and to classes of lower levels. So in our case, CommandHandler of business logic can access other command handlers but should be banned from accessing other services or other command buses.

For sure, mailers, queues, and other asynchronous services should be replaced with stubs.

### Conclusion

Your application has a heart. Don't make it die from a heart attack. Write tests.
Write meaningful stable tests that will last. 


*Written by Michael Bodnarchuk*

<p style="background: rgba(255,255,0,0.3)">We provide <a href=" http://sdclabs.com/codeception?utm_source=codeception.com&utm_medium=post&utm_term=link&utm_campaign=reference">consulting services</a> and trainings on Codeception and automated testing in general.</p>