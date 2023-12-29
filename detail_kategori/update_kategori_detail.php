<?php
include("../dbconnection.php");
$con=dbconnection();

if(isset($_POST["nama_daerah"]))
{
    $nama_daerah=$_POST["nama_daerah"];
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

$query="update detail_kategori set nama_daerah='$nama_daerah',  asal_daerah='$asal_daerah', detail_daerah='$detail_daerah' where id_detail=$id_detail";

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