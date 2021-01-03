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
<title>Senarai Pelanggan</title>
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
    <h1>SENARAI PELANGGAN</h1><br/>
    
        <table id="customers">
            <tr>
                <td>Bilangan</td>
                <td>Nama</td>
                <td>No. Telefon</td>
                <td>Tindakan</td>
            </tr>
            <tr><td><hr color="black" align="center" width="100%"></td><td><hr color="black" align="center" width="100%"></td><td><hr color="black" align="center" width="100%"></td><td><hr color="black" align="center" width="100%"></td></tr>
            <?php
            
            
            $sql= "select * FROM pelanggan";
            $query = mysqli_query($con,$sql);
            $bil = 1;
            while($row = mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $bil++ ?></td>
                    <td><?php echo $row["nama_plgn"]; ?></td>
                    <td><?php echo $row["notel_plgn"]; ?></td>
                    <td>
                        <a href="apaparpelanggan.php?id=<?php echo $row['emel_plgn'];?>"><i class="fas fa-book"></i> </a>&emsp;<a href="aeditpelanggan.php?id=<?php echo $row['emel_plgn'] ?>"><i class="fas fa-edit"></i> </a>&emsp;<a href="apadampelanggan.php?id=<?php echo $row["emel_plgn"]; ?>"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</section>
</div>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>