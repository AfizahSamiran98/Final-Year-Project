<?php
include "connection.php";

if($_GET['id'] != ""){
    $id = $_GET['id'];
    
    $sql = "delete from pelanggan where emel_plgn = '$id'";
    $query = mysqli_query($con,$sql);
    
    if($query){
        header("location:aindexadmin.php?asenaraipelanggan");
    }
    else
    {
         echo "cannot delete.";
    }
}
mysqli_close($con);
?>