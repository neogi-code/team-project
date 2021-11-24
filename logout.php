<?php
    session_start();
    $_SESSION = array();
    echo "<script>alert('로그아웃 되었습니다  첫페이지로 돌아갑니다.'); location.href = 'index.php';</script>";
?>