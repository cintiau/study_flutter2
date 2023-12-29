<?php
include("../dbconnection.php");
$con=dbconnection();

$query="select * from kategori";
$exe=mysqli_query($con, $query);

$arr=[];
while ($row=mysqli_fetch_array($exe)) {
	$arr[]=$row;
}
print(json_encode($arr));

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>db</title>
</head>
<body>

</body>
</html>