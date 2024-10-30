<?php
// main.php
session_start();

if (!isset($_COOKIE['logged_in']) || $_COOKIE['logged_in'] !== 'true') {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>メインページ</title>
</head>

<body>
  <h2>ようこそ、<?php echo htmlspecialchars($_SESSION['username']); ?>さん！</h2>
  <p>ログインに成功しました。</p>
  <a href="logout.php">ログアウト</a>
</body>

</html>