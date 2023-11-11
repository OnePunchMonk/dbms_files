<?php
session_start();
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

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}

$student_id = $_SESSION['student_id'];

// Fetch attendance
$attendance_query = "SELECT * FROM attendance WHERE Student_ID = '$student_id'";
$attendance_result = mysqli_query($conn, $attendance_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Attendance</title>
    <style>
        <style>body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url(https://cdn.elearningindustry.com/wp-content/uploads/2018/11/8-prominent-features-every-course-management-system-should-have-e1541065121721.png);
            background-size: cover;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .menu {
            background-color: #eee;
            overflow: hidden;
        }

        .menu a {
            float: left;
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .menu a:hover {
            background-color: #ddd;
            color: #333;
        }

        .welcome-message {
            margin-top: 20px;
        }

        .container {
            text-align: center;
            margin-top: 50px;
        }

        .Homepage-img {
            /* Add your styling for the Homepage image if needed */
        }

        .h1 {
            margin-bottom: 20px;
        }
    </style>

    </style>


</head>

<body>
    <h2>View Attendance</h2>

    <table border="1">
        <tr>
            <th>Attendance ID</th>
            <th>Schedule ID</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($attendance_result)) { ?>
            <tr>
                <td>
                    <?php echo $row['Attendance_ID']; ?>
                </td>
                <td>
                    <?php echo $row['Schedule_ID']; ?>
                </td>
                <td>
                    <?php echo $row['Date']; ?>
                </td>
                <td>
                    <?php echo $row['Status']; ?>
                </td>
            </tr>
        <?php } ?>
    </table>

    <br>

    <nav class="menu">
        <a href="dashboard.php">Back to Dashboard</a>

        <a href="logout.php">Logout</a>
    </nav>


</body>

</html>