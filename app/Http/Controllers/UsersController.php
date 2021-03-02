<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use DataTables;

class UsersController extends Controller
{
    public function getUsers(request $request)
    {
        if ($request->ajax()) {
            $response = Http::withHeaders([
                'Authorization'    => 'Bearer 5f89042b1e8ca1dd80b8c777493604577fea4a09098162bb84d15e3554f2913d'
            ])->get("https://gorest.co.in/public-api/users");
            $data = json_decode($response)->data;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return $this->actionColumn($data);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('/users/usersindex');
    }
    protected function actionColumn($data): string
    {
        $showUrl = route('users.show', $data->id);
        $deleteUrl = route('users.delete', $data->id);
        $deleteUrl = route('users.delete', $data->id);
        return "<a class='btn btn-success' data-value='$data->id' href='$showUrl'>View/Edit</a>

                        <a class='btn btn-danger' data-value='$data->id' href='$deleteUrl'>Delete</a>";
    }
    public function getOneUser($id)
    {
        $response = Http::withHeaders([
            'Authorization'    => 'Bearer 5f89042b1e8ca1dd80b8c777493604577fea4a09098162bb84d15e3554f2913d'
        ])->get("https://gorest.co.in/public-api/users/{$id}");
        $data = json_decode($response)->data;
        return view('/users/edituser', compact('data'));
    }
    public function addUserview()
    {
        return view('users/createuser');
    }
    public function addUser(request $request)
    {
        $response = Http::withHeaders([
            'Authorization'    => 'Bearer 5f89042b1e8ca1dd80b8c777493604577fea4a09098162bb84d15e3554f2913d'
        ])->post(
            "https://gorest.co.in/public-api/users",
            [
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'status' => $request->status,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        $quizzes = json_decode($response)->data;
        if (json_decode($response)->data->code == 201) {
            return redirect()->route('users.usersindex');
        } else {
            dd(json_decode($response)->data);
        }
    }
    public function updateUser(request $request, $id)
    {
        $response = Http::withHeaders([
            'Authorization'    => 'Bearer 5f89042b1e8ca1dd80b8c777493604577fea4a09098162bb84d15e3554f2913d'
        ])->patch(
            "https://gorest.co.in/public-api/users/{$id}",
            [
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'status' => $request->status,
                'updated_at' => now()
            ]
        );
        if (json_decode($response)->data->code == 200) {
            return redirect()->route('users.usersindex');
        } else {
            dd(json_decode($response)->data);
        }
    }
    public function deleteUser($id)
    {
        $response = Http::withHeaders([
            'Authorization'    => 'Bearer 5f89042b1e8ca1dd80b8c777493604577fea4a09098162bb84d15e3554f2913d'
        ])->delete("https://gorest.co.in/public-api/users/{$id}");
        $quizzes = json_decode($response);
        if (json_decode($response)->data->code == 204) {
            return redirect()->route('users.usersindex');
        } else {
            dd(json_decode($response)->data);
        }
    }
}
