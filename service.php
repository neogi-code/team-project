<?php
    $grade = $_POST["grade"];
    if($grade == "basic"){
        $disk = "1G";
        $traffic = "1m";
        $fee = "500";
    }elseif($grade == "standard"){
        $disk = "2G";
        $traffic = "2.5m";
        $fee = "1,100";
    }elseif($grade == "special"){
        $disk = "5G";
        $traffic = "5m";
        $fee = "5,500";
    }else{
        $disk = "10G";
        $traffic = "10m";
        $fee = "11,000";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>서비스 신청</title>
</head>
<body>
    <form action="system.php" name="system" method="post" onsubmit="return fSubmit();">
        <p><span>신청 계정</span><input type="text" name="serviceid" id="id"></p>
        <p><span>신청 패스워드</span><input type="password" name="servicepw" id="pw"></p>
        <p><span>신청 패스워드 확인</span><input type="password" name="servicepw_confirm"></p>
        <p>현재 신청중인 서비스: <?=$grade?></p>
        <p>제공되는 디스크/트래픽: <?=$disk?>/<?=$traffic?></p>
        <?php
            session_start();
            $userid = $_SESSION["userid"];
            $conn = mysqli_connect( '10.5.101.102', 'root', 'test123', 'project' );
            $sql = "select memberjoin from membertbl where memberid='$userid'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $join = $row['memberjoin'];
            if($join == 0){
                echo "<p>결제 금액: ".$fee."(월 결제금액) + 11,000(설치비)</p>";
                mysqli_query($conn,"update membertbl set memberjoin = 1 where memberid = '$userid'");
            }else{
                echo "<p>결제 금액: ".$fee."(월 결제금액)";
            }
        ?>
        <button type="submit">신청하기</button>
    </form>
    <script>
        function fSubmit() {
            var check = confirm("서비스를 신청하시겠습니까?");
            if (check == true){
                if (!document.system.serviceid.value)
	                {
		                alert("신청하실 아이디를 입력해주세요");
	 	                return false;
	                }
	            if (!document.system.servicepw.value)
	                {
		                alert("신청하실 패스워드를 입력해주세요")
                        return false;
	                }
                if(document.system.servicepw_confirm.value != document.system.servicepw.value){
                        alert("비밀번호와 비밀번호 확인이 일치하지 않습니다");
                        return false;
                    }
                    else{
                        document.system.submit();
                        return true
                    }
            }else {
                return false;
            }
        }
    </script>
</body>
</html>