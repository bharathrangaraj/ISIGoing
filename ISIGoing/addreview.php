<!DOCTYPE html>
<?php
include 'dbconnection.php';
// protect from sqlinjection
$title = mysqli_real_escape_string($conn, $_POST['revtitle']);
$text = mysqli_real_escape_string($conn, $_POST['revtext']);
$source = mysqli_real_escape_string($conn, $_POST['revsrc']);
$grade = mysqli_real_escape_string($conn, $_POST['grade']);
$idC = mysqli_real_escape_string($conn, $_POST['country']);
$source = strip_tags($source, "<b>, <i>, <em>, <hr>, <u>");
$title = strip_tags($title, "<b>, <i>, <em>, <hr>, <u>");
$text = strip_tags($text, "<b>, <i>, <em>, <hr>, <u>");
$ip = $_SERVER['REMOTE_ADDR'];

if(!$ip=='::1') {
$ip = ip2long($ip);
}
else $ip=1;
//insert everything in the database, check if there was an input from the same ip address in the last three minutes dont allow it
$mydate = date("Y-m-d H:i:s");
$sql = "INSERT INTO Review (Title, Review, Grade, IDcnt, Source, ip, datetime) VALUES ('{$title}','{$text}',{$grade},{$idC},'{$source}', {$ip},'{$mydate}')";
$sql2 ="SELECT datetime FROM review WHERE ip={$ip}";
$result2 = mysqli_query($conn,$sql2);
$less=0;
while($date = mysqli_fetch_assoc($result2)) {
    $time = strtotime($mydate)-(strtotime($date['datetime']));
    if($time<180) {
        $less ++;
    }
    
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <div class="container">

            <div class="well">
                <?php
                if ($less==0) {
                    if(mysqli_query($conn, $sql)) { 
                    ?>
                    <h3> You have successfully added a new review! Check it out <a href="country.php?idC=<?php echo $idC ?>"> here. </a> </h3>
                <?php 
                    } else { echo "<h3> Oops! We are sorry, something went wrong. Please try again a bit later. <a href='index.php'> Back home </a> </h3>";
                    }
                    
                    } else {
                    ?>
                    <h3> Sorry, you have to wait at least 180 seconds before you can add a new review.<br> <?php $left=180-$time; echo $left ?> seconds left. <a href="index.php"> Back home. </a> </h3>
                <?php } ?>
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