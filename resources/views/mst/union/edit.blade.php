@extends('layouts.layout')
@section('title')
    Union
@endsection
@section('content_title')
    <h2>Edit Union</h2>
@endsection
@section('content')

<form action="{{url('admin/union/').'/'.$union->union_id}}" method="post" enctype="multipart/form-data" id="demo-form2"
    data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select Country
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="country_name" id="country" class="form-control">
                <option value="{{$union->country_id}}">{{$union->country_name}}}</option>
               
            </select>
            @error('country_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">State/Division
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="division_name" id="state" class="form-control">
                <option value="{{$union->division_id}}">{{$union->division_name}}</option>
            </select>
            @error('division_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">District Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="district_name" id="district" class="form-control">
                <option value="{{$union->district_id}}">{{$union->district_name}}</option>
            </select>
            @error('district_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Upazila Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="upazila_name" id="thana" class="form-control">
                <option value="{{$union->upazila_id}}">{{$union->upazila_name}}</option>
            </select>
            
            @error('upazila_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Union Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="union_name" type="text" value="{{$union->union_name}}" class="form-control ">
            @error('union_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Local Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="local_name" type="text" value="{{$union->local_name}}" class="form-control ">
            @error('local_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Lat
            <span class="required"> </span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="lat" type="text" value="{{$union->lat}}" class="form-control ">
            @error('lat')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Lon
            <span class="required"> </span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="lon" type="text" value="{{$union->lon}}" class="form-control ">
            @error('lon')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Union Status
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="union_status" class="form-control" id="">
                <option value="{{$union->union_status}}">{{$union->status_name}}</option>
                <option>Select Status</option>
                @foreach($status as $status)
                    <option value="{{$status->status_id}}">{{$status->status_name}}</option>
                @endforeach
            </select>
            @error('district_status')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>

@endsection