@extends('layouts.layout')

@section('title')
    Division/State
@endsection

@section('content_title')
    <h2>Edit State/Division</h2>
@endsection
@section('content')

<form action="{{url('admin/division').'/'.$division->division_id}}" method="post" enctype="multipart/form-data" id="demo-form2"
    data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Select Country
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="country_name" id="" disabled class="form-control">
                <option>{{$division->country_name}}</option>
                <!--
                @foreach($country as $country)
                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                @endforeach
                -->
            </select>
            <!--
            @error('country_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            -->
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Division Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="division_name" type="text" value="{{$division->division_name}}" class="form-control ">
            @error('division_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Local Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="local_name" type="text" value="{{$division->local_name}}" class="form-control ">
            @error('local_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Division Status
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="division_status" class="form-control" id="">
                <option value="{{$division->division_status}}">{{$division->status_name}}</option>
                @foreach($status as $status)
                    <option value="{{$status->status_id}}">{{$status->status_name}}</option>
                @endforeach
            </select>
            @error('division_status')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button class="btn btn-primary" type="reset">Reset</button>
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
</form>

@endsection