@extends('layouts.master')

@section('content')

    
<!-- HEADER-->
<section class="about-area bgtemplate"> 
     <div class="container" >
            <div class="row">
                <div class="col-md-7">
                    <div class="about-content-table">
                        <div class="about-content-table-sell">
                            <div class="about-heading">
                              
                            <h2 class="judul col-md-12"><br>Contact Us <span></span></h2>
                        <div class="col-md-10 isi">
                            <p class="mt-5 ">Kamu memiliki kemampuan memilih dari ratusan template website atau, gunakan kebebasan untuk mendesain websitemu dari awal.</p>
                        </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="gbrhead">
                    <img src="{{asset('assets/img/bg/teamwork.png')}}" class="img-fluid" alt="Responsive image">
                    </div>
                    
                 
                </div>
            </div>
        </div>
    </section>
<!-- END HEADER -->

    <!--ADDRESS AREA  -->
    <section class="address-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <div class="single-address">
                        <span class="ti-mobile"></span>
                        <p class="single-contact-info"><a href="tel:326578912">+6289656466525</a> <br></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <div class="single-address">
                        <span class="ti-map-alt"></span>
                        <p>28 Green Tower, Street Name, New York City, USA</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <div class="single-address">
                        <span class=" ti-email"></span>
                        <p class="single-contact-info"><a href="mail@pintasku.com">mail@pintasku.com</a> <br></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="get-in-touch-area ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="get-in-touch">
                        <h2>Get in Touch</h2>
                        <form id="digita-contact-form" action="asset/php/contact-mail.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Your Name</h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Name" name="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Email Address</h4>
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="Email" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Subject</h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Website" name="website">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Write Message</h4>
                                    <div class="form-group">
                                        <textarea id="Message" class="form-control" rows="3" name="message"></textarea>
                                    </div>
                                    <div class="submit-button">
                                        <button type="submit" class="btn btn-blue">SEND MESSAGE</button>
                                        <p class="contact-send-message"></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ADDRESS AREA  END-->

    <!--MAPS PINTASKU -->
    <section class="map-area ">
        <div class="maps">
            <div id="map">
                
            </div>
        </div>
    </section>
    <!--MAPS PINTASKU END -->

   <!--BRAND -->
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
   <!--BRAND END -->
@endsection