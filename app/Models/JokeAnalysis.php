<?php

namespace App\Models;

use App\Contracts\JokeAnalyzer;
use Illuminate\Support\Collection;

class JokeAnalysis implements JokeAnalyzer
{
    protected Collection $characterCounts;


    public function __construct(
        public Joke $joke,
    ) {}


    public function commonLetter()
    {
        return $this->getCharacterCounts()->sortDesc()->keys()->first();
    }

    public function uniqueLetters()
    {
        return $this->getCharacterCounts()->filter(fn($char) => $char == 1)->keys()->implode('-');
    }

    /**
     * In this method we count all characters and 
     * store them in the 'characterCounts' propery.
     */
    private function getCharacterCounts(): Collection
    {
        /** Here we check to see if we have a count array available in `characterCounts` 
         *  property so we can use it's value as a cache mechanism, therefore
         *  we do not need to calculate it each time we call the method.  
         */
        if(! empty($this->characterCounts)) {
            return $this->characterCounts;
        }

        $this->characterCounts = collect(count_chars($this->joke->text, 1))
             ->mapWithKeys(fn($item, $key) => [chr($key) => $item])
             ->reject(fn($item, $key) => $key == ' ')
             ->filter(fn($item, $key) => preg_replace("/[^a-zA-Z]+/", "", $key));

        return $this->characterCounts;
    }
}
