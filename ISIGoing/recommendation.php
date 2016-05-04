<!DOCTYPE html>
<?php
include 'dbconnection.php';
// display recommendation questions and answers
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

            <div class="container">
                <form role="form" action="recommendation2.php" method="post">
                            <div class="form-group">
                                <?php
                                $sqlQ = "SELECT idQuestion, question, choice1, choice2, choice3, choice4 FROM question";
                                $resQ = mysqli_query($conn, $sqlQ);
                                $i = 0;
                                
                                while ($rowQ = mysqli_fetch_assoc($resQ)) {
                                    $i++;
                                    ?>
                                    <div class="col-md-4" style="height:150px">
                                        <label id="questionsize2"><?php echo $i.". " . $rowQ['question']; ?></label>                                    
                                        <label class="radio text-primary" id="answersize">
                                            <input type="radio" name="answer<?php echo $i; ?>" value="1" required>
                                            <?php echo $rowQ['choice1']; ?>
                                        </label>
                                        <label class="radio text-primary" id="answersize">
                                            <input type="radio" name="answer<?php echo $i; ?>" value="2">
                                            <?php echo $rowQ['choice2']; ?>
                                        </label>
                                        <label class="radio text-primary" id="answersize">
                                            <input type="radio" name="answer<?php echo $i; ?>" value="3">
                                            <?php echo $rowQ['choice3']; ?>
                                        </label>
                                        <?php if($rowQ['choice4']!=NULL) { ?>
                                        <label class="radio text-primary" id="answersize">
                                            <input type="radio" name="answer<?php echo $i; ?>" value="4">
                                            <?php echo $rowQ['choice4']; ?>
                                        </label>
                                        <?php } ?>
                                       
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if (mysqli_num_rows($resQ) > 0) { ?>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success btn-lg">Submit answers!</button>
                                    <button type="reset" class="btn btn-danger btn-lg">Clear!</button>
                                </div> <?php } ?>
                           
                        </form>

            </div>
        <div class="container"><?php include 'footer.php'; ?></div>
    </body>
    <script src="http://code.jquery.com/jquery-latest.min.js" />        
    <script src="js/bootstrap.min.js" />


</html>
<?php
mysqli_close($conn);
?>