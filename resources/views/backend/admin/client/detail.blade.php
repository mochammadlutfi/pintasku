@extends('backend.layouts.master')

@section('content')

<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda')}}">Beranda</a>
        <span class="breadcrumb-item active">Client List</span>
    </nav>
    <div class="block">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#ringkasan">
                <i class="si si-info mr-5"></i>
                    Ringkasan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#profil">
                    <i class="si si-user mr-5"></i>
                    Profil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#produk">
                    <i class="si si-handbag mr-5"></i>
                    Produk/Layanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#domain">
                    <i class="si si-globe mr-5"></i>
                    Domain
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#invoice">
                    <i class="si si-note mr-5"></i>
                    Invoice
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#transaksi">
                    <i class="si si-credit-card mr-5"></i>
                    Transaksi
                </a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link" href="#btabs-alt-static-settings"><i class="si si-settings"></i></a>
            </li>
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active" id="ringkasan" role="tabpanel">
                <h4 class="font-w400">Home Content</h4>
                <p>...</p>
            </div>
            <div class="tab-pane" id="profil" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Lengkap" value="{{ $user->name }}">
                                <div id="error-nama" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-username">Username</label>
                                <input type="text" class="form-control" id="field-username" name="username" placeholder="Masukan Username" value="{{ $user->username }}">
                                <div id="error-username" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-email">Alamat Email</label>
                                <input type="text" class="form-control" id="field-email" name="email" placeholder="Masukan Alamat Email" value="{{ $user->email }}">
                                <div id="error-email" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-no_hp">No. Handphone</label>
                                <input type="text" class="form-control" id="field-no_hp" name="no_hp" placeholder="Masukan No. Handphone" value="{{ $user->no_hp }}">
                                <div id="error-no_hp" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-perusahaan">Perusahaan</label>
                                <input type="text" class="form-control" id="field-perusahaan" name="perusahaan" placeholder="Masukan Perusahaan" value="{{ $user->perusahaan }}">
                                <div id="error-perusahaan" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="field-password">Password</label>
                                <input type="password" class="form-control" id="field-password" name="password" placeholder="Masukan Password">
                                <div id="error-password" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="field-kota">Provinsi</label>
                                <select class="form-control" name="provinsi" id="field-provinsi">
                                    <option value="">Pilih provinsi</option>
                                    @foreach($provinsi as $k)
                                        @if($user->provinsi_id == $k->id)
                                            <option value="{{ $k->id }}" selected="selected">{{ ucwords(strtolower($k->name)) }}</option>
                                        @else
                                            <option value="{{ $k->id }}">{{ ucwords(strtolower($k->name)) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="error-provinsi">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="field-kota">Kota</label>
                                <select class="form-control" name="kota" id="field-kota">
                                    <option value="">Pilih Kota</option>
                                    @foreach($kota as $k)
                                        @if($user->kota_id == $k->id)
                                            <option value="{{ $k->id }}" selected="selected">{{ ucwords(strtolower($k->name)) }}</option>
                                        @else
                                            <option value="{{ $k->id }}">{{ ucwords(strtolower($k->name)) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="error-kota">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="field-kecamatan">Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="field-kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatan as $k)
                                        @if($user->kecamatan_id == $k->id)
                                            <option value="{{ $k->id }}" selected="selected">{{ ucwords(strtolower($k->name)) }}</option>
                                        @else
                                            <option value="{{ $k->id }}">{{ ucwords(strtolower($k->name)) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="error-kecamatan">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="field-kelurahan">Kelurahan/Desa</label>
                                <select class="form-control" name="kelurahan" id="field-kelurahan">
                                    <option value="">Pilih Kelurahan/Desa</option>
                                    @foreach($kelurahan as $k)
                                        @if($user->kelurahan_id == $k->id)
                                            <option value="{{ $k->id }}" selected="selected">{{ ucwords(strtolower($k->name)) }}</option>
                                        @else
                                            <option value="{{ $k->id }}">{{ ucwords(strtolower($k->name)) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="error-kelurahan">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="field-alamat">Alamat Lengkap</label>
                                <textarea class="form-control" id="field-alamat" name="alamat" rows="5">{{ $user->alamat }}</textarea>
                                <div class="invalid-feedback" id="error-alamat">Invalid feedback</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-alt-primary btn-block">
                            <i class="si si-check mr-15"></i>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="produk" role="tabpanel">
                <h4 class="font-w400">Product Content</h4>
                <p>...</p>
            </div>
            <div class="tab-pane" id="domain" role="tabpanel">
                <h4 class="font-w400">Domain Content</h4>
                <p>...</p>
            </div>
            <div class="tab-pane" id="invoice" role="tabpanel">
                <h4 class="font-w400">Invoice Content</h4>
                <p>...</p>
            </div>
            <div class="tab-pane" id="transaksi" role="tabpanel">
                <h4 class="font-w400">Transaksi Content</h4>
                <p>...</p>
            </div>
            <div class="tab-pane" id="btabs-alt-static-settings" role="tabpanel">
                <h4 class="font-w400">Settings Content</h4>
                <p>...</p>
            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script type="text/javascript">
</script>
@endpush
