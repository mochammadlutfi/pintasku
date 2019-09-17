<ul class="nav-main">
    <li>
        <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Beranda</span></a>
    </li>
    <li class="{{ Request::is('admin/product/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-handbag"></i><span
                class="sidebar-mini-hide">Produk / Layanan</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/product/list') ? 'active' : null}}"
                    href="{{ route('order') }}">Order Produk / Layanan</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/product/list') ? 'active' : null}}"
                    href="{{ route('my_product') }}">Produk / Layanan Saya</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/product/category') ? 'active' : null}}"
                    href="{{ route('my_license') }}">Lisensi Saya</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}"><i class="si si-globe"></i><span class="sidebar-mini-hide">Domain</span></a>
    </li>
    <li>
        <a class="{{ Request::is('beranda') ? 'active' : null }}" href="{{ route('beranda') }}"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Tagihan</span></a>
    </li>
</ul>
