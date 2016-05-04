<!DOCTYPE html>
<?php
include 'dbconnection.php';
// login form
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <?php if (!$_POST) { 
            if (!$_SESSION['username']) {?>
         
            <div class="container">

                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="well">
                            <form role="form" action="login.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter your password" required>
                                </div>

                                <div class="form-group">
                                    <button onclick="return confirm('Are you sure you have entered all the data correctly?')" type="submit" class="btn btn-success">Login!</button>
                                    <button type="clear" class="btn btn-danger">Clear!</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
<?php include 'footer.php'; ?>
            </div>
        <?php }
            else { ?>
                <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        You are already logged in. <a href="logout.php"> Log out </a>
                    </div> </div>
            </div>
<?php include 'footer.php'; ?>
        </div>
            <?php }
        
            } else {
            ?>
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <?php
                            $un = mysqli_real_escape_string($conn,$_POST['username']);
                            $pw = mysqli_real_escape_string($conn,$_POST['pass']);
                            $sql = "SELECT User, Password FROM user";
                            $res = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($res)) {
                                if ($un == $row['User'] && $pw == $row['Password']) {
                                    $_SESSION['username'] = $un;
                                    break;
                                }
                            }

                            if ($_SESSION['username']) {
                                echo "You have successfully logged in! <a href='index.php'>Home <span class='glyphicon glyphicon-home'/></a>";
                            } else {
                                echo "Wrong username or password! Try <a href='login.php'>again</a>";
                            }
                            ?>


                        </div> </div>
                </div>

            </div>
        <?php } ?>
    </body>
    <script src="http://code.jquery.com/jquery-latest.min.js" />        
    <script src="js/bootstrap.min.js" />


</html>
<?php
mysqli_close($conn);
?>