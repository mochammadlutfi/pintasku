@extends('layouts.master')

@section('content')
<!-- HOMEPAGE-1 SLIDER -->
<!--/ Slider Inner -->
@include('layouts.slider')
<!--/ End Slider Inner -->

<section class="domain-area ">
    <div class="container domain-inner">
        <h3 class="domain-head">Looking for domain name?</h3>
        <div class="row domain-checkup">
            <form id="digita-contact-form" action="asset/php/contact-mail.php" method="POST">
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
                        
                        <img src="assets/img/icons/search-icon.png" alt="Search icon">
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

<!--BRANDE AREA  END-->
<!-- BLOG-1 -->
<section class="blog-1-area">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title ">
                <h2>Why Choose <span>Slake?</span> </h2>
                <img src="assets/img/section-shape.png" alt="section-shape">
                <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittem elit inuning ut sed sittem do eiusmod.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-12 ">
            <div class="single-blog-1">
                <img src="assets/img/service/data_hosting.png" alt="section-icon">
                <h2>Free Domain</h2>
                <p>After you purchase a hosting plan, you need to set up it before you use it to your website.</p>
            </div>
        </div>
        <div class="col-md-4 col-12 ">
            <div class="single-blog-1">
                <img src="assets/img/service/customer.png" alt="section-icon">
                <h2>Control Cpanel</h2>
                <p>After you purchase a hosting plan, you need to set up it before you use it to your website.</p>
            </div>
        </div>
        <div class="col-md-4 col-12 ">
            <div class="single-blog-1">
                <img src="assets/img/service/24jam.png" alt="section-icon">
                <h2>24/7 Hour Support</h2>
                <p>After you purchase a hosting plan, you need to set up it before you use it to your website.</p>
            </div>
        </div>
    </div>
<!-- BLOG-1  END-->


<!--PRICING-TABLE 
<div class="homepage-2 pricing-table-area">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h2><span>Slake</span> Give you Best Price </h2>
                <img src="asset/img/section-shape.png" alt="section-shape">
                <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittemelit inuning ut sed sittem do eiusmod.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-pricing-table">
                <h2>PERSONAL</h2>
                <img src="asset/img/pricing-icon/pricing-icon.png" alt="pricing-icon">
                <div class="pricing-amount">
                    <sup><span class="currency">$</span></sup>
                    <span class="price">
                        25
                    </span>
                    <span class="subscription">
                        /Annualy
                    </span>
                </div>
                <div class="pricing-content">
                    <ul>
                        <li>10GB Space</li>
                        <li>1 Free Domain</li>
                        <li>300GB SSD Disk</li>
                        <li>Special Offers</li>
                        <li>Unlimited Support</li>
                    </ul>
                    <a class="pricing-btn blue-btn" href="#">Select Plan</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-pricing-table active">
                <h2>START UP</h2>
                <img src="asset/img/pricing-icon/pricing-icon-2.png" alt="pricing-icon">
                <div class="pricing-amount">
                    <sup><span class="currency">$</span></sup>
                    <span class="price">
                        75
                    </span>
                    <span class="subscription">
                        /Annualy
                    </span>
                </div>
                <div class="pricing-content">
                    <ul>
                        <li>10GB Space</li>
                        <li>1 Free Domain</li>
                        <li>300GB SSD Disk</li>
                        <li>Special Offers</li>
                        <li>Unlimited Support</li>
                    </ul>
                    <a class="pricing-btn blue-btn" href="#">Select Plan</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-pricing-table">
                <h2>BUSINESS</h2>
                <img src="asset/img/pricing-icon/pricing-icon-3.png" alt="pricing-icon">
                <div class="pricing-amount">
                    <sup><span class="currency">$</span></sup>
                    <span class="price">
                    99
                    </span>
                    <span class="subscription">
                        /Annualy
                    </span>
                </div>
                <div class="pricing-content">
                    <ul>
                        <li>10GB Space</li>
                        <li>1 Free Domain</li>
                        <li>300GB SSD Disk</li>
                        <li>Special Offers</li>
                        <li>Unlimited Support</li>
                    </ul>
                    <a class="pricing-btn blue-btn" href="#">Select Plan</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-pricing-table">
                <h2>ENTERPRISE</h2>
                <img src="asset/img/pricing-icon/pricing-icon-4.png" alt="pricing-icon">
                <div class="pricing-amount">
                    <sup><span class="currency">$</span></sup>
                    <span class="price">
                        125
                    </span>
                    <span class="subscription">
                        /Annualy
                    </span>
                </div>
                <div class="pricing-content">
                    <ul>
                        <li>10GB Space</li>
                        <li>1 Free Domain</li>
                        <li>300GB SSD Disk</li>
                        <li>Special Offers</li>
                        <li>Unlimited Support</li>
                    </ul>
                    <a class="pricing-btn blue-btn" href="#">Select Plan</a>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
