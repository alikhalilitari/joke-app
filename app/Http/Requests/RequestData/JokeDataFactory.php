<?php

namespace App\Http\Requests\RequestData;

use App\Http\Requests\JokeRequest;

class JokeDataFactory
{
    public function fromRequest(JokeRequest $request): JokeData 
    {
        return new JokeData(
            format: $request->format, 
            limit: $request->input('limit', 5), 
            download: $request->exists('download')
        );
    } 
}
