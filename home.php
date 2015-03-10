<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/wine.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>Welcome</h2>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <p>A software company employs many wines. For each wine, the
            company needs to record the following details: name, email address,
            mobile phone number, staff number, a description of their skill set,
            and salary. Each wine is assigned a manager. Each manager may
            be assigned a number of wines. For each manager, the company
            needs to record the manager’s name, their office number, and their
            extension number.</p>

        <p>Each wine will be given one or more computers to use. Each computer
            will be assigned at most one wine. For each computer, the company
            needs to record the make and model of the computer, the operating system
            it uses, and date the computer was bought, and the purchase price of the
            computer.</p>

        <p>Each wine can be assigned to work on a number of projects. Each
            project can have a number of wines assigned to it. For each project,
            the company needs to record the name of the client the project is for, a
            description of the project requirements, and the start date and proposed
            end date for the project. For each assignment of a wine to a project,
            the date of the assignment needs to be recorded, along with the number of
            hours per week the wine should spend on that project.</p>

        <?php require 'footer.php'; ?>
    </body>
</html>