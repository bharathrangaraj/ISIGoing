<!DOCTYPE html>
<?php
include 'dbconnection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
        <!-- create map -->
        <script type="text/javascript">
            $(function($) {

                $("#map-europe").cssMap(
                        {
                            size: 540,
                            tooltips: "floating-top-left",
                            visibleList: false,
                            cities: false
                        });

            });
        </script>



    </head>
    <body>
        <?php include 'banner.php' ?>
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="well">
                        <h2 class="text-center">Click on a country to get info! </h2>
                        <!-- map container and country list with flag display -->
                        <div id="map-europe" style="width: 500px;">
                         
                            <ul class="europe">
                                <li class="eu1"><a href="country.php?idC=4"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=4";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Albania <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu2"><a href="country.php?idC=5"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=5";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Andorra <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu3"><a href="country.php?idC=6"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=6";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Austria <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu4"><a href="country.php?idC=7"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=7";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Belarus <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu5"><a href="country.php?idC=8"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=8";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Belgium <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu6"><a href="country.php?idC=9"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=9";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Bosnia and Herzegovina <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu7"><a href="country.php?idC=10"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=10";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Bulgaria <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu8"><a href="country.php?idC=1"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=1";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Croatia <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu9"><a href="country.php?idC=11"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=11";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Cyprus <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu10"><a href="country.php?idC=12"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=12";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Czech Republic <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu11"><a href="country.php?idC=13"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=13";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Denmark <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu12"><a href="country.php?idC=14"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=14";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Estonia <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu13"><a href="country.php?idC=15"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=15";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>France <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu14"><a href="country.php?idC=16"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=16";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Finland <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu15"><a href="country.php?idC=17"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=17";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Georgia <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu16"><a href="country.php?idC=2"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=2";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Germany <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu17"><a href="country.php?idC=18"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=18";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Greece <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu18"><a href="country.php?idC=19"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=19";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Hungary <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu19"><a href="country.php?idC=20"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=20";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Iceland <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu20"><a href="country.php?idC=21"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=21";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Ireland <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu21"><a href="country.php?idC=22"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=22";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>San Marino <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu22"><a href="country.php?idC=23"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=23";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Italiy <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu23"><a href="country.php?idC=24"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=24";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Kosovo <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu24"><a href="country.php?idC=25"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=25";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Latvia <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu25"><a href="country.php?idC=26"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=26";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Liechtenstein <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu26"><a href="country.php?idC=27"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=27";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Lithuania <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu27"><a href="country.php?idC=28"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=28";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Luxembourg <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu28"><a href="country.php?idC=29"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=29";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Macedonia <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"> <abbr title="The Former Yugoslav Republic of Macedonia">(F.Y.R.O.M.)</abbr></a></li>
                                <li class="eu29"><a href="country.php?idC=30"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=30";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Malta <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu30"><a href="country.php?idC=31"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=31";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Moldova <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu31"><a href="country.php?idC=32"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=32";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Monaco <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu32"><a href="country.php?idC=33"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=33";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Montenegro <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu33"><a href="country.php?idC=34"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=34";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Netherlands <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu34"><a href="country.php?idC=35"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=35";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Norway <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu35"><a href="country.php?idC=3"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=3";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Poland <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu36"><a href="country.php?idC=36"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=36";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Portugal <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu37"><a href="country.php?idC=37"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=37";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Romania <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu38"><a href="country.php?idC=38"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=38";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Russian Federation <img style="height:15px;width:25px" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu39"><a href="country.php?idC=39"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=39";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Serbia <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu40"><a href="country.php?idC=40"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=40";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Slovakia <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu41"><a href="country.php?idC=41"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=41";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Slovenia <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu42"><a href="country.php?idC=42"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=42";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Spain <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu43"><a href="country.php?idC=43"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=43";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Sweden <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu44"><a href="country.php?idC=44"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=44";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Switzerland <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu45"><a href="country.php?idC=45"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=45";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Turkey <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu46"><a href="country.php?idC=46"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=46";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>Ukraine <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <li class="eu47"><a href="country.php?idC=47"><?php
                                        $sqlFlag = "SELECT flag FROM country WHERE idCountry=47";
                                        $sqlQuery = mysqli_query($conn, $sqlFlag);
                                        $flag = mysqli_fetch_assoc($sqlQuery);
                                        ?>United Kingdom <img style="height:15px;width:25px" alt="" src="<?php echo $flag['flag']; ?>"></a></li>
                                <!-- remove this comment and UK list item (above) to activate the United Kingdom countries
                                  <li class="eu48"><a href="#england">England</a></li>
                                  <li class="eu49"><a href="#isle-of-man">Isle of Man</a></li>
                                  <li class="eu50"><a href="#northern-ireland">Northern Ireland</a></li>
                                  <li class="eu51"><a href="#scotland">Scotland</a></li>
                                  <li class="eu52"><a href="#wales">Wales</a></li>
                                -->
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <!-- buddy part -->
                    <div class="well">
                        <h3 class="text-center" style="word-wrap: break-word;"> Want to help someone out? </h3>
                        <a href="buddy.php">
                            <img src="imgs/bdy.jpg" class="img-responsive center-block"/>
                        </a>
                        <h3 class="text-center" style="word-wrap: break-word;"> Click to apply! </h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- recommendation part -->
                    <div class="well">
                        <h3 class="text-center" style="word-wrap: break-word;"> Not sure where to go? </h3>
                        <a href="recommendation.php">  <img src="imgs/rec.jpg" class="img-responsive center-block"/> </a>
                        <h3 class="text-center" style="word-wrap: break-word;"> Click to find out! </h3>
                    </div>
                </div>


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