<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * $var = 'PHP Tutorial'. Put this variable into the title section, h3 tag and as an anchor text within a HTML document.
 */

/**
 * Sample Output :
 * PHP, an acronym for Hypertext Preprocessor, is a widely-used open source general-purpose scripting language. 
 * It is a cross-platform, HTML embedded server-side scripting language and is especially suited for web development.
 */

$var = "PHP Tutorial";

?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title><?php echo $var; ?></title>
    </head>
    <body>
        <h3 style="font-weight: bold; text-decoration: underline"><?php echo $var; ?></h3>
        <p>
            PHP, an acronym for Hypertext Preprocessor, is a widely-used open source general-purpose scripting language. It is a cross-platform, HTML embedded server-side scripting language and is especially suited for web development.
        </p>
    </body>
</html>