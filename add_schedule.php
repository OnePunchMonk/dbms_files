<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST["course_id"];
    $faculty_id = $_POST["faculty_id"];
    $room_id = $_POST["room_id"];
    $time = $_POST["time"];
    $days = $_POST["days"];

    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO ClassSchedule (Course_ID, Faculty_ID, Room_ID, Time, Days) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisss", $course_id, $faculty_id, $room_id, $time, $days);

    $response = array('success' => false, 'message' => '');

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Schedule added successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . $stmt->error;
    }

    echo json_encode($response);

    $stmt->close();
    $conn->close();
}
?>