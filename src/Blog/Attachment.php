<?php declare(strict_types = 1);

namespace App\Blog;

use App\Blog\Category;
use App\Blog\Interface\ICategorizable;
use App\Blog\Traits\Categorizable;

class Attachment implements ICategorizable
{
    use Categorizable;

    private $id;
    private $name;
    private $path;

    public function __construct(int $id, string $name, string $path, Category $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->path = $path;
        $this->setCategory($category);
    }

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of path
     */ 
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }
}
