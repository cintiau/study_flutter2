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

if(isset($_POST["asal_daerah"]))
{
    $asal_daerah=$_POST["asal_daerah"];
}
else return;

if(isset($_POST["id_kategori"]))
{
    $id_kategori=$_POST["id_kategori"];
}
else return;
if(isset($_POST["detail_daerah"]))
{
    $detail_daerah=$_POST["detail_daerah"];
}
else return;

$path="upload/$name";

$query="insert into detail_kategori(id_kategori, nama_daerah, foto_daerah, asal_daerah, detail_daerah) values ('$id_kategori','$cap','$path','$asal_daerah', '$detail_daerah')";
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