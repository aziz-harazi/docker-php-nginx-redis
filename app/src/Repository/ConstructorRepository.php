<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Country;

class ConstructorRepository extends Repository
{

    public function findByCountryAndType(int $countryId, string $type): array
    {
        $stmt = $this->connexion->prepare("SELECT name FROM constructor WHERE country_id = :country_id AND type = :type");

        $stmt->execute(['country_id' => $countryId, 'type' => $type]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}