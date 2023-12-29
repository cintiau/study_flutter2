<?php

include("../dbconnection.php");
$con=dbconnection();

if(isset($_POST["caption"]))
{
    $cap=$_POST["caption"];
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

$query="insert into kategori(nama_kategori, foto_kategori) values ('$cap','$path')";
file_put_contents($path,base64_decode($data));

$exe=mysqli_query($con,$query);
$arr=[];
if($exe){
    $arr["success"]="true";
}
else{
    $arr["success"]="false";
}
print(json_encode($arr));

?>