<!DOCTYPE html>
<?php
include 'dbconnection.php';
//protect from sqlinjection, set flag to true
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$cat = mysqli_real_escape_string($conn, $_POST['cat']);
$uploaded=0;
// if all the imgs that are submitted 
for ($i=0; $i < count($_FILES['uploadfiles']['name']); $i++) {
  $target_path = "imgs/";
  $target_path = $target_path . basename($_FILES['uploadfiles']['name'][$i]);
  $sqlPhoto = "INSERT INTO photo (path, idCountry, category) VALUES ('{$target_path}',{$idC},'{$cat}')";
  if (((move_uploaded_file($_FILES["uploadfiles"]["tmp_name"][$i], $target_path)) && (mysqli_query($conn, $sqlPhoto))) || $_FILES['uploadfiles']['name'][$i]==NULL)
          $uploaded++;
    
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

            <div class="well">
                <?php
                if ($uploaded == count($_FILES['uploadfiles']['name'])) {
                    ?>
                    <h3> Photos successfully added. Check it out <a href="country.php?idC=<?php echo $idC ?>"> here </a> </h3>
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