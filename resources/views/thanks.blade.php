<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ありがとうございました</title>
</head>

<body>
  <div class="main">
    <p>ご意見いただきありがとうございました。</p>
    <button class="form-btn">トップページへ</button>
  </div>
</body>
<style>
  body {
    width: 100vw;
    height: 100vh;
    position: relative;
  }

  .main {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
    -webkit-transform: translateY(-50%) translateX(-50%);
  }

  .form-btn {
    border-radius: 6px;
    margin: 60px auto 0;
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
</style>

</html>