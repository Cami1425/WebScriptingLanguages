<?php
    require_once 'login.php'; // file containing login details to the database

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch (PDOException $e)
    {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
?>

<?php // Building and executing a query - send query to MySQL from PHP
    $query = "SELECT * FROM classics";
    $result = $pdo->query($query);

    //Fetching results_ one row at a time- using FETCH_BOTH that creates an associative array
    while ($row = $result->fetch(PDO::FETCH_BOTH)) {
        echo 'Author: ' . htmlspecialchars($row ['author']) . "<br>";
        echo 'Title: ' . htmlspecialchars($row ['title']) . "<br>";
        echo 'Category: ' . htmlspecialchars($row ['category']) . "<br>";
        echo 'Year: ' . htmlspecialchars($row ['year']) . "<br>";
        echo 'ISBN: ' . htmlspecialchars($row ['isbn']) . "<br><br>";
    }

    $pdo = null;
?>



