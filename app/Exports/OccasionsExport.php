<?php

namespace App\Exports;

use App\OccasionAmount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OccasionsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OccasionAmount::all();
    }

     public function map($occasiondata): array
    {
        return [
            $occasiondata->id,
            $occasiondata->occasion->name,
            $occasiondata->occasion->year,
            $occasiondata->addfund,
            $occasiondata->cutfund,
            date('d-m-y/h:i:m A',strtotime($occasiondata->created_at)),
            date('d-m-y/h:i:m A',strtotime($occasiondata->updated_at)),
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Occasion Name',
            'Occasion Year',
            'Added Fund',
            'Expense Fund',
            'Created At',
            'Updated At',
        ];
    }

}
