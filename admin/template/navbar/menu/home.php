<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><em class="fas fa-user"></em> <?= $data_user->nama; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./"><em class="fas fa-home"></em> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=data_akun"><em class="fas fa-user-lock"></em> Data Akun</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <em class="fas fa-book"></em> Master Data
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?page=add_jenlau"><em class="fas fa-plus"></em> Tambah Jenis Loundry</a>
                        <a class="dropdown-item" href="?page=add_jenpak"><em class="fas fa-plus"></em> Tambah Jenis Pakaian</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <em class="fas fa-print"></em> Laporan
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?page=report_kiloan"><em class="fas fa-file"></em> Laporan Laundry Kiloan</a>
                        <a class="dropdown-item" href="?page=report_satuan"><em class="fas fa-file"></em> Laporan Laundry Satuan</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <em class="fas fa-shopping-cart"></em> Pesanan
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?page=order_kiloan"><em class="fas fa-shopping-cart"></em> laundry Kiloan</a>
                        <a class="dropdown-item" href="?page=order_satuan"><em class="fas fa-shopping-cart"></em> Laundry Satuan</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <em class="fas fa-wallet"></em> Konfirmasi Transfer
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?page=acc_kiloan"><em class="fas fa-money-check"></em> Laundry Kiloan</a>
                        <a class="dropdown-item" href="?page=acc_satuan"><em class="fas fa-money-check"></em> Laundry Satuan</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=delivery"><em class="fas fa-truck"></em> Pengiriman</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-danger" data-target="#konfirmasi_logout" data-toggle="modal" href="#!"><em class="fas fa-power-off"></em> Logout <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>