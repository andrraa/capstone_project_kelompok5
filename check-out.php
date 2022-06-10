<?php

$active = "Checkout";

include('db.php');
include("functions.php");
include("header.php");

?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-text product-more">
					<a href="index.php"><i class="fa fa-home"></i> Home</a>
					<a href="shop.php">Shop</a>
					<span>Check Out</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
	<div class="container">
		<form class="checkout-form" action="check-out.php" method="POST">
			<div class="row">

				<div class="col-lg-6" <?php if (!($_SESSION['email_pelanggan'] == 'unset')) {
											echo "style = 'margin: 0 auto'";
										} ?>>
					<div class="checkout-content">
						<a href="shop.php" class="content-btn">Lanjut belanja</a>
					</div>
					<div class="place-order">
						<h4>Pesanan Anda</h4>
						<div class="order-total">
							<ul class="order-table">
								<li>Produk <span>Total</span></li>
								<?php checkoutProds(); ?>

								<li class="fw-normal">Subtotal <span><?php total_price(); ?></span></li>
								<li class="total-price">Total <span><?php total_price(); ?></span></li>
							</ul>
								<div class="form-group row">
								  <label class="col-sm-2 col-form-label">Jenis Pengiriman</label>
								  <div class="col-sm-10">
										<select class="form-control select2bs4" style="width: 100%;" name="jpengiriman">
									  <?php 
									  $jenis_pengirimans = array('JNE','J&T','Sicepat');
									  foreach($jenis_pengirimans as $jenis_pengiriman){
										echo "<option>$jenis_pengiriman</option>";
									  }
									  ?>
									  
										</select>
								  </div>
								</div>
								<div class="order-btn">
									<input type="submit" class="site-btn place-btn" value="Buat Pesanan">
								</div>
						</div>
					</div>
				</div>
		</form>
	</div>
</section>
<!-- Shopping Cart Section End -->

<?php

include('footer.php');

?>

</body>

</html>

<?php

if (isset($_POST['jpengiriman'])) {
	$jpengiriman = $_POST['jpengiriman'];
	$email_pelanggan = $_SESSION['email_pelanggan'];
	$query = "select * from pelanggan where email_pelanggan= '$email_pelanggan'";
	$run_query = mysqli_query($con, $query);
	$get_query = mysqli_fetch_array($run_query);
	$id_pelanggan = $get_query['id_pelanggan'];
	$alamat_pelanggan = $get_query['alamat_pelanggan'];



	$order = "insert into pemesanan (id_pelanggan, alamat_pengiriman, jenis_pengiriman, status, tanggal) values($id_pelanggan,'$alamat_pelanggan','$jpengiriman','Menunggu Pembayaran',NOW())";
	$run_order = mysqli_query($con, $order);

	$get_order = "SELECT LAST_INSERT_ID()";
	$run_order = mysqli_query($con, $get_order);
	$id_pemesanan = mysqli_fetch_array($run_order);
	$id_pemesanan = $id_pemesanan[0];

	$get_items = "select * from keranjang where email_pelanggan = '$email_pelanggan'";
	$run_items = mysqli_query($con, $get_items);

	while ($row_items = mysqli_fetch_array($run_items)) {
		$id_produk = $row_items['id_produk'];
		$jumlah = $row_items['jumlah'];
		$ukuran = $row_items['ukuran'];
		$get_item = "select * from produk where id_produk = '$id_produk'";
		$run_item = mysqli_query($con, $get_item);
		while ($row_item = mysqli_fetch_array($run_item)) {
			$harga_produk = $row_item['harga_produk'];
		}
		$order_detail = "insert into pemesanan_detail(id_pemesanan, id_produk, ukuran, jumlah, harga_produk) values($id_pemesanan,'$id_produk','$ukuran',$jumlah,$harga_produk)";
		$run_order_detail = mysqli_query($con, $order_detail);

	}

	$pembersih_keranjang = "delete from keranjang where email_pelanggan = '$email_pelanggan'";

	$run_clear = mysqli_query($con, $pembersih_keranjang);

	echo "
		<script>
				bootbox.alert({
					message: 'Pesanan telah dibuat, Terimakasih telah berbelanja di fashop',
					backdrop: true
				});
		</script>";
	echo "<script>window.open('account.php?orders','_self')</script>";
}

?>