<?php

declare(strict_types=1);

namespace Flexolabs\RedditClient\Model;

use ArrayAccess;
use Flexolabs\RedditClient\ObjectSerializer;

/**
 * ListingData Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class ListingData implements ArrayAccess, ModelInterface
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'Listing_data';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'modhash' => 'string',
        'dist' => 'int',
        'children' => '\Flexolabs\RedditClient\Model\ListingDataChildren[]',
        'after' => 'string',
        'before' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'modhash' => null,
        'dist' => null,
        'children' => null,
        'after' => null,
        'before' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'modhash' => 'modhash',
        'dist' => 'dist',
        'children' => 'children',
        'after' => 'after',
        'before' => 'before',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'modhash' => 'setModhash',
        'dist' => 'setDist',
        'children' => 'setChildren',
        'after' => 'setAfter',
        'before' => 'setBefore',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'modhash' => 'getModhash',
        'dist' => 'getDist',
        'children' => 'getChildren',
        'after' => 'getAfter',
        'before' => 'getBefore',
    ];

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['modhash'] = $data['modhash'] ?? null;
        $this->container['dist'] = $data['dist'] ?? null;
        $this->container['children'] = $data['children'] ?? null;
        $this->container['after'] = $data['after'] ?? null;
        $this->container['before'] = $data['before'] ?? null;
    }

    /**
     * Gets the string presentation of the object.
     */
    public function __toString(): string
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Array of property to type mappings. Used for (de)serialization.
     */
    public static function openAPITypes(): array
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     */
    public static function openAPIFormats(): array
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     */
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     */
    public function getModelName(): string
    {
        return self::$openAPIModelName;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['modhash'] === null) {
            $invalidProperties[] = "'modhash' can't be null";
        }
        if ($this->container['dist'] === null) {
            $invalidProperties[] = "'dist' can't be null";
        }
        if ($this->container['children'] === null) {
            $invalidProperties[] = "'children' can't be null";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
    {
        return \count($this->listInvalidProperties()) === 0;
    }

    /**
     * Gets modhash.
     */
    public function getModhash(): string
    {
        return $this->container['modhash'];
    }

    /**
     * Sets modhash.
     *
     * @param string $modhash modhash
     */
    public function setModhash($modhash): self
    {
        $this->container['modhash'] = $modhash;

        return $this;
    }

    /**
     * Gets dist.
     */
    public function getDist(): int
    {
        return $this->container['dist'];
    }

    /**
     * Sets dist.
     *
     * @param int $dist dist
     */
    public function setDist($dist): self
    {
        $this->container['dist'] = $dist;

        return $this;
    }

    /**
     * Gets children.
     *
     * @return \Flexolabs\RedditClient\Model\ListingDataChildren[]
     */
    public function getChildren(): array
    {
        return $this->container['children'];
    }

    /**
     * Sets children.
     *
     * @param \Flexolabs\RedditClient\Model\ListingDataChildren[] $children children
     */
    public function setChildren($children): self
    {
        $this->container['children'] = $children;

        return $this;
    }

    /**
     * Gets after.
     */
    public function getAfter(): ?string
    {
        return $this->container['after'];
    }

    /**
     * Sets after.
     *
     * @param null|string $after after
     */
    public function setAfter($after): self
    {
        $this->container['after'] = $after;

        return $this;
    }

    /**
     * Gets before.
     */
    public function getBefore(): ?string
    {
        return $this->container['before'];
    }

    /**
     * Sets before.
     *
     * @param null|string $before before
     */
    public function setBefore($before): self
    {
        $this->container['before'] = $before;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
     *
     * @return null|mixed
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param null|int $offset Offset
     * @param mixed    $value  Value to be set
     */
    public function offsetSet($offset, $value): void
    {
        if (null === $offset) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param int $offset Offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets a header-safe presentation of the object.
     */
    public function toHeaderValue(): string
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
