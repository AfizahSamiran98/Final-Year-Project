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
?> 

<html>
<head>
<title>Aktiviti</title>
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
<div class="container">
<div class="row" style="width: 100%;padding: 0px 0px; margin-left:0px;">
  <div id="frmBayar">
           <?php
            require('connection.php');
            $sql ="SELECT * FROM lawatan WHERE emel_staf=\"$emel_staf\" ORDER BY id_lwtn ASC";
            $result = mysqli_query($con,$sql);
               if(mysqli_num_rows($result)>0){?>
            <label><h1><b>SENARAI LAWATAN</b></h1></label>
            <hr color="black" align="center" width="100%">
            <table id="customers">
            <?php $bil = 1; ?>
            <?php while($row = mysqli_fetch_array($result)){
            $tajuk_lwtn=$row['tajuk_lwtn'];?>
                <tr>
                <td><?php echo $bil++ ?></td>
                <td><?php echo $row ["tajuk_lwtn"];?></td>
                    <td><p style="font-weight: normal;"><?php echo $row ["tarikh_lwtn"];?></p></td>
                    <td><p style="font-weight: normal;"><?php echo $row ["masa_lwtn"];?></p></td>
                <td><a href="spapartempahan.php?id=<?php echo $row["id_lwtn"];?>"><i class="fas fa-book"></i> </a></td>
                </tr>
                      <?php } }else
        echo "<label><h1><b>TIADA REKOD LAWATAN</b></h1></label>";
        ?>          
                </table>
      <br/>
      
      
      </div>
      </div>
</div>
</section>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>