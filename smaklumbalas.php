<?php  
session_start();
$emel_staf=$_SESSION['emel_staf'];
ob_start();
?>
<?php  
include 'connection.php';
include 'functiondaftar.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "You must log in first"; header ('location: logmasukstaf.php'); 
} 
ob_start();
?> 

<html>
<head>
<title>Penilaian Staf</title>
    <link rel="stylesheet" href="pstylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Bulan", "Penilaian", { role: "style" } ],
          <?php
            $sql = "SELECT SUM(pen_staf), MONTHNAME(tarikh_lwtn) FROM maklumbalas GROUP BY MONTHNAME(tarikh_lwtn)";
            $fire = mysqli_query($con,$sql);
            while($result = mysqli_fetch_assoc($fire)){
                echo"['".$result['MONTHNAME(tarikh_lwtn)']."', ".$result['SUM(pen_staf)'].", 'silver'],";
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
        title: "Graf Penilaian Staf",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
    </script>
</head>
<body >
    <section>
 <div class="header">
  <header><img class="img" src="images/logo.png" align="left"><br><br>SISTEM TEMPAHAN LAWATAN KOMPLEKS KRAF JOHOR<br>PERBADANAN KEMAJUAN KRAFTANGAN MALAYSIA KEMENTERIAN PELANCONGAN, SENI DAN BUDAYA</header>
</div>
<div style="float:left;" class="navbar">
  <a href="sutamastaf.php"><i class="fa fa-fw fa-home"></i> Utama</a>
  <a href="saktiviti.php"><i class="fas fa-images"></i> Aktiviti</a>
    <a href="skalendar.php"><i class="far fa-calendar-alt"></i> Kalendar Lawatan</a>
  <a href="ssenaraitempahan.php"><i class="fas fa-book"></i>Maklumat Lawatan</a>
  <a href="smaklumbalas.php"><i class="fas fa-comments"></i> Maklum Balas</a>
  <I><a href="plogout.php" style="color: red;"><i class="fas fa-sign-out-alt"></i> Logout</a></I>
  <a><?php  if (isset($_SESSION['user'])) : ?> <strong>
            <?php echo $_SESSION['user']['nama_staf']; ?></strong>
            <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a><?php endif ?>
  <a style="float:right;" href="https://www.instagram.com/komplekskrafjohor/"><i class="fab fa-instagram fa-2x"></i></a>
  <a style="float:right;"  href="https://twitter.com/krafmalaysia?lang=en"><i class="fab fa-twitter fa-2x"></i></a>
  <a style="float:right;" href="https://www.facebook.com/komplekskrafjohor/"><i class="fab fa-facebook fa-2x"></i></a>          
</div></section>
 <section>
        <div class="container" >
            <div id="frmKemaskini" style="background-color:white;">
         <div><label><h2>LAPORAN PENILAIAN STAF</h2></label></div>
            <hr color="black" align="center" width="100%">
            <b><h4 style="color:red;">**Nota</h4><p>1. Graf ini menunjukkan prestasi bulanan perkhidmatan staf berdasarkan penilaian yang diberi oleh Pelanggan.<br>2. Laporan ini digunakan untuk menambahbaik kualiti perkhidmatan dalam menguruskan lawatan pelanggan.</p></b>
                 <table style="text-align:center; background-color: #FFE4C4; width: 100%; ">
            <tr>
                <td style="font-weight:normal;">
                <?php
            $sql = "SELECT SUM(pen_staf), MONTHNAME(tarikh_lwtn) 
                    from maklumbalas
                    group by MONTHNAME(tarikh_lwtn) 
                    having SUM(pen_staf) = (select MAX(city_salary)  
                    from (select SUM(pen_staf)  city_salary 
                    from maklumbalas
                    group by MONTHNAME(tarikh_lwtn)) tab) ";
            $result = mysqli_query($con,$sql) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
            echo "&emsp;&emsp;Bulan paling tinggi penilaian <br> <h2>&emsp;".$data['MONTHNAME(tarikh_lwtn)']."</h2>";
            ?>  
                </td>
                <td style="font-weight:normal; ">
            <?php
            $sel= "SELECT SUM(pen_staf), MONTHNAME(tarikh_lwtn) 
                    from maklumbalas
                    group by MONTHNAME(tarikh_lwtn) 
                    having SUM(pen_staf) = (select MIN(city_salary)  
                    from (select SUM(pen_staf)  city_salary 
                    from maklumbalas
                    group by MONTHNAME(tarikh_lwtn)) tab) ";
            $result = mysqli_query($con,$sel) or die( mysqli_error($con));
            $data=mysqli_fetch_assoc($result);
           echo "&emsp;&emsp;Bulan paling rendah penilaian <br> <h2>&emsp;".$data['MONTHNAME(tarikh_lwtn)']."</h2>";
                    ?> 
            </td>
            </tr>
               </table>
   <center><div id="columnchart_values" style="width: 900px; height: 1000px;"></div></center>
            </div>
            
                </div>
             </section>
    <br><br>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</body>
</html>