<?php
include "connection.php";

if($_GET['id'] != ""){
    $id = $_GET['id'];
    
    $sql = "delete from kalendar where id_cal = '$id'";
    $query = mysqli_query($con,$sql);
    
    if($query){
         echo"<script>alert('Peristiwa berjaya dipadam!')</script>";
       echo"<script>window.open('aindexadmin.php?akalendarlawatan','_self')</script>";
    }
    else
    {
         echo "cannot delete.";
    }
}
mysqli_close($con);
?>