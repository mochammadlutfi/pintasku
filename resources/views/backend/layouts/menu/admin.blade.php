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
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-users"></i><span
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
    <li class="{{ Request::is('admin/service/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-briefcase"></i><span
                class="sidebar-mini-hide">Order</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/product/tambah') ? 'active' : null}}"
                    href="{{ route('admin.product.tambah') }}">Tambah Order Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/product/list') ? 'active' : null}}"
                    href="{{ route('admin.product') }}">Data Order</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/service/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-briefcase"></i><span
                class="sidebar-mini-hide">Layanan</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/product/tambah') ? 'active' : null}}"
                    href="{{ route('admin.product.tambah') }}">Tambah Layanan Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/product/list') ? 'active' : null}}"
                    href="{{ route('admin.product') }}">Data Layanan</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-compass"></i><span
                class="sidebar-mini-hide">Domain</span></a>
        <ul>
            <li>
                <a href="">Register Domain</a>
            </li>
            <li>
                <a href="">Transfer Domain</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/domain/tld') ? 'active' : null}}"
                    href="{{ route('admin.tld') }}">TLDs</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wallet"></i><span
                class="sidebar-mini-hide">Financial</span></a>
        <ul>
            <li>
                <a href="">Pemasukan</a>
            </li>
            <li>
                <a href="">Pengeluaran</a>
            </li>
        </ul>
    </li>
</ul>
