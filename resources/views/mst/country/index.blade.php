@extends('layouts.layout')

@section('title')
    Country List
@endsection
@section('content_title')
<h2>Country List</h2>
<ul class="nav navbar-right panel_toolbox">
    <a href="{{url('/admin/country/create')}}">Add New Country</a>
</ul>
@endsection
@section('content')

@include('flash-message')
<table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
    <thead>
        <tr>
            <th>SL</th>
            <th>Country</th>
            <th>Country Code</th>
            <th>Dial Code</th>
            <th>Currency Name</th>
            <th>Currency Symbol</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;?>
        @foreach($country as $country)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$country->country_name}}</td>
            <td>{{$country->country_code}}</td>
            <td>{{$country->dial_code}}</td>
            <td>{{$country->currency_name}}</td>
            <td>{{$country->currency_symbol}}</td>
            <td>
                @if($country->country_status == 1)
                
                    <form action="{{url('admin/country/')}}/{{$country->country_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Click for Inactive" class="btn text-success">Activated</button>
                    </form>
                @else
                    <form action="{{url('admin/country/')}}/{{$country->country_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn text-danger" title="Click for Active">Inactivated</button>
                    </form>
                @endif
            </td>
            <td>
                <div class="row">
                    <a class="btn" href="{{url('admin/country/')}}/{{$country->country_id}}/edit" title="Click for Edit"><i class="fa fa-edit"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection