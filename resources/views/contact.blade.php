@extends('layouts.master')

@section('content')

    


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

   
@endsection