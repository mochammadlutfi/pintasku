<ul class="nav-main">
    <li>
        <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Beranda</span></a>
    </li>
    <li>
        <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}"><i class="si si-basket"></i><span class="sidebar-mini-hide">Order Produk</span></a>
    </li>
    <li>
        <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Tagihan</span></a>
    </li>
</ul>
