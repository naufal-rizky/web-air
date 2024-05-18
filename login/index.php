<?php
session_start();
if (empty($_SESSION['user']) && empty($_SESSION['password'])) {
    echo "<script>window.location.replace('../index.php')</script>";
}

include '../assets/func.php';
$air = new klas_air();
$koneksi = koneksi(); // koneksi
$tipe_user = $air->tipe_user($_SESSION['username']);
$data_user = $air->data_user($_SESSION['username']);
$enkripsi  = $air->enkrip_pass($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Air Naufal & Fajar - Dashboard</title>
    <link rel="icon" href="../assets/img/nature.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php"><img src="../assets/img/nature.png" alt="easyclass" style="width: 24px; margin-right: 0.4rem; margin-bottom: 0.3rem" />
            <p style="display: inline;">Air</p>
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control search-bar" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary search" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
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
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                            Dashboard
                        </a>
                        <?php

                        if ($tipe_user == 'admin') {
                        ?>
                            <a class="nav-link" href="index.php?p=user">
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
                            <a class="nav-link" href="index.php?p=ubah_meter">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ubah Meter
                            </a>
                        <?php
                        } elseif ($tipe_user == 'petugas') {
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
                        } elseif ($tipe_user == 'bendahara') {
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
                        } else {
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

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"><i class="fa-solid fa-droplet" style="width: 10px;"></i> Logged in as:</div>
                    <?php
                    echo "<b>$data_user[1]</b> ($data_user[2])";
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php
                $e = explode("=", $_SERVER['REQUEST_URI']);
                if (!empty($e[1])) {
                    if ($e[1] == 'user' || $e[1] == 'user_edit&nik') {
                        $h1 = "Manajemen User";
                        $h2 = "Menu untuk CRUD data user";
                    } elseif ($e[1] == 'lihat_komplain') {
                        $h1 = "Lihat Komplain";
                        $h2 = "Menu untuk melihat data komplain warga";
                    } elseif ($e[1] == 'lihat_pemakaian') {
                        $h1 = "Lihat Pemakaian";
                        $h2 = "Menu untuk melihat data pemakaian warga";
                    } elseif ($e[1] == 'ubah_meter') {
                        $h1 = "Ubah Meter";
                        $h2 = "Menu untuk mengubah data warga";
                    } elseif ($e[1] == 'pembayaran') {
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
                    } elseif ($e[1] == 'input_meter' || $e[1] == 'input_meter_edit&no') {
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
                    } elseif ($e[1] == 'tarif' || $e[1] == 'tarif_edit&id_tarif') {
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
                    $status = "";
                    if (isset($_POST['tombol'])) {
                        $t = $_POST['tombol'];
                        if ($t == "user_add") {
                            $nik = $_POST['nik'];
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $username = $_POST['username'];
                            $pass = $_POST['password'];
                            $alamat = $_POST['alamat'];
                            $no_telepon = $_POST['no_telepon'];
                            $tipe_user = $_POST['tipe_user'];

                            $qc = mysqli_query($koneksi, "SELECT nik FROM user WHERE nik = '$nik' OR username = '$username'");
                            $jc = mysqli_num_rows($qc);
                            if (empty($jc)) {
                                mysqli_query($koneksi, "INSERT INTO user (nik,nama,email,username,password,alamat,no_telepon,tipe_user) VALUES ('$nik',\"$nama\",'$email','$username', '$pass','$alamat','$no_telepon','$tipe_user')");
                                if (mysqli_affected_rows($koneksi)) {
                                    echo "
                                    <div class=\"alert alert-success alert-dismissible fade show\">
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> Berhasil Ditambahkan!
                                    </div>
                                    ";
                                } else {
                                    echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> gagal ditambahkan!
                                    </div>
                                    ";
                                }
                            } else {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>NIK $nik atau Username $username</strong> sudah ada!
                                </div>
                                ";
                            }
                        } elseif ($t == "user_edit") {
                            $nik = $_POST['nik'];
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $alamat = $_POST['alamat'];
                            $no_telepon = $_POST['no_telepon'];
                            $tipe_user = $_POST['tipe_user'];

                            mysqli_query($koneksi, "UPDATE user SET nama = \"$nama\", email = '$email', alamat = '$alamat', no_telepon = '$no_telepon', tipe_user = '$tipe_user' WHERE nik = '$nik'");
                            if (mysqli_affected_rows($koneksi)) {
                                echo "
                                <div class=\"alert alert-success alert-dismissible fade show\" id=alert-user>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> Berhasil Diubah!
                                </div>
                                ";
                            } else {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> gagal diubah!
                                </div>
                                ";
                            }
                        } elseif ($t == 'user_hapus') {
                            $nik = $_POST['nik'];

                            mysqli_query($koneksi, "DELETE FROM user WHERE nik = '$nik'");
                            if (mysqli_affected_rows($koneksi)) {
                                echo "
                                <div class=\"alert alert-success alert-dismissible fade show\" id=alert-user>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> Berhasil Dihapus!
                                </div>
                                ";
                            } else {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> gagal Dihapus!
                                </div>
                                ";
                            }
                        } elseif ($t == "tarif_add") {
                            $id_tarif = $_POST['id_tarif'];
                            $kategori = $_POST['kategori'];
                            $tarif = $_POST['tarif'];
                            $status = $_POST['status'];

                            $qc = mysqli_query($koneksi, "SELECT id FROM tarif WHERE id = '$id_tarif'");
                            $jc = mysqli_num_rows($qc);
                            if (empty($jc)) {
                                mysqli_query($koneksi, "INSERT INTO tarif (id,kategori,harga,status) VALUES ('$id_tarif', \"$kategori\",'$tarif','$status')");
                                if (mysqli_affected_rows($koneksi)) {
                                    echo "
                                    <div class=\"alert alert-success alert-dismissible fade show\" id=alert-tarif>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> Berhasil Ditambahkan!
                                    </div>
                                    ";
                                } else {
                                    echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-tarif>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> gagal ditambahkan!
                                    </div>
                                    ";
                                }
                            } else {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-tarif>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>ID Tarif $id_tarif </strong> sudah ada!
                                </div>
                                ";
                            }
                        } elseif ($t == "tarif_edit") {
                            $id_tarif = $_POST['id_tarif'];
                            $kategori = $_POST['kategori'];
                            $tarif = $_POST['tarif'];
                            $status = $_POST['status'];

                            mysqli_query($koneksi, "UPDATE tarif SET id = '$id_tarif', kategori = '$kategori', harga = '$tarif', status = '$status' WHERE id = '$id_tarif'");
                            if (mysqli_affected_rows($koneksi)) {
                                echo "
                                <div class=\"alert alert-success alert-dismissible fade show\" id=alert-tarif>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> Berhasil Diubah!
                                </div>
                                ";
                            } else {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-tarif>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> gagal diubah!
                                </div>
                                ";
                            }
                        } elseif ($t == 'tarif_hapus') {
                            $id_tarif = $_POST['id_tarif'];
                            mysqli_query($koneksi, "DELETE FROM tarif WHERE id = '$id_tarif'");
                            if (mysqli_affected_rows($koneksi)) {
                                echo "
                                <div class=\"alert alert-success alert-dismissible fade show\" id=alert-tarif>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> Berhasil Dihapus!
                                </div>
                                ";
                            } else {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-tarif>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> gagal Dihapus!
                                </div>
                                ";
                            }
                        } elseif ($t == "input_meter_add") {
                            $id_pelanggan = $_POST['id_pelanggan'];
                            $meter_awal = $_POST['meter_awal'];
                            $meter_akhir = $_POST['meter_akhir'];
                            $tgl = $_POST['tgl'];
                            $waktu = $_POST['waktu'];

                            if ($meter_awal > $meter_akhir) {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Meter Akhir</strong> tidak boleh lebih kecil dari Meter Awal...!
                                </div>
                                ";
                            } else {
                                $pemakaian = $meter_akhir - $meter_awal;
                                $id_pencatat = $air->sesi_to_nik($_SESSION['username']);
                                mysqli_query($koneksi, "INSERT INTO meter (nik_user,meter_awal,meter_akhir,pemakaian,tgl,waktu,id_pencatat) VALUES ('$id_pelanggan', '$meter_awal', '$meter_akhir', '$pemakaian', '$tgl', '$waktu', '$id_pencatat')");
                                if (mysqli_affected_rows($koneksi)) {
                                    echo "
                                    <div class=\"alert alert-success alert-dismissible fade show\" id=alert-input_meter>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> Berhasil Ditambahkan!
                                    </div>
                                    ";
                                } else {
                                    echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> gagal ditambahkan!
                                    </div>
                                    ";
                                }
                            }
                        } elseif ($t == "input_meter_edit") {
                            $no = $_POST['no'];
                            $id_pelanggan = $_POST['id_pelanggan'];
                            $meter_awal = $_POST['meter_awal'];
                            $meter_akhir = $_POST['meter_akhir'];
                            $tgl = $_POST['tgl'];
                            $waktu = $_POST['waktu'];

                            if ($meter_awal > $meter_akhir) {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Meter Akhir</strong> tidak boleh lebih kecil dari Meter Awal...!
                                </div>
                                ";
                            } else {
                                $pemakaian = $meter_akhir - $meter_awal;
                                $id_pencatat = $air->sesi_to_nik($_SESSION['username']);
                                mysqli_query($koneksi, "UPDATE meter SET nik_user = '$id_pelanggan', meter_awal = '$meter_awal', meter_akhir = '$meter_akhir', tgl = '$tgl', waktu = '$waktu', pemakaian = '$pemakaian', id_pencatat = '$id_pencatat' WHERE no = '$no'");
                                if (mysqli_affected_rows($koneksi)) {
                                    echo "
                                    <div class=\"alert alert-success alert-dismissible fade show\" id=alert-input_meter>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> Berhasil Diubah!
                                    </div>
                                    ";
                                } else {
                                    echo "
                                    <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>Data</strong> gagal diubah!
                                    </div>
                                    ";
                                }
                            }
                        } elseif ($t == 'input_meter_hapus') {
                            $no = $_POST['no'];
                            mysqli_query($koneksi, "DELETE FROM meter WHERE no = '$no'");
                            if (mysqli_affected_rows($koneksi)) {
                                echo "
                                <div class=\"alert alert-success alert-dismissible fade show\" id=alert-input_meter>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> Berhasil Dihapus!
                                </div>
                                ";
                            } else {
                                echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" id=alert-input_meter>
                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                    <strong>Data</strong> gagal Dihapus!
                                </div>
                                ";
                            }
                        }
                    } elseif (isset($_GET['p'])) {
                        $p = $_GET['p'];
                        if ($p == 'user_edit') {
                            $nik = $_GET['nik'];
                            $q = mysqli_query($koneksi, "SELECT nama,email,username,password,alamat,no_telepon,tipe_user FROM user where nik = '$nik'");
                            $d = mysqli_fetch_row($q);
                            $nama = $d[0];
                            $email = $d[1];
                            $username = $d[2];
                            $password = $d[3];
                            $alamat = $d[4];
                            $no_telepon = $d[5];
                            $tipe_user = $d[6];
                        } elseif ($p == 'tarif') {
                            $id_tarif = "";
                            $status = "";
                        } elseif ($p == 'tarif_edit') {
                            $id_tarif = $_GET['id_tarif'];
                            $q = mysqli_query($koneksi, "SELECT kategori,harga,status FROM tarif where id = '$id_tarif'");
                            $d = mysqli_fetch_row($q);
                            $kategori = $d[0];
                            $tarif = $d[1];
                            $status = $d[2];
                        } elseif ($p == 'input_meter') {
                            $id_pelanggan = "";
                        } elseif ($p == 'input_meter_edit') {
                            $no = $_GET['no'];
                            $q = mysqli_query($koneksi, "SELECT nik_user, meter_awal, meter_akhir, pemakaian, tgl, waktu FROM meter where no = '$no'");
                            $d = mysqli_fetch_row($q);
                            $id_pelanggan = $d[0];
                            $meter_awal = $d[1];
                            $meter_akhir = $d[2];
                            $pemakaian = $d[3];
                            $tgl = $d[4];
                            $waktu = $d[5];
                        }
                    }
                    ?>
                    <div class="card mb-4" id="user_add">
                        <div class="card-header">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" class="needs-validation" id="user_form">
                                <div class="mb-3 mt-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" placeholder="Masukan Nama" value="<?php echo $nik ?>" name="nik" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukan Nama" value="<?php echo $nama ?>" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $email ?>" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter Username" value="<?php echo $username ?>" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter Password" value="<?php echo $password ?>" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea type="text" class="form-control" id="alamat" placeholder="Enter Alamat" name="alamat"><?php echo $alamat ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon" placeholder="Enter No Telepon" value="<?php echo $no_telepon ?>" name="no_telepon">
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_user" class="form-label">Tipe User</label>
                                    <select class="form-select" name="tipe_user" id="tipe_user" required>
                                        <?php
                                        $tu = array("admin", "petugas", "bendahara", "warga");
                                        foreach ($tu as $tu2) {
                                            if ($tipe_user == $tu2) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value='$tu2' $sel>" . ucwords($tu2) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tombol" value="user_add">Submit</button>
                            </form>
                        </div>
                    </div>

                    <div class="card mb-4" id="tarif_add">
                        <div class="card-header">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" class="needs-validation" id="tarif_form">
                                <div class="mb-3 mt-3">
                                    <label for="id" class="form-label">ID Tarif</label>
                                    <input type="text" class="form-control" id="id_tarif" placeholder="Masukan ID Tarif" value="<?php echo $id_tarif ?>" name="id_tarif" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Tarif</label>
                                    <input type="number" class="form-control" id="tarif" placeholder="Enter Tarif" value="<?php echo $tarif ?>" name="tarif">
                                </div>
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori" id="kategori" required>
                                        <?php
                                        $tt = array("rumah", "kos");
                                        foreach ($tt as $tt2) {
                                            if ($kategori == $tt2) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value='$tt2' $sel>" . ucwords($tt2) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                $st = array("AKTIF", "NON AKTIF");
                                foreach ($st as $st2) {
                                    if ($status == $st2) $sel = "CHECKED";
                                    else $sel = "";
                                    echo "
                                    <div class=\"form-check- form-check-inline\">
                                        <input class=form-check-input type=radio id=radio1 name=status value=\"$st2\" $sel>
                                        <label class=form-check-label for=status>$st2</label>
                                    </div>";
                                }
                                ?>
                                <div>
                                    <button type="submit" class="btn btn-primary mt-4" name="tombol" value="tarif_add">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mb-4" id="input_meter_add">
                        <div class="card-header">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" class="needs-validation" id="input_meter_form">
                                <div class="mb-3">
                                    <label for="id_pelanggan" class="form-label">Nama Pelanggan:</label>
                                    <select class="form-select" name="id_pelanggan" id="id_pelanggan" required>
                                        <?php
                                        $q =  mysqli_query($koneksi, "SELECT nik, nama FROM user WHERE tipe_user = 'warga' ORDER BY nama ASC");
                                        while ($d = mysqli_fetch_row($q)) {
                                            if ($id_pelanggan == $d[0]) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value=$d[0] $sel>" . ucwords($d[1]) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="meter_awal" class="form-label">Meter Awal (m<sup>3</sup>)</label>
                                    <input type="number" class="form-control" id="meter_awal" min=0 placeholder="Masukan Meter Awal" value="<?php echo $meter_awal ?>" name="meter_awal" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="meter_akhir" class="form-label">Meter Akhir (m<sup>3</sup>)</label>
                                    <input type="number" class="form-control" id="meter_akhir" placeholder="Masukan Meter Akhir" value="<?php echo $meter_akhir ?>" name="meter_akhir" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="tgl" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tgl" placeholder="Masukan Tanggal" value="<?php echo $tgl ?>" name="tgl" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="waktu" class="form-label">Waktu</label>
                                    <input type="time" class="form-control" id="waktu" placeholder="Masukan Waktu" value="<?php echo $waktu ?>" name="waktu" required>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary mt-4" name="tombol" value="tarif_add">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mb-4 test" id="user_list">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table class="table table-light" id="datatablesSimple">
                                <?php
                                $e = explode("=", $_SERVER['REQUEST_URI']);
                                if ($e[1] == "user" || $e[1] == "user_edit&nik") {
                                    echo " 
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>nama</th>
                                            <th>username</th>
                                            <th>email</th>
                                            <th>No. Telepon</th>
                                            <th>Tipe User</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>";
                                } elseif ($e[1] == "lihat_komplain") {
                                    echo " 
                                    <thead>
                                        </tr>
                                            <th>No</th>
                                            <th>No Pembayaran</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>";
                                } elseif ($e[1] == "lihat_pemakaian") {
                                    echo " 
                                    <thead>
                                        </tr>
                                            <th>No</th>
                                            <th>ID Tarif</th>
                                            <th>No Meter</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>";
                                } elseif ($e[1] == "ubah_meter") {
                                    echo " 
                                    <thead>
                                        </tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Meter Awal</th>
                                            <th>Meter Akhir</th>
                                            <th>Pemakaian</th>
                                            <th>Foto</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>";
                                }
                                ?>
                                <tbody>
                                    <?php
                                    $e = explode("=", $_SERVER['REQUEST_URI']);
                                    if ($e[1] == "user" || $e[1] == "user_edit&nik") {
                                        $q = mysqli_query($koneksi, "SELECT nik, nama, username, email, no_telepon, tipe_user FROM user ORDER BY tipe_user ASC, nama ASC");
                                        while ($d = mysqli_fetch_row($q)) {
                                            $nik = $d[0];
                                            $nama = $d[1];
                                            $username = $d[2];
                                            $email = $d[3];
                                            $no_telpon = $d[4];
                                            $tipe_user = $d[5];


                                            echo "
                                            <tr>
                                                <td>$nik</td>
                                                <td>$nama</td>
                                                <td>$username</td>
                                                <td>$email</td>
                                                <td>$no_telpon</td>
                                                <td>$tipe_user</td>
                                                <td>
                                                    <a href=index.php?p=user_edit&nik=$nik><button type=button class=\"btn btn-primary ubah\" onclick>Ubah</button></a>
                                                    <button type=button class=\"btn btn-danger hapus\" data-bs-toggle=modal data-bs-target=#myModal data-nik=$nik>Hapus</button>
                                                </td>
                                            </tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mb-4 test" id="tarif_list">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tarif
                        </div>
                        <div class="card-body">
                            <table class="table table-light" id="tarif_table">
                                <thead>
                                    <tr>
                                        <th>ID Tarif</th>
                                        <th>Kategori</th>
                                        <th>Tarif</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $e = explode("=", $_SERVER['REQUEST_URI']);
                                    if ($e[1] == "tarif" || $e[1] == "tarif_edit&id_tarif") {
                                        $q = mysqli_query($koneksi, "SELECT id, kategori, harga, status FROM tarif ORDER BY id ASC, kategori ASC");
                                        while ($d = mysqli_fetch_row($q)) {
                                            $id_tarif = $d[0];
                                            $kategori = $d[1];
                                            $tarif = $d[2];
                                            $status = $d[3];


                                            echo "
                                            <tr>
                                                <td>$id_tarif</td>
                                                <td>$kategori</td>
                                                <td>$tarif</td>
                                                <td>$status</td>
                                                <td>
                                                    <a href=index.php?p=tarif_edit&id_tarif=$id_tarif><button type=button class=\"btn btn-primary ubah\" onclick>Ubah</button></a>
                                                    <button type=button class=\"btn btn-danger hapus\" data-bs-toggle=modal data-bs-target=#myModal data-id_tarif=$id_tarif>Hapus</button>
                                                </td>
                                            </tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mb-4 test" id="input_meter_list">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Input Meter
                        </div>
                        <div class="card-body">
                            <table class="table table-light" id="input_meter-table">
                                <thead>
                                    <tr>
                                        <th>Nama Pelanggan</th>
                                        <th>Meter Awal (m<sup>3</sup>)</th>
                                        <th>Meter Akhir (m<sup>3</sup>)</th>
                                        <th>Pemakaian</th>
                                        <th>Tanggal dan Waktu</th>
                                        <th>Petugas Pencatat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $e = explode("=", $_SERVER['REQUEST_URI']);
                                    if ($e[1] == "input_meter" || $e[1] == "input_meter_edit&no") {
                                        $q = mysqli_query($koneksi, "SELECT * FROM meter ORDER BY tgl ASC");
                                        while ($d = mysqli_fetch_row($q)) {
                                            $no = $d[0];
                                            $id_pelanggan = ucwords($air->nik_to_nama($d[1]));
                                            $meter_awal = $d[2];
                                            $meter_akhir = $d[3];
                                            $pemakaian = $d[4];
                                            $tgl = $air->tgl_balik($d[5]);
                                            $waktu = $d[6];
                                            $id_pencatat = ucwords($air->nik_to_nama($d[7]));


                                            echo "
                                            <tr>
                                                <td>$id_pelanggan</td>
                                                <td>$meter_awal</td>
                                                <td>$meter_akhir</td>
                                                <td>$pemakaian</td>
                                                <td>$tgl $waktu</td>
                                                <td>$id_pencatat</td>
                                                <td>
                                                    <a href=index.php?p=input_meter_edit&no=$no><button type=button class=\"btn btn-primary ubah\" onclick>Ubah</button></a>
                                                    <button type=button class=\"btn btn-danger hapus\" data-bs-toggle=modal data-bs-target=#myModal data-no=$no>Hapus</button>
                                                </td>
                                            </tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body"></div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</button>
                                    <form method="post">
                                        <button type="submit" name="tombol" value="user_hapus" class="btn btn-danger" data-bs-dismiss="modal">Ya</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </main>
            <footer class="py-4 mt-auto">
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
</body>

</html>