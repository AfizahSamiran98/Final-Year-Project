<?php  
include 'registerfunction.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "Anda Perlu Log Masuk Kedalam Sistem Terlebih Dahulu."; 
    header ('location: plogmasukpengguna.php'); 
}
$emel_plgn=$_SESSION['emel_plgn'];

?> 
<?php
if (isset($_POST['bayar'])){
    
    //get all the submitted data from the form
    $nokad_bank = $_POST['nokad_bank'];
    $cvv = $_POST['cvv'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $nama_bank = $_POST['nama_bank'];
    $id_lwtn = $_POST['id_lwtn'];
    $tajuk_lwtn = $_POST['tajuk_lwtn'];
    $jumlah_byrn = $_POST['jumlah_byrn'];
    $tarikh_lwtn = $_POST['tarikh_lwtn'];
    $emel_plgn = $_POST['emel_plgn'];
    
    $sql = "INSERT INTO bayaran (nokad_bank,cvv,bulan,tahun,nama_bank,id_lwtn,tajuk_lwtn,emel_plgn,status_byrn,jumlah_byrn,tarikh_lwtn) VALUES ('".$nokad_bank."','".$cvv."','".$bulan."',' ".$tahun."',' ".$nama_bank."','".$id_lwtn."','".$tajuk_lwtn."','".$emel_plgn."','Berjaya','".$jumlah_byrn."','".$tarikh_lwtn."')";
    $insert= mysqli_query($con, $sql);
     $ins = "INSERT INTO kalendar(perkara, tarikh_lwtn) VALUES ('".$tajuk_lwtn."','".$tarikh_lwtn."')";
    mysqli_query($con, $ins);
     $upd = "UPDATE lawatan SET status_byrn = 'Berjaya' WHERE id_lwtn ='".$id_lwtn."'";
    mysqli_query($con, $upd);
        echo"<script>alert('Bayaran Berjaya!')</script>";
       echo"<script>window.open('presitbayaran.php?id=$id_lwtn','_self')</script>";
}

ob_start();
?>
<html>
<head>
    <title>Bayaran Tempahan Lawatan</title>
     <link rel="stylesheet" href="pstylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
    <body>
<section>
<div class="header">
  <header><img class="img" src="images/logo.png" align="left"><br><br>SISTEM TEMPAHAN LAWATAN KOMPLEKS KRAF JOHOR<br>PERBADANAN KEMAJUAN KRAFTANGAN MALAYSIA KEMENTERIAN PELANCONGAN, SENI DAN BUDAYA</header>
</div>
<div style="float:left;" class="navbar">
  <a href="javascript:history.go(-1)" title="Return to previous page" style="color: red; float:left;"><i class="fas fa-angle-double-left"></i> Kembali</a>
  <a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php  if (isset($_SESSION['emel_plgn'])) : ?>
  <strong>
  <?php echo $_SESSION['nama_plgn']; ?></strong> (<i>pelanggan</i>)
  </a><?php endif ?>
    <I><a href="plogout.php" style="color: red;float:right;"><i class="fas fa-sign-out-alt"></i> Logout</a></I>         
</div>
</section>
<section>
<div class="container" style="width: 100%;">
<div class="row" style="width: 100%;">
  <div class="column" style="width: 55%; padding: 35px 0px; ">
  <div id="frmRegister">
  <div><center><label><h2>MAKLUMAT TEMPAHAN</h2></label></center></div>
                    <?php
            require('connection.php');
            $id = $_GET['id'];
            $sql ="SELECT * FROM lawatan LEFT JOIN aktiviti
                    ON aktiviti.id_aktv = lawatan.id_aktv
                    LEFT JOIN staf
                    ON staf.emel_staf = lawatan.emel_staf
                    LEFT JOIN pelanggan
                    ON pelanggan.emel_plgn = lawatan.emel_plgn
                    WHERE id_lwtn = '$id'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
            $bil=1;
            while($row=mysqli_fetch_array($result)){
            $tajuk_lwtn=$row['tajuk_lwtn'];?>
                <center><table >
                <tr>
                <td>Nama Pemohon</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_plgn"];?></td>
                </tr>
                <tr>
                <td>Tajuk Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["tajuk_lwtn"];?></td>
                </tr>
                <tr>
                <td>Tarikh Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["tarikh_lwtn"];?></td>
                </tr>
                <tr>
                <td>Masa Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["masa_lwtn"];?></td>
                </tr>
                <tr>
                <td>Aktiviti Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_aktv"];?></td>
                </tr>
                <tr>
                <td>Harga Aktiviti</td>
                <td style="font-weight: normal;">: RM <?php echo $row ["harga_aktv"];?></td>
                </tr>
                 <tr>
                <td>Jumlah Pelawat</td>
                <td style="font-weight: normal;">: <?php echo $row ["jumlah_lwtn"];?></td>
                </tr>
                <tr>
               <td><hr color="black" align="center" width="100%"></td>
                    <td><hr color="black" align="center" width="100%"></td>
                </tr>
                 <tr>
                <td>Jumlah Bayaran</td>
                <td style="font-weight: normal;">: RM <?php echo $row ["jumlah_byrn"];?></td>
                </tr>
                    <tr>
               <td><hr color="black" align="center" width="100%"></td>
                    <td><hr color="black" align="center" width="100%"></td>
                </tr>
                    </table></center><?php }} ?>
  </div>
  </div>
  
    <div class="column" style="width: 45%; padding: 35px 0px; margin-left:0px;">
  <form action="pbayarantempahan.php" method="post" id="frmRegister" enctype="multipart/form-data">
			<div><center><label><h2>BUTIRAN PEMBAYARAN</h2></label></center></div>
			<table border="0">
            <?php 
                 $id_lwtn=$row['id_lwtn'];
                $select= "select * FROM lawatan WHERE emel_plgn = '$emel_plgn'AND id_lwtn = '$id'";
                $selected = mysqli_query($con,$select);
                while($row = mysqli_fetch_array($selected)):;?> 
            <input type="hidden" name="emel_plgn" value="<?php echo $row['emel_plgn'];?>">
             <input type="hidden" name="id_lwtn" value="<?php echo $row['id_lwtn'];?>">
            <input type="hidden" name="tajuk_lwtn" value="<?php echo $row['tajuk_lwtn'];?>">
            <input type="hidden" name="jumlah_byrn" value="<?php echo $row['jumlah_byrn'];?>">
                <input type="hidden" name="tarikh_lwtn" value="<?php echo $row['tarikh_lwtn'];?>">
            <?php endwhile;?>
			<td>No. Kad Bank</td>
			<td>: <input name="nokad_bank" type="text" placeholder="0000 0000 0000 0000" class="input-fieldpay2" required></td>
            <tr>
            <td>CVV</td>
            <td>: <input name="cvv" type="text" placeholder="123" class="input-fieldpay" required></td>
            </tr>
            <tr>
			<td>Tarikh Tamat</td>
			<td><div class="select-wrap one-third">
                : <select name="bulan" id="bulan" class="input-fieldpay" >
                <option value="">Bulan</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
					<option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                 </select>
                <select name="tahun" id="tahun" class="input-fieldpay">
                    <option value="">Tahun</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
					<option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                </select>
                </div></td>
			</tr>
            <tr>
            <td>Nama Bank</td>
            <td><div class="select-wrap one-third">
                : <select name="nama_bank" id="nama_bank" class="input-fieldpay2" >
                <option value="">Pilih Bank</option>
                    <option value="AFFIN BANK BERHAD">AFFIN BANK BERHAD</option>
                    <option value="ALLIANCE BANK MALAYSIA BERHAD">ALLIANCE BANK MALAYSIA BERHAD</option>
					<option value="AMBANK BERHAD">AMBANK BERHAD</option>
                    <option value="BANK ISLAM MALAYSIA BERHAD">BANK ISLAM MALAYSIA BERHAD</option>
                    <option value="BANK SIMPANAN NASIONAL BERHAD">BANK SIMPANAN NASIONAL BERHAD</option>
                    <option value="CIMB BANK BERHAD">CIMB BANK BERHAD</option>
                    <option value="MAYBANK BERHAD">MAYBANK BERHAD</option>
                    <option value="PUBLIC BANK BERHAD">PUBLIC BANK BERHAD</option>
                    <option value="RHB BANK BERHAD">RHB BANK BERHAD</option>
                    <option value="CITIBANK BERHAD">CITIBANK BERHAD</option>
                    <option value="HONG LEONG BANK BERHAD">HONG LEONG BANK BERHAD</option>
                </select></div></td>
            </tr>
			<tr>
			</table>
			<div class="field-group">
			<div><center><input class="registerbutton" type="submit" name="bayar" value="Bayar >>" ></center></div>
			</div>
			</form>
</div>
</div>
</div>
</section>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>


