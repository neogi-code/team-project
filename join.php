<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>회원 가입</title>
    <style>
      body { font-family: sans-serif; font-size: 14px; }
      input, button { font-family: inherit; font-size: inherit; }
    </style>
  </head>
  <body>
    <h1>회원 가입</h1>
    <form action="join_check.php" method="POST">
      <p><input type="text" name="id" placeholder="계정" required></p>
      <p><input type="password" name="pw" placeholder="비밀번호" required></p>
      <p><input type="password" name="pw_confirm" placeholder="비밀번호 확인" required></p>
      <p><input type="text" name="name" id="name" placeholder="이름"></p>
      <p><input type="tel" name="phone" id="phone" placeholder="전화번호"></p>
      <p><input type="submit" value="회원 가입"></p>
      <input type="hidden" name="default" value="0">;
    </form>
  </body>
</html>