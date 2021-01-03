<?php  
if ($_SERVER["REQUEST_METHOD"]=="POST"){
/*$katalaluan_plgn=$_POST['katalaluan_plgn'];*/
        require_once "connection.php"; 
$nama_staf=$_POST['nama_staf'];
$nokp_staf=$_POST['nokp_staf'];
$jawatan_staf=$_POST['jawatan_staf'];
$notelpej_staf=$_POST['notelpej_staf'];
$notel_staf=$_POST['notel_staf'];
$emel_staf  =  $_POST["emel_staf"];
$staf = $_FILES['staf'];
    
    $fileName = $_FILES['staf']['name'];
    $fileTmpName = $_FILES['staf']['tmp_name'];
    $fileSize = $_FILES['staf']['size'];
    $fileError = $_FILES['staf']['error'];
    $fileType= $_FILES['staf']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpg', 'jpeg','png', '');

    if(in_array($fileActualExt, $allowed)){
        if (!empty($fileName)) {
            if ($fileSize < 1000000){
                $fileNameNew = "prof".$nama_staf.".".$fileActualExt;
                $fileDestination = 'profile/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
 $sql = "UPDATE staf SET nama_staf='$nama_staf', nokp_staf='$nokp_staf',  jawatan_staf='$jawatan_staf', notelpej_staf='$notelpej_staf',  notel_staf='$notel_staf', imgstaf = 0 WHERE emel_staf='$emel_staf'";
print $sql;
 mysqli_query($con, $sql);
   echo"<script>alert('Maklumat berjaya dikemaskini!')</script>";
   echo"<script>window.open('javascript:history.go(-2)','_self')</script>";  
    }else{  
    echo"<script>alert('Fail terlalu besar!')</script>";
    echo"<script>window.open('javascript:history.go(-1)','_self')</script>"; 
        } 
         }else{             if ($fileSize < 1000000){
                $fileNameNew = "prof".$nama_staf.".".$fileActualExt;
                $fileDestination = 'profile/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
 $sql = "UPDATE staf SET nama_staf='$nama_staf', nokp_staf='$nokp_staf',  jawatan_staf='$jawatan_staf', notelpej_staf='$notelpej_staf',  notel_staf='$notel_staf', imgstaf = 1 WHERE emel_staf='$emel_staf'";
print $sql;
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
<title>Kemaskini Maklumat Staf</title>
    <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
<section>
<div class="container">
<div class="row" style="width: 100%;padding: 0px 0px; margin-left:0px;">
  <form action="aeditstaf.php" method="post" id="frmKemaskini" style="background:#F0F0F0;" enctype="multipart/form-data">
       <a href="javascript:history.go(-1)" style="color: red; float:left;"><i class="fas fa-angle-double-left"></i> Kembali</a><br>
       <?php
      include "connection.php";
$id = $_GET['id'];
$sql = "select * from staf where emel_staf = '$id'";
    if($result = mysqli_query($con,$sql)){
        if(mysqli_num_rows($result)>0){
            $bil=1;
            while($row=mysqli_fetch_array($result)){
                 $nama_staf=$row['nama_staf'];
                ?>
			<div><center><label><h2>KEMASKINI MAKLUMAT STAF</h2></label></center></div>
			<table style="margin-left:200px;" border="0">
            <input name="emel_staf" type="hidden" class="input-field" value="<?php echo htmlentities($row['emel_staf']);?>">
            <tr>
                <td></td>
            <td> <?php if($row['imgstaf'] == 0){
                    echo"<img style='width:100px; heigh:100px;'  src='profile/prof".$nama_staf.".jpg?'".mt_rand().">";
                }else{ echo"<img style='width:100px; heigh:100px;' src='profile/profdefault.png'>";}?>
                <br><br><input type="file" name="staf" /></td>
            </tr>
			<td>Nama Penuh</td>
			<td>: <input name="nama_staf" type="text" class="input-field" value="<?php echo htmlentities($row['nama_staf']);?>" required></td>
			<tr>
			<td>No Kad Pengenalan</td>
			<td>:  <input name="nokp_staf" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['nokp_staf']);?>" required></td>
			</tr>
			<tr>
			<td>Jawatan</td>
			<td>:  <input name="jawatan_staf" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['jawatan_staf']);?>" required></td>
			</tr>
			<tr>
			<td>No. Tel. Pejabat</td>
			<td>:  <input name="notelpej_staf" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['notelpej_staf']);?>" required></td>
			</tr>
			<tr>
			<td>No. Tel. Bimbit</td>
			<td>:  <input name="notel_staf" type="text"class="input-fieldnum" value="<?php echo htmlentities($row['notel_staf']);?>" required></td>
			</tr>
			<tr>
			<td>Alamat Emel Pengguna*</td>
			<td>: <?php echo htmlentities($row['emel_staf']);?></td>
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