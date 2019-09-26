@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('beranda') }}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('domain') }}">Domain</a>
        <span class="breadcrumb-item active">Cari Domain</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="content-heading pt-15">
                Cari Domain
            </div>
            <!-- Default Elements -->
            <div class="block">
                <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#domain_reg">
                                <i class="si si-globe mr-5"></i>
                                Daftar Domain Baru
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#domain_tf">
                            <i class="fa fa-truck mr-5"></i>
                            Transfer Domain
                        </a>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="domain_reg" role="tabpanel">
                        <form id="form-register" method="post" onsubmit="return false;">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="form-group row">
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        WWW.
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-input1-group1" name="example-input1-group1" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-control" name="" id="">
                                                @foreach($tld as $t)
                                                    <option value="{{ $t->name }}">{{ $t->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-alt-primary btn-block" type="submit">
                                                Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="domain_tf" role="tabpanel">
                        <form id="form-transfer" method="post" onsubmit="return false;">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="form-group row">
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        WWW.
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="example-input1-group1" name="example-input1-group1" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-control" name="" id="">
                                                @foreach($tld as $t)
                                                    <option value="{{ $t->name }}">{{ $t->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-alt-primary btn-block" type="submit">
                                                Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
@stop
@push('scripts')
@endpush