-->

<section class="power-area">
    <!--<div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="power-left">
                    <div class="clouds">
                        <img src="asset/img/cloud/cloud-1-2.png" alt="cloud" class="cloud1">
                        <img src="asset/img/cloud/cloud-2-2.png" alt="cloud" class="cloud3">
                        <img src="asset/img/cloud/cloud-3-2.png" alt="cloud" class="cloud4">
                        <img src="asset/img/cloud/cloud-4-2.png" alt="cloud" class="cloud6">
                    </div>
                    <img class=" wow fadeInDown" data-animation="fadeInDown" animation-duration="2s" data-delay="2s" src="asset/img/feature/feature-2-2.png" alt="image">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 pr-0">
                <div class="power-right">
                    <h4>#Slake Features</4>
                    <h2>Slake has most powerful <br> hosting service ever. </h2>
                    <p>Every website hosted by Slake Host is given by free fully SSL Protect your website visitors with one click Illustration. Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <p>99.98 server  uptime with better cloud hosting adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation </p>

                    <a class="pricing-btn blue-btn" href="#">Get Started <i class="ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="power-area-2">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 order-md-last order-lg-first pr-0">
                    <div class="power-right">
                    <h4> #Slake Features</4>
                        <h2>Slake has most powerful <br> hosting service ever. </h2>
                        <p>Every website hosted by Slake Host is given by free fully SSL Protect your website visitors with one click Illustration. Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            <p>99.98 server  uptime with better cloud hosting adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation </p>
                        <a class="pricing-btn blue-btn" href="#">Get Started <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 order-md-first order-lg-last text-right">
                    <div class="power-left">
                    <div class="clouds">
                        <img src="asset/img/cloud/cloud-1-2.png" alt="cloud" class="cloud1">
                        <img src="asset/img/cloud/cloud-2-2.png" alt="cloud" class="cloud3">
                        <img src="asset/img/cloud/cloud-3-2.png" alt="cloud" class="cloud4">
                        <img src="asset/img/cloud/cloud-4-2.png" alt="cloud" class="cloud6">
                    </div>
                        <img class="wow fadeInDown" data-animation="fadeInDown" animation-duration="2s" data-delay="2s" src="asset/img/feature/feature-1-2.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</section>

</div>
</section>
<!--PRICING-TABLE END -->



<!-- BLOG-1 -->
<section class="homepage-2 blog-2-area">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title ">
                <h2>Our Best Services</h2>
                <img src="assets/img/section-shape.png" alt="section-shape">
                <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad tepor sittemelit inuning ut sed sittem do eiusmod.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12 ">
            <div class="single-blog-1">
                <img src="assets/img/service/web_developer.png" alt="section-icon">
                <h2>Web Development</h2>
                <p>Lorem ipsum dolor sittem ametam ngcing elit, per sed do eiusmoad tepor inunt ut sedig do eiusmod.</p>
                <a href="#" class="read-more-btn">read more <i class="ti-arrow-right"></i> </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 ">
            <div class="single-blog-1">
                <img src="assets/img/service/mobile_phone.png" alt="section-icon">
                <h2>App Development</h2>
                <p>Lorem ipsum dolor sittem ametam ngcing elit, per sed do eiusmoad tepor inunt ut sedig do eiusmod.</p>
                <a href="#" class="read-more-btn">read more <i class="ti-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 ">
            <div class="single-blog-1">
                <img src="assets/img/service/network_1.png" alt="section-icon">
                <h2>Domain Registration</h2>
                <p>Lorem ipsum dolor sittem ametam ngcing elit, per sed do eiusmoad tepor inunt ut sedig do eiusmod.</p>
                <a href="#" class="read-more-btn">read more <i class="ti-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 ">
            <div class="single-blog-1">
                <img src="assets/img/service/data_hosting.png" alt="section-icon">
                <h2>Web Hosting</h2>
                <p>Lorem ipsum dolor sittem ametam ngcing elit, per sed do eiusmoad tepor inunt ut sedig do eiusmod.</p>
                <a href="#" class="read-more-btn">read more <i class="ti-arrow-right"></i></a>
            </div>
        </div>
        
        
    </div>
