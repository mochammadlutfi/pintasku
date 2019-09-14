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
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Produk Baru</h3>
                </div>
                <div class="block-content pb-15">
                    <form id="form-barang" method="post" action = "" onsubmit="return false;">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
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
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="deskripsi" id="field-deskripsi"></textarea>
                                        <div id="error-deskripsi" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="field-kategori">Kategori</label>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <select class="js-select2 form-control" id="field-kategori" name="kategori" style="width: 100%;" data-placeholder="Pilih Kategori">
                                                    <option></option>
                                                    @foreach($kategori as $k)
                                                        @if(Session::has('new_kategori'))
                                                            <option value="{{ $k->kategori_id }}" <?php if(Session::get('new_kategori') == $k->kategori_id){ echo 'selected="selected"'; } ?>>{{ $k->nama }}</option>
                                                        @else
                                                        <option value="{{ $k->kategori_id }}">{{ $k->nama }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <div id="error-kategori" class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" id="tmb_kategori" class="btn btn-alt-primary btn-block"><i class="si si-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="field-hrg_pokok">Harga Produk</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="field-hrg_pokok" name="hrg_pokok" placeholder="..">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div id="error-hrg_pokok" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="field-hrg_pokok">Tipe Pembayaran</label>
                                        <select class="form-control" name="bill_cycles">
                                            <option value="">Pilih</option>
                                            <option value="sekali">Sekali Bayar</option>
                                            <option value="berulang">Berulang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <div class="row justify-content-center mb-10">
                                        <div class="col-12">
                                            <img id="img_preview" src="{{ asset('assets/img/placeholder.png') }}" width="100%"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input js-custom-file-input-enabled" id="field-foto" name="foto" data-toggle="custom-file-input">
                                                <label class="custom-file-label" for="field-foto">Pilih File</label>
                                            </div>
                                            <div id="error-foto" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-5"></i>Simpan</button>
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
    $("#field-foto").change(function (event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#field-foto").on('click', function (event) {
        RecurFadeIn();
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

    $("#form-barang").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-barang')[0]);
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
