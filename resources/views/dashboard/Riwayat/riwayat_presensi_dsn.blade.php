@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>TABEL Riwayat Presensi dosen</h1>
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
                    <th scope="col">#</th>
                    <th scope="col">id presensi</th>
                    <th scope="col">waktu presensi</th>
                    <th scope="col">keterangan matkul</th>
                    <th scope="col">nidn dosen</th>
                    <th scope="col">jumlah aktual mahasiswa</th>
                    <th scope="col">id jadwal</th>
                    <th scope="col">kd matkul</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">mulai kelas</th>
                    <th scope="col">tutup kelas</th>
                    <th scope="col">durasi</th>
                  </tr>
                </thead>
                <!-- {{-- <tbody>
                    @foreach($dataPerserta as $perserta)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$perserta->matakuliah->kd_matkul}}</td>
                        <td>{{$perserta->user->name}}</td>
                        <td>{{$perserta->user->username}}</td>
                        <td>
                            <a href="data-perserta/edit/{{$perserta->id}}"><i class="bi bi-pencil-square"></i></a> &nbsp;
                            <a href="data-perserta/delete/{{$perserta->id}}"><i class="bi bi-eraser-fill"></i></a>
                        </td>
                    </tr>
               @endforeach --}} -->
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
