<!DOCTYPE html>
<?php
include 'dbconnection.php';
// form to apply for buddy programme
if($_GET['idC'])
    $idC=$_GET['idC'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <?php if (!$_POST) { ?>
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="well">
                            <form role="form" action="buddy.php" method="post">
                                <div class="form-group">
                                    <label for="email">Email address (minimum 5 characters)<span class="text-danger">*</span></label>
                                    <input type="email" pattern=".{5,}" maxlength="50" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name (minimum 3 characters)<span class="text-danger">*</span></label>
                                    <input type="text" pattern=".{3,}" maxlength="50" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label>Select country<span class="text-danger">*</span></label>
                                    <select name="country" id="country" class="form-control" required>
                                        
                                        <?php
                                        
                                        $sqlC = "SELECT idCountry, name FROM country ORDER BY name";
                                        $ress = mysqli_query($conn, $sqlC);
                                        while($rows =  mysqli_fetch_assoc($ress)) {
                                        
                                        ?>
                                        <option value="<?php echo $rows['idCountry']?>"
                                                <?php if($rows['idCountry']==$idC) echo 'selected'; ?>><?php echo $rows['name']; }?></option>
                                        
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city">City (minimum 3 characters)<span class="text-danger">*</span></label>
                                    <input type="text" pattern=".{3,}" maxlength="30" class="form-control" name="city" id="city" placeholder="Enter your city" required>
                                </div>
                                <div class="form-group">
                                    <button onclick="return confirm('Are you sure you have entered all the data correctly?')" type="submit" class="btn btn-success">Apply!</button>
                                    <button type="reset" class="btn btn-danger">Clear!</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
<?php include 'footer.php'; ?>
            </div>
        <?php } else {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $idCn = mysqli_real_escape_string($conn, $_POST['country']);
            $city = mysqli_real_escape_string($conn, $_POST['city']);
            $sqlIn = "INSERT INTO ebuddy (Name, Email, idCoun, city) VALUES ('{$name}','{$email}',{$idCn}, '{$city}')";
            
            ?>
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <?php if(mysqli_query($conn, $sqlIn)) { ?>
                            You have successfully applied to become a E-Buddy!
                            <?php } else echo "Something went wrong!" ?>
                        </div> </div>
                </div>
<?php include 'footer.php'; ?>
            </div>
        <?php } ?>
    </body>
    <script src="http://code.jquery.com/jquery-latest.min.js" />        
    <script src="js/bootstrap.min.js" />


</html>
<?php
mysqli_close($conn);
?>