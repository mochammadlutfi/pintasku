@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('beranda') }}">Beranda</a>
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
                                <th>Tanggal Invoice</th>
                                <th>Tanggal Jatuh Tempo</th>
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
<script>
$(function () {
    $('#list-invoice').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('invoice') }}",
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
                data: 'tempo',
                name: 'tempo'
            },
            {
                data: 'total',
                name: 'total'
            },
            {
                data: 'status',
                name: 'status'
            },
        ]
    });
});

function detail(id) {
    var url = '{{ route("invoice.detail", ":id") }}';
    url = url.replace(':id', id);
    document.location.href=url;
}
</script>
@endpush
