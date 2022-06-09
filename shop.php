<?php

$active = "Shop";

include("functions.php");
include("header.php");

?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-text">
					<a href="index.php"><i class="fa fa-home"></i> Home</a>
					<a href="shop.php">Shop</a>

					<?php
					if (isset($_GET['id_produk_kategori'])) {

						$id_produk_kategori = $_GET['id_produk_kategori'];

						$get_p_cat = "select * from produk_kategori where id_produk_kategori='$id_produk_kategori'";
						$run_p_cat = mysqli_query($con, $get_p_cat);

						$row_p_cat = mysqli_fetch_array($run_p_cat);

						$judul_produk_kategori = $row_p_cat['judul_produk_kategori'];

						echo "  <span>$judul_produk_kategori</span> ";
					}
					?>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
				<div class="filter-widget">
					<h4 class="fw-title">Kategori</h4>
					<ul class="filter-catagories">
						<?php

						getCat();

						?>
					</ul>
				</div>
			</div>

			<div class="col-lg-9 order-1 order-lg-2">
				<div class="product-list">
					<div class="row">
						<?php

						if (!isset($_GET['id_produk_kategori'])) {

							if (!isset($_GET['id_kategori'])) {

								$per_page = 6;

								if (isset($_GET['page'])) {
									$page = $_GET['page'];
								} else {
									$page = 1;
								}

								$start_from = ($page - 1) * $per_page;
								$get_produk = "select * from produk order by 1 DESC LIMIT $start_from,$per_page";
								$run_produk = mysqli_query($con, $get_produk);

								while ($row_produk = mysqli_fetch_array($run_produk)) {

									$id_produk = $row_produk['id_produk'];
									$judul_produk = $row_produk['judul_produk'];
									$harga_produk = $row_produk['harga_produk'];
									$get_image = "select * from gambar_produk where id_produk=$id_produk order by RAND() LIMIT 1";
									$run_image = mysqli_query($con, $get_image);

									while ($row_image = mysqli_fetch_array($run_image)) {
										$gambar_produk = $row_image['gambar_produk'];
									}

									echo "
									
									<div class='col-lg-4 col-sm-6'>
									<div class='product-item'>
										<div class='pi-pic' style='max-height:350px'>
											<img src='admin/image/gambar_produk/$gambar_produk' alt='$judul_produk'>
											<ul>
												<li class='quick-view'><a href='product.php?id_produk=$id_produk' style='background:#fe4231;color:white'>View Details</a></li>
											</ul>
										</div>
										<div class='pi-text'>
											<div class='catagory-name'></div>
											<a href='product.php?id_produk=$id_produk'>
												<h5>$judul_produk</h5>
											</a>
											<div class='product-price'>
											Rp. $harga_produk                    
											</div>
										</div>
									</div>
								</div>
								";
								}
						?>
					</div>

					<div class="row" style="display:flex;justify-content:center; padding:14px">
						<ul class="pagination">

							<?php

								$query = "select * from produk";
								$result = mysqli_query($con, $query);

								$total_records = mysqli_num_rows($result);

								$total_pages = ($total_records / $per_page);

								$total_pages = ceil($total_pages);

								if ($total_pages <= 1) {
									echo "";
								} else {

									echo "
						
						<li class='page-item'>
							<a class='page-link' href='shop.php?page=1'>
								First 
							</a>
						</li>
						
						";

									for ($i = 2; $i < $total_pages; $i++) {
										echo "
							<li class='page-item'><a class='page-link' href='shop.php?page=" . $i . "'>" . $i . "</a></li>
							";
									}

									echo "
						
						<li class='page-item'>
							<a class='page-link' href='shop.php?page=$total_pages'>
Last
							</a>
						</li>
						
						";
								}
							}
						}
					?>

						</ul>
					</div>
					<div class="row">
						<?php

						getPcatProd();

						getcatProd();

						?>
					</div>
				</div>
			</div>
		</div>
</section>

<?php

include('footer.php');

?>

</body>

</html>