<?php
// Include config file
session_start();
require_once "connection.php";
require_once "functiondaftar.php";
if (isLoggedIn()) {  
     if (isset($_SESSION['user']) && $_SESSION['user']['pengguna'] == 'pengurus' ) {   
        header("location: aindexadmin.php?akaunpengguna"); 
    }else{   
         header("location: sutamastaf.php");   
    } 
}

// Define variables and initialize with empty values
$emel_staf_err = $katalaluan_staf_err = "";
   global $con, $emel_staf, $errors; 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $emel_staf= e($_POST['emel_staf']);  
  $katalaluan_staf = e($_POST['katalaluan_staf']); 
 
    // Check if username is empty
    if(empty($emel_staf)){
        $emel_staf_err = "Sila Masukkan Emel Pengguna.";
    }
    
    // Check if password is empty
    if(empty($katalaluan_staf)){
        $katalaluan_staf_err = "Sila Masukkan Kata Laluan Pengguna.";
    }
    // Validate credentials
    if(empty($emel_staf_err) && empty($katalaluan_staf_err)){
        $katalaluan_staf = md5($katalaluan_staf); 
        
        $sql = "SELECT * FROM staf WHERE emel_staf = '$emel_staf' AND katalaluan_staf = '$katalaluan_staf'LIMIT 1";
        $results = mysqli_query($con, $sql); 
        // Prepare a select statement
        if (mysqli_num_rows($results) == 1) {
                            // Password is correct, so start a new session
                            $logged_in_user = mysqli_fetch_assoc($results);
                            // Store data in session variables
                            if($logged_in_user['pengguna'] == 'pengurus'){
                            $_SESSION["loggedin"] = true;
                            $_SESSION['emel_staf'] = $emel_staf;
                            $_SESSION['user'] = $logged_in_user;  
                            // Redirect user to welcome page
                            header("location: aindexadmin.php?akaunadmin");}
                            else {
                            $_SESSION["loggedin"] = true;
                            $_SESSION['emel_staf'] = $emel_staf;
                            $_SESSION['user'] = $logged_in_user;   
                            // Redirect user to welcome page
                            header("location: sutamastaf.php");}
                        } else{
                            // Display an error message if password is not valid
                            $katalaluan_staf_err = "Kata Laluan Tidak Sah";
                        }}
                /* else{
                    // Display an error message if username doesn't exist
                    $emel_staf_err = "Emel Tidak Berdaftar";
                }
            } else{
                echo "Sila Cuba Sebentar Lagi";
            }*/
        
        
        // Close statement
       // mysqli_stmt_close($stmt);
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
<img width="100%" height="53%" src="images/login.jpg">
  </div>
  
  <div class="column" style="width: 50%;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="frmLogin">
			<div><center><label><h2>LOG MASUK</h2></label></center></div>
			<div class="field-group <?php echo (!empty($emel_staf_err)) ? 'has-error' : '';?>">
			<div><i class="fas fa-user"></i>&emsp;<label for="login">Emel Staf</label></div>
			<div><input name="emel_staf" type="text" placeholder="Emel" class="input-field" value="<?php echo $emel_staf; ?>">
			<span class="help-block"><?php echo $emel_staf_err;?></span></div>
			</div>
			<div class="field-group <?php echo(!empty($katalaluan_staf_err)) ? 'has-error' : ''; ?>">
			<div><i class="fas fa-key"></i>&emsp;<label for="password">Kata Laluan</label></div>
			<div><input name="katalaluan_staf" type="password" placeholder="Kata Laluan" class="input-field"><span class="help-block"><?php echo $katalaluan_staf_err;?></span></div>
			</div>
			<div class="field-group">
			<div><center><input class="loginbutton" type="submit" name="logmasuk" value="Log Masuk >>" ></center></div>
			</div>
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

<?php
function e($value){  
    global $con;  
    return mysqli_real_escape_string($con, trim($value)); 
}
?>