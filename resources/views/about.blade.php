@extends('layouts.master')

@section('content')


    <!-- TENTANG PINTASKU  -->
    <section class="welcome-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-7 col-lg-7 col-md-12">
         <div class="welcome-left">
            <h5 class="heading-title">Who We Are</h5>
                <h2 class="heading-title-default">Pintasku a fledged <span>hosting provider</span>
                   working successfully for last 12 years.
                </h2>
                <div class="heading-text clearfix">
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                   <p>aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.</p>
                </div>
                <div class="heading-image">
                   <img src="{{asset('assets/img/logo/signature.png')}}" class="attachment-large size-large" alt="">                                          
                </div>
                <div class="heading-sub clearfix">
                   <h3>KH. Lagos</h3>
                   <span>CEO at Pintasku</span>
                </div>
         </div>
         </div>
         <div class="col-xl-5 col-lg-5 col-md-12">

            <div class="about-slider-wrapper">
               <div class="about-slider">
                    <div class="slider-item">
                       <img src="assets/img/slider-img/about-imag2.jpg" alt="">                 
                    </div>
                    <div class="slider-item ">
                       <img src="assets/img/slider-img/about2.jpg" alt="">                   
                    </div>
                    <div class="slider-item">
                       <img src="assets/img/slider-img/about-imag2.jpg" alt="">                   
                    </div>
               </div>
              
            </div>
         </div>
      </div>
   </div>
</section>



<!-- TENTANG PINTASKU END-->

<!--BRANDE AREA -->
<section class="brand-area brand-2">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="brand-inner">
                <div class="owl-carousel all-brand-carsouel">
                    
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="{{asset('assets/img/brand-logo/vuejs.png')}}" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="{{asset('assets/img/brand-logo/angularjs.png')}}" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="{{asset('assets/img/brand-logo/nodejs.png')}}" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="{{asset('assets/img/brand-logo/flutter.png')}}" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="{{asset('assets/img/brand-logo/android.png')}}" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="{{asset('assets/img/brand-logo/redis.png')}}" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="{{asset('assets/img/brand-logo/laravel.png')}}" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="{{asset('assets/img/brand-logo/adonis.png')}}" alt="brand-icon">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
            
    </div>
</section>
<!--BRANDE AREA END -->

@endsection