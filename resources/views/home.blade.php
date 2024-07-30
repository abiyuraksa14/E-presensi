@extends('layouts.layout_admin')

@section('content')


<div class="pagetitle">
    <h1> Hai {{Auth()->user()->name}}</h1>
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

                <!-- Sales Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">mahasiswa</h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$mhs}}</h6>
                                    <p>Jumlah Mahasiswa</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Dosen </h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                     <h6>{{$dsn}}</h6>
                                    <p>Jumlah Dosen</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

              <!-- Customers Card -->
{{-- <div class="col-lg-15">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Grafik Kehadiran Mahasiswa</h5>
        <canvas id="barChart"></canvas> --}}




        <!-- Bar Chart -->
        {{-- <canvas id="barChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 160px; width: 320px;" width="640" height="320"></canvas>
        <script>
          document.addEventListener("DOMContentLoaded", () => {
            fetch('/api/attendance')
              .then(response => response.json())
              .then(data => {
                const labels = data.map(item => item.matakuliah);
                const datasets = [{
                  label: 'Jumlah Kehadiran',
                  data: data.map(item => item.total_absensis),
                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                  borderColor: 'rgb(75, 192, 192)',
                  borderWidth: 1
                }];

                new Chart(document.querySelector('#barChart'), {
                  type: 'bar',
                  data: {
                    labels: labels,
                    datasets: datasets
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                });
              })
              .catch(error => console.error('Error fetching attendance data:', error));
          });
        </script> --}}
        <!-- End Bar Chart -->
      </div>
    </div>
  </div>

        </div>
    </div>
</div>

    </div>
</section>

{{-- Bar CART js --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('barChart').getContext('2d');
        const labels = @json($labels); // Data label mata kuliah
        const data = @json($totals);   // Data total durasi absensi

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Durasi Absensi (menit)',
                    data: data,
                    borderWidth: 1,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)'
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
    });
</script> --}}
@endsection
