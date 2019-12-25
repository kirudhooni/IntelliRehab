@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>

{{-- @include('layouts._validate_errors')     --}}
<form action="{{ route('users.update', $user->id)}}" method="post" class="mt-5" >
        @method('PUT')
    @include('users._userForm')
</form>
</div>
@endsection
