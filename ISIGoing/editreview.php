<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idC = mysqli_real_escape_string($conn, $_POST['idCountry']);
$idRev = mysqli_real_escape_string($conn, $_POST['idRev']);
$sql = "SELECT Title, Review, Grade, Source FROM Review WHERE IDReview={$idRev}";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);
$Title = $res['Title'];
$Review = $res['Review'];
$Grade = $res['Grade'];
$Source = $res['Source'];
// form to edit review
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <div class="container">

            <form role="form" action="editreview2.php" method="post">
                <div class="form-group">
                    <label for="revtitle">Give your review a title (3 characters minumum)<span class="text-danger">*</span></label>
                    <input type="text" pattern=".{3,}" maxlength="50" class="form-control" id="revtitle" name="revtitle" required value="<?php echo $Title; ?>">
                </div>
                <div class="form-group">
                    <label for="revtext">Your review <span class="text-danger">*</span></label>
                    <textarea class="form-control" pattern=".{10,}" rows="5" id="revtext" name="revtext" required> <?php echo $Review; ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="revsrc">Source (5 characters minimum)<span class="text-danger">*</span></label>
                    <input type="text" pattern=".{5,}" maxlength="50" class="form-control" id="revsrc" name="revsrc" required value="<?php echo $Source; ?>">
                </div>
                <div class="form-group">
                    <label>Grade your experience<span class="text-danger">*</span> <br></label>                                    
                    <label class="radio-inline">
                        <input type="radio" name="grade" id="inlineRadio1" value="1" required <?php if ($Grade == 1) echo 'checked'; ?>>
                        <span class="glyphicon glyphicon-star"></span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="grade" id="inlineRadio2" value="2" <?php if ($Grade == 2) echo 'checked'; ?>>
                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="grade" id="inlineRadio3" value="3" <?php if ($Grade == 3) echo 'checked'; ?>>
                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="grade" id="inlineRadio3" value="4" <?php if ($Grade == 4) echo 'checked'; ?>>
                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="grade" id="inlineRadio3" value="5" <?php if ($Grade == 5) echo 'checked'; ?>>
                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                    </label>
                </div>
                <div class="form-group">
                    <button onclick="return confirm('Are you sure you have entered all you wanted?')" type="submit" class="btn btn-success">Edit Review!</button>
                    <button type="reset" class="btn btn-danger">Clear!</button>
                </div>
                <input type="hidden" name="idRev" value="<?php echo $idRev; ?>">
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