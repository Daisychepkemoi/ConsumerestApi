@extends('layouts.dashboard')
@section('content')
    <form method="POST" action="/users/create">
        @csrf
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Full Name</label>
        <input type="Name" class="form-control" id="name"  name="name" placeholder="Full Name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Gender</label>
            <select class="form-control form-control-lg" name="gender" required>
                <option></option>
                {{-- @if ($data->gender == 'Male') --}}
                <option>Female</option>
                {{-- @else --}}
                <option>Male</option>
                {{-- @endif --}}


              </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <select class="form-control form-control-lg" name="status" required>
                {{-- @if ($data->status == 'Active') --}}
                 <option>Inactive</option>
                {{-- @else --}}
                <option>Active</option>
                {{-- @endif --}}


              </select>
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>
@endsection
