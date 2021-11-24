<?php

$id = $_POST['id'];
$pw = $_POST['pw'];

$con = mysqli_connect("10.5.101.102","root","test123","project");
	$sql = "select * from membertbl where memberid='$id'";	
	$result = mysqli_query($con,$sql);

	$num_match = mysqli_num_rows($result); // 존재 여부 확인(행개수 세기)

	if(!$num_match){
		echo("
			<script>
			window.alert('등록되지 않은 사용자 입니다')
			history.go(-1)
			</script>
			");
	}
	else{
		$row = mysqli_fetch_array($result);
		$db_pw = $row["memberpw"];
		mysqli_close($con);

		// DB 로 부터의 패스워드와 폼에 입력한 패스워드 비교
		if($pw != $db_pw){
			echo ("
				<script>
					window.alert('잘못된 패스워드 입니다')
					history.go(-1)
				</script>
				");
			exit;
		} 
		else
		{
//정상적인 사용자 일 경우의 동작			
			session_start();
			$_SESSION['userid'] = $row["memberid"];
			$_SESSION['username'] = $row["membername"];
			$_SESSION['userphone'] = $row["memberphone"];

			echo("
				<script>
				 location.href = 'index.php';
				</script>
				");
		}
	}
?>