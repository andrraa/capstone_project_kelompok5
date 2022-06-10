<?php

if (isset($_SESSION['email_pelanggan'])) {

	$email_pelanggan = $_SESSION['email_pelanggan'];
	$query = "select * from pelanggan where email_pelanggan='$email_pelanggan'";
	$run_query = mysqli_query($con, $query);
	$get_query = mysqli_fetch_array($run_query);
	$id_pelanggan = $get_query['id_pelanggan'];

	echo "
	<div class='cart-table' style='min-height: 150px;'>
	<table>
		<thead style='font-size: larger;'>
			<tr>
				<th>ID Pemesanan</th>
				<th>Jumlah Produk</th>
				<th>Total Harga</th>
				<th>Tanggal</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
	";

	$get_pemesanan = "select * from pemesanan";
	$run_pemesanan = mysqli_query($con, $get_pemesanan);
	while ($row_pemesanan = mysqli_fetch_array($run_pemesanan)) {
	
		$id_pemesanan = $row_pemesanan['id_pemesanan'];
		$tanggal = $row_pemesanan['tanggal'];
		$status = $row_pemesanan['status'];

		$get_pem_detail = "select * from pemesanan_detail where id_pemesanan = '$id_pemesanan'";
    $run_pem_detail = mysqli_query($con, $get_pem_detail);
    $total_harga = 0;
    while ($row_pem_detail = mysqli_fetch_array($run_pem_detail)) {
        $id_produk = $row_pem_detail['id_produk'];
        $jumlah = $row_pem_detail['jumlah'];

        $get_item = "select * from produk where id_produk = '$id_produk'";
        $run_item = mysqli_query($con, $get_item);

        $jumlah_produk=0;
        while ($row_item = mysqli_fetch_array($run_item)) {
            $harga_produk = $row_item['harga_produk'];
            $jumlah_produk += $jumlah;
            $pro_total_p = $harga_produk * $jumlah;
        }
        $total_harga += $pro_total_p;
    }

		echo
			"<tr style='border-bottom: 0.5px solid #ebebeb'>
		<td class='first-row'>$id_pemesanan</td>
		<td class='first-row'>$jumlah_produk</td>
		<td class='first-row'>Rp. $total_harga</td>
		<td class='first-row'>$tanggal</td>
		<td class='first-row'>$status</td>
	</tr>";
	}
}

?>

</tbody>
</table>
</div>