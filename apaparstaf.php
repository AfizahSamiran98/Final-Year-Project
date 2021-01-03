
<html>
<head>
    <title>maklumat staf</title>
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
        <div class="container" >
                           <br/><br/> 
               <br/><br/> 
            <div id="frmKemaskini" style="background:#F0F0F0;">
                 <a style="float:left;"><?php  if (isset($_SESSION['user'])) : ?> <strong>
    <?php echo $_SESSION['user']['nama_staf']; ?></strong>
    <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a>
    <?php endif ?>

   <a href="javascript:history.go(-1)" style="color: red; float:left;"><i class="fas fa-angle-double-left"></i> Kembali</a><br>
            <div><center><label><h2>MAKLUMAT STAF</h2></label></center></div>
                    <?php
            require('connection.php');
            $id = $_GET['id'];
            $sql ="SELECT * FROM staf WHERE emel_staf = '$id'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
            $bil=1;
            while($row=mysqli_fetch_array($result)){
                $nama_staf=$row['nama_staf'];?>
                <center><table >
                      <tr>
                    <td>
            <?php if($row['imgstaf'] == 0){
                    echo"<img style='width:230px; heigh:150px;'  src='profile/prof".$nama_staf.".jpg?'".mt_rand().">";
                }else{ echo"<img style='width:230px; heigh:150px;' src='profile/profdefault.png'>";}?>
                </td></tr>
                    <tr>
                <td>ID Staf</td>
                <td>: <?php echo $row ["id_staf"];?></td>
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
                </table></center>
                 <br><br>
                </div>
            <?php }} ?>
                </div>
             </section>
        </div>
    </body>
</html>