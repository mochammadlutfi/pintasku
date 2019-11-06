@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Lisensi</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Kelola Data Lisensi</h3>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-transaksi" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>Kode Lisensi</th>
                                <th>Produk</th>
                                <th>Client</th>
                                <th>Tgl Tempo</th>
                                <th>Digunakan</th>
                                <th>Status</th>
                                <th>Validitas</th>
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
    $('#list-transaksi').DataTable({
        processing: true,
        serverSide: true,
        ajax: laroute.route('admin.license'),
        columns: [
            {
                data: 'kode',
                name: 'kode'
            },
            {
                data: 'produk',
                name: 'produk'
            },
            {
                data: 'client',
                name: 'client'
            },
            {
                data: 'tempo',
                name: 'tempo'
            },
            {
                data: 'digunakan',
                name: 'digunakan'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'validitas',
                name: 'validitas'
            },
        ]
    });
});

function detail(id) {
    var url = '{{ route("admin.invoice.detail", ":id") }}';
    url = url.replace(':id', id);
    document.location.href=url;
}
</script>
@endpush
