@extends('layouts.master')

@section('content')

<!-- HEADER-
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
 END HEADER -->


<!---TABLE  HARGA -->

<!-- HEADER-->
<section class="about-area bgtemplate"> 
     <div class="container" >
            <div class="row">
                <div class="col-md-7">
                    <div class="about-content-table">
                        <div class="about-content-table-sell">
                            <div class="about-heading">
                              
                            <h2 class="judul col-md-12"><br>Web Development <span></span></h2>
                        <div class="col-md-10 isi">
                            <p class="mt-5 ">Kamu memiliki kemampuan memilih dari ratusan template website atau, gunakan kebebasan untuk mendesain websitemu dari awal.</p>
                            <ul class="d-inline">
                 <li class="d-inline"><a href="#" class="download-btn btn-lg " >See pricing</a> </li>
              </ul>
                        
                        
                        </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="gbrhead">
                    <img src="{{asset('assets/img/bg/webdev.png')}}" class="img-fluid" alt="https://www.freepik.com/free-photos-vectors/banner">
                    </div>
                    
                 
                </div>
            </div>
        </div>
    </section>
<!-- END HEADER -->


<section class="blog-1-area about-blog">
         <div class="container">
            <div class="homepage-2 pricing-table-area">
               <div class="row">
                  <div class="col-md-12">
                     <div class="section-title">
                        <h2><span>Slake</span> Give you Best Price </h2>
                        <img src="{{asset('assets/img/section-shape.png')}}" alt="section-shape">
                        <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittemelit inuning ut sed sittem do eiusmod.</p>
                     </div>
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-lg-4 col-md-12 col-xs-12">
                     <div class="single-pricing-table">
                     <h2>ONLINE STORE</h2>
                        <img src="{{asset('assets/img/pricing-icon/tokoonline.svg')}}" alt="pricing-icon">
                        
                        <div class="pricing-amount">
                           <div class="annual_price">
                              <sup><span class="currency">$</span></sup>
                              <span class="price"> 00 </span>
                              <span class="subscription"> /Annual </span>
                           </div>
                           <div class="monthly_price">
                              <sup><span class="currency">$</span></sup>
                              <span class="price"> 00 </span>
                              <span class="subscription"> /Monthly </span>
                           </div>
                        </div>
                        <div class="pricing-content">
                           <ul>
                              <li>10GB Space</li>
                              <li>1 Free Domain</li>
                              <li>300GB SSD Disk</li>
                              <li>Special Offers</li>
                              <li>Unlimited Support</li>
                           </ul>
                           <a class="pricing-btn blue-btn"href="{{ route('service.detail') }}">Select Plan</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-xs-12">
                     <div class="single-pricing-table active">
                        <span class="table-highlight">Popular</span>
                        <h2>COMPANY PROFILE</h2>
                        <img src="{{asset('assets/img/pricing-icon/companyprofile.svg')}}" alt="pricing-icon">
                        <div class="pricing-amount">
                           <div class="annual_price">
                              <sup><span class="currency">$</span></sup>
                              <span class="price"> 81 </span>
                              <span class="subscription"> /Annual </span>
                           </div>
                           <div class="monthly_price">
                              <sup><span class="currency">$</span></sup>
                              <span class="price"> 09 </span>
                              <span class="subscription"> /Monthly </span>
                           </div>
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
                  <div class="col-lg-4 col-md-12 col-xs-12 ">
                     <div class="single-pricing-table">
                     <h2>LOREM IPSUM</h2>
                        <img src="{{asset('assets/img/pricing-icon/informasi.svg')}}" alt="pricing-icon">
                        <div class="pricing-amount">
                           <div class="annual_price">
                              <sup><span class="currency">$</span></sup>
                              <span class="price"> 199 </span>
                              <span class="subscription"> /Annual </span>
                           </div>
                           <div class="monthly_price">
                              <sup><span class="currency">$</span></sup>
                              <span class="price"> 99 </span>
                              <span class="subscription"> /Monthly </span>
                           </div>
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
</section>
<!--TABEL HARGA END -->



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