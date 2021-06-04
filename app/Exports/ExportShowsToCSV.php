<?php

namespace App\Exports;

use App\Models\Show;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportShowsToCSV implements FromCollection, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return collect(Show::getShows());
    }

    public function headings(): array {
        return [
            'Title',
            'Description',
            'Price'
        ];
    }
}
