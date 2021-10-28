<?php

namespace App\Http\Requests\Contracts;

use Illuminate\Http\Request;


interface DataFactory
{
    public function fromRequest(Request $request);
}
