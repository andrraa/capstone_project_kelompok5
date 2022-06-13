<?php 

    $email_pelanggan = $_SESSION['email_pelanggan'];
    $query = "select * from pelanggan where email_pelanggan = '$email_pelanggan'";

    $run_query = mysqli_query($con,$query);

    $row_query = mysqli_fetch_array($run_query);

    $nama_pelanggan = $row_query['nama_pelanggan'];
    $foto_pelanggan = $row_query['foto_pelanggan'];
    
?>

<div class="card">
    <img class="card-img-top" src="admin/image/foto_pelanggan/<?php echo $foto_pelanggan ?>" alt="<?php echo $nama_pelanggan ?>" style="width:100%">
    <h4 style="text-align: center;padding:15px 0">
        <?php echo $nama_pelanggan ?>
    </h4>
    <div class="card-body" style="border-top:0.2px solid #e9e9e9 ;">
        <ul class="list-group">
            <li class="list-group-item" <?php if (isset($_GET['orders'])) {
                                              echo  "style = 'background-color:#fe4231'";
                                            } ?>>
                <a href="account?orders">
                    <i class="fa fa-list"></i> Pesanan Saya
                </a>
            </li>
            <li class="list-group-item" <?php if (isset($_GET['details'])) {
                                                echo  "style = 'background-color:#fe4231'";
                                            } ?>>
                <a href="account?details">
                    <i class="fa fa-bolt"></i> Profil Saya
                </a>
            </li>
        </ul>
    </div>
</div>