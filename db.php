<?php
global $conn;

function logDebug($mess){
	error_log(gmdate('y-m-d H:i:s', time()+3600*7)." $mess \n",3,"mylog.log");
}

function connectDb(){
	global $conn;
	$conn = mysql_connect('localhost','root','') or die('connectDB fail');
	mysql_select_db('php_basic',$conn) or die('select db fail');
	mysql_set_charset('utf8',$conn);
}

function close(){
	global $conn;
	mysql_close($conn);
}

function exec_select($sql){
	global $conn;
	logDebug("sql=[$sql]");
	connectDb();
	$result = mysql_query($sql,$conn);
	$error = mysql_error();
	if($error){
		echo "cant select";
		logDebug("error=[$error]");
	}
	$data = array();
	while($row = mysql_fetch_assoc($result)){
		$data[] = $row;
	}
	close();
	return $data;
}

function exec_update($sql){
    global $conn;
    logDebug("sql=[$sql]");
    connectDb();
    $result = mysql_query($sql,$conn);
    $error = mysql_error();
    if($error){
        echo "cant select";
        logDebug("error=[$error]");
    }
    $rows = mysql_affected_rows();
    close();
    return $rows;
}

function fetchAll($sql){
	$data = exec_select($sql);
	return $data;
}

function fetchOne($sql){
	$data = exec_select($sql);
	return $data[0];
}

function validateForm($arr = array()){
    if($arr){
        $data = array();
        foreach ($arr as $k => $v) {
            if($v == null){
                $data['error'][$k] = "Mời nhập ".$k;
            } else {
                $data[$k] = $v;
            }
        }
        return $data;
    }
}

function checkLogin($u,$p){
    $p = md5($p);
    $sql = "SELECT * FROM users WHERE email='".$u."' AND password='".$p."'";
    logDebug($sql);
    $data = exec_select($sql);
    if($data)
        return true;
    else
        return false;
}