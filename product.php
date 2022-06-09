<?php

$active = "Product";

include("functions.php");
include('header.php');



?>
<div style="overflow: hidden;">
	<!-- Breadcrumb Section Begin -->
	<div class="breacrumb-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-text product-more">
						<a href="index.php"><i class="fa fa-home"></i> Home</a>
						<a href="shop.php">Shop</a>
						<span>Details</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Section Begin -->

	<!-- Product Shop Section Begin -->
	<section class="product-shop spad page-details">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="filter-widget">
						<h4 class="fw-title">Categories</h4>
						<ul class="filter-catagories">
							<?php
							getCat();
							?>
						</ul>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="row">
						<?php
						getProd();
						addCart();
						?>
						<form action='product.php?add_cart=<?php if (isset($_GET['id_produk'])) {
																$id_produk = $_GET['id_produk'];
																echo $id_produk;
															} ?>' method='post'>
							<div class="form-group">
								<!-- form-group Begin -->
								<div class='quantity'>
									<div class='pro-qty'>
										<input type='text' value='1' name="product_qty">
									</div>
								</div>
							</div><!-- form-group Finish -->
							<div class="form-group">
								<!-- form-group Begin -->
								<div class='pd-size-choose'>
									<div class='sc-item'>
										<input type='radio' id='sm-size' class="form-control" name='size' value="S"
											required novalidate>
										<label for='sm-size'>S</label>
									</div>
									<div class='sc-item'>
										<input type='radio' id='md-size' class="form-control" name='size' value="M">
										<label for='md-size'>M</label>
									</div>
									<div class='sc-item'>
										<input type='radio' id='lg-size' class="form-control" name='size' value="L">
										<label for='lg-size'>L</label>
									</div>
									<div class='sc-item'>
										<input type='radio' id='xl-size' class="form-control" name='size' value="XL">
										<label for='xl-size'>XL</label>
									</div>
								</div>
								<p id="msg"></p>
							</div><!-- form-group Finish -->
							<?php if ($_SESSION['email_pelanggan'] == 'unset') {
								echo "<a href='login.php' class='btn primary-btn pd-cart' style='margin-top: 20px;'> Tambahkan ke Keranjang</a>";
							} else {
								echo "<button class='btn primary-btn pd-cart' id='cartbtn' style='margin-top: 20px;'> Tambahkan ke Keranjang</button>";
							}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
</section>
<div class="related-products spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Item serupa</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			relatedProduk();
			?>
		</div>
	</div>
</div>
</div>

<?php

include('footer.php');

?>

<script>
$("#cartbtn").on('click', function() {
	var atLeastOneChecked = false;
	if (!$("input[name='size']").is(':checked')) {

		$("#msg").html(
			"<span class='alert alert-danger'>" +
			"Tolong pilih ukuran </span>");
	} else {
		return;
	}

});
</script>

<?php
if(isset($_GET['u'])){
		echo "
		<script>
			bootbox.alert({
				message: 'Produk dengan ukuran tersebut telah ditambahkan, lihat di keranjang',
				backdrop: true
			});
		</script>";
}
?>
</body>

</html>