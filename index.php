<?php

$active = "Home";

include("functions.php");
include("header.php");

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bot.css">

<section class="hero-section">
	<div class="hero-items owl-carousel">

		<?php

		$get_slides = "select * from slider LIMIT 0,1";
		$run_slider = mysqli_query($con, $get_slides);

		while ($row_slides = mysqli_fetch_array($run_slider)) {

			$nama_slider = $row_slides['nama_slider'];
			$gambar_slider = $row_slides['gambar_slider'];
			$heading_slider = $row_slides['heading_slider'];
			$text_slider = $row_slides['text_slider'];

			echo "

			<div class='single-hero-items set-bg' data-setbg='admin/image/gambar_slider/$gambar_slider'>
				<div class='container'>
					<div class='row'>
						<div class='col-lg-5'>
							<h1>$heading_slider</h1>
							<p>$text_slider
							</p>
							<a href='shop.php' class='primary-btn'>Belanja Sekarang!</a>
						</div>
					</div>
					<div class='off-card'>
						<h2>Sampai <span>70%</span></h2>
					</div>  
				</div>
			</div>
				";
		}

		$get_slides = "select * from slider LIMIT 1,8";
		$run_slider = mysqli_query($con, $get_slides);

		while ($row_slides = mysqli_fetch_array($run_slider)) {

			$nama_slider = $row_slides['nama_slider'];
			$gambar_slider = $row_slides['gambar_slider'];
			$heading_slider = $row_slides['heading_slider'];
			$text_slider = $row_slides['text_slider'];

			echo "
			<div class='single-hero-items set-bg' data-setbg='admin/image/gambar_slider/$gambar_slider'>
				<div class='container'>
					<div class='row'>
						<div class='col-lg-5'>
							<h1 style='color: white;'>$heading_slider</h1>
							<p style='color: white;'>$text_slider
							</p>
							<a href='shop.php' class='primary-btn'>Belanja Sekarang!</a>
						</div>
					</div>
				</div>
			</div>";
		}

		?>

	</div>
</section>

<!-- Banner Section Begin -->

<div class="banner-section spad">
	<div class="container-fluid">
		<div class="row">
		<?php
		$get_slides = "select * from kategori LIMIT 3";
		$run_slider = mysqli_query($con, $get_slides);

		while ($row_slides = mysqli_fetch_array($run_slider)) {
			$judul_kategori = $row_slides['judul_kategori'];
			$gambar_kategori = $row_slides['gambar_kategori'];
			$id_kategori = $row_slides['id_kategori'];
			$deskripsi_kategori = $row_slides['deskripsi_kategori'];
			echo "
			<div class='col-lg-4'>
				<a href='shop.php?id_kategori=$id_kategori'>
					<div class='single-banner'>
						<img src='admin/image/gambar_kategori/$gambar_kategori' alt='$deskripsi_kategori'>
						<div class='inner-text'>
							<h4>$judul_kategori</h4>
						</div>
					</div>
				</a>
			</div>";
		}
		?>

		</div>
	</div>
</div>

<!-- Women Banner Section Begin -->

<section class="women-banner spad">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<div class="product-large set-bg" data-setbg="img/women-large.jpg">
					<h2>Wanita</h2>
					<a href="shop.php?id_kategori=5">Temukan Lebih</a>
				</div>
			</div>
			<div class="col-lg-8 offset-lg-1">
				<div class="filter-control">
					<h3> Produk Teratas </h3>
				</div>
				<div class="product-slider owl-carousel">

					<?php
					getWProduct();
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Man Banner Section Begin -->

<section class="man-banner spad">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="filter-control">
					<h3> Produk Teratas </h3>
				</div>
				<div class="product-slider owl-carousel">
					<?php
					getMProduct();
					?>

				</div>
			</div>
			<div class="col-lg-3 offset-lg-1">
				<div class="product-large set-bg m-large" data-setbg="img/men-large.jpg">
					<h2>Pria</h2>
					<a href="shop.php?id_kategori=13">Temukan Lebih</a>
				</div>
			</div>
		</div>
	</div>
</section>

<button class="open-button" onclick="openForm()">Customer Support</button>

<div class="chat-popup" id="myForm">
	<form action="/action_page.php" class="form-container">
		<iframe
			src="https://web.powerva.microsoft.com/environments/Default-d7b95ec4-9a7f-4260-b2e3-eb53f0ac8401/bots/new_bot_45b0df544b7b49ceb84bac87b2d23398/webchat"
			frameborder="0" style="width: 100%; height: 100%;">
		</iframe>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	</form>
</div>

<script>
function openForm() {
	document.getElementById("myForm").style.display = "block";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
}
</script>

<!-- Footer -->

<?php
include('footer.php');

if (isset($_GET['stat'])) {

	echo "
		<script>
				bootbox.alert({
					message: 'Selamat datang, Anda telah login',
					backdrop: true
				});
		</script>";
}

if (isset($_SESSION['new'])) {
	unset($_SESSION['new']);
	echo "
		<script>
				bootbox.alert({
					message: 'Akun telah terdaftar, Anda telah login',
					backdrop: true
				});
		</script>";
}


?>

</body>

</html>