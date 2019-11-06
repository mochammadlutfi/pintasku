@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('admin.license.list') }}">Lisensi</a>
        <span class="breadcrumb-item active">Tipe Lisensi</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Data Tipe Lisensi</h3>
                    <button id="btn_tambah" type="button" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
                        <i class="si si-plus mr-5"></i>
                        Tambah Domain
                    </button>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-kategori">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Max Penggunaan</th>
                                <th>Renewal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
<div class="modal" id="modal_form"tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
        <div class="modal-content">
            <div class="block mb-0">
                <div class="block-header block-header-default">
                        <h3 class="block-title" id="modal_title">Form Title</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form id="form-tld">
                        @csrf
                        <input type="hidden" name="tld_id" value="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-tld">TLD</label>
                                        <input type="text" class="form-control" id="field-tld" name="tld" placeholder="Cth .com .net">
                                        <div class="invalid-feedback" id="error-tld">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-register">Register</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" id="field-register" name="register" placeholder="">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div class="text-danger text-sm" id="error-register"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-transfer">Transfer</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" id="field-transfer" name="transfer" placeholder="">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div class="text-danger text-sm" id="error-transfer"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-renewal">Perpanjang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" id="field-renewal" name="renewal" placeholder="">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div class="text-danger text-sm" id="error-renewal"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-dns_management">DNS Management</label>
                                        <select class="form-control" name="dns_management" id="field-dns_management">
                                            <option value="">Pilih</option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Tidak Aktif</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-dns_management">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-email_forwading">Email Forwarding</label>
                                        <select class="form-control" name="email_forwading" id="field-email_forwading">
                                            <option value="">Pilih</option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Tidak Aktif</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-email_forwading">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-id_protection">ID Protection</label>
                                        <select class="form-control" name="id_protection" id="field-id_protection">
                                            <option value="">Pilih</option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Tidak Aktif</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-id_protection">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-epp_code">EPP Code</label>
                                        <select class="form-control" name="epp_code" id="field-epp_code">
                                            <option value="">Pilih</option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Tidak Aktif</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-epp_code">Invalid feedback</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-2">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-1"></i>Simpan</button>
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
<script>
$(function () {
    $('#list-kategori').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.tld') }}",
        columns: [
            // {
            //     data: 'DT_RowIndex',
            //     name: 'DT_RowIndex'
            // },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'register',
                name: 'register'
            },
            {
                data: 'transfer',
                name: 'transfer'
            },
            {
                data: 'renewal',
                name: 'renewal'
            },
            {
                data: 'dns',
                name: 'dns'
            },
            {
                data: 'id_protection',
                name: 'id_protection'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'epp_code',
                name: 'epp_code'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
});

jQuery(document).ready(function () {
    $(document).on('click', '#btn_tambah', function () {
        save_method = 'tambah';
        $('#form-tld')[0].reset();
        $('#modal_title').text('Add New Category');
        $('#modal_form').modal({
            backdrop: 'static',
            keyboard: false
        })
    });

    $("#form-tld").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($('#form-tld')[0]);

        var link;
        var pesan;
        if (save_method == 'tambah') {
            link = laroute.route('admin.tld.simpan');
            pesan = "kategori Produk Baru Berhasil Ditambahkan";
        } else {
            link = laroute.route('admin.tld.update');
            pesan = "kategori Produk Berhasil Diperbaharui";
        }

        $.ajax({
            url: link,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.is-invalid').removeClass('is-invalid');
                if (response.fail == false) {
                    $('#modal_embed').modal('hide');
                    swal({
                        title: "Berhasil",
                        text: pesan,
                        timer: 3000,
                        buttons: false,
                        icon: 'success'
                    });
                    window.setTimeout(function () {
                        location.reload();
                    }, 1500);
                } else {
                    for (control in response.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(response.errors[control]);
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSimpan').text('Simpan');
                $('#btnSimpan').attr('disabled', false);

            }
        });
    });

});

function edit(id){
    save_method = 'update';
    $('#form-tld')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url : laroute.route('admin.tld.edit', {id : id}),
        type: "GET",
        dataType: "JSON",
        success: function(response)
        {
            $('[name="tld_id"]').val(response.id);
            $('[name="tld"]').val(response.name);
            $('[name="register"]').val(response.register);
            $('[name="transfer"]').val(response.transfer);
            $('[name="renewal"]').val(response.renewal);
            $('[name="dns_management"]').val(response.dnsmanagement);
            $('[name="emailforwarding"]').val(response.emailforwarding);
            $('[name="id_protection"]').val(response.idprotection);
            $('[name="epp_code"]').val(response.eppcode);
            $('#modal_title').text('Perbaharui Data Kategori');
            $('#modal_form').modal({
                backdrop: 'static',
                keyboard: false
            })
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function hapus(id) {
    swal({
        title: "Anda Yakin?",
        text: "Data Yang Dihapus Tidak Akan Bisa Dikembalikan",
        icon: "warning",
        buttons: ["Batal", "Hapus"],
        dangerMode: true,
        closeOnClickOutside: false
    })
    .then((willDelete) => {
        if (willDelete) {
        $.ajax({
            url: laroute.route('admin.kategori.hapus', { id: id }),
            type: "get",
            dataType: "JSON",
            success: function(data) {
                swal({
                    title: "Berhasil",
                    text: "Data Kategori Berhasil Dihapus",
                    timer: 3000,
                    buttons: false,
                    icon: 'success',
                    allowOutsideClick: false
                });
                window.setTimeout(function(){
                    location.reload();
                } ,1500);
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
