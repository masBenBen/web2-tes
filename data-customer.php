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
          url   : "aksi.php?page=d_cust",
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
          url   : "data.php?page=cust",
          data  : "id="+id,
          success : function(data){
            $("#form-cust").html(data).show();
          }
          });
    
    });
});
</script>
<!-- Content Header (Page header) -->
<div class="wrapper">
  <section class="content-header">
    <h1>
      Data Customer
    </h1>
  </section>
<section class="content">
<div class="box">
    <div class="box-header">
        <a  href="#" data-toggle="modal" data-target="#myModal" href="#tambah" id="0" class="edit btn btn-primary"><i class="fa fa-plus-circle"></i> Add Costumer</a>
        </div><!-- /.box-header -->
        <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
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
            $query = mysqli_query($conn, "SELECT * FROM tbl_customer ");
            while ($data = mysqli_fetch_array($query)) {
            if ($level == 'admin')   
            {
            $aksi = '<td><a href="" data-toggle="modal" data-target="#myModal" href="#tambah" id='.$data['cust_id'].' class="edit btn btn-info">Edit</a> <a href="" id='.$data['cust_id'].' class="delete btn btn-warning">Delete</a></td>';    
            } 
            else 
            {
            $aksi = '';    
            }  
            echo'
            <tr>
            <td>'.$no.'</td>
            <td>'.$data['cust_code'].'</td>
            <td>'.$data['cust_name'].'</td>
            <td>'.$data['cust_address'].'</td>
            <td>'.$data['cust_phone'].'</td>
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
          <h4 class="modal-title">Form Customer</h4>
      </div>
            <!-- Modal content-->
      <div class="modal-body">
        <form class="form-horizontal" id="form-cust" method="POST" action="aksi.php?page=s_cust">
                
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
