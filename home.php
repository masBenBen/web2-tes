<?php
$data1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_transactionpj WHERE tr_type = 'ISS'" ));
$data2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_transactionpb WHERE tr_type = 'RCT'" ));
$data3 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_customer" ));
$data4 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_supplier" ));
 ?>

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2>
            Dashboard
          </h2>
        </section>

<section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3">
              <div class="ibox ">
                  <div class="ibox-title">
                      <h5>Penjualan</h5>
                  </div>
                  <div class="ibox-content">
                      <h1 class="no-margins"><?php echo $data1; ?></h1>
                      <div class="stat-percent font-bold text-success"><a href="media.php?page=penjualan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="ibox ">
                  <div class="ibox-title">
                      <h5>Pembelian</h5>
                  </div>
                  <div class="ibox-content">
                      <h1 class="no-margins"><?php echo $data2; ?></h1>
                      <div class="stat-percent font-bold text-success"><a href="media.php?page=pembelian" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="ibox ">
                  <div class="ibox-title">
                      <h5>Customer</h5>
                  </div>
                  <div class="ibox-content">
                      <h1 class="no-margins"><?php echo $data3; ?></h1>
                      <div class="stat-percent font-bold text-success"><a href="media.php?page=customer" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="ibox ">
                  <div class="ibox-title">
                      <h5>Supplier</h5>
                  </div>
                  <div class="ibox-content">
                      <h1 class="no-margins"><?php echo $data4; ?></h1>
                      <div class="stat-percent font-bold text-success"><a href="media.php?page=supplier" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                  </div>
              </div>
            </div>
            
          </div><!-- /.row -->

		  
		  
		   <div class='box'>
		  <div class="box-header">
		<div class="box-body">
		  <p  align="center">Ahass Sahabat Muslim merupakan bengkel resmi sepeda motor Honda yang bergerak di bidang jasa, perawatan, atau pemeliharaan dan penjualan Sparepart</p>
		  
		  <p align="center">
Bengkel ini berada di bawah  naungan PT AHM (Astra Honda Motor). Ahass Sahabat Muslim didirikan oleh Bpk. H. Kanim pada tahun 2010. Bengkel ini terletak di Jl. industri Kp Gombong, rt/rw 04/06, Ds. Pasir Gombong, Kec. Cikarang Utara, Kab. Bekasi.  </p>
<p align="center">
Bengkel ini berdiri selama lima tahun dan memiliki 6 karyawan diantaranya satu orang sebagai kepala bengkel sekaligus sebagai owner , satu orang bagian kasir, satu orang bagian kepala mekanik, dan tiga orang mekanik. Seluruh karyawan telah terjamin kualitas dan keahlian dibidangnya masing-masing.</p>
		  
		  </div>
		  </div>
		  </div>
</section>

         