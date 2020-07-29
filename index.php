<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>4eachblog 掲示板</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php
    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=kairi;host=localhost;","root","");
    $stmt = $pdo->query("select * from 4each_keijiban");
  ?>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="header-list">
      <ul>
        <li>トップ</li>
        <li>プロフィール</li>
        <li>4eachについて</li>
        <li>登録フォーム</li>
        <li>お問い合わせ</li>
        <li>その他</li>
      </ul>
    </div>
  </header>
  <main>
    <div class="main-left">
      <h1>プログラミングに役立つ掲示板</h1>
      <form method="post" action="insert.php">
        <h2>入力フォーム</h2>
        <div class="handlename">
          <label>ハンドルネーム<br></label>
          <input type="text" name="handlename">
        </div>  
        <div class="title">
          <label>タイトル<br></label>
          <input type="text" name="title">
        </div>
        <div class="comments">
          <label>コメント<br></label>
          <textarea cols="50" rows="7" name="comments"></textarea>
        </div>
        <input type="submit" value="投稿する" class="submit">
      </form>
      <?php
        foreach ($stmt as $row) {
          echo "<div class='keijiban'>";
            echo "<h3>".$row['title']."</h3>";
            echo "<div class='contents'>";
              echo $row['comments'];
              echo "<div class='handlename'>posted by".$row['handlename']."</div>";
            echo "</div>";
          echo "</div>";
        }
      ?>
    </div>
    <div class="main-right">
      <div class="populaion">
        <h3>人気の記事</h3>
        <ul>
          <li>PHPオススメ本</li>
          <li>PHP MyAdminの使い方</li>
          <li>いま人気のエディタTop5</li>
          <li>HTMLの基礎</li>
        </ul>
      </div>
      <div class="osusume">
        <h3>オススメリンク</h3>
        <ul>
          <li>インターノウス株式会社</li>
          <li>XAMMPのダウンロード</li>
          <li>Eclipseのダウンロード</li>
          <li>Bracketsのダウンロード</li>
        </ul>
      </div>
      <div class="category">
        <h3>カテゴリ</h3>
        <ul>
          <li>HTML</li>
          <li>PHP</li>
          <li>MySQL</li>
          <li>JavaScript</li>
        </ul>
      </div>
    </div>
  </main>
  <footer>
    <p>copyright ©internous | 4each blog the which provides A to Z about programming</p>
  </footer>
</body>

</html>