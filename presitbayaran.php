 <html>
     <head>
    <title>Bayaran Tempahan Lawatan</title>
     <link rel="stylesheet" href="pstylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
     <body>
<div class="column" style="width: 100%; padding: 35px 0px; ">
  <div id="frmRegister">
  <div><center><label><h2>RESIT PEMBAYARAN TEMPAHAN LAWATAN</h2></label></center></div>
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
                <center><table >
                 <tr>
                <td >Status Bayaran</td>
                <td style="font-weight: normal;color:red;">: <?php echo $row ["status_byrn"];?></td>
                </tr>
                  <tr>
                <td >Status Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["status_lwtn"];?></td>
                </tr>
                <tr>
                <td >Staf Bertugas</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_staf"];?></td>
                </tr>
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
                <td>Aktiviti Lawatan</td>
                <td style="font-weight: normal;">: <?php echo $row ["nama_aktv"];?></td>
                </tr>
                <tr>
                <td>Harga Aktiviti</td>
                <td style="font-weight: normal;">: RM <?php echo $row ["harga_aktv"];?></td>
                </tr>
                     <tr>
                <td>Jumlah Urusetia</td>
                <td style="font-weight: normal;">: <?php echo $row ["jumlah_urusetia"];?></td>
                </tr>
                     <tr>
                <td>Jumlah Peserta</td>
                <td style="font-weight: normal;">: <?php echo $row ["jumlah_plwt"];?></td>
                </tr>
                 <tr>
                <td>Jumlah Keseluruhan Pelawat</td>
                <td style="font-weight: normal;">: <?php echo $row ["jumlah_lwtn"];?></td>
                </tr>
                <tr>
               <td><hr color="black" align="center" width="100%"></td>
                    <td><hr color="black" align="center" width="100%"></td>
                </tr>
                 <tr>
                <td>Jumlah Bayaran</td>
                <td style="font-weight: normal;">: RM <?php echo $row ["jumlah_byrn"];?></td>
                </tr>
                    <tr>
               <td><hr color="black" align="center" width="100%"></td>
                    <td><hr color="black" align="center" width="100%"></td>
                </tr>
                    </table></center><?php }} ?>
       <center><button class="registerbutton" onclick="window.print()">Cetak Resit</button>&emsp;<button class="registerbutton" onclick="location.href='putamapenggunaberjaya.php'">OK</button></center>
  </div>
  </div>
         </body>
     </html>
