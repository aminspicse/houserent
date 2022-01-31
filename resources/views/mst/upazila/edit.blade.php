@extends('layouts.layout')
@section('title')
    Upazila
@endsection
@section('content_title')
    <h2>Edit Upazila</h2>
@endsection
@section('content')

<form action="{{url('admin/upazila/').'/'.$upazila->upazila_id}}" method="post" enctype="multipart/form-data" id="demo-form2"
    data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select Country
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="country_name" id="country" class="form-control">
                <option value="{{$upazila->country_id}}">{{$upazila->country_name}}</option>
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
                <option value="{{$upazila->division_id}}">{{$upazila->division_name}}</option>
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
                <option value="{{$upazila->district_id}}">{{$upazila->district_name}}</option>
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
            <input name="upazila_name" type="text" value="{{$upazila->upazila_name}}" class="form-control ">
            @error('upazila_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Local Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="local_name" type="text" value="{{$upazila->local_name}}" class="form-control ">
            @error('local_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Upazila Status
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="upazila_status" class="form-control" id="">
                <option value="{{$upazila->upazila_status}}">{{$upazila->status_name}}</option>
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