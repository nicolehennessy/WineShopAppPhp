<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require "styles.php" ?>
        <script type="text/javascript" src="js/wine.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        
        
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <div class="container">
            <div class="rowHome">
                <div class="homeInfo col-md-8">
                    <h2>WINE SHOP CASE STUDY</h2>
                    <p>A wine shop wants to build a website to sell wines online to its 
                    customers. For each wine, the name of the wine, a description of the 
                    wine, the year the wine was made, the type of wine (red, white, rose,
                    sparkling, dessert, fortified), and ideal serving temperature needs 
                    to be recorded. Each wine comes from a particular winery. For each 
                    winery, the name, address, contact name, contact phone number, 
                    contact email address, and website address need to be recorded.
                    Each winery can produce several wines.</p>
                    <hr></hr>
                    <p>The company also needs to record the type of grapes used to make 
                    each wine. Each wine can be made from several different types of 
                    grapes. Each grape type can be used in several different types of
                    wine. For each wine, the percentage of each grape type in that wine
                    needs to be recorded. For each grape type, the name of the grape type, 
                    its country of origin, and a description need to be recorded.</p>
                    <hr></hr>
                    <p>Finally, the company wants to allow customers to leave comments 
                    about the wines the shop sells. For each comment, the following 
                    details need to be recorded: the title of the comment, the body of 
                    the comment, the date and time that the comment was made, and the 
                    name of the person leaving the comment.</p>
                </div>
            </div>
        </div>

        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>