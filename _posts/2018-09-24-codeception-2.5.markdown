---
layout: post
title: "Codeception 2.5: Snapshots"
date: 2018-09-24 01:03:50
---

The Autumn is a good time to start something new. How about new Codeception?
As you know, each minor release indicates some important change, new features we wanted to share.
This time we want to introduce you to 

## Snapshots

That's the new feature, which might be useful if you are tired of harcoding your data into fixtures. For instance, when you test the search engine you don't know the exact list of items to check, however, you are interested that the list would be the same every time for a search term.
What about API responses? You don't want to hardcode it fully but you may want to check that response is the same as it was before.

So now Codeception can do what [php-vcr](https://github.com/php-vcr/php-vcr) was doing all the time. Saving data into the file (called snapshot), and comparing with it on next runs.

This is nice feature for testing REST APIs.

Let's assume you have such JSON response. 

```json
{
  "firstName": "John",
  "lastName" : "doe",
  "phoneNumbers": [
    {
      "type"  : "iPhone",
      "number": "0123-4567-8888"
    },
    {
      "type"  : "home",
      "number": "0123-4567-8910"
    }
  ]
}
```

And you want to check that phone numbers are the same on each run.
For this we can use a snapshot.

```php
namespace Snapshot;

class PhoneNumberSnapshot extends Codeception\Snapshot {
  
    /** @var \ApiTester */
    protected $i;

    public function __construct(\ApiTester $I)
    {
        $this->i = $I;
    }

    protected function fetchData()
    {
        // return an array of phone numbers
        return $this->i->grabDataFromResponseByJsonPath('$.phoneNumbers[*].number');
    }  

}
```

Then in test we can check if data matches the snapshot by calling the snapshot class:

```php
public function testUsers(ApiTester $I, \Snapshot\PhoneNumberSnapshot $shapsnot)
{  
  $I->sendGET('/api/users');
  $snapshot->assert();
}
```

If the data changes, snapshot is easy to update. Just run the test in `--debug` mode. 
The snapshot will be overwritten with a new data. 

So, the good thing about snapshots:

* you don't keep flaky data in your code
* you don't need to hardcode data values
* data can be easily updated on change

Use them!

---

There are also some other minor changes:

* **[Db module](https://codeception.com/docs/modules/Db#Example-with-multi-databases) now supports multiple database** connections. If you use few databases we got you covered! That was a long awaited feature and finally we have a very nice implementation from @eXorus.
* `--seed` parameter added to `run` so you could rerun the tests in same order. This feature works only if you enabled [shuffle](https://codeception.com/docs/07-AdvancedUsage#Shuffle) mode. 
* Possible breaking: `seeLink` behavior changed.
  * Previous: `$I->seeLink('Delete','/post/1');` matches `<a href="/post/199">Delete</a>`
  * Now: `$I->seeLink('Delete','/post/1');` does NOT match `<a href="/post/199">Delete</a>` 

[See changelog](https://codeception.com/changelog) for the complete list of fixes and improvements.

Thanks to all our contributors who made this release happen!

---

## Call to Sponsors!

We try to keep Codeception going and bring more releases to you. If your company uses this framework and you'd like to give back please consider **sponsoring Codeception**. That's right. We are asking to invest into open source, to get the features you expect and to give back to open source.

For instance, how would you like improving stability of WebDriver tests?
It would be cool to automatically **retry failed steps** and **rerun failed tests**. 
These could be a very cool features but they can't be made without your help. 

If you are interested consider sponsoring us:

<p class="text-center">
<a href="https://docs.google.com/forms/d/e/1FAIpQLSeVJWu2HJTjAE81SLiYJ1xqxAXeNNSCR_GO9R0_4CKka_nFvA/viewform?usp=send_form" class="btn btn-lg btn-success" role="button">Sponsor Codeception</a></p>

Yes, we also provide [enterprise support](https://sdclabs.com/codeception?utm_source=codeception.com&utm_medium=top_menu&utm_term=link&utm_campaign=reference) and [trainings](https://sdclabs.com/trainings?utm_source=codeception.com&utm_medium=top_menu&utm_term=link&utm_campaign=reference). This is another way you can support the development. Thank you!

