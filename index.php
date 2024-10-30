<?php
session_start();
if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] === 'true') {
  header("Location: main.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
</head>

<body>
  <h2>ログインフォーム</h2>
  <form action="login.php" method="POST">
    <label for="username">ユーザー名:</label>
    <input type="text" id="username" name="username" required><br>
    <label for="password">パスワード:</label>
    <input type="password" id="password" name="password" required><br>
    <button type="submit">ログイン</button>
  </form>
  <?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
  <?php endif; ?>
</body>

</html>