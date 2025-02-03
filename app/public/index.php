<?php

use App\Repository\CountryRepository;
use App\Cache\ConstructorCache;
use Symfony\Component\Cache\Adapter\RedisAdapter;
use App\Repository\ConstructorRepository;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$client = RedisAdapter::createConnection("redis://{$_ENV['REDIS_HOST']}:{$_ENV['REDIS_PORT']}");
$cacheAdapter = new RedisAdapter($client);

$countryRepository = new CountryRepository();
$countries = $countryRepository->findAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $constructorCache = new ConstructorCache($cacheAdapter, new ConstructorRepository());
    $constructors = $constructorCache->findByCountryAndType($_POST['country'], $_POST['type']) ?: 'Constructor not found...';
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        .dark{
            background-color: #2f3455;
            color: #ffffff;
        }
        .light{
            background-color: #ffffff;
            color: #2f3455;
            padding: 20px;
        }
    </style>
    <title>Country vehicles Constructor</title>
</head>
<body class="dark">

<div  class="content-center flex h-screen">
    <div class="light m-auto">
        <h1 class="text-3xl font-bold underline mb-6">
        Hello world!
        </h1>
        <div class="mb-6">
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <?php if  (is_array($constructors)): ?>
                    <h2>Result : </h2>
                    <ul>
                        <?php foreach ($constructors as $constructor): ?>
                            <li><?php echo $constructor['name']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                <h2> <?php  echo $constructors ?></h2>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <p class="mb-6">Choose a country and a type of vehicle and find a constructor !</p>

        <form method="post">
            <div>
                <div class="col">
                    <select name="country" class="form-select" aria-label="Default select example">
                        <option selected>Select a Country</option>
                        <?php foreach ($countries as $country): ?>
                            <option value="<?php echo $country->getId(); ?>">
                                <?php echo $country->getName(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <select name="type" class="form-select" aria-label="Default select example">
                        <option selected>Select a Type a Vehicles</option>
                            <option value="car">car</option>
                            <option value="motocycle">motocycle</option>
                    </select>
                </div>
                <div class="flex flex-col items-center justify-center mt-6">
                    <button class="items-center dark pr-4 pl-4 pt-2 pb-2 cursor-pointer" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>