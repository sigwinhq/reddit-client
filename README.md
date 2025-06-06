# RedditClient

Reddit.com API

For more information, please visit [https://ssl.reddit.com/dev/api](https://ssl.reddit.com/dev/api).

## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/sigwin/reddit-client.git"
    }
  ],
  "require": {
    "sigwin/reddit-client": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/RedditClient/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure OAuth2 access token for authorization: oauth2
$config = Sigwin\RedditClient\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sigwin\RedditClient\Api\ThingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = t3_11e9mr5; // string
$sr_name = pics; // string

try {
    $result = $apiInstance->getInfo($id, $sr_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ThingApi->getInfo: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://oauth.reddit.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ThingApi* | [**getInfo**](docs/Api/ThingApi.md#getinfo) | **GET** /api/info | Get thing info
*UserApi* | [**getAbout**](docs/Api/UserApi.md#getabout) | **GET** /user/{username}/about | Returns the identity of a user.
*UserApi* | [**getSaved**](docs/Api/UserApi.md#getsaved) | **GET** /user/{username}/saved | Get user saved things
*UserApi* | [**me**](docs/Api/UserApi.md#me) | **GET** /api/me | Returns the identity of the current user.

## Models

- [Listing](docs/Model/Listing.md)
- [ListingEnvelope](docs/Model/ListingEnvelope.md)
- [Thing](docs/Model/Thing.md)
- [ThingData](docs/Model/ThingData.md)
- [User](docs/Model/User.md)
- [UserData](docs/Model/UserData.md)

## Authorization

Authentication schemes defined for the API:
### oauth2

- **Type**: `OAuth`
- **Flow**: `accessCode`
- **Authorization URL**: `/authorize`
- **Scopes**: N/A

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

api@reddit.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.2.0`
    - Generator version: `7.13.0-SNAPSHOT`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
