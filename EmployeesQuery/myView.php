<?php
    include_once './INCLUDES/myHeader.html';
    require_once 'myConnect.php'; // file containing login details to the database

    try {
        $pdo = new PDO($attr, DB_USER, DB_PASSWORD, $opts);
    }
    catch (PDOException $e)
    {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    // Building and executing a query - send query to MySQL from PHP
    $query = "USE employees";
    $query = "SELECT id, first_name, last_name, city, hourly_pay_rate, f_name FROM staff NATURAL JOIN managers ORDER BY id";
    $result = $pdo->query($query);

    if ($result->rowCount() > 0) {
        echo "<table><tr> <th>Employee ID</th> <th>First Name</th> <th>Last Name</th> <th>City</th> <th>Pay Rate</th> <th>Manager Last Name</th></tr>";

        //Fetching results_ one row at a time
        while ($row = $result->fetch()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['city']) . "</td>";
            echo "<td>" . htmlspecialchars($row['hourly_pay_rate']) . "</td>";
            echo "<td>" . htmlspecialchars($row['f_name']) . "</td>";
            echo "</tr>";
        }
            // Close the table
            echo "</table>";
    } else {
        // Error message if no records are returned
        echo "There are currently no staff members in the database.";
    }
    // Close the database connection
    $pdo = null;

    include_once './INCLUDES/myFooter.html';
?>


