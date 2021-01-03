<?php  
if ($_SERVER["REQUEST_METHOD"]=="POST"){
/*$katalaluan_plgn=$_POST['katalaluan_plgn'];*/
    require_once "connection.php"; 
$nama_plgn=$_POST['nama_plgn'];
$nokp_plgn=$_POST['nokp_plgn'];
$institut_plgn=$_POST['institut_plgn'];
$jawatan_plgn=$_POST['jawatan_plgn'];
$notelpej_plgn=$_POST['notelpej_plgn'];
$nofax_plgn=$_POST['nofax_plgn'];
$notel_plgn=$_POST['notel_plgn'];
$emel_plgn  =  $_POST["emel_plgn"];
$plgn = $_FILES['plgn'];
    
    $fileName = $_FILES['plgn']['name'];
    $fileTmpName = $_FILES['plgn']['tmp_name'];
    $fileSize = $_FILES['plgn']['size'];
    $fileError = $_FILES['plgn']['error'];
    $fileType= $_FILES['plgn']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpg', 'jpeg','png', '');
if(in_array($fileActualExt, $allowed)){
        if (!empty($fileName)) {
            if ($fileSize < 1000000){
                $fileNameNew = "prof".$nama_plgn.".".$fileActualExt;
                $fileDestination = 'profile/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
 $sql = "UPDATE pelanggan SET nama_plgn='$nama_plgn', nokp_plgn='$nokp_plgn', institut_plgn='$institut_plgn', jawatan_plgn='$jawatan_plgn', notelpej_plgn='$notelpej_plgn', nofax_plgn='$nofax_plgn', notel_plgn='$notel_plgn', imgplgn = 0 WHERE emel_plgn='$emel_plgn'";

 mysqli_query($con, $sql);
       echo"<script>alert('Maklumat berjaya dikemaskini!')</script>";
                echo"<script>window.open('javascript:history.go(-2)','_self')</script>";    
    }else{  
    echo"<script>alert('Fail terlalu besar!')</script>";
    echo"<script>window.open('javascript:history.go(-1)','_self')</script>"; 
        } 
         }else{ if ($fileSize < 1000000){
                $fileNameNew = "prof".$nama_plgn.".".$fileActualExt;
                $fileDestination = 'profile/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
 $sql = "UPDATE pelanggan SET nama_plgn='$nama_plgn', nokp_plgn='$nokp_plgn', institut_plgn='$institut_plgn', jawatan_plgn='$jawatan_plgn', notelpej_plgn='$notelpej_plgn', nofax_plgn='$nofax_plgn', notel_plgn='$notel_plgn', imgplgn = 1 WHERE emel_plgn='$emel_plgn'";

 mysqli_query($con, $sql);
       echo"<script>alert('Maklumat berjaya dikemaskini!')</script>";
                echo"<script>window.open('javascript:history.go(-2)','_self')</script>";    
    }else{  
    echo"<script>alert('Fail terlalu besar!')</script>";
    echo"<script>window.open('javascript:history.go(-1)','_self')</script>"; 
        } }}else{
    echo"<script>alert('Fail gagal dimuatnaik!')</script>";
    echo"<script>window.open('javascript:history.go(-1)','_self')</script>";    
    }
 
    }else{   
        } 
 


ob_start();
?> 

<html>
<head>
<title>Kemaskini Maklumat Pelanggan</title>
    <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
    
<section>
<div class="container">
<div class="row" style="width: 100%;padding: 0px 0px; margin-left:0px;">
  <form action="aeditpelanggan.php" method="post" id="frmKemaskini" style="background:#F0F0F0;" enctype="multipart/form-data">
       <a href="aindexadmin.php?asenaraipelanggan" style="color: red; float:left;"><i class="fas fa-angle-double-left"></i> Kembali</a></br>
       <?php
      include "connection.php";
$id = $_GET['id'];
$sql = "select * from pelanggan where emel_plgn = '$id'";
    if($result = mysqli_query($con,$sql)){
        if(mysqli_num_rows($result)>0){
            $bil=1;
            while($row=mysqli_fetch_array($result)){
                 $nama_plgn=$row['nama_plgn'];
                ?>
			<div><center><label><h2>KEMASKINI MAKLUMAT PELANGGAN</h2></label></center></div>
		    <table style="margin-left:200px;" border="0">
            <input name="emel_plgn" type="hidden" class="input-field" value="<?php echo htmlentities($row['emel_plgn']);?>" >
                <tr>
                <td></td>
            <td> <?php if($row['imgplgn'] == 0){
                    echo"<img style='width:100px; heigh:100px;'  src='profile/prof".$nama_plgn.".jpg?'".mt_rand().">";
                }else{ echo"<img style='width:100px; heigh:100px;' src='profile/profdefault.png'>";}?>
                <br><br><input type="file" name="plgn" /></td>
            </tr>
			<td>Nama Penuh</td>
			<td>: <input name="nama_plgn" type="text" class="input-field" value="<?php echo htmlentities($row['nama_plgn']);?>" required></td>
			<tr>
			<td>No Kad Pengenalan</td>
			<td>:  <input name="nokp_plgn" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['nokp_plgn']);?>" required></td>
			</tr>
			<tr>
			<td>Institut</td>
			<td>:  <input name="institut_plgn" type="text"  class="input-field" value="<?php echo htmlentities($row['institut_plgn']);?>" required></td>
			</tr>
			<tr>
			<td>Jawatan</td>
			<td>:  <input name="jawatan_plgn" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['jawatan_plgn']);?>" required></td>
			</tr>
			<tr>
			<td>No. Tel. Pejabat</td>
			<td>:  <input name="notelpej_plgn" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['notelpej_plgn']);?>" required></td>
			</tr>
			<tr>
			<td>No Faks Pejabat</td>
			<td>:  <input name="nofax_plgn" type="text"class="input-fieldnum" value="<?php echo htmlentities($row['nofax_plgn']);?>" required></td>
			</tr>
			<tr>
			<td>No. Tel. Bimbit</td>
			<td>:  <input name="notel_plgn" type="text"class="input-fieldnum" value="<?php echo htmlentities($row['notel_plgn']);?>" required></td>
			</tr>
			<tr>
			<td>Alamat Emel Pengguna*</td>
			<td>: <?php echo htmlentities($row['emel_plgn']);?></td>
			</tr>
			<!--<tr>
			<td>Kata Laluan*</td>
			<td>:  <input name="katalaluan_plgn1" type="text" placeholder="kata laluan" class="input-fieldnum" ></td>
			</tr>
			<tr>
			<td>Ulang Kata Laluan*</td>
			<td>:  <input name="katalaluan_plgn2" type="text" placeholder="kata laluan" class="input-fieldnum" ></td>
			</tr>-->
			</table>
			<div class="field-group">
			<div><center><input class="registerbutton" type="submit" name="kemaskini" value="Kemaskini" ></center></div>
			</div>
			</form>
    <?php
            }
        }
    }
                ?>
</div>
</div>
</section>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>