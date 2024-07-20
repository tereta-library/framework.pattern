<?php declare(strict_types=1);

namespace Framework\Pattern;

/**
 * class Framework\Pattern\ValueObject
 */
class ValueObject
{
    public function __construct(private array $data = [])
    {
    }

    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function set(string $key, mixed $value): static
    {
        $this->data[$key] = $value;

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function get(?string $key = null): mixed
    {
        return $this->data[$key] ?? null;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function unset(string $key): statics
    {
        unset($this->data[$key]);
        return $this;
    }

    public function __get(string $key): mixed
    {
        return $this->get($key);
    }

    public function __set(string $key, mixed $value): void
    {
        $this->set($key, $value);
    }

    public function _toArray(): array
    {
        return $this->data;
    }

    public function __unset(string $name): void
    {
        $this->unset($name);
    }
}