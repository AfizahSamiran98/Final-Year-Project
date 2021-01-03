<?php  
session_start();
$emel_staf=$_SESSION['emel_staf'];
ob_start();
?>
<?php  
include 'connection.php';
include 'functiondaftar.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "You must log in first"; header ('location: logmasukstaf.php'); 
} 


ob_start();
?> 

<html>
<head>
<title>Kemaskini Maklumat Staf</title>
    <link rel="stylesheet" href="pstylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
    <section>
 <div class="header">
  <header><img class="img" src="images/logo.png" align="left"><br><br>SISTEM TEMPAHAN LAWATAN KOMPLEKS KRAF JOHOR<br>PERBADANAN KEMAJUAN KRAFTANGAN MALAYSIA KEMENTERIAN PELANCONGAN, SENI DAN BUDAYA</header>
</div>
<div style="float:left;" class="navbar">
  <a href="sutamastaf.php"><i class="fa fa-fw fa-home"></i> Utama</a>
  <a href="saktiviti.php"><i class="fas fa-images"></i> Aktiviti</a>
    <a href="skalendar.php"><i class="far fa-calendar-alt"></i> Kalendar Lawatan</a>
  <a href="ssenaraitempahan.php"><i class="fas fa-book"></i>Maklumat Lawatan</a>
  <a href="smaklumbalas.php"><i class="fas fa-comments"></i> Maklum Balas</a>
  <I><a href="plogout.php" style="color: red;"><i class="fas fa-sign-out-alt"></i> Logout</a></I>
  <a><?php  if (isset($_SESSION['user'])) : ?> <strong>
            <?php echo $_SESSION['user']['nama_staf']; ?></strong>
            <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a><?php endif ?>
  <a style="float:right;" href="https://www.instagram.com/komplekskrafjohor/"><i class="fab fa-instagram fa-2x"></i></a>
  <a style="float:right;"  href="https://twitter.com/krafmalaysia?lang=en"><i class="fab fa-twitter fa-2x"></i></a>
  <a style="float:right;" href="https://www.facebook.com/komplekskrafjohor/"><i class="fab fa-facebook fa-2x"></i></a>          
</div></section>
 <section>
        <div class="container" >
            <div id="frmKemaskini">
     <a href="javascript:history.go(-1)" title="Return to previous page" style="color: red; float:left;"><i class="fas fa-angle-double-left"></i> Kembali</a>
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
            $bil=1;
            while($row=mysqli_fetch_array($result)){
            $tajuk_lwtn=$row['tajuk_lwtn'];?>
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
                <td>Dokumen Permohonan&emsp;:</td>
                <td> 
                <?php if($row['document'] == 0){
                    echo"<a style='width:200px; heigh:150px;'  href='filelawatan/D".$tajuk_lwtn.".pdf?'".mt_rand()." target='_blank'><i class='far fa-file-word fa-3x'></i></a>";
                }?>
                </td>
                </tr>
                </table></center>
                 </br></br>
                </div>
            <?php }} ?>
                </div>
             </section>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>