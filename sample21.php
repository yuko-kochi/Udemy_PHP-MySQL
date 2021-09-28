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
    $zip = '987-6543';

    // 'a' は英数字を半角に直す
    // 郵便番号の場合、- を使う場合があるため、'n' ではなく 'a' を使う
    $zip = mb_convert_kana($zip, 'a', 'UTF-8');
    // preg_match　正規表現で正しいかどうかを
    // \d{3} 数字が３回続くこと
    // [-]　-で結ぶこと
    // \d{4} 数字が4回続くこと
    // \A は文章の先頭から数字がはじまることを示す
    // \z は文章の最後が数字であること
    // そのため、先頭から数字が始まり、最後も数字で終わることを示す
    if (preg_match("/\A\d{3}[-]\d{4}\z/", $zip)) {
      print('郵便番号：〒' . $zip);
    } else {
      print('※ 郵便番号を 123-456 の形式でご記入ください');
    }
  ?>
</pre>
</main>
</body>
</html>