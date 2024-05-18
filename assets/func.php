<?php

require_once 'koneksi.php';
//koneksi ke database
class klas_air
{
    function tipe_user($sesi_user)
    {
        $q = mysqli_query(koneksi(), "SELECT tipe_user FROM user WHERE username='$sesi_user'");
        $d = mysqli_fetch_row($q);
        return $d[0];
    }

    function data_user($sesi_user)
    {
        $q = mysqli_query(koneksi(), "SELECT nik, nama, tipe_user, no_telepon, alamat, email FROM user WHERE username='$sesi_user'");
        $d = mysqli_fetch_array($q);
        return $d;
    }

    function enkrip_pass()
    {
        $q = mysqli_query(koneksi(), "SELECT nik, username, password FROM user ORDER BY nama ASC");
        while ($data = mysqli_fetch_row($q)) {
            $nik  = $data[0];
            $user = $data[1];
            $pass = $data[2];

            $pass_enkripsi = password_hash($user, PASSWORD_DEFAULT);
            mysqli_query(koneksi(), "UPDATE user SET password = \"$pass_enkripsi\" WHERE nik = '$nik'");
        }
    }

    function sesi_to_nik($sesi) {
        $q = mysqli_query(koneksi(), "SELECT nik FROM user WHERE username='$sesi'");
        $d = mysqli_fetch_row($q);
        return $d[0];
    }

    function nik_to_nama($nik) {
        $q = mysqli_query(koneksi(), "SELECT nama FROM user WHERE nik='$nik'");
        $d = mysqli_fetch_row($q);
        return $d[0];
    }

    function tgl_balik($tgl) {
        $e = explode("-", $tgl);
        $tgl_baru = $e[2] . '-' . $e[1] . '-' . $e[0];
        return $tgl_baru;
    }

    // function koneksi()
    // {
    //     $koneksi = mysqli_connect('localhost', 'user_air', '#Us3r_A1r_2024#', 'air');

    //     return $koneksi;
    // }
    // function tampil_user()
    // {
    //     $q = mysqli_query($this->koneksi(), "SELECT nik, nama, username, email, no_telepon, alamat, tipe_user FROM user ORDER BY tipe_user ASC, nama ASC");
    //     while ($row = mysqli_fetch_row($q)) {
    //         $d[] = $row;
    //     }
    //     return $d;
    // }

    // function tampil_komplain()
    // {
    //     $q = mysqli_query($this->koneksi(), "SELECT * FROM komplain");
    //     while ($row = mysqli_fetch_array($q)) {
    //         $d[] = $row;
    //     }
    //     return $d;
    // }
}
