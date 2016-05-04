<!DOCTYPE html>
<?php
include 'dbconnection.php';
// admins page, show applications
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.14/jquery.scrollTo.min.js"></script>
        <link href="bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'banner.php' ?>

        <div class="container">
            <?php if($_SESSION['username']=='admin') { ?>
                         
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="row">

                    <?php
                    $sqlPhoto = "SELECT idApp, application.name as name, reason, email, country.name as nc FROM application, country WHERE country.idcountry=application.idcountry AND active=1";
                    $resPhoto = mysqli_query($conn, $sqlPhoto);
                    while ($photos = mysqli_fetch_assoc($resPhoto)) {
                        ?>
                        <div class="col-md-3 col-xs-6 col-sm-6">
                            <div class="panel panel-default" id="item_<?php echo $photos['idApp'] ?>">

                                <div class="panel-body">
    <?php if ($_SESSION['username'] == 'admin') { ?>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <a href="#" class="del_button" id="del-<?php echo $photos['idApp'] ?>">
                                                   <i class="fa fa-times-circle fa-2x"></i>

                                                </a>
                                            </div>

                                        </div>

    <?php } ?>
                                    <div class="row"><div class="col-md-12">
                                            Name: <b> <?php echo $photos['name'] ?> </b> <br>
                                            Country: <b> <?php echo $photos['nc'] ?> </b> <br>
                                            Reason: <b> <?php echo $photos['reason'] ?> </b> <br>
                                            Contact: <b> <?php echo $photos['email'] ?> </b> <br>

                                        </div></div>

                                </div>

                            </div> </div><?php } ?>


                </div>
            </div>
            </div> <?php }
            else { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="well">
                        <h2> <i class="fa fa-remove text-danger"></i> You are not allowed to be on this page! <i class="fa fa-remove text-danger"></i></h2>
                        



                    </div>
                </div>
            </div> <?php } ?>
        </div> 
        <div class="container">
             <?php include 'footer.php'; ?>
        </div>
           
            
       

    </body>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
$(document).ready(function() {
        //##### Send delete Ajax request to response.php #########
        $("body").on("click", ".del_button", function(e) {
                 e.preventDefault();
                 var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
                 var DbNumberID = clickedID[1]; //and get number from array
                 var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
                $(this).hide(); //hide currently clicked delete button
		 
                        jQuery.ajax({
                        type: "POST", // HTTP method POST or GET
                        url: "response2.php", //Where to make Ajax calls
                        dataType:"text", // Data type, HTML, json etc.
                        data:myData, //Form variables
                        success:function(response){
                                //on success, hide  element user wants to delete.
                                $('#item_'+DbNumberID).fadeOut();
                        },
                        error:function (xhr, ajaxOptions, thrownError){
                                //On error, we alert user
                                alert(thrownError);
                        }
                        });
        });

});
    </script>

        <script src="bootstrap3-editable/js/bootstrap-editable.js"></script>

    <script src="main.js"></script>
</html>
<?php
mysqli_close($conn);
?>
