<?php

session_start();

if (isset($_SESSION["views"])) {
  $_SESSION["views"]++;
} else {
  $_SESSION["views"] = 1;
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Session</title>
</head>

<body>
  <h1>Session</h1>
  <p>Page views: <?php echo $_SESSION["views"]; ?></p>
  <p><a href="index.php">戻る</a></p>
</body>

</html>
