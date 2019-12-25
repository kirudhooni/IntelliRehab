@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add User</h2>

{{-- @include('layouts._validate_errors')     --}}
<form action="{{ route('groups.store')}}" method="post" class="mt-5" >
    @include('groups._groupForm')
</form>
</div>
@endsection
