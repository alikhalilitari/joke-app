<?php

namespace App\Contracts;


interface JokeAnalyzer
{
    public function commonLetter();
    public function uniqueLetters();
}
