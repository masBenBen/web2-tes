<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>INSPINIA | Login 2</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
      <div class="row">
        <div class="col-md-6">
          <h2 class="font-bold">Welcome to AHASS Motor</h2>

          <p>
            Ahass Sahabat Muslim merupakan bengkel resmi sepeda motor Honda yang bergerak di bidang
            jasa, perawatan, atau pemeliharaan dan penjualan Sparepart
          </p>
          <p>
            Bengkel ini berada di bawah naungan PT AHM (Astra Honda Motor). Ahass Sahabat Muslim
            didirikan oleh Bpk. H. Kanim pada tahun 2010. Bengkel ini terletak di Jl. industri Kp
            Gombong, rt/rw 04/06, Ds. Pasir Gombong, Kec. Cikarang Utara, Kab. Bekasi.
          </p>

          <!-- <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p> -->
        </div>
        <div class="col-md-6">
          <div class="ibox-content">
            <form class="m-t" role="form" action="cek-login.php" method="post">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div class="form-group">
                <input type="password" name="pass" class="form-control" placeholder="Password" required="" />
              </div>
              <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <p class="m-t">
              <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
            </p>
          </div>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-6">Copyright Example Company</div>
        <div class="col-md-6 text-right">
          <small>© 2014-2015</small>
        </div>
      </div>
    </div>
    <!-- jQuery 2.1.4 -->
    <!-- <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script> -->
  </body>
</html>
