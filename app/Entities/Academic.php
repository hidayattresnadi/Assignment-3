<?php

namespace App\Entities;

class Academic
{
    private $id;
    private $name;
    private $content;
    private $slug;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->slug = $data['slug'];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $this->slug
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }

    public function __get($atribute)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
        return null;
    }

    public function __set($atribut, $value)
    {
        if (property_exists($this, $atribut)) {
            $this->$atribut = $value;
        }
    }
}
