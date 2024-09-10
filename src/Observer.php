<?php declare(strict_types=1);

namespace Framework\Pattern;

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
 * @class Framework\Pattern\Observer
 * @package Framework\Pattern
 * @link https://tereta.dev
 * @since 2020-2024
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author Tereta Alexander <tereta.alexander@gmail.com>
 * @copyright 2020-2024 Tereta Alexander
 */
class Observer
{
    /**
     * @param array $config
     */
    public function __construct(private array $config)
    {
    }

    /**
     * @param string $event
     * @param array $arguments
     * @param array $linkedArguments
     * @return void
     */
    public function dispatch(string $event, array $arguments = [], array &$linkedArguments = []): void
    {
        $eventArray = $this->config[$event] ?? [];
        if (!$eventArray) {
            return;
        }

        foreach ($eventArray as $pointer) {
            $this->execute($pointer, $arguments, $linkedArguments);
        }
    }

    /**
     * @param array $pointer
     * @param array $arguments
     * @param array $linkedArguments
     * @return void
     */
    private function execute(array $pointer, array $arguments = [], array &$linkedArguments = []): void
    {
        $className = array_keys($pointer)[0];
        $methodName = array_values($pointer)[0];
        $className = str_replace('/', '\\', $className);

        $class = new $className;
        $class->{$methodName}($arguments, $linkedArguments);
    }
}