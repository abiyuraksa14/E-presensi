@php
    use Carbon\Carbon;
@endphp
@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>Riwayat Presensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Riwayat Presensi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section" style="width: fit-content">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Riwayat Presensi Mahasiswa</h5>

            {{-- @role(['kaprodi']) --}}

               {{-- <!-- Filter Form -->
               {{-- <form method="GET" action="{{ route('riwayat_presensi_mhs') }}"> --}}
                {{-- <div class="row mb-3">
                  <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ request('name') }}">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name="id_matkul" class="form-control" placeholder="ID Matakuliah" value="{{ request('id_matkul') }}">
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                  </div>
                </div>
              </form> --}}
              <!-- End Filter Form -->
              {{-- @endrole --}}
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
                    <td>{{ $absensi->user->name }}</td>
                    <td>{{ $absensi->id_jadwal }}</td>
                    <td>{{ $absensi->id_matkul }}</td>
                    <td>{{ $absensi->tanggal_absen }}</td>
                    <td>{{Carbon::parse($absensi->waktu_absen_masuk)->format('H:i')}}</td>
                    <td>{{Carbon::parse($absensi->waktu_absen_keluar)->format('H:i')}}</td>
                    <td>{{ $absensi->matakuliah->durasi }} menit</td>
                    <td>{{ $absensi->durasi }} menit</td>
                    <td>{{ $absensi->selisih_durasi }} </td>
                    <td>@if ($absensi->keterangan)

                            <span class="btn btn-success">{{ $absensi->keterangan }}</span>

                        @endif</td>
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
