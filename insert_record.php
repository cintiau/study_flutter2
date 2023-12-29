<?php
include("dbconnection.php");
$con=dbconnection();

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

$query="insert into anggota (username, kelas) values('$username', '$kelas')";
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