<!DOCTYPE html>
<?php
include 'dbconnection.php';

$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$idUni = mysqli_real_escape_string($conn, $_POST['idUni']);
$uniName = mysqli_real_escape_string($conn,$_POST['uniname']);
$uniInfo = mysqli_real_escape_string($conn, $_POST['uniinfo']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$url = mysqli_real_escape_string($conn,$_POST['url']);
$city = strip_tags($city, "<b>, <i>, <em>, <hr>, <u>");
$url = strip_tags($url);
$uniName = strip_tags($uniName, "<b>, <i>, <em>, <hr>, <u>");
$uniinfo = strip_tags($uniinfo, "<b>, <i>, <em>, <hr>, <u>");
$uniNameEsc = addslashes($uniName);
$cityEsc = addslashes($city);
$uniInfoEsc = addslashes($uniInfo);
// actually edit uni
$sql = "UPDATE university SET uniName='{$uniNameEsc}', uniInfo='{$uniInfoEsc}', city='{$cityEsc}', url='{$url}' WHERE idUniversity={$idUni}";

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
                            <h3> You have successfully edited the uni! Check it <a href="country.php?idC=<?php echo $idC;?>">here!</a>
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