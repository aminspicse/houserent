<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href ="{{asset('public/icon/icon.jpg')}}" type = "image/x-icon">
    <title>
        @yield('title'):
        {{ config('app.name', 'HRentSolution') }}
    </title>

 <!-- Bootstrap -->
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Bootstrap -->
    <link href="{{ asset('public/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- iCheck -->
    <link href="{{ asset('public/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- Datatables -->
    
    <link href="{{ asset('public/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('public/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('public/admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('public/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('public/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet" />

    
    <!-- Custom Theme Style -->
    <link href="{{ asset('public/admin/build/css/custom.css')}}" rel="stylesheet">
    
</head>

<body class="nav-md" >
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href=" " class="site_title">
                            <span>{{config('app.name')}}</span></a>
                    </div>
                    
                    <div class="clearfix"></div>
                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            @if(Auth::user()->role_id == 1)
                                <!-- Admin Option -->
                                <h3>Admin</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-dashboard"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-database"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/admin/country')}}">Country</a></li>
                                            <li><a href="{{url('/admin/division')}}">Division</a></li>
                                            <li><a href="{{url('/admin/district')}}">District</a></li>
                                            <li><a href="{{url('/admin/upazila')}}">Upazila</a></li>
                                            <li><a href="{{url('/admin/union')}}">Union</a></li>
                                            <li><a href="{{url('/admin/property-type')}}">Property Type</a></li>
                                            <li><a href="{{url('/admin/property-for')}}">Property For</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> Manage Post <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/admin/pending-post')}}">Pending Post</a></li>
                                            <li><a href="{{url('/admin/active-post')}}">Active Post</a></li>
                                            <li><a href="{{url('/admin/inactive-post')}}">Inactive Post</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-home"></i> Posts <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('post/create')}}">Create Post</a></li>
                                            <li><a href="{{url('post/')}}">My Post</a></li>
                                        </ul>
                                    </li>
                                    
                                    
                                </ul>
                            @elseif(Auth::user()->role_id == 2)
                                <!-- Agent Option -->
                                <h3>Agent</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> Post <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/post/create')}}">Create Post</a></li>
                                            <li><a href="{{url('post/')}}">My Post</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            @elseif(Auth::user()->role_id == 3)
                                <!-- User Option -->
                                <h3>User</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> Posts <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/post/create')}}">Create Post</a></li>
                                            <li><a href="{{url('post/')}}">My Post</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            @endif
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav fixed-top">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{url(Auth::user()->picture)}}" alt="">{{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('/profile')}}"> Profile</a>
                                    <a class="dropdown-item" href="{{url('/activity')}}">
                                        <span class="badge bg-red pull-right"></span>
                                        <span>Activity</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i>
                                        {{ __('Logout') }}

                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <style>
                .contenttop {
                    margin-top: 50px;
                }
            </style>
            <div class="right_col" role="main">
                <div class="contenttop">
                   
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    @yield('content_title')
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                     @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- jQuery -->
  <script src="{{ asset('public/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('public/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{ asset('public/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{ asset('public/admin/vendors/nprogress/nprogress.js')}}"></script>
  <!-- iCheck -->
  <script src="{{ asset('public/admin/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Datatables -->
  <script src="{{ asset('public/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{ asset('public/admin./vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- bootstrap-daterangepicker -->
    <script src="{{ asset('public/admin/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('public/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <!-- Custom Theme Scripts -->
  <script src="{{ asset('public/admin/build/js/custom.min.js')}}"></script>
    <script>
        jQuery(document).ready(function(){
        jQuery('#country').change(function(){
            let cid = jQuery(this).val();
            jQuery.ajax({
                //url: '/houserent/getdivision', 
                url: "{{url('getdivision')}}", 
                type: 'post',
                data: 'cid='+cid+'&_token={{csrf_token()}}',
                success: function(result){
                    jQuery('#state').html(result);
                }
            });
        });

        jQuery('#state').change(function(){
            let sid = jQuery(this).val();
            jQuery.ajax({
                url: "{{url('getdistrict')}}",
                type: 'post',
                data: 'sid='+sid+'&_token={{csrf_token()}}',
                success: function(result){
                    jQuery('#district').html(result);
                }
            });
        });

        jQuery('#district').change(function(){
            let dist = jQuery(this).val();
            jQuery.ajax({
                url: "{{url('getthana')}}",
                type: 'post',
                data: 'dist='+dist+'&_token={{csrf_token()}}',
                success: function(result){
                    jQuery('#thana').html(result);
                }
            });
        });

        jQuery('#thana').change(function(){
            let tna = jQuery(this).val();
            jQuery.ajax({
                url: "{{url('getunion')}}",
                type: 'post',
                data: 'tna='+tna+'&_token={{csrf_token()}}',
                success: function(result){
                    jQuery('#union').html(result);
                }
            });
        });
     });
    </script>
</body>

</html>