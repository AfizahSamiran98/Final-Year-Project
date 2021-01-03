<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["emel_plgn"]) && $_SESSION["emel_plgn"] === true){
  header("location: putamapenggunaberjaya.php");
  exit;
}
 
// Include config file
require_once "connection.php";
 
// Define variables and initialize with empty values
$emel_plgn = $katalaluan_plgn = "";
$emel_plgn_err = $katalaluan_plgn_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["emel_plgn"]))){
        $emel_plgn_err = "Sila Masukkan Emel Pengguna.";
    } else{
        $emel_plgn = trim($_POST["emel_plgn"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["katalaluan_plgn"]))){
        $katalaluan_plgn_err = "Sila Masukkan Kata Laluan Pengguna.";
    } else{
        $katalaluan_plgn = trim($_POST["katalaluan_plgn"]);
    }
    
    // Validate credentials
    if(empty($emel_plgn_err) && empty($katalaluan_plgn_err)){
        // Prepare a select statement
        $sql = "SELECT nama_plgn, emel_plgn, katalaluan_plgn FROM pelanggan WHERE emel_plgn = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_emel_plgn);
            
            // Set parameters
            $param_emel_plgn = $emel_plgn;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $nama_plgn,$emel_plgn, $hashed_katalaluan_plgn);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($katalaluan_plgn, $hashed_katalaluan_plgn)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["emel_plgn"] = $emel_plgn;           $_SESSION["nama_plgn"] = $nama_plgn;          
                            
                            // Redirect user to welcome page
                            header("location: putamapenggunaberjaya.php");
                        } else{
                            // Display an error message if password is not valid
                            $katalaluan_plgn_err = "Kata Laluan Tidak Sah";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $emel_plgn_err = "Emel Tidak Berdaftar";
                }
            } else{
                echo "Sila Cuba Sebentar Lagi";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>

<html>
<head>
<title>Log Masuk KKJ</title>
    <link rel="stylesheet" href="pstylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body >
    <section>
<div class="header">
  <header><img class="img" src="images/logo.png" align="left"><br><br>SISTEM TEMPAHAN LAWATAN KOMPLEKS KRAF JOHOR<br>PERBADANAN KEMAJUAN KRAFTANGAN MALAYSIA KEMENTERIAN PELANCONGAN, SENI DAN BUDAYA</header>
</div>
  <div class="navbar">
  <a href="putamapengguna.php"><i class="fa fa-fw fa-home"></i> Utama</a>  
  <a href="paktivitipengguna1.php"><i class="fas fa-images"></i> Aktiviti</a> 
  <a href="ptempahanlawatan1.php"><i class="fas fa-book"></i> Tempahan Lawatan</a>
  <a href="#" id="myBtn"><i class="fas fa-phone"></i>Hubungi Kami</a>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>            <center>
Lot.PTB 20002, Jalan Chenderasari Off Jalan Datin Halimah
<br>80350 Larkin Johor
                <br>Tel:07-2350433/Faks:07-2350432</center><br>
                    <div id="map">
    <center><iframe width="60%" height="70%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.4536174986933!2d103.73222031511571!3d1.49862336149595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da6d60d596b711%3A0x215df3c511256a6b!2sKompleks%20Kraf%20Johor!5e0!3m2!1sen!2smy!4v1588873165014!5m2!1sen!2smy" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></center>
</div></p>
  </div>

</div>
  <div class="dropdown">
  <button class="dropbtn"><i class="fa fa-fw fa-user "></i> Log Masuk</button>
  <div class="dropdown-content">
  <a href="plogmasukpengguna.php">Pengguna</a>
  <a href="logmasukstaf.php">Staf KKJ</a>
  </div>
  </div>
  <a href="pdaftarpengguna.php"><i class="fas fa-user-plus"></i> Daftar Pengguna</a>
  <a style="float:right;" href="https://www.instagram.com/komplekskrafjohor/"><i class="fab fa-instagram fa-2x"></i></a>
  <a style="float:right;"  href="https://twitter.com/krafmalaysia?lang=en"><i class="fab fa-twitter fa-2x"></i></a>
  <a style="float:right;" href="https://www.facebook.com/komplekskrafjohor/"><i class="fab fa-facebook fa-2x"></i></a>             
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
</section>
<section>
<div class="container">
<div class="row">
  <div class="column" style="width: 50%;">
<img width="100%" height="60%" src="images/login.jpg">
  </div>
  
  <div class="column" style="width: 50%;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="frmLogin">
			<div><center><label><h2>LOG MASUK</h2></label></center></div>
			<div class="field-group <?php echo (!empty($emel_plgn_err)) ? 'has-error' : '';?>">
			<div><i class="fas fa-user"></i>&emsp;<label for="login">Emel Pengguna</label></div>
			<div><input name="emel_plgn" type="text" placeholder="Emel" class="input-field" value="<?php echo $emel_plgn; ?>">
			<span class="help-block"><?php echo $emel_plgn_err;?></span></div>
			</div>
			<div class="field-group <?php echo(!empty($katalaluan_plgn_err)) ? 'has-error' : ''; ?>">
			<div><i class="fas fa-key"></i>&emsp;<label for="password">Kata Laluan</label></div>
			<div><input name="katalaluan_plgn" type="password" placeholder="Kata Laluan" class="input-field"><span class="help-block"><?php echo $katalaluan_plgn_err;?></span></div>
			</div>
			<div class="field-group">
			<div><center><input class="loginbutton" type="submit" name="logmasuk" value="Log Masuk >>" ></center></div>
			</div>
			<p><i class="fas fa-user-plus"></i>&nbsp; <a href="pdaftarpengguna.php" >Daftar Masuk Pengguna Baharu</a></p>
			</form>
  </div>
</div>
</div>
</section>
<div class="footer">
  <p>Copyright&copy; AfizahSamiran</p>
</div>
</body>
</html>