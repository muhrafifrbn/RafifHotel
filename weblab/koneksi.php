<?php

$koneksi = mysqli_connect("localhost","root","","latihansabtu");
if(!$koneksi){
    echo mysqli_error($koneksi);
}

?>