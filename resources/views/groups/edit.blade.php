@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Group</h2>

{{-- @include('layouts._validate_errors')     --}}
<form action="{{ route('groups.update', $group->id)}}" method="post" class="mt-5" >
        @method('PUT')
    @include('groups._groupForm')
</form>
</div>
@endsection
