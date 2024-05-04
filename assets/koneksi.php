<?php
function koneksi()
{
    $koneksi = mysqli_connect('localhost', 'user_air', '#Us3r_A1r_2024#', 'air');

    return $koneksi;
}
?>