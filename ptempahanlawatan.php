<?php  
include 'registerfunction.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "Anda Perlu Log Masuk Kedalam Sistem Terlebih Dahulu."; 
    header ('location: plogmasukpengguna.php'); 
}
$emel_plgn=$_SESSION['emel_plgn'];

?> 
<?php
$msg = " ";
    //if upload button is pressed
if (isset($_POST['upload'])){
    
    //get all the submitted data from the form
    $tajuk_lwtn = $_POST['tajuk_lwtn'];
    $tujuan_lwtn = $_POST['tujuan_lwtn'];
    $tarikh_lwtn = $_POST['tarikh_lwtn'];
    $masa_lwtn = $_POST['masa_lwtn'];
    $jumlah_urusetia = $_POST['jumlah_urusetia'];
    $jumlah_plwt = $_POST['jumlah_plwt'];
    $id_aktv = $_POST['id_aktv'];
    $emel_plgn = $_POST['emel_plgn'];
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
    
    $allowed = array('pdf');
    
    $sql = "SELECT * FROM lawatan WHERE tajuk_lwtn='$tajuk_lwtn'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 0){
        if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if ($fileSize < 1000000){
                $sql = "INSERT INTO lawatan (tajuk_lwtn,tujuan_lwtn,tarikh_lwtn,masa_lwtn,jumlah_urusetia,jumlah_plwt,id_aktv,document, emel_plgn, jumlah_lwtn, jumlah_byrn) VALUES ('".$tajuk_lwtn."','".$tujuan_lwtn."','".$tarikh_lwtn."',' ".$masa_lwtn."',' ".$jumlah_urusetia."',' ".$jumlah_plwt."','".$id_aktv."','0','".$emel_plgn."','".$jumlah_lwtn."','".$jumlah_byrn."')";

                $insert= mysqli_query($con, $sql);
                $fileNameNew = "D".$tajuk_lwtn.".".$fileActualExt;
                $fileDestination = 'filelawatan/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo"<script>alert('Tempahan berjaya ditambah!')</script>";
                echo"<script>window.open('psenaraitempahan.php','_self')</script>";
            }else{
                 echo"<script>alert('Fail yang dimuatnaik terlalu besar!')</script>";
                echo"<script>window.open('javascript:history.go(-1)')</script>";
            }   
        } else{
             echo"<script>alert('Terdapat ralat semasa memuat naik fail!')</script>";
                echo"<script>window.open('javascript:history.go(-1)')</script>";
        }
    }else{
             echo"<script>alert('Sila muatnaik fail dengan format pdf sahaja!')</script>";
                echo"<script>window.open('javascript:history.go(-1)')</script>";
    }
    } else{
          echo"<script>alert('Sila gunakan tajuk tempahan yang lain.')</script>";
          echo"<script>window.open('ptempahanlawatan.php','_self')</script>";
    }
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
<div class="container" style="width: 100%;">
<div class="row" style="width: 100%;">
  <div class="column" style="width: 35%; padding: 35px 0px;  ">
  <div id="frmArahan">
  <table>
  <tr>
  <td><b>Arahan Tempahan Lawatan</b>
  <ol>
  <li>Pengguna haruslah mengisi setiap ruang yang telah disediakan dengan mengikut format contoh yang telah diberi.</li>
  <li>Pengguna haruslah memastikan bahawa maklumat tempahan yang diisi adalah sah dan benar.</li>
  <li>Tempahan lawatan haruslah dibuat selewat-lewatnya 14 hari bekerja  sebelum tarikh lawatan.</li>
  <li>Surat tempahan lawatan rasmi haruslah dimuatnaik dalam bentuk pdf.</li>
  <li>Tempahan lawatan yang tidak lengkap, tidak akan diproses.</li>
  </ol>
  </td>
  </tr>
  </table>
  </div>
  </div>
  
    <div class="column" style="width: 65%; padding: 0px 0px; margin-left:0px;">
  <form action="ptempahanlawatan.php" method="post" id="frmRegister" enctype="multipart/form-data">
			<div><center><label><h2>TEMPAHAN LAWATAN BAHARU</h2></label></center></div>
			<table border="0">
            <?php 
                $select= "select * FROM pelanggan WHERE emel_plgn = '$emel_plgn'";
                $selected = mysqli_query($con,$select);
                while($row = mysqli_fetch_array($selected)):;?> 
            <input type="hidden" name="emel_plgn" value="<?php echo $row['emel_plgn'];?>">
            <?php endwhile;?>
			<td>Tajuk Lawatan</td>
			<td>: <input name="tajuk_lwtn" type="text" placeholder="tajuk lawatan" class="input-field" required></td>
			<tr>
			<td>Tujuan Lawatan&emsp;&emsp;&emsp;:</td>
                <td><textarea name="tujuan_lwtn" type="text" placeholder="tujuan lawatan" class="input-fieldnum" style="width:100%;" rows="4" required></textarea></td>
			</tr>
			<tr>
			<td>Tarikh Lawatan</td>
			<td>: <input class="input-field" type="date" name="tarikh_lwtn" ></td>
			</tr>
			<tr>
			<td>Masa Lawatan</td>
			<td>  <div class="select-wrap one-third">
                : <select name="masa_lwtn" id="masa_lwtn" class="input-field" >
                    <option value="">Pilih Masa Lawatan</option>
                    <option value="09.00am-04.00pm">
                        09.00am - 04.00pm</option>
                    <option value="10.00am-05.00pm">
                        10.00am - 05.00pm</option>
					<option value="11.00am-06.00pm">
                        11.00am - 06.00pm</option>
                </select>
                </div></td>
			</tr>
            <tr>
            <td>Jumlah Urus setia</td>
            <td>: <input name="jumlah_urusetia" type="text" placeholder="jumlah urus setia" class="input-fieldnum" required></td>
            </tr>
            <tr>
            <td>Jumlah Pelawat</td>
            <td>: <input name="jumlah_plwt" type="text" placeholder="jumlah pelawat" class="input-fieldnum" required></td>
			</tr>
			<tr>
            <td>Aktiviti Lawatan</td>
			<td><div class="select-wrap one-third">
                : <select name="id_aktv" class="input-field">
                <option value="">Pilih Aktiviti</option>
                <?php 
                $select= "select * FROM aktiviti";
                $selected = mysqli_query($con,$select);
                while($row = mysqli_fetch_array($selected)):;?>
                <option value="<?php echo $row['id_aktv'];?>">
                <?php echo $row['nama_aktv'];?></option>
                <?php endwhile;?>
                </select>
                </div>
            </td>
			</tr>
            <tr>
			<td>Fail</td>
            <td>: <input type="file" name="document"/></td>
            </tr>
			<tr>
			</table>
			<div class="field-group">
			<div><center><input class="registerbutton" type="submit" name="upload" value="Tambah >>" ></center></div>
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
