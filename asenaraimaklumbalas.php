
<html>
<head>
    <title>senarai maklum balas</title>
     <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
     <style>
        #img_div{
width:80%;
padding:5px;
margin:15px auto;
border:1px solid #cbcbcb;
}
#img_div:after{
content:"";
display: block;
clear:both;
}
img{
float:left;
margin:5px;
width:200px;
height:150px;
}
</style>
</head>
    <body>
         <div id='bodyright'>
            <section>
        <div class="container">
            <a style="float:left;"><?php  if (isset($_SESSION['user'])) : ?> <strong>
    <?php echo $_SESSION['user']['nama_staf']; ?></strong>
    <I style="color: black;">(<?php echo ucfirst($_SESSION['user']['pengguna']); ?>)</I></a>
    <?php endif ?>
   <I><a href="logout.php" style="color: red; float:right;"><i class="fas fa-sign-out-alt"></i> Logout</a></I><br/><br/>
            <div><label><h2>MAKLUM BALAS</h2></label></div>
            <hr color="black" align="center" width="100%"><br>
                     <?php
            require('connection.php');
            $sql ="SELECT * FROM maklumbalas WHERE status_MB = 'Sudah' ORDER BY id_MB ASC";
            $result = mysqli_query($con,$sql);
            $bil = 1;
            while($row = mysqli_fetch_array($result)){?>
                <div id='img_div'>
                <table >
                <tr>
                <td>
                <p style="font-weight: normal;"><b><?php echo $bil++ ?>. <?php echo $row ["tajuk_lwtn"];?></b>
                <p style="font-weight: normal;">&emsp;<?php echo $row ["MB_lwtn"];?></p>
                </td>
                </tr>
                </table>
                </div>
            <?php } ?>
                </div>
             </section>
        </div>
    </body>
</html>
