@extends('layouts.layout')

@section('title')
    Edit Country {{$country->country_name}}
@endsection

@section('content_title')
    <h2>Add New Country</h2>
@endsection
@section('content')

<form action="{{url('admin/country').'/'.$country->country_id}}" method="post" enctype="multipart/form-data" id="demo-form2"
    data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Country Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="country_name" type="text" value="{{$country->country_name}}" class="form-control ">
            @error('country_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Country Code
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="country_code" type="text" value="{{$country->country_code}}" class="form-control ">
            @error('country_code')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dial Code
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="dial_code" type="text" value="{{$country->dial_code}}" class="form-control ">
            @error('dial_code')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Currency Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="currency_name" type="text" value="{{$country->currency_name}}" class="form-control ">
            @error('currency_name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Currency Symbol
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="currency_symbol" type="text" value="{{$country->currency_symbol}}" class="form-control ">
            @error('currency_symbol')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Currency Code
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="currency_code" type="text" value="{{$country->currency_code}}" class="form-control ">
            @error('currency_code')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Country Status
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="country_status" class="form-control" id="">
                <option value="{{$country->country_status}}">{{$country->country_status}}</option>
                @foreach($status as $status)
                    <option value="{{$status->status_id}}">{{$status->status_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-8">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>

@endsection