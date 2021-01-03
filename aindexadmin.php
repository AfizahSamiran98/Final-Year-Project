<?php
session_start();
$emel_staf=$_SESSION['emel_staf'];
ob_start();
?>
<?php  
include 'connection.php';
include 'functiondaftar.php';
if (!isLoggedIn()) {  
    $_SESSION['msg'] = "You must log in first"; 
    header ('location: logmasukstaf.php'); 
}
?> <html>
<head>
<title>Admin | Home</title>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />

</head>
<body>
<?php include("aheader.php"); 
	  include("abodyleft.php");
	  include("abodyright.php");
?>
</body>
</html>