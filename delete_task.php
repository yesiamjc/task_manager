<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Get the task ID from the URL
    $taskId = $_GET["id"];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "task_manager");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete the task from the database
    $sql = "DELETE FROM tasks WHERE id='$taskId'";
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the index.php after successful deletion
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
