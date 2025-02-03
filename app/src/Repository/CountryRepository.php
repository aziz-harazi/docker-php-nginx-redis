<?php

declare(strict_types=1);
namespace App\Repository;

use App\Model\Country;

class CountryRepository extends Repository
{
    private string $table = Country::TABLE;

    public function findAll(): array
    {

       $st = $this->connexion->prepare("SELECT * FROM {$this->table}");
       $st->execute();

        return $st->fetchAll(\PDO::FETCH_CLASS, Country::class);
    }
}