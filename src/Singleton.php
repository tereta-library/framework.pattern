<?php declare(strict_types=1);

namespace Framework\Pattern;

use ReflectionException;

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
 * @class Framework\Pattern\Singleton
 * @package Framework\Pattern
 * @link https://tereta.dev
 * @since 2020-2024
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author Tereta Alexander <tereta.alexander@gmail.com>
 * @copyright 2020-2024 Tereta Alexander
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