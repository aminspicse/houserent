@extends('guest.layout')

@section('title')
	Home::{{config('app.name')}}
@endsection
@section('slider')
<section class="home-slider owl-carousel">
    @foreach($toppost as $slid)
    <div class="slider-item" style="background-image:url({{url('public/storage/image'.$slid->image)}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
                <div class="col-md-6 text p-4 ftco-animate">
                    <h1 class="mb-3">{{$slid->title}}</h1>
                    <span class="location d-block mb-3"><i class="icon-my_location"></i> {{$slid->address}}</span>
                    <p>{{substr($slid->details,0,200)}}</p>
                    <span class="price">{{$slid->currency_symbol.''.$slid->price}}</span>
                    <a href="{{url('property-single'.'/'.$slid->post_id)}}" class="btn-custom p-3 px-4 bg-primary">View Details <span
                            class="icon-plus ml-1"></span></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
@endsection

@section('search')
    <section class="ftco-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12 search-wrap">
                    <!--
                    <h2 class="heading h5 d-flex align-items-center pr-4"><span class="ion-ios-search mr-3"></span>
                        Search Property</h2> -->
                    <form action="{{url('search')}}" method="get" class="search-property">
                        @csrf
                        <input type="text" name="keyword" placeholder="Search Heare" class="form-control">
                        <!--
                        <div class="row">
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Keyword</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="icon-pencil"></span></div>
                                        <input type="text" class="form-control" placeholder="Keyword">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Location</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="icon-location_city"></span></div>
                                        <input type="text" class="form-control" placeholder="City/Locality Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Property Type</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                @foreach($property_type as $type)
                                                    <option value="{{$type->property_type_id}}">{{$type->property_type_name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Property Status</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Type</option>
                                                <option value="">Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Agents</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Any</option>
                                                <option value="">Jonh Doe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Min Beds</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Min Bathroom</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Min Price</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Min Price</option>
                                                <option value="">$1,000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Min Price</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Min Price</option>
                                                <option value="">$5,000</option>
                                                <option value="">$10,000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Min Size <span>(sq ft)</span></label>
                                    <div class="form-field">
                                        <div class="icon"><span class="icon-pencil"></span></div>
                                        <input type="text" class="form-control" placeholder="Min Size">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Max Size <span>(sq ft)</span></label>
                                    <div class="form-field">
                                        <div class="icon"><span class="icon-pencil"></span></div>
                                        <input type="text" class="form-control" placeholder="Max Size">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-self-end">
                                <div class="form-group">
                                    <div class="form-field">
                                        <input type="submit" value="Search" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('content')
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon"><span class="flaticon-pin"></span></div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Find Appertment Anywhere In The World</h3>
                        
                        <p>Find Your Dream House/ Apertment Any where with more effecent way.</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon"><span class="flaticon-detective"></span></div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">We Have Agents With Experience</h3>
                        <p>We Have Many area based Agents With Experience in Construction and House Rent.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-sel Searchf-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon"><span class="flaticon-house"></span></div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Buy &amp; Rent Modern Properties</h3>
                        <p>You Can Rent, Buy and sale your house/properties it is free of cost now.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon"><span class="flaticon-purse"></span></div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Make Payment Your Properties</h3>
                        <p>You can payment by House Rent Solution. HRS accept BKash, Paypel, Master Card.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-properties">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Recent Properties</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="properties-slider owl-carousel ftco-animate">
                    @foreach($recent as $rc)
                    <div class="item">
                        <div class="properties">
                            <a href="#" class="img d-flex justify-content-center align-items-center"
                                style="background-image: url({{url('public/storage/image'.$rc->image)}})">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <span class="status sale">{{$rc->property_for_name}}</span>
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="{{url('property-single'.'/'.$rc->post_id)}}"> {{substr($rc->title,0,24)}}.. </a></h3>
                                        <p>{{$rc->property_type_name}}</p>
                                    </div>
                                    <div class="two">
                                        <span class="price">{{$rc->currency_symbol.$rc->price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <!-- <span class="subheading">Special Offers</span> -->
                <h2 class="mb-4">Most Recommended Properties</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            @foreach($recomanded as $rec)
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="properties">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                        style="background-image: url({{url('public/storage/image'.$rec->image)}});">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <span class="status sale">{{$rec->property_for_name}}</span>
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="{{url('property-single'.'/'.$rec->post_id)}}">{{substr($rec->title,0,18)}}..</a></h3>
                                <p>{{$rec->property_type_name}}</p>
                            </div>
                            <div class="two">
                                <span class="price">{{$rec->currency_symbol.$rec->price}}</span>
                            </div>
                        </div>
                        <p>{{substr($rec->details,0,65)}}...</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="flaticon-selection"></i>{{$rec->area}}</span>
                            <span class="ml-auto"><i class="flaticon-bathtub"></i> 3</span>
                            <span><i class="flaticon-bed"></i> 4</span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter"
    style="background-image: url({{asset('public/users/images/bg_1.jpg')}});">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <h2 class="mb-4">User's Summary</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{$user_total}}">0</strong>
                                <span>Happy User</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{$active_post}}">0</strong>
                                <span>Properties</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="{{$agent_cnt}}">0</strong>
                                <span>Agents</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <!-- <strong class="number" data-number="{{$active_country}}">0</strong>
                                <span>Active Country</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ftco-animate">
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                            @foreach($user as $us)
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4"
                                        style="background-image: url({{asset('public/storage/image/').$us->picture}})">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">{{$us->testimonial}}</p>
                                        <p class="name">{{$us->name}}</p>
                                        <span class="position">{{$us->role_name}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Read Articles</span>
                <h2>Recent Blog</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20"
                        style="background-image: url('{{asset('public/users/images/image_1.jpg')}}');">
                    </a>
                    <div class="text mt-3 d-block">
                        <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                                blind texts</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">Dec 6, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20"
                        style="background-image: url('{{asset('public/users/images/image_2.jpg')}}');">
                    </a>
                    <div class="text mt-3">
                        <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                                blind texts</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">Dec 6, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20"
                        style="background-image: url('{{asset('public/users/images/image_3.jpg')}}');">
                    </a>
                    <div class="text mt-3">
                        <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                                blind texts</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">Dec 6, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20"
                        style="background-image: url('{{asset('public/users/images/image_4.jpg')}}');">
                    </a>
                    <div class="text mt-3">
                        <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                                blind texts</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">Dec 6, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
@endsection