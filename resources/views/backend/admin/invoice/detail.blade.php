@extends('backend.layouts.master')

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
                                                    {{ date('d-m-Y', strtotime($invoice->client->name)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Tempo Invoice</td>
                                                <td>
                                                    {{ date('d-m-Y', strtotime($invoice->client->name)) }}
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

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pembayaran" role="tabpanel">
                                <h4 class="font-w400">Profile Content</h4>
                                <p>...</p>
                            </div>
                            <div class="tab-pane" id="catatan" role="tabpanel">
                                <h4 class="font-w400">Settings Content</h4>
                                <p>...</p>
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
                                <th></th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>

</script>
@endpush
