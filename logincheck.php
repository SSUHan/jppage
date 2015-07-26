<?php
include("fmysql.php");
include("jpdefine.php");
$user_id = $_POST['user-id'];
$user_pw = $_POST['user-pw'];

if(!$conn = connect_mysqli(MYSQL_IP,MAIN_DB,DB_PASSWORD,USE_DB)){
	echo "connnection error!<br>";
}
else{
	echo "connect success!1<br>";
}
$sql = "SELECT * FROM ".USER_TABLE;

if(!$result = mysqli_query($conn,$sql)){
echo "query fail...<br>";
}

if(loginOK($user_id,$user_pw,$result)){
	echo("<script>document.location.href='".JP_PATH."login.html?mode=ok';</script>");

}
else{
	echo("<script>document.location.href='".JP_PATH."login.html?mode=no';</script>");
}
function loginOK($id,$pw,$result){
	while($row = mysqli_fetch_assoc($result)){
		if(strcmp($id,$row['userid'])==0 && strcmp($pw,$row['userpw'])==0){
			
			return true;
		}
	}
	return false;
}
?>