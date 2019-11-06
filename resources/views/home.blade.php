@extends('layouts.master')

@section('content')
<!-- HOMEPAGE-1 SLIDER -->
<!--/ Slider Inner -->
@include('layouts.slider')
<!--/ End Slider Inner -->

<!--CEK DOMAIN-->
<section class="domain-area ">
    <div class="container domain-inner">
        <h3 class="domain-head">Looking for domain name?</h3>
        <div class="row domain-checkup">
            <form id="digita-contact-form" action="{{asset('assets/php/contact-mail.php')}}" method="POST">
                <div class="domain-checkup-left">
                    <div class="input-field-row">
                        <input type="text" class="domain-input" placeholder="Enter your domain here">
                        <select class="nice-select" name="option">
                            <option value="">.com</option>
                            <option value="">.net</option>
                            <option value="">.net</option>
                            <option value="">.net</option>
                            <option value="">.net</option>
                        </select>
                    </div>
                </div>
                <div class="domain-checkup-right">
                    <button>
                        
                        <img src="{{asset('assets/img/icons/search-icon.png')}}" alt="Search icon">
                        Search
                    </button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="domain-tld-prices">
                <ul>
                    <li>.com $9.00</li>
                    <li>.net $9.50</li>
                    <li>.org $9.50</li>
                    <li>.us $6.99</li>
                    <li>.biz $9.99</li>
                    <li>.me $7.50</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- END CEK DOAMIN-->

<!-- KENAPA PINTASKU -->
<section class="blog-1-area">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title ">
                <h2>Why Choose <span>Slake?</span> </h2>
                <img src="{{asset('assets/img/section-shape.png')}}" alt="section-shape">
                <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittem elit inuning ut sed sittem do eiusmod.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-12 ">
            <div class="single-blog-1">
                <img src="{{asset('assets/img/service/icon/domain-01.png')}}" alt="section-icon">
                <h2>Free Domain</h2>
                <p>After you purchase a hosting plan, you need to set up it before you use it to your website.</p>
            </div>
        </div>
        <div class="col-md-4 col-12 ">
            <div class="single-blog-1">
                <img src="{{asset('assets/img/service/icon/cpanel.png')}}" alt="section-icon">
                <h2>Control Cpanel</h2>
                <p>After you purchase a hosting plan, you need to set up it before you use it to your website.</p>
            </div>
        </div>
        <div class="col-md-4 col-12 ">
            <div class="single-blog-1">
                <img src="{{asset('assets/img/service/icon/section-icon-3.png')}}" alt="section-icon">
                <h2>24/7 Hour Support</h2>
                <p>After you purchase a hosting plan, you need to set up it before you use it to your website.</p>
            </div>
        </div>
    </div>
</div>
</section>
<!-- KENAPA PINTASKU  END-->



<!-- SERVICE -->
<section class="homepage-2 blog-2-area">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title ">
                <h2>Our Best Services</h2>
                <img src="{{asset('assets/img/section-shape.png')}}" alt="section-shape">
                <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad tepor sittemelit inuning ut sed sittem do eiusmod.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12 ">
            <div class="single-blog-1">
                <img src="{{asset('assets/img/service/icon/section-icon.png')}}" alt="section-icon">
                <h2>Web Development</h2>
                <p>Lorem ipsum dolor sittem ametam ngcing elit, per sed do eiusmoad tepor inunt ut sedig do eiusmod.</p>
                <a href="#" class="read-more-btn">read more <i class="ti-arrow-right"></i> </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 ">
            <div class="single-blog-1">
                <img src="{{asset('assets/img/service/icon/appdev.png')}}" alt="section-icon">
                <h2>App Development</h2>
                <p>Lorem ipsum dolor sittem ametam ngcing elit, per sed do eiusmoad tepor inunt ut sedig do eiusmod.</p>
                <a href="#" class="read-more-btn">read more <i class="ti-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 ">
            <div class="single-blog-1">
                <img src="{{asset('assets/img/service/icon/domain-01.png')}}" alt="section-icon">
                <h2>Domain Registration</h2>
                <p>Lorem ipsum dolor sittem ametam ngcing elit, per sed do eiusmoad tepor inunt ut sedig do eiusmod.</p>
                <a href="#" class="read-more-btn">read more <i class="ti-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 ">
            <div class="single-blog-1">
                <img src="{{asset('assets/img/service/icon/service-icon-6.png')}}" alt="section-icon">
                <h2>Web Hosting</h2>
                <p>Lorem ipsum dolor sittem ametam ngcing elit, per sed do eiusmoad tepor inunt ut sedig do eiusmod.</p>
                <a href="#" class="read-more-btn">read more <i class="ti-arrow-right"></i></a>
            </div>
        </div>  
    </div>
</section>
<!-- SERVICE  END-->

<!--REGISTER-AREA -->
<section class="register-area" style="background-image:  url({{ asset('assets/img/bg/register.jpg') }});

    background-size: cover;
    background-repeat: no-repeat;">

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="register-heading">
                <span>2500+ People trust Slake</span>
                <h2>Ready to work with Slake ?<br> Register Todaty.</h2>
            </div>
            <div class="register-btn">
                <a class="pricing-btn blue-btn homepage-one-all-features-btn register-btn" href="#">Get Started Now</a>
            </div>
        </div>
    </div>
</div>
</section>
<!--REGISTER-AREA  END-->

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