<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>To Do List</title>
</head>
<body>

<?php
    include 'crud.php';
?>

<?php

/*
error_reporting(0);
*/

$saved_username = "oliver";
$saved_password = "1234";

$saved_username = "arron";
$saved_password = "5678";

$saved_username = "maria";
$saved_password = "98746";

$input_username = $_POST["username"];
$input_password = $_POST["password"];


if ($input_username == $saved_username && $input_password == $saved_password)
{
    echo "Hej Oliver";
}

else
{
    echo "Login Failed";
}
/*
echo "Vi har mottagit:<br>";
echo "Username: ".$username."<br>";
echo "Password: ".$password."<br>";
*/
?>

<a href="index2.php" > Hello </a>

    <h1>Hello there!</h1>

<div class="box">
    <h2>Add new book to collection</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <label for="inputTitle">Title:</label><br>
        <input type="text" name="bookTitle" id="inputTitle"><br>
        <label for="inputAuthor">Author:</label><br>
        <input type="text" name="bookAuthor" id="inputAuthor"><br>
        <label for="inputPrice">Price:</label><br>
        <input type="text" name="bookPrice" id="inputPrice"><br>
        <label for="inputCategory">Category:</label><br>
        <input type="text" name="bookCategory" id="inputCategory"><br>
        <input type="submit" value="Add book">
    </form>
</div>
    <?php

    if(isset($_POST["bookTitle"])){
        createBook($_POST["bookTitle"], $_POST["bookAuthor"], $_POST["bookPrice"], $_POST["bookCategory"]);
    }

    if(isset($_POST["updateTitle"])){
        updateBook($_POST["updateId"], $_POST["updateTitle"], $_POST["updateAuthor"], $_POST["updatePrice"]);
    }

    ?>
<div class="dogs">
    <h2>Books</h2>

    <?php

    if(isset($_GET["deleteId"]))
    {
        deleteBook($_GET["deleteId"]);
    }

    echo("<ul>");
    foreach(getAllBooks() as $book)
    {
        print("<li>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?showId=" . $book["bokId"] . "'>");
        print($book['bokTitel']);
        print("</a>");
        print(" - ");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?deleteId=" . $book["bokId"] . "' class='potato'>");
        print("[remove]");
        print("</a>");
        print("</li>");
    }
    echo("</ul>");

    ?>
</div>
    <?php
    if(isset($_GET["showId"]))
    {
        $book = getBook($_GET["showId"]);

        print("<h2>Selected book</h2>");
    ?>
       
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <label for="updateTitle">Title:</label><br>
        <input type="text" name="updateTitle" id="updateTitle" value="<? print($book["bokTitel"]) ?> "><br>
        <label for="updateAuthor">Author:</label><br>
        <input type="text" name="updateAuthor" id="updateAuthor" value="<? print($book["bokForfattare"]) ?> "><br>
        <label for="updatePrice">Price:</label><br>
        <input type="text" name="updatePrice" id="updatePrice" value="<? print($book["bokPris"]) ?> "><br>
        <input type="hidden" name="updateId" value="<? print($_GET["showId"]) ?>"><br>
        <input type="submit" value="Update book">
    </form>

    <?php
    }
    ?>

<?php
    echo "<p>Just nu kostar böcker i snitt: " . getAverageBookPrice()["bokMedelPris"] . "</p>";

    //GET RELATIONS

    echo "<h2>Book-kategorirelation</h2>";
    echo("<ul>");
    foreach(getBookCategoryRelation() as $book)
    {
        print("<li>");
        print($book['bokTitel']);
        print(" - ");
        print($book['kategoriNamn']);
        print("</li>");
    }
    echo("</ul>");

    ?>


</body>
</html>