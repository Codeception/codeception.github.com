## Module Config Simplified

``` yaml
modules:
    enabled:
        - WebDriver:
            url: https://codeception.com
            browser: firefox
        - \Helper\Acceptance
```

``` yaml
modules:
    enabled:
        - REST:
            url: http://api.localhost/v1/
            depends: PhpBrowser
        - \Helper\Api
```