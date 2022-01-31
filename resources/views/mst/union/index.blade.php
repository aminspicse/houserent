@extends('layouts.layout')
@section('title')
    Union
@endsection
@section('content_title')
<h2>Union List</h2>
<ul class="nav navbar-right panel_toolbox">
    <a href="{{url('/admin/union/create')}}">Add Union</a>
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
            <th>Union </th>
            <th>Local Name </th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;?>
        @foreach($union as $union)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$union->country_name}}</td>
            <td>{{$union->division_name}}</td>
            <td>{{$union->district_name}}</td>
            <td>{{$union->upazila_name}}</td>
            <td>{{$union->union_name}}</td>
            <td>{{$union->local_name}}</td>
            <td>
                @if($union->union_status == 1)
                    <form action="{{url('admin/union/')}}/{{$union->union_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Click for Inactive" class="btn text-success ">Activated</button>
                    </form>
                @else
                    <form action="{{url('admin/union/')}}/{{$union->union_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Click for Active" class="btn text-danger ">Inactivated</button>
                    </form>
                @endif
            </td>
            <td>
                <div class="row">
                    <a class="btn" href="{{url('admin/union/')}}/{{$union->union_id}}/edit" title="Click for Edit"><i class="fa fa-edit"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection