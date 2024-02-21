<?php

/*
 * 0,2,4,6,8,10
 * 1,3,5,7,9
 * If lands on odd, it is Tails, if even it is HEads
 * One flip is half rotation
 *
 */
$itAmount = 10;
$startAtHeads = true; // We know heads is pointing up
$endAtHeads = true; // As long as coin is not flipped, this is true
$currSide = '';
$minFlips = 0;
$maxFlips = 10;
$resultsArray = array();
$oddNumbers = 0;
$evenNumbers = 0;

for ($x = 0; $x <= $itAmount; $x++) {
    $flips = rand($minFlips,$maxFlips);
    //$resultsArray[] = $flips;
    //echo $flips.',';
    if ($flips % 2 == 0) {
        $evenNumbers++;
    }
    else {
        $oddNumbers++;
    }
}
echo '<p>Even: '.$evenNumbers.'<p>';
echo '<p>Odd: '.$oddNumbers.'<p>';

?>