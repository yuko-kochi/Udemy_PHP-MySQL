<?php
// 入力された内容を保存用の$_SESSIONを使用するため、
session_start();

// !empty($_POST)で　form が送信されているかどうか、空ではない時にエラーメッセージを命令
if (!empty($_POST)) {
	if ($_POST['name'] === ''){
		$error['name'] = 'blank';
	}
	if ($_POST['email'] === ''){
		$error['email'] = 'blank';
	}
	// strlen は指定された文字数を測って数字で返す
	if (strlen($_POST['password']) < 4){
		$error['password'] = 'length';
	}
	if ($_POST['password'] === ''){
		$error['password'] = 'blank';
	}

	$fileName = $_FILES['image']['name'];
	// 画像の拡張子を確認
	// !empty($fileName)　で画像がアップロードされていれば実行
	if (!empty($fileName)) {
		// substr($fileName, -3); でファイルの後ろ３文字を指定
		$ext = substr($fileName, -3);
		// ファイルの後ろ３文字が画像の拡張子が以下以外ならエラーメッセージを実行
		if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png') {
			$error['image'] = 'type';
		}
	}

	// empty() は配列の中が空であるか判断する
	if (empty($error)) {
		$image = date('YmdHis') . $_FILES['image']['name'];
		// move_uploaded_fileはファイル保存するコード
		// ../member_picture/ 保存場所
		move_uploaded_file($_FILES['image']['tmp_name'], '../member_picture/' . $image);
		// 入力された内容を保存
		$_SESSION['join'] = $_POST;
		$_SESSION['join']['image'] = $image;
		// check.php にジャンプする命令
		header('Location: check.php');
		exit();
	}
}

// 描き直しページに移行した場合 $_SESSION['join'] を代入する
// && isset($_SESSION['join'] でセッションが正しく設定されているかも判断
if ($_REQUEST['action'] == 'rewrite' && isset($_SESSION['join'])) {
	$_POST = $_SESSION['join'];
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
	<p>次のフォームに必要事項をご記入ください。</p>
	<!-- enctype="multipart/form-data" はファイルのアップロードが必要な場合は記述する -->
	<form action="" method="post" enctype="multipart/form-data">
		<dl>

			<dt>
				ニックネーム<span class="required">必須</span>
			</dt>
			<dd>
				<input type="text" name="name" size="35" maxlength="255"
				value="<?php
					// print(htmlspecialchars($_POST['name'], ENT_QUOTES))で入力した名前を維持できる
					print(htmlspecialchars($_POST['name'], ENT_QUOTES));
				?>" />
				<?php if ($error['name'] === 'blank'): ?>
					<p class="error">* ニックネームを入力してください</p>
				<?php endif; ?>
			</dd>

			<dt>
				メールアドレス<span class="required">必須</span>
			</dt>
				<input type="text" name="email" size="35" maxlength="255"
				value="<?php
					print(htmlspecialchars($_POST['email'], ENT_QUOTES));
				?>" />
				<?php if ($error['email'] === 'blank'): ?>
					<p class="error">* メールアドレスを入力してください</p>
				<?php endif; ?>
			</dd>

			<dt>
				パスワード<span class="required">必須</span>
			</dt>
			<dd>
				<input type="password" name="password" size="10" maxlength="20"
				value="<?php
					print(htmlspecialchars($_POST['password'], ENT_QUOTES));
				?>" />
				<?php if ($error['password'] === 'length'): ?>
					<p class="error">* パスワードは4文字以上で入力してください</p>
				<?php endif; ?>
				<?php if ($error['password'] === 'blank'): ?>
					<p class="error">* パスワードを入力してください</p>
				<?php endif; ?>
			</dd>

			<dt>写真など</dt>
			<dd>
				<input type="file" name="image" size="35" value="test"  />
				<?php if ($error['image'] === 'type'): ?>
					<p class="error">* 写真などは[.gif]または[.jpg]、[.png]の画像を指定してください</p>
				<?php endif; ?>
				<?php if (!empty($error)): ?>
					<p class="error">* 恐れ入りますが画像を改めて指定してください</p>
				<?php endif; ?>
			</dd>

		</dl>
		<div>
			<input type="submit" value="入力内容を確認する" />
		</div>
	</form>
</div>
</body>
</html>
