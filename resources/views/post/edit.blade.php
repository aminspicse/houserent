@extends('layouts.layout')

@section('title')
    Edit Post
@endsection
@section('content_title')
    <h2>Edit Post: {{$post->title}}</h2>
@endsection
@section('content')


<form action="{{url('post'.'/'.$post->post_id)}}" method="post" enctype="multipart/form-data" id="demo-form2"
    data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Title/House Name
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input name="title" type="text" value="{{$post->title}}" placeholder="Ex: Amin Villa" class="form-control">
            @error('title')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Country
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="country_id" id="country" class="form-control">
                <option value="{{$post->country_id}}">{{$post->country_name}}</option>
                <option>Select Country</option>
                @foreach($country as $cnt)
                <option value="{{$cnt->country_id}}">{{$cnt->country_name}} ({{$cnt->country_code}})</option>
                @endforeach
            </select>
            @error('country_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">State/Division
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="division_id" id="state" class="form-control">
                <option value="{{$post->division_id}}">{{$post->division_name}}</option>
                <option>Select State/Division</option>
            </select>
            @error('division_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">District
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="district_id" id="district" class="form-control">
                <option value="{{$post->district_id}}">{{$post->district_name}}</option>
                <option>Select District</option>
            </select>
            @error('district_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Thana/Upozila
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="upazila_id" id="thana" class="form-control">
                <option value="{{$post->upazila_id}}">{{$post->upazila_name}}</option>
                <option>Select Thana/Upazila</option>
            </select>
            @error('upazila_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Union/City
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="union_id" id="union" class="form-control">
                <option value="{{$post->union_id}}">{{$post->union_name}}</option>
                <option>Select Union/City</option>
            </select>
            @error('union_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Address <span
                class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="address" value="{{$post->address}}" placeholder="Ex: Amin Villa, Road: 01, Taltola, Sylhet-3100" class="form-control">
            @error('address')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Area/Yaton</label>
        <div class="col-md-6 col-sm-6 ">
            <input name="area" value="{{$post->area}}" placeholder="Ex: 1200 Square Feet" class="form-control" type="text">
            @error('area')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Number of
            Bedroom</label>
        <div class="col-md-6 col-sm-6 ">
            <input name="nm_bedroom" value="{{$post->nm_bedroom}}" placeholder="Ex: 5" class="form-control" type="text">
            @error('nm_bedroom')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Number of Bath
            Room</label>
        <div class="col-md-6 col-sm-6 ">
            <input name="nm_bathroom" value="{{$post->nm_bathroom}}" placeholder="Ex: 2" class="form-control" type="text">
            @error('nm_bathroom')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Number of Garage</label>
        <div class="col-md-6 col-sm-6 ">
            <input name="nm_garage" value="{{$post->nm_garage}}" placeholder="Ex: 01" class="form-control" type="text">
            @error('nm_garage')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Property/House Type
          </label>
        <div class="col-md-6 col-sm-6 ">
        <select name="property_type" id="" class="form-control">
            <option value="{{$post->property_type}}">{{$post->property_type_name}}</option>
            <option>Select Property/House Type</option>
            @foreach($propertyType as $ptype)
                <option value="{{$ptype->property_type_id}}">{{$ptype->property_type_name}}</option>
            @endforeach
        </select>   
        @error('property_type')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Advertizement For
          </label>
        <div class="col-md-6 col-sm-6 ">
        <select name="add_for" id="" class="form-control">
            <option value="{{$post->property_for}}">{{$post->property_for_name}}</option>
            <option>Select Advertizement For</option>
            @foreach($propertyFor as $pfor)
                <option value="{{$pfor->for_id}}">{{$pfor->for_name}}</option>
            @endforeach
        </select>   
            @error('add_for')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Price/Amount
          </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="price" value="{{$post->price}}" class="form-control" placeholder="Ex: 50000">
            @error('price')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Details</label>
        <div class="col-md-6 col-sm-6 ">
            
            <textarea name="details" class="form-control" cols="30" rows="2" placeholder="Details">{{$post->details}}</textarea>
            @error('details')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <!--
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
        <div class="col-md-6 col-sm-6 ">
            <input name="photo" value="{{$post->image}}" class="form-control" type="file">
            @error('photo')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Video</label>
        <div class="col-md-6 col-sm-6 ">
            <input name="video" value="{{$post->video}}" class="form-control" type="text">
        </div>
    </div>
-->
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-7">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>

</form>

@endsection