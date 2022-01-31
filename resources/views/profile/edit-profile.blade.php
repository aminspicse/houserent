@extends('layouts.layout')

@section('title')
    Edit Profile
@endsection
@section('content_title')
    <h2>Edit Profile Info</h2>
@endsection
@section('content')


<form action="{{url('update-profile/')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="name" value="{{Auth::user()->name}}" type="text" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Mobile
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="mobile" value="{{Auth::user()->mobile}}" type="text" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Address
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="address" value="{{Auth::user()->address}}" type="text" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Testimonial HRS
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <textarea class="form-control" name="testimonial" id="" cols="30" rows="1">{{Auth::user()->testimonial}}</textarea>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Profile Picture
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="profilepicture" type="file" value="{{Auth::user()->picture}}" class="form-control ">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">
            <span class="required"></span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="submit" type="submit" value="Update" class="btn btn-info ">
        </div>
    </div>
</form>

@endsection