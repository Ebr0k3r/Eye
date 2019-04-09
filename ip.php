<?php
function get_ip() {
	if(isset($_SERVER['HTTP_CLIENT_IP'])){
		return $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else{
		return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	}
}
$ip=get_ip();
$query=@unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status']=='success'){
	echo "isp:".$query['isp']."<br/>";
	echo "country:".$query['country']."<br>";
	echo "country code:".$query['countryCode']."<br/>";
	echo "Estado:".$query['regionName']."<br>";
	echo "latitud:".$query['isp']."<br/>";
	echo "longitud:".$query['country']."<br>";
} else {
	echo "nose que pedo";
}
?>