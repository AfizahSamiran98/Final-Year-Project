<?php  
session_start(); 
require('connection.php');
 
// variable declaration 
 $nama_plgn= ""; $nokp_plgn= ""; $institut_plgn= ""; $jawatan_plgn= ""; $notelpej_plgn= "";
 $nofax_plgn= ""; $notel_plgn= ""; $emel_plgn= ""; $katalaluan_plgn= "";$katalaluan_plgn1= "";$katalaluan_plgn2= ""; $errors   = array();  
 
// call the register() function if register_btn is clicked
if (isset($_POST['daftarpengguna'])) {  register(); } 

// REGISTER USER 
function register(){  
    // call these variables with the global keyword to make them available in function  
    global $con, $errors, $nama_plgn, $nokp_plgn, $institut_plgn, $jawatan_plgn, $notelpej_plgn, $nofax_plgn, $notel_plgn, $emel_plgn, $katalaluan_plgn, $katalaluan_plgn1,$katalaluan_plgn2; 
    
    // receive all input values from the form. Call the e() function     
    // defined below to escape form values  
    $nama_plgn =  e($_POST['nama_plgn']); 
	$nokp_plgn =  e($_POST['nokp_plgn']); 
	$institut_plgn  =  e($_POST['institut_plgn']);
	$jawatan_plgn  =  e($_POST['jawatan_plgn']);
	$notelpej_plgn  =  e($_POST['notelpej_plgn']);
	$nofax_plgn  =  e($_POST['nofax_plgn']);
	$notel_plgn  =  e($_POST['notel_plgn']);
	$emel_plgn  =  e($_POST['emel_plgn']);
	$katalaluan_plgn1  =  e($_POST['katalaluan_plgn1']);
	$katalaluan_plgn2  =  e($_POST['katalaluan_plgn2']);
    // form validation: ensure that the form is correctly filled   
    if (empty($emel_plgn)) {    
        array_push($errors, "Sila Masukkan Emel Pengguna");   
    }  
    if (empty($katalaluan_plgn1)) {
        array_push($errors, "Sila Masukkan Kata Laluan Pengguna");   
    }

	if ($katalaluan_plgn1 != $katalaluan_plgn2) {
        array_push($errors, "Kata Laluan Tidak Sama");   
    }  
    
    // register user if there are no errors in the form  
    if (count($errors) == 0) { 
        $katalaluan_plgn = $katalaluan_plgn1; //encrypt the password before saving in the database 
		$katalaluan_plgn = password_hash($katalaluan_plgn, PASSWORD_DEFAULT);
                              
        $query = "INSERT INTO pelanggan (nama_plgn, nokp_plgn, institut_plgn, jawatan_plgn, notelpej_plgn, nofax_plgn, notel_plgn, emel_plgn, katalaluan_plgn)         
					VALUES('$nama_plgn', '$nokp_plgn', '$institut_plgn', '$jawatan_plgn', '$notelpej_plgn', '$nofax_plgn', '$notel_plgn', '$emel_plgn', '$katalaluan_plgn')";   
        mysqli_query($con, $query);
		$_SESSION['emel_plgn'] = $emel_plgn; 
        $_SESSION['nama_plgn'] = $nama_plgn; 
        header('location: putamapenggunaberjaya.php');  
    }else{   
        }  
    } 
 
// escape string 
function e($val){  
    global $con;  
    return mysqli_real_escape_string($con, trim($val)); 
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

function isLoggedIn() 
{  
    if (isset($_SESSION['emel_plgn'])) {   
        return true;  
    }else{   
        return false;  
    } 
} 

 if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['emel_plgn']);
  	header("location: utamapengguna.php");
  } 
?>

