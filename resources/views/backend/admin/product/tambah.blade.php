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
                                    <label class="col-md-3" for="field-nama">Nama Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Barang">
                                        <div id="error-nama" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-kategori">Kategori</label>
                                    <div class="col-md-9">
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
                                    <label class="col-md-3" for="field-isi_satuan">Isi Satuan</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="field-isi_satuan" name="isi_satuan" placeholder="Masukan Isi Satuan Barang">
                                        <div id="error-isi_satuan" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-hrg_pokok">Harga Pokok</label>
                                    <div class="col-md-9">
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
                                <div class="form-group row border-b">
                                    <label class="col-12">Harga Jual</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-hrg_1">Harga 1</label>
                                    <div class="col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Rp.
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="field-hrg_1" name="hrg_1" placeholder="..">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        <div id="error-hrg_1" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-hrg_2">Harga 2</label>
                                    <div class="col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Rp.
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="field-hrg_2" name="hrg_2" placeholder="..">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        <div id="error-hrg_2" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-hrg_3">Harga 3</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="field-hrg_3" name="hrg_3" placeholder="..">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div id="error-hrg_3" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-jml_stok">Jumlah jml_stok</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="field-jml_stok" name="jml_stok" placeholder="Masukan Jumlah Stok Barang">
                                        <div id="error-jml_stok" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-min_stok">Minimal Stok</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="field-min_stok" name="min_stok" placeholder="Masukan Minimal Stok Barang">
                                        <div id="error-min_stok" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-merk">Merk/Seri</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="field-merk" name="merk" placeholder="Masukan Merk/Seri Barang">
                                        <div id="error-merk" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="field-merk">Diskon</label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="field-diskon" name="diskon" placeholder="..">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" id="field-diskon" name="diskon" placeholder="..">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
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
<script>
$(document).ready(function () {
    $("#field-foto").change(function (event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#field-foto").on('click', function (event) {
        RecurFadeIn();
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
