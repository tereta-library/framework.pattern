<?php declare(strict_types=1);

namespace Framework\Pattern;

use Iterator;

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
 * @class Framework\Pattern\ValueObject
 * @package Framework\Pattern
 * @link https://tereta.dev
 * @author Tereta Alexander <tereta.alexander@gmail.com>
 */
class ValueObject implements Iterator
{
    /**
     * @var int
     */
    private int $position = 0;

    /**
     * @param array $data
     */
    public function __construct(private array $data = [])
    {
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function __get(string $key): mixed
    {
        return $this->get($key);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set(string $key, mixed $value): void
    {
        $this->set($key, $value);
    }

    /**
     * @return array
     */
    public function _toArray(): array
    {
        return $this->data;
    }

    /**
     * @param string $name
     * @return void
     */
    public function __unset(string $name): void
    {
        $this->unset($name);
    }

    /**
     * Body
     */

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function set(string $key, mixed $value): static
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function unset(string $key): static
    {
        unset($this->data[$key]);
        return $this;
    }

    /**
     * Iterator functions
     */

    /**
     * @return mixed
     */
    public function current(): mixed {
        $key = array_keys($this->data)[$this->position];

        return $this->data[$key];
    }

    /**
     * @return mixed
     */
    public function key(): mixed {
        return array_keys($this->data)[$this->position];
    }

    /**
     * @return void
     */
    public function next(): void {
        ++$this->position;
    }

    /**
     * @return void
     */
    public function rewind(): void {
        $this->position = 0;
    }

    /**
     * @return bool
     */
    public function valid(): bool {
        $keys = array_keys($this->data);
        $key = $keys[$this->position] ?? null;

        if ($key === null) {
            return false;
        }

        return isset($this->data[$key]);
    }
}