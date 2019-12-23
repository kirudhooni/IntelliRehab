@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add User</h2>

<form action="{{ route('users.store')}}" method="post" class="mt-5">
    @csrf

    <div class="form-group row">
        <label class="col-form-label col-md-2" for="first-name">First Name</label>
        <input type="text" name="firstname" id="first-name" class="form-control col-md-6">
    </div>

    <div class="form-group row">
            <label class="col-form-label col-md-2" for="last-name">Last Name</label>
            <input type="text" name="lastname" id="last-name" class="form-control col-md-6">
    </div>

    <div class="form-group row">
            <label class="col-form-label col-md-2" for="user-name">Username</label>
            <input type="text" name="username" id="user-name" class="form-control col-md-6">
    </div>

    <div class="form-group row">
            <label class="col-form-label col-md-2" for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control col-md-6">
    </div>

    <div class="form-group row">
            <label class="col-form-label col-md-2" for="e-mail">E-mail</label>
            <input type="email" name="email" id="e-mail" class="form-control col-md-6">
    </div>

    <div class="form-group row">
            <label class="col-form-label col-md-2" for="note">Note</label>
            <input type="textarea" name="note" id="note" class="form-control col-md-6">
    </div>

    <div class="form-group row">
            <label class="col-form-label col-md-2" for="level">Level</label>
           
               
                <a>{{$user}}</a>
               
            
    </div>
</form>
</div>
@endsection
