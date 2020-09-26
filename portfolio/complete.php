<?php
session_start();

if(! isset($_SESSION['success'])) {
  header('Location: index.php');
}

session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
   <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/cmn.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
</head>
<body id="complete">
  <div class="shdow"></div>
  <header class="top">
      <div class="sp_h_gnav">
          <div class="sp_gnav_inner flex">
              <h1 class="h_gnav_list h_nav_logo">
                  <a href="./">
                      Welcome
                  </a>
              </h1>
              <div class="sp_menu">
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
          </div>
          <nav class="sp_gnav">
              <ul class="sp_gnav_list">
                  <li><a href="./">TOP</a></li>
                  <li><a href="#concept">CONCEPT</a></li>
                  <li><a href="#service">SERVICE</a></li>
                  <li>
                      <a href="#portfolio">PORTFOLIO</a>
                  </li>
                  <li><a href="#profile">PROFILE</a></li>
                  <li><a href="#contact">CONTACT</a></li>
              </ul>
          </nav>
      </div>
  </header>
  <main>
    <section class="contact cmn_sec">
        <h2 class="cmn_ttl">Contact<span>お問い合わせ</span></h2>
        <h3 class="form_ttl">お問い合わせありがとうございました</h3>
        <div class="contact_text">
          <p>
            ご入力いただきましたメールアドレス宛に控えメールを自動返信いたしました。<br>
            この控えメールが届かない場合は、ご入力いただいたメールアドレスに誤りがあるか、インターネット上のなんらかのトラブルの可能性もありますので、お手数ですが再度お問い合わせいただくようお願い申し上げます。

          </p>
        </div>
        <p class="complete_btn">
          <a href="index.php" class="cmn_contact_btn">TOP</a>
        </p>
    </section>
  </main>
  <div class="return">
    <p>
        <span></span>
    </p>
  </div>
  <footer>
        <small id="copy">Copyright &copy;
            <script type="text/javascript">
                document.write(new Date().getFullYear())
            </script>&ensp;&ensp;<a href="./">OSS</a>&ensp;&ensp;All Rights Reserved.
        </small>
  </footer>
  <script>
    $('.sendBtn').click(function() {
    setTimeout(function(){
      $('.sendBtn').prop('disabled',true);
    }, 1);
    });
  </script>
  <script src="js/cmn.js"></script>
</body>
</html>
