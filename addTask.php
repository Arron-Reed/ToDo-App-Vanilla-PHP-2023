<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>
    <title>Add New Task</title>
</head>
<body>
<section class="iPhone">

<?php
    include 'crud.php';
    ?>
    
    <div class="updateiPhoneScreen">

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="updateTaskForm">
            <label for="inputTitle">Task:</label><br>
            <input type="text" name="taskTitle" id="inputTitle" class="gap"><br>
            <label for="inputDescription">Description:</label><br>
            <input type="text" name="taskDescription" id="inputDescription" class="gap"><br>
            <label for="inputDone">Done: 0=No - 1=Yes</label><br>
            <input type="text" name="taskDone" id="inputDone" class="gap"><br>
            <label for="inputUser">User Nr:</label><br>
            <input type="text" name="userId" id="inputUser"><br>
            <input type="submit" value="Add Task" class="add">
        </form>
    </div>
    
    
        <?php
        if(isset($_POST["taskTitle"])){
            createTask($_POST["taskTitle"], $_POST["taskDescription"], $_POST["taskDone"], $_POST["userId"]);

            echo '<script>window.location="http://localhost/index.php"</script>';

        }
    
        ?>
  
  <a href="index.php" class="return">Return to Main Page >>></a>
    
</div>
    </section>
    </body>
    </html>