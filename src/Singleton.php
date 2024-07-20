<?php declare(strict_types=1);

namespace Framework\Pattern;

use ReflectionException;

/**
 * class Framework\Pattern\Singleton
 */
abstract class Singleton
{
    protected static array $instance = [];

    /**
     * Singleton constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return $this
     * @throws ReflectionException
     */
    public static function singleton(): static
    {
        $arguments = func_get_args();
        if (!$arguments) {
            $arguments[] = 'default';
        }
        $instance = array_shift($arguments);
        if (isset(static::$instance[$instance])) return static::$instance[$instance];

        return (static::$instance[$instance] = new static(...$arguments));
    }
}