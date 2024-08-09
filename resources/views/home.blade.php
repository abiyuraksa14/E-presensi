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
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Filter Durasi Presensi</h5>

            <form action="#" method="GET">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="semester" class="form-label">Semester</label>
                        <select name="semester" id="semester" class="form-select">
                            @foreach($semesters as $semester)
                                <option value="{{ $semester }}">{{ $semester }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_dosen" class="form-label">Dosen</label>
                        <select name="id_dosen" id="id_dosen" class="form-select">
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_mahasiswa" class="form-label">Mahasiswa</label>
                        <select name="id_mahasiswa" id="id_mahasiswa" class="form-select">
                            @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
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
            labels: @json($labels), // Labels untuk mahasiswa/dosen
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
