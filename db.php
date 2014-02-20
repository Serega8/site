

<?
//print_r($_POST); die;


$name        = $_POST['name'];
$email_index = $_POST['email_index'];
$country     = $_POST['country'];
$city        = $_POST['city'];
$adress      = $_POST['adress'];
$email       = $_POST['email'];



$dbconn = pg_connect("host=ec2-54-204-41-178.compute-1.amazonaws.com port=5432 dbname=dcm98av0invfl 
user=wkfdugcnnqaobc
password=4GVSrTvAi_j5qCMj5Qf882O3aM sslmode=require 
options='--client_encoding=UTF8'") 
or die('Could not connect: ' . pg_last_error());


 if ($dbconn) echo "TRUE", "<br>";

//-------------------------------------------------

	// $query = "CREATE TABLE order (
	// 	id      		serial,
	// 	name    		varchar(40),
	// 	email_index     varchar(40),
	// 	country    		varchar(40),
	// 	city    		varchar(40),
	// 	adress    		varchar(40),
	// 	email    		varchar(40)
	// 	);";

 // if($query) echo "table create";

//-------------------------------------------------

$query = "INSERT INTO \"order\" (name, email_index, country, city, adress, email)
 VALUES ('$name','$email_index', '$country', '$city', '$adress', '$email');";

$result = pg_query($query);

if ($result){
	echo "ok";

	$data = pg_fetch_array($result, 0, PGSQL_NUM);
	
	foreach ($data as $key => $value) {
		echo "<br>", $key, " => ", $value;
	}

}else{
	print_r(pg_last_error());
}

?>