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
        <a class="breadcrumb-item" href="{{ route('domain') }}">Domain</a>
        <span class="breadcrumb-item active">Cari Domain</span>
    </nav>
    <div class="block">
        <div class="block-content">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills push" id="order-sort">
                        <li class="nav-item">
                            <a class="h5 nav-link py-15" href="javascript:void(0)">
                                <i class="fa fa-fw fa-home mr-5"></i>1. Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="h5 nav-link active py-15" href="javascript:void(0)">
                                <i class="fa fa-fw fa-globe mr-5"></i>2. Domain
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="h5 nav-link py-15" href="javascript:void(0)">
                                <i class="fa fa-fw fa-money mr-5"></i>3. Pengaturan
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
            <div class="row justify-content-center">
                <div class="col-lg-12">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#domain_tf">
                                <i class="fa fa-truck mr-5"></i>
                                Sudah Punya Domain
                            </a>
                        </li>
                    </ul>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="domain_reg" role="tabpanel">
                            <form id="form-register" method="post" onsubmit="return false;">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="form-group row">
                                            <div class="col-lg-7">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            WWW.
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="field-register_name" name="register_name" autofocus>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <select class="form-control" name="register_tld" id="register_tld">
                                                    @foreach($tld as $t)
                                                        <option value="{{ $t->name }}">{{ $t->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-alt-primary btn-block" type="submit">
                                                    Cek Domain
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
                                            <div class="col-lg-7">
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
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-alt-primary btn-block" type="submit">
                                                    Cek Domain
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
$(document).ready(function () {
    $("#form-register").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-register')[0]);
        $.ajax({
            url : "{{ route('order.domain') }}",
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                swal({
                    title: "Tunggu Sebentar...",
                    text: " ",
                    icon: "https://media.giphy.com/media/f6DNfyvoATGW8ohK1t/giphy.gif",
                    buttons: false,
                    allowOutsideClick: false
                });
            },
            success: function (response){
                    if (response.status == false) {
                        swal({
                            title: "Success",
                            text: "Data Berhasil Di Simpan",
                            timer: 3000,
                            buttons: false,
                            icon: 'success'
                        });
                        window.setTimeout(function(){
                            window.location = response.url;
                    } ,1500);
                }else{
                    swal.close();
                    for (control in response.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(response.errors[control]);
                        $.notify({
                            // options
                            icon: 'fa fa-times',
                            message: response.errors[control]
                        },{
                            // settings
                            delay: 7000,
                            type: 'danger'
                        });
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSimpan').text('Simpan');
                $('#btnSimpan').attr('disabled',false);
            }
        });
    });
});
</script>
@endpush
