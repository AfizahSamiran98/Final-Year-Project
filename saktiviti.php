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
     <style>
        #img_div{
width:100%;
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
            <div class="row" >
                <div><center><label><h2>SENARAI AKTIVITI</h2></label></center></div>
                    <?php
            require('connection.php');
            $sql ="SELECT * FROM aktiviti";
            $result = mysqli_query($con,$sql);
            $i=0;
            while($row = mysqli_fetch_array($result)){?>
            <?php 
            $nama_aktv=$row['nama_aktv'];
                if($i % 2 == 0){?>
                 <table id="customers">
                <tr>
                <td>
                <div class="column" style="width: 65%; padding: 0px 0px; margin-left:20px;">
                <?php if($row['aktvimg'] == 0){
                    echo"<img style='width:200px; heigh:150px;'  src='upload/aktv".$nama_aktv.".jpg?'".mt_rand().">";
                }?>
                </div>
                <div class="column" style="width: 65%; padding: 0px 0px; margin-left:20px;text-align: justify; font-weight: normal;">
                <b><?php echo $row ["nama_aktv"];?><br></b>
                RM <?php echo $row ["harga_aktv"];?><br>
                <?php echo $row ["masa_aktv"];?><br>
                <?php echo $row ["pnrgn_aktv"];?>
                        </div></td> <?php }else{?>
                    <td>
                <div class="column" style="width: 65%; padding: 0px 0px; margin-left:20px;">
                <?php if($row['aktvimg'] == 0){
                    echo"<img style='width:200px; heigh:150px;'  src='upload/aktv".$nama_aktv.".jpg?'".mt_rand().">";
                }?>
                </div>
                <div class="column" style="width: 65%; padding: 0px 0px; margin-left:20px;text-align: justify; font-weight: normal;">
                <b><?php echo $row ["nama_aktv"];?><br></b>
                RM <?php echo $row ["harga_aktv"];?><br>
                <?php echo $row ["masa_aktv"];?><br>
                <?php echo $row ["pnrgn_aktv"];?>
                        </div></td> 
                </tr>
                </table>

            <?php } $i++; } ?>
                </div>
        </div>
             </section>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>