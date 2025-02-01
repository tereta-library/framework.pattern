<?php declare(strict_types=1);

namespace Framework\Pattern\Traits;

use Framework\Helper\Strings as StringsHelper;
use Framework\Pattern\Traits\Cache as CacheTrait;

/**
 * Trait Singleton
 * @package Framework\Pattern\Traits
 * @class Framework\Pattern\Traits\Singleton
 */
trait Singleton
{
    use CacheTrait;

    /**
     * @var array $instance
     */
    protected static array $instance = [];

    /**
     * @deprecated Use getInstance instead
     * @return $this
     */
    public static function singleton(...$arguments): static
    {
        xdebug_break();
        return static::getInstance(...$arguments);
    }

    /**
     * @param mixed ...$arguments
     * @return static
     */
    public static function getInstance(...$arguments): static
    {
        $key = StringsHelper::generateKey(...$arguments);

        if (isset(static::$instance[static::class][$key])) {
            return static::$instance[static::class][$key];
        }

        if (!isset(static::$instance[static::class])) {
            static::$instance[static::class] = [];
        }

        static::$instance[static::class][$key] = new static(...$arguments);

        return static::$instance[static::class][$key];
    }
}