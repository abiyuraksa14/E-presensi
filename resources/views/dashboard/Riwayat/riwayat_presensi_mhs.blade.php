@php
    use Carbon\Carbon;
@endphp
@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>TABEL Riwayat Presensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Riwayat dosen</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TABEL Riwayat dosen</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover" id="myTable">

                <thead>
                  <tr>
                    <th>#</th>
                    <th>ID Peserta</th>
                    <th>ID Jadwal</th>
                    <th>ID Matakuliah</th>
                    <th>Tanggal Absen</th>
                    <th>Waktu Absen Masuk</th>
                    <th>Waktu Absen Keluar</th>
                    <th>Durasi Matakuliah</th>
                    <th>Absensi Actual</th>
                    <th>Selisih Durasi</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datas as $absensi)
                <tr>
                    <td>{{ $absensi->id }}</td>
                    <td>{{ $absensi->id_peserta }}</td>
                    <td>{{ $absensi->id_jadwal }}</td>
                    <td>{{ $absensi->id_matkul }}</td>
                    <td>{{ $absensi->tanggal_absen }}</td>
                    <td>{{Carbon::parse($absensi->waktu_absen_masuk)->format('H:i')}}</td>
                    <td>{{Carbon::parse($absensi->waktu_absen_keluar)->format('H:i')}}</td>
                    <td>{{ $absensi->matakuliah->durasi }}</td>
                    <td>{{ $absensi->durasi }}</td>
                    <td>{{ $absensi->selisih_durasi }}</td>
                    <td>{{ $absensi->keterangan }}</td>
                </tr>
            @endforeach
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
