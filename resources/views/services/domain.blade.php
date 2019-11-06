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
                              
                            <h2 class="judul col-md-12"><br>Domain Registration <span></span></h2>
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
                    <img src="{{asset('assets/img/bg/domain.png')}}"  class="img-fluid middle center" alt="https://www.freepik.com/free-photos-vectors/background">
                    </div>
                    
                 
                </div>
            </div>
        </div>
    </section>
<!-- END HEADER -->



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
                <div class="single-hosting-price">
                <h2>tdd</h2>
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
                    <h2>Registration</h2>
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
                    <h2>Transfer</h2>
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
                    <h2>Renew</h2>
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