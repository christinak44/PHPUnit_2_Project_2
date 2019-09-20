


<?php
// addition problems randomly created via rand function then assigned to array
$a = rand(0,10);
$b = rand(1,10);

$correct_answer = $a + $b;
$incorrect_1 = $correct_answer + rand(1,10);
$incorrect_2 = $correct_answer - rand(1,10);

$answer_choice = [$correct_answer, $incorrect_1, $incorrect_2];
// additional question genrators to increase skill/challenge level
$c = rand(0,50);
$d = rand(1,50);

$correct_answer1 = $c + $d;
$incorrect_3 = $correct_answer + rand(1,10);
$incorrect_4 = $correct_answer - rand(1,10);

$answer_choice1 = [$correct_answer1, $incorrect_3, $incorrect_4];
$e = rand(-10,50);
$f = rand(1,100);

$correct_answer2 = $e + $f;
$incorrect_5 = $correct_answer + rand(1,10);
$incorrect_6 = $correct_answer - rand(1,10);

$answer_choice2 = [$correct_answer2, $incorrect_5, $incorrect_6];




//https://opentdb.com/api.php?amount=10&category=18&difficulty=medium&type=multiple
