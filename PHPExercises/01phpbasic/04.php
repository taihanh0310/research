<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Create a simple HTML form and accept the user name and display the name through PHP echo statement
 * http://www.w3resource.com/php-exercises/php-basic-exercises.php
 */

?>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title> simple HTML </title>
    </head>
    <body>
        <fieldset>
            <legend>Simple form submit</legend>
            <form action="04.php" method="post">
                <h2> Please input your name: </h2>
                <input type="text" name="txtName"> <button type="submit">Submmit Name</button>
            </form>
        </fieldset>
    </body>
</html>
<?php
    if(isset($_POST)){
        if(isset($_POST['txtName']) && $_POST['txtName'] !== null){
            echo "<br> <b> " . $_POST['txtName'] ." </b>";
        }
    }
?>