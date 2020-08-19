# OpenAPI\Client\DefaultApi

All URIs are relative to *https://ssl.reddit.com/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**userUsernameSavedGet**](DefaultApi.md#userUsernameSavedGet) | **GET** /user/{username}/saved | Get user saved things



## userUsernameSavedGet

> userUsernameSavedGet($username)

Get user saved things

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$username = 'username_example'; // string | 

try {
    $apiInstance->userUsernameSavedGet($username);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->userUsernameSavedGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **username** | **string**|  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

