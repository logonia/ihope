<?php
include 'connect.php';
include 'function.php';
//Create Object for DB_Functions clas
$db = new DB_Functions(); 
//Get JSON posted by Android Application
$json = $_POST["usersJSON"];
//Remove Slashes
if (get_magic_quotes_gpc()){
$json = stripslashes($json);
}
//Decode JSON into an Array
$data = json_decode($json);
//Util arrays to create response JSON
$a=array();
$b=array();
//Loop through an Array and insert data read from JSON into MySQL DB
for($i=0; $i<count($data) ; $i++)
{
//Store User into MySQL DB
$res = $db->storedata($data[$i]->callid,$data[$i]->pid,$data[$i]->pname,$data[$i]->medstay_amt,$data[$i]->med_amt,$data[$i]->imv_amt,$data[$i]->othermc_amt,$data[$i]->emtrans_amt,$data[$i]->outpden_am,$data[$i]->otherps_amt,$data[$i]->herb_amt,$data[$i]->medban_amt,$data[$i]->othermp_amt,$data[$i]->assist_amt,$data[$i]->code,$data[$i]->date);
	//Based on inserttion, create JSON response
	if($res){
		$b["id"] = $data[$i]->pid;
		$b["status"] = 'yes';
		array_push($a,$b);
	}else{
		$b["id"] = $data[$i]->pid;
		$b["status"] = 'no';
		array_push($a,$b);
	}
}
//Post JSON response back to Android Application
echo json_encode($a);
?>