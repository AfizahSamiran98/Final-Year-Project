<?php  
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once "connection.php"; 
    $id_lwtn = $_POST['id_lwtn'];
    $tajuk_lwtn = $_POST['tajuk_lwtn'];
    $tujuan_lwtn = $_POST['tujuan_lwtn'];
    $tarikh_lwtn = $_POST['tarikh_lwtn'];
    $masa_lwtn = $_POST['masa_lwtn'];
    $jumlah_urusetia = $_POST['jumlah_urusetia'];
    $jumlah_plwt = $_POST['jumlah_plwt'];
    $id_aktv = $_POST['id_aktv'];
    $emel_staf = $_POST['emel_staf'];
    $status_lwtn = $_POST['status_lwtn'];
    $document = $_FILES['document'];
    
    $sel = "SELECT harga_aktv FROM aktiviti WHERE id_aktv='$id_aktv'";
    $query = mysqli_query($con, $sel);
    $row = mysqli_fetch_row($query);
    $harga_aktv=$row['0'];
    $jumlah_lwtn  = $jumlah_urusetia + $jumlah_plwt;
    $jumlah_byrn = $jumlah_lwtn * $harga_aktv;
    
    $fileName = $_FILES['document']['name'];
    $fileTmpName = $_FILES['document']['tmp_name'];
    $fileSize = $_FILES['document']['size'];
    $fileError = $_FILES['document']['error'];
    $fileType = $_FILES['document']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('pdf', '');
    
    if(in_array($fileActualExt, $allowed)){
            if ($fileSize < 1000000){
                $fileNameNew = "D".$tajuk_lwtn.".".$fileActualExt;
                $fileDestination = 'filelawatan/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                 $sql = "UPDATE lawatan SET tajuk_lwtn='".$tajuk_lwtn."', tujuan_lwtn='".$tujuan_lwtn."',  tarikh_lwtn='".$tarikh_lwtn."', masa_lwtn ='".$masa_lwtn ."',jumlah_urusetia ='".$jumlah_urusetia ."',jumlah_plwt ='".$jumlah_plwt ."',id_aktv ='".$id_aktv ."',emel_staf ='".$emel_staf ."',status_lwtn ='".$status_lwtn ."',jumlah_lwtn ='".$jumlah_lwtn."',jumlah_byrn ='".$jumlah_byrn."', document = 0 WHERE id_lwtn ='".$id_lwtn."'";
                $result = mysqli_query($con, $sql);
                
                $sqlsel = "SELECT * FROM lawatan WHERE id_lwtn ='".$id_lwtn."'LIMIT 1";
                $results = mysqli_query($con, $sqlsel); 
                // Prepare a select statement
                if (mysqli_num_rows($results) == 1) {
                $status = mysqli_fetch_assoc($results);
                if($status['status_lwtn'] == 'Lulus'){
                echo"<script>alert('tempahan berjaya dikemaskini!')</script>";
                echo"<script>window.open('aindexadmin.php?asenaraitempahan','_self')</script>"; }else{
                    echo"<script>alert('tempahan berjaya dikemaskini!')</script>";
                echo"<script>window.open('aindexadmin.php?akemaskinitempahan','_self')</script>";
            }}}else{
               echo"<script>alert('Fail terlalu besar!')</script>";
                echo"<script>window.open('javascript:history.go(-1)','_self')</script>";    
            }   
    }else{
        echo"<script>alert('Fail tidak dapat dimuatnaik!')</script>";
                echo"<script>window.open('javascript:history.go(-1)','_self')</script>";   
    }
 
    }else{   
        } 
ob_start();
?>

<html>
<head>
<title>Kemaskini Maklumat Tempahan</title>
    <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
<section>
<div class="container">
<div class="row" style="width: 100%;padding: 0px 0px; margin-left:0px;">
  <form action="aedittempahan.php" method="post" id="frmKemaskini" enctype="multipart/form-data">
      <a href="javascript:history.go(-1)" title="Return to previous page" style="color: red; float:left;"><i class="fas fa-angle-double-left"></i> Kembali</a></br>
       <?php
      include "connection.php";
$id = $_GET['id'];
$sql ="SELECT * FROM lawatan LEFT JOIN aktiviti
                    ON aktiviti.id_aktv = lawatan.id_aktv
                    LEFT JOIN staf
                    ON staf.emel_staf = lawatan.emel_staf
                    LEFT JOIN pelanggan
                    ON pelanggan.emel_plgn = lawatan.emel_plgn
                    WHERE id_lwtn = '$id'";
    if($result = mysqli_query($con,$sql)){
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
            $tajuk_lwtn=$row['tajuk_lwtn'];
                ?>
			<div><center><label><h2>KEMASKINI MAKLUMAT TEMPAHAN</h2></label></center></div>
			<table style="margin-left:200px;" border="0">
            <tr>
			<td>ID Lawatan*</td>
			<td>:  <input name="id_lwtn" type="hidden" class="input-field" value="<?php echo htmlentities($row['id_lwtn']);?>" ><?php echo htmlentities($row['id_lwtn']);?></td>
			</tr>
			<tr>
			<td>Nama Pemohon</td>
			<td style="font-weight: normal;">: <?php echo $row ["nama_plgn"];?></td>
			</tr>
			<tr>
			<td>Tajuk Lawatan</td>
			<td>:  <input name="tajuk_lwtn" type="text" class="input-fieldnum" value="<?php echo htmlentities($row['tajuk_lwtn']);?>" required></td>
			</tr>
			<tr>
			<td>Tujuan Lawatan&emsp;:</td>
			<td> <textarea type="text" name="tujuan_lwtn" class="input-field" cols="40" rows="4" ><?=$row['tujuan_lwtn'];?></textarea></td>
			</tr>
             <input class="input-field" type="hidden" name="tarikh_lwtn" value="<?php echo htmlentities($row['tarikh_lwtn']);?>" >
             <tr>
			<td>Masa Lawatan</td>
			<td>  <div class="select-wrap one-third">
                : <select name="masa_lwtn" id="masa_lwtn" class="input-field" >
                    value="<option ><?php echo htmlentities($row['masa_lwtn']);?></option>"
                    <option value="09.00am-04.00pm">
                        09.00am - 04.00pm</option>
                    <option value="10.00am-05.00pm">
                        10.00am - 05.00pm</option>
					<option value="11.00am-06.00pm">
                        11.00am - 06.00pm</option>
                </select>
                </div></td>
            </tr>
                <input name="jumlah_urusetia" type="hidden" class="input-field" value="<?php echo htmlentities($row['jumlah_urusetia']);?>" required>
                <input name="jumlah_plwt" type="hidden" class="input-field" value="<?php echo htmlentities($row['jumlah_plwt']);?>" required>
                <input name="id_aktv" type="hidden" class="input-field" value="<?php echo htmlentities($row['id_aktv']);?>" required>
                <input name="status_lwtn" type="hidden" class="input-field" value="<?php echo htmlentities($row['status_lwtn']);?>" required>
                <input name="emel_staf" type="hidden" class="input-field" value="<?php echo htmlentities($row['emel_staf']);?>" required>
            <tr>
			<td>Dokumen Permohonan&emsp;:</td>
            <td>  <?php if($row['document'] == 0){
                    echo"<a style='width:200px; heigh:150px;'  href='filelawatan/D".$tajuk_lwtn.".pdf?'".mt_rand()." target='_blank'><i class='far fa-file-word fa-3x'></i></a>"; }?>
                <br><br><input type="file" name="document" /></td>
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
</body>
</html>