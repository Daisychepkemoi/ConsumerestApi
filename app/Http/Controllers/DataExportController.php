<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;


class DataExportController extends Controller
{
    public function fileExport()
    {
        $headings = [
            'id',
            'name',
            'email',
            'gender',
            'status',
            'created_at',
            'updated_at'

        ];
        $date=now(0);
        return Excel::download(new UsersExport(), now().'users-collection.xlsx');
    }
    public function fileImport(request $request){
        $path1 = $request->file('file');
        // ->store('temp');
        // dd($path1);
        // $path=storage_path('app').'/'.$path1;
        // dd($path1);
        Excel::import(new UsersImport,$path1);


    //    dd($data);
    }
}
