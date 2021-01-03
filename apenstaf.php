<html>
  <head>
    <title>laporan penilaian</title>
     <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Staf', 'Penilaian'],
          <?php
            $sql = "SELECT SUM(pen_staf), nama_staf FROM maklumbalas GROUP BY nama_staf";
            $fire = mysqli_query($con,$sql);
            while($result = mysqli_fetch_assoc($fire)){
                echo"['".$result['nama_staf']."',".$result['SUM(pen_staf)']."],";
            }
            
            ?>
        ]);

        var options = {
          title: 'Carta Penilaian Staf'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
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
        <div><label><h2>PENILAIAN STAF</h2></label></div>
            <hr color="black" align="center" width="100%"><br>
             <b><h4 style="color:red;">**Nota</h4><p>1. Graf ini menunjukkan prestasi perkhidmatan staf berdasarkan penilaian yang diberi oleh Pelanggan.<br>2. Laporan ini digunakan untuk menambahbaik kualiti perkhidmatan dalam menguruskan lawatan pelanggan.<br>3. Laporan ini turut digunakan untuk memilih staf terbaik untuk diberikan anugerah.</p></b><br>
             <table style="text-align:center; background-color: #FFE4C4; width: 100%; ">
            <tr>
                <td style="font-weight:normal;">
                <?php
            $sql = "SELECT SUM(pen_staf), nama_staf 
                    from maklumbalas
                    group by nama_staf 
                    having SUM(pen_staf) = (select MAX(city_salary)  
                    from (select SUM(pen_staf)  city_salary 
                    from maklumbalas
                    group by nama_staf) tab) ";
            $result = mysqli_query($con,$sql) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
            echo "&emsp;&emsp;Staf paling tinggi penilaian <br> <h2>&emsp;".$data['nama_staf']."</h2>";
            ?>  
                </td>
                <td style="font-weight:normal; ">
            <?php
            $sel= "SELECT SUM(pen_staf), nama_staf 
                    from maklumbalas
                    group by nama_staf 
                    having SUM(pen_staf) = (select MIN(city_salary)  
                    from (select SUM(pen_staf)  city_salary 
                    from maklumbalas
                    group by nama_staf) tab) ";
            $result = mysqli_query($con,$sel) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
           echo "&emsp;&emsp;Staf paling rendah penilaian <br> <h2>&emsp;".$data['nama_staf']."</h2>";
                    ?> 
            </td>
            </tr>
               </table>
    <center><div id="piechart" style="width: 900px; height: 500px;"></div></center>
      </div>
        </section>
      </div>
                         <div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
  </body>
</html>