
<html>
<head>
    <title>senarai tempahan lawatan</title>
     <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
    <body>
         <div id='bodyright'>
            <section>
        <div class="container">
            <a style="float:left;"><?php  if (isset($_SESSION['user'])) : ?> <strong>
    <?php echo $_SESSION['user']['nama_staf']; ?></strong>
    <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a>
    <?php endif ?>
   <I><a href="logout.php" style="color: red; float:right;"><i class="fas fa-sign-out-alt"></i> Logout</a></I><br/><br/>
            <div><label><h2>SENARAI TEMPAHAN LAWATAN</h2></label></div>
            <hr color="black" align="center" width="100%"><br>
                      <table id="customers">
                <?php
            require('connection.php');
            $sql ="SELECT * FROM lawatan WHERE status_lwtn = 'lulus' AND status_byrn = 'Tidak' ORDER BY id_lwtn ASC";
            $result = mysqli_query($con,$sql);
            $bil = 1;
            while($row = mysqli_fetch_array($result)){?>
            <?php 
            $tajuk_lwtn=$row['tajuk_lwtn'];?>
                <tr>
                <td><?php echo $bil++ ?></td>
                <td><?php echo $row ["tajuk_lwtn"];?></td>
                    <td><p style="font-weight: normal;"><?php echo $row ["tarikh_lwtn"];?></p></td>
                    <td><p style="font-weight: normal;"><?php echo $row ["masa_lwtn"];?></p></td>
                    <td><p style="font-weight: normal;">Status: <?php echo $row ["status_lwtn"];?></p></td>
                <td><p><a href="apapartempahan.php?id=<?php echo $row["id_lwtn"];?>"><i class="fas fa-book"></i> </a>&emsp;<a href="aedittempahan.php?id=<?php echo $row['id_lwtn'] ?>"><i class="fas fa-edit"></i> </a>&emsp;<a href="apadamtempahan.php?id=<?php echo $row["id_lwtn"];?>"><i class="fas fa-trash-alt"></i></a></p></td>
                </tr>
                                <?php } ?>
                </table>
                </div>
             </section>
        </div>
         <div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
    </body>
</html>

<?php

 if(isset($_GET['apapartempahan'])){
	include("apapartempahan.php");
	}
?>
