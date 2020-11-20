# Flexolabs\RedditClient\UserApi

All URIs are relative to https://oauth.reddit.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSaved()**](UserApi.md#getSaved) | **GET** /user/{username}/saved | Get user saved things
[**me()**](UserApi.md#me) | **GET** /me | Returns the identity of the user.


## `getSaved()`

```php
getSaved($username, $after, $before, $limit): \Flexolabs\RedditClient\Model\ListingEnvelope
```

Get user saved things

### Example

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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **username** | **string**|  |
 **after** | **string**|  | [optional]
 **before** | **string**|  | [optional]
 **limit** | **int**|  | [optional] [default to 25]

### Return type

[**\Flexolabs\RedditClient\Model\ListingEnvelope**](../Model/ListingEnvelope.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `me()`

```php
me(): \Flexolabs\RedditClient\Model\Me
```

Returns the identity of the user.

### Example

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

try {
    $result = $apiInstance->me();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->me: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Flexolabs\RedditClient\Model\Me**](../Model/Me.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
