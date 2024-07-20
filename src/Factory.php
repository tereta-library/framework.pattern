<?php declare(strict_types=1);

namespace Framework\Pattern;

use ReflectionClass;
use ReflectionException;
use Exception;

/**
 * class Framework\Pattern\Factory
 */
class Factory
{
    /**
     * @param string|null $instance
     */
    public function __construct(
        private ?string $instance = null
    ) {
    }

    /**
     * @param string $class
     * @param array $args
     * @return object|string|null
     * @throws ReflectionException
     */
    public function create(string $class, array $args = []): object
    {
        $reflectionClass = new ReflectionClass($class);
        $reflectionClass->isSubclassOf($this->instance) || throw new Exception(
            "The class should implement " . $this->instance . "."
        );

        return $reflectionClass->newInstanceArgs($args);
    }
}