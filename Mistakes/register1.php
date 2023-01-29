<?php
    include 'crud.php';

    if (isset($_POST['register'])) {

        $conn = prepareDB();

        $query =<<<SQL
        SELECT COUNT(*) FROM user WHERE userEmail=':email';
        SQL;

        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
//      $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare($query);
        $stmt->bindParam('userName', $userName);
        $stmt->bindParam('userEmail', $userEmail);
        $stmt->bindParam('userPassword', $userPassword);
        $stmt->execute();

        if ($query > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }

        if ($query == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                echo '<p class="success">Your registration was successful!</p>';
            } 
            
            else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>
    <title>Register</title>
</head>
<body>
<section class="iPhone">

 
    <div class="updateiPhoneScreen">

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="register-form">
            <label for="inputTitle">Username:</label><br>
            <input type="text" name="userName" id="inputuserName" class="gap"><br>
            <label for="inputPassword">Password:</label><br>
            <input type="password" name="userPassword" id="inputPassword" class="gap"><br>
            <input type="submit" value="Add User" class="add">
        </form>
    </div>
    
        <?php
        if(isset($_POST["userName"])){
            createUser($_POST["userName"], $_POST["userPassword"]);

        }

?>

<form method="post" action="" name="register-form">
<div class="username">
<label>Username</label>
<input type="text" name="userName" pattern="[a-zA-Z0-9]+" required />
</div>
<div class="email">
<label>Email</label>
<input type="email" name="userEmail" required />
</div>
<div class="password">
<label>Password</label>
<input type="password" name="userPassword" required />
</div>
<button type="submit" name="register" value="register">Register</button>
</form>

  <a href="home.php" class="return">Return to Main Page >>></a>
    
</div>
</section>
</body>
</html>
