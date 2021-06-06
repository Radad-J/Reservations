<?php

namespace App\Imports;

use App\Models\Artist;
use App\Models\Show;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShowsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $show = new Show([
            'title'       => $row['title'],
            'slug'        => Str::slug($row['slug']),
            'description' => $row['description'],
            'poster_url'  => $row['poster_url'],
            'bookable'    => $row['bookable'],
            'location_id' => $row['location_id'],
            'artists'     => $row['artists'],
            'price'       => $row['price'],
        ]);

        Show::setShowArtist($row['artists'], $row['title']);


        return $show;
    }

}
