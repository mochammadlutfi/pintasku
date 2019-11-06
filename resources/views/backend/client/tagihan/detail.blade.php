<!doctype html>
<html lang="en" class="no-focus">
    <head>

        @include('layouts.meta')

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        {{-- <link rel="stylesheet" id="css-main" href="{{ asset('assets/backend/css/codebase.css') }}"> --}}
        <link rel="stylesheet" id="css-main" href="{{ mix('/assets/backend/css/codebase.css') }}">
        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        <div id="page-container" class="sidebar-inverse side-scroll main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content content-full">
                    <!-- Dummy content -->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">#{{ $invoice->kode }}</h3>
                                    <div class="block-options">
                                        <!-- Print Page functionality is initialized in Helpers.print() -->
                                        <button type="button" class="btn btn-alt-secondary btn-rounded" onclick="Codebase.helpers('print-page');">
                                            <i class="si si-printer"></i> Print Invoice
                                        </button>
                                        <a class="btn btn-alt-secondary btn-rounded" href="{{ route('invoice') }}">
                                            <i class="si si-arrow-left mr-5"></i>
                                            Kembali
                                        </a>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="row">
                                        <div class="col-6">
                                            <img src="{{ asset('assets/img/logo/logo_horizontal.png') }}" width="150px">
                                        </div>
                                        <div class="col-6">
                                            <div class="h3 text-right text-danger font-w700">BELUM DIBAYAR</div>
                                            <p class="text-right">
                                                Tanggal Invoice : {{ date('d-m-Y', strtotime($invoice->created_at)) }}<br>
                                                Tanggal Jatuh Tempo : {{ date('d-m-Y', strtotime($invoice->tgl_tempo)) }}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Invoice Info -->
                                    <div class="row">
                                        <!-- Company Info -->
                                        <div class="col-6">
                                            <div class="h5 mb-15">Ditagihkan Kepada</div>
                                            <address>
                                                <b>{{ $invoice->client->name }}</b><br>
                                                {{ $invoice->client->alamat }}<br>
                                                Kel. {{ ucwords(strtolower($invoice->client->kelurahan->name)) }}, Kec. {{ ucwords(strtolower($invoice->client->kecamatan->name)) }}<br>
                                                {{ ucwords(strtolower($invoice->client->kota->name)) }}, {{ ucwords(strtolower($invoice->client->provinsi->name)) }}<br>
                                                {{ $invoice->client->email }}
                                            </address>
                                        </div>
                                        <!-- END Company Info -->

                                        <!-- Client Info -->
                                        <div class="col-6 text-right">
                                        </div>
                                        <!-- END Client Info -->
                                    </div>
                                    <!-- END Invoice Info -->

                                    <!-- Table -->
                                    <div class="table-responsive push">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 10%;"></th>
                                                    <th>Produk</th>
                                                    <th class="text-right" style="width: 25%;">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach($item as $i)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td>
                                                        <p class="font-w600 mb-5">{{ $i->tipe }}</p>
                                                        <div class="text-muted">{{ $i->deskripsi }}</div>
                                                    </td>
                                                    <td class="text-right">Rp {{ number_format($i->jumlah,0,",",".") }},-</td>
                                                </tr>
                                                @endforeach
                                                <tr class="table-warning">
                                                    <td colspan="2" class="font-w700 text-uppercase text-right">Total Tagihan</td>
                                                    <td class="font-w700 text-right">Rp {{ number_format($invoice->total,0,",",".") }},-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END Table -->

                                    <!-- Footer -->
                                    <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
                                    <!-- END Footer -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Dummy content -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Codebase 3.0</a> &copy; <span class="js-year-copy">2017</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>

        <script src="{{ asset('assets/backend/js/laroute.js') }}"></script>
        <script src="{{ mix('/assets/backend/js/codebase.app.js') }}"></script>
        <script src="{{ asset('assets/backend/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <script src="{{ mix('/assets/backend/js/laravel.app.js') }}"></script>
        @stack('scripts')

    </body>
</html>
