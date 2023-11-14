@extends('layouts.main')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Tambah Surat Keluar</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12">
                    <section class="section">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informasi Umum</h4>
                                <small>Lengkapi informasi pada surat keluar.</small>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="/tambahsuratkeluar" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <h6>NO JENIS</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="No Jenis" name="nojenis"
                                                            value="{{ old('nojenis') }}" autofocus required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-bullseye"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h6>NO INSTANSI</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="Masukkan No Instansi" name="noinstansi"
                                                             autofocus required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-bullseye"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h6>NO TAHUN</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="Masukkan No Surat" name="notahun"
                                                            value="{{ now()->year,old('notahun') }}" autofocus required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-bullseye"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-9 my-3">
                                                    <h6>JUDUL atau PERIHAL SURAT</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control form-control-lg"
                                                            placeholder="Masukkan Judul atau Perihal Surat" name="perihal"
                                                            value="{{ old('perihal') }}" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-file-earmark-medical"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 my-3">
                                                    <h6>TGL. SURAT</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="date" class="form-control form-control-lg "
                                                            max="{{ date('Y-m-d') }}" name="tglsurat"
                                                            value="{{ old('tglsurat') }}" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-calendar3"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="card-title mt-2">Informasi Tambahan</h4>
                                                <small>Silahkan lengkapi jumlah lampiran dan sifat tindakan
                                                    surat!</small>

                                                <div class="col-6 mt-5">
                                                    <h6>LAMPIRAN</h6>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control form-control-lg"
                                                            placeholder="--Lampiran--" aria-label="Recipient's username"
                                                            aria-describedby="basic-addon2" name="lampiran"
                                                            value="{{ old('lampiran') }}" required>
                                                        <span class="input-group-text" id="basic-addon2">Lampiran</span>
                                                    </div>
                                                </div>

                                                <div class="col-6 mt-5">
                                                    <h6>SIFAT</h6>
                                                    <fieldset class="form-group">
                                                        <select class="form-select form-select-lg" id="basicSelect"
                                                            name="sifat" value="{{ old('sifat') }}"required>
                                                            <option selected="selected" disabled="disabled">--Sifat--
                                                            </option>
                                                            <option value="Biasa">Biasa</option>
                                                            <option value="Penting">Penting</option>
                                                            <option value="Sangat Penting">Sangat Penting</option>
                                                            <option value="Rahasia">Rahasia</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <h4 class="card-title mt-3">UNGGAH FILE SURAT</h4>
                                                <small>Silahkan unggah file surat dalam satu file</small>
                                                <input type="file" name="pdf" class="form-control form-control-lg mb-3">

                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Tambahkan</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Atur
                                                        ulang</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; Sistem Aplikasi Administrasi Perkantoran</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('js')
    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

    <!-- toastify -->
    <script src="assets/vendors/toastify/toastify.js"></script>
@endsection
