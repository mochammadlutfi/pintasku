@extends('backend.layouts.master')

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <span class="breadcrumb-item active">Domain saya</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Domain Saya</h3>
                    <a href="{{ route('domain.cari') }}" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
                        <i class="si si-magnifier mr-5"></i>
                        Cari Domain
                    </a>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-kategori">
                        <thead>
                            <tr>
                                <th>Domain</th>
                                <th>Tgl Daftar</th>
                                <th>Tgl Tempo</th>
                                <th>Perbaharui Otomatis</th>
                                <th>Status</th>
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
@endpush
