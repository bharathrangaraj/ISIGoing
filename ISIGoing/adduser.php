<!DOCTYPE html>
<?php
include 'dbconnection.php';

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
                            <form role="form" action="adduser.php" method="post" onsubmit="return myFunction()">
                                <div class="form-group">
                                    <label for="username">Username (minimum 5 characters)<span class="text-danger">*</span></label>
                                    <input type="text" pattern=".{5,}" maxlength="50" class="form-control" name="username" id="username" placeholder="Enter username" required>
                                </div>
                                <div class="form-group">
                                    <label for="pass1">Password (minimum 5 characters)<span class="text-danger">*</span></label>
                                    <input type="password" pattern=".{5,}" maxlength="50" class="form-control" name="pass1" id="pass1" placeholder="Enter password" required>
                                </div>
                                <div class="form-group">
                                    <label for="pass2">Confirm password (minimum 5 characters)<span class="text-danger">*</span></label>
                                    <input type="password" pattern=".{5,}" maxlength="50" class="form-control" name="pass2" id="pass2" placeholder="Confirm password" required>
                                </div>
                                      <script>
                                        function myFunction() {
                                            var pass1 = document.getElementById("pass1").value;
                                            var pass2 = document.getElementById("pass2").value;
                                            var ok = true;
                                            if (pass1 != pass2) {
                                                alert("Passwords do not match");
                                                document.getElementById("pass1").style.borderColor = "#E34234";
                                                document.getElementById("pass2").style.borderColor = "#E34234";
                                                ok = false;
                                            }
                                            else {
                                                alert("Passwords Match!!!");
                                            }
                                            return ok;
                                        }
                                        </script>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add!">
                                    <input type="reset" class="btn btn-danger" value="Clear!">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
<?php include 'footer.php'; ?>
            </div>
        <?php } else {
            $pass = mysqli_real_escape_string($conn, $_POST['pass']);
            $name = mysqli_real_escape_string($conn, $_POST['username']);
            $sqlIn = "INSERT INTO user (user, password) VALUES ('{$name}','{$pass}')";
           
            ?>
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <?php if(mysqli_query($conn, $sqlIn)) { ?>
                            User successfully added!
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