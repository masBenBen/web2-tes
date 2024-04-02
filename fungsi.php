<?php


function kodecust() { 
include'koneksi.php';
$query = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(cust_id) AS kode FROM tbl_customer")); 
return $query['kode']; 
}

function kodesupp() { 
include'koneksi.php';
$query = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(supp_id) AS kode FROM tbl_supplier")); 
return $query['kode']; 
}

function kodeprod() { 
include'koneksi.php';
$query = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(prod_id) AS kode FROM tbl_product")); 
return $query['kode']; 
}

function kodetranspj() { 
include'koneksi.php';
$query = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(tr_id) AS kode FROM tbl_transactionpj WHERE tr_type = 'ISS'")); 
return $query['kode']; 
}

function kodetranspm() { 
include'koneksi.php';
$query = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(tr_id) AS kode FROM tbl_transactionpb WHERE tr_type = 'RCT'")); 
return $query['kode']; 
}

function FormatNoTrans($num) { 
$num=$num+1; 
switch (strlen($num)) {    
case 1 : $NoTrans = "000".$num; break;     
case 2 : $NoTrans = "00".$num; break;     
case 3 : $NoTrans = "0".$num; break;         
default: $NoTrans = $num;        
}           
return $NoTrans; } 


?>