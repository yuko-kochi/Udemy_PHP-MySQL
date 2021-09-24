<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>
</header>

<main>
<h2>Practice</h2>
<pre>
お名前： <?php
        print(htmlspecialchars
        // htmlspecialchars はHTMLのタグなど認識されるものを逃す意味
        // htmlspecialcharsファンクションでHTMLコードを無効にする
        // htmlspecialcharsファンクションは２つのパラメータが必要
        // １つ目に何をエスケープするのか、２つ目にどのようにエスケープをするのか
        // 2つ目は必ずENT_QUOTESになる
        // $_REQUEST['my_name']　フォームの値を受け取るグローバル変数
        // name属性の名前を$_REQUEST['my_name']　に入れる
        // method属性が不明な場合は$_REQUEST(get,postどちらでも受け取れる)とし、method="get"なら$_GET、method="post"なら$_POSTとになる
        // $_REQUESTを使うとパスワードなどPostで送信したものをgetで受けっとってしまう可能性があるため注意が必要
        ($_GET['my_name'], ENT_QUOTES));
        ?>
</pre>
</main>
</body>
</html>