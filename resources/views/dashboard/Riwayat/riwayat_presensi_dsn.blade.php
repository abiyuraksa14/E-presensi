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
                    <th>Nama Dosen</th>
                    <th>ID Jadwal</th>
                    <th>ID Matakuliah</th>
                    <th>Tanggal Absen</th>
                    <th>Waktu Buka Kelas</th>
                    <th>Waktu Tutup Kelas</th>
                    <th>Durasi Matakuliah</th>
                    <th>Durasi Actual</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datas as $absensi)
                <tr>
                    <td>{{ $absensi->id }}</td>
                    <td>{{ $absensi->dosen->name }}</td>
                    <td>{{ $absensi->id_jadwal }}</td>
                    <td>{{ $absensi->id_matakuliah }}</td>
                    <td>{{ $absensi->tanggal_absen }}</td>
                    <td>{{Carbon::parse($absensi->waktu_absen_masuk)->format('H:i')}}</td>
                    <td>{{Carbon::parse($absensi->waktu_absen_keluar)->format('H:i')}}</td>
                    <td>{{ $absensi->matakuliah->durasi }}</td>
                    <td>{{ $absensi->durasi }}</td>
                    <td>{{ $absensi->selisih_durasi }}</td>
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
