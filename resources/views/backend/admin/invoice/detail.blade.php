@extends('backend.layouts.master')

@section('styles')
 <link rel="stylesheet" href="{{ asset('assets/backend/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('admin.invoice') }}">Invoice</a>
        <span class="breadcrumb-item active">Detail Invoice</span>
    </nav>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">#{{ $invoice->kode }}</h3>
            <div class="block-options">

            </div>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#ringkasan">Ringkasan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pembayaran">Pembayaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#catatan">Catatan</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="ringkasan" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table">
                                            <tr>
                                                <td>Client</td>
                                                <td>
                                                    {{ $invoice->client->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Invoice</td>
                                                <td>
                                                    {{ date('d-m-Y', strtotime($invoice->created_at)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Tempo Invoice</td>
                                                <td>
                                                    {{ date('d-m-Y', strtotime($invoice->created_at)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Hutang</td>
                                                <td>
                                                    Rp {{ number_format($invoice->total,0,",",".") }},-
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if($invoice->status == 1)
                                                <div class="h3 text-success text-center">Sudah Bayar</div>
                                                <div class="">Dibayar Tgl </div>
                                                @elseif($invoice->status == 0)
                                                <div class="h2 text-warning text-center">Belum Bayar</div>
                                                @else
                                                <div class="h2 text-danger text-center">Dibatalkan</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pembayaran" role="tabpanel">
                                <form id="form-pembayaran" method="POST" onsubmit="return false;">
                                @csrf
                                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="field-pay_tgl">Tanggal</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="field-pay_tgl" name="pay_tgl" placeholder="Masukan Tanggal Pembayaran">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="field-pay_metode">Metode Pembayaran</label>
                                            <div class="col-lg-8">
                                                <select name="pay_metode" id="field-pay_metode" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="bank transfer">Bank Transfer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="field-pay_jumlah">Jumlah</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            Rp.
                                                        </span>
                                                    </div>
                                                    <input type="number" class="form-control" id="field-pay_jumlah" name="pay_jumlah" placeholder="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-5"></i>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="catatan" role="tabpanel">
                                <form id="form-pembayaran" method="POST" onsubmit="return false;">
                                    <div class="row">
                                        <div class="col-lg-10">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-vcenter">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Tipe</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($item as $i)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $i->tipe }}
                                </td>
                                <td>
                                    {{ $i->deskripsi }}
                                </td>
                                <td>
                                        Rp {{ number_format($i->jumlah,0,",",".") }},-
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">
                                    Total
                                </td>
                                <td>Rp {{ number_format($invoice->total,0,",",".") }},-</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table v-center">
                        <thead class="thead-light">
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Pembayaran</th>
                            <th>Jumlah</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/backend/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script>
$('#field-pay_tgl').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    todayHighlight: true
});

$(document).ready(function () {
    $("#form-pembayaran").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#form-pembayaran')[0]);
        $.ajax({
            url : laroute.route('admin.invoice.pembayaran'),
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
                            window.location.reload();
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
