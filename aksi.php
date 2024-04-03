<?php
require_once('koneksi.php');
include('fungsi.php');

$kode_transpm ="PMB".FormatNoTrans(kodetranspm());
$kode_transpj ="PJL".FormatNoTrans(kodetranspj());


$page = $_GET['page'];


if ($page == 's_admin')
{
  $v_nama    = htmlspecialchars($_POST['nama']);
  $v_email   = htmlspecialchars($_POST['email']);
  $v_pass    = htmlspecialchars($_POST['pass']);
  $v_hp      = htmlspecialchars($_POST['hp']);
  $v_id      = htmlspecialchars($_POST['id']);


  if ($v_id > 0)
  {
    $query = $conn->query("UPDATE tbl_user SET user_name = '$v_nama' , user_email = '$v_email' , user_pass = '$v_pass' , user_phone = '$v_hp' , user_level = 'admin' WHERE user_id = '$v_id' ");
  }
  else
  {
    $query = $conn->query("INSERT INTO tbl_user (user_name, user_email, user_pass, user_phone, user_level) VALUES ('$v_nama','$v_email','$v_pass','$v_hp','admin')");
  }
  
  echo"<script language='javascript'>
  document.location='media.php?page=admin';
  </script>";


}


if ($page == 's_kasir')
{
  $v_nama    = htmlspecialchars($_POST['nama']);
  $v_email   = htmlspecialchars($_POST['email']);
  $v_pass    = htmlspecialchars($_POST['pass']);
  $v_hp      = htmlspecialchars($_POST['hp']);
  $v_id      = htmlspecialchars($_POST['id']);


  if ($v_id > 0)
  {
    $query = $conn->query("UPDATE tbl_user SET user_name = '$v_nama' , user_email = '$v_email' , user_pass = '$v_pass' , user_phone = '$v_hp' , user_level = 'kasir' WHERE user_id = '$v_id' ");
  }
  else
  {
    $query = $conn->query("INSERT INTO tbl_user (user_name, user_email, user_pass, user_phone, user_level) VALUES ('$v_nama','$v_email','$v_pass','$v_hp','kasir')");
  }
  
  echo"<script language='javascript'>
  document.location='media.php?page=kasir';
  </script>";
}


if ($page == 's_cust')
{
  $v_id     = htmlspecialchars($_POST['id']);
  $v_kode   = htmlspecialchars($_POST['kode']);
  $v_nama   = htmlspecialchars($_POST['nama']);
  $v_alamat = htmlspecialchars($_POST['alamat']);
  $v_hp     = htmlspecialchars($_POST['hp']);


  if ($v_id == 0)
  {
  $query = $conn->query("INSERT INTO tbl_customer (cust_code, cust_name, cust_address, cust_phone) VALUES ('$v_kode','$v_nama','$v_alamat','$v_hp')");
  }
  else
  {
     $query = $conn->query("UPDATE tbl_customer SET cust_code = '$v_kode', cust_name = '$v_nama', cust_address = '$v_alamat', cust_phone = '$v_hp' WHERE cust_id = '$v_id' "); 
  }
  echo"<script language='javascript'>
  document.location='media.php?page=customer';
  </script>";
}



if ($page == 's_supp')
{
  $v_id     = htmlspecialchars($_POST['id']);
  $v_kode   = htmlspecialchars($_POST['kode']);
  $v_nama   = htmlspecialchars($_POST['nama']);
  $v_alamat = htmlspecialchars($_POST['alamat']);
  $v_hp     = htmlspecialchars($_POST['hp']);

  echo $v_id;

  if ($v_id == 0)
  {
    $query = $conn->query("INSERT INTO tbl_supplier (supp_code, supp_name, supp_address, supp_phone) VALUES ('$v_kode','$v_nama','$v_alamat','$v_hp')");
  }
  else
  {
    $query = $conn->query("UPDATE tbl_supplier SET supp_code = '$v_kode', supp_name = '$v_nama', supp_address = '$v_alamat', supp_phone = '$v_hp' WHERE supp_id = '$v_id' ");
  }

  echo"<script language='javascript'> 
  document.location='media.php?page=supplier';
  </script>";
}


