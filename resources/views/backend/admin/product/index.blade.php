@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Data Produk</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Kelola Data Produk</h3>
                    <a href="{{ route('admin.product.tambah') }}" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
                        <i class="si si-plus mr-5"></i>
                        Tambah Data Produk Baru
                    </a>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-barang" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual 1</th>
                                <th>Harga Jual 2</th>
                                <th>Harga Jual 3</th>
                                <th>Sisa Stok</th>
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
@stop
@push('scripts')
<script>
$(function () {
    $('#list-barang').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?= route('admin.product'); ?>",
        columns: [
            {
                data: 'kode',
                name: 'kode'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'satuan',
                name: 'satuan'
            },
            {
                data: 'hrg_beli',
                name: 'hrg_beli'
            },
            {
                data: 'hrg_1',
                name: 'hrg_1'
            },
            {
                data: 'hrg_2',
                name: 'hrg_2'
            },
            {
                data: 'hrg_3',
                name: 'hrg_3'
            },
            {
                data: 'jml_stok',
                name: 'jml_stok'
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
</script>
@endpush
