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
          ['Lawatan', 'Penilaian'],
           <?php
            $sql = "SELECT SUM(pen_lwtn), nama_aktv FROM maklumbalas GROUP BY nama_aktv";
            $fire = mysqli_query($con,$sql);
            while($result = mysqli_fetch_assoc($fire)){
                echo"['".$result['nama_aktv']."',".$result['SUM(pen_lwtn)']."],";
            }
            
            ?>
        ]);

        var options = {
          title: 'Carta Penilaian Aktiviti'
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
        <div><label><h2>PENILAIAN AKTIVITI</h2></label></div>
            <hr color="black" align="center" width="100%"><br>
             <b><h4 style="color:red;">**Nota</h4><p>1. Graf ini menunjukkan prestasi aktiviti berdasarkan penilaian yang diberi oleh Pelanggan.<br>2. Laporan ini digunakan untuk menambahbaik kualiti aktiviti lawatan.<br>3. Laporan ini turut digunakan untuk mengetahui aktiviti yang kurang digemari oleh pelanggan untuk ditukar kepada aktiviti yang lain.</p></b><br>
             <table style="text-align:center; background-color: #FFE4C4; width: 100%; ">
            <tr>
                <td style="font-weight:normal;">
                <?php
            $sql = "SELECT nama_aktv, SUM(pen_lwtn) 
                    from maklumbalas
                    group by nama_aktv 
                    having SUM(pen_lwtn) = (select MAX(city_salary)  
                    from (select SUM(pen_lwtn)  city_salary 
                    from maklumbalas
                    group by nama_aktv) tab) ";
            $result = mysqli_query($con,$sql) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
            echo "&emsp;&emsp;Aktiviti paling tinggi penilaian <br> <h2>&emsp;".$data['nama_aktv']."</h2>";
            ?>  
                </td>
                <td style="font-weight:normal; ">
            <?php
            $sel= "SELECT nama_aktv, SUM(pen_lwtn) 
                    from maklumbalas
                    group by nama_aktv 
                    having SUM(pen_lwtn) = (select MIN(city_salary)  
                    from (select SUM(pen_lwtn)  city_salary 
                    from maklumbalas
                    group by nama_aktv) tab)";
            $result = mysqli_query($con,$sel) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
           echo "&emsp;&emsp;Aktiviti paling rendah penilaian <br> <h2>&emsp;".$data['nama_aktv']."</h2>";
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