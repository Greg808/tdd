<?php


namespace App;


class Article
{
    public function __construct(
        public ?string $title = null
    )
    {}

    public function getSlug(): string
    {
        $slug = trim($this->title);
        $slug = preg_replace('/\s+/', '_', $slug);
        return $slug;
    }
}