<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .content {
            display:flex;
            justify-content: center;
            padding: 40px;
            background-color: beige;
            border-radius: 25px;
            width: 100%;
            margin: 20px;

        }

        h2 {
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .delete-button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #0066cc;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Task Manager</h1>
    <div class="content">
        <div class="main">
        <h2>Tasks:</h2>
        <ul>
            <?php
            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "task_manager");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch tasks from the database
            $sql = "SELECT * FROM tasks";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>" . $row["task_name"] . " - " . $row["created_at"] . " <button class='delete-button'><a href='delete_task.php?id=" . $row["id"] . "' style='text-decoration: none; color: #fff;'>Delete</a></button></li>";
                }
            } else {
                echo "<li>No tasks found.</li>";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </ul>

        <h2>Add New Task:</h2>
        <form action="add_task.php" method="post">
            <input type="text" name="task_name" required>
            <input type="submit" value="Add Task">
        </form>
        </div>
    </div>
</body>
</html>
