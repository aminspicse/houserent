@extends('layouts.layout')

@section('title')
    MyPost
@endsection
@section('content_title')
<h2>My Post</h2>
<ul class="nav navbar-right panel_toolbox">
    
</ul>
@endsection
@section('content')

@include('flash-message')
<table id="datatable" class="table table-striped table-bordered"  role="grid" aria-describedby="datatable-buttons_info">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($post as $post)
        <tr>
            <th>{{$post->post_id}}</th>
            <th><a href="{{url('post').'/'.$post->post_id}}">{{$post->title}}</a></th>
            <th>{{$post->address}}</th>
            <th><span>{{$post->status_name}}</span></th>
            <th>
               <a href="{{url('post').'/'.$post->post_id}}/edit" class="">Edit</a>
               <a href="{{url('/post/delete').'/'.$post->post_id}}" class="">Delete</a>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection