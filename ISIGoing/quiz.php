<!DOCTYPE html>
<?php
include 'dbconnection.php';
$j=0;
$idCountry = mysqli_real_escape_string($conn, $_POST['country']);
// get users answers, go through them and compare with correct answer, add correct answers in counter variable
for ($i=1;$i<=sizeof($_POST)/2;$i++){
    ${"question$i"}=$_POST['question'.$i];
    ${"answer$i"}=$_POST['answer'.$i];
    ${"sql$i"} = "SELECT answer FROM quiz WHERE idQuestion=".${"question$i"};
    ${"result$i"} = mysqli_query($conn, ${"sql$i"});
    ${"row$i"} = mysqli_fetch_assoc(${"result$i"}); 
    foreach (${"row$i"} as $value) {
        if ($value == ${"answer$i"}) {
            $j++;
        }
    }
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
                <?php if($j == 1){ echo "You got 1 answer right.";?> <a href="country.php?idC=<?php echo $idCountry;?>">Try again.</a>
                <?php } else { echo "You got ".$j." answers right."; ?> <a href="country.php?idC=<?php echo $idCountry;?>">Try again. </a>
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