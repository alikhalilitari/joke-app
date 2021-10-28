<?php

namespace App\Classes\Responses;

use Illuminate\Support\Collection;


class CsvDownload
{
    public function __construct(
        protected Collection $jokes,
    ) {}


    public function response()
    {
        $handle = fopen('export.csv', 'w');

        fputcsv($handle, ['id', 'title', 'text', 'common_letter', 'unique_letters']);

        foreach ($this->jokes as $joke) {
            fputcsv($handle, [$joke->id, $joke->title, $joke->text, $joke->analyze()->commonLetter(), $joke->analyze()->uniqueLetters()]);
        }

        fclose($handle);

        return response()->download('export.csv');
    }
}
