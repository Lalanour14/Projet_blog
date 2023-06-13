<?php

namespace App\Entity;

class Category
{


    public function __construct(
        private string $label,
        private ?int $id = null
    ) {
    }



    /**
     * @return 
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param  $label 
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
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