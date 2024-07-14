@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>Tabel jadwal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Jadwal</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table Jadwal</h5>
              <a href="data-jadwal/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Jadwal</a>
                <br><br>
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">id jadwal</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">jam Akhir</th>
                    <th scope="col">Id Matkul</th>
                    <th scope="col">Tahun Akademik</th>
                    <th scope="col">Jumal Peserta</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datajadwal as $jadwal)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$jadwal->hari}}</td>
                        <td>{{$jadwal->jam_mulai}}</td>
                        <td>{{$jadwal->jam_akhir}}</td>
                        <td>{{$jadwal->id_matkul}}</td>
                        <td>{{$jadwal->tahun_akademik}}</td>
                        <td>{{$jadwal->jumlah_peserta}}</td>
                        <td>
                            <a href="data-jadwal/edit/{{$jadwal->id}}"><i class="bi bi-pencil-square"></i></a> &nbsp;
                            <a href="data-jadwal/delete/{{$jadwal->id}}"><i class="bi bi-eraser-fill"></i></a>
                        </td>
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
