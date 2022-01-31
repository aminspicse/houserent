@extends('layouts.layout')

@section('title')
    Edit Property For
@endsection
@section('content_title')
    <h2>Edit Property For</h2>
@endsection
@section('content')

<form action="{{url('admin/property-for/').'/'.$property->for_id}}" method="post" enctype="multipart/form-data" id="demo-form2"
    data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Property For Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="for_name" type="text" value="{{$property->for_name}}" class="form-control ">
            @error('for_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Property For Status
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="for_status" class="form-control" id="">
                <option value="{{$property->for_status}}">{{$property->status_name}}</option>
                <option>Select Status</option>
                @foreach($status as $status)
                    <option value="{{$status->status_id}}">{{$status->status_name}}</option>
                @endforeach
            </select>
            @error('property_type_status')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
</form>

@endsection