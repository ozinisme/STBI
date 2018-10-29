<html>
<head> <title>STEMMING</title>
<style>
.btn {
    border: none;
    color: white;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
}
.back {background-color: #b8b894;} 
.back:hover {background: #d6d6c2;}
 </style>
 </head>

<body style="background-color:#b3ccff">

<center> 
<h1 style="background-color:DodgerBlue">UNIVERSITAS STIKUBANK SEMARANG <br> TAHUN PELAJARAN 2018 </h1> 

<br>
<?php
$host='localhost';
$user='id7145683_admin';
$pass='ozinisme';
$database='id7145683_databaseku';

$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database);
//hitung index
mysql_query("TRUNCATE TABLE tbvektor");
//ambil setiap DocId dalam tbindex
	//hitung panjang vektor untuk setiap DocId tersebut
	//simpan ke dalam tabel tbvektor
	$resDocId = mysql_query("SELECT DISTINCT DocId FROM tbindex");
	
	$num_rows = mysql_num_rows($resDocId);
	print("Terdapat " . $num_rows . " dokumen yang dihitung panjang vektornya. <br />");
	
	while($rowDocId = mysql_fetch_array($resDocId)) {
		$docId = $rowDocId['DocId'];
	
		$resVektor = mysql_query("SELECT Bobot FROM tbindex WHERE DocId = '$docId'");
		
		//jumlahkan semua bobot kuadrat 
		$panjangVektor = 0;		
		while($rowVektor = mysql_fetch_array($resVektor)) {
			$panjangVektor = $panjangVektor + $rowVektor['Bobot']  *  $rowVektor['Bobot'];	
		}
		
		//hitung akarnya		
		$panjangVektor = sqrt($panjangVektor);
		
		//masukkan ke dalam tbvektor		
		$resInsertVektor = mysql_query("INSERT INTO tbvektor (DocId, Panjang) VALUES ('$docId', $panjangVektor)");	
	} //end while $rowDocId

?>
<br><a href="index.php" button class="btn back" >Kembali </a></button> <br>
<center>
<h4 style="background-color:DodgerBlue">Agus Prastyo (15.01.53.0122) <br> Muhammad Zainurroziqin (15.01.53.0125) <br> M Ade Rahmat H (15.01.53.0130)</h4> 
</center>
<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_medium=website_roziqincapcus&amp;utm_content=footer_img"><img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"  alt="www.000webhost.com"></a></div></body>
</html>