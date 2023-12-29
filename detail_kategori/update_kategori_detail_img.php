<?php
include("../dbconnection.php");
$con=dbconnection();

if(isset($_POST["nama_daerah"]))
{
    $nama_daerah=$_POST["nama_daerah"];
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

if(isset($_POST["detail_daerah"]))
{
    $detail_daerah=$_POST["detail_daerah"];
}
else return;

if(isset($_POST["id_detail"]))
{
    $id_detail=$_POST["id_detail"];
}
else return;

$path="upload/$name";
$query="update detail_kategori set nama_daerah='$nama_daerah', foto_daerah='$path', asal_daerah='$asal_daerah', detail_daerah='$detail_daerah' where id_detail='$id_detail'";
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