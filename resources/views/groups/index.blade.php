@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._message')
    <h1>Admin Groups-List</h1>
    
    <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th><span>Name</span></th>
                                    <th><span>Description</span></th>
                                    <th><span>Last Update</span></th>
                                    <th ><span>Status</span></th>
                                    <th ><span>Action</span></th>
                                   
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    
                                
                                <tr>
                                    <td>
                                        <a>{{$group->name}}</a>
                                    </td>
                                    <td>
                                        <a>{{$group->description}}</a>
                                    </td>
                                    <td>
                                        <a>{{$group->updated_at}}</a>
                                    </td>
                                    <td>
                                            <a>{{$group->status}}</a>
                                    </td>
                                    <td>
                                            <a href="{{route('groups.edit', $group->id)}}" role="button" class="btn btn-outline-dark">Edit</a>
                                    </td>
                                    <td>
                                            <a href="{{route('groups-deactivate', $group->id)}}" role="button" class="btn btn-outline-dark">{{$group->status == 'active' ? 'Deactivate': 'Activate'}}</a>
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
                    {{ $groups->links() }}
                </div>
            </div>
        </div>
</div>
@endsection