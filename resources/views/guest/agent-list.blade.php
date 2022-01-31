@extends('guest.layout')
@section('title')

Property
@endsection
@section('slider')
<div class="hero-wrap" style="background-image: url('{{asset('public/users/images/bg_1.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">About</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @foreach($agents as $agent)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div
                        class="img"
                        style="background-image: url({{asset('public/storage/image/').$agent->picture}});"
                    ></div>
                    <div class="text pt-4">
                        <h3><a href="#">{{$agent->name}}</a></h3>
                        <span class="position mb-2">4 Listing</span>
                        <p>
                            I am an ambitious workaholic, but apart from that,
                            pretty simple person.
                        </p>
                        <ul class="ftco-social d-flex">
                            <li class="ftco-animate">
                                <a href="#"
                                    ><span class="icon-twitter"></span
                                ></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"
                                    ><span class="icon-facebook"></span
                                ></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"
                                    ><span class="icon-google-plus"></span
                                ></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"
                                    ><span class="icon-instagram"></span
                                ></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                    {!! $agents->links() !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection