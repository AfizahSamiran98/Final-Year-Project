
<html>
<head>
    <title>maklumat tempahan lawatan</title>
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
            <div id="frmKemaskini">
                 <a style="float:left;"><?php  if (isset($_SESSION['user'])) : ?> <strong>
    <?php echo $_SESSION['user']['nama_staf']; ?></strong>
    <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a>
    <?php endif ?>
                
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
        </div>
    </body>
</html>