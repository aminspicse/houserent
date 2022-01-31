@extends('layouts.layout')
@section('title')
    Property For
@endsection
@section('content_title')
<h2>Property For</h2>
<ul class="nav navbar-right panel_toolbox">
    <a href="{{url('/admin/property-for/create')}}">Add New Property For</a>
</ul>
@endsection
@section('content')

@include('flash-message')
<table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
    <thead>
        <tr>
            <th>SL</th>
            <th>Property For Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;?>
        @foreach($propertyFor as $property_for)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$property_for->for_name}}</td>
            <td>
                @if($property_for->for_status == 1)
                
                    <form action="{{url('admin/property-for/')}}/{{$property_for->for_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  title="Click for Inactive" class="btn text-success ">Activated</button>
                    </form>
                @else
                    <form action="{{url('admin/property-for/')}}/{{$property_for->for_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  title="Click for Active" class="btn text-danger ">Inactivated</button>
                    </form>
                @endif
            </td>
            <td>
                <div class="row">
                    <a class="btn" href="{{url('admin/property-for/')}}/{{$property_for->for_id}}/edit" title="Click for Edit"><i class="fa fa-edit"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection