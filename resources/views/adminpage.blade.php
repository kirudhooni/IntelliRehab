@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Page</h1>
    <br>
    <div class="form-row my-4" style="background-color: #BCC2C7; border-radius:10px;">
        <label class="col-md-2 col-form-label text-center" ><h2 class="text-center">Patients</h2></label>
        <a class="btn btn-primary col-md-2 mr-5 my-2 text-center" style="border-radius:30px" href="#" role="button">Add</a>
        <a class="btn btn-primary col-md-2 mr-5 my-2 text-center" style="border-radius:30px" href="#" role="button">View/Edit</a>
    </div>
    <div class="form-row  my-4" style="background-color: #BCC2C7; border-radius:10px;">
        <label class="col-md-2 col-form-label" ><h2 class="text-center">Groups</h2></label>
        <a class="btn btn-primary col-md-2 mr-5 my-2 text-center" style="border-radius:30px" href="#" role="button">Add</a>
        <a class="btn btn-primary col-md-2 mr-5 my-2 text-center" style="border-radius:30px" href="#" role="button">View/Edit</a>
    </div>
    <div class="form-row  my-4" style="background-color: #BCC2C7; border-radius:10px;">
        <label class="col-md-2 col-form-label text-center" ><h2 class="text-center">Users</h2></label>
        <a class="btn btn-primary col-md-2 mr-5 my-2 text-center" style="border-radius:30px" href="{{route('users.create')}}" role="button">Add</a>
        <a class="btn btn-primary col-md-2 mr-5 my-2 text-center" style="border-radius:30px" href="#" role="button">View/Edit</a>
    </div>
</div>
@endsection