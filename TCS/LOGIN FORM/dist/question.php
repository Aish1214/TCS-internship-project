<?php
include("database.php");

?>
<?php
session_start();
?>

<?php
//set question number
$number = (int) $_GET['n'];

//get total questions
$query = "select * from questions";
//get results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;
/*
 *
 */
$query = "select * from questions where question_number =  $number";
//get result
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question =  $result->fetch_assoc();

/*
 *get choices
 */
$query = "select * from choices where question_number =  $number";
//get result
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

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
        <li class="current">
            Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></li></div>
            <p class="question">
                    <?php echo $question['text'] ?>
            </p>
            <form method="post" action="process.php">
                <li class="choices">
                    <?php while ($row = $choices->fetch_assoc()) :
                    ?>
        <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"  /> <?php echo $row['text'];?></li>
                    <?php  endwhile;?>




        <input type="submit" value="submit" />
        <input type="hidden" name="number" value="<?php echo $number; ?>">
            </form>
        </div>


    </div>
</main>
<footer>
    <div class="container">
        Copyright &copy; 2022, TCS
    </div>
</footer>
</body>
</html>
