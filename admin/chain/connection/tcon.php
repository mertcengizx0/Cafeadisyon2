<?php
date_default_timezone_set("Europe/Istanbul");
header('Content-Type: text/html; charset=utf-8');

$hostet="localhost";
// DATABASE HOST

$databasename="adisyon";
// DATABASE NAME

$databaseuser="root";
// DATABASE KULLANICI ADI

$databaseuserpass="";
// DATABASE ŞİFRE



try {
    $db=new PDO('mysql:host='.$hostet.';dbname='.$databasename.';charset=UTF8;', $databaseuser, $databaseuserpass);
    $db->query("SET CHARACTER SET utf8");

}

catch (PDOExpception $e) {
echo $e->getMessage();
}
$con=mysqli_connect($hostet, $databaseuser, $databaseuserpass, $databasename);
$con->set_charset("utf8");




$secretKey="6LclDFsaAAAAABYYPkVX52-NM-XilcLCV8qQn7sF";
$gsitekey="6LclDFsaAAAAAMd6T2ZYpeIqO60wRfPie3Jvzq_v";
?>
