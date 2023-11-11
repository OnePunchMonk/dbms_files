<?php

header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only Content-Type header

// Handle form submission and database operation here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $schedule_id = $_POST["schedule_id"];
    $student_id = $_POST["student_id"];
    $date = $_POST["date"];
    $status = $_POST["status"];

    // Perform database operation
    // Adjust the following lines based on your actual database operations
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Attendance (Schedule_ID, Student_ID, Date, Status) 
            VALUES ('$schedule_id', '$student_id', '$date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Attendance added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>