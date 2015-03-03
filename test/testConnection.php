<?php

$host = 'daneel'; 
$database = 'john'; 
$username = 'john'; 
$password = 'secret'; 
$dsn = 'mysql:dbname='.$database.";host=".$host;

$connection = new PDO($dsn, $username, $password);

$sqlQuery = 'SELECT * FROM users';

$statement = $connection->query($sqlQuery);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($connection && $statement) { 
            echo '<table>';
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['password'] . '</td>';
                echo '<td>' . $row['role'] . '</td>';
                echo '<tr>';
                
                $row = $statement->fetch();
            }
            echo '</table>';
        }
        ?>
    </body>
</html>
