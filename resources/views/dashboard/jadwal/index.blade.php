@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>TABEL JADWAL MATA KULIAH</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item">TABEL </li>
          <li class="breadcrumb-item active">JADWAL</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">DATA JADWAL</h5>
              <a href="data-jadwal/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Tambah Jadwal</a>
                <br><br>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <br>
              <!-- Table with hoverable rows -->
              <table class="table table-hover myTable" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">id jadwal</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">waktu Akhir</th>
                    <th scope="col">Id mata Kuliah</th>
                    <th scope="col">Tahun Akademik</th>
                    <th scope="col">Jumlah Peserta</th>
                    <th scope="col" colspan="2">QR Code</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datajadwal as $jadwal)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ $jadwal->tanggal }}</td>
                        <td>{{ $jadwal->jam_mulai }}</td>
                        <td>{{ $jadwal->jam_akhir }}</td>
                        <td>{{ $jadwal->matakuliah->nama_matkul }}</td>
                        <td>{{ $jadwal->tahun_akademik }}</td>
                        <td>{{ $jadwal->jumlah_peserta }}</td>
                        <td>
                            <a href="data-jadwal/qrcode/masuk/{{ $jadwal->id }}">Buka kelas</a>
                        </td>
                        <td>
                            <a href="data-jadwal/qrcode/keluar/{{ $jadwal->id }}">Tutup kelas</a>
                        </td>
                        <td>
                            <a href="data-jadwal/edit/{{$jadwal->id}}"><i class="bi bi-pencil-square"></i></a> &nbsp;
                            <a href="data-jadwal/delete/{{$jadwal->id}}"><i class="bi bi-eraser-fill"></i></a><br>

                        </td>
                        <td>
                            <a href="data-jadwal/show/{{$jadwal->id_matkul}}">Lihat Peserta</a>
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
