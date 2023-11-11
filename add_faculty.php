<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_name = $_POST["faculty_name"];
    $contact_info = $_POST["contact_info"];
    $department = $_POST["department"];
    $office_location = $_POST["office_location"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Faculty (Faculty_Name, Contact_Info, Department, Office_Location, Password) 
            VALUES ('$faculty_name', '$contact_info', '$department', '$office_location', '$password')";

    $response = array();

    if ($conn->query($sql) === TRUE) {
        $response["status"] = "success";
        $response["message"] = "Faculty added successfully!";
    } else {
        $response["status"] = "error";
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }

    echo json_encode($response);

    $conn->close();
}
?>