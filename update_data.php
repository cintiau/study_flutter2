<?php
include("dbconnection.php");
$con=dbconnection();

if(isset($_POST["id_anggota"]))
{
    $id_anggota=$_POST["id_anggota"];
}
else return;
if(isset($_POST["username"]))
{
    $username=$_POST["username"];
}
else return;
if(isset($_POST["kelas"]))
{
    $kelas=$_POST["kelas"];
}
else return;

$query="update anggota set 
username='$username', kelas='$kelas' where id_anggota=$id_anggota";

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