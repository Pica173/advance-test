<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="/css/reset.css" />
</head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<script src="/js/input.js" charset="UTF-8"></script>

<body>
  <h1 class="ttl">お問い合わせ</h1>
  <form action="/confirm" class="form h-adr" name="contact" method="POST">
    @csrf
    <div class="form-item">
      <p class="form-item-label">
        お名前<span class="form-item-label-required">※</span>
      </p>
      <div class="form-flex">
        <div class="form-name">
          <input type="text" name="lastname" class="form-item-input-name" value="{{ old('lastname') }}">
          @error('lastname')
          <p class="vali-msg">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-name">
          <input type="text" name="firstname" class="form-item-input-name" value="{{ old('firstname') }}">
          @error('firstname')
          <p class="vali-msg">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label gender-magin">
        性別<span class="form-item-label-required">※</span>
      </p>
      <div class="flex-gender">
        @php
        if(old('gender') == "女性"){
        $checkedman = "";
        $checkedwoman = "checked";
        }else{
        $checkedman = "checked";
        $checkedwoman = "";
        }
        @endphp
        <input id="man" type="radio" name="gender" class="form-item-input-radio" value="男性" {{ $checkedman }}>
        <label for="man">男性</label>
        <input id="woman" type="radio" name="gender" class="form-item-input-radio" value="女性" {{ $checkedwoman }}>
        <label for="woman">女性</label>
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">メールアドレス<span class="form-item-label-required">※</span></p>
      <div class="form-email">
        <input id="email" type="email" name="email" class="form-item-input" value="{{ old('email') }}" onChange="changeemail();">
        @error('email')
        <p class="vali-msg">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="form-item">
      <span class="p-country-name" style="display:none;">Japan</span>
      <p class="form-item-label">郵便番号<span class="form-item-label-required">※</span></p>
      <span class="postmark">〒</span>
      <div class="form-post">
        <input class="form-item-input p-postal-code" id="postcode" type="text" name="postcode" value="{{ old('postcode') }}" maxlength="8" pattern="\d{3}−\d{4}">
        @error('postcode')
        <p class="vali-msg">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">住所<span class="form-item-label-required">※</span></p>
      <div class="form-address">
        <input type="text" id="address" name="address" class="form-item-input p-region p-locality p-street-address" value="{{ old('address') }}">
        @error('address')
        <p class="vali-msg">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">建物名</p>
      <div class="form-building_name">
        <input type="text" name="building_name" class="form-item-input" value="{{ old('building_name') }}">
        @error('building_name')
        <p class="vali-msg">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="form-item">
      <p class="form-item-label">ご意見<span class="form-item-label-required">※</span></p>
      <div class="form-opinion">
        <textarea name="opinion" class="form-item-opinion" maxlength="120">{{ old('opinion') }}</textarea>
        @error('opinion')
        <p class="vali-msg">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <button class="form-btn">確認</button>
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
    font-size: 15px;
  }

  .gender-magin {
    margin-top: 5px;
  }

  .form-item-label-required {
    color: red;
    font-size: 14px;
  }

  .form-item-input {
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 10px;
    height: 40px;
    width: 100%;
    font-size: 15px;
  }

  .form-item-opinion {
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 10px;
    height: 100px;
    width: 100%;
    font-size: 15px;
    resize: none;
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
    cursor: pointer;
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
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 10px;
    height: 40px;
    width: 100%;
    font-size: 15px;
  }

  .form-name {
    width: 50%;
  }

  .form-name:nth-child(2) {
    margin-left: 40px;
  }

  .form-name::after {
    content: "例）山田";
    padding: 15px;
    line-height: 40px;
    opacity: 0.5;
  }

  .form-name:nth-child(2)::after {
    content: "例）太郎";
    padding: 15px;
    line-height: 40px;
    opacity: 0.5;
  }

  /* e-mail */
  .form-email {
    width: 100%;
  }

  .form-email:nth-child(2)::after {
    content: "例）test@example.com";
    padding: 15px;
    line-height: 40px;
    opacity: 0.5;
  }

  /* post */
  .form-post {
    width: 100%;
  }

  .form-post:nth-child(3)::after {
    content: "例）123-4567";
    padding: 15px;
    line-height: 40px;
    opacity: 0.5;
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

  .form-address:nth-child(2)::after {
    content: "例）東京都渋谷区千駄々谷1-2-3";
    padding: 15px;
    line-height: 40px;
    opacity: 0.5;
  }

  /* building_name */
  .form-building_name {
    width: 100%;
  }

  .form-building_name:nth-child(2)::after {
    content: "例）千駄々谷マンション101";
    padding: 15px;
    line-height: 40px;
    opacity: 0.5;
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
    cursor: pointer;
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
    /* マークの横幅 */
    height: 8px;
    /* マークの縦幅 */
    position: absolute;
    top: 3px;
    right: 51px;
    background-color: black;
    border-radius: 50%;
    cursor: pointer;
  }

  /* validation */
  .vali-msg {
    margin: 10px 10px;
    color: red;
  }
</style>

</html>