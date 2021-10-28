<?php

namespace App\Classes\Responses;

use Illuminate\Support\Collection;

class JokeResponse
{
    public function __construct(
        protected Collection $jokes,
        protected string $format,
        protected bool $download
    ) {}


    public function response()
    {
        if(! $this->download) {
            return (new JsonView($this->jokes))->response();
        }

        if($this->format == 'json') {
            return (new JsonDownload($this->jokes))->response();
        }

        if($this->format == 'csv') {
            return (new CsvDownload($this->jokes))->response();
        }
    }
}
