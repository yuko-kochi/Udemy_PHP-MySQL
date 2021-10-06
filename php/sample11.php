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
<!-- floor は少数を全て切り捨てるファンクション -->
3,000円のものから、100円を値引した場合は、<?php print(floor(100 / 3000  * 100)); ?> %引きです。

■ その他の計算
少数切り上げ(ceil) → <?php print(ceil(100 / 3000 * 100)); ?>
<!-- 四捨五入の(round(,1))は少数点第何位まで表示するかを決める数字-->
四捨五入(round) → <?php print(round(100 / 3000 * 100, 1)); ?>
</pre>
</main>
</body>
</html>