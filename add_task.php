<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the task name from the form
    $taskName = $_POST["task_name"];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "task_manager");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the new task into the database
    $sql = "INSERT INTO tasks (task_name) VALUES ('$taskName')";
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the index.php after successful addition
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
