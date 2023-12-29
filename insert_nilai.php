<?php

include("dbconnection.php");
$con = dbconnection();

// Initialize response array
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the required parameters are set
    if (isset($_POST["username"]) && isset($_POST["nilai"])) {
        $username = $_POST["username"];
        $nilai = $_POST["nilai"];

        // Check if the user already exists in the 'nilai' table of the 'anggota' database
        $checkUserQuery = "SELECT * FROM anggota.nilai WHERE username = '$username'";
        $checkUserResult = mysqli_query($con, $checkUserQuery);

        if ($checkUserResult) {
            // If the user exists, update the 'nilai' column
            if (mysqli_num_rows($checkUserResult) > 0) {
                $updateQuery = "UPDATE anggota.nilai SET nilai = '$nilai' WHERE username = '$username'";
                $updateResult = mysqli_query($con, $updateQuery);

                if ($updateResult) {
                    $response["success"] = true;
                    $response["message"] = "Nilai updated successfully";
                } else {
                    $response["success"] = false;
                    $response["message"] = "Error updating query: " . mysqli_error($con);
                }
            } else {
                $response["success"] = false;
                $response["message"] = "User not found in the 'nilai' table";
            }
        } else {
            $response["success"] = false;
            $response["message"] = "Error executing query: " . mysqli_error($con);
        }
    } else {
        $response["success"] = false;
        $response["message"] = "Invalid parameters";
    }
} else {
    $response["success"] = false;
    $response["message"] = "Invalid request method";
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>