<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idBuddy = mysqli_real_escape_string($conn, $_POST['idBud']);
$Email = mysqli_real_escape_string($conn, $_POST['email']);
$Name = mysqli_real_escape_string($conn, $_POST['name']);
$Country = mysqli_real_escape_string($conn, $_POST['country']);
$City = mysqli_real_escape_string($conn, $_POST['city']);
$Email = strip_tags($Email,"<b>, <i>, <em>, <hr>, <u>");
$City = strip_tags($City,"<b>, <i>, <em>, <hr>, <u>");
$Name = strip_tags($Name,"<b>, <i>, <em>, <hr>, <u>");
$NameEsc = addslashes($Name);
$CityEsc = addslashes($City);

$sql = "UPDATE Ebuddy SET Name='{$NameEsc}', City='{$CityEsc}', idCoun={$Country}, Email='{$Email}' WHERE IDBuddy={$idBuddy}";
// actually edit buddy
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
                            <h3 class="alert alert-success"> You have successfully edited the E-buddy! 
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