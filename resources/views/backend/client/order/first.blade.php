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
                                <div class="h6 text-muted">MULAI DARI</div>
                                <div class="h1 font-w700 text-primary mb-10">Rp. {{ number_format($h->harga->bulanan,0,",",".") }}</div>
                            </div>
                            <div class="block-content">
                                <p><strong>2</strong> Projects</p>
                                <p><strong>10GB</strong> Storage</p>
                                <p><strong>15</strong> Clients</p>
                                <p><strong>Email</strong> Support</p>
                            </div>
                            <div class="block-content block-content-full">
                                <span class="btn btn-hero btn-sm btn-rounded btn-noborder btn-alt-primary">Current Plan</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane" id="web-development" role="tabpanel">
                @foreach($webdev as $w)
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-pop block-rounded block-bordered text-center" href="javascript:void(0)">
                        <div class="block-header">
                            <h3 class="block-title font-w600">
                                {{ $w->name }}
                            </h3>
                        </div>
                        <div class="block-content bg-body-light">
                            <div class="h6 text-muted">MULAI DARI</div>
                            <div class="h1 font-w700 text-primary mb-10">Rp. {{ number_format($h->harga->bulanan,0,",",".") }}</div>
                        </div>
                        <div class="block-content">
                            <p><strong>2</strong> Projects</p>
                            <p><strong>10GB</strong> Storage</p>
                            <p><strong>15</strong> Clients</p>
                            <p><strong>Email</strong> Support</p>
                        </div>
                        <div class="block-content block-content-full">
                            <span class="btn btn-hero btn-sm btn-rounded btn-noborder btn-alt-primary">Current Plan</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="tab-pane" id="mobile-development" role="tabpanel">

            </div>
            <div class="tab-pane" id="web-application" role="tabpanel">

            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
@endpush
