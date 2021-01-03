<?php
require('connection.php');
$msg = " ";
    //if upload button is pressed
if (isset($_POST['kalendar'])){
    
    //get all the submitted data from the form
    $perkara = $_POST['perkara'];
    $tarikh_lwtn = $_POST['tarikh_lwtn'];
    
    $sql = "INSERT INTO kalendar(perkara, tarikh_lwtn, status) VALUES ('".$perkara."','".$tarikh_lwtn."','kkj')";
    $insert= mysqli_query($con, $sql);

        echo"<script>alert('Peristiwa berjaya ditambah!')</script>";
       echo"<script>window.open('aindexadmin.php?akalendarlawatan','_self')</script>";
}
?>
<html>
  <head>
    <title>laporan penilaian</title>
      <link rel="stylesheet" href="pstylesendiri.css">
     <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
          <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style.css"/>    
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
<style>
h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
body {font-family: "Open Sans"}
</style>
</head>
          <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
    <?php include_once('functions.php'); ?>
  <body>
    <div id='bodyright'>
                <section>
         <a style="float:left;"><?php  if (isset($_SESSION['user'])) : ?> <strong>
    <?php echo $_SESSION['user']['nama_staf']; ?></strong>
    <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a>
    <?php endif ?>
   <I><a href="logout.php" style="color: red; float:right;"><i class="fas fa-sign-out-alt"></i> Logout</a></I><br/><br/>
        <div><label><h2>KALENDAR LAWATAN</h2></label></div>
            <hr color="black" align="center" width="100%"><br>
                      <a href="#" id="myBtn"><i class="far fa-calendar-plus fa-2x"></i> Kemaskini Kalendar</a>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
       <form action="akalendarlawatan.php" method="post" id="frmRegister" enctype="multipart/form-data">
<table border="0">
    	<tr>
			<td>Tarikh Lawatan</td>
			<td>: <input class="input-field" type="date" name="tarikh_lwtn" ></td>
			</tr>
    <td>Perkara</td>
			<td>: <input name="perkara" type="text" placeholder="perkara" class="input-field" required></td>
          </table>
    <div class="field-group">
			<div><center><input class="registerbutton" type="submit" name="kalendar" value="Tambah >>" ></center></div>
			</div>
      </form>
      
      <div><label><h2>SENARAI PERISTIWA</h2></label></div>
            <hr color="black" align="center" width="100%"><br>
                      <table id="customers">
                <?php
            require('connection.php');
            $sql ="SELECT * FROM kalendar WHERE status = 'kkj' ORDER BY id_cal ASC";
            $result = mysqli_query($con,$sql);
            $bil = 1;
            while($row = mysqli_fetch_array($result)){?>
                <tr>
                <td><?php echo $bil++ ?>. </td>
                 <td><?php echo $row ["tarikh_lwtn"];?></td>
                <td><?php echo $row ["perkara"];?></td>
                    <td><p><a href="apadamkalendar.php?id=<?php echo $row["id_cal"];?>"><i class="fas fa-trash-alt"></i></a></p></td>
                </tr>
                                <?php } ?>
                </table>

  </div>

</div>
                    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
                       <div id="calendar_div">
	<?php echo getCalender(); ?>
</div>
        </section>
        <br><br>
      </div>
                   <div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
  </body>
</html>