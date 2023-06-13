<?php
use App\Entity\Articles;
use App\Repository\ArticlesRepository;

require '../vendor/autoload.php';

$repository = new ArticlesRepository();

// $Articles = $repository->findAll();


$Articles = $repository->findById(3);

//$toarticle = new Articles('un soir en australie', 'le kangourus me frolait la jambe ,me coeur battait la chamade.', 1);

//$repository->persist($toarticle);

//var_dump($toarticle);

//$repository->delete(1);

var_dump($Articles);

$Articles->setTitle('la vie');

$repository->update($Articles);

var_dump($Articles);