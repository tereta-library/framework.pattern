<?php declare(strict_types=1);

namespace Framework\Pattern\Traits;

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

        $link = &$this->cache[static::class];
        $keysArray = array_keys($keys);
        $lastKey = array_pop($keysArray);
        foreach($keys as $key => $item) {
            if ($key == $lastKey) {
                $link[$item] = $value;
                break;
            }

            if (!isset($link[$item])) {
                $link[$item] = [];
            }

            $link = &$link[$item];
        }

        return $value;
    }

    /**
     * @param string ...$keys
     * @return mixed
     */
    protected function getCache(string|int ...$keys): mixed
    {
        $link = &$this->cache[static::class];
        foreach($keys as $key) {
            if (!isset($link[$key])) {
                return null;
            }

            $link = &$link[$key];
        }
        return $link;
    }
}