@extends('backend.layouts.master')

@section('styles')
<style>

</style>
@endsection


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
                            {{-- Order Info --}}
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
                                    <label class="col-lg-3" for="field-metode_pembayaran">Metode Pembayaran</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="metode_pembayaran" id="field-metode_pembayaran">
                                            <option value="">Pilih</option>
                                            <option value="transfer">Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-status_order">Status Order</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="status_order" id="field-status_order">
                                            <option value="">Pilih</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pending</option>
                                        </select>
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
                                        <div class="invalid-feedback" id="error-product">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row" id="kol-domain">
                                    <label class="col-lg-3" for="field-domain">Domain</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="domain_produk" name="domain_produk" placeholder="Masukan Domain Produk">
                                        <div class="invalid-feedback" id="error-domain_produk">Invalid feedback</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3" for="field-bill_cycles">Durasi Paket</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="bill_cycles" id="field-bill_cycles">
                                            <option value="bulanan">Bulanan</option>
                                            <option value="triwulan">Triwulan</option>
                                            <option value="caturwulan">Caturwulan</option>
                                            <option value="semester">Semester</option>
                                            <option value="tahunan">Tahunan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-lg-12">
                                        <div class="content-heading mb-0 pt-0">Pendaftaran Domain</div>
                                    </div>
                                </div>
                                <div class="form-group row" id="domain_register">
                                    <label class="col-lg-3">Tipe Pendaftaran</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipe_daftar" id="field-tipe_daftar1" value="0" checked="">
                                            <label class="custom-control-label" for="field-tipe_daftar1">Tidak</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipe_daftar" id="field-tipe_daftar2" value="1">
                                            <label class="custom-control-label" for="field-tipe_daftar2">Registrasi</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipe_daftar" id="field-tipe_daftar3" value="2">
                                            <label class="custom-control-label" for="field-tipe_daftar3">Transfer</label>
                                        </div>
                                    </div>
                                </div>
<<<<<<< Updated upstream
                                <div class="form-group row" id="kol-domain">
=======
                                <div class="form-group row" id="kol-domain_tld" style="display:none;">
>>>>>>> Stashed changes
                                    <label class="col-lg-3" for="field-domain">Domain</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="domain_name" id="field-domain_name">
                                    </div>
                                </div>
                                <div class="form-group row" id="kol-domain_durasi" style="display:none;">
                                    <label class="col-lg-3" for="field-hrg_pokok">Periode Pendaftaran</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="bill_cycles">
                                            <option value="1">1 Tahun</option>
                                            <option value="2">2 Tahun</option>
                                            <option value="3">3 Tahun</option>
                                            <option value="4">4 Tahun</option>
                                            <option value="5">5 Tahun</option>
                                            <option value="6">6 Tahun</option>
                                            <option value="7">7 Tahun</option>
                                            <option value="8">8 Tahun</option>
                                            <option value="9">9 Tahun</option>
                                            <option value="10">10 Tahun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="kol-domain_addons" style="display:none;">
                                    <label class="col-lg-3">Addons Domain</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="dns_management" id="field-dns_management" value="1" checked="">
                                            <label class="custom-control-label" for="field-dns_management">DNS Management</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="emailforwarding" id="field-emailforwarding" value="option1" checked="">
                                            <label class="custom-control-label" for="field-emailforwarding">Email Forwarding</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="idprotection" id="field-idprotection" value="option1" checked="">
                                            <label class="custom-control-label" for="idprotection">ID Protection</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Ringkasan Order --}}
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <h4 class="text-center">Ringkasan Order</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered" id="ringkasan_order">
                                            <tbody>
                                                <tr class="produk">
                                                    <td colspan="2" class="text-center">
                                                        Tidak Ada Produk yang Dipilih
                                                    </td>
                                                </tr>
                                                <tr class="subtotal">
                                                    <td width="30%">Subtotal</td>
                                                    <td>Rp. 0,-</td>
                                                </tr>
                                                <tr class="h4 total">
                                                    <td width="30%">Total</td>
                                                    <td>Rp. 0,-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-alt-primary btn-block btn-lg">
                                        <i class="si si-check mr-5"></i>
                                        Simpan Order
                                    </button>
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
<script src="{{ asset('assets/backend/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('#domain_register').change(function(){
        domain_val = $("input[name='tipe_daftar']:checked").val();

        if(domain_val == '0')
        {
            $('#kol-domain_tld').hide();
            $('#kol-domain_durasi').hide();
            $('#kol-domain_addons').hide();
        }else{
            $('#kol-domain_tld').show();
            $('#kol-domain_durasi').show();
            $('#kol-domain_addons').show();
        }
    });

    $('#field-domain_name').change(function() {
        if (/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/.test($(this).val())) {
            var value = $(this).val();
            var tipe = $("input[name='tipe_daftar']:checked").val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('admin.order.add_domain') }}",
                method: "POST",
                data: {
                    value: value,
                    tipe:tipe,
                    _token: _token,
                },
                success: function (result) {
                    $('#ringkasan_order').replaceWith(result);
                }
            })
        }
        // else {
        //     alert("Enter Valid Domain Name");
        //     val.name.focus();
        //     return false;
        // }
        // if ( != '') {

        // }else{
        //     $("#field-kota").prop('disabled', true);
        //     $('#field-kota').html('<option value="">Pilih Kota</option>');
        // }
    });


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

    $('#field-product').change(function () {
        if ($(this).val() != '') {
            var bill_cycles = $('#field-bill_cycles').val();
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('admin.order.add_cart') }}",
                method: "POST",
                data: {
                    bill_cycles: bill_cycles,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function (result) {
                    $('#ringkasan_order').replaceWith(result);
                }
            })
        }else{
            $("#field-kota").prop('disabled', true);
            $('#field-kota').html('<option value="">Pilih Kota</option>');
        }
    });

    $('#field-bill_cycles').change(function () {
        if ($(this).val() != '') {
            var bill_cycles = $(this).val();
            var value = $('#field-product').val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('admin.order.change_cycles') }}",
                method: "POST",
                data: {
                    bill_cycles: bill_cycles,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function (result) {
                    $('#ringkasan_order').replaceWith(result);
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
            url : laroute.route('admin.order.tambah'),
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


function hapus_cart(id){
    swal({
        title: "Anda Yakin?",
        text: "Hapus Produk Dari Keranjang",
        icon: "warning",
        buttons: ["Batal", "Hapus"],
        dangerMode: true,
        closeOnClickOutside: false
    })
    .then((willDelete) => {
        if (willDelete) {
        $.ajax({
            url: laroute.route('admin.order.remove_cart', { id: id }),
            type: "GET",
            success: function(data) {
                swal({
                    title: "Berhasil",
                    text: "Produk Sudah Dihapus Dari Keranjang",
                    timer: 3000,
                    buttons: false,
                    icon: 'success',
                    allowOutsideClick: false
                });
                $('#ringkasan_order').replaceWith(data);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
        } else {
            window.setTimeout(function(){
                location.reload();
            } ,1500);
        }
    });
}

</script>
@endpush
