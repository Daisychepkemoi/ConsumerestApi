{{-- <table class="table table-striped table-dark"> --}}
<table class="table table-bordered yajra-datatable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $user)
      <tr>
        <th scope="row">1</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->gender}}</td>
        <td>{{$user->status}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
