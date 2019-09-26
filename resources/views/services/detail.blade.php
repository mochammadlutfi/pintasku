@extends('layouts.master')

@section('content')

<!-- HEADER-->
      <section class="about-area"> 
    <img src="{{asset('assets/img/bg/about.jpg')}}" alt="cloud" class="breadcrumb-right-img">
     <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-content-table">
                        <div class="about-content-table-sell">
                            <div class="about-heading">
                                <h3>Web</h3><h2>Development</h2><br>
                                  <div class="about-links">
                                      <ul>
                                          <li><a href="index.html">Home </a></li>
                                          <li class="d-link">/ Service</li>
                                          <li class="d-link">/ Web Development</li>
                                      </ul>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- END HEADER -->


   <!--HOSTING PLAN AREA-->
   <section class="hosting-plan-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2> <span>Slake</span> Shared Hosting Plan </h2>
                        <img src="{{asset('assets/img/section-shape.png')}}" alt="section-shape">
                        <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittemelit inuning ut sed sittem do eiusmod.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="single-hosting-price display-none">
                    <ul>
                        <li>Disk Space</li>
                        <li>Free Domain</li>
                        <li>Brandwidth</li>
                        <li>SSL Certificate</li>
                        <li>Email Account</li>
                        <li>Mail Support</li>
                        <li>Customer Support</li>
                        <li>Setup</li>
                        <li>Marketing</li>
                    </ul>
                </div>
                <div class="single-hosting-price">
                    <h2>PERSONAL</h2>
                    <div class="pricing-amount">
                        <sup><span class="currency">$</span></sup>
                        <span class="price">
                                  25
                              </span>
                        <span class="subscription">
                                  /Annualy
                              </span>
                    </div>
                    <ul>
                        <li><strong class="pt">Disk Space</strong> 25 GB</li>
                        <li><strong class="pt">Free Domain</strong> 5</li>
                        <li><strong class="pt">Brandwidth</strong> Unlimited</li>
                        <li><strong class="pt">SSL Certificate</strong> 10</li>
                        <li><strong class="pt">Email Account</strong> 5</li>
                        <li><strong class="pt">Mail Support</strong> Free</li>
                        <li><strong class="pt">Customer Support</strong> 24/7 Hour</li>
                        <li><strong class="pt">Setup</strong> Free Setup</li>
                        <li><strong class="pt">Marketing</strong> Free</li>
                    </ul>
                    <a class="pricing-btn blue-btn" href="#">Select Plan</a>
                </div>
                <div class="single-hosting-price">
                    <h2>START UP</h2>
                    <div class="pricing-amount">
                        <sup><span class="currency">$</span></sup>
                        <span class="price">
                                  75
                              </span>
                        <span class="subscription">
                                  /Annualy
                              </span>
                    </div>
                    <ul>
                        <li><strong class="pt">Disk Space</strong> 25 GB</li>
                        <li><strong class="pt">Free Domain</strong> 5</li>
                        <li><strong class="pt">Brandwidth</strong> Unlimited</li>
                        <li><strong class="pt">SSL Certificate</strong> 10</li>
                        <li><strong class="pt">Email Account</strong> 5</li>
                        <li><strong class="pt">Mail Support</strong> Free</li>
                        <li><strong class="pt">Customer Support</strong> 24/7 Hour</li>
                        <li><strong class="pt">Setup</strong> Free Setup</li>
                        <li><strong class="pt">Marketing</strong> Free</li>
                    </ul>
                    <a class="pricing-btn blue-btn" href="#">Select Plan</a>
                </div>
                <div class="single-hosting-price">
                    <h2>ENTERPRISE</h2>
                    <div class="pricing-amount">
                        <sup><span class="currency">$</span></sup>
                        <span class="price">
                                  125
                              </span>
                        <span class="subscription">
                                  /Annualy
                              </span>
                    </div>
                    <ul>
                        <li><strong class="pt">Disk Space</strong> 25 GB</li>
                        <li><strong class="pt">Free Domain</strong> 5</li>
                        <li><strong class="pt">Brandwidth</strong> Unlimited</li>
                        <li><strong class="pt">SSL Certificate</strong> 10</li>
                        <li><strong class="pt">Email Account</strong> 5</li>
                        <li><strong class="pt">Mail Support</strong> Free</li>
                        <li><strong class="pt">Customer Support</strong> 24/7 Hour</li>
                        <li><strong class="pt">Setup</strong> Free Setup</li>
                        <li><strong class="pt">Marketing</strong> Free</li>
                    </ul>
                    <a class="pricing-btn blue-btn" href="#">Select Plan</a>
                </div>
            </div>
        </div>
    </section>



    <!--HOSTING PLAN AREA END-->




<!-- FAQ AREA -->
    <div id="faq-area" class=" section-padding faq-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2><span> Slake’s</span> FAQ’s</h2>
                        <img src="{{asset('assets/img/section-shape.png')}}" alt="section-shape">
                        <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittemelit inuning ut sed sittem do eiusmod.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse"  href="#collapseOne" >
                                        1. Sedeiusmod tempor inccsetetur aliquatraiy?
                                        <span class="ti-angle-down"></span></a>
                                </a>
                              

                                </div>
                                <div id="collapseOne" class=" collapse "  data-parent="#accordion">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore</div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                <a class=" card-link" data-toggle="collapse"  href="#collapseTwo">
                                        2. Sedeiusmod tempor inccsetetur aliquatraiy?
                                        <span class="ti-angle-down"></span></a>
                                </a>
                              

                                </div>
                                <div id="collapseTwo" class=" collapse "  data-parent="#accordion">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore</div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse"  href="#collapseThree">
                                        3. Sedeiusmod tempor inccsetetur aliquatraiy?
                                        <span class="ti-angle-down"></span></a>
                                </a>
                              

                                </div>
                                <div id="collapseThree" class=" collapse"  data-parent="#accordion">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse"  href="#collapseFour" >
                                        4. Sedeiusmod tempor inccsetetur aliquatraiy?
                                        <span class="ti-angle-down"></span></a>
                                </a>
                              

                                </div>
                                <div id="collapseFour" class=" collapse"  data-parent="#accordion">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                        <div id="accordion2">
                            <div class="card">
                                <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse"  href="#collapseFive" >
                                        5. Sedeiusmod tempor inccsetetur aliquatraiy?
                                        <span class="ti-angle-down"></span></a>
                                </a>
                              

                                </div>
                                <div id="collapseFive" class=" collapse"  data-parent="#accordion2">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse"  href="#collapseSix">
                                        6. Sedeiusmod tempor inccsetetur aliquatraiy?
                                        <span class="ti-angle-down"></span></a>
                                </a>
                              

                                </div>
                                <div id="collapseSix" class=" collapse show"  data-parent="#accordion2">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse"  href="#collapseSeven" >
                                        7. Sedeiusmod tempor inccsetetur aliquatraiy?
                                        <span class="ti-angle-down"></span></a>
                                </a>
                              

                                </div>
                                <div id="collapseSeven" class=" collapse"  data-parent="#accordion2">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse"  href="#collapseEight" >
                                        8. Sedeiusmod tempor inccsetetur aliquatraiy?
                                        <span class="ti-angle-down"></span></a>
                                </a>
                              

                                </div>
                                <div id="collapseEight" class=" collapse"  data-parent="#accordion2">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /FAQ AREA -->

<!--BRAND-->
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
<!--BRAND END-->

@endsection