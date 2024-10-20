<?php

if (!empty($_POST["username"])) {
  setcookie("username", $_POST["username"], time() + 60 * 60 * 24 * 30);
  $message = "Cookieを保存しました";
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Cookie</title>
</head>

<body>
  <h1>Cookie</h1>
  <form action="cookie.php" method="post">
    <label for="username">ユーザ名:</label>
    <input type="text" name="username" id="username"></input>
    <input type="submit" name="submit" value="保存"></input>
  </form>

  <? if (!empty($message)): ?>
    <p><?= $message ?></p>
  <? endif; ?>

  <? if (!empty($_COOKIE["username"])): ?>
    <p>Cookieに保存されたユーザ名: <?= $_COOKIE["username"] ?></p>
  <? endif; ?>
  <p><a href="index.php">戻る</a></p>
</body>

</html>
