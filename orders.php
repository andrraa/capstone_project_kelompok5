<?php

if (isset($_SESSION['email_pelanggan'])) {

    $email_pelanggan = $_SESSION['email_pelanggan'];
    $query = "select * from pelanggan where email_pelanggan='$email_pelanggan'";
    $run_query = mysqli_query($con, $query);
    $get_query = mysqli_fetch_array($run_query);
    $id_pelanggan = $get_query['id_pelanggan'];

    $get_items = "select * from pemesanan where id_pelanggan = $id_pelanggan ORDER BY tanggal DESC";
    $run_items = mysqli_query($con, $get_items);

    echo "
    <div class='cart-table' style='min-height: 150px;'>
    <table>
        <thead style='font-size: larger;'>
            <tr>
                <th>ID Pemesanan</th>
                <th>Total Harga</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
    ";

    while ($row_items = mysqli_fetch_array($run_items)) {
        $id_pemesanan = $row_items['id_pemesanan'];
        $jumlah_belanja = $row_items['jumlah_belanja'];
        $total_harga = $row_items['total_harga'];
        $tanggal = $row_items['tanggal'];

        echo

            "<tr style='border-bottom: 0.5px solid #ebebeb'>
        <td class='first-row'>$id_pemesanan</td>
        <td class='first-row'>
            $total_harga
        </td>
        <td class='first-row'>$jumlah_belanja</td>
        <td class='first-row'>
            $tanggal
        </td>
    </tr>";
    }
}

?>

</tbody>
</table>
</div>