@extends('layouts.main')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Data Surat Masuk {{ ucwords(auth()->user()->jabatan) }}</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12">

                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                Surat Masuk
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tanggal Diterima</th>
                                            <th>Instansi Pengirim</th>
                                            <th>Keterangan</th>
                                            <th>Detail Surat</th>
                                            <th>File Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dsm as $d)
                                            @if ($d->sm->where('role', 5))
                                                <tr>
                                                    <td>{{ $d->sm->nosurat }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($d->sm->tglsurat)->translatedFormat('l, d F Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($d->sm->tglditerima)->translatedFormat('l, d F Y') }}
                                                        </td>
                                                        <td>{{ ucwords($d->sm->instansi) }}</td>
                                                        <td>
                                                            @if ($d->sm->role == 1)
                                                                Sedang diproses Camat
                                                            @elseif ($d->sm->role == 2)
                                                                Dalam Pengecekan Sekretaris Camat
                                                            @elseif ($d->sm->role == 3)
                                                                Menunggu disposisi Operator
                                                            @elseif ($d->sm->role == 4)
                                                                Surat Masuk tidak disetujui Camat
                                                            @elseif ($d->sm->role == 5)
                                                                Surat Masuk diterima oleh KASI/KASUBAG
                                                            @endif
                                                        </td>
                                                    <td style="text-align: center;">
                                                        <button type="button" class="btn fs-3" style="border: none"
                                                            data-bs-toggle="modal" data-bs-target="#detailsurat{{ $d->sm->id }}">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                    </td>
                                                    <!-- modal disposisi -->
                                                    <div class="modal fade" id="detailsurat{{ $d->sm->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                            role="document">
                                                            <div class="modal-content" style="height: 610px">
                                                                <div class="modal-header bg-primary">
                                                                    <h5 class="modal-title white"
                                                                        id="exampleModalScrollableTitle">
                                                                        Detail Surat Masuk</h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5>INFORMASI UMUM</h5>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            No. Surat
                                                                        </div>
                                                                        <div class="col-8">
                                                                            {{ $d->sm->nosurat }}
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Instansi Pengirim
                                                                        </div>
                                                                        <div class="col-8">
                                                                            {{ ucwords($d->sm->instansi) }}
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Judul atau Perihal Surat
                                                                        </div>
                                                                        <div class="col-8">
                                                                            {{ $d->sm->perihal }}
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Tanggal Surat
                                                                        </div>
                                                                        <div class="col-8">
                                                                            {{ \Carbon\Carbon::parse($d->sm->tglsurat)->translatedFormat('l, d F Y') }}
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Tanggal Diterima
                                                                        </div>
                                                                        <div class="col-8">
                                                                            {{ \Carbon\Carbon::parse($d->sm->tglditerima)->translatedFormat('l, d F Y') }}
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Lampiran
                                                                        </div>
                                                                        <div class="col-8">
                                                                            {{ $d->sm->lampiran }} Lampiran
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Status Surat
                                                                        </div>
                                                                        <div class="col-8">
                                                                            {{ $d->sm->status }}
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Sifat Surat
                                                                        </div>
                                                                        <div class="col-8">
                                                                            {{ $d->sm->sifat }}
                                                                        </div>

                                                                    </div>
                                                                    <h5 class="mt-5">INFORMASI TINDAKAN</h5>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Keterangan
                                                                        </div>
                                                                        <div class="col-8"
                                                                            style="font-style: oblique; font-weight: 700">
                                                                            @if ($d->sm->validasi)
                                                                                @if ($d->sm->validasi == 1)
                                                                                    Disetujui oleh Camat
                                                                                @else
                                                                                    Tidak disetujui oleh Camat
                                                                                @endif
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Tanggal Tindakan Camat
                                                                        </div>
                                                                        <div class="col-8">
                                                                            @if ($d->sm->tglcamat)
                                                                                {{ \Carbon\Carbon::parse($d->sm->tglsurat)->translatedFormat('l, d F Y') }}
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Catatan Camat
                                                                        </div>
                                                                        <div class="col-8">
                                                                            @if ($d->sm->catcamat)
                                                                                {{ $d->sm->catcamat }}
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Disposisi Kepada
                                                                        </div>
                                                                        <div class="col-8">
                                                                            @if ($d->sm->validasi == 1)
                                                                                @foreach ($d->sm->detailsm as $dsm)
                                                                                    {{ $dsm->user->jabatan }} |
                                                                                @endforeach
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-4">
                                                                            Tanggal Disposisi
                                                                        </div>
                                                                        <div class="col-8">
                                                                            @if ($d->sm->tgldisposisi)
                                                                                {{ \Carbon\Carbon::parse($d->sm->tgldisposisi)->translatedFormat('l, d F Y') }}
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Tutup</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <td style="text-align: center;">
                                                        <a href="{{ asset('storage/' . $d->sm->pdf) }}"><i
                                                                class="bi bi-download fs-4"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>

                </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; Sistem Informasi Aplikasi Perkantoran</p>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('js')
    <script src="assets/vendors/choices.js/choices.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection
