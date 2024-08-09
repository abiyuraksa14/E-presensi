
<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item" >
        <a class="nav-link" href="/home">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        @role('admin')
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" >
            <i class="ri-database-line"></i><span>Data Master</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <a href="/data-matkul">
                    <i class="bi bi-circle"></i><span>Tabel Mata Kuliah</span>
                </a>
            </li>
            <li>
                <a href="/data-jadwal">
                    <i class="bi bi-circle"></i><span>Tabel Jadwal</span>
                </a>
            </li>
            <li>
                <a href="/data-perserta">
                    <i class="bi bi-circle"></i><span>Tabel Peserta</span>
                </a>
            </li>
        </ul>
        <a class="nav-link collapsed" data-bs-target="#componentss-nav" data-bs-toggle="collapse" href="#" >
            <i class="bi bi-person"></i><span>User Management</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="componentss-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="/data-mahasiswa">
                    <i class="bi bi-circle"></i><span>Akun Mahasiswa</span>
                </a>
            </li>
            <li>
                <a href="/data-dosen">
                    <i class="bi bi-circle"></i><span>Akun Dosen</span>
                </a>
            </li>
            <li>
                <a href="/data-admin">
                    <i class="bi bi-circle"></i><span>Akun Admin</span>
                </a>
            </li>

        </ul>
        @endrole
        @role(['mahasiswa','dosen'])
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" >
            <i class="bi bi-qr-code"></i><span>Presensi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @endrole
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @role('mahasiswa')
            <li>
                <a href="/scan-qr-code">
                    <i class="bi bi-circle"></i><span>Scan Barcode</span>
                </a>
            </li>
            @endrole
            @role('dosen')
            <li>
                <a href="/buka-kelas">
                    <i class="bi bi-circle"></i><span>Buka Kelas</span>
                </a>
            </li>
            @endrole
        </ul>
        @role(['mahasiswa','dosen','kaprodi'])
    </li><!-- End Forms Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-file-earmark-text"></i><span>Laporan Presensi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @endrole
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @role(['mahasiswa'])
            <li>
                <a href="/riwayat_presensi/mahasiswa">
                    <i class="bi bi-circle"></i><span>Riwayat Presensi Mahasiswa</span>
                </a>
            </li>
            @endrole
            @role(['dosen'])
            <li>
                <a href="/riwayat_presensi/mahasiswadsn">
                    <i class="bi bi-circle"></i><span>Riwayat Presensi Mahasiswa</span>
                </a>
            </li>
            <li>
                <a href="/riwayat_presensi/dosen">
                    <i class="bi bi-circle"></i><span>Riwayat Presensi Dosen</span>
                </a>
            </li>
            @endrole
            @role(['kaprodi'])
            <li>
                <a href="/riwayat_presensi/mahasiswa/all">
                    <i class="bi bi-circle"></i><span>Riwayat Presensi Mahasiswa all</span>
                </a>
            </li>
            <li>
                <a href="/riwayat_presensi/dosen/all">
                    <i class="bi bi-circle"></i><span>Riwayat Presensi Dosen all</span>
                </a>
            </li>
            @endrole
        </ul>
    </li>
</ul>
