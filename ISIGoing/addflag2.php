<!DOCTYPE html>
<?php
include 'dbconnection.php';
// configure path to store the photo
$target_path = "flag/";
$target_path = $target_path . basename($_FILES['flag']['name']);
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
// update the country to add the flag path
$sqlFlag = "UPDATE country SET flag='{$target_path}' WHERE idCountry={$idC}";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <div class="container">

            <div class="well">
                <?php
                // if move to target path is successful and query successfully done display message
                if (move_uploaded_file($_FILES["flag"]["tmp_name"], $target_path) && mysqli_query($conn,$sqlFlag)) {
                    ?>
                    <h3> Flag successfully added. Check it out <a href="country.php?idC=<?php echo $idC ?>"> here </a> </h3>
                <?php 
                } else {
                    ?>
                    <h3> Oops! We are sorry, something went wrong. Please try again a bit later. <a href="index.php"> Back home </a> </h3>
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