<!DOCTYPE html>
<?php
include 'dbconnection.php';
$idC = mysqli_real_escape_string($conn, $_GET['idC']);

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
            <!-- bootstrap tabs -->
            <ul class="nav nav-tabs nav-justified" role="tablist">

                <li class="active"><a href="#general" name="general" role="tab" data-toggle="tab"> General info </a></li>
                <li><a href="#uni" name="uni" role="tab" data-toggle="tab">Student Life and Universities </a></li>
                <li><a href="#quiz" name="quiz" role="tab" data-toggle="tab">Quiz</a></li>
                <li><a href="#review" name="review" role="tab" data-toggle="tab">Student Reviews</a></li>
                <li><a href="#buddy" name="buddy" role="tab" data-toggle="tab">Find an E-Buddy</a></li>
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a>
            </ul>

            <div class="well" style="margin-bottom: 0;">
                <div class="row">
                    <!-- display country name and flag and buttons for adding photos if admin or moderator logged in -->
                    <?php
                    $sqlName = "SELECT name, flag FROM country WHERE idCountry={$idC}";
                    $res = mysqli_query($conn, $sqlName);
                    $name = mysqli_fetch_assoc($res);
                    ?>
                    <?php if($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>

                    <div class="col-md-1 col-xs-1 col-sm-1"></div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <form role="form" action="addphotos.php" method="post">
                            <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                            <input type="hidden" name="cat" value="carousel">
                            <div class="form-group">

                                <button type="submit" class="btn btn-xl btn-primary">
                                    Add carousel photos</button>

                            </div>

                        </form>
                    </div>
                    <?php } else { ?>
                    <div class="col-md-5 col-xs-5 col-sm-5"></div> <?php } ?>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <h1><?php echo $name['name']; ?></h1>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img class="img-responsive" src="<?php echo $name['flag']; ?>" alt=""/>
                        <?php
                        if ($name['flag'] == NULL && ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name']))) {
                            ?>
                            <form role="form" action="addflag.php" method="post">
                                <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                <div class="form-group">

                                    <button type="submit" class="btn btn-success center-block">
                                        Add flag!</button>


                                </div>

                            </form>
                        <?php } ?>

                    </div>
                </div>

            </div>
            <?php
            // bootstrap carousel, get photos from db and display them in it
            $sqlCarousel = "SELECT idPhoto, path FROM photo WHERE idCountry={$idC} AND category='carousel'";
            $resCarousel = mysqli_query($conn, $sqlCarousel);
            $j = 0;
            if (mysqli_num_rows($resCarousel)>0) {
            
            ?>
             <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 
                <ol class="carousel-indicators">
                    <?php for ($i=0; $i<mysqli_num_rows($resCarousel); $i++) { ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; if($i==0)?>" <?php if($i==0) { ?> class="active" <?php }?>></li>
                    <?php } ?>
                </ol> 
                <div class="carousel-inner">
                    <?php while ($rowCarousel = mysqli_fetch_assoc($resCarousel)) { ?>
                    <div class="item <?php if($j==0) echo "active"; ?>" id="carimg">
                        <img src="<?php echo $rowCarousel['path']; ?>" alt="flag">
                    </div>
                    <?php $j++; } ?>
                </div>

                  
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div> <?php } ?>

            <hr>
            <div class="tab-content">
                <!-- tab content. for each category get text and relating photos and display them. for regular users without buttons, 
                for admins and moderators with edit and add options -->
                <div class="tab-pane active" id="general">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs-left">
                                <ul class="nav nav-tabs col-md-2 col-xs-2 col-sm-2" role="tablist">
                                <li class="active"><a href="#geo" role="tab" data-toggle="tab">Geography and general</a></li>
                                <li><a href="#food" role="tab" data-toggle="tab">Food</a></li>
                                <li><a href="#people" role="tab" data-toggle="tab">People</a></li>
                                <li><a href="#customs" role="tab" data-toggle="tab">Culture</a></li>



                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="geo">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <?php
                                            $sqlInfo = "SELECT information, food, people,customs, student FROM country WHERE idCountry={$idC}";
                                            $res = mysqli_query($conn, $sqlInfo);
                                            $info = mysqli_fetch_assoc($res);
                                            echo "<span style='font-size:18px'>" . $info['information'] . "</span>";
                                            echo "<hr/>";
                                            if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                                ?>
                                                <form role="form" class="pull-left" action="editcountryinfo.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <div class="form-group">
                                                        <?php if ($info['information'] != NULL) { ?>
                                                            <button type="submit" class="btn btn-xl btn-default">
                                                                Edit info!</button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add info!</button>
                                                        <?php } ?>

                                                    </div>

                                                </form>
                                                <form role="form" class="pull-right" action="addphotos.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <input type="hidden" name="cat" value="general">
                                                    <div class="form-group">
                                                        
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add photos to this section!</button>
                                                            
                                                    </div>

                                                </form>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                   
                                    <div class="row">
                                    
                                    <?php
                                    
                                    $sqlPhoto = "SELECT idPhoto, path, description FROM photo WHERE idCountry={$idC} AND category='general' AND active=1";
                                            $resPhoto = mysqli_query($conn, $sqlPhoto);
                                            while($photos = mysqli_fetch_assoc($resPhoto)) {
                                    
                                    ?>
                                        <div class="col-md-3 col-xs-6 col-sm-6">
                                        <div class="panel panel-default" id="item_<?php echo $photos['idPhoto'] ?>">
                                                                                             
                                                <div class="panel-body">
                                                    <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                                    <div class="row">
                                                        <div class="col-md-offset-10 col-md-1">
                                                            <a href="#" class="del_button" id="del-<?php echo $photos['idPhoto'] ?>">
                                                        <img src="imgs/mail_delete.png" />
                                                    </a>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <?php } ?>
                                                            <div class="row"><div class="col-md-12">
                                                        <a href="<?php echo $photos['path'] ?>" target="_blank">
                                                        <img src="<?php echo $photos['path'] ?>" class="img-responsive center-block" style="height:120px"/>
                                                    </a>
                                                        </div></div>
                                                    
                                                </div>
                                                <div class="panel-footer text-center">
                                                    <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                                        <a href="#" data-name="description" data-title="Description" class="description" data-type="text" data-pk="<?php echo $photos['idPhoto']; ?>">
                                                            <?php echo $photos['description']; ?></a> <?php } else {
                                                    echo $photos['description'];
                                                }
                                                ?>



                                                </div>
                                            </div> </div><?php }?>
                               
    
                                    </div>
                                </div>
                              </div>
                                </div>
                                <div class="tab-pane" id="food">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <?php
                                            echo "<span style='font-size:18px'>" . $info['food'] . "</span>";
                                            echo "<hr>";
                                            if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                                ?>
                                                <form role="form" class="pull-left" action="editcountryfood.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <div class="form-group">
                                                        <?php if ($info['food'] != NULL) { ?>
                                                            <button type="submit" class="btn btn-xl btn-default">
                                                                Edit info!</button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add info!</button>
                                                        <?php } ?>

                                                    </div>

                                                </form>
                                            <form role="form" class="pull-right" action="addphotos.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <input type="hidden" name="cat" value="food">
                                                    <div class="form-group">
                                                        
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add photos to this section!</button>
                                                            
                                                    </div>

                                                </form>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="row">

                                                <?php
                                                $sqlPhoto = "SELECT idPhoto, path, description FROM photo WHERE idCountry={$idC} AND category='food' AND active=1";
                                                $resPhoto = mysqli_query($conn, $sqlPhoto);
                                                while ($photos = mysqli_fetch_assoc($resPhoto)) {
                                                    ?>
                                                    <div class="col-md-3 col-xs-6 col-sm-6">
                                                    <div class="panel panel-default" id="item_<?php echo $photos['idPhoto'] ?>">
                                                        <div class="panel-body">
                                                    <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                                    <div class="row">
                                                        <div class="col-md-offset-10 col-md-1">
                                                            <a href="#" class="del_button" id="del-<?php echo $photos['idPhoto'] ?>">
                                                        <img src="imgs/mail_delete.png" />
                                                    </a>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <?php } ?>
                                                            <div class="row"><div class="col-md-12">
                                                        <a href="<?php echo $photos['path'] ?>" target="_blank">
                                                        <img src="<?php echo $photos['path'] ?>" class="img-responsive center-block" style="height:120px"/>
                                                    </a>
                                                        </div></div>
                                                    
                                                </div>
                                                        <div class="panel-footer text-center">
                                        <?php if($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                    <a href="#" data-name="description" data-title="Description" class="description" data-type="text" data-pk="<?php echo $photos['idPhoto'];?>">
                                        <?php echo $photos['description'];?></a> <?php } else { 
                                         echo $photos['description']; } ?>
                                       
                                        

                                    </div>
                                                    </div></div> <?php } ?>


                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="tab-pane" id="people">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <?php
                                            echo "<span style='font-size:18px'>" . $info['people'] . "</span>";
                                            echo "<hr>";
                                            if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                                ?>
                                                <form role="form" class="pull-left" action="editcountrypeople.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <div class="form-group">
                                                        <?php if ($info['people'] != NULL) { ?>
                                                            <button type="submit" class="btn btn-xl btn-default">
                                                                Edit info!</button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add info!</button>
                                                        <?php } ?>

                                                    </div>

                                                </form>
                                            <form role="form" class="pull-right" action="addphotos.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <input type="hidden" name="cat" value="people">
                                                    <div class="form-group">
                                                        
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add photos to this section!</button>
                                                            
                                                    </div>

                                                </form>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="row">

                                                <?php
                                                $sqlPhoto = "SELECT idPhoto, path, description FROM photo WHERE idCountry={$idC} AND category='people' AND active=1";
                                                $resPhoto = mysqli_query($conn, $sqlPhoto);
                                                while ($photos = mysqli_fetch_assoc($resPhoto)) {
                                                    ?>
                                                    <div class="col-md-3 col-xs-6 col-sm-6">
                                                    <div class="panel panel-default" id="item_<?php echo $photos['idPhoto'] ?>">
                                                        <div class="panel-body">
                                                    <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                                    <div class="row">
                                                        <div class="col-md-offset-10 col-md-1">
                                                            <a href="#" class="del_button" id="del-<?php echo $photos['idPhoto'] ?>">
                                                        <img src="imgs/mail_delete.png" />
                                                    </a>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <?php } ?>
                                                            <div class="row"><div class="col-md-12">
                                                        <a href="<?php echo $photos['path'] ?>" target="_blank">
                                                        <img src="<?php echo $photos['path'] ?>" class="img-responsive center-block" style="height:120px"/>
                                                    </a>
                                                        </div></div>
                                                    
                                                </div>
                                    <div class="panel-footer text-center">
                                        <?php if($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                    <a href="#" data-name="description" data-title="Description" class="description" data-type="text" data-pk="<?php echo $photos['idPhoto'];?>">
                                        <?php echo $photos['description'];?></a> <?php } else { 
                                         echo $photos['description']; } ?>
                                       
                                        

                                    </div></div> </div><?php } ?>


                                            </div>
                                        </div>
                                    </div> </div>
                                <div class="tab-pane" id="customs">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <?php
                                            echo "<span style='font-size:18px'>" . $info['customs'] . "</span>";
                                            echo "<hr>";
                                            if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                                ?>
                                                <form role="form" class="pull-left" action="editcountrycustoms.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <div class="form-group">
                                                        <?php if ($info['customs'] != NULL) { ?>
                                                            <button type="submit" class="btn btn-xl btn-default">
                                                                Edit info!</button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add info!</button>
                                                        <?php } ?>

                                                    </div>

                                                </form>
                                            <form role="form" class="pull-right" action="addphotos.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <input type="hidden" name="cat" value="customs">
                                                    <div class="form-group">
                                                        
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add photos to this section!</button>
                                                            
                                                    </div>

                                                </form>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">

                                            <div class="row">

                                                <?php
                                                $sqlPhoto = "SELECT idPhoto, path, description FROM photo WHERE idCountry={$idC} AND category='customs' AND active=1";
                                                $resPhoto = mysqli_query($conn, $sqlPhoto);
                                                while ($photos = mysqli_fetch_assoc($resPhoto)) {
                                                    ?>
                                                    <div class="col-md-3 col-xs-6 col-sm-6">
                                                    <div class="panel panel-default" id="item_<?php echo $photos['idPhoto'] ?>">
                                                        <div class="panel-body">
                                                    <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                                    <div class="row">
                                                        <div class="col-md-offset-10 col-md-1">
                                                            <a href="#" class="del_button" id="del-<?php echo $photos['idPhoto'] ?>">
                                                        <img src="imgs/mail_delete.png" />
                                                    </a>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <?php } ?>
                                                            <div class="row"><div class="col-md-12">
                                                        <a href="<?php echo $photos['path'] ?>" target="_blank">
                                                        <img src="<?php echo $photos['path'] ?>" class="img-responsive center-block" style="height:120px"/>
                                                    </a>
                                                        </div></div>
                                                    
                                                </div>
                                                        <div class="panel-footer text-center">
                                        <?php if($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                    <a href="#" data-name="description" data-title="Description" class="description" data-type="text" data-pk="<?php echo $photos['idPhoto'];?>">
                                        <?php echo $photos['description'];?></a> <?php } else { 
                                         echo $photos['description']; } ?>
                                       
                                        

                                    </div>
                                                    </div></div> <?php } ?>


                                            </div>
                                        </div>
                                    </div> </div>



                            </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane" id="uni">
                   <div class="row">
                        <div class="col-md-12">
                            <div class="tabs-left">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#unis" role="tab" data-toggle="tab">Universities</a></li>
                                <li><a href="#student" role="tab" data-toggle="tab">Student life</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="unis">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <?php
                                            $sqlUni = "SELECT idUniversity, uniName, city, uniInfo, url FROM university WHERE Active=1 AND IDCountry={$idC} ORDER BY uniName";
                                            $resultUni = mysqli_query($conn, $sqlUni);

                                            while ($rowUni = mysqli_fetch_assoc($resultUni)) {
                                                ?>

                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <div class="panel-title"><h3><?php echo $rowUni['uniName'] .", ". $rowUni['city']; ?>
                                                                </h3>
                                                        </div>

                                                    </div>
                                                    <div class="panel-body">
                                                        <?php
                                                        echo "<h4>" . $rowUni['uniInfo'] . "</h4>";
                                                        
                                                        ?>
                                                    </div>
                                                    <div class="panel-footer">
                                                        Web page: <a href="http://<?php
                                                        echo $rowUni['url'];?>"><?php
                                                        echo $rowUni['url'];?></a> 
                                                        <?php
                                                        if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                                            ?>
                                                            <form class="pull-right" role="form" action="deleteuni.php" method="post">
                                                                <input type="hidden" name="idUni" value="<?php echo $rowUni['idUniversity']; ?>">
                                                                <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                                <div class="form-group">
                                                                    <button onclick="return confirm('Are you sure you want to delete this university?')" type="submit" class="btn btn-sm btn-danger">Delete Uni!</button>

                                                                </div>

                                                            </form>
                                                            <form class="pull-right" role="form" action="edituni.php" method="post">
                                                                <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                                <input type="hidden" name="idUni" value="<?php echo $rowUni['idUniversity']; ?>">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-sm btn-info">Edit Uni!</button>

                                                                </div>

                                                            </form> <?php } ?>
                                                    </div>
                                                </div>

                                        <?php } ?>
                                            <hr>
                                            <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                            ?>
                                            <form role="form" class="pull-left" action="adduni.php" method="post">
                                                <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                <div class="form-group">
                                                    
                                                        <button type="submit" class="btn btn-xl btn-primary">
                                                            Add uni!</button>
                                                </div>

                                            </form>
                                            <form role="form" class="pull-right" action="addphotos.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <input type="hidden" name="cat" value="uni">
                                                    <div class="form-group">

                                                        <button type="submit" class="btn btn-xl btn-primary">
                                                            Add photos to this section!</button>

                                                    </div>

                                                </form>
                                           
                                            <?php }
                                        ?>
                                        </div>
                                        
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    
                                    <div class="row">
                                        <?php
                                        $sqlPhoto = "SELECT idPhoto, path, description FROM photo WHERE idCountry={$idC} AND category='uni' AND active=1";
                                        $resPhoto = mysqli_query($conn, $sqlPhoto);
                                        while ($photos = mysqli_fetch_assoc($resPhoto)) {
                                            ?>

                                            <div class="panel panel-default col-md-6" id="item_<?php echo $photos['idPhoto'] ?>">
                                                <div class="panel-body">
                                                    <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                                        <div class="row">
                                                            <div class="col-md-offset-10 col-md-1">
                                                                <a href="#" class="del_button" id="del-<?php echo $photos['idPhoto'] ?>">
                                                                    <img src="imgs/mail_delete.png" />
                                                                </a>
                                                            </div>

                                                        </div>

                                                    <?php } ?>
                                                    <div class="row"><div class="col-md-12">
                                                            <a href="<?php echo $photos['path'] ?>" target="_blank">
                                                                <img src="<?php echo $photos['path'] ?>" class="img-responsive center-block" style="height:120px"/>
                                                            </a>
                                                        </div></div>

                                                </div>
                                                <div class="panel-footer text-center">
                                                    <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                                        <a href="#" data-name="description" data-title="Description" class="description" data-type="text" data-pk="<?php echo $photos['idPhoto']; ?>">
                                                            <?php echo $photos['description']; ?></a> <?php } else {
                                                    echo $photos['description'];
                                                }
                                                ?>



                                                </div>
                                            </div> <?php } ?>

                                    </div>
                                </div>
                              </div> 
                      </div>
                                <div class="tab-pane" id="student">
                                  <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <?php
                                            echo "<span style='font-size:18px'>" . $info['student'] . "</span>";
                                            echo "<hr>";
                                            if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                                ?>
                                                <form role="form" class="pull-left" action="editcountrystudent.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <div class="form-group">
                                                        <?php if ($info['student'] != NULL) { ?>
                                                            <button type="submit" class="btn btn-xl btn-default">
                                                                Edit info!</button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add info!</button>
                                                        <?php } ?>

                                                    </div>

                                                </form>
                                            <form role="form" class="pull-right" action="addphotos.php" method="post">
                                                    <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                                    <input type="hidden" name="cat" value="student">
                                                    <div class="form-group">
                                                        
                                                            <button type="submit" class="btn btn-xl btn-primary">
                                                                Add photos to this section!</button>
                                                            
                                                    </div>

                                                </form>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="row">

                                                <?php
                                                $sqlPhoto = "SELECT idPhoto, path, description FROM photo WHERE idCountry={$idC} AND category='student' AND active=1";
                                                $resPhoto = mysqli_query($conn, $sqlPhoto);
                                                while ($photos = mysqli_fetch_assoc($resPhoto)) {
                                                    ?>
                                                    <div class="col-md-3 col-xs-6 col-sm-6">
                                                    <div class="panel panel-default" id="item_<?php echo $photos['idPhoto'] ?>">
                                                        <div class="panel-body">
                                                    <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                                    <div class="row">
                                                        <div class="col-md-offset-10 col-md-1">
                                                            <a href="#" class="del_button" id="del-<?php echo $photos['idPhoto'] ?>">
                                                        <img src="imgs/mail_delete.png" />
                                                    </a>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <?php } ?>
                                                            <div class="row"><div class="col-md-12">
                                                        <a href="<?php echo $photos['path'] ?>" target="_blank">
                                                        <img src="<?php echo $photos['path'] ?>" class="img-responsive center-block" style="height:120px"/>
                                                    </a>
                                                        </div></div>
                                                    
                                                </div>
                                                        <div class="panel-footer text-center">
                                        <?php if($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) { ?>
                                    <a href="#" data-name="description" data-title="Description" class="description" data-type="text" data-pk="<?php echo $photos['idPhoto'];?>">
                                        <?php echo $photos['description'];?></a> <?php } else { 
                                         echo $photos['description']; } ?>
                                       
                                        

                                    </div>
                                                    </div></div> <?php } ?>


                                            </div>
                                        </div>
                                    </div> 
                            </div>
                        </div>
                        
                        </div>
                            
                     </div>
                   </div>
                </div>
              
                <div class="tab-pane" id="quiz">
                    <div class="row">
                        <form role="form" action="quiz.php" method="post">
                            <div class="form-group">
                                <?php
                                // get questions and display them as forms with radio buttons
                                $sqlQ = "SELECT idQuestion, question, choice1, choice2, choice3, answer FROM quiz WHERE idCountry={$idC} ORDER BY rand();";
                                $resQ = mysqli_query($conn, $sqlQ);
                                $i = 0;
                                while ($rowQ = mysqli_fetch_assoc($resQ)) {
                                    $i++;
                                    ?>
                                    <div class="col-md-6">
                                        <label id="questionsize"><?php echo $i.". " . $rowQ['question']; ?></label>                                    
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
                                        <input type="hidden" name="question<?php echo $i; ?>" value="<?php echo $rowQ['idQuestion']; ?>">
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if (mysqli_num_rows($resQ) > 0) { ?>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success btn-lg">Submit answers!</button>
                                    <button type="reset" class="btn btn-danger btn-lg">Clear!</button>
                                </div> <?php } ?>
                            <input type="hidden" name="country" value="<?php echo $idC; ?>">
                        </form>
                        <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                            ?>
                            <form role="form" action="addquestion.php" method="post">
                                <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                <div class="form-group">
                                     Number of questions to add
                                    <input type="number" name="number" min="1" max="3" value="1">
                                    <button type="submit" class="btn btn-xl btn-primary">
                                        Add question(s)!
                                    </button>

                                </div>

                            </form>
                            <?php }
                        ?>
                    </div> </div>
                <div class="tab-pane" id="review">
                    <div class="row">
                       <!-- display reviews in a grid with title, text and source. display grade as stars and color according to the star number -->
                    <?php
                    $sql = "SELECT idReview, Title, Review, Grade, Source, datetime FROM review WHERE Active=1 AND IDCnt={$idC} ORDER BY datetime DESC";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-6" style="min-height:300px; position:relative">
                           
                        <div class="panel <?php
                        if ($row['Grade'] < 3)
                            echo 'panel-danger';
                        elseif ($row['Grade'] == 3)
                            echo 'panel-primary';
                        else
                            echo 'panel-success';
                        ?>" style="min-height: 100%">
                            <div class="panel-heading">
                                <div class="panel-title"><h3><?php echo $row['Title']; ?>
                                        <?php
                                        for ($i = 1; $i <= $row['Grade']; $i++)
                                            echo "<span class='glyphicon glyphicon-star pull-right'/>";
                                        ?></h3>
                                </div>

                            </div>
                            <div class="panel-body">
                                <?php
                                echo "<h4>" . $row['Review'] . "</h4>";
                                $date = strtotime($row['datetime']);
                                $date = date("d/m/Y", $date);
                                echo "<b><span class='pull-right'>" . $date . "</span></b>";
                                ?>
                            </div>
                            <div class="panel-footer">
                                Source of the knowledge: <?php
                                echo $row['Source'];

                                if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                    ?>
                                    <form role="form" action="deletereview.php" method="post">
                                        <input type="hidden" name="idRev" value="<?php echo $row['idReview']; ?>">
                                        <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                        <div class="form-group">
                                            <button onclick="return confirm('Are you sure you want to delete this review?')" type="submit" class="btn btn-sm btn-danger pull-left">Delete Review!</button>

                                        </div>

                                    </form>
                                    <form role="form" action="editreview.php" method="post">
                                        <input type="hidden" name="idCountry" value="<?php echo $idC ?>">
                                        <input type="hidden" name="idRev" value="<?php echo $row['idReview']; ?>">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Edit Review!</button>

                                        </div>

                                    </form> <?php } ?>
                            </div>
                        </div> 
                        </div>

                    <?php } ?> </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <!-- form to add new reviews -->
                                <h4> Share your thoughts! <i class="fa fa-comment"></i></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="addreview.php" method="post">
                                <div class="form-group">
                                    <label for="revtitle">Give your review a title (3 characters minumum)<span class="text-danger">*</span></label>
                                    <input type="text" pattern=".{3,}" maxlength="50" class="form-control" id="revtitle" name="revtitle" required>
                                </div>
                                <div class="form-group">
                                    <label for="revtext">Your review <span class="text-danger">*</span></label>
                                    <textarea class="form-control" pattern=".{10,}" rows="5" id="revtext" name="revtext" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="revsrc">Source of your knowledge (5 characters minimum)<span class="text-danger">*</span></label>
                                    <input type="text" pattern=".{5,}" maxlength="50" class="form-control" id="revsrc" name="revsrc" required>
                                </div>
                                <div class="form-group">
                                    <label>Rate your experience<span class="text-danger">*</span> <br></label>                                    
                                    <label class="radio-inline">
                                        <input type="radio" name="grade" id="inlineRadio1" value="1" required>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="grade" id="inlineRadio2" value="2">
                                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="grade" id="inlineRadio3" value="3">
                                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="grade" id="inlineRadio3" value="4">
                                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="grade" id="inlineRadio3" value="5">
                                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <button onclick="return confirm('Are you sure you have entered all you wanted?')" type="submit" class="btn btn-success">Add Review!</button>
                                    <button type="reset" class="btn btn-danger">Clear!</button>
                                </div>



                                <input type="hidden" name="country" value="<?php echo $idC; ?>"> 
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="tab-pane" id="buddy">
                    <div class="row">
                        <?php
                        // get buddies for countries and display them in a grid with buttons if logged in
                        $sqlBuddy = "SELECT idBuddy, name, email, city FROM ebuddy WHERE idCoun = {$idC} AND Active=1 GROUP BY city";
                        $resultBuddy = mysqli_query($conn, $sqlBuddy);

                        while ($rowBuddy = mysqli_fetch_assoc($resultBuddy)) {
                            ?>

                            <div class="col-md-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="panel-title">

                                            <h4> Name: <?php echo $rowBuddy['name']; ?> </h4>

                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        City: <?php echo $rowBuddy['city']; ?> <br>
                                        Email: <?php echo $rowBuddy['email']; ?>
                                        <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == strtolower($name['name'])) {
                                            ?>
                                            <form role="form" action="deleteebuddy.php" method="post">
                                                <input type="hidden" name="idBud" value="<?php echo $rowBuddy['idBuddy']; ?>">
                                                <div class="form-group">
                                                    <button onclick="return confirm('Are you sure you want to delete this E-Buddy?')" type="submit" class="btn btn-sm btn-danger pull-left">Delete E-Buddy!</button>

                                                </div>

                                            </form>
                                            <form role="form" action="editebuddy.php" method="post">
                                                <input type="hidden" name="idBud" value="<?php echo $rowBuddy['idBuddy']; ?>">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-info pull-right">Edit E-Buddy!</button>

                                                </div>

                                            </form> <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        if (mysqli_num_rows($resultBuddy) == 0) {
                            ?>
                            <div class="col-md-12">
                            <div class="well">
                                Unfortunately there are currently no E-buddies for this country. Apply <a href="buddy.php?idC=<?php echo $idC; ?>"> here! </a>
                            </div>
                            </div>
                        <?php } ?>
                    </div> 
                </div></div>
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="well text-center">
                            <!-- button to go to application page -->
                            <h4>You have been to this country or is it perhaps your homeland?
                            Want to help ISIGoing by providing some information? <a href="apply.php?idC=<?php echo $idC; ?>" class="text-center btn btn-success btn-sm">Apply here! </a>
                            </h4></div>
                    </div>
                </div>
            
            <?php include 'footer.php'; ?>
            
        </div>

    </body>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- script for scroll animation of tabs -->
    <script>
            $(document).on("click", "a[name='general']", function(e) {
                $('html, body').animate({scrollTop: $('#general').offset().top}, 500);
                                                        });
            $(document).on("click", "a[name='uni']", function(e) {
                $('html, body').animate({scrollTop: $('#uni').offset().top}, 500);
                                                        });
            $(document).on("click", "a[name='quiz']", function(e) {
                $('html, body').animate({scrollTop: $('#quiz').offset().top}, 500);
                                                        });
            $(document).on("click", "a[name='review']", function(e) {
                $('html, body').animate({scrollTop: $('#review').offset().top}, 500);
                                                        });
            $(document).on("click", "a[name='buddy']", function(e) {
                $('html, body').animate({scrollTop: $('#buddy').offset().top}, 500);
                                                        });

    </script>
    <script type="text/javascript">
$(document).ready(function() {
        // Send delete Ajax request to response.php 
        $("body").on("click", ".del_button", function(e) {
                 e.preventDefault();
                 var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
                 var DbNumberID = clickedID[1]; //and get number from array
                 var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
                $(this).hide(); //hide currently clicked delete button
		 
                        jQuery.ajax({
                        type: "POST", // HTTP method POST or GET
                        url: "response.php", //Where to make Ajax calls
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
