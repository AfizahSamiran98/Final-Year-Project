<?php
include "connection.php";
if($_GET['id'] != ""){
    $id = $_GET['id'];
    
    $sql ="SELECT nama_aktv FROM aktiviti where id_aktv = '$id'";
    $result = mysqli_query($con,$sql);
     
    while($row = mysqli_fetch_assoc($result)){
    $nama_aktv=$row['nama_aktv'];
    $filename = "upload/aktv".$nama_aktv."*";
    $fileinfo = glob($filename);
    $fileext = explode(".",$fileinfo[0]);
    $fileactualext = $fileext[1];

    $file="upload/aktv".$nama_aktv.".".$fileactualext;
    if(unlink($file)){
    $sql = "delete from aktiviti where id_aktv = '$id'";
    $query = mysqli_query($con,$sql);
    if($query){
         echo"<script>alert('Aktiviti berjaya dipadam!')</script>";
                echo"<script>window.open('javascript:history.go(-1)','_self')</script>";  
    }
    else
    {
         echo"<script>alert('Aktiviti tidak berjaya dipadam!')</script>";
                echo"<script>window.open('javascript:history.go(-1)','_self')</script>"; 
    }}
}}
mysqli_close($con);
?>