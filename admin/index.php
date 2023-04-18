<?php 
ob_start();
session_start();
include 'chain/connection/tcon.php';
date_default_timezone_set("Europe/Istanbul");
if (isset($_SESSION['administrator'])) {

$usere=$db->prepare("SELECT * from ausers where eposta=:eposta");
$usere->execute(array(
  'eposta' => $_SESSION['administrator']
));
$usereprint=$usere->fetch(PDO::FETCH_ASSOC);










function dil($dget){

$numara=substr($dget, 2);

$row=file_get_contents("chain/languages/en.txt");

$arr = explode('={', $row);



$parcala = explode('}', $arr[$numara]);
$yaz = $parcala[0];

echo $yaz;

}








if(isset($_GET['ix'])){

$myurl = $_GET['ix'];
$code =1;

}else{
$myurl ="home";
$code =0;
}

include 'chain/files/brain.php';
include 'chain/files/shoulder.php';
include 'chain/files/eye.php';

if ($code==1) {

if(file_exists('memory/'.$myurl.'.php')){
include 'memory/'.$myurl.'.php';
}else{

include 'memory/error.php';

}

}else{

include 'memory/'.$myurl.'.php';
}















include 'chain/files/foot.php';



}else{


include 'memory/login.php';
include 'chain/files/foot.php';

}


 ?>