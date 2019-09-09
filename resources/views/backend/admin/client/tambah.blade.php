@extends('backend.layouts.master')

@section('content')

<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda')}}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('admin.client.list')}}">Klien</a>
        <span class="breadcrumb-item active">Tambah Klien Baru</span>
    </nav>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tambah Klien Baru</small></h3>
        </div>
        <div class="block-content pb-15">
            <form id="form-client" method="POST" onsubmit="return false;">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Lengkap">
                                <div id="error-nama" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-username">Username</label>
                                <input type="text" class="form-control" id="field-username" name="username" placeholder="Masukan Username">
                                <div id="error-username" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-email">Alamat Email</label>
                                <input type="text" class="form-control" id="field-email" name="email" placeholder="Masukan Alamat Email">
                                <div id="error-email" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-no_hp">No. Handphone</label>
                                <input type="text" class="form-control" id="field-no_hp" name="no_hp" placeholder="Masukan No. Handphone">
                                <div id="error-no_hp" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-password">Password</label>
                                <input type="password" class="form-control" id="field-password" name="password" placeholder="Masukan Password">
                                <div id="error-password" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-knf_password">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="field-knf_password" name="knf_password" placeholder="Masukan Konfirmasi Password">
                                <div id="error-knf_password" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
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
                                <label class="col-form-label" for="field-kota">Kota</label>
                                <select class="form-control" name="kota" id="field-kota" disabled>
                                    <option value="">Pilih Kota</option>
                                </select>
                                <div class="invalid-feedback" id="error-kota">Invalid feedback</div>
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
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="col-form-label" for="field-kelurahan">Kelurahan/Desa</label>
                                <select class="form-control" name="kelurahan" id="field-kelurahan" disabled>
                                    <option value="">Pilih Kelurahan/Desa</option>
                                </select>
                                <div class="invalid-feedback" id="error-kelurahan">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="col-form-label" for="field-alamat">Alamat Lengkap</label>
                                <textarea class="form-control" id="field-alamat" name="alamat" rows="2"></textarea>
                                <div class="invalid-feedback" id="error-alamat">Invalid feedback</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-alt-primary btn-block">
                            <i class="si si-check mr-15"></i>
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script>
$(document).ready(function(){

    $("#form-client").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-penyewa')[0]);
        $.ajax({
            url : "<?= route('admin.client.tambah'); ?>",
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
});
</script>
@endpush
