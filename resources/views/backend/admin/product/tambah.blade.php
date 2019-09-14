@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('admin.product') }}">Produk</a>
        <span class="breadcrumb-item active">Tambah Produk Baru</span>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Produk Baru</h3>
                </div>
                <div class="block-content pb-15">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <form id="form-product" method="post" action = "" onsubmit="return false;">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="field-nama">Nama Produk/Layanan</label>
                                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Produk/Layanan">
                                        <div id="error-nama" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="field-slug">Slug</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="field-slug" name="slug" placeholder="Masukan Slug Produk/Layanan">
                                        <div class="invalid-feedback" id="error-slug">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="field-tipe">Tipe Produk</label>
                                        <select class="form-control" name="tipe" id="field-tipe">
                                            <option value="">Pilih</option>
                                            <option value="hosting">Web Hosting</option>
                                            <option value="webdev">Web Development</option>
                                            <option value="appdev">App Development</option>
                                            <option value="webapp">Web Application</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-tipe">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="field-kategori">Kategori</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="js-select2 form-control" id="field-kategori" name="kategori" style="width: 100%;" data-placeholder="Pilih Kategori">
                                                    <option></option>
                                                    @foreach($kategori as $k)
                                                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="error-kategori" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="deskripsi" id="field-deskripsi"></textarea>
                                        <div id="error-deskripsi" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group row" id="tipe_pembayaran">
                                    <label class="col-lg-3">Tipe Pembayaran</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="hrg" id="field-hrg_gratis" value="gratis" checked="">
                                            <label class="custom-control-label" for="field-hrg_gratis">Gratis</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="hrg" id="field-hrg_sekali" value="sekali">
                                            <label class="custom-control-label" for="field-hrg_sekali">Sekali bayar</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="hrg" id="field-hrg_berulang" value="berulang">
                                            <label class="custom-control-label" for="field-hrg_berulang">Berulang</label>
                                        </div>
                                        <div class="invalid-feedback" id="error-hrg">Invalid feedback</div>
                                    </div>
                                </div>

                                <div class="form-group row" id="kol-sekali" style="display:none;">
                                    <label class="col-md-3" for="field-hrg_sekali">Harga</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="field-hrg_sekali" name="hrg_sekali" placeholder="..">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div id="error-hrg_sekali" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="form-group row" id="kol-berulang" style="display:none;">
                                    <label class="col-md-3" for="field-hrg_pokok">Harga</label>
                                    <div class="col-lg-9">
                                        <table class="table table-vcenter">
                                            <thead class="thead-light">
                                                <th>Perbulan</th>
                                                <th>Triwulan</th>
                                                <th>Caturwulan</th>
                                                <th>Semester</th>
                                                <th>Tahunan</th>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <input type="number" class="form-control" name="perbulan">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="triwulan">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="caturwulan">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="semester">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="tahunan">
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group row" id="domain_gratis">
                                    <label class="col-3">Domain Gratis</label>
                                    <div class="col-9">
                                        <div class="custom-control custom-radio mb-5">
                                            <input class="custom-control-input" type="radio" name="free_domain" id="field-free_domain1" value="0" checked="">
                                            <label class="custom-control-label" for="field-free_domain1">Tidak</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input class="custom-control-input" type="radio" name="free_domain" id="field-free_domain2" value="1">
                                            <label class="custom-control-label" for="field-free_domain2">Domain gratis hanya registrasi/transfer</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input class="custom-control-input" type="radio" name="free_domain" id="field-free_domain3" value="2">
                                            <label class="custom-control-label" for="field-free_domain3">Domain gratis registrasi/transfer dan perpanjang (jika produk diperpanjang)</label>
                                        </div>
                                        <div class="invalid-feedback" id="error-free_domain"></div>
                                    </div>
                                </div>
                                <div class="form-group row" id="kol-ketentuan_domain" style="display:none;">
                                    <label class="col-lg-3" for="field-ketentuan_free_domain">Ketentuan Domain Gratis</label>
                                    <div class="col-lg-8">
                                        <select class="js-select2 form-control" id="field-ketentuan_free_domain" name="ketentuan_free_domain" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                            <option></option>
                                            <option value="1">Sekali Bayar</option>
                                            <option value="2">Bulanan</option>
                                            <option value="3">Triwulan</option>
                                            <option value="4">Caturwulan</option>
                                            <option value="5">Semester</option>
                                            <option value="6">Tahunan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="kol-tld" style="display:none;">
                                    <label class="col-lg-3" for="field-tld_free_domain">TLDs Domain Gratis</label>
                                    <div class="col-lg-8">
                                        <select class="js-select2 form-control" id="field-tld_free_domain" name="tld_free_domain" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                            <option></option>
                                            @foreach($domain as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-alt-primary btn-block">
                                            <i class="si si-check mr-5"></i>
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/backend/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
$(document).ready(function () {
    $("#field-foto").change(function (event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#field-foto").on('click', function (event) {
        RecurFadeIn();
    });

    $('#tipe_pembayaran').change(function(){
        sel_val = $("input[name='hrg']:checked").val();

        if(sel_val == 'sekali')
        {
            $('#kol-sekali').show();
            $('#kol-berulang').hide();
        }else if(sel_val == 'berulang'){
            $('#kol-berulang').show();
            $('#kol-sekali').hide();
        }else{
            $('#kol-berulang').hide();
            $('#kol-sekali').hide();
        }
    });

    $('#domain_gratis').change(function(){
        domain_val = $("input[name='free_domain']:checked").val();

        if(domain_val == '0')
        {
            $('#kol-ketentuan_domain').hide();
            $('#kol-tld').hide();
        }else{
            $('#kol-ketentuan_domain').show();
            $('#kol-tld').show();
        }
    });

    $(document).on('keyup', '#field-nama', function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^\w ]+/g, '');
        Text = Text.replace(/ +/g, '-');
        $("#field-slug").val(Text);
    });

    $('#field-deskripsi').summernote({
        height: 200,
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#field-foto").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                // debugger;
                $('#img_preview').attr('src', e.target.result);
                $('#img_preview').hide();
                $('#img_preview').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    }

    function RecurFadeIn() {
        FadeInAlert("Wait for it...");
    }

    function FadeInAlert(text) {
        $(".alert").show();
        $(".alert").text(text).addClass("loading");
    }

    $("#form-product").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-product')[0]);
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
