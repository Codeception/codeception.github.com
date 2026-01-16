---
layout: doc
title: API Testing - Codeception Docs
---

<div class="alert alert-success">💡 <b>You are reading docs for latest Codeception 5</b>. <a href="/docs/4.x/APITesting">Read for 4.x</a></div>

# API Testing

The same way we tested a web site, Codeception allows you to test web services. They are very hard to test manually, so it's a really good idea to automate web service testing. We have SOAP and REST as standards, which are represented in corresponding modules, which we will cover in this chapter.

You should start by creating a new test suite, (which was not provided by the `bootstrap` command). We recommend calling it **Api** and using the `ApiTester` class for it.

```bash
php vendor/bin/codecept generate:suite Api
```

We will put all the api tests there.

## REST API

> **NOTE:** REST API testing requires the `codeception/module-rest` package to be installed.

The REST web service is accessed via HTTP with standard methods: `GET`, `POST`, `PUT`, `DELETE`. They allow users to receive and manipulate entities from the service. Accessing a WebService requires an HTTP client, so for using it you need the module `PhpBrowser` or one of framework modules set up. For example, we can use the `Symfony` module for Symfony2 applications in order to ignore web server and test web service internally.

Configure modules in `Api.suite.yml`:

```yaml
actor: ApiTester
modules:
    enabled:
        - REST:
            url: http://serviceapp/api/v1/
            depends: PhpBrowser
```

The REST module will connect to `PhpBrowser` according to this configuration. Depending on the web service we may deal with XML or JSON responses. Codeception handles both data formats well, however If you don't need one of them, you can explicitly specify that the JSON or XML parts of the module will be used:

```yaml
actor: ApiTester
modules:
    enabled:
        - REST:
            url: http://serviceapp/api/v1/
            depends: PhpBrowser
            part: Json
```

API tests can be functional and be executed using Symfony, Laravel, Yii2, or any other framework module. You will need slightly update configuration for it:

```yaml
actor: ApiTester
modules:
    enabled:
        - REST:
            url: /api/v1/
            depends: Laravel
```

Once we have configured our new testing suite, we can create the first sample test:

```bash
php vendor/bin/codecept generate:cest Api CreateUser
```

It will be called `CreateUserCest.php`. 
We need to implement a public method for each test. Let's make `createUserViaAPI` to test creation of a user via the REST API.

```php
class CreateUserCest
{
    // tests
    public function createUserViaAPI(ApiTester $I)
    {
        $I->amHttpAuthenticated('service_user', '123456');
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPost('/users', [
          'name' => 'davert', 
          'email' => 'davert@codeception.com'
        ]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"result":"ok"}');
        
    }
}
```

### Authorization

To authorize requests to external resources, usually provider requires you to authorize using headers. Additional headers can be set before request using `haveHttpHeader` command:

      
```php
$I->haveHttpHeader('api_key', 'special-key');
```

For common authorization patterns use one of the following methods:

* `amAWSAuthenticated`
* `amBearerAuthenticated`
* `amDigestAuthenticated`
* `amHttpAuthenticated`
* `amNTLMAuthenticated`

### Sending Requests

The real action in a test happens only when a request is sent. Before a request you may provide additional http headers which will be used in a next request to set authorization or expected content format.

```php
<?php
$I->haveHttpHeader('accept', 'application/json');
$I->haveHttpHeader('content-type', 'application/json');
```

When headers are set, you can send a request. To obtain data use `sendGet`:

```php
<?php
// pass in query params in second argument
$response = $I->sendGet('/posts', [ 'status' => 'pending' ]);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
```

To create or update data you can use other common methods:

* `sendPost`
* `sendPut`
* `sendPatch`
* `sendDelete`

To send a request with custom method use `send` action:

```php
<?php
$response = $I->send('TRACE', '/posts');
```

> sendAsJson methods were introduced in module-rest 1.4.1

If API endpoint accepts JSON you can use `send` methods with `AsJson` suffix to convert data automatically.
In this case `Content-Type` header is sent with `application/json` value and response if JSON is parsed:

