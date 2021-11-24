<?php
    session_start();

  $id = $_POST[ 'id' ];
  $pw = $_POST[ 'pw' ];
  $name = $_POST[ 'name'];
  $phone = $_POST['phone'];
  $pw_confirm = $_POST[ 'pw_confirm' ];
  if ( !is_null( $id ) ) {
    $conn = mysqli_connect( '10.5.101.102', 'root', 'test123', 'project' );
    $sql = "select * from membertbl where memberid='$id'";
    $result = mysqli_query( $conn, $sql );

    $num_match = mysqli_num_rows($result);
    if ($num_match) {
        echo "<script>alert('사용자가 이미 존재합니다'); history.go(-1);</script>";
    }else {
        $register = "insert into membertbl values ('$id','$name','$phone','$pw')";
        $join_result = mysqli_query($conn,$register);

        if ($join_result){
            echo "<script>alert('회원가입 되었습니다'); location.href='index.php'</script>";
            $row = mysqli_fetch_array($result);
            $_SESSION["userid"] = $row["memberid"];
            $_SESSION["username"] = $row["memberid"];
        }else {
            echo "<script> alert('회원가입에 실패했습니다')</script>";
        }
    }
    }
?>