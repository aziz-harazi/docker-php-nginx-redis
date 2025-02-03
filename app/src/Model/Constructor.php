<?php

declare(strict_types=1);

namespace App\Model;

class Constructor
{
    private int $id;
    private int $country_id;
    private string $type;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountryId(): int
    {
        return $this->country_id;
    }

    public function getType(): string
    {
        return $this->type;
    }
}