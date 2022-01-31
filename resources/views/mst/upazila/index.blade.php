@extends('layouts.layout')
@section('title')
    Upazila
@endsection
@section('content_title')
<h2>Upazila List</h2>
<ul class="nav navbar-right panel_toolbox">
    <a href="{{url('/admin/upazila/create')}}">Add Upazila</a>
</ul>
@endsection
@section('content')

@include('flash-message')
<table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
    <thead>
        <tr>
            <th>SL</th>
            <th>Country</th>
            <th>Division/State </th>
            <th>District </th>
            <th>Upazila </th>
            <th>Local Name </th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;?>
        @foreach($upazila as $upazila)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$upazila->country_name}}</td>
            <td>{{$upazila->division_name}}</td>
            <td>{{$upazila->district_name}}</td>
            <td>{{$upazila->upazila_name}}</td>
            <td>{{$upazila->local_name}}</td>
            <td>
                @if($upazila->upazila_status == 1)
                    <form action="{{url('admin/upazila/')}}/{{$upazila->upazila_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Click for Inactive" class="btn text-success">Activated</button>
                    </form>
                @else
                    <form action="{{url('admin/upazila/')}}/{{$upazila->upazila_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Click for Active" class="btn text-danger">Inactivated</button>
                    </form>
                @endif
            </td>
            <td>
                <div class="row">
                    <a class="btn" href="{{url('admin/upazila/')}}/{{$upazila->upazila_id}}/edit" title="Click for Edit"><i class="fa fa-edit"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection