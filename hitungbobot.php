<!DOCTYPE html>
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
/*include "koneksi.php";
set_time_limit(0);*/
$host='localhost';
$user='id7145683_admin';
$pass='ozinisme';
$database='id7145683_databaseku';

$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database);
//hitung index
mysql_query("TRUNCATE TABLE tbindex");
$resn = mysql_query("INSERT INTO `tbindex`(`Term`, `DocId`, `Count`) SELECT `token`,`nama_file`,count(*) FROM `dokumen` group by `nama_file`,token");
	/*$n = mysql_num_rows($resn);*/
	

//berapa jumlah DocId total?, n
	$resn = mysql_query("SELECT DISTINCT DocId FROM tbindex");
	$n = mysql_num_rows($resn);
	
	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysql_query("SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysql_num_rows($resBobot);
	print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysql_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];		
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysql_query("SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysql_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];
		
		$w = $tf * log($n/$NTerm);
		
		//update bobot dari term tersebut
		$resUpdateBobot = mysql_query("UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	} //end while $rowbobot

?>
<br><a href="index.php" button class="btn back" >Kembali </a></button> <br>
<center>
<h4 style="background-color:DodgerBlue">Agus Prastyo (15.01.53.0122) <br> Muhammad Zainurroziqin (15.01.53.0125) <br> M Ade Rahmat H (15.01.53.0130)</h4> 
</center>
<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_medium=website_roziqincapcus&amp;utm_content=footer_img"><img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"  alt="www.000webhost.com"></a></div></body>
</html>