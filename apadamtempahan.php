<?php
include "connection.php";
if($_GET['id'] != ""){
    $id = $_GET['id'];
    
    $sql ="SELECT tajuk_lwtn FROM lawatan where id_lwtn = '$id'";
    $result = mysqli_query($con,$sql);
     
    while($row = mysqli_fetch_assoc($result)){
    $tajuk_lwtn=$row['tajuk_lwtn'];
    $filename = "filelawatan/D".$tajuk_lwtn."*";
    $fileinfo = glob($filename);
    $fileext = explode(".",$fileinfo[0]);
    $fileactualext = $fileext[1];

    $file="filelawatan/D".$tajuk_lwtn.".".$fileactualext;
    if(unlink($file)){
    $sql = "delete from lawatan where id_lwtn = '$id'";
    $query = mysqli_query($con,$sql);
    if($query){
        echo"<script>alert('Tempahan Berjaya Dipadam!')</script>";
                echo"<script>window.open('psenaraitempahan.php','_self')</script>";
    }
    else
    {
         echo "cannot delete.";
    }}
}}
mysqli_close($con);
?>