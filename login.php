<?php

$active = "Login";

include("db.php");
include("functions.php");
include("header.php");

?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Beranda</a>
                    <span>Masuk</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Masuk</h2>
                    <form action="login.php" method="post">
                        <div class="group-input">
                            <label for="username">Email </label>
                            <input type="text" id="username" name="cemail" required>
                            <div id="email_error"></div>
                        </div>
                        <div class="group-input">
                            <label for="pass">Kata Sandi</label>
                            <input type="password" id="pass" name="password" required>
                            <div id="password_error"></div>
                        </div>

                        <button name="login" class="site-btn login-btn">Masuk</button>
                    </form>
                    <div class="switch-login">
                        <a href="register.php" class="or-login">atau buat akun baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<?php
include('footer.php');
?>

</body>

</html>

<?php

if (isset($_POST['login'])) {

    $email_pelanggan = $_POST['cemail'];
    $log_pass = $_POST['password'];

    $sel_pelanggan = "select * from pelanggan where email_pelanggan = '$email_pelanggan' AND password_pelanggan = '$log_pass'";

    $run_sel_c = mysqli_query($con, $sel_pelanggan);

    $get_ip = getRealIpUser();

    $check_pelanggan = mysqli_num_rows($run_sel_c);

    $select_keranjang = "select * from keranjang where email_pelanggan = '$email_pelanggan'";

    $run_sel_keranjang = mysqli_query($con, $select_keranjang);

    $check_keranjang = mysqli_num_rows($run_sel_keranjang);

    if ($check_pelanggan == 0) {

        echo "
        <script>
                bootbox.alert({
                    message: 'Invalid Username or Password',
                    backdrop: true
                });
        </script>";
        exit();
    }

    if ($check_pelanggan == 1 and $check_keranjang == 0) {

        $_SESSION['email_pelanggan'] = $email_pelanggan;

        echo  "<script>window.open('index.php?stat=1','_self')</script>";
    } else {
        $_SESSION['email_pelanggan'] = $email_pelanggan;

    
        echo  "<script>window.open('check-out.php?','_self')</script>";
    }
}

?>