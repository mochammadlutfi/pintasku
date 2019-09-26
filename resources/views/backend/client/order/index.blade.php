@extends('backend.layouts.master')

@section('styles')
<style>
    #order-sort .nav-item {
        width: 25%;
    }
    #order-sort .nav-item .active{
        cursor: pointer;
        color: #fff;
        background-color: #3f9ce8;
    }
    #order-sort .nav-link {
        background-color: #f0f2f5;
        margin-left: 15px;
        cursor: not-allowed;
    }
</style>
@endsection
@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Data Produk</span>
    </nav>

    <div class="block">
        <div class="block-content">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills push" id="order-sort">
                        <li class="nav-item">
                            <a class="h5 nav-link active py-15" href="javascript:void(0)">
                                <i class="fa fa-fw fa-home mr-5"></i>1. Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="h5 nav-link py-15" href="javascript:void(0)">
                                <i class="fa fa-fw fa-globe mr-5"></i>2. Domain
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="h5 nav-link py-15" href="javascript:void(0)">
                                <i class="fa fa-fw fa-money mr-5"></i>3. Pembayaran
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="h5 nav-link py-15" href="javascript:void(0)">
                                <i class="fa fa-fw fa-print mr-5"></i>4. Checkout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
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
                                            <div class="h2 font-w700 text-primary mb-10">Rp.
                                                {{ number_format($h->harga->bulanan,0,",",".") }}</div>
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
                                                <button type="submit" class="btn btn-hero btn-sm btn-rounded btn-noborder btn-primary">Order
                                                    Sekarang</button>
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
                                        @foreach($webdev as $w)
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-category-link="categori-{{ $w->category_id}}">
                                                <i class="fa fa-fw fa-briefcase mr-5"></i> {{ $w->category->name }}
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
                                                <div class="h2 font-w700 text-primary mb-10">Rp.
                                                    {{ number_format($h->harga->bulanan,0,",",".") }}</div>
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
                                                    <button type="submit"
                                                        class="btn btn-hero btn-sm btn-rounded btn-noborder btn-primary">Order
                                                        Sekarang</button>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
{{-- <script src="{{ asset('assets/backend/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/be_forms_wizard.min.js') }}"></script> --}}
<script>
    jQuery(function () {
        Codebase.helpers('content-filter');
    });
</script>
@endpush
