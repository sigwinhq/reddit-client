<?php

declare(strict_types=1);

/*
 * This file is part of the Sigwin project.
 *
 * (c) sigwin.hr
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Sigwin\RedditClient;

/**
 * Configuration Class Doc Comment
 * PHP version 8.1.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */
final class Configuration
{
    public const BOOLEAN_FORMAT_INT = 'int';
    public const BOOLEAN_FORMAT_STRING = 'string';

    /**
     * @var Configuration
     */
    private static $defaultConfiguration;

    /**
     * Associate array to store API key(s).
     *
     * @var string[]
     */
    private $apiKeys = [];

    /**
     * Associate array to store API prefix (e.g. Bearer).
     *
     * @var string[]
     */
    private $apiKeyPrefixes = [];

    /**
     * Access token for OAuth/Bearer authentication.
     *
     * @var string
     */
    private $accessToken = '';

    /**
     * Boolean format for query string.
     *
     * @var string
     */
    private $booleanFormatForQueryString = self::BOOLEAN_FORMAT_INT;

    /**
     * Username for HTTP basic authentication.
     *
     * @var string
     */
    private $username = '';

    /**
     * Password for HTTP basic authentication.
     *
     * @var string
     */
    private $password = '';

    /**
     * The host.
     *
     * @var string
     */
    private $host = 'https://oauth.reddit.com';

    /**
     * User agent of the HTTP request, set to "OpenAPI-Generator/{version}/PHP" by default.
     *
     * @var string
     */
    private $userAgent = 'OpenAPI-Generator/1.0.0/PHP';

    /**
     * Debug switch (default set to false).
     *
     * @var bool
     */
    private $debug = false;

