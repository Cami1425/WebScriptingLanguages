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

?>


