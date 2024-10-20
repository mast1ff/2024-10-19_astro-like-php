<?php

if (!empty($_FILES["uploaded_file"])) {
  $path = "uploads/";
  $path = $path . basename($_FILES["uploaded_file"]["name"]);

  if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $path)) {
    echo "ファイル: " . basename($_FILES["uploaded_file"]["name"]) . " がアップロードされました";
  } else {
    echo "ファイルのアップロードに失敗しました";
  }
}

$files = scandir("uploads/");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>ファイルアップロード</title>
</head>

<body>
  <h1>ファイルアップロード</h1>
  <form enctype="multipart/form-data" action="upload.php" method="POST">
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>

  <ul>
    <?php foreach ($files as $file): ?>
      <?php
      if ($file === "." || $file === "..") {
        continue;
      }
      ?>
      <li><a href="uploads/<?= $file ?>"><?= $file ?></li>
    <?php endforeach; ?>
  </ul>
  <p><a href="index.php">戻る</a></p>
</body>

</html>
