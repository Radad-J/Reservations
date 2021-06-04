<?php

namespace App\Imports;

use App\Models\Show;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShowsImport implements ToModel, WithHeadingRow
{
    public function model(array $row): Show
    {
        $slug = str_replace(' ', '-', $row['title']);

        return new Show([
            'title'       => $row['title'],
            'slug'        => $slug,
            'description' => $row['description'],
            'price'       => $row['price']
        ]);
    }

}
