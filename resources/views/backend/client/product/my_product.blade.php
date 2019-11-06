@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Produk / Layanan Saya</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Produk / Layanan Saya</h3>
                    <button id="btn_tambah" type="button" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
                        <i class="si si-plus mr-5"></i>
                        Tambah Domain
                    </button>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-produk">
                        <thead>
                            <tr>
                                <th>Tipe</th>
                                <th>Produk / Layanan</th>
                                <th>Harga</th>
                                <th>Jatuh Tempo</th>
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
<script>
    $(function () {
        $('#list-produk').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('my_product') }}",
            columns: [
                {
                    data: 'tipe',
                    name: 'tipe'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'next',
                    name: 'next'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ]
        });
    });
</script>
@endpush
