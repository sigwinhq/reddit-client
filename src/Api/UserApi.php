<?php

declare(strict_types=1);

namespace Sigwin\RedditClient\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Sigwin\RedditClient\ApiException;
use Sigwin\RedditClient\Configuration;
use Sigwin\RedditClient\HeaderSelector;
use Sigwin\RedditClient\ObjectSerializer;

/**
 * UserApi Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */
class UserApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index.
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index.
     *
     * @return int Host index
     */
    public function getHostIndex(): int
    {
        return $this->hostIndex;
    }

    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Operation getSaved.
     *
     * Get user saved things
     *
     * @param string $username username (required)
     * @param string $after    after (optional)
     * @param string $before   before (optional)
     * @param int    $limit    limit (optional, default to 25)
     *
     * @throws \Sigwin\RedditClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getSaved($username, $after = null, $before = null, $limit = 25): \Sigwin\RedditClient\Model\ListingEnvelope
    {
        list($response) = $this->getSavedWithHttpInfo($username, $after, $before, $limit);

        return $response;
    }

    /**
     * Operation getSavedWithHttpInfo.
     *
     * Get user saved things
     *
     * @param string $username (required)
     * @param string $after    (optional)
     * @param string $before   (optional)
     * @param int    $limit    (optional, default to 25)
     *
     * @throws \Sigwin\RedditClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \Sigwin\RedditClient\Model\ListingEnvelope, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSavedWithHttpInfo($username, $after = null, $before = null, $limit = 25): array
    {
        $request = $this->getSavedRequest($username, $after, $before, $limit);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\Sigwin\RedditClient\Model\ListingEnvelope' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Sigwin\RedditClient\Model\ListingEnvelope', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\Sigwin\RedditClient\Model\ListingEnvelope';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sigwin\RedditClient\Model\ListingEnvelope',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSavedAsync.
     *
     * Get user saved things
     *
     * @param string $username (required)
     * @param string $after    (optional)
     * @param string $before   (optional)
     * @param int    $limit    (optional, default to 25)
     *
     * @throws \InvalidArgumentException
     */
    public function getSavedAsync($username, $after = null, $before = null, $limit = 25): \GuzzleHttp\Promise\PromiseInterface
    {
        return $this->getSavedAsyncWithHttpInfo($username, $after, $before, $limit)
            ->then(
                static function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSavedAsyncWithHttpInfo.
     *
     * Get user saved things
     *
     * @param string $username (required)
     * @param string $after    (optional)
     * @param string $before   (optional)
     * @param int    $limit    (optional, default to 25)
     *
     * @throws \InvalidArgumentException
     */
    public function getSavedAsyncWithHttpInfo($username, $after = null, $before = null, $limit = 25): \GuzzleHttp\Promise\PromiseInterface
    {
        $returnType = '\Sigwin\RedditClient\Model\ListingEnvelope';
        $request = $this->getSavedRequest($username, $after, $before, $limit);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                static function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                static function ($exception): void {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'getSaved'.
     *
     * @param string $username (required)
     * @param string $after    (optional)
     * @param string $before   (optional)
     * @param int    $limit    (optional, default to 25)
     *
     * @throws \InvalidArgumentException
     */
    public function getSavedRequest($username, $after = null, $before = null, $limit = 25): Request
    {
        // verify the required parameter 'username' is set
        if ($username === null || (\is_array($username) && \count($username) === 0)) {
            throw new \InvalidArgumentException('Missing the required parameter $username when calling getSaved');
        }
        if ($limit !== null && $limit > 100) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling UserApi.getSaved, must be smaller than or equal to 100.');
        }
        if ($limit !== null && $limit < 0) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling UserApi.getSaved, must be bigger than or equal to 0.');
        }

        $resourcePath = '/user/{username}/saved';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (\is_array($after)) {
            $after = ObjectSerializer::serializeCollection($after, '', true);
        }
        if ($after !== null) {
            $queryParams['after'] = $after;
        }
        // query params
        if (\is_array($before)) {
            $before = ObjectSerializer::serializeCollection($before, '', true);
        }
        if ($before !== null) {
            $queryParams['before'] = $before;
        }
        // query params
        if (\is_array($limit)) {
            $limit = ObjectSerializer::serializeCollection($limit, '', true);
        }
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }

        // path params
        if ($username !== null) {
            $resourcePath = str_replace(
                '{'.'username'.'}',
                ObjectSerializer::toPathValue($username),
                $resourcePath
            );
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (\count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = \is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer '.$this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);

        return new Request(
            'GET',
            $this->config->getHost().$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation me.
     *
     * Returns the identity of the user.
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://oauth.reddit.com/api/v1
     *
     * @throws \Sigwin\RedditClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function me(): \Sigwin\RedditClient\Model\Me
    {
        list($response) = $this->meWithHttpInfo();

        return $response;
    }

    /**
     * Operation meWithHttpInfo.
     *
     * Returns the identity of the user.
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://oauth.reddit.com/api/v1
     *
     * @throws \Sigwin\RedditClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \Sigwin\RedditClient\Model\Me, HTTP status code, HTTP response headers (array of strings)
     */
    public function meWithHttpInfo(): array
    {
        $request = $this->meRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\Sigwin\RedditClient\Model\Me' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Sigwin\RedditClient\Model\Me', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\Sigwin\RedditClient\Model\Me';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Sigwin\RedditClient\Model\Me',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation meAsync.
     *
     * Returns the identity of the user.
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://oauth.reddit.com/api/v1
     *
     * @throws \InvalidArgumentException
     */
    public function meAsync(): \GuzzleHttp\Promise\PromiseInterface
    {
        return $this->meAsyncWithHttpInfo()
            ->then(
                static function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation meAsyncWithHttpInfo.
     *
     * Returns the identity of the user.
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://oauth.reddit.com/api/v1
     *
     * @throws \InvalidArgumentException
     */
    public function meAsyncWithHttpInfo(): \GuzzleHttp\Promise\PromiseInterface
    {
        $returnType = '\Sigwin\RedditClient\Model\Me';
        $request = $this->meRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                static function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                static function ($exception): void {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'me'.
     *
     * This oepration contains host(s) defined in the OpenAP spec. Use 'hostIndex' to select the host.
     * URL: https://oauth.reddit.com/api/v1
     *
     * @throws \InvalidArgumentException
     */
    public function meRequest(): Request
    {
        $resourcePath = '/me';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (\count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = \is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer '.$this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHosts = ['https://oauth.reddit.com/api/v1'];
        if ($this->hostIndex < 0 || $this->hostIndex >= \count($operationHosts)) {
            throw new \InvalidArgumentException("Invalid index {$this->hostIndex} when selecting the host. Must be less than ".\count($operationHosts));
        }
        $operationHost = $operationHosts[$this->hostIndex];

        $query = \GuzzleHttp\Psr7\build_query($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option.
     *
     * @throws \RuntimeException on file opening failure
     *
     * @return array of http client options
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if ( ! $options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: '.$this->config->getDebugFile());
            }
        }

        return $options;
    }
}
