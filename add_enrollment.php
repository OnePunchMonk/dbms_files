<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Handle form submission and database operation here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $student_id = $_POST["student_id"];
    $course_id = $_POST["course_id"];

    // Perform database operation
    // Adjust the following lines based on your actual database operations
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Enrollment (Student_ID, Course_ID) 
            VALUES ('$student_id', '$course_id')";

    $response = array(); // Initialize an empty array for the response

    if ($conn->query($sql) === TRUE) {
        $response["status"] = "success";
        $response["message"] = "Enrollment added successfully";
    } else {
        $response["status"] = "error";
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    echo json_encode($response); // Send the response in JSON format
}
?>