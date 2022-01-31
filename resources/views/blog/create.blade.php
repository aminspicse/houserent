@extends('layouts.layout')

@section('title')
    Blog
@endsection
@section('content_title')
    <h2>Create New Blog</h2>
@endsection
@section('content')

<form action="{{url('blogs/')}}" method="post" enctype="multipart/form-data" id="demo-form2"
    data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Title
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="title" type="text" value="{{old('title')}}" class="form-control ">
            @error('title')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Details
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <textarea name="details" class="form-control" id="" cols="30" rows="2"></textarea>
            @error('details')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Image
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="file" name="image" class="form-control">
            @error('image')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button class="btn btn-primary" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </div>
</form>

@endsection