<?php

include('db.php');
function getRealIpUser()
{

	switch (true) {

		case (!empty($_SERVER['HTTP_X_REAL_IP'])):
			return $_SERVER['HTTP_X_REAL_IP'];
		case (!empty($_SERVER['HTTP_CLIENT_IP'])):
			return $_SERVER['HTTP_CLIENT_IP'];
		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
			return $_SERVER['HTTP_X_FORWARDED_FOR'];

		default:
			return $_SERVER['REMOTE_ADDR'];
	}
}

function addCart()
{

	global $con;

	if (isset($_GET['add_cart'])) {

		$email_pelanggan = $_SESSION['email_pelanggan'];
		$p_id = $_GET['add_cart'];
		$qty = $_POST['product_qty'];
		$size = $_POST['size'];

		$check_product = "select * from keranjang where email_pelanggan = '$email_pelanggan' AND ukuran = '$size' AND id_produk = '$p_id'";
		$run_check = mysqli_query($con, $check_product);

		if (mysqli_num_rows($run_check) > 0) {
			echo "<script>window.open('product?id_produk=$p_id&u=a','_self')</script>";
		} else {

			$query = "Insert into keranjang (id_produk, email_pelanggan,ukuran,jumlah,tanggal) values('$p_id','$email_pelanggan','$size','$qty',NOW())";
			$run_query = mysqli_query($con, $query);

			echo "<script>window.open('product?id_produk=$p_id','_self')</script>";
		}
	}
}

// Retrieve Women produk for index slider

function getWProduct()
{
	global $con;

	$get_produk = "select * from produk where id_kategori=5 order by RAND() LIMIT 7";
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
		
		<div class='product-item'>
		<div class='pi-pic' style='max-height:300px'>
			<img src='admin/image/gambar_produk/$gambar_produk' alt='$judul_produk'>
			<ul>
				<li class='quick-view'><a href='product?id_produk=$id_produk' style='background:#fe4231;color:white'>Lihat Detail</a></li>
			</ul>
		</div>
		<div class='pi-text'>
			<a href='product?id_produk=$id_produk'>
				<h5>$judul_produk</h5>
			</a>
			<div class='product-price'>
			   Rp. $harga_produk
			</div>
		</div>
	</div>

	";
	}
}

// Retrieve men produk for index slider

function getMProduct()
{
	global $con;

	$get_produk = "select * from produk where id_kategori=13 order by RAND() LIMIT 7";
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
		
		<div class='product-item'>
		<div class='pi-pic' style='max-height:300px'>
			<img src='admin/image/gambar_produk/$gambar_produk' alt='$judul_produk'>
			<ul>
				<li class='quick-view'><a href='product?id_produk=$id_produk' style='background:#fe4231;color:white'>Lihat Detail</a></li>
			</ul>
		</div>
		<div class='pi-text'>
			<a href='#'>
				<h5>$judul_produk</h5>
			</a>
			<div class='product-price'>
			Rp. $harga_produk
			</div>
		</div>
	</div>

	";
	}
}

// Retrieve produk Catergories

function getProdCat()
{

	global $con;

	$get_p_cats = "select * from produk_kategori";
	$run_p_cats = mysqli_query($con, $get_p_cats);

	while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

		$id_produk_kategori = $row_p_cats['id_produk_kategori'];
		$judul_produk_kategori = $row_p_cats['judul_produk_kategori'];

		echo "

		<li><a href='shop?id_produk_kategori=$id_produk_kategori'>$judul_produk_kategori</a></li>

		";
	}
}

// Retrieve Catergories

function getCat()
{
	global $con;

	$get_cats = "select * from kategori";
	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)) {

		$id_kategori = $row_cats['id_kategori'];
		$judul_kategori = $row_cats['judul_kategori'];

		echo "

		<li class='hovclass'><a href='shop?id_kategori=$id_kategori'>$judul_kategori</a></li>

		";
	}
}

function getPcatProd()
{
	global $con;

	if (isset($_GET['id_produk_kategori'])) {

		$id_produk_kategori = $_GET['id_produk_kategori'];

		$get_p_cat = "select * from produk_kategori where id_produk_kategori='$id_produk_kategori'";
		$run_p_cat = mysqli_query($con, $get_p_cat);

		$row_p_cat = mysqli_fetch_array($run_p_cat);

		$judul_produk_kategori = $row_p_cat['judul_produk_kategori'];
		$deskripsi_produk_kategori = $row_p_cat['deskripsi_produk_kategori'];

		$get_produk = "select * from produk where id_produk_kategori='$id_produk_kategori'";
		$run_produk = mysqli_query($con, $get_produk);

		$count = mysqli_num_rows($run_produk);
		
		if ($count == 0) {

			echo "
				<div class='card' style='font-weight:bold; color:#fe4231'>
					<div class='card-body'>Produk tidak tersedia</div>
				</div>

					";
		} else {

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
							<li class='quick-view'><a href='product?id_produk=$id_produk' style='background:#fe4231;color:white'>Lihat Detail</a></li>
						</ul>
					</div>
					<div class='pi-text'>
						<div class='catagory-name'></div>
						<a href='product?id_produk=$id_produk'>
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
		}
	}
}

