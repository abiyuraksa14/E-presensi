@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>TABEL MATAKULIAH</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tabel</li>
          <li class="breadcrumb-item active">Matakuliah</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TABEL MATA KULIAH</h5>
              <a href="data-matkul/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> TAMBAH DATA</a>
                <br><br>
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID MATA KULIAH</th>
                    <th scope="col">NAMA MATA KULIAH</th>
                    <th scope="col">KODE MATA KULIAH</th>
                    <th scope="col">SKS</th>
                    <th scope="col">SEMESTER</th>
                    <th scope="col">DURASI</th>
                    <th scope="col">NAMA DOSEN</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($dataMatkul as $matkul)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$matkul->nama_matkul}}</td>
                        <td>{{$matkul->kd_matkul}}</td>
                        <td>{{$matkul->sks}}</td>
                        <td>{{$matkul->semester}}</td>
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
