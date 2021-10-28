<?php

namespace App\Classes\Factories;

use App\Collections\JokeCollection;
use App\Models\Joke;

class JokeFactory
{
    public function execute(array $responses): JokeCollection
    {
        $jokes = [];

        foreach($responses as $response) {
            $jokes[] = new Joke(
                id: $response['contents']['jokes'][0]['id'],
                title: $response['contents']['jokes'][0]['title'],
                text: $response['contents']['jokes'][0]['text'],
            );
        }

        return new JokeCollection($jokes);
    }
}
