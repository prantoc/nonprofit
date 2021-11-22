<?php

namespace App\Exports;

use App\DonateUser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DonateUser::all();
    }

     public function map($usersdata): array
    {

        return [
            $usersdata->id,
            $usersdata->doner->name,
            $usersdata->doner->phone,
            $usersdata->doner->address,
            $usersdata->year,
            date('d-m-y/h:i:m A',strtotime($usersdata->created_at)),
            date('d-m-y/h:i:m A',strtotime($usersdata->updated_at)),
            $usersdata->january,
            $usersdata->february,
            $usersdata->march,
            $usersdata->april,
            $usersdata->may,
            $usersdata->june,
            $usersdata->july,
            $usersdata->august,
            $usersdata->september,
            $usersdata->october,
            $usersdata->november,
            $usersdata->december,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Phone',
            'Address',
            'Year',
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
