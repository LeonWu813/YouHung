<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>F2E WEEK01</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;0,900;1,700&family=Poppins:wght@800;900&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="/Public/css/global.css" />
  <link rel="stylesheet" href="/Public/css/home.css" />
</head>

<?php

$errors = [];
$errorMessage = 'Please fill the required form';

if (!empty($_POST)) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $country = $_POST['country'];
   $message = $_POST['message'];
  
   if (empty($name)) {
       $errors[] = 'Name is empty';
   }

   if (empty($email)) {
       $errors[] = 'Email is empty';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email is invalid';
   }

   if (empty($country)) {
       $errors[] = 'Country is empty';
   }
   
   if (empty($errors)) {
    $toEmail = 'leonwuya@gmail.com';
    $emailSubject = 'New email from your contact form';
    $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
    $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Country: {$country}",  "Message:", $message];
    $body = join(PHP_EOL, $bodyParagraphs);

    if (mail($toEmail, $emailSubject, $body, $headers)) {

        header('Location: thank-you.html');
    } else {
        $errorMessage = 'Oops, something went wrong. Please try again later';
    }

} else {

    $allErrors = join('<br/>', $errors);
    $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
}
}


?>

<html lang="en">
  <body>
    <header class="header">
      <nav class="nav_container sticky">
        <img src="/src/header/logo.png" alt="" class="logo" />
        <div class="nav-lan">
          <ul class="nav__links">
            <li class="nav__item" data-nav="1">
              <a class="nav__link" href="#">服務項目</a>
              <div class="nav-drop-container">
                <ul class="nav-drop-div"></ul>
              </div>
            </li>
            <li class="nav__item" data-nav="2">
              <a class="nav__link" href="#">專利產品</a>
              <div class="nav-drop-container">
                <ul class="nav-drop-div"></ul>
              </div>
            </li>
            <li class="nav__item" data-nav="3">
              <a class="nav__link" href="#">品牌代理與銷售</a>
              <div class="nav-drop-container">
                <ul class="nav-drop-div"></ul>
              </div>
            </li>
            <li class="nav__item" data-nav="4">
              <a class="nav__link" href="#">我們的客戶</a>
              <div class="nav-drop-container">
                <ul class="nav-drop-div"></ul>
              </div>
            </li>
            <li class="nav__item" data-nav="5">
              <a class="nav__link" href="#">聯絡我們</a>
              <div class="nav-drop-container">
                <ul class="nav-drop-div"></ul>
              </div>
            </li>
          </ul>
          <ul class="lan-selector">
            <img src="/src/header/language-selector.svg" alt="" />
            <li class="language primary" data-lan="en">EN</li>
            <li class="language" data-lan="zh">ZH</li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="hero-section inner-section">
      <div>
        <h1>
          攜手共創整合創新 <br /><span class="primary">引領弱電系統整合</span>
        </h1>
        <p>
          整合通訊、資訊、網路、安全辦公室自動化，滿足高端應用的需求，不斷進行獨特的創新和突破，以適應時代的升級與變遷。
        </p>
      </div>
      <div></div>
    </div>
    <div class="logo-section"></div>
    <div class="about-section inner-section">
      <div>
        <h2 class="primary">關於我們</h2>
        <p>
          宇紘國際成立於2010年，秉持著攜手相伴、利益共享；取之於社會、用之於社會的理念，持續經營。
          公司從工程領域起步，逐漸發展為品牌代理及銷售商，除了有基本的網路/通信技術證以外，還擁有原廠認證，同時還致力於專利產品的開發。
          <br /><br />
          我們深知客户的需求，整合通訊、資訊、網路、安全辦公室自動化等專業領域，不斷創新突破，將弱電系統整合，作為主要經營區塊。我們堅持扎實自身的基礎、時以進修來滿足高端應用的需求，同時用心傾聽與呵護每一個案例，不斷進行獨特的創新和突破，以適應時代的升級與變遷。
        </p>
        <img src="/src/home/history.png" alt="" width="1092" />
      </div>
    </div>
    <div class="inner-section">
      <div class="product-section">
        <h2 class="white">專利產品</h2>
        <p class="white">
          宇紘國際成立於2010年，秉持著攜手相伴、利益共享；取之於社會、用之於社會的理念，持續經營。
          公司從工程領域起步，逐漸發展為品牌代理及銷售商，除了有基本的網路/通信技術證以外，還擁有原廠認證，同時還致力於專利產品的開發。
          <br /><br />
          我們深知客户的需求，整合通訊、資訊、網路、安全辦公室自動化等專業領域，不斷創新突破，將弱電系統整合，作為主要經營區塊。我們堅持扎實自身的基礎、時以進修來滿足高端應用的需求，同時用心傾聽與呵護每一個案例，不斷進行獨特的創新和突破，以適應時代的升級與變遷。
        </p>
      </div>
    </div>
    <div class="patented-section two-card inner-section">
      <div>
        <img src="/src/home/Frame 30.png" alt="" />
        <ul>
          <li>多款顏色</li>
          <li>非侵入物理機械性資訊安全鎖</li>
          <li>防竄改、擅自拆除電纜線路</li>
          <li>能在RJ45資訊配線架上使用，不會互相干擾</li>
          <li>擁有專利技術證明</li>
          <li>國內外多家公司採用</li>
        </ul>
      </div>
      <div>
        <img src="/src/home/Frame 30.png" alt="" />
        <ul>
          <li>多款顏色</li>
          <li>非侵入物理機械性資訊安全鎖</li>
          <li>防竄改、擅自拆除電纜線路</li>
          <li>能在RJ45資訊配線架上使用，不會互相干擾</li>
          <li>擁有專利技術證明</li>
          <li>國內外多家公司採用</li>
        </ul>
      </div>
    </div>
    <div class="brand-section inner-section">
      <h2 class="primary">品牌代理與銷售</h2>
      <div class="two-card">
        <div class="brand-card">
          <img src="/src/home/Frame 30.png" alt="" />
          <div>
            <p>Ｒ＆Ｍ</p>
            <a href="" class="more-btn">更多品牌銷售</a>
          </div>
        </div>
        <div class="brand-card">
          <img src="/src/home/Frame 30.png" alt="" />
          <div>
            <p>TREND Networks</p>
            <a href="" class="more-btn">更多品牌銷售</a>
          </div>
        </div>
      </div>
    </div>
    <div class="form-section">
      <img src="/src/home/Frame 35.png" alt="" />
      <div>
        <p>聯絡我們</p>
        <form  method="POST"  id="contact-form">
          <p>
            <label for="name">Name:</label>
            <input type="text" name="name" required />
          </p>
          <p>
            <label for="email">Email:</label>
            <input type="email" name="email" required />
          </p>
          <p>
            <label for="country">Country:</label>
            <input
              type="country"
              name="country"
            required
          />
          </p>
          <p>
            <label for="message">Message:</label>
            <textarea id="message" name="message" ></textarea>
          </p>
          <input type="submit" value="Send" />
        </form>
      </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <script src="/Public/js/index.js"></script>
    <script src="/Public/js/send.js"></script>
  </body>
</html>
