@extends('layouts.dashboard')
{{-- @@include('layouts.') --}}
@section('content')
<div class="row">
    <div class="col-sm-9">
    </div>
    <div class="col-sm-3">
     
      <div class="row">
      <div class=col-sm-2>
      </div>
          <div class="col-sm-5">
          <div class="card"> 
            <a href="/users/create" class="btn btn-primary">AddUser</a>
            </div>
        </div>
        <div class="col-sm-5" style= "background:;">
        <div class="card">
            <a href="/users/export" class="btn btn-success">Export</a>
        </div>
        </div>
        </div>
    </div>
    <!--  -->
  </div>
<table class="table table-info yajra-datatable">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Gender</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
  </table>
  <script type="text/javascript">
    $(function () {

      var table = $('.yajra-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('users.usersindex') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'gender', name: 'gender'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: true, searchable: true},
          ]
      });

    });
  </script>
@endsection