```php
$I->sendPostAsJson('/users', ['name' => 'old name']);
$users = $I->sendGetAsJson('/users');
$I->sendPutAsJson('/users/' . $users[0]['id'], ['name' => 'new name']);
$I->sendDeleteAsJson('/users/' . $users[1]['id']);
```

To enable steps with `AsJson` suffix enable `Codeception\Step\AsJson` step decorator in suite config:

```yaml
actor: ApiTester
step_decorators:
    - \Codeception\Step\AsJson
```
and rebuild actions:

```
php vendor/bin/codecept build
```

> `sendGetAsJson`, `sendPutAsJson`, and others, are implemented as a [Step Decorator](https://codeception.com/docs/08-Customization#Step-Decorators).


### JSON Structure Validation

If we expect a JSON response to be received we can check its structure with [JSONPath](https://goessner.net/articles/JsonPath/). It looks and sounds like XPath but is designed to work with JSON data, however we can convert JSON into XML and use XPath to validate the structure. Both approaches are valid and can be used in the REST module:

```php
<?php
$I->sendGet('/users');
$I->seeResponseCodeIs(HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseJsonMatchesJsonPath('$[0].user.login');
$I->seeResponseJsonMatchesXpath('//user/login');
```

More detailed check can be applied if you need to validate the type of fields in a response.
You can do that by using with a [seeResponseMatchesJsonType](https://codeception.com/docs/modules/REST#seeResponseMatchesJsonType) action in which you define the structure of JSON response.

```php
<?php
$I->sendGet('/users/1');
$I->seeResponseCodeIs(HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id' => 'integer',
    'name' => 'string',
    'email' => 'string:email',
    'homepage' => 'string:url|null',
    'created_at' => 'string:date',
    'is_active' => 'boolean'
]);

```

Codeception uses this simple and lightweight definitions format which can be [easily learned and extended](https://codeception.com/docs/modules/REST#seeResponseMatchesJsonType).

### Working with Responses

Responses are returned from `send*` methods:

```php<?php

$users = $I->sendGet('/users');

// alternatively

$users = $I->grabResponse();
```

When you need to obtain a value from a response and use it in next requests you can use `grab*` methods. For instance, use `grabDataFromResponseByJsonPath` allows to query JSON for a value.

```php<?php
list($id) = $I->grabDataFromResponseByJsonPath('$.id');
$I->sendGet('/pet/' . $id);
```

### Validating Data JSON Responses

The last line of the previous example verified that the response contained the provided string. However we shouldn't rely on it, as depending on content formatting we can receive different results with the same data. What we actually need is to check that the response can be parsed and it contains some of the values we expect. In the case of JSON we can use the `seeResponseContainsJson` method

```php
<?php
// matches {"result":"ok"}'
$I->seeResponseContainsJson(['result' => 'ok']);
// it can match tree-like structures as well
$I->seeResponseContainsJson([
  'user' => [
      'name' => 'davert',
      'email' => 'davert@codeception.com',
      'status' => 'inactive'
  ]
]);

```

You may want to perform even more complex assertions on a response. This can be done by writing your own methods in the [Helper](https://codeception.com/docs/06-ReusingTestCode#Modules-and-Helpers) classes. To access the latest JSON response you will need to get the `response` property of the `REST` module. Let's demonstrate it with the `seeResponseIsHtml` method:

```php
<?php
namespace Helper;

class Api extends \Codeception\Module
{
  public function seeResponseIsHtml()
  {
    $response = $this->getModule('REST')->response;
    $this->assertRegExp('~^<!DOCTYPE HTML(.*?)<html>.*?<\/html>~m', $response);
  }
}

```

The same way you can receive request parameters and headers.

### Testing XML Responses

In case your REST API works with XML format you can use similar methods to test its data and structure.
There is `seeXmlResponseIncludes` method to match inclusion of XML parts in response, and `seeXmlResponseMatchesXpath` to validate its structure.

```php
<?php
$I->sendGet('/users.xml');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsXml();
$I->seeXmlResponseMatchesXpath('//user/login');
$I->seeXmlResponseIncludes(\Codeception\Util\Xml::toXml([
    'user' => [
      'name' => 'davert',
      'email' => 'davert@codeception.com',
      'status' => 'inactive'
  ]
]));

```

We are using `Codeception\Util\Xml` class which allows us to build XML structures in a clean manner. The `toXml` method may accept a string or array and returns \DOMDocument instance. If your XML contains attributes and so can't be represented as a PHP array you can create XML using the [XmlBuilder](https://codeception.com/docs/reference/XmlBuilder) class. We will take a look at it a bit more in next section.

> Use `\Codeception\Util\Xml::build()` to create XmlBuilder instance.

## SOAP API

SOAP web services are usually more complex. You will need PHP [configured with SOAP support](https://php.net/manual/en/soap.installation.php). Good knowledge of XML is required too. `SOAP` module uses specially formatted POST request to connect to WSDL web services. Codeception uses `PhpBrowser` or one of framework modules to perform interactions. If you choose using a framework module, SOAP will automatically connect to the underlying framework. That may improve the speed of a test execution and will provide you with more detailed stack traces.

Let's configure `SOAP` module to be used with `PhpBrowser`:

```yaml
actor: ApiTester
modules:
    enabled:
        - SOAP:
          depends: PhpBrowser
          endpoint: http://serviceapp/api/v1/
```

SOAP request may contain application specific information, like authentication or payment. This information is provided with SOAP header inside the `<soap:Header>` element of XML request. In case you need to submit such header, you can use `haveSoapHeader` action. For example, next line of code

```php
<?php
$I->haveSoapHeader('Auth', ['username' => 'Miles', 'password' => '123456']);
```
will produce this XML header

```xml
<soap:Header>
<Auth>
  <username>Miles</username>
  <password>123456</password>
</Auth>
</soap:Header>
```

Use `sendSoapRequest` method to define the body of your request.

```php
<?php
$I->sendSoapRequest('CreateUser', '<name>Miles Davis</name><email>miles@davis.com</email>');

```

This call will be translated to XML:

```xml
<soap:Body>
<ns:CreateUser>
  <name>Miles Davis</name>
  <email>miles@davis.com</email>
</ns:CreateUser>
</soap:Body>
```

And here is the list of sample assertions that can be used with SOAP.

```php
<?php
$I->seeSoapResponseEquals('<?xml version="1.0"<error>500</error>');
$I->seeSoapResponseIncludes('<result>1</result>');
$I->seeSoapResponseContainsStructure('<user><name></name><email></email>');
$I->seeSoapResponseContainsXPath('//result/user/name[@id=1]');

```

In case you don't want to write long XML strings, consider using [XmlBuilder](https://codeception.com/docs/reference/XmlBuilder) class. It will help you to build complex XMLs in jQuery-like style.
In the next example we will use `XmlBuilder` instead of regular XML.

```php
<?php
$I->haveSoapHeader('Session', array('token' => '123456'));
$I->sendSoapRequest('CreateUser', Xml::build()
  ->user->email->val('miles@davis.com'));
$I->seeSoapResponseIncludes(\Codeception\Util\Xml::build()
  ->result->val('Ok')
    ->user->attr('id', 1)
);

```

It's up to you to decide whether to use `XmlBuilder` or plain XML. `XmlBuilder` will return XML string as well.

You may extend current functionality by using `SOAP` module in your helper class. To access the SOAP response as `\DOMDocument` you can use `response` property of `SOAP` module.

```php
<?php
namespace Helper;
class Api extends \Codeception\Module {

    public function seeResponseIsValidOnSchema($schema)
    {
        $response = $this->getModule('SOAP')->response;
        $this->assertTrue($response->schemaValidate($schema));
    }
}

```

## Conclusion

Codeception has two modules that will help you to test various web services. They need a new `Api` suite to be created. Remember, you are not limited to test only response body. By including `Db` module you may check if a user has been created after the `CreateUser` call. You can improve testing scenarios by using REST or SOAP responses in your helper methods.


<div class="alert alert-warning"><a href="https://github.com/Codeception/codeception.github.com/edit/master/docs/APITesting.md"><strong>Improve</strong> this guide</a></div>
