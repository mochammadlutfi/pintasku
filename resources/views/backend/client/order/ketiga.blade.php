@extends('backend.layouts.master')

@section('styles')
<style>
    #order-sort .nav-item {
        width: 25%;
    }

    #order-sort .nav-item .active {
        cursor: pointer;
        color: #fff;
        background-color: #3f9ce8;
    }

    #order-sort .nav-link {
        background-color: #f0f2f5;
        margin-left: 15px;
        cursor: not-allowed;
    }

    /* Billing Cycles + Currency
    ====================================*/
    input.cycle-1,
    input.cycle-curr {
        display: none;
    }

    label.cycle-1 {
        color: #333;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        text-align: center;
        padding: 15px 0;
    }

    label.cycle-1 span {
        color: #555;
        font-size: 11px;
        font-weight: 400;
        float: left;
        width: 100%;
    }

    label.cycle-1.regdomain {
        font-size: 16px;
        font-weight: 700;
        padding: 0 0 18px;
    }

    label.cycle-1.regdomain,
    label.cycle-curr {
        color: #333;
        cursor: pointer;
        text-align: center;
    }

    label.cycle-curr {
        padding: 0;
    }

    label.cycle-curr span {
        color: #666;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 3px;
    }

    label.cycle-curr.regdomain {
        color: #333;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        text-align: center;
        padding: 0;
    }

    .cal {
        color: #e9eef2;
        margin-bottom: 10px;
    }

    .cal-domains {
        margin-bottom: 5px;
    }

    .cal-icon {
        margin-bottom: 15px;
    }

    .currency {
        padding-right: 10px;
        margin-bottom: -15px;
    }

    .curr {
        color: #e9eef2;
        margin-bottom: 0;
    }

    .currency-product a {
        padding-right: 5px;
    }

    .currency-product span {
        color: #666;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .fa-money-bill-alt {
        color: #e9eef2;
    }

    input.cycle-1:checked+label.radio i,
    input.cycle-curr:checked+label.radio i,
    input.cycle-1:checked+label.radio i {
        color: #3f9ce8;
    }
</style>
@endsection


@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('beranda') }}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('order') }}">Order</a>
        <span class="breadcrumb-item active">Konfigurasi</span>
    </nav>
    <div class="content-heading pt-15">
        <div class="h2 mb-0">Konfigurasi</div>
    </div>
    <div class="block">
        <div class="block-content pb-15">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="content-heading mb-0 pt-0">Konfigurasi Layanan</div>
                        </div>
                    </div>
                    <div class="row justify-content-center" id="billingcycle_data">
                        <div class="col-sm-2 col-xs-6">
                            <input type="radio" name="billingcycle" value="bulanan" id="sel-bulanan" class="cycle-1" <?php if($item->attributes->bill_cycles == 'bulanan'){ echo 'checked="checked"'; } ?> >
                            <label for="sel-bulanan" class="cycle-1 radio">
                                <div class="cal cal-bulanan"><i class="fa fa-calendar fa-3x"></i></div>
                                <b>Rp {{ number_format($product->harga->bulanan,0,",",".") }},-</b><span>Bulanan</span>
                            </label>
                        </div>
                        <div class="col-sm-2 col-xs-6">
                            <input type="radio" name="billingcycle" value="triwulan" id="sel-triwulan" class="cycle-1" <?php if($item->attributes->bill_cycles == 'triwulan'){ echo 'checked="checked"'; } ?> >
                            <label for="sel-triwulan" class="cycle-1 radio">
                                <div class=" cal cal-triwulan"><i class="fa fa-calendar fa-3x"></i></div>
                                <b>Rp {{ number_format($product->harga->triwulan,0,",",".") }},-</b><span>Triwulan</span>
                            </label>
                        </div>

                        <div class="col-sm-2 col-xs-6">
                            <input type="radio" name="billingcycle" value="caturwulan" id="sel-caturwulan" class="cycle-1" <?php if($item->attributes->bill_cycles == 'caturwulan'){ echo 'checked="checked"'; } ?> >
                            <label for="sel-caturwulan" class="cycle-1 radio">
                                <div class="cal cal-caturwulan"><i class="fa fa-calendar fa-3x"></i></div>
                                <b>Rp {{ number_format($product->harga->caturwulan,0,",",".") }},-</b><span>Caturwulan</span>
                            </label>
                        </div>

                        <div class="col-sm-2 col-xs-6">
                            <input type="radio" name="billingcycle" value="semester" id="sel-semester" class="cycle-1" <?php if($item->attributes->bill_cycles == 'semester'){ echo 'checked="checked"'; } ?> >
                            <label for="sel-semester" class="cycle-1 radio">
                                <div class="cal cal-semester"><i class="fa fa-calendar fa-3x"></i></div>
                                <b>Rp {{ number_format($product->harga->semester,0,",",".") }},-</b><span>Semester</span>
                            </label>
                        </div>

                        <div class="col-sm-2 col-xs-6">
                            <input type="radio" name="billingcycle" value="tahunan" id="sel-tahunan" class="cycle-1" <?php if($item->attributes->bill_cycles == 'tahunan'){ echo 'checked="checked"'; } ?> >
                            <label for="sel-tahunan" class="cycle-1 radio">
                                <div class="cal cal-tahunan"><i class="fa fa-calendar fa-3x"></i></div>
                                <b>Rp {{ number_format($product->harga->tahunan,0,",",".") }},-</b><span>Tahunan</span>
                            </label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="content-heading mb-0 pt-0">Addons Domain</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="block block-rounded block-bordered">
                                <div class="block-content pb-15">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input class="custom-control-input" type="checkbox" name="addons_dnsmanagement" id="field-addons_dnsmanagement" value="1" <?php if( Session::get('domain.attributes.dnsmanagement') == 1){ echo 'checked="checked"'; } ?>>
                                        <label class="custom-control-label" for="field-addons_dnsmanagement">DNS Management</label>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    GRATIS!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="block block-rounded block-bordered">
                                <div class="block-content pb-15">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input class="custom-control-input" type="checkbox" name="addons_idprotection" id="field-addons_idprotection" value="1" <?php if( Session::get('domain.attributes.idprotection') == 1){ echo 'checked="checked"'; } ?>>
                                        <label class="custom-control-label" for="field-addons_idprotection">ID Protection</label>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    GRATIS!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="block block-rounded block-bordered">
                                <div class="block-content pb-15">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input class="custom-control-input" type="checkbox" name="addons_emailforwarding" id="field-addons_emailforwarding" value="1" <?php if( Session::get('domain.attributes.emailforwarding') == 1){ echo 'checked="checked"'; } ?>>
                                        <label class="custom-control-label" for="field-addons_emailforwarding">Email Forwarding</label>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    GRATIS!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="content-heading mb-0 pt-0">Ringkasan Pesanan</div>
                        </div>
                    </div>
                    <table class="table table-bordered" id="ringkasan_order">
                        <tbody>
                        @foreach(Cart::getContent() as $c)
                        <tr class="produk">
                            <td colspan="2" class="text-left">
                                <div class="h4 mb-0">
                                    {{ ($c->attributes->has('tipe') ? ucwords($c->attributes->tipe) : '') }}
                                    <button type="button" class="btn btn-alt-danger btn-sm float-right" onclick="hapus_cart({{ $c->id }})">
                                        <i class="si si-trash"></i>
                                    </button>
                                </div>
                                {{ $c->name }}
                                <br>
                                @if(substr($c->attributes->tipe, 0, 6) == 'Domain')
                                <ul class="fa-ul">
                                    @if($c->attributes->dnsmanagement == 1)
                                    <li><i class="fa fa-check fa-li"></i>DNS Management</li>
                                    @endif
                                    @if($c->attributes->idprotection == 1)
                                    <li><i class="fa fa-check fa-li"></i>ID Protection</li>
                                    @endif
                                    @if($c->attributes->emailforwarding == 1)
                                    <li><i class="fa fa-check fa-li"></i>Email Forwarding</li>
                                    @endif
                                </ul>
                                @endif
                                <div class="h5 mb-0">
                                    <span class="text-left">
                                        {{ ($c->attributes->has('durasi') ? ucwords($c->attributes->durasi) : '') }}
                                    </span>
                                    <span class="float-right text-right">
                                        Rp {{ number_format($c->price,0,",",".") }},-
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="subtotal">
                            <td width="30%">Subtotal</td>
                            <td class="text-right">Rp {{ number_format(Cart::getSubTotal(0),0,",",".") }},-</td>
                        </tr>
                        <tr class="h4 total">
                            <td width="30%">Total</td>
                            <td class="text-right">Rp {{ number_format(Cart::getTotal(0),0,",",".") }},-</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="btn-checkout" href="{{ route('order.checkout') }}" class="btn btn-alt-primary btn-block">
                                <i class="si si-check mr-5"></i>
                                Lanjutkan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
