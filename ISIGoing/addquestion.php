<!DOCTYPE html>
<?php
//get parameters
include 'dbconnection.php';
$num=$_POST['number'];
$idC=$_POST['idCountry'];
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
                <form role="form" action="addquestion2.php" method="post">
                   <?php 
                    for($i=1;$i<=$num;$i++){
                ?>
                    <!-- display as many question forms as the admin has input -->
                    <div class="col-md-4">
                        
                        <div class="well">
                            <div class="form-group">
                                <label for="question<?php echo $i ?>">Question <span class="text-danger">*</span></label>
                                <input class="form-control" name="question<?php echo $i ?>" id="question" required autofocus />
                            </div>
                            <div class="form-group">
                                <label for="ch1_<?php echo $i ?>">Choice 1 <span class="text-danger">*</span></label>
                                <input class="form-control" name="ch1_<?php echo $i ?>" id="ch1_<?php echo $i ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="ch2_<?php echo $i ?>">Choice 2 <span class="text-danger">*</span></label>
                                <input class="form-control" name="ch2_<?php echo $i ?>" id="ch2_<?php echo $i ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="ch3_<?php echo $i ?>">Choice 3 <span class="text-danger">*</span></label>
                                <input class="form-control" name="ch3_<?php echo $i ?>" id="ch3_<?php echo $i ?>" required />
                            </div>
                            <label for="correct<?php echo $i ?>">Correct choice <span class="text-danger">*</span></label>
                             <input type="number" name="correct<?php echo $i ?>" id="correct<?php echo $i ?>" min="1" max="3" value="1">
                        </div>

                    </div>
                    <?php } ?>
                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                    <input type="hidden" name="number" value="<?php echo $num ?>">
                    <div class="col-md-4"> 
                    <button type="submit" class="btn btn-xl btn-primary">
                                        Add question(s)!
                    </button>
                    </div>
                </form>
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