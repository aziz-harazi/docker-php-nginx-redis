<?php

declare(strict_types=1);

namespace App\Cache;

use App\Repository\ConstructorRepository;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class ConstructorCache
{

    private ConstructorRepository $constructorRepository;
    private AbstractAdapter $cacheAdapter;

    public function __construct(AbstractAdapter $cacheAdapter, ConstructorRepository $constructorRepository)
    {
        $this->cacheAdapter = $cacheAdapter;
        $this->constructorRepository = $constructorRepository;
    }

    public function findByCountryAndType(int $countryId, string $type): array
    {
        $key = sprintf("constructor;%d;%s", $countryId, $type);

        return $this->cacheAdapter->get($key, function(ItemInterface $item) use ($countryId, $type){

            echo "Adding to cache";
            return $this->constructorRepository->findByCountryAndType($countryId, $type);

        });
    }
}