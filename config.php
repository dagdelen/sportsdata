<?php
session_start();
ob_start(); 

header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'sportsdata'); 
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'dagdelen5684');  

$ip = getHostByName(getHostName());

$uye 		= $_COOKIE[uye];
$yetki 		= $_COOKIE[yetki];
$yetki_id 	= $_COOKIE[yetki_id];
$yer 		= $_COOKIE[yer];
$yer_id 	= $_COOKIE[yer_id];

include 'pdo.php';



$logo = "assets/img/logo.png"; 
$favicon = "assets/img/favicon.png";
$apple_touch_icon = "assets/img/apple-touch-icon.png";

if($uye > 0)
{
	setcookie("uye",$uye,time()+3600*24);

	$bendbsql = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
	$bendbsql->execute(array($uye));
	$ben = $bendbsql->fetch(PDO::FETCH_ASSOC);
	
	$ad 	= $ben[ad];	
	$soyad 	= $ben[soyad];	

	$resim = "assets/vendor/img/img_avatar1.png";

}


if(! $dil){$dil="tr";}
$trdilbak = DB::get('SELECT * FROM dil ORDER BY id DESC ');	
foreach($trdilbak as $dill){
	if($dill->$dil > '0'){
		define($dill->ad,	$dill->$dil, true);
	}else{
		define($dill->ad,	$dill->ad, true);
	}
}










