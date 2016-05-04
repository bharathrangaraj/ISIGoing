<?php
//include db configuration file
include_once("dbconnection.php");


if(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"])>0 && is_numeric($_POST["recordToDelete"]))
{	
	$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT); 
	echo 
	//try deleting record using the record ID we received from POST
        $delete_row = mysqli_query($conn, "UPDATE application SET active=0 WHERE idApp={$idToDelete}");
	
	if(!$delete_row)
	{    
		//If mysql delete query was unsuccessful, output error 
		header('HTTP/1.1 500 Could not delete record!');
		exit();
	}
        mysqli_close($conn);

}
else
{
	//Output error
	header('HTTP/1.1 500 Error occurred, Could not process request!');
    exit();
}
?>