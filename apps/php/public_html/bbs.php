<?php

// 掲示板のサンプルプログラム
// フォームに入力された内容をファイルに保存し、表示する

// ファイル名
$filename = "bbs.txt";

// 投稿メッセージ
$message = "";

// ファイルを読み込む
$posts = file($filename, FILE_IGNORE_NEW_LINES);
// ファイルが存在しない場合
if ($posts === false) {
  // ファイルを作成
  touch($filename);
  // ファイルを読み込む
  $posts = file($filename, FILE_IGNORE_NEW_LINES);
}

// フォームが送信されたとき
if (!empty($_POST["body"])) {
  // 最後の投稿番号を取得
  $last = end($posts);
  $items = explode(" ", $last);
  $number = $items[0];
  // 投稿番号を設定
  $number++;
  // 投稿されたメッセージを取得
  $body = $_POST["body"];
  // 投稿者名を取得
  $name = $_POST["name"];
  // 投稿日時を取得
  $date = date("Y-m-d H:i:s");
  // 書き込みデータを作成
  $data = $number . " " . $date . " " . $name . " " . $body . "\n";
  // ファイルを開く
  $handle = fopen($filename, "a");
  // ファイルに書き込む
  fwrite($handle, $data);
  // ファイルを閉じる
  fclose($handle);
  // 投稿メッセージを設定
  $message = "投稿しました";
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>掲示板</title>
</head>

<body>
  <h1>掲示板</h1>
  <form action="bbs.php" method="post">
    <label for="name">名前:</label>
    <input type="text" name="name" id="name"></input>
    <label for="body">本文:</label>
    <input type="text" name="body" id="body"></input>
    <input type="submit" name="submit" value="投稿"></input>
  </form>

  <? if (!empty($message)): ?>
    <p>投稿しました</p>
  <? endif; ?>

  <? if (empty($posts)): ?>
    <p>投稿はまだありません</p>
  <? else: ?>
    <h2>投稿一覧</h2>
    <ul>
      <? foreach ($posts as $post): ?>
        <?
        // 投稿を空白で分割
        $items = explode(" ", $post);
        // 投稿番号
        $number = $items[0];
        // 投稿日
        $date = $items[1];
        // 投稿時間
        $time = $items[2];
        // 投稿者名
        $name = $items[3];
        // 本文
        $body = $items[4];
        ?>
        <li>
          ID: <?= $number ?><br>
          <?= $date ?> <?= $time ?> <?= $name ?>:<br>
          <?= $body ?>
        </li>
      <? endforeach; ?>
    </ul>
  <? endif; ?>

  <p><a href="index.php">戻る</a></p>
</body>

</html>
