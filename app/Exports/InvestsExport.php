<?php

namespace App\Exports;

use App\Investment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvestsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Investment::all();
    }

     public function map($investsdata): array
    {
        return [
            $investsdata->id,
            $investsdata->name,
            $investsdata->address,
            $investsdata->phone,
            $investsdata->amount,
            $investsdata->purpose,
            date('d-m-y/h:i:m A',strtotime($investsdata->created_at)),
            date('d-m-y/h:i:m A',strtotime($investsdata->updated_at)),
            $investsdata->january,
            $investsdata->february,
            $investsdata->march,
            $investsdata->april,
            $investsdata->may,
            $investsdata->june,
            $investsdata->july,
            $investsdata->august,
            $investsdata->september,
            $investsdata->october,
            $investsdata->november,
            $investsdata->december,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Address',
            'Phone',
            'Invest Amount',
            'Invest Purpose',
            'Created At',
            'Updated At',
            'january', 
            'february',
            'march',
            'april',
            'may',
            'june',
            'july',
            'august',
            'september',
            'october',
            'november',
            'december',
        ];
    }

}
