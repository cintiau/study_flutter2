<?php
include("../dbconnection.php");
$con=dbconnection();

if(isset($_POST["id_kategori"]))
{
    $id_kategori=$_POST["id_kategori"];
}
else return;
if(isset($_POST["nama_kategori"]))
{
    $nama_kategori=$_POST["nama_kategori"];
}
else return;
if(isset($_POST["data"]))
{
    $data=$_POST["data"];
}
else return;

if(isset($_POST["name"]))
{
    $name=$_POST["name"];
}
else return;

$path="upload/$name";
$query="update kategori set nama_kategori='$nama_kategori', foto_kategori='$path' where id_kategori=$id_kategori";
file_put_contents($path,base64_decode($data));

$exe=mysqli_query($con,$query);
$arr=[];
if($exe)

{
    $arr["success"]="true";
}
else{
    $arr["success"]="false";
}
print(json_encode($arr));
?>