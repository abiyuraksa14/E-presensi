@extends('layouts.layout_admin')

@section('content')
    <div class="pagetitle">
      <h1>Tabel jadwal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
                        <th>Nama Peserta</th>
                        <th>Status Absensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peserta as $p)
                        @php
                            $absensi = $absensi->firstWhere('id_peserta', 16);
                        @endphp
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>
                                @if($absensi)
                                    {{ $absensi->keterangan }}
                                @else
                                    Belum Absen
                                @endif
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
