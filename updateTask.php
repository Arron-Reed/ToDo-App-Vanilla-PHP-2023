<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>
    <title>Update Task</title>
</head>
<body>
<section class="iPhone">

<?php
    include 'crud.php';

    error_reporting(0);

    $task = getTask($_GET["showtaskId"]);
?>
<div class="updateiPhoneScreen">

<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="updateTaskForm">
        <label for="updatetaskTitle">Task:</label><br>
        <input type="text" name="updatetaskTitle" id="updatetaskTitle" value="<? print($task["taskTitle"]) ?>" class="gap"><br>
        <label for="updatetaskDescription">Description:</label><br>
        <input type="text" name="updatetaskDescription" id="updatetaskDescription" value="<? print($task["taskDescription"]) ?>" class="gap"><br>
        <label for="updatetaskTitle">Done: 0=No - 1=Yes</label><br>
        <input type="text" name="updatetaskDone" id="updatetaskDone" value="<? print($task["taskDone"]) ?>" class="gap"><br>
        <label for="updateuserId">User nr:</label><br>
        <input type="text" name="updateuserId" id="updateuserId" value="<? print($task["userId"]) ?> "><br>
        <input type="hidden" name="updatetaskId" value="<? print($_GET["showtaskId"]) ?>"><br>
        <input type="submit" value="Update Task" class="update">
    </form>



<?php
    if(isset($_POST["updatetaskTitle"])){
        updateTask($_POST["updatetaskId"], $_POST["updatetaskTitle"], $_POST["updatetaskDescription"], $_POST["updatetaskDone"], $_POST["updateuserId"]);
    
       echo '<script>window.location="http://localhost/index.php"</script>';
    }
?>
<a href="index.php" class="return">Return to Main Page >>></a>

</div>
</section>
</body>
</html>