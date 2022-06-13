<?php

$active = "Register";

include("db.php");
include("functions.php");
include('header.php');

?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-text">
					<a href="Index"><i class="fa fa-home"></i> Home</a>
					<span>Register</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="register-form">
					<h2>Register</h2>
					<form action="register" method="post" enctype="multipart/form-data" id="logform">
						<div class="group-input">
							<label for="nama_pelanggan">Nama</label>
							<input type="text" id="nama_pelanggan" name="nama_pelanggan" required>
							<div id="nameerr" style="margin:20px 0"></div>
						</div>
						<div class="group-input">
							<label for="email">Email</label>
							<input type="text" id="email_pelanggan" name="email_pelanggan" required>
							<div id="eerr" style="margin:20px 0"></div>
						</div>
						<div class="group-input">
							<label for="pass">Password</label>
							<input type="password" id="password_pelanggan" name="password_pelanggan" required>
						</div>
						<div class="group-input">
							<label for="con-pass">Alamat</label>
							<input type="text" id="alamat_pelanggan" name="alamat_pelanggan" required>
						</div>
						<div class="group-input">
							<label for="con-pass">Jenis Kelamin</label>
							<select class="form-control" style="width: 100%;" name="jenis_kelamin_pelanggan" required>
                <option selected>Laki-laki</option>
                <option>Perempuan</option>   
              </select>
						</div>
						<div class="group-input">
							<label for="con-pass">Foto</label>
							<input type="file" name="foto_pelanggan" style="border: none; margin-top:6px;" required>
						</div>
						<button type="submit" class="site-btn register-btn" name="register">REGISTER</button>
					</form>
					<div class="switch-login">
						<a href="login" class="or-login">atau Login</a>
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

<script>
$("#logform").submit(function(event) {
	var name = $('#nama_pelanggan').val();
	var email = $('#email_pelanggan').val();
	// var con = $('#con').val();

	var letters = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;
	var em = /\S+@\S+\.\S+/;
	var numbers = /^[0-9]{12}$/;


	if (!name.match(letters)) {
		$("#nameerr").html(
			"<span class='alert alert-danger'>" +
			"Masukkan nama yang valid</span>");

		event.preventDefault();

	}

	if (!email.match(em)) {
		$("#eerr").html(
			"<span class='alert alert-danger'>" +
			"Masukkan email yang valid</span>");
		event.preventDefault();
	}


});
</script>

</body>

</html>

<?php
function getRans($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

if (isset($_POST['register'])) {


	$nama_pelanggan = $_POST['nama_pelanggan'];
	$email_pelanggan = $_POST['email_pelanggan'];
	$password_pelanggan = $_POST['password_pelanggan'];
	$alamat_pelanggan = $_POST['alamat_pelanggan'];
	$jenis_kelamin_pelanggan = $_POST['jenis_kelamin_pelanggan'];


	$_SESSION['email_pelanggan'] = $email_pelanggan;
	$email_pelanggan = $_SESSION['email_pelanggan'];

	$tardir = "admin/image/foto_pelanggan/";

	$fileName = getRans(5).date("YmdHis").basename($_FILES['foto_pelanggan']['name']);

	$targetPath = $tardir . $fileName;
	$fileType = pathinfo($targetPath, PATHINFO_EXTENSION);

	$allow = array('jpg', 'png', 'jpeg');


	if (in_array($fileType, $allow)) {
		if (move_uploaded_file($_FILES['foto_pelanggan']['tmp_name'], $targetPath)) {
			$insert_c = "Insert into pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,alamat_pelanggan,jenis_kelamin_pelanggan,foto_pelanggan)
			values('$nama_pelanggan','$email_pelanggan','$password_pelanggan','$alamat_pelanggan','$jenis_kelamin_pelanggan','$fileName')";
		}
	} else {
		echo "<script>alert('Image not Inserted.')</script>";
	}



	$run_insert = mysqli_query($con, $insert_c);


	$sel_keranjang = "select * from keranjang where email_pelanggan = '$email_pelanggan'";
	$run_sel_keranjang = mysqli_query($con, $sel_keranjang);
	$check_keranjang = mysqli_num_rows($run_sel_keranjang);


	if ($check_keranjang > 0) {

		$_SESSION['email_pelanggan'] = $email_pelanggan;

		$_SESSION['new'] = $email_pelanggan;

		echo "<script>window.open('check-out','_self')</script>";
	} else {

		$_SESSION['email_pelanggan'] = $email_pelanggan;

		$_SESSION['new'] = $email_pelanggan;
		echo "<script>window.open('index','_self')</script>";
	}
}

?>