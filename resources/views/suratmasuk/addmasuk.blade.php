@extends('layouts.main')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Tambah Surat Masuk</h3>
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
                                <small>Lengkapi informasi pada surat masuk.</small>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="/tambahsuratmasuk" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <h6>NO SURAT</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" name="nosurat"
                                                            class="form-control form-control-lg"
                                                            placeholder="Masukkan No Surat" value="{{ old('nosurat') }}"
                                                            autofocus required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-bullseye"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                @php
                                                    $tahunIni = now()->year;
                                                    $noregis = App\Models\SuratMasuk::whereYear('created_at', '=', $tahunIni)->get();
                                                    $countFormatted = str_pad($noregis->count()+1, 3, '0', STR_PAD_LEFT);
                                                @endphp
                                                <div class="col-3">
                                                    <h6>NO. REGISTRASI</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" name="noregis"
                                                            class="form-control form-control-lg "
                                                            value="{{ $countFormatted }}" readonly>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-collection"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 mt-3">
                                                    <h6>INSTANSI PENGIRIM</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" name="instansi"
                                                            class="form-control form-control-lg"
                                                            placeholder="Masukkan Nama Instansi Pengirim"
                                                            value="{{ old('instansi') }}" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-house-door"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 mt-3">
                                                    <h6>TGL. SURAT</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="date" name="tglsurat"
                                                            class="form-control form-control-lg " max="{{ date('Y-m-d') }}"
                                                            value="{{ old('tglsurat') }}" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-calendar3"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 mt-3">
                                                    <h6>TGL. DITERIMA</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="date" name="tglditerima"
                                                            class="form-control form-control-lg" max="{{ date('Y-m-d') }}"
                                                            value="{{ old('tglditerima') }}" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-calendar2-check"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 my-3">
                                                    <h6>JUDUL atau PERIHAL SURAT</h6>
                                                    <div class="form-group position-relative has-icon-left">
                                                        <input type="text" name="perihal"
                                                            class="form-control form-control-lg"
                                                            placeholder="Masukkan Judul atau Perihal Surat"
                                                            value="{{ old('perihal') }}" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-file-earmark-medical"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="card-title mt-2">Informasi Tambahan</h4>
                                                <small>Silahkan lengkapi jumlah lampiran, status, dan sifat tindakan
                                                    surat!</small>

                                                <div class="col-4 mt-5">
                                                    <h6>LAMPIRAN</h6>
                                                    <div class="input-group mb-3">
                                                        <input type="number" name="lampiran"
                                                            class="form-control form-control-lg" placeholder="--Lampiran--"
                                                            aria-label="Recipient's username"
                                                            aria-describedby="basic-addon2" value="{{ old('lampiran') }}"
                                                            required>
                                                        <span class="input-group-text" id="basic-addon2">Lampiran</span>
                                                    </div>
                                                </div>

                                                <div class="col-4 mt-5">
                                                    <h6>STATUS</h6>
                                                    <fieldset class="form-group">
                                                        <select class="form-select form-select-lg" name="status"
                                                            id="basicSelect" value="{{ old('status') }}" required>
                                                            <option selected="selected" disabled="disabled">--Status--
                                                            </option>
                                                            <option value="Asli">Asli</option>
                                                            <option value="Tembusan">Tembusan</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-4 mt-5">
                                                    <h6>Sifat</h6>
                                                    <fieldset class="form-group">
                                                        <select class="form-select form-select-lg" name="sifat"
                                                            value="{{ old('sifat') }}" id="basicSelect" required>
                                                            <option selected="selected" disabled="disabled">--Sifat--
                                                            </option>
                                                            <option value="Biasa">Biasa</option>
                                                            <option value="Penting">Penting</option>
                                                            <option value="Sangat Penting">Sangat Penting</option>
                                                            <option value="Rahasia">Rahasia</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <h4 class="card-title mt-3">Unggah File Surat</h4>
                                                <small>Silahkan unggah file surat dalam satu file</small>
                                                <input type="file" name="pdf"
                                                    class="form-control form-control-lg mb-3">
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
    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

    <!-- toastify -->
    <script src="assets/vendors/toastify/toastify.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        // register desired plugins...
        FilePond.registerPlugin(
            // validates the size of the file...
            FilePondPluginFileValidateSize,
            // validates the file type...
            FilePondPluginFileValidateType,

            // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
            FilePondPluginImageCrop,
            // preview the image file type...
            FilePondPluginImagePreview,
            // filter the image file
            FilePondPluginImageFilter,
            // corrects mobile image orientation...
            FilePondPluginImageExifOrientation,
            // calculates & adds resize information...
            FilePondPluginImageResize,
        );

        // Filepond: Basic
        FilePond.create(document.querySelector('.basic-filepond'), {
            allowImagePreview: false,
            allowMultiple: false,
            allowFileEncode: false,
            required: false
        });

        // Filepond: Multiple Files
        FilePond.create(document.querySelector('.multiple-files-filepond'), {
            allowImagePreview: false,
            allowMultiple: true,
            allowFileEncode: false,
            required: false
        });

        // Filepond: With Validation
        FilePond.create(document.querySelector('.with-validation-filepond'), {
            allowImagePreview: false,
            allowMultiple: true,
            allowFileEncode: false,
            required: true,
            acceptedFileTypes: ['image/png'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: ImgBB with server property
        FilePond.create(document.querySelector('.imgbb-filepond'), {
            allowImagePreview: false,
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort) => {
                    // We ignore the metadata property and only send the file

                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);

                    const request = new XMLHttpRequest();
                    // you can change it by your client api key
                    request.open('POST', 'https://api.imgbb.com/1/upload?key=762894e2014f83c023b233b2f10395e2');

                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };

                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        } else {
                            error('oh no');
                        }
                    };

                    request.onreadystatechange = function() {
                        if (this.readyState == 4) {
                            if (this.status == 200) {
                                let response = JSON.parse(this.responseText);

                                Toastify({
                                    text: "Success uploading to imgbb! see console f12",
                                    duration: 3000,
                                    close: true,
                                    gravity: "bottom",
                                    position: "right",
                                    backgroundColor: "#4fbe87",
                                }).showToast();

                                console.log(response);
                            } else {
                                Toastify({
                                    text: "Failed uploading to imgbb! see console f12",
                                    duration: 3000,
                                    close: true,
                                    gravity: "bottom",
                                    position: "right",
                                    backgroundColor: "#ff0000",
                                }).showToast();

                                console.log("Error", this.statusText);
                            }
                        }
                    };

                    request.send(formData);
                }
            }
        });

        // Filepond: Image Preview
        FilePond.create(document.querySelector('.image-preview-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Crop
        FilePond.create(document.querySelector('.image-crop-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Exif Orientation
        FilePond.create(document.querySelector('.image-exif-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: true,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Filter
        FilePond.create(document.querySelector('.image-filter-filepond'), {
            allowImagePreview: true,
            allowImageFilter: true,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            imageFilterColorMatrix: [
                0.299, 0.587, 0.114, 0, 0,
                0.299, 0.587, 0.114, 0, 0,
                0.299, 0.587, 0.114, 0, 0,
                0.000, 0.000, 0.000, 1, 0
            ],
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });

        // Filepond: Image Resize
        FilePond.create(document.querySelector('.image-resize-filepond'), {
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            allowImageResize: true,
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            imageResizeMode: 'cover',
            imageResizeUpscale: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type);
            })
        });
    </script>
@endsection
