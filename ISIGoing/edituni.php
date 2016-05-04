<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$idUni = mysqli_real_escape_string($conn, $_POST['idUni']);
$sql = "SELECT uniName, city, url, uniInfo FROM University WHERE idUniversity={$idUni}";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);
$uniName = $res['uniName'];
$city = $res['city'];
$uniInfo = $res['uniInfo'];
$url = $res['url'];
// form to edit uni
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <div class="container">

            <form role="form" action="edituni2.php" method="post">
                <div class="form-group">
                    <label for="revtitle">University name (3 characters minumum)<span class="text-danger">*</span></label>
                    <input type="text" pattern=".{3,}" maxlength="50" class="form-control" id="revtitle" name="uniname" required value="<?php echo $uniName; ?>">
                </div>
                <div class="form-group">
                    <label for="revtext">University info <span class="text-danger">*</span></label>
                    <textarea class="form-control" pattern=".{10,}" rows="5" id="revtext" name="uniinfo" required> <?php echo $uniInfo; ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="revsrc">City (3 characters minimum)<span class="text-danger">*</span></label>
                    <input type="text" pattern=".{3,}" maxlength="50" class="form-control" id="revsrc" name="city" required value="<?php echo $city; ?>">
                </div>
                <div class="form-group">
                   <label for="revsrc">Url (5 characters minimum)<span class="text-danger">*</span></label>
                    <input type="text" pattern=".{5,}" maxlength="50" class="form-control" id="revsrc" name="url" required value="<?php echo $url; ?>">
                </div>
                <div class="form-group">
                    <button onclick="return confirm('Are you sure you have entered all you wanted?')" type="submit" class="btn btn-success">Edit Uni!</button>
                    <button type="reset" class="btn btn-danger">Clear!</button>
                </div>
                <input type="hidden" name="idUni" value="<?php echo $idUni; ?>">
                <input type="hidden" name="idCountry" value="<?php echo $idC; ?>"> 
            </form>
<?php include 'footer.php'; ?>
        </div>

    </body>
    <script src="http://code.jquery.com/jquery-latest.min.js" />        
    <script src="js/bootstrap.min.js" />


</html>
<?php
mysqli_close($conn);
?>