@extends('layouts.layout')

@section('title')
    Country List
@endsection

@section('content')

@include('flash-message')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Country List <a href="{{url('/admin/country/create')}}">Add New Country</a></h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Country</th>
                        <th scope="col">Country Code</th>
                        <th scope="col">Dial Code</th>
                        <th scope="col">Currency Name</th>
                        <th scope="col">Currency Symbol</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
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
                                <button type="submit" title="Click for Inactive"
                                    class="btn text-success">Activated</button>
                            </form>
                            @else
                            <form action="{{url('admin/country/')}}/{{$country->country_id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger"
                                    title="Click for Active">Inactivated</button>
                            </form>
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <a class="btn" href="{{url('admin/country/')}}/{{$country->country_id}}/edit"
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