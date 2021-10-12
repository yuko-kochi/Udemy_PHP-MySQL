<?php
 session_start();

//  $_SESSION['join']に内容が入っていない場合に実行
 if (!isset($_SESSION['join'])) {
	// 入力内容がない場合はindex.phpに強制的に移行する
	header('Location: index.php');
	exit();
 }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>会員登録</title>

	<link rel="stylesheet" href="../style.css" />
</head>
<body>
<div id="wrap">
<div id="head">
<h1>会員登録</h1>
</div>

<div id="content">
<p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
<form action="" method="post">
	<input type="hidden" name="action" value="submit" />
	<dl>
		<dt>ニックネーム</dt>
		<dd>
			<?php
				// htmlspecialchars安全に画面に出力するためのファンクション
				// index.php で $_POSTを$_SESSION['join']に入れているため、$_SESSION['join']['name']になる
				// $_SESSION['join'] = $_POST
				print(htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES));
			?>
    </dd>
		<dt>メールアドレス</dt>
		<dd>
		<?php
				print(htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES));
			?>
    </dd>
		<dt>パスワード</dt>
		<dd>
		【表示されません】
		</dd>
		<dt>写真など</dt>
		<dd>
			<?php if($_SESSION['join']['image'] !== ''): ?>
				<img src="../member_picture/<?php print(htmlspecialchars($_SESSION['join']['image'], ENT_QUOTES)); ?>" width="400" height="300">
				<?php endif; ?>
		</dd>
	</dl>
	<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
</form>
</div>

</div>
</body>
</html>
