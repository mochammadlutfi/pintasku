@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Data Produk</span>
    </nav>

    <div class="block">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#web-hosting">Web Hosting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#web-development">Web Development</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mobile-development">Mobile Development</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#web-application">Web Application</a>
            </li>
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active" id="web-hosting" role="tabpanel">
                <table class="table table-hover table-striped" id="list-web_hosting">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Tipe Pembayaran</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="tab-pane" id="web-development" role="tabpanel">
                <h4 class="font-w400">Web Development</h4>
                <p>...</p>
            </div>
            <div class="tab-pane" id="mobile-development" role="tabpanel">
                <h4 class="font-w400">App Development</h4>
                <p>...</p>
            </div>
            <div class="tab-pane" id="web-application" role="tabpanel">
                <h4 class="font-w400">Web Application</h4>
                <p>...</p>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
$(function () {
    $('#list-web_hosting').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?= route('admin.product'); ?>",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'pembayaran',
                name: 'pembayaran'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#list-web_dev').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?= route('admin.product'); ?>",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'pembayaran',
                name: 'pembayaran'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#list-mobile_dev').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?= route('admin.product'); ?>",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'pembayaran',
                name: 'pembayaran'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#list-web_app').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?= route('admin.product'); ?>",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'pembayaran',
                name: 'pembayaran'
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
