<ul class="nav-main">
    <li>
        <a class="{{ Request::is('admin/beranda') ? 'active' : null }}" href="{{ route('admin.beranda') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Beranda</span></a>
    </li>
    <li class="{{ Request::is('admin/client/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-users"></i><span
                class="sidebar-mini-hide">Client</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/client/tambah') ? 'active' : null }}"
                    href="{{ route('admin.client.tambah') }}">Add New Client</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/client/list') ? 'active' : null }}"
                    href="{{ route('admin.client.list') }}">List Clients</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/product/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-handbag"></i><span
                class="sidebar-mini-hide">Produk</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/product/tambah') ? 'active' : null}}"
                    href="{{ route('admin.product.tambah') }}">Tambah Produk Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/product/list') ? 'active' : null}}"
                    href="{{ route('admin.product') }}">Data Produk</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/product/category') ? 'active' : null}}"
                    href="{{ route('admin.category') }}">Kategori</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/order/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-briefcase"></i><span
                class="sidebar-mini-hide">Order</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/order/tambah') ? 'active' : null}}"
                    href="{{ route('admin.order.tambah') }}">Tambah Order Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/order/list') ? 'active' : null}}"
                    href="{{ route('admin.order') }}">Data Order</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/billing/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wallet"></i><span
                class="sidebar-mini-hide">Tagihan</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/billing/transaksi') ? 'active' : null}}"
                    href="{{ route('admin.product.tambah') }}">Data Transaksi</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/billing/invoice') ? 'active' : null}}"
                    href="{{ route('admin.product') }}">Data Invoice</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="{{ Request::is('admin/domain') ? 'active' : null }}" href="{{ route('admin.tld') }}"><i class="si si-globe"></i><span class="sidebar-mini-hide">Domain</span></a>
    </li>
    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-support"></i><span
                class="sidebar-mini-hide">Dukungan</span></a>
        <ul>
            <li>
                <a href="">Tiket Dukungan</a>
            </li>
            <li>
                <a href="">Pengumuman</a>
            </li>
            <li>
                <a href="">Masalah Jaringan</a>
            </li>
        </ul>
    </li>
</ul>
