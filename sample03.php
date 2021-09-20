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
// date_default_timezone_set('Asia/Tokyo'); 日本時間を表示するコード
// date — ローカルの日付/時刻を書式化する dateファンクションだけでは画面に表示することができない。printファンクションと連携することによって表示できる
// 文字列連結は('.(ドット)')で連結できる 文字列を見やすくするために半角スペースを空ける
print('現在は'. date('G時 i分 s秒'). 'です');
?>
</pre>
</main>
</body>    
</html>