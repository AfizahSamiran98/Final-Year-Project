<?php
require('connection.php');
include('registerfunction.php'); 
?>
<html>
<head>
<title>Daftar Pengguna Baharu</title>
    <link rel="stylesheet" href="pstylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
    <section>
<div class="header">
  <header><img class="img" src="images/logo.png" align="left"><br><br>SISTEM TEMPAHAN LAWATAN KOMPLEKS KRAF JOHOR<br>PERBADANAN KEMAJUAN KRAFTANGAN MALAYSIA KEMENTERIAN PELANCONGAN, SENI DAN BUDAYA</header>
</div>
  <div class="navbar">
  <a href="putamapengguna.php"><i class="fa fa-fw fa-home"></i> Utama</a>  
  <a href="paktivitipengguna1.php"><i class="fas fa-images"></i> Aktiviti</a> 
  <a href="ptempahanlawatan1.php"><i class="fas fa-book"></i> Tempahan Lawatan</a>
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
  </div>

</div>
  <div class="dropdown">
  <button class="dropbtn"><i class="fa fa-fw fa-user "></i> Log Masuk</button>
  <div class="dropdown-content">
  <a href="plogmasukpengguna.php">Pengguna</a>
  <a href="logmasukstaf.php">Staf KKJ</a>
  </div>
  </div>
  <a href="pdaftarpengguna.php"><i class="fas fa-user-plus"></i> Daftar Pengguna</a>
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
  <td>Arahan Pendaftaran
  <ol>
  <li>Pendaftar haruslah mengisi setiap ruang yang telah disediakan dengan mengikut format contoh yang telah diberi.</li>
  <li>Pendaftar mestilah memastikan bahawa maklumat yang diberi adalah benar dan sah bagi memudahkan pihak KKJ menghubungi pendaftar.</li>
  <li>Institut di sini merupakan tempat pendaftar bekerja. Sebagai contoh <b>"1VISIT MALAYSIA TRAVEL SDN BHD"</b>.</li>
  <li>Emel pendaftar akan digunakan sebagai ID log masuk pengguna.</li>
  <li>Pendaftar diingatkan untuk tidak mendaftar akaun pengguna untuk orang lain.</li>
   <li>Sekiranya pendaftar sudah mendaftar, pendaftar boleh log masuk ke dalam sistem melalui pautan dibawah. <p>&nbsp; <a href="plogmasukpengguna.php" ><i class="fas fa-sign-in-alt"></i>&nbsp; LOG MASUK PENGGUNA</a></p>.</li>
  </ol>
  </td>
  </tr>
  </table>
  </div>
  </div>
  
  <div class="column" style="width: 65%; padding: 0px 0px; margin-left:0px;">
  <form action="pdaftarpengguna.php" method="post" id="frmRegister">
			<div><center><label><h2>DAFTAR PENGGUNA BAHARU</h2></label></center></div>
			<div class="error-message"><?php echo display_error(); ?></div>
			<table border="0">
			<td>Nama Penuh</td>
			<td>: <input name="nama_plgn" type="text" placeholder="nama penuh" class="input-field" value="<?php echo $nama_plgn; ?>" required></td>
			<tr>
			<td>No Kad Pengenalan</td>
			<td>: <input name="nokp_plgn" type="text" placeholder="contoh 980604015470" class="input-fieldnum" value="<?php echo $nokp_plgn; ?>" required></td>
			</tr>
			<tr>
			<td>Institut</td>
			<td>: <input name="institut_plgn" type="text" placeholder="institut" class="input-field" value="<?php echo $institut_plgn; ?>" required></td>
			</tr>
			<tr>
			<td>Jawatan</td>
			<td>: <input name="jawatan_plgn" type="text" placeholder="jawatan" class="input-fieldnum" value="<?php echo $jawatan_plgn; ?>" required></td>
			</tr>
			<tr>
			<td>No. Tel. Pejabat</td>
			<td>: <input name="notelpej_plgn" type="text" placeholder="contoh 0312345678" class="input-fieldnum" value="<?php echo $notelpej_plgn; ?>" required></td>
			</tr>
			<tr>
			<td>No Faks Pejabat</td>
			<td>: <input name="nofax_plgn" type="text" placeholder="contoh 0912345678" class="input-fieldnum" value="<?php echo $nofax_plgn; ?>" required></td>
			</tr>
			<tr>
			<td>No. Tel. Bimbit</td>
			<td>: <input name="notel_plgn" type="text" placeholder="contoh 0177889684" class="input-fieldnum" value="<?php echo $notel_plgn; ?>" required></td>
			</tr>
			<tr>
			<td>Alamat Emel Pengguna*</td>
			<td>: <input name="emel_plgn" type="text" placeholder="emel" class="input-field" value="<?php echo $emel_plgn; ?>" ></td>
			</tr>
			<tr>
			<td>Kata Laluan*</td>
			<td>: <input name="katalaluan_plgn1" type="text" placeholder="kata laluan" class="input-fieldnum" ></td>
			</tr>
			<tr>
			<td>Ulang Kata Laluan*</td>
			<td>: <input name="katalaluan_plgn2" type="text" placeholder="kata laluan" class="input-fieldnum" ></td>
			</tr>
			</table>
			<div class="field-group">
			<div><center><input class="registerbutton" type="submit" name="daftarpengguna" value="Daftar >>" ></center></div>
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