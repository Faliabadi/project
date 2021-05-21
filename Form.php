<?php 
$server = "localhost";  //your servername
$db_user = "root"; //database username
$db_pass = ""; //database Password 
$db_name = "userdb01"; //insert your batabase name 
$tbl_name = "ارتباط با ما"; //insert your table name 
$user = $_POST['userName']; 
$pass = $_POST['passWord']; 
$email = $_POST['eMail']; 
if(!$user) {
	die('لطفا نام خود را وارد نمایید');
} 
if(!$pass) {
	die('نظرات نمی تواند خالی باشد');
} 
if(!$email) {
	die('ادرس ایمیل معتبر نیست');
} 
if(!preg_match('/[a-zA-z0-9._-]+@[a-zA-z0-9\.-]+\.[a-zA-z\.]+/', $email)) {
	die('آدرس ایمیل معتبر نمی باشد'); 
} 
$conn = mysql_connect($server, $db_user, $db_pass);
if(!$conn) { 
	die('connection error, connection not found');
} 
if(!mysql_select_db($db_name)) {
	die("database not found");
}
$pass_hash = md5($pass);
$query = mysql_query("insert into '$tbl_name' (user_Name, user_Pass, user_Email) values ('$user', '$pass_hash', '$email')"); 
if(mysql_affected_rows()>0) {
	die('متشکریم! ثبت نام شما با موفقیت انجام شد'); 
}
else {
	die('ثبت نام با مشکل مواجه شد، لطفا مجددا سعی نمایید'); 
} 
?>