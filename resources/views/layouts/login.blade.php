<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    <div id="head">
      <!--ヘッダーロゴ-->
      <nav class="header">
        <h1><a href="/top"><img src="images/main_logo.png"></a></h1>
        <!--名前アイコン-->
        <div class="menu">
          <p>{{ $username }}さん</p>
          <div class="menu-trigger">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <img>
          <!-- $images -->
        </div>
      </nav>
      <!--プルダウン-->
      <nav class="g-nav">
        <ul>
          <li><a href="/top" class="nav-item">HOME</a></li>
          <li><a href="/profile" class="nav-item">プロフィール編集</a></li>
          <li><a href="/logout" class="nav-item">ログアウト</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div id="row">
    <div id="container">
      @yield('content')
    </div>
    <!--サイドバー-->
    <div id="side-bar">
      <div id="confirm">
        <p>{{ $username }}さんの</p>
        <div class="confirm-item">
          <p>フォロー数</p>
          <p>{{ $countFollow }}名</p>
        </div>
        <p><a href="/follow-list" class="btn">フォローリスト</a></p>
        <div class="confirm-item">
          <p>フォロワー数</p>
          <p>{{ $countFollower }}名</p>
        </div>
        <p><a href="/follower-list" class="btn">フォロワーリスト</a></p>
      </div>
      <p><a href="/search" class="search-btn">ユーザー検索</a></p>
    </div>
  </div>
  <footer>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>