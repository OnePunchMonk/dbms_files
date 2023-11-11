<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only Content-Type header


// Handle form submission and database operation here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $course_name = $_POST["course_name"];
    $description = $_POST["description"];
    $credits = $_POST["credits"];
    $prerequisites = $_POST["prerequisites"];
    $syllabus = $_POST["syllabus"];
    $textbooks = $_POST["textbooks"];

    // Perform database operation
    // Adjust the following lines based on your actual database operations
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Courses (Course_Name, Description, Credits, Prerequisites, Syllabus, Textbooks) 
            VALUES ('$course_name', '$description', '$credits', '$prerequisites', '$syllabus', '$textbooks')";

    if ($conn->query($sql) === TRUE) {
        echo "Course added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>