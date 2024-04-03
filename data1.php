<?php
include('koneksi.php');
if ($page == 'cari_prod')
{
        $id = $_POST['id'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_product WHERE prod_code = '$id' ");
        $row   = mysqli_fetch_array($query);

        $data['nama'] = $row['prod_name'];
        $data['merk'] = $row['prod_merk'];


        echo json_encode($data);
}

if ($page == 'cari_prod_jual')
{
        $id = $_POST['id'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_product WHERE prod_code = '$id' ");
        $row   = mysqli_fetch_array($query);

        $data['nama'] = $row['prod_name'];
        $data['merk'] = $row['prod_merk'];
        $data['harga'] = $row['prod_cost_sale'];
        $data['stok'] = $row['prod_stok'];

        

        echo json_encode($data);
}


if ($page == 'cari_cust')
{
        $id = $_POST['id'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_customer WHERE cust_code = '$id' ");
        $row   = mysqli_fetch_array($query);

        $data['nama'] = $row['cust_name'];
        echo json_encode($data);
}


if ($page == 'cari_supp')
{
        $id = $_POST['id'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_supplier WHERE supp_code = '$id' ");
        $row   = mysqli_fetch_array($query);

        $data['nama'] = $row['supp_name'];
        echo json_encode($data);
}
?>