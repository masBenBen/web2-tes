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
          url   : "aksi.php?page=d_admin",
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
          url   : "data.php?page=admin",
          data  : "id="+id,
          success : function(data){
            $("#form-admin").html(data).show();
          }
          });  
    });
});
</script>

<!-- Content Header (Page header) -->
<div class="wrapper">
  <section class="content-header" >
    <h2>
      Data Admin
    </h2>
  </section>
  <section class="content" style="display: block;">
    <div class="wrapper wrapper-content animated fadeInRight">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="ibox ">
                          <div class="ibox-title">
                              <a  href="#" data-toggle="modal" data-target="#myModal" href="#tambah" id="0" class="edit btn btn-primary">
                              <i class="fa fa-plus-circle"></i> Add Admin
                              </a>

                              <div class="ibox-tools">
                                  <a class="collapse-link">
                                      <i class="fa fa-chevron-up"></i>
                                  </a>
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                      <i class="fa fa-wrench"></i>
                                  </a>
                                  <ul class="dropdown-menu dropdown-user">
                                      <li><a href="#" class="dropdown-item">Config option 1</a>
                                      </li>
                                      <li><a href="#" class="dropdown-item">Config option 2</a>
                                      </li>
                                  </ul>
                                  <a class="close-link">
                                      <i class="fa fa-times"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="ibox-content">

                              <table class="footable table table-stripped toggle-arrow-tiny">
                                  <thead>
                                  <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Email</th>
                                  <th>No HP</th>
                                  <th>Level</th>
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
                                  $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_level = 'admin' ");
                                  while ($data = mysqli_fetch_array($query)) {

                                  if ($level == 'admin')   
                                  {
                                  $aksi = '<td><a href="" data-toggle="modal" data-target="#myModal" href="#tambah" id='.$data['user_id'].' class="edit btn btn-info">Edit</a> <a href="" id='.$data['user_id'].' class="delete btn btn-warning">Delete</a></td>';    
                                  } 
                                  else 
                                  {
                                  $aksi = '';    
                                  }  
                                  echo'
                                  <tr>
                                  <td>'.$no.'</td>
                                  <td>'.$data['user_name'].'</td>
                                  <td>'.$data['user_email'].'</td>
                                  <td>'.$data['user_phone'].'</td>
                                  <td>'.$data['user_level'].'</td>
                                  '.$aksi.'
                                  
                                  </tr>';
                                  $no ++ ;
                                  }
                                  ?>
                                  </tbody>
                                  <tfoot>
                                  <tr>
                                      <td colspan="5">
                                          <ul class="pagination float-right"></ul>
                                      </td>
                                  </tr>
                                  </tfoot>
                              </table>

                          </div>
                      </div>
                  </div>
              </div>
    </div>
  </section>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Admin</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" id="form-admin" method="POST" action="aksi.php?page=s_admin">
                
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>