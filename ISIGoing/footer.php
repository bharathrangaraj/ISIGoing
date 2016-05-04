<!-- footer for every page -->

<footer style="bottom:0">
    
    <div class="row">
        <hr>
        <div class="col-md-4 col-xs-4 col-sm-4">
            <h4>Made by Nameless <i class="fa fa-copyright"></i></h4>

        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <?php
            
            if($_SESSION['username'] == 'admin'){
                $numSql = "SELECT * FROM application WHERE active=1";
                $num = mysqli_query($conn, $numSql);
                $number = mysqli_num_rows($num);
                if($number >0) {
                           
            ?>
            <a href="admin.php">
            <span class="fa-stack fa-2x text-danger">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-exclamation fa-stack-1x"></i>
            </span></a>
            You have <?php echo mysqli_num_rows($num); ?> new or unprocessed application(s)!
            <?php } ?>
            <br>
            <div class="text-center"><a href="adduser.php" class="btn btn-success"> Add </a> new user!</div>
            
            <?php } ?>
            

        </div>
        <div class="col-md-4 col-xs-4 col-sm-4">
            <div class="text-center">
            <h4>Follow us on our social networks!</h4>
            
            <span class="fa-stack fa-2x">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x"></i>
            </span>
            <span class="fa-stack fa-2x">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x"></i>
            </span>
            <span class="fa-stack fa-2x">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-instagram fa-stack-1x"></i>
            </span>
            <span class="fa-stack fa-2x">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-google-plus fa-stack-1x"></i>
            </span>
            </div>
        </div>
    </div>

</footer>