</section>
<!-- BLOG-1  END-->

<!--REGISTER-AREA -->

<section class="register-area" style="background-image:  url({{ asset('assets/img/bg/register.jpg') }});">

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

<!--TESTIMONIAL-AREA 
<section class="testimonial-area">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h2>Which People Love <span>Slake</span> </h2>
                <img src="asset/img/section-shape.png" alt="section-shape">
                <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittemelit inuning ut sed sittem do eiusmod.</p>
            </div>
        </div>
    </div>
    <div class="testimonial-carousel">
        <div class="single-item ">
        <div class="item-inner">
            <img src="asset/img/icons/quote-shape.png" alt="testimonial quote" class="quote-img">
            <p class="review">Slake is a top leading most popular portfolio site for growing lalented designer orem ipsum dolor sit amet, consectetur dcng aelit, sed do eiusmod tempor incididunt labore design.</p>
            <div class="author-meta clearfix">
                <div class="author-left">
                    <img src="asset/img/testimonial/person-1.png" alt="Dawny Jr.">
                    <div class="author-info">
                        <h4>Dawny Jr.</h4>
                        <p>Chief Marketing Office</p>
                    </div>
                </div>
                <div class="author-right">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
        </div>
        <div class="single-item wow ">
        <div class="item-inner">
            <img src="asset/img/icons/quote-shape.png" alt="testimonial quote" class="quote-img">
            <p class="review">Slake is a top leading most popular portfolio site for growing lalented designer orem ipsum dolor sit amet, consectetur dcng aelit, sed do eiusmod tempor incididunt labore design.</p>
            <div class="author-meta clearfix">
                <div class="author-left">
                    <img src="asset/img/testimonial/person-2.png" alt="Dawny Jr.">
                    <div class="author-info">
                        <h4>Jonathon Best</h4>
                        <p>Support Enginner</p>
                    </div>
                </div>
                <div class="author-right">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
        </div>
        <div class="single-item">
        <div class="item-inner">
            <img src="asset/img/icons/quote-shape.png" alt="testimonial quote" class="quote-img">
            <p class="review">Slake is a top leading most popular portfolio site for growing lalented designer orem ipsum dolor sit amet, consectetur dcng aelit, sed do eiusmod tempor incididunt labore design.</p>
            <div class="author-meta clearfix">
                <div class="author-left">
                    <img src="asset/img/testimonial/person-1.png" alt="Dawny Jr.">
                    <div class="author-info">
                        <h4>Dawny Jr.</h4>
                        <p>Chief Marketing Office</p>
                    </div>
                </div>
                <div class="author-right">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
        </div>
        <div class="single-item ">
        <div class="item-inner">
            <img src="asset/img/icons/quote-shape.png" alt="testimonial quote" class="quote-img">
            <p class="review">Slake is a top leading most popular portfolio site for growing lalented designer orem ipsum dolor sit amet, consectetur dcng aelit, sed do eiusmod tempor incididunt labore design.</p>
            <div class="author-meta clearfix">
                <div class="author-left">
                    <img src="asset/img/testimonial/person-2.png" alt="Dawny Jr.">
                    <div class="author-info">
                        <h4>Jonathon Best</h4>
                        <p>Support Enginner</p>
                    </div>
                </div>
                <div class="author-right">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
        </div>
        <div class="single-item ">
        <div class="item-inner">
            <img src="asset/img/icons/quote-shape.png" alt="testimonial quote" class="quote-img">
            <p class="review">Slake is a top leading most popular portfolio site for growing lalented designer orem ipsum dolor sit amet, consectetur dcng aelit, sed do eiusmod tempor incididunt labore design.</p>
            <div class="author-meta clearfix">
                <div class="author-left">
                    <img src="asset/img/testimonial/person-1.png" alt="Dawny Jr.">
                    <div class="author-info">
                        <h4>Dawny Jr.</h4>
                        <p>Chief Marketing Office</p>
                    </div>
                </div>
                <div class="author-right">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
        </div>
        <div class="single-item ">
        <div class="item-inner">
            <img src="asset/img/icons/quote-shape.png" alt="testimonial quote" class="quote-img">
            <p class="review">Slake is a top leading most popular portfolio site for growing lalented designer orem ipsum dolor sit amet, consectetur dcng aelit, sed do eiusmod tempor incididunt labore design.</p>
            <div class="author-meta clearfix">
                <div class="author-left">
                    <img src="asset/img/testimonial/person-2.png" alt="Dawny Jr.">
                    <div class="author-info">
                        <h4>Jonathon Best</h4>
                        <p>Support Enginner</p>
                    </div>
                </div>
                <div class="author-right">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="slider-btns">
        <button class="testi-nav-left"><span class="ti-angle-left"></span></button>
        <button class="testi-nav-right"><span class="ti-angle-right"></span></button>
    </div>
    </div>