$(document).ready(function () {
    $('#billingcycle_data').change(function(){
        var bill = $("input[name='billingcycle']:checked").val();
        var value = $('#field-product').val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('order.change_cycles') }}",
            method: "POST",
            data: {
                bill_cycles: bill,
                value: value,
                _token: _token,
                dependent: dependent
            },
            success: function (result) {
                $('#ringkasan_order').replaceWith(result);
            }
        })
    });

    $('#field-addons_dnsmanagement').change(function(){
        if ($('#field-addons_dnsmanagement').is(':checked'))
        {
            var value = 1;
        }else{
            var value = 0;
        }
        // var value = $('#field-addons_dnsmanagement').val();
        var _token = $('input[name="_token"]').val();
        var tipe = 'dnsmanagement';
        $.ajax({
            url: "{{ route('order.domain_addon') }}",
            method: "POST",
            data: {
                value: value,
                _token: _token,
                tipe: tipe,
            },
            success: function (result) {
                $('#ringkasan_order').replaceWith(result);
            }
        })
    });

    $('#field-addons_idprotection').change(function(){
        if ($('#field-addons_idprotection').is(':checked'))
        {
            var value = 1;
        }else{
            var value = 0;
        }
        var _token = $('input[name="_token"]').val();
        var tipe = 'idprotection';
        $.ajax({
            url: "{{ route('order.domain_addon') }}",
            method: "POST",
            data: {
                value: value,
                _token: _token,
                tipe: tipe,
            },
            success: function (result) {
                $('#ringkasan_order').replaceWith(result);
            }
        })
    });

    $('#field-addons_emailforwarding').change(function(){
        if ($('#field-addons_emailforwarding').is(':checked'))
        {
            var value = 1;
        }else{
            var value = 0;
        }
        var _token = $('input[name="_token"]').val();
        var tipe = 'emailforwarding';
        $.ajax({
            url: "{{ route('order.domain_addon') }}",
            method: "POST",
            data: {
                value: value,
                _token: _token,
                tipe: tipe,
            },
            success: function (result) {
                $('#ringkasan_order').replaceWith(result);
            }
        })
    });

});
</script>
@endpush
