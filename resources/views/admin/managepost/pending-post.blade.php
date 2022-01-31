@extends('layouts.layout')

@section('title')
    Pending Post
@endsection
@section('content_title')
<h2>Pending Post</h2>
<ul class="nav navbar-right panel_toolbox">
    
</ul>
@endsection
@section('content')

@include('flash-message')
<table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($post as $post)
        <tr>
            <td>{{$post->post_id}}</td>
            <td><a href="{{url('admin/view-post').'/'.$post->post_id}}">{{$post->title}}</a></td>
            <td>{{$post->address}}</td>
            <td>
                <ul class="" style="list-style:none">
                    <li class="nav-item dropdown open" style="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                            id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            Action
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('admin/change-status').'/'.$post->post_id}}/1" >Active</a>
                            <a class="dropdown-item" href="{{url('admin/change-status').'/'.$post->post_id}}/0" >Inactive</a>
                        </div>
                    </li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection