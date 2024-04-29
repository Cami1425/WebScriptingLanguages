<?php
    require_once 'login.php'; // file containing login details to the database

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $query = 'CREATE TABLE cats(
        id SMALLINT NOT NULL AUTO_INCREMENT,
        family VARCHAR(32) NOT NULL,
        name VARCHAR(32) NOT NULL, 
        age TINYINT NOT NULL, 
        PRIMARY KEY(id)
        )';

    $result = $pdo->query($query);

    $query = "DESCRIBE cats";
    $result = $pdo->query($query);

    echo "<table><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";

    while ($row = $result->fetch(PDO::FETCH_NUM))
    {
        echo "<tr>";
        for ($k = 0; $k < 4; ++$k)
            echo "<td>".htmlspecialchars($row[$k])."</td>";
        echo"</tr>";
    }

    echo"</table>";
?>
