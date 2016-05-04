<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$info = mysqli_real_escape_string($conn, $_POST['infotext']);
$info = strip_tags($info, "<b>, <i>, <em>, <hr>, <h1>, <h2>, <h3>, <h4>, <br>, <p>");
$infoEsc =$info;

$sql = "UPDATE country SET information='{$infoEsc}' WHERE IDCountry={$idC}";
//actually edit customs part of a country
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
                        <h3> You have successfully edited the info! Check it <a href="country.php?idC=<?php echo $idC;?>">here!</a>
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