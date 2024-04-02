<?php
session_start();

require_once('koneksi.php');

function anti_injection($data){
$filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
return $filter;
}

$v_email = anti_injection($_POST['email']);
$v_pass = anti_injection($_POST['pass']);



$vlogin = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_email = '$v_email' AND user_pass = '$v_pass' ");

$log    = mysqli_num_rows($vlogin);
$data   = mysqli_fetch_array($vlogin);


if ($log == 1)
	{

		$_SESSION['name']   = $data['user_name'];
		$_SESSION['level']  = $data['user_level'];
		header ('location:media.php?page=home');
	} 
	else
{
	echo "njir error";
		// echo"<script language='javascript'>
		// window.alert('Anda Gagal Login');
		// document.location='index.php';
		// </script>";
}



?>