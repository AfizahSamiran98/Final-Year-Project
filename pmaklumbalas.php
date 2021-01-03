<?php  
include 'registerfunction.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "Anda Perlu Log Masuk Kedalam Sistem Terlebih Dahulu."; 
    header ('location: plogmasukpengguna.php'); 
}
$emel_plgn=$_SESSION['emel_plgn'];

?> 
<?php
if (isset($_POST['maklumbalas'])){
    
    //get all the submitted data from the form
    $MB_lwtn = $_POST['MB_lwtn'];
    $pen_lwtn = $_POST['pen_lwtn'];
    $pen_staf = $_POST['pen_staf'];
    $emel_staf = $_POST['emel_staf'];
    $nama_staf = $_POST['nama_staf'];
    $id_lwtn = $_POST['id_lwtn'];
    $tajuk_lwtn = $_POST['tajuk_lwtn'];
    $tarikh_lwtn = $_POST['tarikh_lwtn'];
    $nama_aktv = $_POST['nama_aktv'];
    $emel_plgn = $_POST['emel_plgn'];
    
    $sql = "INSERT INTO maklumbalas(MB_lwtn,pen_lwtn,pen_staf,emel_staf,id_lwtn,emel_plgn,nama_staf,tajuk_lwtn, tarikh_lwtn, nama_aktv,status_MB) VALUES ('".$MB_lwtn."','".$pen_lwtn."','".$pen_staf."',' ".$emel_staf."',' ".$id_lwtn."','".$emel_plgn."','".$nama_staf."','".$tajuk_lwtn."','".$tarikh_lwtn."','".$nama_aktv."','Sudah')";
    $insert= mysqli_query($con, $sql);
     $upd = "UPDATE lawatan SET status_MB = 'Sudah' WHERE id_lwtn ='".$id_lwtn."'";
    mysqli_query($con, $upd);
        echo"<script>alert('Maklum Balas Berjaya Dihantar!')</script>";
       echo"<script>window.open('psenaraitempahan.php','_self')</script>";
}

ob_start();
?>
<html>
<head>
    <title>tempahan lawatan</title>
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
    <div class="column" style="width: 65%; padding: 0px 0px; margin-left:0px;">
  <form action="pmaklumbalas.php" method="post" id="frmRegister" enctype="multipart/form-data">
			<div><center><label><h2>MAKLUM BALAS LAWATAN</h2></label></center></div>
			<table border="0">
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
            $bil = 1;
            while($row = mysqli_fetch_array($result)){
            $tajuk_lwtn=$row['tajuk_lwtn'];?>
            <input type="hidden" name="emel_plgn" value="<?php echo $row['emel_plgn'];?>">
            <input type="hidden" name="id_lwtn" value="<?php echo $row['id_lwtn'];?>">
            <input type="hidden" name="emel_staf" value="<?php echo $row['emel_staf'];?>">
            <input type="hidden" name="nama_staf" value="<?php echo $row['nama_staf'];?>">
            <input type="hidden" name="tajuk_lwtn" value="<?php echo $row['tajuk_lwtn'];?>">
            <input type="hidden" name="nama_aktv" value="<?php echo $row['nama_aktv'];?>">
            <input type="hidden" name="tarikh_lwtn" value="<?php echo $row['tarikh_lwtn'];?>">
            <tr>
			<td>Tajuk Lawatan</td>
			<td style="font-weight: normal;">: <?php echo $row ["tajuk_lwtn"];?></td>
            </tr>
            <tr>
			<td>Penilaian Aktiviti</td>
			<td>: <input type="radio" name="pen_lwtn" value="1" required>1
                  <input type="radio" name="pen_lwtn" value="2" required>2
                  <input type="radio" name="pen_lwtn" value="3" required>3
                  <input type="radio" name="pen_lwtn" value="4" required>4
                  <input type="radio" name="pen_lwtn" value="5" required>5
            </td>
			</tr>
            <tr>
                <td>Staf bertugas</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_staf"];?></td>
                </tr>
			<tr>
			<td>Penilaian Staf</td>
			<td>: <input type="radio" name="pen_staf" value="1" required>1
                  <input type="radio" name="pen_staf" value="2" required>2
                  <input type="radio" name="pen_staf" value="3" required>3
                  <input type="radio" name="pen_staf" value="4" required>4
                  <input type="radio" name="pen_staf" value="5" required>5
            </td>
			</tr>
			<tr>
			<td>Maklum Balas&emsp;&emsp;&emsp;:</td>
                <td><textarea name="MB_lwtn" type="text" placeholder="Maklum balas lawatan" class="input-fieldnum" style="width:100%;" rows="4" required></textarea></td>
			</tr>
			<tr>
                <?php  }} ?>
			</table>
			<div class="field-group">
			<div><center><input class="registerbutton" type="submit" name="maklumbalas" value="Hantar >>" ></center></div>
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
