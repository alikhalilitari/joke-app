<?php

namespace App\Http\Controllers;

use App\Classes\Factories\JokeFactory;
use App\Classes\Http\GetJokes;
use App\Classes\Responses\JokeResponse;
use App\Http\Requests\JokeRequest;
use App\Http\Requests\RequestData\JokeDataFactory;

class JokeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(JokeRequest $request, JokeDataFactory $dataFactory, JokeFactory $jokeFactory)
    {
        $jokeData = $dataFactory->fromRequest($request);
        $apiResponse = new GetJokes($jokeData->limit);
        $jokes = $jokeFactory->execute($apiResponse->get());

        return (new JokeResponse($jokes, $jokeData->format, $jokeData->download))->response();
    }
}