function getcatProd()
{
	global $con;

	if (isset($_GET['id_kategori'])) {

		$id_kategori = $_GET['id_kategori'];

		$get_cat = "select * from kategori where id_kategori='$id_kategori'";
		$run_cat = mysqli_query($con, $get_cat);

		$row_cat = mysqli_fetch_array($run_cat);

		$judul_produk_kategori = $row_cat['judul_kategori'];
		$p_deskripsi_kategori = $row_cat['deskripsi_kategori'];

		$get_produk = "select * from produk where id_kategori='$id_kategori'";
		$run_produk = mysqli_query($con, $get_produk);

		$count = mysqli_num_rows($run_produk);

		if ($count == 0) {

			echo "
				<div class='card' style='font-weight:bold; color:#fe4231'>
					<div class='card-body'>Produk tidak tersedia</div>
				</div>

					";
		} else {

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
							<li class='quick-view'><a href='product?id_produk=$id_produk' style='background:#fe4231;color:white'>Lihat Detail</a></li>
						</ul>
					</div>
					<div class='pi-text'>
						<div class='catagory-name'></div>
						<a href='product?id_produk=$id_produk'>
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
		}
	}
}

function getProd()
{
	global $con;

	if (isset($_GET['id_produk'])) {

		$id_produk = $_GET['id_produk'];

		$get_produk = "select * from produk where id_produk='$id_produk'";
		$run_produk = mysqli_query($con, $get_produk);

		$row_produk = mysqli_fetch_array($run_produk);

		$judul_produk = $row_produk['judul_produk'];
		$harga_produk = $row_produk['harga_produk'];
		$deskripsi_produk = $row_produk['deskripsi_produk'];
		$get_image = "select * from gambar_produk where id_produk=$id_produk order by id_gambar_produk LIMIT 2";
		$run_image = mysqli_query($con, $get_image);
		$gambar_produks = array();
		$gambar_produks[0]="";
		$no=0;
		while ($row_image = mysqli_fetch_array($run_image)) {

			$gambar_produks[$no] = $row_image['gambar_produk'];
			$no++;
		}

		$get_p_cat_name = "select judul_produk_kategori from produk join produk_kategori on produk.id_produk_kategori=produk_kategori.id_produk_kategori where id_produk=$id_produk";
		$run_get_p_cat_name = mysqli_query($con, $get_p_cat_name);

		$row_p_cat_name = mysqli_fetch_array($run_get_p_cat_name);

		$p_cat_name = $row_p_cat_name['judul_produk_kategori'];

		echo "
		
	<div class='col-lg-6' style='margin:0 auto'>
		<div class='product-pic-zoom  col-md-8' style='max-height:400px;margin: 0 0 30px 0'>
			<img class='product-big-img' src='admin/image/gambar_produk/$gambar_produks[0]' alt='$judul_produk'>
			<div class='zoom-icon'>
				<i class='fa fa-search-plus'></i>
			</div>
		</div>
		<div class='product-thumbs'>
			<div class='product-thumbs-track ps-slider owl-carousel'>";
			$no=True;
			foreach ($gambar_produks as $gambar_produk) {
				$active = ($no ? 'active' :'');
				$no=False;
				echo "<div class='pt $active' data-imgbigurl='admin/image/gambar_produk/$gambar_produk'><img src='admin/image/gambar_produk/$gambar_produk' alt='$judul_produk'></div>";
			}
			echo "
			</div>
		</div>
	</div>
	<div class='col-lg-6'>
		<div class='product-details'>
			<div class='pd-title'>
				<h3>$judul_produk</h3>
			</div>
		   
			<div class='pd-desc'>
				<p>$deskripsi_produk</p>
				<h4>Rp. $harga_produk</h4>
			</div>

			<ul class='pd-tags'>
				<li><span>kategori</span>: $p_cat_name</li>
			</ul>
		
		";
	}
}

