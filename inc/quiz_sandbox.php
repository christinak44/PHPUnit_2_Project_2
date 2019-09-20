<?php

if (empty($page)) {
    session_destroy();
    $page = 1;
}
/*if (isset($_SESSION['answer'])) {
    $_SESSION['answer'][$page -1] = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING);

    var_dump($SESSION);
}*/
// Show which question they are on
// Show random question
// Shuffle answer buttons
/*$url = 'https://opentdb.com/api.php?amount=10&category=27&difficulty=medium&type=multiple';
$content = file_get_contents($url);
$json = json_decode($content, true);*/



$obj =
json_decode(file_get_contents('https://opentdb.com/api.php?amount=10&category=27&difficulty=medium&type=multiple'));
//if (is_object($results->response_code->results[0])) {
   //foreach ($results[0]->incorrect_answers[0]->results[0] as $option) {
   //$arr = $obj;
   //$questionSet1 = $arr[rand(0, count($arr) - 1_)];

$quiz= [$obj->results];
$questionSet = $quiz[0][3];
//echo $questionSet->question;


 $answer_choiceA = [correct_answer=>$questionSet->correct_answer];
 $answer_choiceB = [incorrect_answerA=>$questionSet->incorrect_answers[0]];
 $answer_choiceC = [incorrect_answerB=>$questionSet->incorrect_answers[1]];
 $answer_choiceD = [incorrect_answerC=>$questionSet->incorrect_answers[2]];
 $answer_choices = [$answer_choiceA, $answer_choiceB, $answer_choiceC, $answer_choiceD];
 shuffle($answer_choices);

 /*var_dump($answer_choices);
if(is_object($answer_choices)){

  echo 'yes';
}else{
  echo 'no';
};*/



    echo "<p class='breadcrumbs'>Question " . $page . " of 10</p>";


    echo "<form action='index.php?p=" . ($page+1) . "' method='post'>";
    echo "<input type='hidden' name='id' value='0' />";
    echo "<p class='quiz'> ". $questionSet->question . " </p>";
    echo "<input type='submit' class='btn' name='answer1' value=' " . implode($answer_choices[0]) . "'>";
    echo "<input type='submit' class='btn' name='answer2' value=' " . implode($answer_choices[1]) . "'>";
    echo "<input type='submit' class='btn' name='answer3' value=' " . implode($answer_choices[2]) . "'>";
    echo "<input type='submit' class='btn' name='answer4' value=' " . implode($answer_choices[3]) . "'>";
    echo "<input type='hidden' name='correct' value='" . $questions->correct_answer . "'>";
    echo "</form>";
