<?php
use App\Entity\Articles;
use App\Repository\ArticlesRepository;

require '../vendor/autoload.php';
$repository = new ArticlesRepository();

$Articles = $repository->findAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <h1>Articles List</h1>
        <div class="row g-3">
            <?php foreach ($Articles as $item) { ?>
                <div class="col-md-4">
                    <div class="card">

                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $item->getTitle() ?>
                            </h3>
                            <p class="card-text">
                                <!-- le htmlspecialchars sert à échaper tous les caractères HTML (et donc Javascript) pour éviter que le navigateur exécute du code qui aurait été rentré dans le formulaire -->
                                <?= htmlspecialchars($item->getArticle()) ?>
                            </p>
                            <p class="card-text text-end">

                            </p>
                            <!--<a href="single-product.php?id=<?= $item->getId() ?>" class="card-link">Details</a>-->
                        </div>
                    </div>
                </div>

                <?php

            }

            ?>
        </div>
    </div>
</body>

</html>