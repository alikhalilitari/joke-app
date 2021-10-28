<?php

namespace App\Collections;

use Illuminate\Support\Collection;


class JokeCollection extends Collection
{

    public function specialLetterCount(): int
    {
        $lastJoke = $this->toBase()->last();
        $firstLetter = substr($lastJoke->text, 0, 1);

        return $this->toBase()->map(fn($joke) => 
            substr_count($joke->text, $firstLetter)
        )->sum();
    }

    public function longJokesCount(): int
    {
        return $this->toBase()->filter->isLong()->count();
    }
}
