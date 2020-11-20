# Flexolabs\RedditClient

Reddit.com API

For more information, please visit [https://ssl.reddit.com/dev/api](https://ssl.reddit.com/dev/api).

## Installation & Usage

### Requirements

PHP 7.2 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/flexolabs/reddit-client.git"
    }
  ],
  "require": {
    "flexolabs/reddit-client": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/Flexolabs\RedditClient/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure OAuth2 access token for authorization: oauth2
$config = Flexolabs\RedditClient\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Flexolabs\RedditClient\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$username = snoo; // string
$after = 'after_example'; // string
$before = 'before_example'; // string
$limit = 25; // int

try {
    $result = $apiInstance->getSaved($username, $after, $before, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getSaved: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://oauth.reddit.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*UserApi* | [**getSaved**](docs/Api/UserApi.md#getsaved) | **GET** /user/{username}/saved | Get user saved things
*UserApi* | [**me**](docs/Api/UserApi.md#me) | **GET** /me | Returns the identity of the user.

## Models

- [Listing](docs/Model/Listing.md)
- [ListingEnvelope](docs/Model/ListingEnvelope.md)
- [Me](docs/Model/Me.md)
- [Thing](docs/Model/Thing.md)
- [ThingData](docs/Model/ThingData.md)

## Authorization

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

- API version: `1.0.1`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
