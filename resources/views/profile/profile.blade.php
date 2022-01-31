@extends('layouts.layout')

@section('title')
    Profile
@endsection
@section('content_title')
    <div class="title_left">
        <h4>Profile</h4>
    </div>
    <div class="title_right">
    </div>
@endsection
@section('content')

<div class="col-md-3 col-sm-3  profile_left">
    <div class="profile_img">
        <div id="crop-avatar">
            <!-- Current avatar -->
            <img width="220px" height="220px" class="img-responsive avatar-view" src="{{asset('public/storage/image/'.Auth::user()->picture)}}" alt="Avatar"
                title="Change the avatar">
        </div>
    </div>
    <h3>{{Auth::user()->name}}</h3>

    <ul class="list-unstyled user_data">
        <li><i class="fa fa-map-marker user-profile-icon"></i> {{Auth::user()->address}}
        </li>
        <!--
        <li>
            <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
        </li> 
        -->

       
    </ul>

    <a href="{{asset('edit-profile')}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
    <br />

    <!-- start skills -->
    <!--
    <h4>Skills</h4>
    <ul class="list-unstyled user_data">
        <li>
            <p>Web Applications</p>
            <div class="progress progress_sm">
                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50">
                </div>
            </div>
        </li>
        <li>
            <p>Website Design</p>
            <div class="progress progress_sm">
                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70">
                </div>
            </div>
        </li>
        <li>
            <p>Automation & Testing</p>
            <div class="progress progress_sm">
                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30">
                </div>
            </div>
        </li>
        <li>
            <p>UI / UX</p>
            <div class="progress progress_sm">
                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50">
                </div>
            </div>
        </li>
    </ul>
-->
    <!-- end of skills -->

</div>
<div class="col-md-9 col-sm-9 ">

    <div class="profile_title">
        <div class="col-md-6">
            <h2>Activity Report</h2>
        </div>
        <div class="col-md-6">
            <div id="reportrange" class="pull-right"
                style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                <!-- <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b> -->
            </div>
        </div>
    </div>
    <!-- start of user-activity-graph -->
    <div class="col-md-12" id="graph_bar" >
        @foreach($session as $session)
            <div class="row">
            <h5>{{$session->user_agent}} 
                {{date("l, d-F-Y H:i:s A T ", $session->last_activity)}}
                <a href="{{url('logout-other-device').'/'.$session->id}}">Logout</a>
            
            </h5>
            </div>
        @endforeach
    </div>
    <!-- end of user-activity-graph -->

</div>

@endsection