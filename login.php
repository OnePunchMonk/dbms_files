<?php
session_start();

// Database connection parameters
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "course_manag";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    // Fetch the hashed password from the database based on the provided student_id
    $query = "SELECT * FROM students WHERE Student_ID = '$student_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["Password"];

        // Verify the entered password against the hashed password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['student_id'] = $student_id;
            $_SESSION['Student_Name'] = $row["Student_Name"];
            header("Location: dashboard.php");
        } else {
            $error = "Invalid Student ID or Password";
        }
    } else {
        $error = "Invalid Student ID or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
    <?php if (isset($error)) {
        echo "<p>$error</p>";
    } ?>
</body>

</html>