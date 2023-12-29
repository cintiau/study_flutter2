<?php
include("dbconnection.php");
$con=dbconnection();

if(isset($_POST["id"]))
{
    $id=$_POST["id"];
}
else return;

$query="delete from anggota where id_anggota=$id";
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