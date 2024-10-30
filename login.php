<?php
// login.php
session_start();

// JSONファイルのパス
$usernameFile = __DIR__ . '/data/user.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $inputUsername = $_POST['username'] ?? '';
  $inputPassword = $_POST['password'] ?? '';

  // JSONファイルからユーザーデータを読み込み
  if (!file_exists($usernameFile)) {
    die('ユーザー情報ファイルが存在しません。');
  }
  $userData = json_decode(file_get_contents($usernameFile), true);

  // 入力された情報と一致するユーザーが存在するか確認
  $authenticated = false;
  foreach ($userData as $user) {
    if ($user['username'] === $inputUsername && hash('sha256', $inputPassword) === $user['password']) {
      // 認証成功
      $authenticated = true;
      setcookie('logged_in', 'true', time() + 86400, "/", "", true, true); // クッキーに24時間保存
      $_SESSION['username'] = $inputUsername;
      header("Location: main.php");
      exit;
    }
  }

  // 認証失敗、エラーメッセージ付きでリダイレクト
  if (!$authenticated) {
    header("Location: index.php?error=ユーザー名またはパスワードが間違っています");
    exit;
  }
} else {
  header("Location: index.php");
  exit;
}