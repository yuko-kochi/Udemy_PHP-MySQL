<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>
</header>

<main>
<h2>Practice</h2>
<pre>
  <?php
  try {
    $db = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root','root');

    // INSERT構文を使用する場合はexecを使う
    // exec('この中にSQL分を記述')
    // $_POST['memo']はinput.htmlのformで指定したmethod属性
    // $_POST['memo']のmemoの部分は textarea nameで指定した名前
    $db->exec('INSERT INTO memos SET memo="' . $_POST['memo'] . '", created_at=NOW()');

  } catch(PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
  }


  ?>
</pre>
</main>
</body>
</html>