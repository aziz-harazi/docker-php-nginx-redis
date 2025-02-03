<?php

declare(strict_types=1);

namespace App\Model;

class Country
{
    public const TABLE = 'country';
    private int $id;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}