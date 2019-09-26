@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Invoice Saya</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Invoice Saya</h3>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-kategori">
                        <thead>
                            <tr>
                                <th>No. Invoice</th>
                                <th>Tgl Invoice</th>
                                <th>Tgl Tempo</th>
                                <th>Total</th>
                                <th>Status</th>
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
@stop
@push('scripts')
@endpush
