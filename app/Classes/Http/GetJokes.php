<?php

namespace App\Classes\Http;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;


class GetJokes
{
    protected array $credentials = ['X-JokesOne-Api-Secret' => '0itHsQ_min78Dpf8TLaDHweF'];


    public function __construct(
        public int $limit
    ) {}


    public function get()
    {
        return Http::pool(function (Pool $pool) { 
            $pools = [];

            for($i = 0; $i < $this->limit; $i++) {
                $pools[] = $pool->retry(3, 20)->withHeaders($this->credentials)->get('https://api.jokes.one/joke/random');
            }

            return $pools;
        });
    }
}
