<?php

namespace App\Repository;

use App\Entity\Articles;

/**
 * Un Repository (ou DAO, ou Composant d'Accès aux Données) est une classe dont l'objectif est de regrouper les
 * interaction avec la base de données pour une entité spécifique. Les repositories sont les seuls endroits de
 * l'application où on aura des requêtes SQL (ou autre si on est pas sur du SQL).
 * Ici, nous sommes dans un ProductRepository qui va s'occuper de faire toutes les requêtes du CRUD pour 
 * récupérer (findAll, findById), créer (persist), supprimer (delete) et modifier (update) les données de la 
 * table product de notre base de données.
 */
class ArticlesRepository
{

    /**
     * Méthode qui va faire une requête pour récupérer tous les produits de la base de données puis qui va boucler
     * sur les résultat de la requête pour transformer chaque ligne de résultat en instance de la classe Product
     * @return Articles[] La liste des produits contenus dans la base de données;
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM articles");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Articles($line["Tittle"], $line["article"], $line["id"]);
        }

        return $list;
    }





    public function findById(int $id): ?Articles
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM articles WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Articles($line["Tittle"], $line["article"], $line["id"]);
        }
        return null;
    }
    public function persist(Articles $articles)
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO Articles (Tittle,article,id_category) VALUES (:Tittle,:article,:id_category)");
        $query->bindValue(':Tittle', $articles->getTitle());
        $query->bindValue(':article', $articles->getArticle());
        $query->bindValue(':id_category', $articles->getId_category());


        $query->execute();

        //On assigne l'id auto incrémenté à l'instance de produit afin que l'objet soit complet après le persist
        $articles->setId($connection->lastInsertId());
    }
    public function delete(int $id)
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM Articles WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(Articles $article)
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE Articles SET Tittle =:Tittle,article=:article,id_category=:id_category WHERE id=:id");
        $query->bindValue(':Tittle', $article->getTitle());
        $query->bindValue(':article', $article->getArticle());
        $query->bindValue(':id_category', $article->getId_category());
        $query->bindValue(':id', $article->getId());

        $query->execute();
    }





}