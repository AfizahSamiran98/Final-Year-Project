<html>
  <head>
    <title>laporan penilaian</title>
     <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Bulan", "Pendapatan", { role: "style" } ],
          <?php
            $sql = "SELECT SUM(jumlah_byrn), MONTHNAME(tarikh_lwtn) FROM bayaran GROUP BY MONTH(tarikh_lwtn)";
            $fire = mysqli_query($con,$sql);
            while($result = mysqli_fetch_assoc($fire)){
                echo"['".$result['MONTHNAME(tarikh_lwtn)']."', ".$result['SUM(jumlah_byrn)'].", 'silver'],";
            }
            
            ?>  
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Graf Laporan Bayaran",
        width: 600,
        height: 500,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
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
        <div><label><h2>LAPORAN PENDAPATAN</h2></label></div>
            <hr color="black" align="center" width="100%"><br>
             <b><h4 style="color:red;">**Nota</h4><p>1. Graf ini menunjukkan jumlah pendapatan bulanan kasar KKJ.<br>2. Laporan ini boleh membantu dalam merancang perbelanjaan pihak KKJ.</p><br></b>
        <table style="text-align:center; background-color: #FFE4C4; width: 100%; ">
            <tr>
                <td style="font-weight:normal; ">
            <?php
            $sel= "SELECT SUM(jumlah_byrn) FROM bayaran";
            $result = mysqli_query($con,$sel) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
            echo "Jumlah keseluruhan pendapatan <h2>RM ".$data['SUM(jumlah_byrn)']. "</h2>";?>
            </td>
                <td style="font-weight:normal;">
                <?php
            $sql = "SELECT SUM(jumlah_byrn), MONTHNAME(tarikh_lwtn) 
                    from bayaran
                    group by MONTHNAME(tarikh_lwtn) 
                    having SUM(jumlah_byrn) = (select MAX(city_salary)  
                    from (select SUM(jumlah_byrn)  city_salary 
                    from bayaran
                    group by MONTHNAME(tarikh_lwtn)) tab) ";
            $result = mysqli_query($con,$sql) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
            echo "&emsp;&emsp;Bulan paling tinggi pendapatan <br> <h2>&emsp;".$data['MONTHNAME(tarikh_lwtn)']." (RM ".$data['SUM(jumlah_byrn)'].")</h2>";
            ?>  
                </td>
                <td style="font-weight:normal;">
                <?php
            $sql = "SELECT SUM(jumlah_byrn), MONTHNAME(tarikh_lwtn) 
                    from bayaran
                    group by MONTHNAME(tarikh_lwtn) 
                    having SUM(jumlah_byrn) = (select MIN(city_salary)  
                    from (select SUM(jumlah_byrn)  city_salary 
                    from bayaran
                    group by MONTHNAME(tarikh_lwtn)) tab) ";
            $result = mysqli_query($con,$sql) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
            echo "&emsp;&emsp;Bulan paling rendah pendapatan <br> <h2>&emsp;".$data['MONTHNAME(tarikh_lwtn)']." (RM ".$data['SUM(jumlah_byrn)'].")</h2>";
            ?>  
                </td>
            </tr>
               </table>
  <center><div id="columnchart_values" style="width: 900px; height: 1000px;"></div></center>
       </div>
                    
        </section>
      </div>
                         <div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
  </body>
</html>