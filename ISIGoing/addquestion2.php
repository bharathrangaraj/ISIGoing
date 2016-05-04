<!DOCTYPE html>
<?php
include 'dbconnection.php';
$j=0;
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$num = mysqli_real_escape_string($conn, $_POST['number']);
// get the parameters and insert into database, count if successful
for ($i=1;$i<=$num;$i++){
    $question= mysqli_real_escape_string($conn, $_POST['question'.$i]);
    $choice1= mysqli_real_escape_string($conn, $_POST['ch1_'.$i]);
    $choice2= mysqli_real_escape_string($conn, $_POST['ch2_'.$i]);
    $choice3= mysqli_real_escape_string($conn, $_POST['ch3_'.$i]);
    $correct= mysqli_real_escape_string($conn, $_POST['correct'.$i]);
    $sql = "INSERT INTO quiz (question, choice1, choice2, choice3, answer, idCountry) "
               . "VALUES ('{$question}','{$choice1}','{$choice2}','{$choice3}', {$correct}, {$idC})";
    
    $result = mysqli_query($conn, $sql);
    if($result)
        $j++;
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <div class="container">

            <div class="jumbotron">
                <?php if($j == $num){ echo "You successfully added the questions.";?> <a href="country.php?idC=<?php echo $idC;?>">Go back.</a>
                <?php } else { echo "Oops, something went wrong, please try again later"; ?> <a href="country.php?idC=<?php echo $idCountry;?>">Go back. </a>
                <?php } ?>
                
            </div>
<?php include 'footer.php'; ?>
        </div>
    </body>
    <script src="http://code.jquery.com/jquery-latest.min.js" />        
    <script src="js/bootstrap.min.js" />


</html>

<?php
mysqli_close($conn);
?>