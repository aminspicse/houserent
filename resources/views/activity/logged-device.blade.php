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
@foreach($activity as $ac)
<div class="row" style="boder: 1px;">
    <p>{{$ac->user_agent}} at {{date("Y-m-d H:i:s", $ac->last_activity)}}</p>
    <p>{{base64_decode($ac->payload)}}</p>
</div>
@endforeach
@endsection