</section>-->
<!--TESTIMONIAL-AREA  END-->
<!--CTA AREA

<section class="blog-section-area">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h2>Popular Blog Post</h2>
                <img src="asset/img/section-shape.png" alt="section-shape">
                <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittemelit inuning ut sed sittem do eiusmod.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12 col-12">
            <div class="single-blog">
                    <a href="#" class="blog-intro">Technology</a>
                <div class="single-blog-image">
                    <a href="#">
                        <img src="asset/img/blog/home-page-blog-1.png" alt="blog-img">
                    </a>
                </div>
                <div class="blog-box-content">


                    <ul class="post-meta">

                        <li>
                            <span class="meta-wrap author-meta">

                                By:
                                <a href="#">

                                        Jhony Deep </a>
                            </span>
                        </li>


                        <li>
                            <span class="meta-wrap">
                                <a href="#"> Sep. 02, 2019 </a>
                            </span>
                        </li>

                    </ul>


                    <a href="#">
                        <h3>Best Shared Hosting Provider in the World</h3>
                    </a>

                    <div class="post-permalink">

                        <a href="#">Read more<i class="ti-arrow-right"></i></a>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12">
            <div class="single-blog">
                    <a href="#" class="blog-intro">Technology, HOSTING</a>
                <div class="single-blog-image">
                    <a href="#">
                        <img src="asset/img/blog/home-page-blog-2.png" alt="blog-img">
                    </a>
                </div>
                <div class="blog-box-content">


                    <ul class="post-meta">

                        <li>
                            <span class="meta-wrap author-meta">

                                By:
                                <a href="#">

                                        Jhony Deep </a>
                            </span>
                        </li>


                        <li>
                            <span class="meta-wrap">
                                <a href="#"> Sep. 02, 2019 </a>
                            </span>
                        </li>

                    </ul>


                    <a href="#">
                        <h3>Best Shared Hosting Provider in the World</h3>
                    </a>

                    <div class="post-permalink">

                        <a href="#">Read more<i class="ti-arrow-right"></i></a>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12">
            <div class="single-blog">
                    <a href="#" class="blog-intro">Technology</a>
                <div class="single-blog-image">
                    <a href="#">
                        <img src="asset/img/blog/home-page-blog-3.png" alt="blog-img">
                    </a>
                </div>
                <div class="blog-box-content">


                    <ul class="post-meta">

                        <li>
                            <span class="meta-wrap author-meta">

                                By:
                                <a href="#">

                                        Jhony Deep </a>
                            </span>
                        </li>


                        <li>
                            <span class="meta-wrap">
                                <a href="#"> Sep. 02, 2019 </a>
                            </span>
                        </li>

                    </ul>


                    <a href="#">
                        <h3>Best Shared Hosting Provider in the World</h3>
                    </a>

                    <div class="post-permalink">

                        <a href="#">Read more<i class="ti-arrow-right"></i></a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</section> -->


<!--CTA AREA  END-->

<!--BRANDE AREA -->
<section class="brand-area brand-2">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="brand-inner">
                <div class="owl-carousel all-brand-carsouel">
                    
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="assets/img/brand-logo/vuejs.png" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="assets/img/brand-logo/angularjs.png" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="assets/img/brand-logo/nodejs.png" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="assets/img/brand-logo/flutter.png" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="assets/img/brand-logo/android.png" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="assets/img/brand-logo/redis.png" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="assets/img/brand-logo/laravel.png" alt="brand-icon">
                    </div>
                    </div>
                    <div class="brand-single-item">
                    <div class="brand-single-item-cell">
                        <img src="assets/img/brand-logo/adonis.png" alt="brand-icon">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
            
    </div>
</section>
@endsection