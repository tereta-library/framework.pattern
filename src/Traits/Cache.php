<?php declare(strict_types=1);

namespace Framework\Pattern\Traits;

use Framework\Helper\Strings as StringsHelper;

/**
 * @package Framework\Pattern\Traits
 * @class Framework\Pattern\Traits\Cache
 */
trait Cache
{
    /**
     * @var array $cache
     */
    protected array $cache = [];

    /**
     * @param mixed $value
     * @param string ...$keys
     * @return mixed
     */
    protected function setCache(mixed $value, string|int ...$keys): mixed
    {
        if (!isset($this->cache[static::class])) {
            $this->cache[static::class] = [];
        }

        $key = StringsHelper::generateKey(...$keys);
        $this->cache[static::class][$key] = $value;

        return $value;
    }

    /**
     * @param string ...$keys
     * @return mixed
     */
    protected function getCache(string|int ...$keys): mixed
    {
        $key = StringsHelper::generateKey(...$keys);
        if (!isset($this->cache[static::class][$key])) {
            return null;
        }

        return $this->cache[static::class][$key];
    }
}