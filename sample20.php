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
  $age = 20;

  // mb はマルチバイドの略で日本語が全角などを扱う時に使われる
  // convert_kana は様々なカナを変換するファンクション
  // 'n'で半角の数字に変更する
  // 文字コードを指定する
  $age = mb_convert_kana($age, 'n', 'UTF-8');
  // s_numeric ファンクションは指定されたパラメータが数字かどうかを判断する
  if (is_numeric($age)) {
    print($age . '歳');
  } else {
    print('※ 年齢が数字ではないです');
  }

  ?>
</pre>
</main>
</body>
</html>