<?php
include("fmysql.php");
$user_id = $_POST['user-id'];
$user_pw = $_POST['user-pw'];

if(!$conn = connect_mysqli("localhost","ljs93kr","wnddnjsQkd","ljs93kr")){
	echo "connnection error!<br>";
}
$sql = "SELECT * FROM jp_user_info";
$result = mysqli_query($conn,$sql);

if(loginOK($user_id,$user_pw,$result)){
	echo("<script>document.location.href='http://ljs93kr.cafe24.com/JPPage/login.html?mode=ok';</script>");

}
else{
	echo("<script>document.location.href='http://ljs93kr.cafe24.com/JPPage/login.html?mode=no';</script>");
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