<?php

namespace App\Repository;

use App\Entity\Commentaire;


class CommentaireRepository
{
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM commentaire");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Commentaire($line["comment"], $line["id_articles"], $line["id"]);
        }

        return $list;
    }
    public function findById(int $id): ?Commentaire
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM commentaire WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Commentaire($line["comment"], $line["id_articles"], $line["id"]);
        }
        return null;
    }
    public function persist(Commentaire $commentaires)
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO Commentaire (comment,id_articles) VALUES (:comment,:id_articles)");
        $query->bindValue(':comment', $commentaires->getComment());

        $query->bindValue(':id_articles', $commentaires->getId_articles());


        $query->execute();

        //On assigne l'id auto incrémenté à l'instance de produit afin que l'objet soit complet après le persist
        $commentaires->setId($connection->lastInsertId());
    }
    public function delete(int $id)
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM commentaire WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }


    public function update(Commentaire $commentaires)
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE Commentaire SET Comment =:comment,id_articles=:id_articles WHERE id=:id");
        $query->bindValue(':comment', $commentaires->getComment());
        $query->bindValue(':id_articles', $commentaires->getId_articles());
        $query->bindValue(':id', $commentaires->getId());
        $query->execute();
    }




}