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

<section class="iPhone">

<?php
    include 'crud.php';
?>

<div class="iPhoneScreen">

    <?php

    if(isset($_GET["deletetaskId"]))
    {
        deleteTask($_GET["deletetaskId"]);
    }

    echo("<ul class='taskContainer'>");


foreach(getAllTasks() as $task)
    {

        print("<li>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='task-button'>");
        print($task['taskTitle']);
        print("</a></br>");
        print("<p='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='task-description'>");
        print($task['taskDescription']);
        print("</p>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?taskDone=" . $task["taskId"] . "' class='done-button'>");
        print("Mark as done");
        print("</a>");
        print(" - ");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?deletetaskId=" . $task["taskId"] . "' class='remove-button'>");
        print("[remove]");
        print("</a>");
        print("</li>");
    }
    echo("</ul>");

    ?>

<a href="addTask.php" class="addTask">Add New Task</a>

</div>


    <?php
    if(isset($_GET["taskDone"]))
    {
        markAsDone($_GET["taskDone"]);

        print("<h2>TaDa</h2>");
    }
    ?>
</section>
</body>
</html>