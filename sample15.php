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
// XML - Extensible Markup Language
// HTML - HyperText Markup Language
// simplexml_load_fileとは XMLファイル形式をロードするシンプルなファンクション RSSのパスを（）に記述する
// XMLファイルを受け取る変数を作成
$xmlTree = simplexml_load_file('https://h2o-space.com/feed/');
// foreach は配列を処理する繰り返し構文
// -> はオブジェクトやプロパティー、メソッドなどにアクセスするための記号
// as $item　で $item の中に内容を入れる
foreach($xmlTree->channel->item as $item):
?>
<!-- $item->title でタイトルを表示し、$item->link でリンクをつける -->
.<a href="<?php print($item->link); ?>"><?php print($item->title); ?></a>
<?php
endforeach;
?>
</pre>
</main>
</body>
</html>