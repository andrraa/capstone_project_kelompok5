<?php
include('db.php');
include("functions.php");
session_start();
if (isset($_POST['jpengiriman'])) {
    $jpengiriman = $_POST['jpengiriman'];
    $email_pelanggan = $_SESSION['email_pelanggan'];
    $query = "select * from pelanggan where email_pelanggan= '$email_pelanggan'";
    $run_query = mysqli_query($con, $query);
    $get_query = mysqli_fetch_array($run_query);
    $id_pelanggan = $get_query['id_pelanggan'];
    $alamat_pelanggan = $get_query['alamat_pelanggan'];

    $get_items = "select * from keranjang where email_pelanggan = '$email_pelanggan'";
    $run_items = mysqli_query($con, $get_items);
    $final_price = 0;
    while ($row_items = mysqli_fetch_array($run_items)) {
        $id_produk = $row_items['id_produk'];
        $jumlah = $row_items['jumlah'];

        $get_item = "select * from produk where id_produk = '$id_produk'";
        $run_item = mysqli_query($con, $get_item);

        $total_q=0;
        while ($row_item = mysqli_fetch_array($run_item)) {

            $harga_produk = $row_item['harga_produk'];

            $total_q += $jumlah;
            $pro_total_p = $harga_produk * $jumlah;
        }

        $final_price += $pro_total_p;
    }
    $order = "Insert into pemesanan (id_pelanggan, alamat_pengiriman, jenis_pengiriman, status, tanggal) values($id_pelanggan,'$alamat_pelanggan','$jpengiriman','Menunggu Pembayaran',NOW())";

    $run_order = mysqli_query($con, $order);
    var_dump($order);
    // dd();

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