<?php
include('db.php');
$sql = "SELECT * FROM brands";
$data = fetchAll($sql);
// var_dump($data);
foreach($data as $row){
	echo $row['name']."<br>";
}
