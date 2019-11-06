<div class="navigation-bar stick">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                    <a class="" href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>
              <div class="col-md-10">
                 <div class="navigation">
                    <ul class="list-inline text-right" id="mainmenu">
                        <li class="nav-item"><a href="{{ url('/') }}">{{ __('frontend/menu.home') }}</a></li>
                        <li class="nav-item"><a href="{{ route('about') }}">{{ __('frontend/menu.about_us') }}</a></li>
                        <li class="mega-manu current-menu-has-children">
                            <a href="#">{{ __('frontend/menu.services') }}</a>
                            <div class="maga-manu-wrapper">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                            
                                                <div class="mega-single-items margin-bottom">
                                                <img src="{{ asset('assets/img/service/icon/webdev.png') }}" alt="mega-icon">
                                                    <a class="hosting-links" href="{{ route('service.web') }}">
                                                        <h2>{{ __('frontend/menu.webdev') }}</h2>
                                                    </a>
                                                    <p>{{ __('frontend/menu.webdev_desc') }}</p>
                                                </div>
                                                <div class="mega-single-items margin-bottom">
                                                    <img src="{{ asset('assets/img/service/icon/appdev2.png') }}" alt="mega-icon">
                                                    <a class="hosting-links" href="{{ route('service.app') }}">
                                                        <h2>{{ __('frontend/menu.appdev') }}</h2>
                                                    </a>
                                                    <p>{{ __('frontend/menu.appdev_desc') }}</p>
                                                </div>

                                                <div class="mega-single-items ">
                                                <img src="{{ asset('assets/img/service/icon/seo2.png') }}" alt="mega-icon">
                                                    <a class="hosting-links" href="{{ route('service.app') }}">
                                                        <h2>SEO Analysis</h2>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet, sicing elit, sed do anaglom eiusm.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="mega-single-items margin-bottom">
                                                         <!--<img src="{{ asset('assets/img/icons/mega-icon3.png') }}" alt="mega-icon">-->
                                                    <a class="hosting-links" href="{{ route('service.domain') }}">
                                                        <h2>{{ __('frontend/menu.domain') }}</h2>
                                                    </a>
                                                    <p>{{ __('frontend/menu.domain_desc') }}</p>
                                                </div>
                                                <div class="mega-single-items">
                                                         <!--<img src="{{ asset('assets/img/icons/mega-icon3.png') }}" alt="mega-icon">-->
                                                    <a class="hosting-links" href="{{ route('service.hosting') }}">
                                                        <h2>{{ __('frontend/menu.hosting') }}</h2>
                                                    </a>
                                                    <p>{{ __('frontend/menu.hosting_desc') }}</p>
                                                </div>
                                                <div class="mega-single-items">
                                                <img src="{{ asset('assets/img/service/icon/sosmed2.png') }}" alt="mega-icon">
                                                    <a class="hosting-links" href="{{ route('service.hosting') }}">
                                                        <h2>Sosial Media Analysis</h2>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet, sicing elit, sed do anaglom eiusm.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a href="{{ route('product') }}">{{ __('frontend/menu.products') }}</a></li>
                        <li class="nav-item"><a href="http://pintasku.com/tutorial">{{ __('frontend/menu.blog') }}</a></li>
                        <li class="nav-item"><a href="{{ route('contact') }}">{{ __('frontend/menu.contact') }}</a></li>
                        {{--  <li class="shop-plan dropdown "><a href="#"><img class="bag-icon" src="{{ asset('assets/img/icons/bag.png') }}" alt="bag-icon"></a>
                            <div class="shop-plan-chart dropdown-nav ">
                                <div class="single-shop-plan">
                                    <img class="shop-icon" src="{{ asset('assets/img/shop/shop-icon.png') }}" alt="shop-icon">
                                    <span class="shop-items">1x $12.99</span>
                                    <button><span  class="ti-close" aria-hidden="true"></span></button>
                                </div>
                                <div class="single-shop-plan">
                                    <img class="shop-icon" src="{{ asset('assets/img/shop/shop-icon2.png') }}" alt="shop-icon">
                                    <span class="shop-items">1x $12.99</span>
                                    <button><span  class="ti-close" aria-hidden="true"></span></button>
                                </div>
                                <div class="single-shop-plan">
                                    <img class="shop-icon" src="{{ asset('assets/img/shop/shop-icon3.png') }}" alt="shop-icon">
                                    <span class="shop-items">1x $12.99</span>
                                    <button><span  class="ti-close" aria-hidden="true"></span></button>
                                </div>
                                <hr>
                                <div class="shop-total">
                                    <h3>subtotal <span>1x $12.99</span></h3>
                                </div>
                                <a class="pricing-btn blue-btn homepage-one-all-features-btn action-btn slider-links-2 chart-btn" href="cart.html">View Cart</a>
                            </div>
                        </li>  --}}
                    </ul>
                 </div>
              </div>
        </div>
    </div>
</div>
