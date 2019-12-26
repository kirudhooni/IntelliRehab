@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Group</h2>
    <form action="{{ route('users.store')}}" method="post">
        <dynamic-selectbox></dynamic-selectbox>
        <dual-listbox></dual-listbox>
        <div class="row text-center my-3">
            <div class="col-md-4">
                <button type="submit" class="btn btn-success" style="width:150px;">Submit</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <a class="btn btn-danger" style="width:150px;" href="{{ route('admin')}}" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection

