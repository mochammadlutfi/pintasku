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
        <div class="block-content pb-15">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills push" id="order-sort">
                        <li class="nav-item">
                            <a class="h5 nav-link py-15" href="javascript:void(0)">
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
                                <i class="fa fa-fw fa-money mr-5"></i>3. Pengaturan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="h5 nav-link active py-15" href="javascript:void(0)">
                                <i class="fa fa-fw fa-print mr-5"></i>4. Checkout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <form id="form-checkout" method="post" onsubmit="return false;">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="content-heading mb-0 pt-0">Informasi Pendaftar Domain</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Anda dapat menentukan detail kontak terdaftar alternatif untuk pendaftaran domain dalam pesanan Anda ketika melakukan pemesanan atas nama orang atau entitas lain. Jika Anda tidak memerlukan ini, Anda dapat melewati bagian ini.</p>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-lg-8">
                                <select class="form-control" name="domain_kontak" id="domain_kontak">
                                    <option value="0">Gunakan Informasi Kontak Akun</option>
                                    <option value="1">Buat Informasi Kontak Baru</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="new_contact" style="display:none;">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="field-nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Lengkap">
                                        <div id="error-nama" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="field-phone">No. Handphone</label>
                                        <input type="text" class="form-control" id="field-phone" name="phone" placeholder="Masukan No. Handphone">
                                        <div id="error-phone" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-kota">Provinsi</label>
                                        <select class="form-control" name="provinsi" id="field-provinsi">
                                            <option value="">Pilih provinsi</option>
                                            @foreach($provinsi as $k)
                                            <option value="{{ $k->id }}">{{ ucwords(strtolower($k->name)) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback" id="error-provinsi">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-kecamatan">Kecamatan</label>
                                        <select class="form-control" name="kecamatan" id="field-kecamatan" disabled>
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-kecamatan">Invalid feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="field-email">Alamat Email</label>
                                        <input type="email" class="form-control" id="field-email" name="email" placeholder="Masukan Alamat Email">
                                        <div id="error-email" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="field-perusahaan">Perusahaan (Optional)</label>
                                        <input type="text" class="form-control" id="field-perusahaan" name="perusahaan" placeholder="Masukan Nama Perusahaan">
                                        <div id="error-perusahaan" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-kota">Kota</label>
                                        <select class="form-control" name="kota" id="field-kota" disabled>
                                            <option value="">Pilih Kota</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-kota">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-kelurahan">Kelurahan/Desa</label>
                                        <select class="form-control" name="kelurahan" id="field-kelurahan" disabled>
                                            <option value="">Pilih Kelurahan/Desa</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-kelurahan">Invalid feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="field-nama">Alamat Lengkap</label>
                                        <textarea name="alamat" id="field-alamat" class="form-control"></textarea>
                                        <div id="error-nama" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="content-heading mb-0 pt-0">Metode Pembayaran</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Silahkan Lakukan Transfer Manual Ke Rekening </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @include('backend.client.order.cart')
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-alt-primary btn-block">
                                    <i class="si si-check mr-5"></i>
                                    Selesaikan Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/backend/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script>
$(document).ready(function () {
    $("#form-checkout").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-checkout')[0]);
        $.ajax({
            url : laroute.route('order.checkout'),
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

    $('#field-provinsi').change(function () {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('wilayah.kota') }}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function (result) {
                    $("#field-kota").prop('disabled', false);
                    $('#field-kota').html(result);
                }
            })
        }else{
            $("#field-kota").prop('disabled', true);
            $('#field-kota').html('<option value="">Pilih Kota</option>');
        }
    });

    $('#field-kota').change(function () {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('wilayah.kecamatan') }}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function (result) {
                    $("#field-kecamatan").prop('disabled', false);
                    $('#field-kecamatan').html(result);
                }
            })
        }else{
            $("#field-kecamatan").prop('disabled', true);
            $('#field-kecamatan').html('<option value="">Pilih Kecamatan</option>');
        }
    });

    $('#field-kecamatan').change(function () {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('wilayah.kelurahan') }}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function (result) {
                    $("#field-kelurahan").prop('disabled', false);
                    $('#field-kelurahan').html(result);
                }
            })
        }else{
            $("#field-kelurahan").prop('disabled', true);
            $('#field-kelurahan').html('<option value="">Pilih Kelurahan/Desa</option>');
        }
    });

    $('#domain_kontak').change(function () {
        if ($(this).val() == 1) {
            $('#new_contact').show();
        }else{
            $('#new_contact').hide();
        }
    });
});
</script>
@endpush
