<?php

namespace App\Entity;

class Articles
{
    /**
     * Summary of __construct
     * @param mixed $title
     * @param mixed $article
     * @param mixed $id
     * @param mixed $id_category
     */
    public function __construct(
        private string $title,
        private string $article,
        private int $id_category,
        private ?int $id = null
    ) {
    }


    /**
     * @return 
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param  $title 
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return 
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @param  $article 
     * @return self
     */
    public function setArticle(string $article): self
    {
        $this->article = $article;
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

    /**
     * @return 
     */
    public function getId_category(): int
    {
        return $this->id_category;
    }

    /**
     * @param  $id_category 
     * @return self
     */
    public function setId_category(int $id_category): self
    {
        $this->id_category = $id_category;
        return $this;
    }
}