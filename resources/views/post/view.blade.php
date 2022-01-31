@extends('layouts.layout')

@section('title')
    Post View
@endsection
@section('content_title')
<h2>View Post</h2>
<ul class="nav navbar-right panel_toolbox">
    
</ul>
@endsection
@section('content')

@include('flash-message')
<table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
    <thead>
        <tr>
            <th>Property/Name/Title</th>
            <th colspan="7">{{$posts->title}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Address</td>
            <td colspan="7">{{$posts->address}}</td>
        </tr>
        <tr>
            <td>Posted By</td>
            <td colspan="7">{{$posts->user_name.' - '.$posts->user_email.' - '.$posts->user_id}}</td>
        </tr>
        <tr>
            <td>Size:</td>
            <td>{{$posts->area}}</td>
            <td>Bad Room:</td>
            <td>{{$posts->nm_bedroom}}</td>
            <td>Bath Room:</td>
            <td>{{$posts->nm_bathroom}}</td>
            <td>Garage:</td>
            <td>{{$posts->nm_garage}}</td>
        </tr>
        <tr>
            <td>Country:</td>
            <td>{{$posts->country_name}}</td>
            <td>Division/State:</td>
            <td>{{$posts->division_name}}</td>
            <td>District:</td>
            <td>{{$posts->district_name}}</td>
            <td>Upazila/Thana:</td>
            <td>{{$posts->upazila_name}}</td>
        </tr>
        <tr>
            <td>Union/City:</td>
            <td>{{$posts->union_name}}</td>
            <td>Post Type:</td>
            <td>{{$posts->post_type_name}}</td>
            <td>Property Type:</td>
            <td>{{$posts->property_type_name}}</td>
            <td>Add. For:</td>
            <td>{{$posts->property_for_name}}</td>
        </tr>
        <tr>
            <td>Post Status:</td>
            <td>{{$posts->status_name}}</td>
            <td>Approved By:</td>
            <td>{{$posts->approved_by_name}}</td>
            <td>Post Time:</td>
            <td>{{$posts->created_at}}</td>
            <td>Update Time:</td>
            <td>{{$posts->updated_at}}</td>
        </tr>
        <tr>
            <td>Price: </td>
            <td>{{$posts->price}}</td>
            <td>Post Status: </td>
            <td>{{$posts->status_name}}</td>
            
        </tr>
        <tr>
            <td>Details</td>
            <td colspan="7">{{$posts->details}}</td>
        </tr>
        <tr>
            <td colspan='8'>
                <img width="100%" src="{{url('public/storage/image').$posts->image}}" alt="Image">
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <iframe width="100%" height="400px"
                allow="accelerometer; autoplay; 
                clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen
                src="{{$posts->video}}" frame-border="0">
                </iframe> 
            </td>
        </tr>
    </tbody>
</table>
@endsection