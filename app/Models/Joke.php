<?php

namespace App\Models;

use App\Contracts\JokeAnalyzer;

class Joke
{
    protected int $longValue = 50;


    public function __construct(
        public string $id,
        public string $title,
        public string $text,
    ) {}


    public function analyze(): JokeAnalyzer
    {
        return new JokeAnalysis($this);
    }

    public function totalCount(): int
    {
        return strlen($this->title) + strlen($this->text);
    }

    public function isLong(): bool
    {
        return $this->longValue <= $this->totalCount() ;
    }
}
