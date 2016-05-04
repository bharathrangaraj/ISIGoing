<!DOCTYPE html>
<?php
include 'dbconnection.php';
// take answers from user and add grades for every answer for every country
$value = array();
$sqlCountry= "SELECT DISTINCT idCountry FROM recommendation";
$resultCountry = mysqli_query($conn, $sqlCountry);

while ($rows=  mysqli_fetch_assoc($resultCountry)) {
   $value[$rows['idCountry']] = 0; 
}

for ($i=1;$i<=sizeof($_POST);$i++){
    
    ${"answer$i"}=$_POST['answer'.$i];
    
    ${"sql$i"} = "SELECT value".${"answer$i"} . " as value, idCountry FROM recommendation WHERE idQuestion={$i}";
    
    ${"result$i"} = mysqli_query($conn, ${"sql$i"});
    while(${"row$i"} = mysqli_fetch_assoc(${"result$i"})) {
   
        $value[${"row$i"}['idCountry']] += ${"row$i"}['value'];
        
        
    } }
    $maxValue = max($value);


?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>
    <body>
        <?php include 'banner.php' ?>

        <div class="container">

            <div class="jumbotron text-center">
              
              <h3><i class="fa fa-plane fa-2x"></i> The best countries for you are
                  <?php
                  // sort countryies by value and take the first three and display them
                  arsort($value);
                  $value = array_slice($value, 0, 3, true);
                
                  $keys = array_keys($value);
                 
                    
                      for ($i = 0; $i < 3; $i++) {
                          $sql = "SELECT idCountry,name FROM country WHERE idCountry={$keys[$i]}";
                        
                          $sqlRes = mysqli_query($conn, $sql);
                          $sqlRow = mysqli_fetch_assoc($sqlRes);
                          if($i==2)
                          echo " and <a href='country.php?idC=".$sqlRow['idCountry']."'>" . $sqlRow['name']."</a>";
                          elseif ($i==1) echo " <a href='country.php?idC=".$sqlRow['idCountry']."'>" . $sqlRow['name']."</a>";
                          else echo "<a href='country.php?idC=".$sqlRow['idCountry']."'>" . $sqlRow['name']."</a>, ";
                      }
                  
                  ?>

 !          <i class="fa fa-plane fa-2x"></i> </h3> 

                
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