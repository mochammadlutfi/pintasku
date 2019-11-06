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
