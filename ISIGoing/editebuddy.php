<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idBuddy = mysqli_real_escape_string($conn, $_POST['idBud']);
$sql = "SELECT Email, Name, City, idCoun FROM ebuddy WHERE IDBuddy={$idBuddy}";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);
$Name = $res['Name'];
$City = $res['City'];
$Email = $res['Email'];
$idCountry = $res['idCoun'];
// form to edit buddy
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
                    <form role="form" action="editebuddy2.php" method="post">
                        <div class="form-group">
                            <label for="email">Email address (minimum 5 characters)<span class="text-danger">*</span></label>
                            <input type="email" pattern=".{5,}" maxlength="50" class="form-control" name="email" id="email" placeholder="Enter your email" required value="<?php echo $Email ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Name (minimum 3 characters)<span class="text-danger">*</span></label>
                            <input type="text" pattern=".{3,}" maxlength="50" class="form-control" name="name" id="name" placeholder="Enter your name" required value="<?php echo $Name ?>">
                        </div>
                        <div class="form-group">
                            <label>Select country<span class="text-danger">*</span></label>
                            <select name="country" id="country" class="form-control" required>

                                <?php
                                $sqlC = "SELECT idCountry, name FROM country";
                                $ress = mysqli_query($conn, $sqlC);
                                while ($rows = mysqli_fetch_assoc($ress)) {
                                    ?>
                                    <option value="<?php echo $rows['idCountry']; ?>"<?php if ($rows['idCountry'] == $idCountry) echo 'selected' ?>><?php
                                        echo $rows['name'];
                                    }
                                    ?></option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City (minimum 3 characters)<span class="text-danger">*</span></label>
                            <input type="text" pattern=".{3,}" maxlength="30" class="form-control" name="city" id="city" placeholder="Enter your city" required value="<?php echo $City ?>">
                        </div>
                        <div class="form-group">
                            <button onclick="return confirm('Are you sure you have entered all the data correctly?')" type="submit" class="btn btn-success">Edit!</button>
                            <button type="reset" class="btn btn-danger">Clear!</button>
                        </div>
                        <input type="hidden" name="idBud" value="<?php echo $idBuddy ?>">
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