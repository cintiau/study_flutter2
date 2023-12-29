<?php
include("../dbconnection.php");
$con=dbconnection();

if(isset($_POST["id"]))
{
    $id=$_POST["id"];
}
else return;

$query="delete from detail_kategori where id_detail=$id";
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