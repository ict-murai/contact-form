<?php
  $errors = [];
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $hobby = implode(", ", $_POST["hobby"]);
    $age = $_POST["age"];
    $type = $_POST["type"];
    $message = $_POST["message"];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirm</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
  <?php if(!empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <div class="container py-5">
    <h1 class="mb-5">確認ページ</h1>
    <dl class="row">
      <dt class="col-sm-2">氏名:</dt>
      <dd class="col-sm-10"><?php echo $name; ?></dd>

      <dt class="col-sm-2">メールアドレス:</dt>
      <dd class="col-sm-10"><?php echo $email; ?></dd>

      <dt class="col-sm-2">性別:</dt>
      <dd class="col-sm-10"><?php echo $gender; ?></dd>

      <dt class="col-sm-2">趣味:</dt>
      <dd class="col-sm-10"><?php echo $hobby; ?></dd>

      <dt class="col-sm-2">年齢:</dt>
      <dd class="col-sm-10"><?php echo $age; ?></dd>

      <dt class="col-sm-2">種類:</dt>
      <dd class="col-sm-10"><?php echo $type; ?></dd>

      <dt class="col-sm-2">内容:</dt>
      <dd class="col-sm-10"><?php echo $message; ?></dd>
    </dl>
    <form action="send_mail.php" method="post">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="email" value="<?php echo $email; ?>">
      <input type="hidden" name="gender" value="<?php echo $gender; ?>">
      <input type="hidden" name="hobby" value="<?php echo $hobby; ?>">
      <input type="hidden" name="age" value="<?php echo $age; ?>">
      <input type="hidden" name="type" value="<?php echo $type; ?>">
      <input type="hidden" name="message" value="<?php echo $message; ?>">
      <button type="submit" class="btn btn-primary">確認完了</button>
    </form>
  </div>
</body>
</html>