    /**
     * Debug file location (log to STDOUT by default).
     *
     * @var string
     */
    private $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default).
     *
     * @var string
     */
    private $tempFolderPath;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
    }

    /**
     * Sets API key.
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key              API key or token
     *
     * @return $this
     */
    public function setApiKey($apiKeyIdentifier, $key)
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;

        return $this;
    }

    /**
     * Gets API key.
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return null|string API key or token
     */
    public function getApiKey($apiKeyIdentifier): ?string
    {
        return $this->apiKeys[$apiKeyIdentifier] ?? null;
    }

    /**
     * Sets the prefix for API key (e.g. Bearer).
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $prefix           API key prefix, e.g. Bearer
     *
     * @return $this
     */
    public function setApiKeyPrefix($apiKeyIdentifier, $prefix)
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;

        return $this;
    }

    /**
     * Gets API key prefix.
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     */
    public function getApiKeyPrefix($apiKeyIdentifier): ?string
    {
        return $this->apiKeyPrefixes[$apiKeyIdentifier] ?? null;
    }

    /**
     * Sets the access token for OAuth.
     *
     * @param string $accessToken Token for OAuth
     *
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Gets the access token for OAuth.
     *
     * @return string Access token for OAuth
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Sets boolean format for query string.
     *
     * @param string $booleanFormat Boolean format for query string
     *
     * @return $this
     */
    public function setBooleanFormatForQueryString(string $booleanFormat)
    {
        $this->booleanFormatForQueryString = $booleanFormat;

        return $this;
    }

    /**
     * Gets boolean format for query string.
     *
     * @return string Boolean format for query string
     */
    public function getBooleanFormatForQueryString(): string
    {
        return $this->booleanFormatForQueryString;
    }

    /**
     * Sets the username for HTTP basic authentication.
     *
     * @param string $username Username for HTTP basic authentication
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the username for HTTP basic authentication.
     *
     * @return string Username for HTTP basic authentication
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Sets the password for HTTP basic authentication.
     *
     * @param string $password Password for HTTP basic authentication
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the password for HTTP basic authentication.
     *
     * @return string Password for HTTP basic authentication
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Sets the host.
     *
     * @param string $host Host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Gets the host.
     *
     * @return string Host
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Sets the user agent of the api client.
     *
     * @param string $userAgent the user agent of the api client
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setUserAgent($userAgent)
    {
        if (! \is_string($userAgent)) {
            throw new \InvalidArgumentException('User-agent must be a string.');
        }

        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Gets the user agent of the api client.
     *
     * @return string user agent
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Sets debug flag.
     *
     * @param bool $debug Debug flag
     *
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * Gets the debug flag.
     */
    public function getDebug(): bool
    {
        return $this->debug;
    }

    /**
     * Sets the debug file.
     *
     * @param string $debugFile Debug file
     *
     * @return $this
     */
    public function setDebugFile($debugFile)
    {
        $this->debugFile = $debugFile;

        return $this;
    }

    /**
     * Gets the debug file.
     */
    public function getDebugFile(): string
    {
        return $this->debugFile;
    }

    /**
     * Sets the temp folder path.
     *
     * @param string $tempFolderPath Temp folder path
     *
     * @return $this
     */
    public function setTempFolderPath($tempFolderPath)
    {
        $this->tempFolderPath = $tempFolderPath;

        return $this;
    }

    /**
     * Gets the temp folder path.
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath(): string
    {
        return $this->tempFolderPath;
    }

    /**
     * Gets the default configuration instance.
     */
    public static function getDefaultConfiguration(): self
    {
        if (self::$defaultConfiguration === null) {
            self::$defaultConfiguration = new self();
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the default configuration instance.
     *
     * @param Configuration $config An instance of the Configuration Object
     */
    public static function setDefaultConfiguration(self $config): void
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Gets the essential information for debugging.
     *
     * @return string The report for debugging
     */
    public static function toDebugReport(): string
    {
        $report = 'PHP SDK (Sigwin\RedditClient) Debug Report:'.\PHP_EOL;
        $report .= '    OS: '.php_uname().\PHP_EOL;
        $report .= '    PHP Version: '.\PHP_VERSION.\PHP_EOL;
        $report .= '    The version of the OpenAPI document: 1.1.0'.\PHP_EOL;
        $report .= '    Temp Folder Path: '.self::getDefaultConfiguration()->getTempFolderPath().\PHP_EOL;

        return $report;
    }

    /**
     * Get API key (with prefix if set).
     *
     * @param string $apiKeyIdentifier name of apikey
     *
     * @return null|string API key with the prefix
     */
    public function getApiKeyWithPrefix($apiKeyIdentifier): ?string
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix.' '.$apiKey;
        }

        return $keyWithPrefix;
    }

    /**
     * Returns an array of host settings.
     *
     * @return array an array of host settings
     */
    public function getHostSettings(): array
    {
        return [
            [
                'url' => 'https://oauth.reddit.com',
                'description' => 'Reddit.com API',
            ],
        ];
    }

    /**
     * Returns URL based on host settings, index and variables.
     *
     * @param array      $hostSettings array of host settings, generated from getHostSettings() or equivalent from the API clients
     * @param int        $hostIndex    index of the host settings
     * @param null|array $variables    hash of variable and the corresponding value (optional)
     *
     * @return string URL based on host settings
     */
    public static function getHostString(array $hostSettings, $hostIndex, ?array $variables = null): string
    {
        if ($variables === null) {
            $variables = [];
        }

        // check array index out of bound
        if ($hostIndex < 0 || $hostIndex >= \count($hostSettings)) {
            throw new \InvalidArgumentException("Invalid index {$hostIndex} when selecting the host. Must be less than ".\count($hostSettings));
        }

        $host = $hostSettings[$hostIndex];
        $url = $host['url'];

        // go through variable and assign a value
        foreach ($host['variables'] ?? [] as $name => $variable) {
            if (\array_key_exists($name, $variables)) { // check to see if it's in the variables provided by the user
                if (! isset($variable['enum_values']) || \in_array($variables[$name], $variable['enum_values'], true)) { // check to see if the value is in the enum
                    $url = str_replace('{'.$name.'}', $variables[$name], $url);
                } else {
                    throw new \InvalidArgumentException("The variable `{$name}` in the host URL has invalid value ".$variables[$name].'. Must be '.implode(',', $variable['enum_values']).'.');
                }
            } else {
                // use default value
                $url = str_replace('{'.$name.'}', $variable['default_value'], $url);
            }
        }

        return $url;
    }

    /**
     * Returns URL based on the index and variables.
     *
     * @param int        $index     index of the host settings
     * @param null|array $variables hash of variable and the corresponding value (optional)
     *
     * @return string URL based on host settings
     */
    public function getHostFromSettings($index, $variables = null): string
    {
        return self::getHostString($this->getHostSettings(), $index, $variables);
    }
}
