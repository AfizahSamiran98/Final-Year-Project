<?php  
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once "connection.php"; 
$nama_aktv=$_POST['nama_aktv'];
$pnrgn_aktv=$_POST['pnrgn_aktv'];
$harga_aktv=$_POST['harga_aktv'];
$masa_aktv=$_POST['masa_aktv'];
$id_aktv  =  $_POST['id_aktv'];
$image = $_FILES['image'];
    
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpg', 'jpeg','png', '');
    
    if(in_array($fileActualExt, $allowed)){
            if ($fileSize < 1000000){
                $fileNameNew = "aktv".$nama_aktv.".".$fileActualExt;
                $fileDestination = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                 $sql = "UPDATE aktiviti SET pnrgn_aktv='".$pnrgn_aktv."', nama_aktv='".$nama_aktv."',  harga_aktv='".$harga_aktv."', masa_aktv='".$masa_aktv."', aktvimg = 0 WHERE id_aktv ='".$id_aktv."'";
                
                $result = mysqli_query($con, $sql);
                echo"<script>alert('Aktiviti berjaya dikemaskini!')</script>";
                echo"<script>window.open('aindexadmin.php?asenaraiaktiviti','_self')</script>"; 
            }else{
                 echo"<script>alert('Fail terlalu besar!')</script>";
                echo"<script>window.open('javascript:history.go(-1)','_self')</script>";    
            }   
    }else{
         echo"<script>alert('Fail gagal dimuatnaik!')</script>";
                echo"<script>window.open('javascript:history.go(-1)','_self')</script>";    
    }
 
    }else{   
        } 
ob_start();
?>

<html>
<head>
<title>Kemaskini Maklumat Aktiviti</title>
    <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
<section>
<div class="container">
<div class="row" style="width: 100%;padding: 0px 0px; margin-left:0px;">
  <form action="aeditaktiviti.php" method="post" id="frmKemaskini" style="background:#F0F0F0;" enctype="multipart/form-data">
      <a href="aindexadmin.php?asenaraiaktiviti" style="color: red; float:left;"><i class="fas fa-angle-double-left"></i> Kembali</a><br>
       <?php
      include "connection.php";
$id = $_GET['id'];
$sql = "select * from aktiviti where id_aktv = '$id'";
    if($result = mysqli_query($con,$sql)){
        if(mysqli_num_rows($result)>0){
            $bil=1;
            while($row=mysqli_fetch_array($result)){
            $nama_aktv=$row['nama_aktv'];
                ?>
			<div><center><label><h2>KEMASKINI MAKLUMAT AKTIVITI</h2></label></center></div>
			<table style="margin-left:200px;" border="0">
            <tr>
			<td>ID Aktiviti*</td>
			<td>:  <input name="id_aktv" type="hidden" class="input-field" value="<?php echo htmlentities($row['id_aktv']);?>" ><?php echo htmlentities($row['id_aktv']);?></td>
			</tr>
            <tr>
			<td>Nama Aktiviti</td>
			<td>: <input name="nama_aktv" type="text" class="input-field" value="<?php echo htmlentities($row['nama_aktv']);?>" required></td>
            </tr>
			<tr>
			<td>Harga Aktiviti</td>
			<td>:  <input name="harga_aktv" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['harga_aktv']);?>" required></td>
			</tr>
			<tr>
			<td>Masa Aktiviti</td>
			<td>:  <input name="masa_aktv" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['masa_aktv']);?>" required></td>
			</tr>
			<tr>
			<td>Penerangan Aktiviti&emsp;:</td>
			<td> <textarea type="text" name="pnrgn_aktv" class="input-field" cols="40" rows="4" ><?=$row['pnrgn_aktv'];?></textarea></td>
			</tr>
            <tr>
			<td>Gambar &emsp;&emsp;:</td>
            <td> <?php if($row['aktvimg'] == 0){
                    echo"<img style='width:100px; heigh:100px;'  src='upload/aktv".$nama_aktv.".jpg?'".mt_rand().">";
                }?>
                <br><br><input type="file" name="image" /></td>
            </tr>

			</table>
			<div class="field-group">
			<div><center><input class="registerbutton" type="submit" name="kemaskini" value="Kemaskini" /></center></div>
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