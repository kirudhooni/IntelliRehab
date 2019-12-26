@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._message')
    <h1>Admin User-List</h1>
    
    <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th><span>Firstname</span></th>
                                    <th><span>Lastname</span></th>
                                    <th><span>Username</span></th>
                                    <th><span>Authentication Level</span></th>
                                    <th><span>Last Update</span></th>
                                    <th ><span>Status</span></th>
                                    <th ><span>Action</span></th>
                                   
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    
                                
                                <tr>
                                    <td>
                                        <a>{{$user->firstname}}</a>
                                    </td>
                                    <td>
                                        <a>{{$user->lastname}}</a>
                                    </td>
                                    <td>
                                        <a>{{$user->username}}</a>
                                    </td>
                                    <td>
                                        <a>{{$user->level}}</a>
                                    </td>
                                    <td>
                                        <a>{{$user->updated_at}}</a>
                                    </td>
                                    <td>
                                            <a>{{$user->status}}</a>
                                    </td>
                                    <td>
                                            <a href="{{route('users.edit', $user->id)}}" role="button" class="btn btn-outline-dark">Edit</a>
                                    </td>
                                    <td>
                                    <a href="{{route('users-deactivate',$user->id)}}" role="button" class="btn btn-outline-dark">{{$user->status == 'active' ? 'Deactivate': 'Activate'}}</a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <ul class="pagination pull-right">
                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                    </ul> --}}
                    {{ $users->links() }}
                </div>
            </div>
        </div>
</div>
@endsection