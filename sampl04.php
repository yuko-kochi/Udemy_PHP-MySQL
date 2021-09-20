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
// オブジェクト指向型
// format 時刻をフォーマットに従って成形するメソッド 指定した書式でフォーマットした日付を返す dateファンクションとほぼ一緒
// DateTimeオブジェクト 日付や時間のオブジェクト
$today = new DateTime();
print($today->format('G時 i分 s秒'));
?>
</pre>
</main>
</body>    
</html>