<?php  
include 'registerfunction.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "Anda Perlu Log Masuk Kedalam Sistem Terlebih Dahulu."; 
    header ('location: plogmasukpengguna.php'); 
}
ob_start();
?> 

<html>
<head>
<title>Papar Tempahan Lawatan</title>
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
  <form action="" method="post" id="frmKemaskini">
       <a href="javascript:history.go(-1)" style="color: red; float:left;"><i class="fas fa-angle-double-left"></i> Kembali</a><br>
            <div><center><label><h2>MAKLUMAT TEMPAHAN LAWATAN</h2></label></center></div>
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
            $tajuk_lwtn=$row['tajuk_lwtn'];
            $nama_staf=$row['nama_staf'];?>
                <center><table>
                <tr>
                <td>Nama Pemohon</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_plgn"];?></td>
                </tr>
                <tr>
                <td>Tajuk Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["tajuk_lwtn"];?></td>
                </tr>
                <tr>
                <td>Tujuan Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["tujuan_lwtn"];?></td>
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
                <td>Jumlah Urus setia</td>
                <td style="font-weight: normal;">: <?php echo $row ["jumlah_urusetia"];?></td>
                </tr>
                <tr>
                <td>Jumlah Pelawat</td>
                <td style="font-weight: normal;">: <?php echo $row ["jumlah_plwt"];?></td>
                </tr>
                <tr>
                <td>Aktiviti Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_aktv"];?></td>
                </tr>
                <tr>
                <td>Status Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["status_lwtn"];?></td>
                </tr>
                <tr>
                <td>Staf bertugas</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_staf"];?></td>
                </tr>
                 <tr>
                <td>No Tel Staf</td>
                <td style="font-weight: normal;">: <?php echo $row ["notelpej_staf"];?></td>
                </tr>
                <tr>
                <td>Dokumen Permohonan&emsp;:</td>
                <td> 
                <?php if($row['document'] == 0){
                    echo"<a style='width:200px; heigh:150px;'  href='filelawatan/D".$tajuk_lwtn.".pdf?'".mt_rand()." target='_blank'><i class='far fa-file-word fa-3x'></i></a>";
                }?>
                </td>
                </tr>
                    </table> <br>
                    <?php 
                if($row['status_lwtn'] == 'Lulus'){
                $id_lwtn=$row['id_lwtn'];?>
                <a class="registerbutton" href="pbayarantempahan.php?id=<?php echo $row["id_lwtn"];?>">Bayar >></a>
            <?php }else{}  }} ?></center><br>
                </form>
                </div>
                </div>
</section>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>