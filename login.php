<?php
include("dbconnection.php");
$con = dbconnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the required parameter is set
    if (isset($_POST["username"])) {
        $username = $_POST["username"];

        // Validate user credentials (this is a simple example, you should hash passwords in a real-world scenario)
        $query = "SELECT * FROM anggota WHERE username = '$username'";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Check if there is a matching user
            if (mysqli_num_rows($result) > 0) {
                $response["success"] = true;
                $response["message"] = "Login successful";
            } else {
                $response["success"] = false;
                $response["message"] = "Invalid username";
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