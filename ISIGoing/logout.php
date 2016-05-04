<!DOCTYPE html>
<?php
include 'dbconnection.php';
// logout page
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <?php
        $_SESSION['username'] = NULL;
        session_destroy();
        ?>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        You have successfully logged out!
                    </div> </div>
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