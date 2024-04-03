
<?php
include('koneksi.php');
include('fungsi.php');
$kode_cust ="CST".FormatNoTrans(kodecust());
$kode_supp ="SPL".FormatNoTrans(kodesupp());
$kode_prod ="PRD".FormatNoTrans(kodeprod());

$page = $_GET['page'];


if ($page == 'admin')
{
    $id    = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id = '$id' AND user_level = 'admin' ");
    $data  = mysqli_fetch_array($query);

    if ($id > 0)
    {
        $nama    = $data['user_name'];
        $email   = $data['user_email'];
        $hp      = $data['user_phone'];
        $level   = $data['user_level'];
        $pass    = $data['user_pass'];
        $id      = $data['user_id'];
    }
    else
    {
        $nama    = '';
        $email   = '';
        $hp      = '';
        $level   = '';
        $pass    = '';
        $id      = 0;
    }



    echo'
    <div class="box-body">

    <div class="form-group">
    <label  class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
    <input type="hidden" name="id" class="form-control" value="'.$id.'" >
    <input type="text" name="nama" id="nama" class="form-control" value="'.$nama.'" required >
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
    <input type="email" name="email" id="email" class="form-control" value="'.$email.'" required >
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">No HP</label>
    <div class="col-sm-10">
    <input type="hp" name="hp" id="hp" class="form-control" value="'.$hp.'" required >
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
    <input type="hp" name="pass" id="pass" class="form-control" value="'.$pass.'" required >
    </div>
    </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
    <button type="reset" class="btn btn-default">Reset</button>
    <button type="submit" class="btn btn-info pull-right">Save</button>
    </div><!-- /.box-footer -->

    ';
}


if ($page == 'kasir')
{
    $id    = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id = '$id' AND user_level = 'kasir' ");
    $data  = mysqli_fetch_array($query);

    if ($id > 0)
    {
        $nama    = $data['user_name'];
        $email   = $data['user_email'];
        $hp      = $data['user_phone'];
        $level   = $data['user_level'];
        $pass    = $data['user_pass'];
        $id      = $data['user_id'];
    }
    else
    {
        $nama    = '';
        $email   = '';
        $hp      = '';
        $level   = '';
        $pass    = '';
        $id      = 0;
    }



    echo'
    <div class="box-body">

    <div class="form-group">
    <label  class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
    <input type="hidden" name="id" class="form-control" value="'.$id.'" >
    <input type="text" name="nama" id="nama" class="form-control" value="'.$nama.'" required >
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
    <input type="email" name="email" id="email" class="form-control" value="'.$email.'" required >
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">No HP</label>
    <div class="col-sm-10">
    <input type="hp" name="hp" id="hp" class="form-control" value="'.$hp.'" required >
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
    <input type="hp" name="pass" id="pass" class="form-control" value="'.$pass.'" required >
    </div>
    </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
    <button type="reset" class="btn btn-default">Reset</button>
    <button type="submit" class="btn btn-info pull-right">Save</button>
    </div><!-- /.box-footer -->

    ';
}


if ($page == 'supp')
{
	$id    = $_POST['id'];
	$query = mysqli_query($conn, "SELECT * FROM tbl_supplier WHERE supp_id = '$id' ");
	$data  = mysqli_fetch_array($query);

	if ($id > 0)
	{
		$kode   = $data['supp_code'];
		$nama   = $data['supp_name'];
		$alamat = $data['supp_address'];
		$hp     = $data['supp_phone'];
		$id     = $data['supp_id'];
	}
	else
	{
	    $kode   = $kode_supp;
		$nama   = '';
		$alamat = '';
		$hp     = '';	
		$id     = 0;
	}

	echo'

	  <div class="box-body">
                <div class="form-group">
                <label  class="col-sm-2 control-label">Kode</label>
                <div class="col-sm-10">
                <input type="hidden" name="id" class="form-control" value="'.$id.'" >
                <input type="text" name="kode" class="form-control" value="'.$kode.'" readonly>
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" value="'.$nama.'" required >
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" value="'.$alamat.'" required >
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">No HP</label>
                <div class="col-sm-10">
                <input type="text" name="hp" class="form-control" value="'.$hp.'" required >
                </div>
                </div>


                </div>
                <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
                </div>

	';
}


if ($page == 'cust')
{

	$id    = $_POST['id'];
	$query = mysqli_query($conn, "SELECT * FROM tbl_customer WHERE cust_id = '$id' ");
	$data  = mysqli_fetch_array($query);

	if ($id > 0)
	{
		$kode   = $data['cust_code'];
		$nama   = $data['cust_name'];
		$alamat = $data['cust_address'];
		$hp     = $data['cust_phone'];
		$id     = $data['cust_id'];
	}
	else
	{
	    $kode   = $kode_cust;
		$nama   = '';
		$alamat = '';
		$hp     = '';	
		$id     = 0;
	}

	echo'

				<div class="box-body">
                <div class="form-group">
                <label  class="col-sm-2 control-label">Kode</label>
                <div class="col-sm-10">
                <input type="hidden" name="id" class="form-control" value="'.$id.'" >
                <input type="text" name="kode" class="form-control" value="'.$kode.'" readonly>
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" value="'.$nama.'" required  >
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" value="'.$alamat.'" required >
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">No HP</label>
                <div class="col-sm-10">
                <input type="text" name="hp" class="form-control" value="'.$hp.'" required >
                </div>
                </div>


                </div>
                <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
                </div>

	';
}



