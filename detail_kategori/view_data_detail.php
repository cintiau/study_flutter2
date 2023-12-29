<?php
include("../dbconnection.php");
$con=dbconnection();

$id = $_GET['id'];

$query="select * from detail_kategori inner join kategori on kategori.id_kategori =  detail_kategori.id_kategori where detail_kategori.id_kategori = $id;";
$exe=mysqli_query($con, $query);

$arr=[];
while ($row=mysqli_fetch_array($exe)) {
	$arr[]=$row;
}
print(json_encode($arr));

?>