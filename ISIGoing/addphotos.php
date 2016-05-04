<!DOCTYPE html>
<?php
include 'dbconnection.php';
// protect against injection
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$cat = mysqli_real_escape_string($conn, $_POST['cat']);

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
                        <form role="form" action="addphotos2.php" method="post" enctype="multipart/form-data">
                            Select photo(s). Maximum size: 5MB!
                            <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                            <input type="hidden" name="cat" value="<?php echo $cat ?>">
                            <div class="form-group" id="uploadcontainer">
                                <input type="file" name="uploadfiles[]" class="uploadfile" />
                            </div>
                            <div class="form-group">
                                <!-- form for photos, button to submit photos and button to add more input fields -->
                                <button id="extraUpload" type="button" onclick="return addAnother('uploadcontainer')" class="btn btn-primary pull-right">Add more photos!</button>
                            </div>
                            <!-- js function to add new -->
                            <script type='text/javascript'>
                                    function addAnother(hookID)
                                    {
                                        var hook = document.getElementById(hookID);
                                        var el = document.createElement('input');
                                        el.className = 'uploadfile';
                                        el.setAttribute('type', 'file');
                                        el.setAttribute('name', 'uploadfiles[]');
                                        hook.appendChild(el);
                                        return false;
                                    }
                            </script>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-left">
                                    Submit!
                                </button>
                            </div>
                        </form>
                        <div class="row"></div>
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