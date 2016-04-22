<?php

echo "
 Write a PHP script to print 'second' and Red from the following array
 Sample Data : 
 color = array ( 'color' => array ( 'a' => 'Red', 'b' => 'Green', 'c' => 'White'),
 'numbers' => array ( 1, 2, 3, 4, 5, 6 ),
 'holes' => array ( 'First', 5 => 'Second', 'Third'));";


$color = array ("color" => array ("a" => "Red", "b" => "Green", "c" => "White"),
    "numbers" => array (1, 2, 3, 4, 5, 6),
    "holes" => array ("First", 5 => "Second", "Third"));

//var_dump($color);
//var_dump($color['holes']['5']);
//var_dump($color['color']['a']);
//var_dump(array_values($color));
$result = array();
foreach ($color as $key => $arrs)
{
    foreach ($arrs as $key => $value)
    {
        switch ($value){
            case 'Red':
            case 'Second': {
                $result[] = [$key => $value];
                break;
            }
        }
    }
}

function searchKeyWork($kw, $arr){
    return array_search($kw, $arr);
}

var_dump($result);