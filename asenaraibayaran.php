
<html>
<head>
    <title>senarai bayaran</title>
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
            <div><label><h2>SENARAI PEMBAYARAN</h2></label></div>
            <hr color="black" align="center" width="100%"><br>
                      <table id="customers">
                <?php
            require('connection.php');
            $sql ="SELECT * FROM lawatan WHERE status_byrn = 'Berjaya' ORDER BY id_lwtn ASC";
            $result = mysqli_query($con,$sql);
            $bil = 1;
            while($row = mysqli_fetch_array($result)){?>
            <?php 
            $tajuk_lwtn=$row['tajuk_lwtn'];?>
                <tr>
                <td><?php echo $bil++ ?>. </td>
                <td><?php echo $row ["tajuk_lwtn"];?></td>
                    <td><p><a href="apaparlawatan.php?id=<?php echo $row["id_lwtn"];?>"><i class="fas fa-book"></i></a></p></td>
                </tr>
                                <?php } ?>
                </table>
                </div>
             </section>
        </div>
    </body>
</html>

<?php

 if(isset($_GET['apapartempahan'])){
	include("apapartempahan.php");
	}
?>
