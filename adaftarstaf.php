<?php
require('connection.php');
?>

<?php
$id_staf= ""; 
$nama_staf= ""; 
$nokp_staf= ""; 
$jawatan_staf= ""; 
$notelpej_staf= "";
$notel_staf= ""; 
$emel_staf= ""; 
$katalaluan_staf= "";
$katalaluan_staf1= "";
$katalaluan_staf2= ""; 
$errors = array();  
 
if (isset($_POST['daftarstaf'])) {  daftar(); } 
function daftar(){  
    // call these variables with the global keyword to make them available in function  
    global $con, $errors, $id_staf, $nama_staf, $nokp_staf, $jawatan_staf, $notelpej_staf, $notel_staf, $emel_staf, $katalaluan_staf, $katalaluan_staf1, $katalaluan_staf2; 
    
    // receive all input values from the form. Call the e() function     
    // defined below to escape form values 
    $id_staf =  e($_POST['id_staf']);
    $nama_staf =  e($_POST['nama_staf']); 
	$nokp_staf =  e($_POST['nokp_staf']); 
	$jawatan_staf  =  e($_POST['jawatan_staf']);
	$notelpej_staf  =  e($_POST['notelpej_staf']);
	$notel_staf  =  e($_POST['notel_staf']);
	$emel_staf  =  e($_POST['emel_staf']);
	$katalaluan_staf1  =  e($_POST['katalaluan_staf1']);
	$katalaluan_staf2  =  e($_POST['katalaluan_staf2']);
    // form validation: ensure that the form is correctly filled   
    if (empty($emel_staf)) {    
        array_push($errors, "Sila Masukkan Emel Pengguna");   
    }  
    if (empty($katalaluan_staf1)) {
        array_push($errors, "Sila Masukkan Kata Laluan Pengguna");   
    }

	if ($katalaluan_staf1 != $katalaluan_staf2) {
        array_push($errors, "Kata Laluan Tidak Sama");   
    }  
    
    // register user if there are no errors in the form  
    if (count($errors) == 0) { 
        $katalaluan_staf = $katalaluan_staf1; //encrypt the password before saving in the database 
		$katalaluan_staf = md5($katalaluan_staf);
        
        if (isset($_POST['pengguna'])) { 
        $pengguna = e($_POST['pengguna']); 
        $query = "INSERT INTO staf (id_staf, nama_staf, nokp_staf,  jawatan_staf, notelpej_staf, notel_staf, emel_staf, katalaluan_staf, pengguna)         
        VALUES('$id_staf','$nama_staf', '$nokp_staf', '$jawatan_staf', '$notelpej_staf', '$notel_staf', '$emel_staf', '$katalaluan_staf', '$pengguna')"; 
        mysqli_query($con, $query); 
        $_SESSION['success']  = "New user successfully created!!";    
                echo"<script>alert('Staf berjaya ditambah!')</script>";
                echo"<script>window.open(' aindexadmin.php?asenaraistaf','_self')</script>";   
    }else{   
        $query = "INSERT INTO staf (id_staf, nama_staf, nokp_staf,  jawatan_staf, notelpej_staf, notel_staf, emel_staf, katalaluan_staf)         
        VALUES('$id_staf','$nama_staf', '$nokp_staf', '$jawatan_staf', '$notelpej_staf', '$notel_staf', '$emel_staf', '$katalaluan_staf')"; 
        mysqli_query($con, $query); 
        
        // get id of the created user    
        //$logged_in_user_emel = mysqli_insert_id($con); 
        //$_SESSION['user'] = getUserByEmel($logged_in_user_emel); // put logged in user in session    
        $_SESSION['success']  = "You are now logged in";
         echo"<script>alert('Staf berjaya ditambah!')</script>";
                echo"<script>window.open(' aindexadmin.php?asenaraistaf','_self')</script>";       
        }  
    }else{   
        }  
    } 
 
 ?>
<div id='bodyright'>
<section>
<div class="container">
    <a style="float:left;"><?php  if (isset($_SESSION['user'])) : ?> <strong>
    <?php echo $_SESSION['user']['nama_staf']; ?></strong>
    <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a>
    <?php endif ?>
   <I><a href="logout.php" style="color: red; float:right;"><i class="fas fa-sign-out-alt"></i> Logout</a></I><br/><br/>
<div class="row">
  <div class="column" style="width: 60%; padding: 0px 0px; margin-left:80px;">
  <form action="adaftarstaf.php" method="post" id="frmRegister">
			<div><center><label><h2>DAFTAR PENGGUNA BAHARU</h2></label></center></div><br/>
			<div class="error-message"><?php echo display_error(); ?></div>
			<table border="0">
            <tr>
			<td>ID Staf</td>
			<td>: <input name="id_staf" type="text" placeholder="ID STAF" class="input-field" value="<?php echo $id_staf; ?>" required></td>
            </tr> 
            <tr>
			<td>Nama Penuh</td>
			<td>: <input name="nama_staf" type="text" placeholder="nama penuh" class="input-field" value="<?php echo $nama_staf; ?>" required></td>
            </tr> 
			<tr>
			<td>No Kad Pengenalan</td>
			<td>:  <input name="nokp_staf" type="text" placeholder="contoh 980604015470" class="input-fieldnum" value="<?php echo $nokp_staf; ?>" required></td>
			</tr>
			<tr>
			<td>Jawatan</td>
			<td>:  <input name="jawatan_staf" type="text" placeholder="jawatan" class="input-fieldnum" value="<?php echo $jawatan_staf; ?>" required></td>
			</tr>
			<tr>
			<td>No. Tel. Pejabat</td>
			<td>:  <input name="notelpej_staf" type="text" placeholder="contoh 0312345678" class="input-fieldnum" value="<?php echo $notelpej_staf; ?>" required></td>
			</tr>
			<tr>
			<td>No. Tel. Bimbit</td>
			<td>:  <input name="notel_staf" type="text" placeholder="contoh 0177889684" class="input-fieldnum" value="<?php echo $notel_staf; ?>" required></td>
			</tr>
			<tr>
			<td>Emel Pengguna*</td>
			<td>:  <input name="emel_staf" type="text" placeholder="emel" class="input-field" value="<?php echo $emel_staf; ?>" ></td>
			</tr>
			<tr>
			<td>Kata Laluan*</td>
			<td>:  <input name="katalaluan_staf1" type="text" placeholder="kata laluan" class="input-fieldnum" ></td>
			</tr>
			<tr>
			<td>Ulang Kata Laluan*</td>
			<td>:  <input name="katalaluan_staf2" type="text" placeholder="kata laluan" class="input-fieldnum" ></td>
			</tr>
			</table>
			<div class="field-group">
			<div><center><input class="registerbutton" type="submit" name="daftarstaf" value="Daftar >>" ></center></div>
			</div>
			</form>
</div>
</div>
</div>
</section>
<div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
</div>


<?php
require('connection.php');
function e($value){  
    global $con;  
    return mysqli_real_escape_string($con, trim($value)); 
}

function display_error() {  
    global $errors; 
 
    if (count($errors) > 0){   
        echo '<div class="error">';    
            foreach ($errors as $error){ 
                echo $error .'<br>';    
            }   
                    echo '</div>';  
    } 
}
?>