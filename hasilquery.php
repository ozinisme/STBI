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

<br><br><br>
       <table id="rowhover" class="isi" width="99%">
      <tr>
        <th>
              No
          </th>
          <th>
              Nama File
          </th>
          <th>
              Token
          </th>
          <th>
              Tokenstem
          </th>
      </tr>
<?php
 
$servername = "localhost";
$username = "id7145683_admin";
$password = "ozinisme";
$dbname = "id7145683_databaseku";
$katakunci="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$nomor=1;
$hasil=$_POST['katakunci'];
//$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` where token like '%$hasil%'";
$sql = "SELECT DISTINCT nama_file,token,tokenstem FROM dokumen WHERE token LIKE '%$hasil%'";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "Nama file: " . $row["nama_file"]. " - Token: " . $row["token"]. " " . $row["tokenstem"]. "<br>";
		?>
	<tr>
            <td align="center">
               <?php echo $nomor++; ?>
            </td> 
            <td align="center">
                <?php echo $row['nama_file']; ?>
            </td>
            <td align="center">
                <?php echo $row['token']; ?>
            </td>
            <td align="center">
                <?php echo $row['tokenstem']; ?>
            </td>
        </tr>
        <?php
    }
    
    } else {
      ?>
      <td colspan="4">
                <?php echo "0 results"; ?>
            </td>
    
    </table>
    <?php
}

///
?>
</body>
<br><br><br><a href="index.php" button class="btn back" >Kembali </a></button> <br>
<center>
<h4 style="background-color:DodgerBlue">Agus Prastyo (15.01.53.0122) <br> Muhammad Zainurroziqin (15.01.53.0125) <br> M Ade Rahmat H (15.01.53.0130)</h4> 
</center>
<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_medium=website_roziqincapcus&amp;utm_content=footer_img"><img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"  alt="www.000webhost.com"></a></div></body>

</html>