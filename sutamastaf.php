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
    <title>maklumat staf</title>
     <link rel="stylesheet" href="pstylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <style>
        #img_div{
width:80%;
padding:5px;
margin:15px auto;
border:1px solid #cbcbcb;
}
#img_div:after{
content:"";
display: block;
clear:both;
}
img{
float:left;
margin:5px;
width:200px;
height:150px;
}
</style>
</head>
    <body>
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
            <div class="row" style="width: 100%;padding: 0px 0px; margin-left:0px;">
            <div id="frmBayar">
            <center><label><h2>MAKLUMAT STAF</h2></label></center>
                    <?php
            require('connection.php');
            $sql ="SELECT * FROM staf WHERE emel_staf = '$emel_staf'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
            $bil=1;
            while($row=mysqli_fetch_array($result)){
                 $nama_staf=$row['nama_staf'];?>
          <center><table border="0">
                <tr>
                    <td>
            <?php if($row['imgstaf'] == 0){
                    echo"<img style='width:230px; heigh:150px;'  src='profile/prof".$nama_staf.".jpg?'".mt_rand().">";
                }else{ echo"<img style='width:230px; heigh:150px;' src='profile/profdefault.png'>";}?>
                </td></tr>
                    <tr>
                <td><b>ID Staf</b></td>
                <td>: <b><?php echo $row ["id_staf"];?></b></td>
                </tr>
                <tr>
                <td>Nama Penuh</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_staf"];?></td>
                </tr>
                <tr>
                <td>No Kad Pengenalan</td>
                <td style="font-weight: normal;">: <?php echo $row ["nokp_staf"];?></td>
                </tr>
                <tr>
                <td>Jawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["jawatan_staf"];?></td>
                </tr>
                <tr>
                <td>No. Tel. Pejabat</td>
                <td style="font-weight: normal;">: <?php echo $row ["notelpej_staf"];?></td>
                </tr>
                <tr>
                <td>No. Tel. Bimbit</td>
                <td style="font-weight: normal;">: <?php echo $row ["notel_staf"];?></td>
                </tr>
                <tr>
                <td>Emel Pengguna*</td>
                <td style="font-weight: normal;">: <?php echo $row ["emel_staf"];?></td>
                </tr>
                    <tr>
                <td>Status</td>
                <td style="font-weight: normal;">: <?php echo $row ["pengguna"];?></td>
                </tr>
                </table></center> <br><center><a href="seditstaf.php?id=<?php echo $row['emel_staf'] ?>"><i class="fas fa-edit"></i>KEMASKINI</a></center>
                 <br><br>
            <?php }} ?>
                </div>
            </div>
                </div>
             </section>
        <br><br>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
    </body>
</html>