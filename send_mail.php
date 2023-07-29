<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $hobby = $_POST["hobby"];
    $age = $_POST["age"];
    $type = $_POST["type"];
    $message = $_POST["message"];

    // 送信先のメールアドレス
    $to = $email;
    $to_admin = "admin@example.com";  // 管理者のメールアドレス

    // メールの件名
    $subject = $type . " from " . $name;

    // メールの本文
    $body = "氏名: " . $name . "\n";
    $body .= "メールアドレス: " . $email . "\n";
    $body .= "性別: " . $gender . "\n";
    $body .= "趣味: " . $hobby . "\n";
    $body .= "年齢: " . $age . "\n";
    $body .= $type . "内容:\n" . $message;

    // メールの送信
    mail($to, $subject, $body);
    mail($to_admin, $subject, $body);

    echo "メールを送信しました。";
  }
?>