if ($page == 's_prod')
{
  $v_id     = htmlspecialchars($_POST['id']);
  $v_kode   = htmlspecialchars($_POST['kode']);
  $v_nama   = htmlspecialchars($_POST['nama']);
  $v_merk   = htmlspecialchars($_POST['merk']);
  $v_harga_b  = htmlspecialchars($_POST['harga_beli']);
  $v_harga_j  = htmlspecialchars($_POST['harga_jual']);


  if ($v_id == 0)
  {
    $query = $conn->query("INSERT INTO tbl_product (prod_code, prod_name, prod_merk, prod_cost_buy, prod_cost_sale) VALUES ('$v_kode','$v_nama','$v_merk','$v_harga_b','$v_harga_j')");
  }
  else
  {
    $query = $conn->query("UPDATE tbl_product SET prod_code = '$v_kode', prod_name = '$v_nama', prod_merk = '$v_merk', prod_cost_buy = '$v_harga_b', prod_cost_sale = '$v_harga_j' WHERE prod_id = '$v_id' ");
  }

  echo"<script language='javascript'> 
  document.location='media.php?page=produk';
  </script>";
}


if ($page == 'pembelian')
{

  $cek  = mysqli_query($conn, "SELECT * FROM tbl_product WHERE prod_code = '".$_POST['kode_prod']."' ");
  $data = mysqli_fetch_array($cek);

  $qty  = $data['prod_stok'];

  $query = $conn->query("INSERT INTO tbl_transactionpb (tr_code, tr_type, tr_supp, tr_part, tr_qty, tr_balance, tr_date) 
           VALUES ('".$kode_transpm."','RCT','".$_POST['kode_supp']."','".$_POST['kode_prod']."','".$_POST['qty']."','$qty','".date("Y-m-d")."')");

  $update = $conn->query("UPDATE tbl_product SET prod_stok = prod_stok + '$_POST[qty]' WHERE prod_code = '".$_POST['kode_prod']."' ");

  echo"<script language='javascript'> 
  document.location='media.php?page=pembelian';
  </script>";
}


if ($page == 'penjualan')
{

  $cek  = mysqli_query($conn, "SELECT * FROM tbl_product WHERE prod_code = '".$_POST['kode_prod']."' ");
  $data = mysqli_fetch_array($cek);

  $qty  = $data['prod_stok'];

  $query = $conn->query("INSERT INTO tbl_transactionpj (tr_code, tr_type, tr_cust, tr_part, tr_qty, tr_balance, tr_date) 
           VALUES ('".$kode_transpj."','ISS','".$_POST['kode_cust']."','".$_POST['kode_prod']."','".$_POST['qty']."','$qty','".date("Y-m-d")."')");

  $update = $conn->query("UPDATE tbl_product SET prod_stok = prod_stok - '$_POST[qty]' WHERE prod_code = '".$_POST['kode_prod']."' ");

  echo"<script language='javascript'> 
  document.location='media.php?page=penjualan';
  </script>";
}












if ($page == 'd_admin')
{
  $v_id   = $_POST['id'];
  $query = mysqli_query($conn, "DELETE FROM tbl_user WHERE user_id = '$v_id'");
}
if ($page == 'd_kasir')
{
  $v_id   = $_POST['id'];
  $query = mysqli_query($conn, "DELETE FROM tbl_user WHERE user_id = '$v_id'");
}
if ($page == 'd_supp')
{
  $v_id   = $_POST['id'];
  $query = mysqli_query($conn, "DELETE FROM tbl_supplier WHERE supp_id = '$v_id'");
}
if ($page == 'd_cust')
{
  $v_id   = $_POST['id'];
  $query = mysqli_query($conn, "DELETE FROM tbl_customer WHERE cust_id = '$v_id'");
}

if ($page == 'd_prod')
{
  $v_id   = $_POST['id'];
  $query = mysqli_query($conn, "DELETE FROM tbl_product WHERE prod_id = '$v_id'");
}
?>