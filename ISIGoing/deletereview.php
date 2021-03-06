<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idRev = mysqli_real_escape_string($conn, $_POST['idRev']);
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$sql = "UPDATE Review SET Active=0 WHERE IDReview={$idRev}";
// 'deleting' doesnt actually delete, but just sets a flag to 0 in case someone wants to check the history
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
                            <h3> You have successfully deleted a review! Delete more <a href="country.php?idC=<?php echo $idC;?>">here!</a>
                        <?php
                        } else {
                            ?>
                                <h3> Oops! We are sorry, something went wrong. Please try again a bit later. <a href="index.php"> Back home. </a> </h3>
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