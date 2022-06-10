<?php

$active = "Details";

if (isset($_GET['details'])) {

    $emal = $_SESSION['email_pelanggan'];
    $query = "select * from pelanggan where email_pelanggan = '$emal'";

    $run_query = mysqli_query($con,$query);

    $row_query = mysqli_fetch_array($run_query);

    $nama_pelanggan = $row_query['nama_pelanggan'];
    $email_pelanggan = $row_query['email_pelanggan'];
    $jenis_kelamin = $row_query['jenis_kelamin_pelanggan'];
    $alamat_pelanggan = $row_query['alamat_pelanggan'];

    echo  "
    <div class='col-md-8 col-12' style='margin:0px auto'>
    <div class='bg-light text-dark' style='border:solid #e5e5e5 0.2px; padding: 10px 40px'> 
            <div class='ci-text'>
                <span style='font-size:large;font-weight:600'>Email</span>
                <p style='text-align:center'>$email_pelanggan</p>
            </div>
            <div class='ci-text'>
                <span style='font-size:large;font-weight:600'>Jenis Kelamin</span>
                <p style='text-align:center'>$jenis_kelamin</p>
            </div>
            <div class='ci-text'>
                <span style='font-size:large;font-weight:600'>Alamat</span>
                <p style='text-align:center'>$alamat_pelanggan</p>
            </div>        
         </div>
    </div> 
        ";
}