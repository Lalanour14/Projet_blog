<?php
use App\Entity\Articles;
use App\Entity\Category;
use App\Entity\Commentaire;
use App\Repository\CategoryRepository;

require '../vendor/autoload.php';

$repository = new CategoryRepository();

$Category = $repository->findAll();
//var_dump($Category);

//$Category = $repository->findById(3);
//var_dump($repository->findById(3));
$tocategory = new Category('les Animaux ');

$repository->persist($tocategory);

//var_dump($tocategory);

$repository->delete(3);

$Category = $repository->findById(3);
//$Category->setLabel("les oiseaux ");
//$repository->update($commentaire);
var_dump($repository->findById(3));