---
layout: doc
title: REST - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-REST/releases">Changelog</a><a class="btn btn-default" href="https://github.com/Codeception/module-rest/tree/master/src/Codeception/Module/REST.php"><strong>source</strong></a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/3.1/docs/modules/REST.md">3.1</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.5/docs/modules/REST.md">2.5</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/REST.md">1.8</a></div>

# REST
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-rest

{% endhighlight %}

Alternatively, you can enable `REST` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



Module for testing REST WebService.

This module requires either [PhpBrowser](https://codeception.com/docs/modules/PhpBrowser)
or a framework module (e.g. [Symfony](https://codeception.com/docs/modules/Symfony), [Laravel](https://codeception.com/docs/modules/Laravel5))
to send the actual HTTP request.

### Configuration

* `url` *optional* - the url of api
* `shortDebugResponse` *optional* - number of chars to limit the API response length

#### Example

{% highlight yaml %}

modules:
   enabled:
       - REST:
           depends: PhpBrowser
           url: 'https://example.com/api/v1/'
           shortDebugResponse: 300 # only the first 300 characters of the response

{% endhighlight %}

In case you need to configure low-level HTTP headers, that's done on the PhpBrowser level like so:

{% highlight yaml %}

modules:
   enabled:
       - REST:
           depends: PhpBrowser
           url: &url 'https://example.com/api/v1/'
   config:
       PhpBrowser:
           url: *url
           headers:
               Content-Type: application/json

{% endhighlight %}

### JSONPath

[JSONPath](http://goessner.net/articles/JsonPath/) is the equivalent to XPath, for querying JSON data structures.
Here's an [Online JSONPath Expressions Tester](http://jsonpath.curiousconcept.com/)

### Public Properties

* headers - array of headers going to be sent.
* params - array of sent data
* response - last response (string)

### Parts

* Json - actions for validating Json responses (no Xml responses)
* Xml - actions for validating XML responses (no Json responses)

### Conflicts

Conflicts with SOAP module


### Actions

#### amAWSAuthenticated
 
Allows to send REST request using AWS Authorization

Only works with PhpBrowser
Example Config:
{% highlight yaml %}
yml
modules:
     enabled:
         - REST:
             aws:
                 key: accessKey
                 secret: accessSecret
                 service: awsService
                 region: awsRegion

{% endhighlight %}
Code:
{% highlight php %}

<?php
$I->amAWSAuthenticated();
?>

{% endhighlight %}
 * `param array` $additionalAWSConfig
@throws ConfigurationException


#### amBearerAuthenticated
 
Adds Bearer authentication via access token.

 * `param` $accessToken
 * `[Part]` json
 * `[Part]` xml


#### amDigestAuthenticated
 
Adds Digest authentication via username/password.

 * `param` $username
 * `param` $password
 * `[Part]` json
 * `[Part]` xml


#### amHttpAuthenticated
 
Adds HTTP authentication via username/password.

 * `param` $username
 * `param` $password
 * `[Part]` json
 * `[Part]` xml


#### amNTLMAuthenticated
 
Adds NTLM authentication via username/password.
Requires client to be Guzzle >=6.3.0
Out of scope for functional modules.

Example:
{% highlight php %}

<?php
$I->amNTLMAuthenticated('jon_snow', 'targaryen');
?>

{% endhighlight %}

 * `param` $username
 * `param` $password
@throws ModuleException
 * `[Part]` json
 * `[Part]` xml


#### deleteHeader
 
Deletes a HTTP header (that was originally added by [haveHttpHeader()](#haveHttpHeader)),
so that subsequent requests will not send it anymore.

Example:
{% highlight php %}

<?php
$I->haveHttpHeader('X-Requested-With', 'Codeception');
$I->sendGet('test-headers.php');
// ...
$I->deleteHeader('X-Requested-With');
$I->sendPost('some-other-page.php');
?>

{% endhighlight %}

 * `param string` $name the name of the header to delete.
 * `[Part]` json
 * `[Part]` xml


#### dontSeeBinaryResponseEquals
 
Checks if the hash of a binary response is not the same as provided.

{% highlight php %}

<?php
$I->dontSeeBinaryResponseEquals("8c90748342f19b195b9c6b4eff742ded");
?>

{% endhighlight %}
Opposite to `seeBinaryResponseEquals`

 * `param string` $hash the hashed data response expected
 * `param string` $algo the hash algorithm to use. Default md5.
 * `[Part]` json
 * `[Part]` xml


#### dontSeeHttpHeader
 
Checks over the given HTTP header and (optionally)
its value, asserting that are not there

 * `param` $name
 * `param` $value
 * `[Part]` json
 * `[Part]` xml


#### dontSeeResponseCodeIs
 
Checks that response code is not equal to provided value.

{% highlight php %}

<?php
$I->dontSeeResponseCodeIs(200);

// preferred to use \Codeception\Util\HttpCode
$I->dontSeeResponseCodeIs(\Codeception\Util\HttpCode::OK);

{% endhighlight %}

 * `[Part]` json
 * `[Part]` xml
 * `param` $code


#### dontSeeResponseContains
 
Checks whether last response do not contain text.

 * `param` $text
 * `[Part]` json
 * `[Part]` xml


#### dontSeeResponseContainsJson
 
Opposite to seeResponseContainsJson

 * `[Part]` json
 * `param array` $json


#### dontSeeResponseJsonMatchesJsonPath
 
See [#jsonpath](#jsonpath) for general info on JSONPath.
Opposite to [`seeResponseJsonMatchesJsonPath()`](#seeResponseJsonMatchesJsonPath)

 * `param string` $jsonPath
 * `[Part]` json


#### dontSeeResponseJsonMatchesXpath
 
Opposite to seeResponseJsonMatchesXpath

 * `param string` $xpath
 * `[Part]` json


#### dontSeeResponseMatchesJsonType
 
Opposite to `seeResponseMatchesJsonType`.

 * `[Part]` json
 * `param array` $jsonType JsonType structure
 * `param string` $jsonPath
@see seeResponseMatchesJsonType


#### dontSeeXmlResponseEquals
 
Checks XML response does not equal to provided XML.
Comparison is done by canonicalizing both xml`s.

Parameter can be passed either as XmlBuilder, DOMDocument, DOMNode, XML string, or array (if no attributes).

 * `param` $xml
 * `[Part]` xml


#### dontSeeXmlResponseIncludes
 
Checks XML response does not include provided XML.
Comparison is done by canonicalizing both xml`s.
Parameter can be passed either as XmlBuilder, DOMDocument, DOMNode, XML string, or array (if no attributes).

 * `param` $xml
 * `[Part]` xml


#### dontSeeXmlResponseMatchesXpath
 
Checks whether XML response does not match XPath

{% highlight php %}

<?php
$I->dontSeeXmlResponseMatchesXpath('//root/user[@id=1]');

{% endhighlight %}
 * `[Part]` xml
 * `param` $xpath


#### grabAttributeFromXmlElement
 
Finds and returns attribute of element.
Element is matched by either CSS or XPath

 * `param` $cssOrXPath
 * `param` $attribute
 * `return` string
 * `[Part]` xml


#### grabDataFromResponseByJsonPath
 
See [#jsonpath](#jsonpath) for general info on JSONPath.
Even for a single value an array is returned.
Example:

{% highlight php %}

<?php
// match the first `user.id` in json
$firstUserId = $I->grabDataFromResponseByJsonPath('$..users[0].id');
$I->sendPut('/user', array('id' => $firstUserId[0], 'name' => 'davert'));
?>

{% endhighlight %}

 * `param string` $jsonPath
 * `return` array Array of matching items
@throws \Exception
 * `[Part]` json


#### grabHttpHeader
 
Returns the value of the specified header name

 * `param` $name
 * `param Boolean` $first Whether to return the first value or all header values

 * `return string|array The first header value if` $first is true, an array of values otherwise
 * `[Part]` json
 * `[Part]` xml


#### grabResponse
 
Returns current response so that it can be used in next scenario steps.

Example:

{% highlight php %}

<?php
$user_id = $I->grabResponse();
$I->sendPut('/user', array('id' => $user_id, 'name' => 'davert'));
?>

{% endhighlight %}

 * `return` string
 * `[Part]` json
 * `[Part]` xml


#### grabTextContentFromXmlElement
 
Finds and returns text contents of element.
Element is matched by either CSS or XPath

 * `param` $cssOrXPath
 * `return` string
 * `[Part]` xml


#### haveHttpHeader
 
Sets a HTTP header to be used for all subsequent requests. Use [`deleteHeader`](#deleteHeader) to unset it.

{% highlight php %}

<?php
$I->haveHttpHeader('Content-Type', 'application/json');
// all next requests will contain this header
?>

{% endhighlight %}

 * `param` $name
 * `param` $value
 * `[Part]` json
 * `[Part]` xml


#### haveServerParameter
 
Sets SERVER parameter valid for all next requests.

{% highlight php %}

$I->haveServerParameter('name', 'value');

{% endhighlight %}


#### seeBinaryResponseEquals
 
Checks if the hash of a binary response is exactly the same as provided.
Parameter can be passed as any hash string supported by hash(), with an
optional second parameter to specify the hash type, which defaults to md5.

Example: Using md5 hash key

{% highlight php %}

<?php
$I->seeBinaryResponseEquals("8c90748342f19b195b9c6b4eff742ded");
?>

{% endhighlight %}

Example: Using md5 for a file contents

{% highlight php %}

<?php
$fileData = file_get_contents("test_file.jpg");
$I->seeBinaryResponseEquals(md5($fileData));
?>

{% endhighlight %}
Example: Using sha256 hash

{% highlight php %}

<?php
$fileData = '/9j/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/yQALCAABAAEBAREA/8wABgAQEAX/2gAIAQEAAD8A0s8g/9k='; // very small jpeg
$I->seeBinaryResponseEquals(hash("sha256", base64_decode($fileData)), 'sha256');
?>

{% endhighlight %}

 * `param string` $hash the hashed data response expected
 * `param string` $algo the hash algorithm to use. Default md5.
 * `[Part]` json
 * `[Part]` xml


#### seeHttpHeader
 
Checks over the given HTTP header and (optionally)
its value, asserting that are there

 * `param` $name
 * `param` $value
 * `[Part]` json
 * `[Part]` xml


#### seeHttpHeaderOnce
 
Checks that http response header is received only once.
HTTP RFC2616 allows multiple response headers with the same name.
You can check that you didn't accidentally sent the same header twice.

{% highlight php %}

<?php
$I->seeHttpHeaderOnce('Cache-Control');
?>>

{% endhighlight %}

 * `param` $name
 * `[Part]` json
 * `[Part]` xml


#### seeResponseCodeIs
 
Checks response code equals to provided value.

{% highlight php %}

<?php
$I->seeResponseCodeIs(200);

// preferred to use \Codeception\Util\HttpCode
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

{% endhighlight %}

 * `[Part]` json
 * `[Part]` xml
 * `param` $code


#### seeResponseCodeIsClientError
 
Checks that the response code is 4xx

 * `[Part]` json
 * `[Part]` xml


#### seeResponseCodeIsRedirection
 
Checks that the response code 3xx

 * `[Part]` json
 * `[Part]` xml


#### seeResponseCodeIsServerError
 
Checks that the response code is 5xx

 * `[Part]` json
 * `[Part]` xml


#### seeResponseCodeIsSuccessful
 
Checks that the response code is 2xx

 * `[Part]` json
 * `[Part]` xml


#### seeResponseContains
 
Checks whether the last response contains text.

 * `param` $text
 * `[Part]` json
 * `[Part]` xml


#### seeResponseContainsJson
 
Checks whether the last JSON response contains provided array.
The response is converted to array with json_decode($response, true)
Thus, JSON is represented by associative array.
This method matches that response array contains provided array.

Examples:

{% highlight php %}

<?php
// response: {name: john, email: john@gmail.com}
$I->seeResponseContainsJson(array('name' => 'john'));

// response {user: john, profile: { email: john@gmail.com }}
$I->seeResponseContainsJson(array('email' => 'john@gmail.com'));

?>

{% endhighlight %}

This method recursively checks if one array can be found inside of another.

 * `param array` $json
 * `[Part]` json


#### seeResponseEquals
 
Checks if response is exactly the same as provided.

 * `[Part]` json
 * `[Part]` xml
 * `param` $response


#### seeResponseIsJson
 
Checks whether last response was valid JSON.
This is done with json_last_error function.

 * `[Part]` json


#### seeResponseIsValidOnJsonSchema
 
Checks whether last response matches the supplied json schema (https://json-schema.org/)
Supply schema as relative file path in your project directory or an absolute path

@see codecept_absolute_path()

 * `param string` $schemaFilename
 * `[Part]` json


#### seeResponseIsValidOnJsonSchemaString
 
Checks whether last response matches the supplied json schema (https://json-schema.org/)
Supply schema as json string.

Examples:

{% highlight php %}

<?php
// response: {"name": "john", "age": 20}
$I->seeResponseIsValidOnJsonSchemaString('{"type": "object"}');

// response {"name": "john", "age": 20}
$schema = [
 "properties" => [
     "age" => [
         "type" => "integer",
         "minimum" => 18
     ]
 ]
];
$I->seeResponseIsValidOnJsonSchemaString(json_encode($schema));

?>

{% endhighlight %}

 * `param string` $schema
 * `[Part]` json


#### seeResponseIsXml
 
Checks whether last response was valid XML.
This is done with libxml_get_last_error function.

 * `[Part]` xml


#### seeResponseJsonMatchesJsonPath
 
See [#jsonpath](#jsonpath) for general info on JSONPath.
Checks if JSON structure in response matches JSONPath.

{% highlight json %}

  { "store": {
      "book": [
        { "category": "reference",
          "author": "Nigel Rees",
          "title": "Sayings of the Century",
          "price": 8.95
        },
        { "category": "fiction",
          "author": "Evelyn Waugh",
          "title": "Sword of Honour",
          "price": 12.99
        }
   ],
      "bicycle": {
        "color": "red",
        "price": 19.95
      }
    }
  }

{% endhighlight %}

{% highlight php %}

<?php
// at least one book in store has author
$I->seeResponseJsonMatchesJsonPath('$.store.book[*].author');
// first book in store has author
$I->seeResponseJsonMatchesJsonPath('$.store.book[0].author');
// at least one item in store has price
$I->seeResponseJsonMatchesJsonPath('$.store..price');
?>

{% endhighlight %}

 * `param string` $jsonPath
 * `[Part]` json


#### seeResponseJsonMatchesXpath
 
Checks if json structure in response matches the xpath provided.
JSON is not supposed to be checked against XPath, yet it can be converted to xml and used with XPath.
This assertion allows you to check the structure of response json.
    *
{% highlight json %}

  { "store": {
      "book": [
        { "category": "reference",
          "author": "Nigel Rees",
          "title": "Sayings of the Century",
          "price": 8.95
        },
        { "category": "fiction",
          "author": "Evelyn Waugh",
          "title": "Sword of Honour",
          "price": 12.99
        }
   ],
      "bicycle": {
        "color": "red",
        "price": 19.95
      }
    }
  }

{% endhighlight %}

{% highlight php %}

<?php
// at least one book in store has author
$I->seeResponseJsonMatchesXpath('//store/book/author');
// first book in store has author
$I->seeResponseJsonMatchesXpath('//store/book[1]/author');
// at least one item in store has price
$I->seeResponseJsonMatchesXpath('/store//price');
?>

{% endhighlight %}
 * `param string` $xpath
 * `[Part]` json


#### seeResponseMatchesJsonType
 
Checks that JSON matches provided types.
In case you don't know the actual values of JSON data returned you can match them by type.
It starts the check with a root element. If JSON data is an array it will check all elements of it.
You can specify the path in the json which should be checked with JsonPath

Basic example:

{% highlight php %}

<?php
// {'user_id': 1, 'name': 'davert', 'is_active': false}
$I->seeResponseMatchesJsonType([
     'user_id' => 'integer',
     'name' => 'string|null',
     'is_active' => 'boolean'
]);

// narrow down matching with JsonPath:
// {"users": [{ "name": "davert"}, {"id": 1}]}
$I->seeResponseMatchesJsonType(['name' => 'string'], '$.users[0]');
?>

{% endhighlight %}

You can check if the record contains fields with the data types you expect.
The list of possible data types:

* string
* integer
* float
* array (json object is array as well)
* boolean
* null

You can also use nested data type structures, and define multiple types for the same field:

{% highlight php %}

<?php
// {'user_id': 1, 'name': 'davert', 'company': {'name': 'Codegyre'}}
$I->seeResponseMatchesJsonType([
     'user_id' => 'integer|string', // multiple types
     'company' => ['name' => 'string']
]);
?>

{% endhighlight %}

You can also apply filters to check values. Filter can be applied with a `:` char after the type declaration,
or after another filter if you need more than one.

Here is the list of possible filters:

* `integer:>{val}` - checks that integer is greater than {val} (works with float and string types too).
* `integer:<{val}` - checks that integer is lower than {val} (works with float and string types too).
* `string:url` - checks that value is valid url.
* `string:date` - checks that value is date in JavaScript format: https://weblog.west-wind.com/posts/2014/Jan/06/JavaScript-JSON-Date-Parsing-and-real-Dates
* `string:email` - checks that value is a valid email according to http://emailregex.com/
* `string:regex({val})` - checks that string matches a regex provided with {val}

This is how filters can be used:

{% highlight php %}

<?php
// {'user_id': 1, 'email' => 'davert@codeception.com'}
$I->seeResponseMatchesJsonType([
     'user_id' => 'string:>0:<1000', // multiple filters can be used
     'email' => 'string:regex(~\@~)' // we just check that @ char is included
]);

// {'user_id': '1'}
$I->seeResponseMatchesJsonType([
     'user_id' => 'string:>0', // works with strings as well
]);
?>

{% endhighlight %}

You can also add custom filters by using `{@link JsonType::addCustomFilter()}`.
See [JsonType reference](http://codeception.com/docs/reference/JsonType).

 * `[Part]` json
 * `param array` $jsonType
 * `param string` $jsonPath
@see JsonType


#### seeXmlResponseEquals
 
Checks XML response equals provided XML.
Comparison is done by canonicalizing both xml`s.

Parameters can be passed either as DOMDocument, DOMNode, XML string, or array (if no attributes).

 * `param` $xml
 * `[Part]` xml


#### seeXmlResponseIncludes
 
Checks XML response includes provided XML.
Comparison is done by canonicalizing both xml`s.
Parameter can be passed either as XmlBuilder, DOMDocument, DOMNode, XML string, or array (if no attributes).

Example:

{% highlight php %}

<?php
$I->seeXmlResponseIncludes("<result>1</result>");
?>

{% endhighlight %}

 * `param` $xml
 * `[Part]` xml


#### seeXmlResponseMatchesXpath
 
Checks whether XML response matches XPath

{% highlight php %}

<?php
$I->seeXmlResponseMatchesXpath('//root/user[@id=1]');

{% endhighlight %}
 * `[Part]` xml
 * `param` $xpath


#### send
 
Sends a HTTP request.

 * `param` $method
 * `param` $url
 * `param array|string|\JsonSerializable` $params
 * `param array` $files
 * `[Part]` json
 * `[Part]` xml


#### sendDelete
 
Sends DELETE request to given uri.

 * `param` $url
 * `param array` $params
 * `param array` $files
 * `[Part]` json
 * `[Part]` xml


#### sendGet
 
Sends a GET request to given uri.

 * `param` $url
 * `param array` $params
 * `[Part]` json
 * `[Part]` xml


#### sendHead
 
Sends a HEAD request to given uri.

 * `param` $url
 * `param array` $params
 * `[Part]` json
 * `[Part]` xml


#### sendLink
 
Sends LINK request to given uri.

 * `param`       $url
 * `param array` $linkEntries (entry is array with keys "uri" and "link-param")

@link http://tools.ietf.org/html/rfc2068#section-19.6.2.4

@author samva.ua@gmail.com
 * `[Part]` json
 * `[Part]` xml


#### sendOptions
 
Sends an OPTIONS request to given uri.

 * `param` $url
 * `param array` $params
 * `[Part]` json
 * `[Part]` xml


#### sendPatch
 
Sends PATCH request to given uri.

 * `param`       $url
 * `param array|string|\JsonSerializable` $params
 * `param array` $files
 * `[Part]` json
 * `[Part]` xml


#### sendPost
 
Sends a POST request to given uri. Parameters and files can be provided separately.

Example:
{% highlight php %}

<?php
//simple POST call
$I->sendPost('/message', ['subject' => 'Read this!', 'to' => 'johndoe@example.com']);
//simple upload method
$I->sendPost('/message/24', ['inline' => 0], ['attachmentFile' => codecept_data_dir('sample_file.pdf')]);
//uploading a file with a custom name and mime-type. This is also useful to simulate upload errors.
$I->sendPost('/message/24', ['inline' => 0], [
    'attachmentFile' => [
         'name' => 'document.pdf',
         'type' => 'application/pdf',
         'error' => UPLOAD_ERR_OK,
         'size' => filesize(codecept_data_dir('sample_file.pdf')),
         'tmp_name' => codecept_data_dir('sample_file.pdf')
    ]
]);
// If your field names contain square brackets (e.g. `<input type="text" name="form[task]">`),
// PHP parses them into an array. In this case you need to pass the fields like this:
$I->sendPost('/add-task', ['form' => [
    'task' => 'lorem ipsum',
    'category' => 'miscellaneous',
]]);

{% endhighlight %}

 * `param` $url
 * `param array|string|\JsonSerializable` $params
 * `param array` $files A list of filenames or "mocks" of $_FILES (each entry being an array with the following
                    keys: name, type, error, size, tmp_name (pointing to the real file path). Each key works
                    as the "name" attribute of a file input field.

@see http://php.net/manual/en/features.file-upload.post-method.php
@see codecept_data_dir()
 * `[Part]` json
 * `[Part]` xml


#### sendPut
 
Sends PUT request to given uri.

 * `param` $url
 * `param array|string|\JsonSerializable` $params
 * `param array` $files
 * `[Part]` json
 * `[Part]` xml


#### sendUnlink
 
Sends UNLINK request to given uri.

 * `param`       $url
 * `param array` $linkEntries (entry is array with keys "uri" and "link-param")
@link http://tools.ietf.org/html/rfc2068#section-19.6.2.4
@author samva.ua@gmail.com
 * `[Part]` json
 * `[Part]` xml


#### setServerParameters
 
Sets SERVER parameters valid for all next requests.
this will remove old ones.

{% highlight php %}

$I->setServerParameters([]);

{% endhighlight %}


#### startFollowingRedirects
 
Enables automatic redirects to be followed by the client

{% highlight php %}

<?php
$I->startFollowingRedirects();

{% endhighlight %}

 * `[Part]` xml
 * `[Part]` json


#### stopFollowingRedirects
 
Prevents automatic redirects to be followed by the client

{% highlight php %}

<?php
$I->stopFollowingRedirects();

{% endhighlight %}

 * `[Part]` xml
 * `[Part]` json

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-rest/tree/master/src/Codeception/Module/REST.php">Help us to improve documentation. Edit module reference</a></div>
