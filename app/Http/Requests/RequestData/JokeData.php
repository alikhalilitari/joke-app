<?php

namespace App\Http\Requests\RequestData;


class JokeData
{
    public function __construct(
        public string $format,
        public int $limit,
        public bool $download,
    ) {}
}
