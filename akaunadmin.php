<?php
$emel_staf=$_SESSION['emel_staf'];
ob_start();
?>
<?php  
include 'connection.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "You must log in first"; 
    header ('location: logmasukstaf.php'); 
}
?> 

<html>
<head>
<title>Akaun Admin</title>
    <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
    <div id='bodyright'>
<section>
<div class="container">
 <a style="float:left;"><?php  if (isset($_SESSION['user'])) : ?> <strong>
    <?php echo $_SESSION['user']['nama_staf']; ?></strong>
    <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a>
    <?php endif ?>
   <I><a href="logout.php" style="color: red; float:right;"><i class="fas fa-sign-out-alt"></i> Logout</a></I><br/><br/>
<div class="row">
  <div class="column" style="width: 60%; padding: 0px 0px; margin-left:200px;">
      <center><label><h1><b> MAKLUMAT PENGGUNA </b></h1></label></center><br/>
<form action="akaunadmin" method="post" style="width:100%;
padding:5px;

border:1px solid #cbcbcb;" >
    <?php
    $emel_staf=$_SESSION['emel_staf'];
    $sql = "SELECT * FROM staf where emel_staf=\"$emel_staf\" ";
    if($result = mysqli_query($con,$sql)){
        if(mysqli_num_rows($result)>0){
            $bil=1;
            while($row=mysqli_fetch_array($result)){
                  $nama_staf=$row['nama_staf'];
                ?>
            <table style="margin-left:50px;" border="0">
                  <tr>
                    <td>
            <?php if($row['imgstaf'] == 0){
                    echo"<img style='width:230px; heigh:150px;'  src='profile/prof".$nama_staf.".jpg?'".mt_rand().">";
                }else{ echo"<img style='width:230px; heigh:150px;' src='profile/profdefault.png'>";}?>
                </td></tr>
			<tr>
			<td>Nama Penuh</td>
			<td>: <?php echo htmlentities($row['nama_staf']);?></td>
			</tr>
			<tr>
			<td>No Kad Pengenalan</td>
			<td>: <?php echo htmlentities($row['nokp_staf']);?></td>
			</tr>
			<tr>
			<td>No Telefon</td>
			<td>: <?php echo htmlentities($row['notel_staf']);?></td>
			</tr>
			<tr>
			<td>Emel</td>
			<td>:<?php echo htmlentities($row['emel_staf']);?></td>
			</tr>
                <br>
            <tr><td><br></td></tr>
                <tr>
             <td></td>
                <td><a href="apaparstaf.php?id=<?php echo $row['emel_staf'];?>"><i class="fas fa-book"></i> PAPAR</a>&emsp;<a href="aeditstaf.php?id=<?php echo $row['emel_staf'] ?>"><i class="fas fa-edit"></i>KEMASKINI</a>
                    </td></tr>
			</table>
           <?php
            }
        }
    }
    ?>
    <br/>
</form>
    </div>
    </div>
    </div>
        </section>
    </div>


<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>