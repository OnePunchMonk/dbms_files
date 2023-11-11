<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $student_name = $_POST["student_name"];
    $contact_info = $_POST["contact_info"];
    $major = $_POST["major"];
    $graduation_year = $_POST["graduation_year"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // Perform database operation
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Students (Student_Name, Contact_Info, Major, Graduation_Year, Password) 
            VALUES ('$student_name', '$contact_info', '$major', '$graduation_year', '$password')";

    $response = array();

    if ($conn->query($sql) === TRUE) {
        $response["status"] = "success";
        $response["message"] = "Student added successfully!";
    } else {
        $response["status"] = "error";
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }

    echo json_encode($response);

    $conn->close();
}
?>