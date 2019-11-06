@extends('backend.layouts.master')

@section('content')

<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda')}}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('admin.order')}}">Order</a>
        <span class="breadcrumb-item active">Detail Order</span>
    </nav>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Detail Order</h3>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-lg-6">
                    <table class="table">
                        <tr>
                            <td>Tanggal</td>
                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td>Order #</td>
                            <td>({{ $order->id }})</td>
                        </tr>
                        <tr>
                            <td>Client</td>
                            <td>
                                {{ $order->client->name }}<br>
                                {{ $order->client->alamat }}<br>
                                Desa/Kel. {{ ucwords(strtolower($order->client->kelurahan->name)) }} - Kec. {{ ucwords(strtolower($order->client->kecamatan->name)) }}<br>
                                {{ ucwords(strtolower($order->client->kota->name)) }} - <br>
                                Indonesia
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table">
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>{{ $order->invoice->metode_pembayaran }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Rp {{ number_format($order->total,0,",",".") }},-</td>
                        </tr>
                        <tr>
                            <td>Invoice</td>
                            <td>{{ $order->invoice->kode }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select class="form-control" name="status_order" id="status-order">
                                    <option>Aktif</option>
                                    <option>Pending</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>IP Address</td>
                            <td>{{ $order->ipaddress }} | Lookup</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-vcenter">
                        <thead>
                            <tr class="thead-light">
                                <th>Tipe</th>
                                <th>Deskripsi</th>
                                <th>Durasi</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($item as $i)
                            <tr>
                                <td>
                                    {{ $i->tipe }}
                                </td>
                                <td>
                                    {{ $i->deskripsi }}
                                </td>
                                <td>
                                    {{ $i->durasi }}
                                </td>
                                <td>
                                        Rp {{ number_format($i->jumlah,0,",",".") }},-
                                </td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        Total
                                    </td>
                                    <td>Rp {{ number_format($invoice->total,0,",",".") }},-</td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script type="text/javascript">
</script>
@endpush
