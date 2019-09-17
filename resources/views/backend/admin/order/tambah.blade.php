@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('admin.order') }}">Order</a>
        <span class="breadcrumb-item active">Tambah Order</span>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Order Baru</h3>
                </div>
                <div class="block-content pb-15">
                    <form id="form-order" method="post" action = "" onsubmit="return false;">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-md-3" for="field-client">Client</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="field-client" name="client" style="width: 100%;" data-placeholder="Pilih client">
                                                    <option></option>
                                                    @foreach($client as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="error-client" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-tipe">Metode Pembayaran</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="tipe" id="field-tipe">
                                            <option value="">Pilih</option>
                                            <option value="transfer">Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-tipe">Status Order</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="tipe" id="field-tipe">
                                            <option value="">Pilih</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3"></label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="knf_order" id="field-knf_order" value="1" checked="">
                                            <label class="custom-control-label" for="field-knf_order">Konfirmasi Order</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="make_invoice" id="field-make_invoice" value="option1" checked="">
                                            <label class="custom-control-label" for="field-make_invoice">Buat Invoice</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="kirim_email" id="kirim_email" value="option1" checked="">
                                            <label class="custom-control-label" for="kirim_email">Kirim Email</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <div class="col-lg-12">
                                        <div class="content-heading mb-0 pt-0">Layanan/Produk</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-kategori">Kategori Layanan/Produk</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="kategori" id="field-kategori">
                                            <option value="">Pilih</option>
                                            @foreach($kategori as $k)
                                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback" id="error-kategori">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-product">Produk</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="product" id="field-product" disabled>
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="kol-domain">
                                    <label class="col-lg-3" for="field-domain">Domain</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="domain_produk" name="domain_produk" placeholder="Masukan Domain Produk">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-hrg_pokok">Durasi Paket</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="bill_cycles">
                                            <option value="">Pilih</option>
                                            <option value="">Bulanan</option>
                                            <option value="">Triwulan</option>
                                            <option value="">Caturwulan</option>
                                            <option value="">Semester</option>
                                            <option value="">Tahunan</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <div class="col-lg-12">
                                        <div class="content-heading mb-0 pt-0">Pendaftaran Domain</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3">Tipe Pendaftaran</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipe_daftar" id="field-tipe_daftar1" value="option1" checked="">
                                            <label class="custom-control-label" for="field-tipe_daftar1">Tidak</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipe_daftar" id="field-tipe_daftar2" value="option2">
                                            <label class="custom-control-label" for="field-tipe_daftar2">Registrasi</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipe_daftar" id="field-tipe_daftar3" value="option3">
                                            <label class="custom-control-label" for="field-tipe_daftar3">Transfer</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-hrg_pokok">Produk</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="bill_cycles">
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="kol-domain">
                                    <label class="col-lg-3" for="field-domain">Domain</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-hrg_pokok">Periode Pendaftaran</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="bill_cycles">
                                            <option value="">Pilih</option>
                                            <option value="">1 Tahun</option>
                                            <option value="">2 Tahun</option>
                                            <option value="">3 Tahun</option>
                                            <option value="">4 Tahun</option>
                                            <option value="">5 Tahun</option>
                                            <option value="">6 Tahun</option>
                                            <option value="">7 Tahun</option>
                                            <option value="">8 Tahun</option>
                                            <option value="">9 Tahun</option>
                                            <option value="">10 Tahun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3">Addons Domain</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="knf_order" id="field-knf_order" value="1" checked="">
                                            <label class="custom-control-label" for="field-knf_order">DNS Management</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="make_invoice" id="field-make_invoice" value="option1" checked="">
                                            <label class="custom-control-label" for="field-make_invoice">Email Forwarding</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="kirim_email" id="kirim_email" value="option1" checked="">
                                            <label class="custom-control-label" for="kirim_email">ID Protection</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <h4 class="text-center">Ringkasan Order</h4>
                                    </div>
                                </div>
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/backend/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('#field-kategori').change(function () {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('admin.product.json') }}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function (result) {
                    $("#field-product").prop('disabled', false);
                    $('#field-product').html(result);
                }
            })
        }else{
            $("#field-kota").prop('disabled', true);
            $('#field-kota').html('<option value="">Pilih Kota</option>');
        }
    });

    $("#form-order").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-order')[0]);
        $.ajax({
            url : laroute.route('admin.product.tambah'),
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
                    $('.is-invalid').removeClass('is-invalid');
                    if (response.fail == false) {
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
