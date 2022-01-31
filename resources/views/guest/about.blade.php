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

<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('public/users/images/about.jpg')}});">
                <a href="https://www.youtube.com/watch?v=G2Rf4aiNOTA" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                    <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
      <div class="heading-section heading-section-wo-line mb-5 pl-md-5">
          <div class="pl-md-5 ml-md-5">
              <span class="subheading">Company Overview</span>
            <h2 class="mb-4">Learned about {{config('app.name')}}</h2>
        </div>
      </div>
      <div class="pl-md-5 ml-md-5 mb-5">
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would 
                        have been rewritten a thousand times and everything that was left from its origin would be the word "and" 
                        and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy 
                        said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, 
                        made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                    <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her 
                        hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.
                         Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection