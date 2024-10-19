<?php 

function shortText($text,$chart = 409){
    $text = $text. " ";
    $text = substr($text, 0, $chart);
    $text = substr($text, 0, strrpos($text, " "));
    $text = $text . ".....";
    return $text;
    
}
?>