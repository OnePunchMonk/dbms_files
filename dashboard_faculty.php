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
    <div class="header-div">
        <header class="header">
            <hr style="width:80%">
            <a href="index.html">Home</a>
        </header>
        <center>
            <nav class="menu">
                <a href="add_grade.html">Add Grade</a>
                <a href="add_attendance.html">Add Attendance</a>
            </nav>
            <div class="welcome-message">
                <?php
                // Check if the name parameter is set in the URL
                if (isset($_GET["name"])) {
                    $name = $_GET["name"];
                    echo "<h1>Welcome, $name!</h1>";
                } else {
                    echo "<p>Invalid access to this page.</p>";
                }
                ?>
            </div>
        </center>
    </div>

    <div class="container">
        <div class="Homepage-img">

        </div>

        <div class="h1">
            <h1>Welcome to Faculty dashboard</h1>
        </div>

        You can access any information regarding student attendance and grades.

    </div>
</body>

</html>