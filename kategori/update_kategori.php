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

$query="update kategori set nama_kategori='$nama_kategori' where id_kategori=$id_kategori";

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