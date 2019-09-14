@extends('backend.layouts.master')

@section('content')

<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda')}}">Beranda</a>
        <span class="breadcrumb-item active">Client List</span>
    </nav>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Client <small>List</small></h3>
        </div>
        <div class="block-content">
            <table id="users_list" class="table table-hover table-striped data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat Email</th>
                        <th>Perusahaan</th>
                        <th>Layanan</th>
                        <th>Tgl Gabung</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script type="text/javascript">
$(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.client.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'perusahaan', name: 'perusahaan'},
            {data: 'layanan', name: 'layanan'},
            {data: 'tgl', name: 'tgl'},
            {data: 'status', name: 'status'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

});
function detail(id) {
    var url = '{{ route("admin.client.detail", ":id") }}';
    url = url.replace(':id', id);
    document.location.href=url;
}
</script>
@endpush
