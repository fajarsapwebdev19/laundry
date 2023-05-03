<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><em class="fas fa-user"></em> <?= $data_user->nama; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./"><em class="fas fa-home"></em> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <em class="fas fa-user-plus"></em> Tambah Pesanan
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?page=order_kiloan"><em class="fas fa-balance-scale"></em> Loundry Kiloan</a>
                        <a class="dropdown-item" href="?page=order_satuan"><em class="fas fa-tshirt"></em> Loundry Satuan</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <em class="fas fa-hand-holding-usd"></em> Pembayaran
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?page=pay_kiloan"><em class="far fa-credit-card"></em> Loundry Kiloan</a>
                        <a class="dropdown-item active" href="?page=pay_satuan"><em class="far fa-credit-card"></em> Loundry Satuan</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=profile"><em class="fas fa-user"></em> Profile</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-danger" data-target="#konfirmasi_logout" data-toggle="modal" href="#!"><em class="fas fa-power-off"></em> Logout <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>