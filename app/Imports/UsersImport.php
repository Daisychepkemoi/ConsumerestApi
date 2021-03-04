<?php

namespace App\Imports;

use App\Models\Users;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{


    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $response = Http::withHeaders([
                'Authorization'    => 'Bearer 5f89042b1e8ca1dd80b8c777493604577fea4a09098162bb84d15e3554f2913d'
            ])->post(
                "https://gorest.co.in/public-api/users",
                [
                    'name'     =>$row[0],
                    'email'     => $row[1],
                    'gender'     => $row[2],
                    'status'     => $row[3],
                    'created_at'    => now(),
                    'updated_at' =>now(),
                ]
            );

        }
    }
}

//     /**
//     * @param array $row
//     *
//     * @return \Illuminate\Database\Eloquent\Model|null
//     */
//     public function model(array $row)
//     {
//         // return new User([
//         //     //
//         // ]);
//         $response = Http::withHeaders([
//             'Authorization'    => 'Bearer 5f89042b1e8ca1dd80b8c777493604577fea4a09098162bb84d15e3554f2913d'
//         ])->post(
//             "https://gorest.co.in/public-api/users",
//             [
//                 // 'name' => $request->name,
//                 // 'email' => $request->email,
//                 // 'gender' => $request->gender,
//                 // 'status' => $request->status,
//                 // 'created_at' => now(),
//                 // 'updated_at' => now()

//                 'name'     => $row[0],
//                 'email'     => $row[1],
//                 'gender'     => $row[2],
//                 'status'     => $row[3],
//                 'created_at'    => $row[4],
//                 'updated_at' =>$row[5],
//             ]
//         );
//         // return new Users([
//         //     'name'     => $row[0],
//         //     'email'     => $row[1],
//         //     'gender'     => $row[2],
//         //     'status'     => $row[3],
//         //     'created_at'    => now(),
//         //     'updated_at' =>now(),
//         // ]);
//         dd(collect(json_decode($response)));
//         return (collect(json_decode($response)));
//     }
// }
