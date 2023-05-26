<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>

    <title>To Do List</title>
</head>
<body>
    <div class="top">
    </div>
    <div class="iPhone">
        <div>
            <a href="addTask.php" class="addTask">Add New Task</a>
        </div>
            <?php
                include 'crud.php';
            ?>

            <div class="iPhoneScreen">
                <div class="iPhoneHeader">
                    <a href="doneTasks.php" class="done-tasks">All Completed Tasks</a>
                </div>
            
                <?php
// Calling if the Delete button is pushed to run 'deleteTask' function 
                if(isset($_GET["deletetaskId"])) {

                    deleteTask($_GET["deletetaskId"]);
                }


// Calling if the TaskDone button is pushed to run 'TaskDone' function
                if(isset($_GET["taskDone"])) {
                    markAsDone($_GET["taskDone"]);
                }


// Calling if the Edit button is pushed to run 'edit/update' function

                if(isset($_GET["showtaskId"])) {
                    $task = getTask($_GET["showtaskId"]);
                    echo '<script>window.location="http://localhost/updateTask.php?showtaskId='.$task["taskId"].'"</script>';
                }

                echo("<ul class='taskContainer'>");

                    foreach(getAllTasks() as $task) {
                        print("<div class='taskBox'>");
                        print("<li>");
                        print("<a href='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='task'>");
                        print($task['taskTitle']);
                        print("</a>");
                        print("<a href='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='description'>");
                        print($task['taskDescription']);
                        print("</a><div class=buttonBox>");
                        print("<a href='" . $_SERVER["PHP_SELF"] . "?taskDone=" . $task["taskId"] . "' class='font'>");
                        print("<button type='button' class='done-button'>Done</button>");
                        print("</a>");
                        print("<a href='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='font'>");
                        print("<button type='button' class='edit-button'>Edit</button>");
                        print("</a>");
                        print("<a href='" . $_SERVER["PHP_SELF"] . "?deletetaskId=" . $task["taskId"] . "' class='font'>");
                        print("<button type='button' class='remove-button'>Delete</button>");
                        print("</a>");

                        print("</a></div>");

                        print("</li>");
                        print("</div>");
                    }
                echo("</ul>");

                ?>

            </div>
            
        </div>
    
</body>
</html>