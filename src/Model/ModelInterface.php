<?php

declare(strict_types=1);
/**
 * ModelInterface.
 *
 * PHP version 7.2
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */

/**
 * Reddit.com.
 *
 * Reddit.com API
 *
 * The version of the OpenAPI document: 1.0.0
 *
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Flexolabs\RedditClient\Model;

/**
 * Interface abstracting model access.
 *
 * @author  OpenAPI Generator team
 */
interface ModelInterface
{
    /**
     * The original name of the model.
     */
    public function getModelName(): string;

    /**
     * Array of property to type mappings. Used for (de)serialization.
     */
    public static function openAPITypes(): array;

    /**
     * Array of property to format mappings. Used for (de)serialization.
     */
    public static function openAPIFormats(): array;

    /**
     * Array of attributes where the key is the local name, and the value is the original name.
     */
    public static function attributeMap(): array;

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     */
    public static function setters(): array;

    /**
     * Array of attributes to getter functions (for serialization of requests).
     */
    public static function getters(): array;

    /**
     * Show all the invalid properties with reasons.
     */
    public function listInvalidProperties(): array;

    /**
     * Validate all the properties in the model
     * return true if all passed.
     */
    public function valid(): bool;
}
