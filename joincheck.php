<?php
include("fmysql.php");
$user_id = $_POST['user-id'];
$user_pw = $_POST['user-pw'];
$user_name = $_POST['user-name'];

echo $user_id." ".$user_pw." ".$user_name;


if(!$conn = connect_mysqli("localhost","ljs93kr","wnddnjsQkd","ljs93kr")){
	echo "connnection error!<br>";
}
else{
echo "connect success!<br>";
}
$sql = "SELECT * FROM jp_user_info";

if(!$result = mysqli_query($conn,$sql)){
echo "query fail...<br>";
}



if(joinOK($user_id,$result)){
	$sql = "INSERT INTO usertable (pid, username, userpw, created) VALUES ('".$user_id."','".$user_name."','".$user_pw."',now())";
	if(mysqli_query($conn,$sql)){
		echo("<script>document.location.href='http://ljs93kr.cafe24.com/JPPage/join.html?mode=ok';</script>");

	}
	

}
else{
	echo("<script>document.location.href='http://ljs93kr.cafe24.com/JPPage/join.html?mode=no';</script>");
}
function joinOK($id,$result){
	while($row = mysqli_fetch_assoc($result)){
		if(strcmp($id,$row['userid'])==0){
			
			return false;
		}
	}
	return true;
}

?>