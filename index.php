<?php
    ini_set('display_errors', '0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>freesia project</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
</head>
<body>
    <header>
        <h1><img src="img/logo.png" alt="logo">logo</h1>
    </header>
    <main>
        <aside>
            <?php
                session_start(); //세션 시작
                $userid = $_SESSION["userid"]; //세션 변수 설정
                $username = $_SESSION["username"];
                $userphone = $_SESSION["userphone"];
                if(!isset($userid)){ //$id 변수가 비어있으면 로그인
                    echo ('
                        <div class="wrap">
                            <form action="login.php" method="post" id="login" name="login_form">
                                <input type="text" id="id" name="id">
                                <input type="password" name="pw" id="pw">
                                <a href="#" onclick="check_input()"> 로그인 </a>
                            </form>
                            <ul>
                                <li><a href="join.php">회원가입</a></li>
                                <li><a href="findpw.php">비밀번호 찾기</a></li>
                            </ul>
                        </div>
                    ');
                    echo ('
                        <script>
                            function checksubmit(){
                                alert("로그인 후에 다시 시도해주세요");
                                return false;
                            }
                        </script>
                    ');
                }else{ // 변수가 있으면 로그아웃
                    echo('
                        <div class="wrap">
                            <p>'.$userid.'님 반갑습니다</p>
                            <ul class="user">
                                <li><a href="update.php">회원정보 수정</a></li>
                                <li><a href="setting.php">서비스 관리</a></li>
                            </ul>
                            <a href="logout.php">로그아웃</a>
                        </div>
                    ');
                    echo ('
                    <script>
                        function checksubmit(){
                            var subject = confirm("서비스를 신청하시겠습니까?");
                            if(subject == true){
                                return true;
                            }else{
                                return false;
                            }
                        }
                    </script>
                    ');
                }
            ?>
        </aside>
        <section>
            <h2>웹 호스팅</h2>
            <table>
                <tr>
                    <th>서비스 등급</th>
                    <th>Basic</th>
                    <th>Standard</th>
                    <th>Special</th>
                    <th>Premium</th>
                </tr>
                <tr>
                    <th>트래픽 사용량</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>디스크 용량</th>
                    <td>1G</td>
                    <td>2G</td>
                    <td>5G</td>
                    <td>10G</td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td>월 사용료 500원</td>
                    <td>월 사용료 1100원</td>
                    <td>월 사용료 5500원</td>
                    <td>월 사용료 1100원</td>
                </tr>
                <tr>
                    <td colspan='1'></td>
                    <form action="service.php" method="post" name="service" onsubmit="return checksubmit();">
                        <td><button name="grade" type="submit" value="basic">신청하기</button></td>
                        <td><button name="grade" type="submit" value="standard">신청하기</button></td>
                        <td><button name="grade" type="submit" value="special">신청하기</button></td>
                        <td><button name="grade" type="submit" value="premium">신청하기</button></td>
                    </form>
                </tr>
            </table>
            <span>*첫 이용시 설치비 11,000 추가부과</span>
        </section>
    </main>
    <script>
        function check_input(){
        if (!document.login_form.id.value)
	{
		alert("아이디가 입력되지 않았습니다");
	 	return;
	}
	if (!document.login_form.pw.value)
	{
		alert("패스워드가 입력되지 않았습니다")
		return;
	}
	document.login_form.submit();
}
    </script>
</body>
</html>