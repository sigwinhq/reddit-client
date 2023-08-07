# Sigwin\RedditClient\ThingApi

All URIs are relative to https://oauth.reddit.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getInfo()**](ThingApi.md#getInfo) | **GET** /api/info | Get thing info


## `getInfo()`

```php
getInfo($id): \Sigwin\RedditClient\Model\ListingEnvelope
```

Get thing info

### Example

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

try {
    $result = $apiInstance->getInfo($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ThingApi->getInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

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
