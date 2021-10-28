<?php

namespace App\Classes\ViewModels;

use App\Collections\JokeCollection;
use Illuminate\Contracts\Support\Responsable;

class JokeViewModel implements Responsable
{
    public function __construct(
        public JokeCollection $jokes,
    ) {}

    /**
     * {@inheritDoc}
     */
    public function toResponse($request)
    {
        return [
            'summary' => [
                'special_letter_count' => $this->jokes->specialLetterCount(),
                'long_jokes_count' => $this->jokes->longJokesCount()
            ],
            'jokes' => $this->decorateJoke()
        ];
    }

    private function decorateJoke()
    {
        return $this->jokes->map(fn($joke) => [
            'id' => $joke->id,
            'title' => $joke->title,
            'text' => $joke->text,
            'joke_analysis' => [
                'common_letter' => $joke->analyze()->commonLetter(),
                'unique_letters' => $joke->analyze()->uniqueLetters()
            ]
        ])->toArray();
    }
}
