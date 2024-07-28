@extends('layouts.layout_admin')

@section('content')


<div class="pagetitle">
    <h1>Dashboard, Hai {{Auth()->user()->name}} wellcome</h1>
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
                <div class="col-xxl-4 col-md-6">
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
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title"> Dosen </h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>3</h6>
                                    <p>Jumlah Dosen</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-md 6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Cuti</h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1244</h6>
                                    <p>Jumlah Mahasiswa</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->
                   <!-- Customers Card -->
                   <div class="col-lg-15">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Grafik Kehadiran Mahasiswa</h5>

                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 160px; width: 320px;" width="640" height="320"></canvas>
                        <script>
                          document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#barChart'), {
                              type: 'bar',
                              data: {
                                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                datasets: [{
                                  label: 'Bar Chart',
                                  data: [65, 59, 80, 81, 56, 55, 40],
                                  backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                  ],
                                  borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                  ],
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
                          });
                        </script>
                        <!-- End Bar CHart -->

                      </div>
                    </div>
                  </div>
            </div>
        </div><!-- End Left side columns -->


    </div>
</section>


@endsection
