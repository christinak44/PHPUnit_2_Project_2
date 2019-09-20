<?php
session_start();
$selection1 = htmlspecialchars($_SESSION['selection'][1]);
$selection2 = htmlspecialchars($_SESSION['selection'][2]);
$selection3 = htmlspecialchars($_SESSION['selection'][3]);
$selection4 = htmlspecialchars($_SESSION['selection'][4]);
$selection5 = htmlspecialchars($_SESSION['selection'][5]);
$selection6 = htmlspecialchars($_SESSION['selection'][6]);
$selection7 = htmlspecialchars($_SESSION['selection'][7]);
$selection8 = htmlspecialchars($_SESSION['selection'][8]);
$selection9 = htmlspecialchars($_SESSION['selection'][9]);
$selection10 = htmlspecialchars($_SESSION['selection'][10]);


if(isset($_SESSION['selection'][10])){

echo "<h1> Final Score: " . $_SESSION['score'] . " out of 10</h1>";

if($_SESSION['score']>= 7){

echo "<h2> Great Job, You're a Math SuperStar!! </h2>";

} else{

echo "<h2> Keep Practicing! </h2>";

}

echo "<form action='/index.php' method='post'>";
echo "<input type='submit' class='btn' name='Retest' value='Play Again'>";
echo "</form>";
}
