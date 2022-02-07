
<?php
include ("database.php");?>

<?php session_start(); ?>
<?php
//check for the score
if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];

    $next = $number+1;

    //get total questions
    $query = "select * from questions";
    //get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;


    //get correct answer
    $query = "select * from choices where question_number = $number AND is_correct = 1";

    //get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    //get row
    $row = $result->fetch_assoc();

    //set correct choice
    $correct_choice = $row['id'];

    //compare
    if($correct_choice == $selected_choice)
    {//answer is right
        $_SESSION['score']++;

    }
//    if($correct_choice != $selected_choice){
//        $_SESSION['score']--;
//    }

    echo $total;

    //check if last question has arrived or not
    if($number == $total) {
        header("Location: final.php");
        exit();
    }else{
        header("Location: question.php?n=" .$next);

    }
//    echo $number. '<br>';
//    echo $selected_choice;
}
