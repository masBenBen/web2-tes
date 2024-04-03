<style type="text/css">
  .modal-dialog {
    width: 1031px;
    margin: 30px auto;
}
</style>

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#kode").change(function (e) {
    var id = $(this).val();
        $.ajax({
        type  : "POST",
        url   : "data.php?page=cari_prod",
        data  : "id="+id,
        dataType : "json",
        success : function(data){
            $("#nama").val(data.nama);
            $("#merk").val(data.merk);
            $("#harga").val(data.harga);
        }
        });
    });

    $("#kode_supp").change(function (e) {
    var id = $(this).val();
        $.ajax({
        type  : "POST",
        url   : "data.php?page=cari_supp",
        data  : "id="+id,
        dataType : "json",
        success : function(data){
            $("#nama_supp").val(data.nama);
        }
        });
    });

    $("#qty").keyup(function (e) {
        var qty = $(this).val();
        var harga = document.getElementById("harga").value;
        var total = eval(qty) * eval(harga);
        var total1 = document.getElementById("total");

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
      Data Pembelian
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
<th>Supplier</th>
<th>Qty Saldo</th>
<th>Qty In</th>
<th>Stok</th>
<th>Tanggal</th>
</tr>
</thead>
<tbody>
<?php 
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM tbl_transactionpb INNER JOIN tbl_product ON tbl_product.prod_code   = tbl_transactionpb.tr_part 
                                                            INNER JOIN tbl_supplier ON tbl_supplier.supp_code = tbl_transactionpb.tr_supp  AND tr_type = 'RCT' ");
while ($data = mysqli_fetch_array($query)) {

$stok = $data['tr_balance'] + $data['tr_qty'];

echo'
<tr>
<td>'.$no.'</td>
<td>'.$data['tr_code'].'</td>
<td>'.$data['prod_name'].'</td>
<td>'.$data['supp_name'].'</td>
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
            <h4 class="modal-title">Form Pembelian</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="POST" action="aksi.php?page=pembelian">
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
                  <label  class="col-sm-4 control-label">Harga Beli</label>
                  <div class="col-sm-8">
                  <input type="text" name="harga" id="harga"  class="form-control" required >
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-4 control-label">Kode Supplier--</label>
                  <div class="col-sm-8">
                  <select name="kode_supp" class="form-control" id="kode_supp">
                  <option value="0">--Pilih Kode Customer</option>
                  <?php
                  $query_prod = mysqli_query($conn, "SELECT * FROM tbl_supplier");
                  while($data_prod = mysqli_fetch_array($query_prod))
                  {
                    echo '<option value="'.$data_prod['supp_code'].'">'.$data_prod['supp_code'].'</option>';
                  }
                  ?>
                  </select>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-4 control-label">Nama Supplier</label>
                  <div class="col-sm-8">
                  <input type="text" name="nama_supp" id="nama_supp" class="form-control" required >
                  </div>
                  </div>

                  </div>
                  <div class="col-md-6">
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
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-info pull-right">Save</button>
            </div><!-- /.box-footer -->
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
$('#datepairExample .date').datepicker({
'format': 'm/d/yyyy',
'autoclose': true
});
</script>

</section>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="plugins/datepicker/bootstrap-datepicker.css">







 



