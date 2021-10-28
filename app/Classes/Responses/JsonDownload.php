<?php

namespace App\Classes\Responses;

use App\Classes\ViewModels\JokeViewModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;


class JsonDownload
{
    public function __construct(
        protected Collection $jokes,
    ) {}


    public function response() 
    {
        Storage::put('analytics-report.json', json_encode(new JokeViewModel($this->jokes)));

        return Storage::download('analytics-report.json');
    }
}
