@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Invoice</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Kelola Data Invoice</h3>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-invoice" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>No. Invoice</th>
                                <th>Klien</th>
                                <th>Total</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Tgl</th>
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
    $('#list-invoice').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.invoice') }}",
        columns: [
            {
                data: 'no_invoice',
                name: 'no_invoice'
            },
            {
                data: 'client',
                name: 'client'
            },
            {
                data: 'total',
                name: 'total'
            },
            {
                data: 'metode_pembayaran',
                name: 'metode_pembayaran'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'tgl',
                name: 'tgl'
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
