<?php

declare(strict_types=1);

namespace App\Repository;

use App\Database\Connexion;

class Repository
{

    protected \PDO $connexion;

    public function __construct()
    {
        $this->connexion = Connexion::getInstance()->getPdo();
    }

}