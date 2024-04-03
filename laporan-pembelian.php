<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

        $('.data').hide();
    $("#laporan").click(function (e) {

    e.preventDefault();

    var tgl1 = $("#tgl1").val();
    var tgl2 = $("#tanggal2").val();
    var hasil = $("#hasil").val();

  function openInNewTab(url) {
  var a = document.createElement("a");
  a.target = "_blank";
  a.href = url;
  a.click();
  }


    if (hasil == 'view')
    {
       $.ajax({
        type  : "POST",
        url   : "data.php?page=laporan_pembelian",
        data  : {tgl1: tgl1, tgl2 : tgl2 },
        success : function(data){
           $('.data').show();
          $("#data-pembelian").html(data).show();

        }
        });

       /*window.location.href = ' media.php?page=laporan-pembelian&tgl1='+tgl1+'&tgl2='+tgl2;*/

      
    } 
    else if (hasil == 'excel')
    {
        window.location.href = 'data.php?page=pembelian_excel&tgl1='+tgl1+'&tgl2='+tgl2;
    }
    else
    {
        
        openInNewTab('data.php?page=pembelian_pdf&tgl1='+tgl1+'&tgl2='+tgl2);

    }


       
    });
});
</script>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="plugins/datepicker/bootstrap-datepicker.css">

<!-- Content Header (Page header) -->
<div class="wrapper">
  <section class="content-header">
    <h1>
      Laporan Pembelian
    </h1>
  </section>

<section class="content">
<div class="box box-default">
<div class="box-header with-border">
  <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
  </div>
</div><!-- /.box-header -->
<div class="box-body">
  <div class="row">
    <form style="display: flex;">
   <div class="col-md-3">
      <div class="form-group">
     <p id="datepairExample"> <input type="text" name="tgl1" id="tgl1" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask=""  class="date start form-control" placeholder="Tanggal"></p>
      </div>
    </div><!-- /.col -->
    <div class="col-md-3">
      <div class="form-group">
      <p id="datepairExample"><input type="text" name="tgl2" id="tanggal2" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" class="date start form-control" placeholder="To"></p>
      </div>
    </div><!-- /.col -->

     <div class="col-md-3">
      <div class="form-group">
      <select name="hasil" id="hasil" class="form-control">
        <option value="view">View</option>
        <option value="fdf">PDF</option>
        <option value="excel">Excel</option>
      </select>
      </div>
    </div><!-- /.col -->
     <div class="col-md-3">
      <div class="form-group">
        <input type="submit" class="btn btn-primary" id="laporan" >
      </div><!-- /.form-group -->
    </div><!-- /.col -->
    </form>
  </div><!-- /.row -->
</div><!-- /.box-body -->
<div class="box-footer">
</div>
</div>
<div class="data box">
    <div class="box-body">
      <div id="data-pembelian">
        
      </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</section>
</div>

<script>
$('#datepairExample .date').datepicker({
'format': 'yyyy-mm-dd',
'autoclose': true
});
</script>

