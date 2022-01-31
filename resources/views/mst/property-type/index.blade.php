@extends('layouts.layout')
@section('title')
    Property Type
@endsection
@section('content_title')
<h2>Property Type</h2>
<ul class="nav navbar-right panel_toolbox">
    <a href="{{url('/admin/property-type/create')}}">Add New Property Type</a>
</ul>
@endsection
@section('content')

@include('flash-message')
<table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
    <thead>
        <tr>
            <th>SL</th>
            <th>Property Type Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;?>
        @foreach($property as $property_type)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$property_type->property_type_name}}</td>
            <td>
                @if($property_type->property_type_status == 1)
                
                    <form action="{{url('admin/property-type/')}}/{{$property_type->property_type_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  title="Click for Inactive" class="btn text-success ">Activated</button>
                    </form>
                @else
                    <form action="{{url('admin/property-type/')}}/{{$property_type->property_type_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  title="Click for Active" class="btn text-danger ">Inactivated</button>
                    </form>
                @endif
            </td>
            <td>
                <div class="row">
                    <a class="btn" href="{{url('admin/property-type/')}}/{{$property_type->property_type_id}}/edit" title="Click for Edit"><i class="fa fa-edit"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection