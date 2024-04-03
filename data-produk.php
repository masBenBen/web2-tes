
 <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $(".delete").click(function (e) {
    e.preventDefault();
    var id = this.id;
    var answer = confirm("Apakah anda ingin mengghapus data ini?");
    if (answer){
          $.ajax({
          type  : "POST",
          url   : "aksi.php?page=d_prod",
          data  : "id="+id,
          success : function(data){
          location.reload();
          }
          });
    }
    });

    $(".edit").click(function (e) {
    e.preventDefault();
    var id = this.id;



          $.ajax({
          type  : "POST",
          url   : "data.php?page=prod",
          data  : "id="+id,
          success : function(data){
            $("#form-prod").html(data).show();
          }
          });
    
    });
});
</script>


<!-- Content Header (Page header) -->
<div class="wrapper">
  <section class="content-header">
    <h1>
      Data Produk
    </h1>
  </section>

<section class="content">
<div class="box">
<div class="box-header">

  <a  href="#" data-toggle="modal" data-target="#myModal" href="#tambah" id="0" class="edit btn btn-primary">
    <i class="fa fa-plus-circle"></i> Add Product
  </a>

  
</div><!-- /.box-header -->
<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Merk</th>
        <th>Harga Beli</th>
         <th>Harga Jual</th>
        <th>Stok</th>
         <?php
            if ($level == 'admin')
            {
            echo'<th>Aksi</th>';
            }
            ?>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1;
      $query = mysqli_query($conn, "SELECT * FROM tbl_product ");
      while ($data = mysqli_fetch_array($query)) {

        if ($level == 'admin')   
            {
            $aksi = '<td><a href="" data-toggle="modal" data-target="#myModal" href="#tambah" id='.$data['prod_id'].' class="edit btn btn-info">Edit</a> <a href="" id='.$data['prod_id'].' class="delete btn btn-warning">Delete</a></td>';    
            } 
            else 
            {
            $aksi = '';    
            }  

        echo'
        <tr>
        <td>'.$no.'</td>
        <td>'.$data['prod_code'].'</td>
        <td>'.$data['prod_name'].'</td>
        <td>'.$data['prod_merk'].'</td>
        <td>'.$data['prod_cost_buy'].'</td>
         <td>'.$data['prod_cost_sale'].'</td>
        <td>'.$data['prod_stok'].'</td>
        '.$aksi.'
        </tr>';

      $no ++ ;
      }
      
      ?>

    </tbody>
  </table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</section>
</div>

                <!-- Modal -->

<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Form Produk</h4>
      </div>
            <!-- Modal content-->
      <div class="modal-body">
        <form class="form-horizontal" id="form-prod" method="POST" action="aksi.php?page=s_prod">
                
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

