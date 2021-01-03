<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
?>
<div id='bodyleft'>

<h3>Pengurusan Pengguna</h3>
<ul>
<li><a href="aindexadmin.php?akaunadmin">Akaun Pengguna</a></li>
<li><a href="aindexadmin.php?adaftarstaf">Pendaftaran Staf Baharu</a></li>
<li><a href="aindexadmin.php?asenaraistaf">Senarai Staf</a></li>
<li><a href="aindexadmin.php?asenaraipelanggan">Senarai Pelanggan</a></li>
</ul>
<h3>Pengurusan Aktiviti</h3>
<ul>
<li><a href="aindexadmin.php?atambahaktiviti">Tambah Aktiviti</a></li>
<li><a href="aindexadmin.php?asenaraiaktiviti">Senarai Aktiviti</a></li>
</ul>
<h3>Pengurusan Tempahan</h3>
<ul>
<li><a href="aindexadmin.php?asenaraitempahan">Senarai Tempahan</a></li>
<li><a href="aindexadmin.php?akemaskinitempahan">Kemaskini Tempahan</a></li>
<li><a href="aindexadmin.php?akalendarlawatan">Kalendar Lawatan</a></li>
</ul>
<h3>Pengurusan Lawatan</h3>
<ul>
<li><a href="aindexadmin.php?asenaraibayaran">Pembayaran</a></li>
<li><a href="aindexadmin.php?asenaraimaklumbalas">Maklum Balas</a></li>
</ul>
<h3>Menjana Laporan</h3>
<ul>
<li><a href="aindexadmin.php?alaporanlawatan">Laporan Lawatan</a></li>
<li><a href="aindexadmin.php?alaporanbayaran">Laporan Bayaran</a></li>
<li><a href="aindexadmin.php?apenstaf">Laporan Penilaian Staf</a></li>
<li><a href="aindexadmin.php?apenaktiviti">Laporan Penilaian Aktiviti</a></li>
</ul>
</div>

<?php
    if(isset($_GET['akaunadmin'])){
	include("akaunadmin.php");
	}

	if(isset($_GET['adaftarstaf'])){
	include("adaftarstaf.php");
	}

    if(isset($_GET['asenaraipelanggan'])){
	include("asenaraipelanggan.php");
	}

    if(isset($_GET['asenaraistaf'])){
	include("asenaraistaf.php");
	}

    if(isset($_GET['asenaraiaktiviti'])){
	include("asenaraiaktiviti.php");
	}

    if(isset($_GET['atambahaktiviti'])){
	include("atambahaktiviti.php");
	}

    if(isset($_GET['asenaraitempahan'])){
	include("asenaraitempahan.php");
	}

    if(isset($_GET['akemaskinitempahan'])){
	include("akemaskinitempahan.php");
	}

    if(isset($_GET['asenaraibayaran'])){
	include("asenaraibayaran.php");
	}

    if(isset($_GET['asenaraimaklumbalas'])){
	include("asenaraimaklumbalas.php");
	}

    if(isset($_GET['apenstaf'])){
	include("apenstaf.php");
	}

    if(isset($_GET['apenaktiviti'])){
	include("apenaktiviti.php");
	}
    
     if(isset($_GET['alaporanbayaran'])){
	include("alaporanbayaran.php");
	}

    if(isset($_GET['alaporanlawatan'])){
	include("alaporanlawatan.php");
	}

 if(isset($_GET['akalendarlawatan'])){
	include("akalendarlawatan.php");
	}
    
?>