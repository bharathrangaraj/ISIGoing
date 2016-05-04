<!DOCTYPE html>
<?php
include 'dbconnection.php';
// protect against injection
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
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
                <div class="col-md-4 col-md-offset-4">
                    <div class="well">
                        <form role="form" action="addflag2.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                            <div class="form-group">
                                <!-- input the img file and submit -->
                                <input type="file" name="flag">

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    Add flag!
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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