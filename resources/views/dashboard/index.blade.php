@extends('layouts.main')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Dashboard {{ ucwords(auth()->user()->jabatan) }}</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-light-success color-success"><i
                                class="bi bi-star"> Selamat datang <span style="font-weight: 900">{{ ucwords(auth()->user()->name) }}</span> di Sistem Aplikasi Administrasi Perkantoran! Anda berhasil masuk sebagai<span style="font-weight: 900"> {{ ucwords(auth()->user()->jabatan) }}</i>
                            </div>
                        </div>
                    </div>

                    {{-- tampilan untuk admin --}}
                    @can('admin')
                        <section class="section">
                            <div class="card">
                                <div class="card-header">
                                    Data Pegawai
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Nama Pegawai</th>
                                                <th>NIP</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pegawai as $peg)
                                                <tr>
                                                    <td>{{ $peg->name }}</td>
                                                    <td>{{ $peg->nip }}</td>
                                                    <td>{{ $peg->jabatan }}</td>
                                                    <td>
                                                        @if ($peg->status == 1)
                                                            <span class="badge bg-success">Aktif</span>
                                                        @else
                                                            <span class="badge bg-success">Tidak Aktif</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </section>
                    @endcan

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
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
@endsection
