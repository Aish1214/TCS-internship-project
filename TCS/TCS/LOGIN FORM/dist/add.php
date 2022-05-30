<?php
include 'database.php';
?>



<?php
    if(isset($_POST['submit']))
    {//get post variables
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];


        $correct_choice = $_POST['correct_choice'];
        //choices array
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];

        //question query it is
        $query = "insert into questions (question_number, text)
                        VALUES ('$question_number','$question_text')";

        //run this query
        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

        //Validating insertion process

        if($insert_row)
        {
            foreach ($choices as $choice => $value){
                if($value != '')
                {
                    if($correct_choice == $choice){
                        $is_correct = 1;
                    }else{
                        $is_correct = 0;
                    }
                    //choice query
                    $query = "insert into choices (question_number,is_correct,text) values ('$question_number', '$is_correct', '$value')";

                    //run query
                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    //Validating insert
                    if($insert_row){
                        continue;
                    }else{
                        die('Error: ('.$mysqli->errno . ') '. $mysqli->error);
                    }
                }
            }
            $msg = 'Question has been set';
        }
    }

    //get total questions
        $query = "select * from questions";

    //get the results

    $questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $questions->num_rows;
    $next = $total+1;

    if(isset($_POST['clear'])){
        $query1 = "truncate choices";
        $query2 = "truncate questions";

        //run query
        $run = $mysqli->query($query1) or die($mysqli->error.__LINE__);
        $run1 = $mysqli->query($query2)  or die($mysqli->error.__LINE__);
    }



?>









<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Quiz creating</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<header>
    <div class="container">
        <h1>
            Quiz creator Web App
        </h1>
    </div>
</header>
<main>

    <div class="container">
      <h2>
          Add a question
          <?php
          if(isset($msg)){
              echo '<p>'.$msg.'</p>';
          }

          ?>
      </h2>
        <div>
            <button value="submit">  <a href="https://images.google.com/">Check for Plagiarism for images by uploading images</a></button>
            <button value="submit">  <a href="http://gh-export.us/google_plagiarism/">Check for Plagiarism</a></button>
        </div>
        <form method="post" action="add.php">
            <p>
                <label>Question Number</label>
                <input type="number" value="<?php echo $next; ?>" name="question_number" />
            </p>
            <p>
                <label>Type your question</label>
                <input type="text" name="question_text" />

            </p>
            <p>
                <label>Choice #1 : </label>
                <input type="text" name="choice1" />

            </p>
            <p>
                <label>Choice #2 : </label>
                <input type="text" name="choice2" />

            </p>
            <p>
                <label>Choice #3 : </label>
                <input type="text" name="choice3" />

            </p>
            <p>
                <label>Choice #4 : </label>
                <input type="text" name="choice4" />

            </p>
            <p>
                <label>Choice #5 : </label>
                <input type="text" name="choice5" />

            </p>
            <p>
                <label>Correct Choice Number: </label>
                <input type="number" name="correct_choice" />

            </p>
            <p>

                <input type="submit" name="submit" value="Submit" class="start" />
                <a href="index1.php" class="start">Go to main page</a>

                <input type="submit" name="clear" value="Clear Quiz" class="start" />
    </div>

            </p>
        </form>
 </div>
</main>
<footer>
    <div class="container">
        Copyright &copy; 2022, TCS
    </div>
</footer>
</body>
</html>