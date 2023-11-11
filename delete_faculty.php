<!-- delete_faculty.php -->
<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only Content-Type header

// Handle form submission and database operation here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $faculty_id = $_POST["faculty_id"];

    // Perform database operation
    // Adjust the following lines based on your actual database operations
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM faculty WHERE Faculty_ID = '$faculty_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Faculty deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>