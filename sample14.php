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
$news = file_get_contents('../../news_date/news.txt');
// .= は $s = $s . 'abc' と一緒で追加したい時に使うコード　最後に追加される
$news .= "2018-06-05 ニュースを追加しました";
// .を後ろにつけると一番上に追加される
// $news = "2018-06-05 ニュースを追加しました\n" . $news;
file_put_contents('../../news_date/news.txt', $news);

print($news);

// readfile('../../news_date/news.txt'); でも表示できるが変更ができない。
?>
</pre>
</main>
</body>
</html>