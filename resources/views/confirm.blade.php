<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>内容確認</title>
  <link rel="stylesheet" href="/css/reset.css" />
</head>

<body>
  <form action="/complete" class="form" name="contact" method="POST">
    @csrf
    <h1 class="ttl">内容確認</h1>
    <div class="form-item">
      <p class="form-item-label">お名前</p>
      <input type="text" name="fullname" class="form-item-input-name" value="{{ $lastname }}　{{ $firstname }}" readonly>
      <input type="hidden" name="lastname" class="form-item-input-name" value="{{ $lastname }}" readonly>
      <input type="hidden" name="firstname" class="form-item-input-name" value="{{ $firstname }}" readonly>
    </div>
    <div class="form-item">
      <p class="form-item-label">性別</p>
      <input type="text" name="gender" class="form-item-input" value="{{ $gender }}" readonly>
    </div>
    <div class="form-item">
      <p class="form-item-label">メールアドレス</p>
      <div class="form-email">
        <input type="email" name="email" class="form-item-input" value="{{ $email }}" readonly>
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">郵便番号</p>
      <div class="form-post">
        <input class="form-item-input" id="postcode" type="text" name="postcode" value="{{ $postcode }}" readonly>
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">住所</p>
      <div class="form-address">
        <input type="text" id="address" name="address" class="form-item-input" value="{{ $address }}" readonly>
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">建物名</p>
      <div class="form-building_name">
        <input type="text" name="building_name" class="form-item-input" value="{{ $building_name }}" readonly>
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">ご意見</p>
      <div class="form-opinion">
        <textarea name="opinion" class="form-item-opinion" readonly>{{ $opinion }}</textarea>
      </div>
    </div>
    <input type="submit" class="form-btn" value="送信">
    <button type="submit" class="back-btn" name="back" value="back">修正する</button>
  </form>
</body>
<style>
  .ttl {
    text-align: center;
    font-size: 20px;
    margin: 20px;
  }

  .form {
    width: 60%;
    margin: 10px auto;
  }

  .form-item {
    padding: 10px 0;
    width: 100%;
    display: flex;
  }

  .form-item-label {
    width: 30%;
    margin-top: 15px;
    font-weight: bold;
    font-size: 14px;
  }

  .form-item-label-required {
    color: red;
    font-size: 14px;
  }

  .form-item-input {
    border: none;
    border-radius: 6px;
    padding: 0 10px;
    height: 40px;
    width: 100%;
    font-size: 15px;
    outline: none;
  }

  .form-item-opinion {
    border: none;
    border-radius: 6px;
    padding: 0 10px;
    height: 150px;
    width: 100%;
    font-size: 15px;
    resize: none;
    outline: none;
  }

  .form-btn {
    border-radius: 6px;
    margin: 16px auto 0;
    padding-top: 10px;
    padding-bottom: 10px;
    width: 140px;
    display: block;
    background: black;
    color: white;
    font-weight: bold;
    font-size: 15px;
    border: none;
    cursor: pointer;
    transition: 0.3s;
  }

  .form-btn:hover {
    opacity: 0.5;
    transition: 0.3s;
  }

  .back-btn {
    display: block;
    margin: 0 auto;
    border: none;
    text-decoration: underline;
    color: black;
    background-color: white;
    cursor: pointer;
    transition: 0.3s;
  }

  .back-btn:hover {
    opacity: 0.5;
    transition: 0.3s;
  }

  /* name */
  .form-flex {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .form-item-input-name {
    border: none;
    border-radius: 6px;
    padding: 0 10px;
    height: 40px;
    width: 100%;
    font-size: 15px;
    outline: none;
  }

  .form-name {
    width: 50%;
  }

  .form-name:nth-child(2) {
    margin-left: 40px;
  }

  /* e-mail */
  .form-email {
    width: 100%;
  }

  /* post */
  .form-post {
    width: 100%;
  }

  .postmark {
    display: inline-block;
    padding-top: 15px;
    padding-left: 20px;
    padding-right: 20px;
    font-weight: bold;
  }

  /* address */
  .form-address {
    width: 100%;
  }

  /* building_name */
  .form-building_name {
    width: 100%;
  }

  /* opinion */
  .form-opinion {
    width: 100%;
  }

  /* radio-button */
  label {
    vertical-align: middle;
    position: relative;
    margin-left: 35px;
  }

  label:last-child {
    margin-left: 60px;
  }

  label::before {
    content: '';
    width: 28px;
    height: 28px;
    position: absolute;
    top: -50%;
    right: 40px;
    background-color: white;
    border: solid black;
    border-width: 1px;
    border-radius: 50%;
    opacity: 0.5;
  }

  .flex-gender {
    width: 100%;
    margin-bottom: 20px;
  }

  .form-item-input-radio {
    display: none;
  }

  input[type="radio"]:checked+label:after {
    content: '';
    width: 8px;
    height: 8px;
    position: absolute;
    top: 3px;
    right: 51px;
    background-color: black;
    border-radius: 50%;
  }
</style>

</html>