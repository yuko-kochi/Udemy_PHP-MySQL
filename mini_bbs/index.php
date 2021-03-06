<?php
  session_start();
  require('dbconnect.php');

  // session変数に保存したidとtimeがある場合は
  // time()は現在の時刻、それよりも大きい、つまり現在の時刻から一時間以上経っている場合、自動的にログアウト
  if (isset($_SESSION['id']) && $_SESSION['time']+ 3600 > time()){
    // ログインしている時
    // time()を代入することで時間を更新する
    $_SESSION['time'] = time();

    $members = $db->prepare('SELECT * FROM members WHERE id=?');
    // idを使ってデータベースから会員情報を出力する
    $members->execute(array($_SESSION['id']));
    $member = $members->fetch();
  }else{
    // ログインしていない時にログイン画面に促す処理
    header('Location: login.php');
    exit();
  }

  // 投稿ボタンがクリックされれば
  if(!empty($_POST)) {
    if ($_POST['message'] !== '') {
      $message = $db->prepare('INSERT INTO posts SET member_id=?, message=?, reply_message_id=?, created=NOW()');
      $message->execute(array(
        $member['id'],
        $_POST['message'],
        $_POST['reply_post_id']
      ));

      // メッセージを投稿が終わったあと、index.phpを呼び出し、メッセージを重複しないようにする
      header('Location: index.php');
      exit();
    }
  }

  // members m, posts p でテーブルを取得
  // m.id=p.member_id リレーションをはる
  // ORDER BY p.created DESC 投稿の降順に並べる
  // m.name, m.picture　カラムを取得
  // p.*  postsテーブルの全ての値を取得
  $posts = $db->query('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC');

  if (isset($_REQUEST['res'])) {
    // 返信の処理
    $response = $db->prepare('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id AND p.id=?');
    $response->execute(array($_REQUEST['res']));

    $table = $response->fetch();
    $message = '@' . $table['name'] . ' ' . $table['message'];
  }
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ひとこと掲示板</title>

	<link rel="stylesheet" href="style.css" />
</head>

<body>
<div id="wrap">
  <div id="head">
    <h1>ひとこと掲示板</h1>
  </div>
  <div id="content">
  	<div style="text-align: right"><a href="logout.php">ログアウト</a></div>
    <form action="" method="post">
      <dl>
      <dt>
          <?php echo htmlspecialchars($member['name'], ENT_QUOTES); ?>
          さん、メッセージをどうぞ
        </dt>
          <textarea name="message" cols="50" rows="5"><?php echo htmlspecialchars($message, ENT_QUOTES); ?></textarea>
          <input type="hidden" name="reply_post_id" value="<?php echo htmlspecialchars($_REQUEST['res'], ENT_QUOTES); ?>" />
        </dd>
      </dl>
      <div>
        <p>
          <input type="submit" value="投稿する" />
        </p>
      </div>
    </form>

    <?php foreach($posts as $post): ?>
      <div class="msg">
        <img src="member_picture/<?php echo htmlspecialchars($post['picture'], ENT_QUOTES); ?>" width="48" height="48" alt="<?php echo htmlspecialchars($post['name'], ENT_QUOTES); ?>" />
        <p>
          <?php echo htmlspecialchars($post['message'], ENT_QUOTES); ?>
          <span class="name">（<?php echo htmlspecialchars($post['name'], ENT_QUOTES); ?>）</span>

          <!-- 返信メッセージ -->
          [<a href="index.php?res=<?php echo htmlspecialchars($post['id'], ENT_QUOTES); ?>">Re</a>]
        </p>
        <p class="day">
          <a href="view.php?id=<?php echo htmlspecialchars($post['id']); ?>"><?php echo htmlspecialchars($post['created'], ENT_QUOTES); ?></a>

          <!-- 返信元のメッセージがある場合は表示 -->
          <?php if ($post['reply_message_id'] > 0): ?>
            <a href="view.php?id=<?php echo htmlspecialchars($post['reply_message_id']); ?>">
            返信元のメッセージ</a>
          <?php endif; ?>

          <!-- 自身のメッセージのみ削除リンクを表示 -->
          <?php if($_SESSION['id'] == $post['member_id']): ?>
            [<a href="delete.php?id=<?php echo htmlspecialchars($post['id']); ?>"
            style="color: #F33;">削除</a>]
          <?php endif; ?>
        </p>
      </div>
    <?php endforeach ?>

    <ul class="paging">
      <li><a href="index.php?page=">前のページへ</a></li>
      <li><a href="index.php?page=">次のページへ</a></li>
    </ul>
    </div>
    </div>
  </body>
</html>