if ($page == 'prod')
{

	$id    = $_POST['id'];
	$query = mysqli_query($conn, "SELECT * FROM tbl_product WHERE prod_id = '$id' ");
	$data  = mysqli_fetch_array($query);

	if ($id == 0)
	{
		

        $kode   = $kode_prod;
        $nama   = '';
        $merk   = '';
        $cost_beli  = 0;
        $cost_jual  = 0;
        $stok   = 0;
        $id     = 0;
	}
	else
	{

        $kode   = $data['prod_code'];
        $nama   = $data['prod_name'];
        $merk   = $data['prod_merk'];
        $cost_beli   = $data['prod_cost_buy'];
                $cost_jual   = $data['prod_cost_sale'];
        $stok   = $data['prod_stok'];
        $id     = $data['prod_id'];
	    
	}

	echo'

				<div class="box-body">
                <div class="form-group">
                <label  class="col-sm-2 control-label">Kode</label>
                <div class="col-sm-10">
                <input type="hidden" name="id" class="form-control" value="'.$id.'" >
                <input type="text" name="kode" class="form-control" value="'.$kode.'" readonly >
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" value="'.$nama.'" required  >
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Merk</label>
                <div class="col-sm-10">
                <input type="text" name="merk" class="form-control" value="'.$merk.'" required >
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Harga Beli</label>
                <div class="col-sm-10">
                <input type="text" name="harga_beli" class="form-control" value="'.$cost_beli.'" required >
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Harga Jual</label>
                <div class="col-sm-10">
                <input type="text" name="harga_jual" class="form-control" value="'.$cost_jual.'" required >
                </div>
                </div>

               


                </div>
                <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
                </div>

	';
}


