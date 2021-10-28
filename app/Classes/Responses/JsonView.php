<?php

namespace App\Classes\Responses;

use App\Classes\ViewModels\JokeViewModel;
use Illuminate\Support\Collection;


class JsonView
{
    public function __construct(
        protected Collection $jokes,
    ) {}


    public function response() 
    {
        return new JokeViewModel($this->jokes);
    }

}
