@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>Tabel Matkul</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Matkul</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table Matkul</h5>
              <a href="data-matkul/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Matkul</a>
                <br><br>
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">id Matkul</th>
                    <th scope="col">Nama Matkul</th>
                    <th scope="col">Kode Matkul</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Ruangan</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($dataMatkul as $matkul)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$matkul->nama_matkul}}</td>
                        <td>{{$matkul->kd_matkul}}</td>
                        <td>{{$matkul->sks}}</td>
                        <td>{{$matkul->ruangan}}</td>
                        <td>{{$matkul->durasi}}</td>
                        <td>{{$matkul->dosen->name}}</td>
                        <td>{{$matkul->dosen->username}}</td>
                        <td>
                            <a href="data-matkul/edit/{{$matkul->id}}"><i class="bi bi-pencil-square"></i></a> &nbsp;
                            <a href="data-matkul/delete/{{$matkul->id}}"><i class="bi bi-eraser-fill"></i></a>
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
