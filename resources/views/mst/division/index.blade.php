@extends('layouts.layout')

@section('title')
    Division/State
@endsection
@section('content_title')
<h2>Division List</h2>
<ul class="nav navbar-right panel_toolbox">
    <a href="{{url('/admin/division/create')}}">Add Division/State</a>
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
            <th>Local Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;?>
        @foreach($division as $division)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$division->country_name}}</td>
            <td>{{$division->division_name}}</td>
            <td>{{$division->local_name}}</td>
            <td>
                @if($division->division_status == 1)
                    <form action="{{url('admin/division')}}/{{$division->division_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Click for Inactive" class="btn text-success">Activated</button>
                    </form>
                @else
                    <form action="{{url('admin/division')}}/{{$division->division_id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn text-danger" title="Click for Active">Inactivated</button>
                    </form>
                @endif
            </td>
            <td>
                <div class="row">
                    <a class="btn" href="{{url('admin/division/')}}/{{$division->division_id}}/edit" title="Click For Edit"><i class="fa fa-edit"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection