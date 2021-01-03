<?php
include "connection.php";

if($_GET['id'] != ""){
    $id = $_GET['id'];
    
    $sql = "delete from staf where emel_staf = '$id'";
    $query = mysqli_query($con,$sql);
    
    if($query){
        header("location:aindexadmin.php?asenaraistaf");
    }
    else
    {
         echo "cannot delete.";
    }
}
mysqli_close($con);
?>