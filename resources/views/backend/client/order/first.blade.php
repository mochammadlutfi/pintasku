@extends('backend.layouts.master')


@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Data Produk</span>
    </nav>

    <div class="block">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#web-hosting">Web Hosting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#web-development">Web Development</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mobile-development">Mobile Development</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#web-application">Web Application</a>
            </li>
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active" id="web-hosting" role="tabpanel">
                <div class="row py-30">
                    @foreach($hosting as $h)
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-link-pop block-rounded block-bordered text-center" href="javascript:void(0)">
                            <div class="block-header">
                                <h3 class="block-title font-w600">
                                    {{ $h->name }}
                                </h3>
                            </div>
                            <div class="block-content bg-body-light">
                                <span class="h6 text-muted">MULAI DARI</span>
                                <div class="h2 font-w700 text-primary mb-10">Rp. {{ number_format($h->harga->bulanan,0,",",".") }}</div>
                                <div class="h6 text-muted">PERBULAN</div>
                            </div>
                            <div class="block-content">
                                <p><strong>2</strong> Projects</p>
                                <p><strong>10GB</strong> Storage</p>
                                <p><strong>15</strong> Clients</p>
                                <p><strong>Email</strong> Support</p>
                            </div>
                            <div class="block-content block-content-full">
                                <form action="{{ route('order') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $h->id }}">
                                    <input type="hidden" name="tipe" value="hosting">
                                    <button type="submit" class="btn btn-hero btn-sm btn-rounded btn-noborder btn-primary">Order Sekarang</button>
                                </form>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane" id="web-development" role="tabpanel">
                <div class="js-filter">
                    <!-- Navigation -->
                    <div class="p-10 bg-white push">
                        <ul class="nav nav-pills justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-category-link="all">
                                    <i class="fa fa-fw fa-th-large mr-5"></i> Semua
                                </a>
                            </li>
                            @foreach($cat_webdev as $cw)
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-category-link="categori-{{ $cw->id}}">
                                    <i class="fa fa-fw fa-briefcase mr-5"></i> {{ $cw->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END Navigation -->

                    <!-- Projects -->
                    <div class="row items-push img-fluid-100">
                        @foreach($webdev as $w)
                        <div class="col-md-6 col-xl-3" data-category="categori-{{ $w->category_id}}">
                            <a class="block block-link-pop block-rounded block-bordered text-center" href="javascript:void(0)">
                                <div class="block-header">
                                    <h3 class="block-title font-w600">
                                        {{ $w->name }}
                                    </h3>
                                </div>
                                <div class="block-content bg-body-light">
                                    <span class="h6 text-muted">MULAI DARI</span>
                                    <div class="h2 font-w700 text-primary mb-10">Rp. {{ number_format($h->harga->bulanan,0,",",".") }}</div>
                                    <div class="h6 text-muted">PERBULAN</div>
                                </div>
                                <div class="block-content">
                                    <p><strong>2</strong> Projects</p>
                                    <p><strong>10GB</strong> Storage</p>
                                    <p><strong>15</strong> Clients</p>
                                    <p><strong>Email</strong> Support</p>
                                </div>
                                <div class="block-content block-content-full">
                                    <form action="{{ route('order') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $h->id }}">
                                        <input type="hidden" name="tipe" value="{{ $h->tipe }}">
                                        <button type="submit" class="btn btn-hero btn-sm btn-rounded btn-noborder btn-primary">Order Sekarang</button>
                                    </form>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- END Projects -->
                </div>
            </div>
            <div class="tab-pane" id="mobile-development" role="tabpanel">

            </div>
            <div class="tab-pane" id="web-application" role="tabpanel">
                <div class="row">
                    @foreach($web_app as $wa)
                    <div class="col-lg-4">
                        <div class="block block-rounded block-bordered">
                            <div class="block-content p-0 overflow-hidden">
                                <a class="img-link" href="be_pages_real_estate_listing.html">
                                    <img class="img-fluid rounded-top" src="{{ asset('assets/img/placeholder/590x300.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="block-content border-bottom">
                                <h4 class="font-size-h5 mb-10">{{ $wa->name }}</h4>
                                <p class="text-muted">
                                    Rp. {{ number_format($h->harga->sekali,0,",",".") }}
                                </p>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('order') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $wa->id }}">
                                            <input type="hidden" name="tipe" value="{{ $wa->tipe }}">
                                            <button type="submit" class="btn btn-sm btn-hero btn-noborder btn-primary btn-block">Beli Sekarang</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')

<script>
    jQuery(function () {
        Codebase.helpers('content-filter');
    });
</script>
@endpush
