<?php


include 'db.php';

// Sanitera inkommande data

function sanitera($input)
{
    return htmlspecialchars(strip_tags($input)); 
}

// Create 

function createBook($title, $author, $price, $category)
{ 
    $conn = prepareDB();

    $title = sanitera($title);
    $author = sanitera($author);
    $price = sanitera($price);
    $category = sanitera($category);

    $query =<<<SQL
    INSERT INTO bok (`bokTitel`, `bokForfattare`, `bokBeskrivn`, `bokIsbn`, `bokPris`, `bokKategoriId`) 
    VALUES (:title,	:author,	NULL,	NULL,	:price,	:category)
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("title", $title);
        $stmt->bindParam("author", $author);
        $stmt->bindParam("price", $price);
        $stmt->bindParam("category", $category);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

// Get one (Read)

function getBook($bookId)
{
    $conn = prepareDB();

    $query =<<<SQL
    SELECT * FROM bok WHERE bokId=:bookId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("bookId", $bookId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll()[0];
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

// Get all (Read)

function getAllBooks()
{
    $conn = prepareDB();

    $query =<<<SQL
    SELECT * FROM bok;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}


// Update one
function updateBook($bookId, $updateTitle, $updateAuthor, $updatePrice)
{
    $conn = prepareDB();

    $query =<<<SQL
    UPDATE bok
    SET bokTitel=:updateTitle, bokForfattare=:updateAuthor, bokPris=:updatePrice
    WHERE bokId=:bookId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("bookId", $bookId);
        $stmt->bindParam("updateTitle", $updateTitle);
        $stmt->bindParam("updateAuthor", $updateAuthor);
        $stmt->bindParam("updatePrice", $updatePrice);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

}

// Delete one
function deleteBook($bookId)
{
    $conn = prepareDB();

    $query =<<<SQL
    DELETE FROM bok WHERE bokId=:bookId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("bookId", $bookId);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

// Get book-category relation

function getBookCategoryRelation()
{
    $conn = prepareDB();

    $query =<<<SQL
    SELECT bok.bokTitel, kategori.kategoriNamn
    FROM kategori
    INNER JOIN bok
    ON kategori.kategoriId = bok.bokKategoriId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

function getAverageBookPrice()
{
    $conn = prepareDB();

    $query =<<<SQL
    SELECT AVG(bokPris) AS bokMedelPris FROM bok;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll()[0];
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

?>