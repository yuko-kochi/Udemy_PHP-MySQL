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
// %04d 0は数字が４個ない場合、前に0をつける(0の部分がは半角スペース(% 4d)にすると2018年 12月と表示できる)
// dは数字を表すdigitの意味 sにするとstringの意味で文字を表示できる
// %の数によってパラメータの数も合わせる sprintf('%04d年 %02d月 %02d日 %s', 2018, 12, 23, '金');にする
$date = sprintf('%04d年 %02d月 %02d日', 2018, 12,23);
print($date);
?>
</pre>
</main>
</body>
</html>