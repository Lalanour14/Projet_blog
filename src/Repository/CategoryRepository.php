<?php

namespace App\Repository;

use App\Entity\Category;

class CategoryRepository
{
    /**
     * Méthode qui va faire une requête pour récupérer tous les produits de la base de données puis qui va boucler
     * sur les résultat de la requête pour transformer chaque ligne de résultat en instance de la classe Product
     * @return Category[] La liste des produits contenus dans la base de données;
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM catagory");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Category($line["label"], $line["id"]);
        }

        return $list;
    }
    public function findById(int $id): ?Category
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM catagory WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Category($line["label"], $line["id"]);
        }

        return null;
    }
    public function persist(Category $categorys)
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO catagory (label) VALUES (:label)");
        $query->bindValue(':label', $categorys->getLabel());
        $query->execute();

        //On assigne l'id auto incrémenté à l'instance de produit afin que l'objet soit complet après le persist
        $categorys->setId($connection->lastInsertId());
    }
    public function delete(int $id)
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM catagory WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }
    public function update(Category $category)
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE catagory SET label =:label, WHERE id=:id");
        $query->bindValue(':label', $category->getLabel());
        $query->bindValue(':id', $category->getId());

        $query->execute();
    }



}