<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
// use users;
use App\Models\Users;


class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $response = Http::withHeaders([
            'Authorization'    => 'Bearer 5f89042b1e8ca1dd80b8c777493604577fea4a09098162bb84d15e3554f2913d'
        ])->get("https://gorest.co.in/public-api/users");
        $responseData = collect(json_decode($response)->data);
        return $responseData;
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Gender',
            'Status',
            'Created_at',
            'Updated_at'
        ];
    }



    public function map($responseData) : array
    {
        return [
            $responseData->id,
            $responseData->name,
            $responseData->email,
            $responseData->gender,
            $responseData->status,
            $responseData->created_at,
            // ->format('d/m/Y'),
            $responseData->updated_at,
        ];
    }
}
