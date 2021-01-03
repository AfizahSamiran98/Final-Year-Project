<?php  
include 'registerfunction.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "Anda Perlu Log Masuk Kedalam Sistem Terlebih Dahulu."; 
    header ('location: plogmasukpengguna.php'); 
}
$emel_plgn=$_SESSION['emel_plgn'];

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
		$_SESSION['emel_plgn'] = $emel_plgn;  
     echo"<script>alert('Maklumat Berjaya Dikemaskini!')</script>";
                echo"<script>window.open('pakaunpengguna.php','_self')</script>";
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
               echo"<script>window.open('pakaunpengguna.php','_self')</script>";   
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
<title>Kemaskini Maklumat Pengguna</title>
    <link rel="stylesheet" href="pstylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
<section>
<div class="header">
  <header><img class="img" src="images/logo.png" align="left"><br><br>SISTEM TEMPAHAN LAWATAN KOMPLEKS KRAF JOHOR<br>PERBADANAN KEMAJUAN KRAFTANGAN MALAYSIA KEMENTERIAN PELANCONGAN, SENI DAN BUDAYA</header>
</div>
  <div style="float:left;" class="navbar">
  <a href="putamapenggunaberjaya.php"><i class="fa fa-fw fa-home"></i> Utama</a> 
  <div style="float:left;" class="dropdown">
  <button class="dropbtn"><i class="fas fa-user-circle"></i>Akaun Pengguna</button>
  <div class="dropdown-content">
  <a href="pakaunpengguna.php">Maklumat Pengguna</a>
  <a href="pkemaskinimaklumat.php">Kemaskini Maklumat</a>
  </div>
  </div>
  <a href="paktivitipengguna.php"><i class="fas fa-images"></i> Aktiviti</a>
  <div style="float:left;" class="dropdown">
  <button class="dropbtn"><i class="fas fa-book"></i>Tempahan Lawatan</button>
  <div class="dropdown-content">
  <a href="ptempahanlawatan.php">Tempahan Baharu</a>
  <a href="psenaraitempahan.php">Senarai Tempahan</a>
  <a href="pkalendarlawatan.php">Kalendar Lawatan</a>
  </div>
  </div>
  <a href="#" id="myBtn"><i class="fas fa-phone"></i>Hubungi Kami</a>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>            <center>
Lot.PTB 20002, Jalan Chenderasari Off Jalan Datin Halimah
<br>80350 Larkin Johor
                <br>Tel:07-2350433/Faks:07-2350432</center><br>
                    <div id="map">
    <center><iframe width="60%" height="70%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.4536174986933!2d103.73222031511571!3d1.49862336149595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da6d60d596b711%3A0x215df3c511256a6b!2sKompleks%20Kraf%20Johor!5e0!3m2!1sen!2smy!4v1588873165014!5m2!1sen!2smy" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></center>
</div></p>
      </div></div>
  <I><a href="plogout.php" style="color: red;"><i class="fas fa-sign-out-alt"></i> Logout</a></I>
  <a><?php  if (isset($_SESSION['emel_plgn'])) : ?>
  <strong>
  <?php echo $_SESSION['nama_plgn']; ?></strong> (<i>pelanggan</i>)
  </a><?php endif ?>
  <a style="float:right;" href="https://www.instagram.com/komplekskrafjohor/"><i class="fab fa-instagram fa-2x"></i></a>
  <a style="float:right;"  href="https://twitter.com/krafmalaysia?lang=en"><i class="fab fa-twitter fa-2x"></i></a>
  <a style="float:right;" href="https://www.facebook.com/komplekskrafjohor/"><i class="fab fa-facebook fa-2x"></i></a>          
</div>
    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</section>
<section>
<div class="container">
<div class="row" style="width: 100%;padding: 0px 0px; margin-left:0px;">
  <form action="pkemaskinimaklumat.php" method="post" enctype="multipart/form-data">
       <?php
    require_once "connection.php";
    $sql = "SELECT * FROM pelanggan where emel_plgn=\"$emel_plgn\" ";
    if($result = mysqli_query($con,$sql)){
        if(mysqli_num_rows($result)>0){
            $bil=1;
            while($row=mysqli_fetch_array($result)){
                $nama_plgn=$row['nama_plgn'];
                ?>
			<div><center><label><h2>KEMASKINI MAKLUMAT PENGGUNA</h2></label></center></div>
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
			<div><center><input class="registerbutton" type="submit" name="kemaskinimaklumat" value="Kemaskini" ></center></div>
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