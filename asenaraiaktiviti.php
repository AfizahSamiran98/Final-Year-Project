
<html>
<head>
    <title>senarai aktiviti lawatan</title>
     <link rel="stylesheet" href="stylesendiri.css">
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
         <div id='bodyright'>
            <section>
        <div class="container">
            <a style="float:left;"><?php  if (isset($_SESSION['user'])) : ?> <strong>
    <?php echo $_SESSION['user']['nama_staf']; ?></strong>
    <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a>
    <?php endif ?>
   <I><a href="logout.php" style="color: red; float:right;"><i class="fas fa-sign-out-alt"></i> Logout</a></I><br/><br/>
            <div><center><label><h2>SENARAI AKTIVITI</h2></label></center></div>
                    <?php
            require('connection.php');
            $sql ="SELECT * FROM aktiviti ORDER BY id_aktv ASC";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result)){?>
            <?php 
            $nama_aktv=$row['nama_aktv'];?>
                <div id='img_div'>
                <table >
                <tr>
                <td>
                <?php if($row['aktvimg'] == 0){
                    echo"<img style='width:200px; heigh:150px;'  src='upload/aktv".$nama_aktv.".jpg?'".mt_rand().">";
                }?>
                <p><?php echo $row ["nama_aktv"];?></p>
                <p style="font-weight: normal;"><?php echo $row ["harga_aktv"];?></p>
                <p style="font-weight: normal;"><?php echo $row ["masa_aktv"];?></p>
                <p style="font-weight: normal;"><?php echo $row ["pnrgn_aktv"];?></p>
                <a href="aeditaktiviti.php?id=<?php echo $row["id_aktv"] ?>"><i class="fas fa-edit"></i> Kemaskini</a>&emsp;<a href="apadamaktiviti.php?id=<?php echo $row["id_aktv"];?>"><i class="fas fa-trash-alt"></i> Padam</a>
                </td>
                </tr>
                </table>
                </div>
            <?php } ?>
                </div>
             </section>
        </div>
        <div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
    </body>
</html>