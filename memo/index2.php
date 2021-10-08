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
  } catch(PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
  }

  // queryメソッドはセレクト構文で得られた値を受け取る
  // セレクト構文を使用する際はqueryメソッドを必ず使用する
  $records = $db->query('SELECT * FROM my_items');
  // fetchメソッドはデータベースから受け取ったレコードの行の集まりのうち１行を取り出す
  // $recordsに入っている行を全て取り出し、終わったらwhile構文が終わる
  // $recordは連想配列になる。連想配列の要素を取り出す。$record['カラム名']を指定する
  while ($record = $records->fetch()) {
    print($record['item_name'] . "\n");
  }
  ?>
</pre>
</main>
</body>
</html>