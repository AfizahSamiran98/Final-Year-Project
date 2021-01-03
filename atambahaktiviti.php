<?php
require('connection.php');
    //if upload button is pressed
if (isset($_POST['upload'])){
    
    //get all the submitted data from the form
    $pnrgn = $_POST['pnrgn'];
    $tajuk = $_POST['tajuk'];
    $harga = $_POST['harga'];
    $masa = $_POST['masa'];
    
    $image = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpg', 'jpeg','png');
    
    $sql = "SELECT * FROM aktiviti WHERE nama_aktv='$tajuk'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 0){
        if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if ($fileSize < 1000000){
                $sql = "INSERT INTO aktiviti(nama_aktv, harga_aktv, masa_aktv, aktvimg, pnrgn_aktv) VALUES ('$tajuk','$harga','$masa','0','$pnrgn')";
                $insert= mysqli_query($con, $sql);
                $fileNameNew = "aktv".$tajuk.".".$fileActualExt;
                $fileDestination = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo"<script>alert('Aktiviti berjaya ditambah!')</script>";
                echo"<script>window.open('aindexadmin.php?asenaraiaktiviti','_self')</script>";
            }else{
                echo"<script>alert('Gambar yang dimuatnaik terlalu besar!')</script>";
                echo"<script>window.open('javascript:history.go(-1)')</script>";
            }   
        } else{
            echo"<script>alert('Terdapat ralat semasa memuat naik fail!')</script>";
                echo"<script>window.open('javascript:history.go(-1)')</script>";
        }
    }else{
            echo"<script>alert('Format gambar tidak diterima!')</script>";
                echo"<script>window.open('javascript:history.go(-1)')</script>";
    }
    } else{
          echo"<script>alert('Aktiviti telah ada!')</script>";
          echo"<script>window.open('aindexadmin.php?atambahaktiviti','_self')</script>";
    }
}
?>
<html>
<head>
    <title>aktiviti lawatan</title>
     <link rel="stylesheet" href="stylesendiri.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
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
            <div class="row">
  <div class="column" style="width: 60%; padding: 0px 0px; margin-left:80px;">
        <form method="post" action="atambahaktiviti.php" id="frmRegister" enctype="multipart/form-data">
            <div><center><label><h2>TAMBAH AKTIVITI BAHARU</h2></label></center></div><br/>
            <table border="0">
            <tr>
			<td>Nama Aktiviti</td>
            <td>: <input class="input-field" name="tajuk" placeholder="Nama Akiviti." required></td>
            </tr>
            <tr>
			<td>Harga Aktiviti</td>
            <td>: <input class="input-field" name="harga" placeholder="Harga Akiviti." required></td>
            </tr>
            <tr>
			<td>Masa Aktiviti</td>
            <td>: <input class="input-field" name="masa" placeholder="Masa." required></td>
            </tr>
            <tr>
			<td>Gambar</td>
            <td>: <input type="file" name="image"></td>
            </tr>
            <tr>
			<td>Penerangan Aktiviti &emsp;&nbsp;:</td>
            <td><textarea class="input-field" name="pnrgn" cols="40" rows="4" placeholder="Penerangan Aktiviti." required></textarea></td>
            </tr>
                </table>
                <div class="field-group">
            <div>
            <center><input class="registerbutton" type="submit" name="upload" value="Tambah"></center>
            </div>
                </div>
            
        </form>
        </div>
            </div>
                </div>
                </section>
        </div>
        <div class="footer">
  <p>Copyright&copy;<script>document.write(new Date().getFullYear());</script> NurulAfizahSamiran</p>
</div>
    </body>
</html>