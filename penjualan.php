<style type="text/css">
  .modal-dialog {
    width: 1031px;
    margin: 30px auto;
}
</style>

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $("#alert").hide();

    $("#kode").change(function (e) {
     
    var id = $(this).val();

        $.ajax({
        type  : "POST",
        url   : "data.php?page=cari_prod_jual",
        data  : {id : id},
        dataType : "json",
        success : function(data){
            $("#nama").val(data.nama);
            $("#merk").val(data.merk);
            $("#harga").val(data.harga);
            $("#stok").val(data.stok);

            var stok = $("#stok").val();

            if (stok < 0 || stok == 0)
            {
              document.getElementById("simpan").disabled = true;
              $("#note").html("Error : Saldo Minus Atau Nol, Tidak Bisa Melanjutkan Transaksi.");
              $("#alert").show();
            } else
            {
              document.getElementById("simpan").disabled = false;
              $("#note").html("Error : Saldo Minus Atau Nol, Tidak Bisa Melanjutkan Transaksi.");
              $("#alert").hide();
            }



          }
        });
    });

    $("#kode_cust").change(function (e) {
    var id = $(this).val();
        $.ajax({
        type  : "POST",
        url   : "data.php?page=cari_cust",
        data  : "id="+id,
        dataType : "json",
        success : function(data){
            $("#nama_cust").val(data.nama);
        }
        });
    });

    $("#qty").keyup(function (e) {
        var qty = $(this).val();
        var harga = document.getElementById("harga").value;
        var total = eval(qty) * eval(harga);
        var total1 = document.getElementById("total");
        var saldo = document.getElementById("stok").value;



        console.log(qty);
        console.log(saldo);


          if (parseInt(qty) > parseInt(saldo))
          {
              document.getElementById("simpan").disabled = true;
              $("#note").html("Error : Qty Melebihi Stok yang tersedia.");
              $("#alert").show();
          }
          else
          {
            document.getElementById("simpan").disabled = false;
              $("#alert").hide();
          }

         if (total > 0)
         {
         total1.value = total;
         }
         else
         {
          total1.value = 0;
         }      
    });

    $("#bayar").keyup(function (e) {
        var bayar = $(this).val();
        var total = document.getElementById("total").value;
        var sisa  = eval(bayar) - eval(total);
        var sisa1 = document.getElementById("sisa");

  
         sisa1.value = sisa;
       
    });
});
</script>

<!-- Content Header (Page header) -->
<div class="wrapper">
  <section class="content-header">
    <h1>
      Data Penjualan
    </h1>
  </section>

<section class="content">
<div class="box">
<div class="box-header">
<a  href="#" data-toggle="modal" data-target="#myModal" href="#tambah" id="0" class="admin btn btn-primary"><i class="fa fa-plus-circle"></i> Add Transaksi</a>
</div><!-- /.box-header -->
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>No</th>
<th>Kode Transaksi</th>
<th>Produk</th>
<th>custlier</th>
<th>Qty Saldo</th>
<th>Qty Out</th>
<th>Stok</th>
<th>Tanggal</th>
</tr>
</thead>
<tbody>
<?php 
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM tbl_transactionpj INNER JOIN tbl_product ON tbl_product.prod_code   = tbl_transactionpj.tr_part 
                                                            INNER JOIN tbl_customer ON tbl_customer.cust_code = tbl_transactionpj.tr_cust  AND tr_type = 'ISS' ");
while ($data = mysqli_fetch_array($query)) {

$stok = $data['tr_balance'] - $data['tr_qty'];

echo'
<tr>
<td>'.$no.'</td>
<td>'.$data['tr_code'].'</td>
<td>'.$data['prod_name'].'</td>
<td>'.$data['cust_name'].'</td>
<td>'.$data['tr_balance'].'</td>
<td>'.$data['tr_qty'].'</td>
<td>'.$stok.'</td>
<td>'.$data['tr_date'].'</td>
</tr>';
$no ++ ;
}
?>
</tbody>
</table>
</div><!-- /.box-body -->
</div><!-- /.box -->





