# Sigwin\RedditClient\UserApi

All URIs are relative to https://oauth.reddit.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAbout()**](UserApi.md#getAbout) | **GET** /user/{username}/about | Returns the identity of a user. |
| [**getSaved()**](UserApi.md#getSaved) | **GET** /user/{username}/saved | Get user saved things |
| [**me()**](UserApi.md#me) | **GET** /api/me | Returns the identity of the current user. |


## `getAbout()`

```php
getAbout($username): \Sigwin\RedditClient\Model\User
```

Returns the identity of a user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = Sigwin\RedditClient\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sigwin\RedditClient\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$username = snoo; // string

try {
    $result = $apiInstance->getAbout($username);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getAbout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **username** | **string**|  | |

### Return type

[**\Sigwin\RedditClient\Model\User**](../Model/User.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSaved()`

```php
getSaved($username, $after, $before, $limit): \Sigwin\RedditClient\Model\ListingEnvelope
```

Get user saved things

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = Sigwin\RedditClient\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sigwin\RedditClient\Api\UserApi(
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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **username** | **string**|  | |
| **after** | **string**|  | [optional] |
| **before** | **string**|  | [optional] |
| **limit** | **int**|  | [optional] [default to 25] |

### Return type

[**\Sigwin\RedditClient\Model\ListingEnvelope**](../Model/ListingEnvelope.md)

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
me(): \Sigwin\RedditClient\Model\UserData
```

Returns the identity of the current user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oauth2
$config = Sigwin\RedditClient\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sigwin\RedditClient\Api\UserApi(
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

[**\Sigwin\RedditClient\Model\UserData**](../Model/UserData.md)

### Authorization

[oauth2](../../README.md#oauth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
