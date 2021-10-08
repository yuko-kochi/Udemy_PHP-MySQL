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

    // prepareは安全な構文
    // prepareはmemo=?の?の部分にexecute(array($_POST['memo'])で指定した値が入る
    $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
    $statement->execute(array($_POST['memo']));
    // 登録した際に画面にメッセージがでるように記述
    echo 'メッセージが登録されました';


    // INSERT構文を使用する場合はexecを使う
    // exec('この中にSQL分を記述')
    // $_POST['memo']はinput.htmlのformで指定したmethod属性
    // $_POST['memo']のmemoの部分は textarea nameで指定した名前
    // 下記の構文だと$_POST['memo']の値がそのまま指定されているため、危険
    // $_POST['memo']をそのまま渡してしまうと、危険な文字列や記号など入っているとSQLが壊されて、dbにアクセスされる可能性がある
    // $db->exec('INSERT INTO memos SET memo="' . $_POST['memo'] . '", created_at=NOW()');

  } catch(PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
  }


  ?>
</pre>
</main>
</body>
</html>