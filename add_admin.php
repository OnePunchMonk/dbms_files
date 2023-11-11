<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500"); // Adjust the origin to match your frontend URL
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
// Handle admin signup and database operation here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform database operation
    // Adjust the following lines based on your actual database operations
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password (use a strong hashing algorithm)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Admins (Name, Username, Password) 
            VALUES ('$name', '$username', '$hashedPassword')";

    $response = array();

    if ($conn->query($sql) === TRUE) {
        $response["status"] = "success";
        $response["message"] = "Admin signup successful!";
    } else {
        $response["status"] = "error";
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }

    echo json_encode($response);

    $conn->close();
}
?>