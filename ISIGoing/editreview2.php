<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$idRev = mysqli_real_escape_string($conn, $_POST['idRev']);
$Title = mysqli_real_escape_string($conn,$_POST['revtitle']);
$Review = mysqli_real_escape_string($conn, $_POST['revtext']);
$Grade = mysqli_real_escape_string($conn, $_POST['grade']);
$Source = mysqli_real_escape_string($conn,$_POST['revsrc']);
$Source = strip_tags($Source, "<b>, <i>, <em>, <hr>, <u>");
$Title = strip_tags($Title, "<b>, <i>, <em>, <hr>, <u>");
$Review = strip_tags($Review, "<b>, <i>, <em>, <hr>, <u>");

// actually edit review
$sql = "UPDATE Review SET Title='{$Title}', Review='{$Review}', Grade={$Grade}, Source='{$Source}' WHERE IDReview={$idRev}";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>


        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <?php
                        if (mysqli_query($conn, $sql)) {
                            ?>
                            <h3> You have successfully edited the review! Check it <a href="country.php?idC=<?php echo $idC;?>">here!</a>
                                <?php
                            } else {
                                ?>
                                <h3 class="alert alert-danger"> Oops! We are sorry, something went wrong. Please try again a bit later. <a href="index.php"> Back home. </a> </h3>
                            <?php } ?>
                    </div> </div>
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