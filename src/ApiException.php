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
 * ApiException Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */
final class ApiException extends \Exception
{
    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var null|\stdClass|string
     */
    protected $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var null|string[][]
     */
    protected $responseHeaders;

    /**
     * The deserialized response object.
     *
     * @var null|\stdClass|string
     */
    protected $responseObject;

    /**
     * Constructor.
     *
     * @param string                $message         Error message
     * @param int                   $code            HTTP status code
     * @param null|string[][]       $responseHeaders HTTP response header
     * @param null|\stdClass|string $responseBody    HTTP decoded body of the server response either as \stdClass or string
     */
    public function __construct($message = '', $code = 0, $responseHeaders = [], $responseBody = null)
    {
        parent::__construct($message, $code);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP response header.
     *
     * @return null|string[][] HTTP response header
     */
    public function getResponseHeaders(): ?array
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string.
     *
     * @return null|\stdClass|string HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody(): \stdClass|string|null
    {
        return $this->responseBody;
    }

    /**
     * Sets the deserialized response object (during deserialization).
     *
     * @param mixed $obj Deserialized response object
     */
    public function setResponseObject($obj): void
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deserialized response object (during deserialization).
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject(): mixed
    {
        return $this->responseObject;
    }
}
