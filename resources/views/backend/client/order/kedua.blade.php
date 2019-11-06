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
    <div class="content-heading pt-15">
        <div class="h2 mb-0">Cari Domain</div>
    </div>
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
            <li class="nav-item">
                <a class="nav-link" href="#domain_tf">
                    <i class="fa fa-truck mr-5"></i>
                    Sudah Punya Domain
                </a>
            </li>
        </ul>
        <div class="block-content tab-content pb-15">
            <div class="tab-pane active" id="domain_reg" role="tabpanel">
                <form id="form-register" method="post" onsubmit="return false;">
                    @csrf
                    <input type="hidden" name="tipe" value="Domain Registration">
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
                                    <div class="text-danger" id="error-register_name"></div>
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
                            <div class="row">
                                <div class="col-lg-12"  id="register_info"></div>
                            </div>
                            <div class="row justify-content-center" id="btn-register_submit" style="display:none;">
                                <div class="col-lg-4">
                                    <button type="button" id="register_next" class="btn btn-alt-primary btn-block">
                                        <i class="si si-check mr-5"></i>
                                        Lanjutkan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="domain_tf" role="tabpanel">
                <form id="form-transfer" method="post" onsubmit="return false;">
                    @csrf
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
@stop
@push('scripts')
<script src="{{ asset('assets/backend/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script>
$(document).ready(function () {
    $("#form-register").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-register')[0]);
        $.ajax({
            url : laroute.route('domain.cek_register'),
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
                $('#field-register_name').removeClass('is-invalid');
                $('#error-register_name').html('');
                if (response.fail == false) {
                    swal.close();
                    $("#register_info").html(response.info);
                    if(response.status == false)
                    {
                        $("#btn-register_submit").hide();
                    }else{
                        $("#btn-register_submit").show();
                    }
                }else{
                    $("#btn-register_submit").hide();
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

    $("#register_next").click(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-register')[0]);
        $.ajax({
            url : laroute.route('order.domain_register'),
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
                $('#field-register_name').removeClass('is-invalid');
                $('#error-register_name').html('');
                if (response.fail == false) {
                    swal.close();
                    window.setTimeout(function(){
                            window.location = response.url;
                    });
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
