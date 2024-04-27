<?php
session_start();
if (empty($_SESSION['user']) && empty($_SESSION['password'])) {
    echo "<script>window.location.replace('login.php')</script>";
}

include '../assets/func.php';
$air = new klas_air();
$koneksi = $air->koneksi();
$tipe_user = $air->tipe_user($_SESSION['username']);
$data_user = $air->data_user($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Dashboard</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php

                        if ($tipe_user == 'admin') {
                        ?>
                            <a class="nav-link" href="index.php?=user">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Manajemen User
                            </a>
                            <a class="nav-link" href="index.php?p=lihat_komplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Komplain
                            </a>
                            <a class="nav-link" href="index.php?p=lihat_pemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Pemakaian
                            </a>
                            <a class="nav-link" href="index.php?p=ubah_data">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ubah Data
                            </a>
                        <?php
                        }
                        ?>

                        <?php
                        if ($tipe_user == 'petugas') {
                        ?>
                            <a class="nav-link" href="index.php?p=input_meter">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Input Meter
                            </a>
                            <a class="nav-link" href="index.php?p=komplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Komplain
                            </a>
                            <a class="nav-link" href="index.php?p=ubah_data">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ubah Data Pemakaian
                            </a>
                            <a class="nav-link" href="index.php?p=pemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Pemakaian
                            </a>
                            <a class="nav-link" href="index.php?p=jatuh_tempo">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Jatuh Tempo
                            </a>
                        <?php
                        }
                        ?>

                        <?php
                        if ($tipe_user == 'warga') {
                        ?>
                            <a class="nav-link" href="index.php?p=pembayaran">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pembayaran
                            </a>
                            <a class="nav-link" href="index.php?p=pemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Pemakaian
                            </a>
                            <a class="nav-link" href="index.php?p=tagihan">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Tagihan
                            </a>
                            <a class="nav-link" href="index.php?p=komplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ajukan Komplain
                            </a>
                        <?php
                        }
                        ?>

                        <?php
                        if ($tipe_user == 'bendahara') {
                        ?>
                            <a class="nav-link" href="index.php?p=tarif">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Manajemen Tarif
                            </a>
                            <a class="nav-link" href="index.php?p=tagihan">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Tagihan
                            </a>
                            <a class="nav-link" href="index.php?p=komplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Komplain
                            </a>
                            <a class="nav-link" href="index.php?p=jatuh_tempo">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Jatuh Tempo
                            </a>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"><i class="fa-solid fa-droplet" style="width: 10px;"></i> Logged in as:</div>
                    <?php
                    echo "$data_user[1] ($data_user[2])";
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php
                $e = explode("=", $_SERVER['REQUEST_URI']);
                if ($tipe_user == 'admin') {
                    if (!empty($e[1])) {
                        if ($e[1] == 'user') {
                            $h1 = "Manajemen User";
                            $h2 = "Menu untuk CRUD data user";
                            $list = '
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>No. Telepon</th>
                                            <th>Tipe User</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                            foreach ($air->tampil_user() as $d) {
                                $list .= '
                                        <tr>
                                            <td>' . $d['nik'] . '</td>
                                            <td>' . $d['nama'] . '</td>
                                            <td>' . $d['username'] . '</td>
                                            <td>' . $d['email'] . '</td>
                                            <td>' . $d['no_telepon'] . '</td>
                                            <td>' . $d['tipe_user'] . '</td>
                                            <td>
                                                <button type="button" class="btn btn-primary"><i class="fa-solid fa-user-pen fa-xs me-2"></i>Ubah</button>
                                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fa-xs me-2"></i>Hapus</button>
                                            </td>
                                        </tr>';
                            }
                            $list .= '
                                    </tbody>';
                        } elseif ($e[1] == 'lihat_komplain') {
                            $h1 = "Lihat Komplain";
                            $h2 = "Menu untuk melihat data komplain warga";
                            $list = '
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Pembayaran</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Pembayaran</th>
                                        <th>Pesan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </tfoot>
                                <tbody>';
                            foreach ($air->tampil_komplain() as $d) {
                                $list .= '
                                        <tr>
                                            <td>' . $d['no'] . '</td>
                                            <td>' . $d['no_pembayaran'] . '</td>
                                            <td>' . $d['pesan'] . '</td>
                                            <td>' . $d['status'] . '</td>
                                            <td>' . $d['tgl'] . '</td>
                                        </tr>';
                            }
                            $list .= '
                                    </tbody>';
                        } elseif ($e[1] == 'lihat_pemakaian') {
                            $h1 = "Lihat Pemakaian";
                            $h2 = "Menu untuk melihat data pemakaian warga";
                        } elseif ($e[1] == 'ubah_data') {
                            $h1 = "Ubah Data";
                            $h2 = "Menu untuk mengubah data warga";
                        }
                    } else {
                        $h1 = "Dashboard";
                        $h2 = "Dashboard";
                    }
                } elseif ($tipe_user == 'warga') {
                    if (!empty($e[1])) {
                        if ($e[1] == 'pembayaran') {
                            $h1 = "Pembayaran";
                            $h2 = "Menu untuk CRUD data user";
                        } elseif ($e[1] == 'komplain') {
                            $h1 = "Ajukan Komplain";
                            $h2 = "Menu untuk melihat data komplain warga";
                        } elseif ($e[1] == 'pemakaian') {
                            $h1 = "Lihat Pemakaian";
                            $h2 = "Menu untuk melihat data pemakaian warga";
                        } elseif ($e[1] == 'tagihan') {
                            $h1 = "Lihat Tagihan";
                            $h2 = "Menu untuk mengubah data warga";
                        }
                    } else {
                        $h1 = "Dashboard";
                        $h2 = "Dashboard";
                    }
                } elseif ($tipe_user == 'petugas') {
                    if (!empty($e[1])) {
                        if ($e[1] == 'input_meter') {
                            $h1 = "Input Meter";
                            $h2 = "Menu untuk CRUD data user";
                        } elseif ($e[1] == 'komplain') {
                            $h1 = "Lihat Komplain";
                            $h2 = "Menu untuk melihat data komplain warga";
                        } elseif ($e[1] == 'pemakaian') {
                            $h1 = "Lihat Pemakaian";
                            $h2 = "Menu untuk melihat data pemakaian warga";
                        } elseif ($e[1] == 'tagihan') {
                            $h1 = "Lihat Tagihan";
                            $h2 = "Menu untuk mengubah data warga";
                        } elseif ($e[1] == 'ubah_data') {
                            $h1 = "Ubah Data Meter";
                            $h2 = "Menu untuk mengubah data warga";
                        } elseif ($e[1] == 'jatuh_tempo') {
                            $h1 = "Lihat Jatuh Tempo";
                            $h2 = "Menu untuk mengubah data warga";
                        }
                    } else {
                        $h1 = "Dashboard";
                        $h2 = "Dashboard";
                    }
                } elseif ($tipe_user == 'bendahara') {
                    if (!empty($e[1])) {
                        if ($e[1] == 'tarif') {
                            $h1 = "Menu Tarif";
                            $h2 = "Menu untuk CRUD data user";
                        } elseif ($e[1] == 'komplain') {
                            $h1 = "Lihat Komplain";
                            $h2 = "Menu untuk melihat data komplain warga";
                        } elseif ($e[1] == 'jatuh_tempo') {
                            $h1 = "Lihat Jatuh Tempo";
                            $h2 = "Menu untuk melihat data pemakaian warga";
                        } elseif ($e[1] == 'tagihan') {
                            $h1 = "Lihat Tagihan";
                            $h2 = "Menu untuk mengubah data warga";
                        }
                    } else {
                        $h1 = "Dashboard";
                        $h2 = "Dashboard";
                    }
                }
                ?>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">
                        <?php echo $h1; ?>
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?php echo $h2; ?></li>
                    </ol>
                    <div class="row" id="summary">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Primary Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Warning Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Success Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="chart">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['tombol']) == "user_add") {
                        $nik = $_POST['nik'];
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $pass = $_POST['password'];
                        $alamat = $_POST['alamat'];
                        $no_telepon = $_POST['no_telepon'];
                        $tipe_user = $_POST['tipe_user'];

                        mysqli_query($koneksi, "INSERT INTO user (nik,nama,email,username,password,alamat,no_telepon,tipe_user) VALUES ('$nik',\"$nama\",'$email','$username', '$pass','$alamat','$no_telepon','$tipe_user')");
                        if (mysqli_affected_rows($koneksi) > 0) {
                            echo "
                            <div class=\"alert alert-success alert-dismissible fade show\">
                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                <strong>Data</strong> Berhasil Ditambahkan!
                            </div>
                            ";
                        } else {
                            echo "
                            <div class=\"alert alert-danger alert-dismissible fade show\">
                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                <strong>Data</strong> Berhasil Ditambahkan!
                            </div>
                            ";
                        }
                    }
                    ?>
                    <div class="card mb-4" id="user_add">
                        <div class="card-header">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3 mt-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" placeholder="Masukan Nama" name="nik">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukan Nama" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="username" class="form-control" id="usernama" placeholder="Enter Username" name="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea type="text" class="form-control" rows="5" id="alamat" placeholder="Enter Alamat" name="alamat"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon" placeholder="Enter No Telepon" name="no_telepon">
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_user" class="form-label">Tipe User</label>
                                    <select class="form-select" name="tipe_user" id="tipe_user">
                                        <option value="admin">Admin</option>
                                        <option value="warga">Warga</option>
                                        <option value="bendahara">Bendahara</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tombol" value="user_add">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4" id="user_list">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <?php echo $list; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/air.js"></script>

</html>