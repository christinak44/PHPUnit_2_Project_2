<?php
// quiz session creator
session_start();

include 'inc/question_set.php';

$total = 10;
$question = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
if (empty ($question)){

  session_destroy();
  $score = 0;
  $question = 1;
}
//tracks answers upon submission
if(isset($_POST['selection'])){
   $_SESSION['selection'][$question-1] = filter_input(INPUT_POST, 'selection', FILTER_SANITIZE_STRING);


}
if (isset($_POST['correct'])) {
        $_SESSION['correct'] = filter_input(INPUT_POST, 'correct', FILTER_SANITIZE_NUMBER_INT);
}

if($question > $total){
   header('location: inc/complete.php');
   exit;

}

//site interaction code
shuffle($answer_choice);
echo "<p class='breadcrumbs'>Question " . $question . " of " . $total . "</p>";

echo '<form method = "post" action="index.php?p='. ($question+1) . '" />';
//echo "<input type='hidden' name='begin' value='0' />";
echo "<p class='quiz'> Solve " . $a . "+" . $b . "= </p>";
echo "<input type='submit' class='btn' name='selection' value=' " . $answer_choice[0] . "'>";
echo "<input type='submit' class='btn' name='selection' value=' " . $answer_choice[1] . "'>";
echo "<input type='submit' class='btn' name='selection' value=' " . $answer_choice[2] . "'>";
echo "<input type='hidden' name='correct' value='" . $correct_answer . "'>";
//answer validation with toast 
if ($_SESSION['selection'][$question-1] == $_SESSION['correct'] AND isset($_POST['selection'])){
  $toast = ["Right!", "You Got It!", "Keep It Up!"];
  shuffle($toast);
  echo "<p class='breadcrumbs'>" . implode(array_slice($toast, 2)) . "</p>";
  $_SESSION['score'] += 1;

} elseif ($_SESSION['selection'][$question-1] != $_SESSION['correct'] AND isset($_POST['selection'])){
  $toastIncorrect = ["Darn!", "Maybe Next Time!", "Sorry!"];
  shuffle($toastIncorrect);
  echo "<p class='breadcrumbs'>" . implode(array_slice($toastIncorrect, 2)) . "</p>";
   }
