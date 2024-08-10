@extends('layouts.layout_admin')

@section('content')

<div class="pagetitle">
    <h1> Hai, {{Auth()->user()->name}} <img src="{{asset('template/assets/img/hello.png')}}" alt="Waving Hand" style="width: 30px; height: 30px;"></h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-15">
            <div class="row">

                <!-- Mahasiswa Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Mahasiswa</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$mhs}}</h6>
                                    <p>Jumlah Mahasiswa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Mahasiswa Card -->

                <!-- Dosen Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Dosen</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                     <h6>{{$dsn}}</h6>
                                    <p>Jumlah Dosen</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Dosen Card -->

               <!-- Filter Form -->
  <!-- Filter Form -->
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Filter Durasi Presensi</h5>

            <form id="filterForm" method="GET" action="{{ route('absensi.grafik') }}">
                @csrf
                <div class="mb-3 row">
                    <div class="col">
                        <label for="matakuliah">Pilih Mata Kuliah</label>
                        <select id="matakuliah" name="matakuliah" class="form-select">
                            <option value="">Semua Mata Kuliah</option>
                            @foreach($matakuliahList as $matakuliah)
                                <option value="{{ $matakuliah->kd_matkul }}">{{ $matakuliah->nama_matkul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="peserta">Pilih Mahasiswa</label>
                        <select id="peserta" name="peserta" class="form-select">
                            <option value="">Semua Mahasiswa</option>
                            @foreach($pesertaList as $peserta)
                                <option value="{{ $peserta->id }}">{{ $peserta->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="mt-4 btn btn-primary">Tampilkan Grafik</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Durasi Presensi Chart -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Grafik Durasi Presensi</h5>
            <canvas id="durasiPresensiChart"></canvas>
        </div>
    </div>
</div><!-- End Durasi Presensi Chart -->
</div>
</div>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('durasiPresensiChart').getContext('2d');
var chart = new Chart(ctx, {
type: 'bar',
data: {
labels: @json($labels), // Labels untuk mahasiswa
datasets: [{
label: 'Durasi Presensi (menit)',
data: @json($dataDurasi), // Data durasi presensi
backgroundColor: 'rgba(75, 192, 192, 0.2)',
borderColor: 'rgba(75, 192, 192, 1)',
borderWidth: 1
}]
},
options: {
scales: {
y: {
    beginAtZero: true
}
}
}
});
</script>

@endsection
