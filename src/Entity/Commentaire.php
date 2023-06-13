<?php

namespace App\Entity;

class Commentaire
{


    public function __construct(
        private string $comment,
        private int $id_articles,
        private ?int $id = null
    ) {
    }

    /**
     * @return 
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param  $comment 
     * @return self
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return 
     */
    public function getId_articles(): int
    {
        return $this->id_articles;
    }

    /**
     * @param  $id_articles 
     * @return self
     */
    public function setId_articles(int $id_articles): self
    {
        $this->id_articles = $id_articles;
        return $this;
    }

    /**
     * @return 
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param  $id 
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }
}