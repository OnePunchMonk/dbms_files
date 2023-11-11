<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}

$student_id = $_SESSION['student_id'];
$student_name = $_SESSION['Student_Name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
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

</head>



<body>
    <h2>Welcome, Student
        <?php echo $student_id; ?>
        <?php echo $student_name; ?>
    </h2>

    <h3>Dashboard Options:</h3>
    <center>
        <nav class="menu">
            <a href="view_grades.php">View Grade</a>
            <a href="view_attendance.php">View Attendance</a>
            <a href="logout.php">Logout</a>
        </nav>
        <div class="welcome-message">

        </div>
    </center>


    <!-- <ul>
        <li><a href="view_attendance.php">View Attendance</a></li>
        <li><a href="view_grades.php">View Grades</a></li>
    </ul>

    <br>
    <a href="logout.php">Logout</a> -->
</body>

</html>