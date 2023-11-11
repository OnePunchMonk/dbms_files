<!-- update_schedule.php -->
<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow only Content-Type header

// Handle form submission and database operation here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $schedule_id = $_POST["schedule_id"];
    $room_id = $_POST["room_id"];
    $time = $_POST["time"];
    $days = $_POST["days"];

    // Perform database operation
    // Adjust the following lines based on your actual database operations
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE ClassSchedule 
                SET Room_ID = '$room_id', Time = '$time', Days = '$days' 
                WHERE Schedule_ID = '$schedule_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Schedule updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>