if ($page == 'cari_prod')
{
        $id = $_POST['id'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_product WHERE prod_code = '$id' ");
        $row   = mysqli_fetch_array($query);

        $data['nama'] = $row['prod_name'];
        $data['merk'] = $row['prod_merk'];
        $data['harga'] = $row['prod_cost_buy'];


        echo json_encode($data);
}

if ($page == 'cari_prod_jual')
{
        $id = $_POST['id'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_product WHERE prod_code = '$id' ");
        $row   = mysqli_fetch_array($query);

        $data['nama'] = $row['prod_name'];
        $data['merk'] = $row['prod_merk'];
        $data['harga'] = $row['prod_cost_sale'];
        $data['stok'] = $row['prod_stok'];

        

        echo json_encode($data);
}


if ($page == 'cari_cust')
{
        $id = $_POST['id'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_customer WHERE cust_code = '$id' ");
        $row   = mysqli_fetch_array($query);

        $data['nama'] = $row['cust_name'];
        echo json_encode($data);
}


if ($page == 'cari_supp')
{
        $id = $_POST['id'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_supplier WHERE supp_code = '$id' ");
        $row   = mysqli_fetch_array($query);

        $data['nama'] = $row['supp_name'];
        echo json_encode($data);
}




if ($page == 'laporan_pembelian')
{
        $tgl1 = $_POST['tgl1'];
        $tgl2 = $_POST['tgl2'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_transactionpb INNER JOIN tbl_product ON tbl_product.prod_code   = tbl_transactionpb.tr_part 
                                      INNER JOIN tbl_supplier ON tbl_supplier.supp_code = tbl_transactionpb.tr_supp WHERE  tr_type = 'RCT' AND tr_date >= '$tgl1' AND tr_date <= '$tgl2' ");
        $row = mysqli_num_rows($query);

        if ($row > 0)
        {

        $no = 1;
        echo "
        <table id='example1' class='table table-bordered table-striped'>
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
        <tbody>";
        
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
        echo "</tbody>
        </table>";

        }
        else
        {
           echo'<div class="alert alert-danger">
  <strong>Info!</strong> Data Tidak Tersedia.
</div>';   
        }
}



if ($page == 'pembelian_excel')
{
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=laporan_pembelian.xls");

        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_transactionpb INNER JOIN tbl_product ON tbl_product.prod_code   = tbl_transactionpb.tr_part 
                                      INNER JOIN tbl_supplier ON tbl_supplier.supp_code = tbl_transactionpb.tr_supp WHERE  tr_type = 'RCT' AND tr_date >= '$tgl1' AND tr_date <= '$tgl2' ");
        $row = mysqli_num_rows($query);

        if ($row > 0)
        {

        $no = 1;
        echo "
        <table id='example1' class='table table-bordered table-striped'>
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
        <tbody>";
        
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
        echo "</tbody>
        </table>";

        }
        else
        {
           echo'<div class="alert alert-danger">
  <strong>Info!</strong> Data Tidak Tersedia.
</div>';   
        }
}


if ($page == 'pembelian_pdf')
{

        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];


        define('_MPDF_PATH','plugins/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
        include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
        $mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru

        //Memulai proses untuk menyimpan variabel php dan html
        ob_start();


        $query = mysqli_query($conn, "SELECT * FROM tbl_transactionpb INNER JOIN tbl_product ON tbl_product.prod_code   = tbl_transactionpb.tr_part 
                                      INNER JOIN tbl_supplier ON tbl_supplier.supp_code = tbl_transactionpb.tr_supp WHERE  tr_type = 'RCT' AND tr_date >= '$tgl1' AND tr_date <= '$tgl2' ");
        $row = mysqli_num_rows($query);

        if ($row > 0)
        {

        $no = 1;
        echo "
        <h2 align='center'>LAPORAN PEMBELIAN</h2>
        <table  class='responstable'>
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
        <tbody>";
        
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
        echo "</tbody>
        </table>";


        $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
        ob_end_clean();
        $stylesheet = file_get_contents('style.css');
        //Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);

        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML(utf8_encode($html));

        $mpdf->Output("laporan_penjualan.pdf" ,'I');
        exit;

        }
        else
        {
           echo'<div class="alert alert-danger">
  <strong>Info!</strong> Data Tidak Tersedia.
</div>';   
        }
}


if ($page == 'laporan_penjualan')
{
        $tgl1 = $_POST['tgl1'];
        $tgl2 = $_POST['tgl2'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_transactionpj INNER JOIN tbl_product ON tbl_product.prod_code   = tbl_transactionpj.tr_part 
                                      INNER JOIN tbl_customer ON tbl_customer.cust_code = tbl_transactionpj.tr_cust WHERE  tr_type = 'ISS' AND tr_date >= '$tgl1' AND tr_date <= '$tgl2' ");
        $row = mysqli_num_rows($query);

        if ($row > 0)
        {

        $no = 1;
        echo "
        <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Produk</th>
        <th>Supplier</th>
        <th>Qty Saldo</th>
        <th>Qty Out</th>
        <th>Stok</th>
        <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>";
        
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
        echo "</tbody>
        </table>";

        }
        else
        {
           echo'<div class="alert alert-danger">
  <strong>Info!</strong> Data Tidak Tersedia.
</div>';   
        }
}

if ($page == 'penjualan_excel')
{
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];

        $query = mysqli_query($conn, "SELECT * FROM tbl_transactionpj INNER JOIN tbl_product ON tbl_product.prod_code   = tbl_transactionpj.tr_part 
                                      INNER JOIN tbl_customer ON tbl_customer.cust_code = tbl_transactionpj.tr_cust WHERE  tr_type = 'ISS' AND tr_date >= '$tgl1' AND tr_date <= '$tgl2' ");
        $row = mysqli_num_rows($query);

        if ($row > 0)
        {

        $no = 1;
        echo "
        <h2 align='center'>LAPORAN PENJUALAN</h2>
        <table id='example1' class='table table-bordered table-striped'>
        <thead>
        <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Produk</th>
        <th>Supplier</th>
        <th>Qty Saldo</th>
        <th>Qty Out</th>
        <th>Stok</th>
        <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>";
        
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
        echo "</tbody>
        </table>";

        }
        else
        {
           echo'<div class="alert alert-danger">
  <strong>Info!</strong> Data Tidak Tersedia.
</div>';   
        }
}


if ($page == 'penjualan_pdf')
{

        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];


        define('_MPDF_PATH','plugins/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
        include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
        $mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru

        //Memulai proses untuk menyimpan variabel php dan html
        ob_start();


        $query = mysqli_query($conn, "SELECT * FROM tbl_transactionpj INNER JOIN tbl_product ON tbl_product.prod_code   = tbl_transactionpj.tr_part 
                                      INNER JOIN tbl_customer ON tbl_customer.cust_code = tbl_transactionpj.tr_cust WHERE  tr_type = 'ISS' AND tr_date >= '$tgl1' AND tr_date <= '$tgl2' ");
        $row = mysqli_num_rows($query);

        if ($row > 0)
        {

        $no = 1;
        echo "
        <h2 align='center'>LAPORAN PENJUALAN</h2>
        <table  class='responstable'>
        <thead>
        <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Produk</th>
        <th>Supplier</th>
        <th>Qty Saldo</th>
        <th>Qty Out</th>
        <th>Stok</th>
        <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>";
        
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
        echo "</tbody>
        </table>";


        $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
        ob_end_clean();
        $stylesheet = file_get_contents('style.css');
        //Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);

        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML(utf8_encode($html));

        $mpdf->Output("laporan_penjualan.pdf" ,'I');
        exit;

        }
        else
        {
           echo'<div class="alert alert-danger">
  <strong>Info!</strong> Data Tidak Tersedia.
</div>';   
        }
}

?>