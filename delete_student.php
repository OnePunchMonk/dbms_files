<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only Content-Type header
header("Content-Type: application/json");

// Handle form submission and database operation here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $student_id = $_POST["student_id"];

    // Perform database operation
    // Adjust the following lines based on your actual database operations
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM Students WHERE Student_ID = '$student_id'";

    $response = array();

    if ($conn->query($sql) === TRUE) {
        $response["status"] = "success";
        $response["message"] = "Student deleted successfully!";
    } else {
        $response["status"] = "error";
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Debugging statement - remove or comment out in production
    // var_dump($response);

    echo json_encode($response);

    $conn->close();
}
?>