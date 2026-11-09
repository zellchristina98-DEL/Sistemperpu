<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php if (strtolower(session('level')) == 'admin' || strtolower(session('level')) == 'petugas') { ?>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/homebuku">
                <i class="bi bi-question-circle"></i>
                <span>Buku</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/homepeminjaman">
                <i class="bi bi-envelope"></i>
                <span>Peminjaman</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/homedenda">
                <i class="bi bi-card-list"></i>
                <span>Denda</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/homepengembalian">
                <i class="bi bi-file-earmark"></i>
                <span>Pengembalian</span>
            </a>
        </li>


        <?php } elseif (strtolower(session('level')) == 'manager') { ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/datalaporan">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Data laporan</span>
            </a>
        </li>

        <?php } elseif (strtolower(session('level')) == 'siswa') { ?>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/homebuku">
                <i class="bi bi-question-circle"></i>
                <span>Buku</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/homepeminjaman">
                <i class="bi bi-envelope"></i>
                <span>Peminjaman</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/homedenda">
                <i class="bi bi-card-list"></i>
                <span>Denda</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/homepengembalian">
                <i class="bi bi-file-earmark"></i>
                <span>Pengembalian</span>
            </a>
        </li>

        <?php } ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/logout">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside>
<!-- End Sidebar -->