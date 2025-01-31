<?php declare(strict_types=1);

namespace Framework\Pattern\Traits;

/**
 * Trait Singleton
 * @package Framework\Pattern\Traits
 * @class Framework\Pattern\Traits\Singleton
 */
trait Singleton
{
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
        if (!$arguments) {
            $arguments[] = 'default';
        }

        $instance = array_shift($arguments);
        if (isset(static::$instance[static::class][$instance])) return static::$instance[static::class][$instance];

        if (!isset(static::$instance[static::class])) {
            static::$instance[static::class] = [];
        }
        return (static::$instance[static::class][$instance] = new static(...$arguments));
    }
}