<!-- Modal -->
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Form Penjualan</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" id="penjualan" method="POST" action="aksi.php?page=penjualan">
            <div class="box-body">

                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label  class="col-sm-4 control-label">Kode Produk</label>
                  <div class="col-sm-8">
                  <select name="kode_prod" class="form-control" id="kode">
                  <option value="0">--Pilih Kode Produk--</option>
                  <?php
                  $query_prod = mysqli_query($conn, "SELECT * FROM tbl_product");
                  while($data_prod = mysqli_fetch_array($query_prod))
                  {
                    echo '<option value="'.$data_prod['prod_code'].'">'.$data_prod['prod_code'].'</option>';
                  }
                  ?>
                  </select>
                  </div>
                  </div>

                  <div class="form-group">
                  <label  class="col-sm-4 control-label">Nama Produk</label>
                  <div class="col-sm-8">
                  <input type="text" name="nama" id="nama" class="form-control" required >
                  </div>
                  </div>

                  <div class="form-group">
                  <label  class="col-sm-4 control-label">Merk Produk</label>
                  <div class="col-sm-8">
                  <input type="text" name="merk" id="merk" class="form-control" required >
                  </div>
                  </div>

                  <div class="form-group">
                  <label  class="col-sm-4 control-label">Stok Produk</label>
                  <div class="col-sm-8">
                  <input type="text" name="stok" id="stok" class="form-control" required >
                  </div>
                  </div>

                  <div class="form-group">
                  <label  class="col-sm-4 control-label">Harga Jual</label>
                  <div class="col-sm-8">
                  <input type="text" name="harga" id="harga"  class="form-control" required >
                  </div>
                  </div>

                   <!--<div class="form-group">
                  <label  class="col-sm-4 control-label">Tanggal Transaksi</label>
                  <div class="col-sm-8">
                  <input type="text" name="tanggal" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask=""  class="form-control" >
                  </div>
                  </div>-->
                    </div>


             



                  <div class="col-md-6">

                  <div class="form-group">
                  <label class="col-sm-4 control-label">Kode Pelanggan--</label>
                  <div class="col-sm-8">
                  <select name="kode_cust" class="form-control" id="kode_cust">
                  <option value="0">--Pilih Kode Customer</option>
                  <?php
                  $query_prod = mysqli_query($conn, "SELECT * FROM tbl_customer");
                  while($data_prod = mysqli_fetch_array($query_prod))
                  {
                    echo '<option value="'.$data_prod['cust_code'].'">'.$data_prod['cust_code'].'</option>';
                  }
                  ?>
                  </select>
                  </div>
                  </div>
                

                  <div class="form-group">
                  <label class="col-sm-4 control-label">Nama Pelanggan</label>
                  <div class="col-sm-8">
                  <input type="text" name="nama_cust" id="nama_cust" class="form-control" required  >
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-4 control-label">Qty</label>
                  <div class="col-sm-8">
                  <input type="text" name="qty" id="qty"  class="form-control" required >
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-4 control-label">Total</label>
                  <div class="col-sm-8">
                  <input type="text" name="total" id="total" class="form-control" required >
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-4 control-label">Bayar</label>
                  <div class="col-sm-8">
                  <input type="text" name="bayar" id="bayar" class="form-control" required >
                  </div>
                  </div>

                   <div class="form-group">
                  <label class="col-sm-4 control-label">Kembali</label>
                  <div class="col-sm-8">
                  <input type="text" name="sisa" id="sisa" class="form-control" required >
                  </div>
                  </div>
                  </div>


            </div><!-- /.box-body -->

            <div class="box-footer">
            <div id="alert" class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <div id="note"></div>
                  </div>
              <button type="reset" class="btn btn-default">Reset</button>     
            <button type="submit" id="simpan" class="btn btn-info pull-right">Save</button>

            </div><!-- /.box-footer -->
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</section>
</div>



