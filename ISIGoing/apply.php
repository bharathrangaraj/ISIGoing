<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idC = $_GET['idC'];
//form to apply for help, nothing special
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
                            <form role="form" action="apply.php" method="post">
                                <div class="form-group">
                                    <label for="name">Name and Surname (minimum 5 characters)<span class="text-danger">*</span></label>
                                    <input type="text" pattern=".{5,}" maxlength="50" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address (minimum 5 characters)<span class="text-danger">*</span></label>
                                    <input type="email" pattern=".{5,}" maxlength="50" class="form-control" name="email" id="email" placeholder="Enter your email" required>
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
                                    <label for="why">Please write a few words about why you want to help and where you get your info.
                                        No worries, you don't have to write an essay :)<span class="text-danger">*</span></label>
                                    <textarea class="form-control" pattern=".{10,}" rows="5" id="why" name="why" required></textarea>
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
            $why = mysqli_real_escape_string($conn, $_POST['why']);
            $sqlIn = "INSERT INTO application (Name, Email, idCountry, reason) VALUES ('{$name}','{$email}',{$idCn}, '{$why}')";
            
            ?>
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <?php if(mysqli_query($conn, $sqlIn)) { ?>
                            Thank you for applying to help ISIGoing grow! An admin will contact you on the provided mail as soon as possible!
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