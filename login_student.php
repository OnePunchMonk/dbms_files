<link rel="stylesheet" href="style.css" />
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get user_id and password from the submitted form
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];

    // Query to fetch user information based on user_id
    $sql = "SELECT * FROM students WHERE Student_ID = '$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["Password"];

        // Verify the provided password against the hashed password in the database
        if (password_verify($password, $hashed_password)) {
            // Password is correct, user is authenticated

            //echo "Login successful. Welcome, " . $row["first_name"] . " " . $row["last_name"];
            header("Location: dashboard.php?name=" . urlencode($row["Student_Name"]));

            echo "Login successful. Welcome, " . $row["Student_Name"];

        } else {
            // Incorrect password
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User not found
        echo "User not found. Please check your user_id.";
    }

    // Close the database connection
    $conn->close();
}
?>