function relatedproduk()
{
	global $con;

	if (isset($_GET['id_produk'])) {

		$id_produk = $_GET['id_produk'];

		$get_produk_kategori = "select produk_kategori.id_produk_kategori, judul_produk_kategori from produk join produk_kategori on produk.id_produk_kategori=produk_kategori.id_produk_kategori where id_produk=$id_produk";
		$run_get_produk_kategori = mysqli_query($con, $get_produk_kategori);
		$row_id_produk_kategori = mysqli_fetch_array($run_get_produk_kategori);

		$id_produk_kategori = $row_id_produk_kategori['id_produk_kategori'];

		$get_c_produk = "select * from produk where id_produk_kategori=$id_produk_kategori LIMIT 3";
		$run_get_c_produk = mysqli_query($con, $get_c_produk);

		while ($row_get_r_produk = mysqli_fetch_array($run_get_c_produk)) {

			$p_id = $row_get_r_produk['id_produk'];
			$judul_produk = $row_get_r_produk['judul_produk'];
			$get_image = "select * from gambar_produk where id_produk=$p_id order by RAND() LIMIT 1";
			$run_image = mysqli_query($con, $get_image);
			while ($row_image = mysqli_fetch_array($run_image)) {
				$gambar_produk = $row_image['gambar_produk'];
			}
			$harga_produk = $row_get_r_produk['harga_produk'];

			if ($p_id != $id_produk) {
				echo "

		<div class='col-lg-3 col-sm-6'>
			<div class='product-item' >
				<div class='pi-pic' style='max-height:300px'>
					<img src='admin/image/gambar_produk/$gambar_produk' alt='$judul_produk'>
					<ul>
						<li class='quick-view'><a href='product?id_produk=$p_id' style='background:#fe4231;color:white'>Lihat Detail</a></li>
					</ul>
				</div>
				<div class='pi-text'>
					<a href='#'>
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
		}
	}
}

function items()
{

	global $con;

	$ip_add = getRealIpUser();
	$email_pelanggan = $_SESSION['email_pelanggan'];

	$get_items = "select * from keranjang where email_pelanggan = '$email_pelanggan'";
	$run_items = mysqli_query($con, $get_items);

	$count_items = mysqli_num_rows($run_items);

	echo $count_items;
}

function total_price()
{

	global $con;

	$ip_add = getRealIpUser();
	$email_pelanggan = $_SESSION['email_pelanggan'];
	
	$total = 0;

	$get_items = "select * from keranjang where email_pelanggan = '$email_pelanggan'";
	$run_items = mysqli_query($con, $get_items);

	while ($row_items = mysqli_fetch_array($run_items)) {
		$p_id = $row_items['id_produk'];
		$jumlah_produk = $row_items['jumlah'];

		$get_price = "select * from produk where id_produk = '$p_id'";
		$run_price = mysqli_query($con, $get_price);

		while ($row_price = mysqli_fetch_array($run_price)) {

			$sub_price = $row_price['harga_produk'] * $jumlah_produk;
			$total += $sub_price;
		}
	}
	echo "Rp. " . $total;
}

$countrows = 0;

function cart_items()
{

	global $con;

	$email_pelanggan = $_SESSION['email_pelanggan'];

	$get_items = "select * from keranjang where email_pelanggan = '$email_pelanggan' ORDER BY tanggal DESC";
	$run_itemss = mysqli_query($con, $get_items);

	$countrows =  mysqli_num_rows($run_itemss);

	if ($countrows == 0) {
		echo  " 

	<div class='card col-md-3 col-10' style='margin:0 auto; border-radius:25px 5px;box-shadow: inset -12px -8px 40px #e5e5e5;'>
		<div class='card-body'>
		   <h5 style='text-align:center;font-weight:500'> Keranjang Kosong </h5>
		</div>
	</div>
		   
		";
	} else {

		echo "
		
		<thead style='font-size: larger;'>
							<tr>
								<th>Image</th>
								<th class='p-name'>Nama Produk</th>
								<th>Ukuran</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th></th>
							</tr>
						</thead>

		";

		while ($row_items = mysqli_fetch_array($run_itemss)) {
			$id_produk = $row_items['id_produk'];
			$ukuran = $row_items['ukuran'];
			$jumlah_produk = $row_items['jumlah'];
			
			$get_item = "select * from produk where id_produk = '$id_produk'";
			$run_item = mysqli_query($con, $get_item);

			while ($row_item = mysqli_fetch_array($run_item)) {
				$judul_produk = $row_item['judul_produk'];
				$harga_produk = $row_item['harga_produk'];
				$get_image = "select * from gambar_produk where id_produk=$id_produk order by id_produk asc LIMIT 1";
				$run_image = mysqli_query($con, $get_image);
				while ($row_image = mysqli_fetch_array($run_image)) {
					$gambar_produk = $row_image['gambar_produk'];
				}

				$pro_total_p = $harga_produk * $jumlah_produk;
			}

			echo "
	
		<tr style='border-bottom: 0.5px solid #ebebeb'>
		   <td class='cart-pic first-row'><img src='admin/image/gambar_produk/$gambar_produk' alt='$judul_produk' style='max-height:100px'></td>
		   <td class='cart-title first-row'>
			   <h5><a href='product?id_produk=$id_produk' style='color:black;font-weight:bold'>$judul_produk</h5>
		   </td>
		   <td class='first-row'>$ukuran</td>
		   <td class='p-price first-row'>Rp. $harga_produk</td>
		   <td class='qua-col first-row'>
			   <div class='quantity'>
				   <div class='pro-qty'>
					   <input id = 'qqty' type='text' value='$jumlah_produk'>
				   </div>
			   </div>
		   </td>
		   <td class='total-price first-row'>Rp. $pro_total_p</td>
		   <td class='close-td first-row'><a href='shopping-cart?del=$id_produk'><i class='ti-close' style='color:black'></i></a></td>
	   </tr>    
   ";
		}
	}
}

function cart_icon_prod()
{

	global $con;

	$email_pelanggan = $_SESSION['email_pelanggan'];


	$get_items = "select * from keranjang where email_pelanggan = '$email_pelanggan' ORDER BY tanggal DESC LIMIT 0,2";
	$run_items = mysqli_query($con, $get_items);


	if (mysqli_num_rows($run_items) == 0) {
		echo  " 

		<p style='text-align:center; font-weight:500;color:#fe4231'>Keranjang kosong </p>
	
		";
	} else {

		while ($row_items = mysqli_fetch_array($run_items)) {
			$id_produk = $row_items['id_produk'];
			$jumlah_produk = $row_items['jumlah'];
			$ukuran = $row_items['ukuran'];
			$get_item = "select * from produk where id_produk = '$id_produk' ORDER BY id_produk DESC";
			$run_item = mysqli_query($con, $get_item);

			while ($row_item = mysqli_fetch_array($run_item)) {

				$judul_produk = $row_item['judul_produk'];
				$harga_produk = $row_item['harga_produk'];
				$get_image = "select * from gambar_produk where id_produk=$id_produk order by id_produk asc LIMIT 1";
				$run_image = mysqli_query($con, $get_image);

				while ($row_image = mysqli_fetch_array($run_image)) {
					$gambar_produk = $row_image['gambar_produk'];
				}

				$pro_total_p = $harga_produk * $jumlah_produk;
			}

			echo "
		<tr>
		<td class='si-pic'><img src='admin/image/gambar_produk/$gambar_produk' alt='$judul_produk' style='max-height:70px'></td>
		<td class='si-text'>
			<div class='product-selected'>
				<p>Rp. $harga_produk x $jumlah_produk</p>
				<h6>$judul_produk ($ukuran)</h6>
			</div>
		</td>
		<td class='si-close'>
		<a href='shopping-cart?delcart=$id_produk'> <i class='ti-close' style='color:black'></i></a>
		</td>
	</tr>
	";
		}
	}
}

function checkoutProds()
{

	global $con;

	$ip_add = getRealIpUser();
	$email_pelanggan = $_SESSION['email_pelanggan'];

	$get_items = "select * from keranjang where email_pelanggan = '$email_pelanggan' ORDER BY tanggal DESC";
	$run_items = mysqli_query($con, $get_items);

	if (mysqli_num_rows($run_items) == 0) {
		echo  " 
   
		<li class='fw-normal' style='text-align:center;font-weight:bold;font-size:larger;color:#fe4231'>No Items in Cart</li>
	
		";
	} else {

		while ($row_items = mysqli_fetch_array($run_items)) {
			$p_id = $row_items['id_produk'];
			$jumlah_produk = $row_items['jumlah'];
			$ukuran = $row_items['ukuran'];
			$get_item = "select * from produk where id_produk = $p_id ORDER BY id_produk DESC";
			$run_item = mysqli_query($con, $get_item);


			while ($row_item = mysqli_fetch_array($run_item)) {

				$judul_produk = $row_item['judul_produk'];
				$pro_price = $row_item['harga_produk'];

				$pro_total_p = $pro_price * $jumlah_produk;
			}

			echo "
		<li class='fw-normal'>$judul_produk ($ukuran) x $jumlah_produk <span>$pro_total_p</span></li>
	
";
		}
	}
}