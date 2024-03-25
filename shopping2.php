<!DOCTYPE html>
<html>
<head>
    <title>PHP Table Example</title>
</head>
<body>

<?php
// Sample data for the table
$students = array(
    array("John", "Doe", 20),
    array("Jane", "Smith", 22),
    array("Tom", "Jones", 21)
);
?>

<h2>Student Information</h2>

<table border="1">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student[0]; ?></td>
            <td><?php echo $student[1]; ?></td>
            <td><?php echo $student[2]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html> 