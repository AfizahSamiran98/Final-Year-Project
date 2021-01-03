
<?php
require('connection.php');

function getUserByEmel($nama_staf){  
    global $con;  
    $query = "SELECT * FROM staf WHERE emel_staf=" . $emel_staf;  
    $result = mysqli_query($con, $query); 
    
    $user = mysqli_fetch_assoc($result);  
    return $user; 
} 

function isLoggedIn() 
{  
    if (isset($_SESSION['user'])) {   
        return true;  
    }else{   
        return false;  
    } 
}  

function isAdmin() 
{  
    if (isset($_SESSION['user']) && $_SESSION['user']['pengguna'] == 'pengurus' ) {   
        return true;  
    }else{   
        //return false;  
    } 
}

// log user out if logout button clicked 
if (isset($_GET['logout'])) {  
    session_destroy();  
    unset($_SESSION['user']);  
    header("location: logmasukstaf.php"); 
}




?>