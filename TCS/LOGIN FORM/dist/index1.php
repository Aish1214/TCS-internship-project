<?php
include("database.php");
session_start();
//if($_SESSION['email']){
//    echo "Warm welcome to our app!";
//}else{
//    header("Location:login1.php");
//}

?>
<?php
// Get Total no. of questions
    $query = "select * from questions";
    //Get Results
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total =  $results->num_rows;

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
        <a href="logout.php" class="start">Logout</a>

        <div class="container">
            <h1>
                Quiz creator Web App
            </h1>



        </div>

    <div>
        <label>Welcome to Quiz Creator!!</label>
    </div>
    </header>
    <main>
        <div class="container">
            <h2>Test your knowledge</h2>
            <p>This is a multiple choice quiz to test your knowledge</p>
        <ul>
            <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
            <li><strong>Type:  </strong>Multiple Choice</li>
            <li><strong>Estimated Time:  </strong><?php echo $total * .5; ?>Minutes</li>




        </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
            <a href="add.php?" class="start">Create the quiz</a>

        </div>

    </main>
<footer>
    <div class="container">
        Copyright &copy; 2022, TCS
    </div>
</footer>
</body>

</html>