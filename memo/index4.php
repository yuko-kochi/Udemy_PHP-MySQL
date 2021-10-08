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
  <?php
  // require('dbconnect.php'); で部分テンプレートを行う
  require('dbconnect.php');

  // isset 変数がセットされているか確認する
  // && 且つ　is_numericで数字以外の場合は1ページを表示する
  if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
  } else {
    $page = 1;
  }
  $start = 5 * ($page - 1);

  $memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?, 5');
  $memos->bindParam(1, $start, PDO::PARAM_INT);
  $memos->execute();
  ?>

<article>
  <?php while ($memo = $memos->fetch()): ?>
    <p>
      <a href="memo.php?id=<?php print($memo['id']); ?>">
        <?php
          // mb_substr($memo['memo'],0 , 50 は文字を０文字から５０文字まで表示するコード
          print(mb_substr($memo['memo'],0 , 50 ));
        ?>
      </a>
    </p>
    <time>
      <?php
        print($memo['created_at']);
      ?>
    </time>
    <hr>
  <?php endwhile ?>
</article>
</main>
</body>
</html>