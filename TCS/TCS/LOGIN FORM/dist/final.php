
<?php
session_start();
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
       <h2>You're Done!</h2>
        <p>Congrats!! You have completed the quiz.</p>
        <p>Final Score: <?php echo $_SESSION['score']; ?></p>
        <a href="question.php?n=1"  class="start">Take Again<?php
            $_SESSION['score'] = 0;

            ?></a>
        <a href="index1.php" class="start">Go to main page</a>
    </div>
</main>
<footer>
    <div class="container">
        Copyright &copy; 2022, TCS
    </div>
</footer>
</body>
</html>
