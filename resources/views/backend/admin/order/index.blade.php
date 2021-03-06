@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Domain</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Kelola Order</h3>
                    <a href="{{ route('admin.order.tambah') }}" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
                        <i class="si si-plus mr-5"></i>
                        Order Produk Baru
                    </a>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-order" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>No. Invoice</th>
                                <th>Tgl</th>
                                <th>Klien</th>
                                <th>Pembayaran</th>
                                <th>Total</th>
                                <th>Pembayaran</th>
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
    $('#list-order').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.order') }}",
        columns: [
            {
                data: 'no_invoice',
                name: 'no_invoice'
            },
            {
                data: 'tgl',
                name: 'tgl'
            },
            {
                data: 'client',
                name: 'client'
            },
            {
                data: 'metode_pembayaran',
                name: 'metode_pembayaran'
            },
            {
                data: 'total',
                name: 'total'
            },
            {
                data: 'status_pembayaran',
                name: 'status_pembayaran'
            },
            {
                data: 'status_order',
                name: 'status_order'
            },
        ]
    });
});

function detail(id) {
    var url = '{{ route("admin.order.detail", ":id") }}';
    url = url.replace(':id', id);
    document.location.href=url;
}
</script>
@endpush
