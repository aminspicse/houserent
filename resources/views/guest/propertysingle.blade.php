@extends('guest.layout')

@section('title')
{{$post->title}}
@endsection
@section('slider')
<div class="hero-wrap" style="background-image: url('{{asset('public/users/images/bg_1.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
                <h1 class="mb-3 bread">Property Single</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<style>
    .ftco-search {
        display: none;
    }
</style>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="single-slider owl-carousel">
                            <div class="item">
                                <div class="properties-img"
                                    style="background-image: url({{url('public/storage/image').$post->image}});">
                                </div>
                            </div>
                            <!--
                            <div class="item">
                                <div class="properties-img"
                                    style="background-image: url({{asset('public/users/images/properties-2.jpg')}});">
                                </div>
                            </div>
                            <div class="item">
                                <div class="properties-img"
                                    style="background-image: url({{asset('public/users/images/properties-3.jpg')}});">
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                    <div class="col-md-12 Properties-single mt-4 mb-5 ftco-animate">
                        <h2>{{$post->title}}</h2>
                        <p class="rate mb-4">
                            <span class="loc"><a href="#"><i class="icon-map"></i>{{$post->address}}</a></span>
                            <span class="loc"><a href="#"><i class=""></i>Post By: {{$post->user_name}}</a></span>
                        </p>
                        <p>{{$post->details}}</p>
                        <div class="d-md-flex mt-5 mb-5">
                            <ul>
                                <li><span>Lot Area: </span>{{$post->area}}</li>
                                <li><span>Bed Rooms: </span>{{$post->nm_bedroom}}</li>
                                <li><span>Bath Rooms: </span> {{$post->nm_bathroom}}</li>
                                <li><span>Garage: </span>{{$post->nm_garage}}</li>
                                <li><span>Price: </span>{{$post->price}}</li>
                            </ul>
                            <ul class="ml-md-5">
                                
                                <li><span>Property For: </span> {{$post->property_for_name}}</li>
                                <li><span>Property Type: </span> {{$post->property_type_name}}</li>
                                <li><span>Stories: </span> 1</li>
                                <li><span>Roofing: </span> New</li>
                                
                            </ul>
                        </div>
                        <p></p>
                    </div>
                    <div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
                        <h3 class="mb-4">Take A Tour</h3>
                        <!--
                        <div class="block-16">
                            <figure>
                                <img src="{{asset('public/users/images/properties-6.jpg')}}" alt="Image placeholder"
                                    class="img-fluid">
                                <a href="https://www.youtube.com/watch?v=33b6VZuvHF0" class="play-button popup-vimeo"><span
                                        class="icon-play"></span></a>
                            </figure>
                        </div>
                        -->
                        <iframe width="100%"
                        height="500px"
                        src="{{$post->video}}">
                        </iframe> 
                    </div>

                    <div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
                        <h4 class="mb-4">Review &amp; Ratings</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" class="star-rating">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star"></i> 100 Ratings</span></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star-o"></i> 30 Ratings</span></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star"></i><i class="icon-star-o"></i><i
                                                        class="icon-star-o"></i> 5 Ratings</span></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                        class="icon-star-o"></i> 0 Ratings</span></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i
                                                        class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                        class="icon-star-o"></i> 0 Ratings</span></p>
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 properties-single ftco-animate mb-5 mt-5">
                        <h4 class="mb-4">Related Properties</h4>
                        <div class="row">
                            @foreach($related as $reco)
                            <div class="col-md-6 ftco-animate">
                                <div class="properties">
                                    <a href="property-single.html"
                                        class="img img-2 d-flex justify-content-center align-items-center"
                                        style="background-image: url({{asset('public/storage/image/'.$reco->image)}});">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <span class="status sale">{{$reco->property_for_name}}</span>
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="{{url('property-single').'/'.$reco->post_id}}">{{$reco->title}}</a></h3>
                                                <p>{{$reco->property_type_name}}</p>
                                            </div>
                                            <div class="two">
                                                <span class="price">{{$reco->currency_symbol.$reco->price}}</span>
                                            </div>
                                        </div>
                                        <p>{{substr($reco->details,0,65)}}</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span><i class="flaticon-selection"></i> {{$reco->area}}</span>
                                            <span class="ml-auto"><i class="flaticon-bathtub"></i> {{$reco->nm_bathroom}}</span>
                                            <span><i class="flaticon-bed"></i> {{$reco->nm_bedroom}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box">
                    <form action="{{url('search')}}" class="search-form">
                        @csrf
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" name="keyword" class="form-control" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Categories</h3>
                        @foreach($property_type as $category)
                            <li><a href="#">{{$category->property_type_name}} <span>({{$category->total_active}})</span></a></li>
                        @endforeach
                        
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Recent Blog</h3>
                    @foreach($recent as $rc)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4"
                            style="background-image: url({{asset('public/storage/image').'/'.$rc->image}});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="{{url('property-single').'/'.$rc->post_id}}">{{$rc->title}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> {{$rc->created_at}}</a></div>
                                <div><a href="#"><span class="icon-person"></span> {{$rc->user_name}}</a></div>
                                <!-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Tag</h3>
                    <div class="tagcloud">
                        <!--
                        <a href="#" class="tag-cloud-link">dish</a>
                        <a href="#" class="tag-cloud-link">menu</a>
                        <a href="#" class="tag-cloud-link">food</a>
                        <a href="#" class="tag-cloud-link">sweet</a>
                        <a href="#" class="tag-cloud-link">tasty</a>
                        <a href="#" class="tag-cloud-link">delicious</a>
                        <a href="#" class="tag-cloud-link">desserts</a>
                        <a href="#" class="tag-cloud-link">drinks</a>
                        -->
                        <p class="text-danger">Under Developement</p>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Paragraph</h3>
                    <p class="text-danger">Under Developement</p>
                    <!--
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                        voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                        similique, inventore eos fugit cupiditate numquam!</p>
                    -->
                </div>
            </div>
        </div>
    </div>
</section> <!-- .section -->

@endsection