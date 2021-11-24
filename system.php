<?php
    session_start();
    $userid = $_SESSION["userid"];
    $conn = mysqli_connect( '10.5.101.102', 'root', 'test123', 'project' );
    $sql = "select 'join' from membertbl where memberid='$userid'"; //수정하기
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $order = 'ping 10.5.101.100';
    $result = shell_exec($order);
    echo "<pre>$result</pre>";
?>