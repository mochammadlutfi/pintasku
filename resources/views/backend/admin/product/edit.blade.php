@extends('backend.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/backend/js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/js/plugins/summernote/summernote-bs4.css') }}">
@endsection


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
                    <form id="form-product" method="post" action = "" onsubmit="return false;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="field-nama">Nama Produk/Layanan</label>
                                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Produk/Layanan" value="{{ $data->name }}">
                                        <div id="error-nama" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12" for="field-slug">Slug</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="field-slug" name="slug" placeholder="Masukan Slug Produk/Layanan" value="{{ $data->slug }}">
                                        <div class="invalid-feedback" id="error-slug">Invalid feedback</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="field-tipe">Tipe Produk</label>
                                        <select class="form-control" name="tipe" id="field-tipe">
                                            <option value="">Pilih</option>
                                            <option value="hosting" <?php if($data->tipe == 'hosting'){ echo 'selected="selected"'; } ?>>Web Hosting</option>
                                            <option value="webdev" <?php if($data->tipe == 'webdev'){ echo 'selected="selected"'; } ?>>Web Development</option>
                                            <option value="appdev" <?php if($data->tipe == 'appdev'){ echo 'selected="selected"'; } ?>>App Development</option>
                                            <option value="webapp" <?php if($data->tipe == 'webapp'){ echo 'selected="selected"'; } ?>>Web Application</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-tipe">Invalid feedback</div>
                                    </div>
                                </div>


                                <div class="form-group row" <?php if($data->tipe == 'webapp' || $data->tipe == 'appdev'){ echo 'style="display:none;"'; } ?>>
                                    <div class="col-lg-12">
                                        <label for="field-tipe">Paket Cpanel</label>
                                        <select class="form-control" name="tipe" id="field-tipe">
                                            <option value="">Pilih</option>
                                            @foreach($cpanel->package as $d)
                                                <option value="{{ $d->name }}" <?php if($data->package == $d->name){ echo 'selected="selected"'; } ?>>{{ $d->name }}</option>
                                            @endforeach
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
                                                        <option value="{{ $k->id }}" <?php if($data->category_id == $k->id){ echo 'selected="selected"'; } ?>>{{ $k->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="error-kategori" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="deskripsi" id="field-deskripsi">{{ $data->description }}</textarea>
                                        <div id="error-deskripsi" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group row" id="tipe_pembayaran">
                                    <label class="col-lg-3">Tipe Pembayaran</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="hrg" id="field-hrg_gratis" value="gratis" <?php if($data->harga->tipe == 'gratis'){ echo 'checked="checked"'; } ?>>
                                            <label class="custom-control-label" for="field-hrg_gratis">Gratis</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="hrg" id="field-hrg_sekali" value="sekali" <?php if($data->harga->tipe == 'sekali'){ echo 'checked="checked"'; } ?>>
                                            <label class="custom-control-label" for="field-hrg_sekali">Sekali bayar</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="hrg" id="field-hrg_berulang" value="berulang" <?php if($data->harga->tipe == 'berulang'){ echo 'checked="checked"'; } ?>>
                                            <label class="custom-control-label" for="field-hrg_berulang">Berulang</label>
                                        </div>
                                        <div class="invalid-feedback" id="error-hrg">Invalid feedback</div>
                                    </div>
                                </div>

                                <div class="form-group row" id="kol-sekali" <?php if($data->harga->tipe !== 'sekali'){ echo 'style="display:none;"'; } ?> >
                                    <label class="col-md-3" for="field-hrg_sekali">Harga</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="field-hrg_sekali" name="hrg_sekali" placeholder=".." value="{{ $data->harga->sekali }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div id="error-hrg_sekali" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="form-group row" id="kol-berulang" <?php if($data->harga->tipe !== 'berulang'){ echo 'style="display:none;"'; } ?>>
                                    <label class="col-md-3" for="field-hrg_pokok">Harga</label>
                                    <div class="col-lg-9">
                                        <table class="table table-vcenter">
                                            <tbody>
                                                <tr>
                                                    <td>Perbulan</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="perbulan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Triwulan</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="triwulan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Caturwulan</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="caturwulan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Semester</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="semester">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tahunan</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="tahunan">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group row" id="domain_gratis">
                                    <label class="col-3">Domain Gratis</label>
                                    <div class="col-9">
                                        <div class="custom-control custom-radio mb-5">
                                            <input class="custom-control-input" type="radio" name="free_domain" id="field-free_domain1" value="0" <?php if($data->free_domain == '0'){ echo 'checked="checked"'; } ?>>
                                            <label class="custom-control-label" for="field-free_domain1">Tidak</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input class="custom-control-input" type="radio" name="free_domain" id="field-free_domain2" value="1" <?php if($data->free_domain == '1'){ echo 'checked="checked"'; } ?>>
                                            <label class="custom-control-label" for="field-free_domain2">Domain gratis hanya registrasi/transfer</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input class="custom-control-input" type="radio" name="free_domain" id="field-free_domain3" value="2" <?php if($data->free_domain == '2'){ echo 'checked="checked"'; } ?>>
                                            <label class="custom-control-label" for="field-free_domain3">Domain gratis registrasi/transfer dan perpanjang (jika produk diperpanjang)</label>
                                        </div>
                                        <div class="invalid-feedback" id="error-free_domain"></div>
                                    </div>
                                </div>
                                <div class="form-group row" id="kol-ketentuan_domain"<?php if($data->free_domain == '0'){ echo 'style="display:none;"'; } ?>>
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
                                <div class="form-group row" id="kol-tld"<?php if($data->free_domain == '0'){ echo 'style="display:none;"'; } ?>>
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
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group row mb-3">
                                    <div class="col-lg-12">
                                        <div class="content-heading mb-0 pt-0">Status</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12">Publikasi</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-primary css-radio">
                                            <input type="radio" class="css-control-input" id="status_publikasi" name="status" value="1" <?php if($data->status == '1'){ echo 'checked="checked"'; } ?>>
                                            <span class="css-control-indicator"></span> Publikasikan
                                        </label>
                                        <label class="css-control css-control-secondary css-radio">
                                            <input type="radio" class="css-control-input" id="status_draft" name="status" value="0" <?php if($data->status == '0'){ echo 'checked="checked"'; } ?>>
                                            <span class="css-control-indicator"></span> Draft
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-5"></i>Simpan</button>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-lg-12">
                                        <div class="content-heading mb-0 pt-0">Featured Image</div>
                                    </div>
                                </div>
                                <div class="row gutters-tiny">
                                    <div class="col-lg-12">
                                        <div class="text-center mb-15">
                                            <img id="preview_img" src="{{ asset('assets/img/placeholder/featured_img.png') }}" width="100%">
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="field-featured_img" name="featured_img" data-toggle="custom-file-input">
                                            <label class="custom-file-label" for="featured_img">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/backend/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
jQuery(function(){ Codebase.helpers(['datepicker', 'select2',]); });

$(document).ready(function () {

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
    $("#field-featured_img").change(function (e) {
        if (e.files && e.files[0]) {
            var reader = new FileReader();
            var filename = $("#field-featured_img").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                // debugger;
                $('#img_preview').attr('src', e.target.result);
                $('#img_preview').hide();
                $('#img_preview').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(e.files[0]);
        }
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

    $("#form-product").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-product')[0]);
        $.ajax({
            url : laroute.route('admin.product.update'),
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
