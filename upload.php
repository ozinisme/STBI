<html>
<head><title>Form Upload</title>
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

<h3>FORM UPLOAD</h3>
<form enctype="multipart/form-data" method="POST" action="hasil_upload.php">
File yang di upload : <input type="file" name="fupload"><br>
Deskripsi File : <br>
<textarea name="deskripsi" rows="8" cols="40"></textarea><br>
<input type=submit value=Upload>
</form>

<br><br><br>
<a href="index.php" button class="btn back" >Kembali </a></button> <br>
<center>
<h4 style="background-color:DodgerBlue">Agus Prastyo (15.01.53.0122) <br> Muhammad Zainurroziqin (15.01.53.0125) <br> M Ade Rahmat H (15.01.53.0130)</h4> 
</center>
</body>