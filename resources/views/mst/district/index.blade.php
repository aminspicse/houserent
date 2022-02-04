@extends('layouts.layout')
@section('title')
District
@endsection
@section('content_title')
<h2>District List</h2>
<ul class="nav navbar-right panel_toolbox">
    <a href="{{url('/admin/district/create')}}">Add District</a>
</ul>
@endsection
@section('content')

@include('flash-message')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">District List <a href="{{url('/admin/district/create')}}">Add New District</a></h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Country</th>
                        <th scope="col">Division/State </th>
                        <th scope="col">District </th>
                        <th scope="col">Local Name </th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($district as $district)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$district->country_name}}</td>
                        <td>{{$district->division_name}}</td>
                        <td>{{$district->district_name}}</td>
                        <td>{{$district->local_name}}</td>
                        <td>
                            @if($district->district_status == 1)
                            <form action="{{url('admin/district/')}}/{{$district->district_id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Click for Inactive"
                                    class="btn text-success">Activated</button>
                            </form>
                            @else
                            <form action="{{url('admin/district/')}}/{{$district->district_id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Click for Active"
                                    class="btn text-danger">Inactivated</button>
                            </form>
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <a class="btn" href="{{url('admin/district/')}}/{{$district->district_id}}/edit"
                                    title="Click for Edit"><i class="fa fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
        </div>
    </div>
</div>
@endsection