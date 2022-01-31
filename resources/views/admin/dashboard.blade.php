@extends('layouts.layout')

@section('title')
    Dashboard
@endsection
@section('content')
<style>
    .border-left{
        border-left: dotted;
    }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="col-md-2 col-sm-2 col-lg-2 border-left">
            <h5><i class="fa fa-user"></i> Total User</h5>
            <h3 class="">{{$total_user}}</h3>
        </div>
        <div class="col-md-2 col-sm-2 col-lg-2 border-left">
            <h5 ><i class="fa fa-user"></i> Total Admin</h5>
            <h3 class="">{{$admin_cnt}}</h3>
        </div>
        <div class="col-md-2 col-sm-2 col-lg-2 border-left">
            <h5 ><i class="fa fa-user"></i> Total Agent</h5>
            <h3 class="">{{$agent_cnt}}</h3>
        </div>
        <div class="col-md-2 col-sm-2 col-lg-2 border-left">
            <h5 ><i class="fa fa-user"></i> General User</h5>
            <h3 class="">{{$user_cnt}}</h3>
        </div>
        <div class="col-md-2 col-sm-2 col-lg-2 border-left">
            <h5 ><i class="fa fa-user"></i> Active User</h5>
            <h3 class="">{{$active_user}}</h3>
        </div>
        <div class="col-md-2 col-sm-2 col-lg-2 border-left">
            <h5 ><i class="fa fa-user"></i> Total Post</h5>
            <h3 class="">{{$active_post}}</h3>
        </div>
    </div>
</div>
@endsection