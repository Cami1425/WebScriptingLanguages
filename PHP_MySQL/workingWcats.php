<?php
    require_once 'login.php'; // file containing login details to the database

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $query = "INSERT INTO cats VALUES(NULL, 'Lion', 'Leo', 4)";
$result = $pdo->query($query);
    $query = "INSERT INTO cats VALUES(NULL, 'Cougar', 'Growler', 2)";
$result = $pdo->query($query);
    $query = "INSERT INTO cats VALUES(NULL, 'Cheetah', 'Charly', 3)";
    $result = $pdo->query($query);


    $query = "SELECT * FROM cats";
    $result = $pdo->query($query);

    echo "<table><tr><th>Id</th><th>Family</th><th>Name</th><th>Age</th></tr>";

    while ($row = $result->fetch(PDO::FETCH_NUM))
    {
        echo "<tr>";
        for ($k = 0; $k < 4; ++$k)
            echo "<td>".htmlspecialchars($row[$k])."</td>";
        echo"</tr>";
    }

    echo"</table>";

?>