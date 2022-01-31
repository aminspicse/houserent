@extends('layouts.layout')

@section('title')
Active Post
@endsection
@section('content_title')
<h2>Active Post</h2>
<ul class="nav navbar-right panel_toolbox">

</ul>
@endsection
@section('content')

@include('flash-message')
<table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline"
    style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
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
            <th>{{$post->post_id}}</th>
            <th><a href="{{url('admin/view-post').'/'.$post->post_id}}">{{$post->title}}</a></th>
            <th>{{$post->address}}</th>
            <th>
                <ul class="" style="list-style:none">
                    <li class="nav-item dropdown open" style="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                            id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            Action
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                            @if($post->post_type != 1)
                            <a class="dropdown-item" href="{{url('admin/post-type').'/'.$post->post_id}}/1">Make Top Post</a>
                            @else
                            <a class="dropdown-item" href="{{url('admin/post-type').'/'.$post->post_id}}/2">Remove Top Post</a>
                            @endif
                            <a class="dropdown-item" href="{{url('admin/change-status').'/'.$post->post_id}}/2">Pending</a>
                            <a class="dropdown-item" href="{{url('admin/change-status').'/'.$post->post_id}}/0">Inactive</a>
                        </div>
                    </li>
                </ul>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection