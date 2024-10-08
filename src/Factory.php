<?php declare(strict_types=1);

namespace Framework\Pattern;

use ReflectionClass;
use ReflectionException;
use Exception;

/**
 * ·······································································
 * : _____                        _                     _                :
 * :|_   _|   ___   _ __    ___  | |_    __ _        __| |   ___  __   __:
 * :  | |    / _ \ | '__|  / _ \ | __|  / _` |      / _` |  / _ \ \ \ / /:
 * :  | |   |  __/ | |    |  __/ | |_  | (_| |  _  | (_| | |  __/  \ V / :
 * :  |_|    \___| |_|     \___|  \__|  \__,_| (_)  \__,_|  \___|   \_/  :
 * ·······································································
 * ···························WWW.TERETA.DEV······························
 * ·······································································
 *
 * @class Framework\Pattern\Factory
 * @package Framework\Pattern
 * @link https://tereta.dev
 * @since 2020-2024
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author Tereta Alexander <tereta.alexander@gmail.com>
 * @copyright 2020-2024 Tereta Alexander
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