<?php
session_start();
$count = 0;

$pattern = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";

$nameError = '';
$telephoneError = '';
$differentFormat = '';
$emailError = '';
$menuError = '';
$contactError = '';


if(isset($_POST['submit'])) {
  if($_POST['name'] != "") {
    $_SESSION['name'] = $_POST['name'];
  }else {
    $nameError = '*名前を入力してください';
    $count++;
  }

  if($_POST['telephone'] != "") {
    $_SESSION['telephone'] = $_POST['telephone'];
  }else {
    $telephoneError = '*電話番号を入力してください';
    $count++;
  }

  if($_POST['email'] != "") {
    if(preg_match($pattern, $_POST['email'])){
      $_SESSION['email'] = $_POST['email'];
    }else {
      $differentFormat = '*xxxx@xxxxの形式で入力してください';
      $count++;
    }
  }else {
    $emailError = '*メールアドレスを入力してください';
    $count++;
  }

    if($_POST['corporateName'] != "") {
    $_SESSION['corporateName'] = $_POST['corporateName'];
  }

  if($_POST['corporateName'] != "") {
    $_SESSION['corporateName'] = $_POST['corporateName'];
  }

  if(isset($_POST['menu'])) {
    $_SESSION['menu'] = $_POST['menu'];
  }else {
    $menuError = '*内容を選択してください';
    $count++;
  }

  if($_POST['contact'] != "") {
    $_SESSION['contact'] = $_POST['contact'];
  }else {
    $contactError = '*お問い合わせ内容を入力してください';
    $count++;
  }
}

if(isset($_POST['submit'])) {
  if($count == 0) {
    $_SESSION['success'] = 'success';
    header('Location: confirm.php');
  }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our portfolio</title>
    <meta name="google-site-verification" content="VxJbunXQAcjZb0qr3FPp6DDuWu1JgCZ16WGhMhN7iA4" />
    <meta name="description" content="Web制作、Webデザインならお任せください" />
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
    <script src="js/lightbox.js"></script>
</head>

<body id="contact">
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
    <section class="contact cmn_sec" id="contact">
            <h2 class="cmn_ttl">Contact<span>お問い合わせ</span></h2>
            <h3 class="form_ttl">お客様情報を入力してください</h3>
            <form class="contact_from" action="contact.php" method="post">
                <div class="item">
                    <div class="from_inner">
                        <label class="label flex">お名前<span class="impot">必須</span></label>
                        <p class="erro"><?php echo $nameError; ?></p>
                    </div>
                    <input class="inputs" type="text" name="name" value="<?php echo isset($_SESSION['reName']) ? $_SESSION['reName'] : ""; ?>">
                </div>
                <div class="item">
                    <div class="from_inner">
                        <label class="label flex">電話番号<span class="impot">必須</span></label>
                        <p class="erro"><?php echo $telephoneError; ?></p>
                    </div>
                    <input class="inputs" type="text" name="telephone" value="<?php echo isset($_SESSION['reTelephone']) ? $_SESSION['reTelephone'] : ""; ?>">
                </div>
                <div class="item">
                    <div class="from_inner">
                        <label class="label flex">メールアドレス<span class="impot">必須</span></label>
                        <p class="erro"><?php echo $differentFormat; ?></p>
                        <p class="erro"><?php echo $emailError; ?></p>
                    </div>
                    <input class="inputs" type="text" name="email" value="<?php echo isset($_SESSION['reEmail']) ? $_SESSION['reEmail'] : ""; ?>">
                </div>
                <div class="item">
                    <label class="label flex">会社名または学校名</label>
                    <div class="from_inner">
                        <input class="inputs" type="text" name="corporateName" value="<?php echo isset($_SESSION['reCorporateName']) ? $_SESSION['reCorporateName'] : ""; ?>">
                    </div>
                </div>
                <div class="item">
                    <div class="from_inner">
                        <p class="label flex">内容<span class="impot">必須</span></p>
                        <p class="erro"><?php echo $menuError; ?></p>
                    </div>
                    <div class="inputs recruit">
                        <div>
                            <input id="cut" type="radio" name="menu" value="業務に関する内容"
                            <?php
                            if(isset($_SESSION['reMenu'])){
                                if($_SESSION['reMenu'] == '業務に関する内容') {
                                echo 'checked';
                                }
                            }
                            ?>
                            >
                            <label for="cut">HP制作に関する内容</label>
                        </div>
                        <div>
                            <input id="cut-color" type="radio" name="menu" value="求人に関する内容"
                            <?php
                            if(isset($_SESSION['reMenu'])){
                                if($_SESSION['reMenu'] == '求人に関する内容') {
                                echo 'checked';
                                }
                            }
                            ?>
                            >
                            <label for="cut-color">コーディング代行に関する内容</label>
                        </div>
                        <div>
                            <input id="headspa" type="radio" name="menu" value="その他"
                            <?php
                            if(isset($_SESSION['reMenu'])){
                                if($_SESSION['reMenu'] == 'その他') {
                                echo 'checked';
                                }
                            }
                            ?>
                            >
                            <label for="headspa">その他</label>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="from_inner">
                        <label class="label flex">お問い合わせ<span class="impot">必須</span></label>
                        <p class="erro"><?php echo $contactError; ?></p>
                    </div>
                    <textarea class="inputs" name="contact"><?php echo isset($_SESSION['reContact']) ? $_SESSION['reContact'] :""; ?></textarea>
                </div>
                <div class="btn-area">
                    <input type="submit" name="submit" value="送信" class="cmn_contact_btn">
                </div>
            </form>
        </section>
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
    <script src="js/cmn.js"></script>
</body>

</html>
