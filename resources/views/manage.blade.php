<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/reset.css" />
  <link rel="stylesheet" href="/css/app.css" />
  <title>管理システム</title>
</head>

<body>
  <h1 class="ttl">管理システム</h1>
  <form action="/search" class="form" name="manage" method="POST">
    @csrf
    <div class="header">
      <div class="form-flex">
        <p class="form-item-label">お名前</p>
        <input class="form-item-input" type="text" name="fullname" value="{{ $fullname ?? ''}}">
        <p class="form-item-label-gender">性別</p>
        @if (@isset($gender))
        @php
        if($gender == 1){
        $checkedall = "";
        $checkedman = "checked";
        $checkedwoman = "";
        }else if($gender == "2"){
        $checkedall = "";
        $checkedman = "";
        $checkedwoman = "checked";
        } else {
        $checkedall = "checked";
        $checkedman = "";
        $checkedwoman = "";
        }
        @endphp
        @endif
        <input class="form-item-input-radio" id="all" type="radio" name="gender" value="" {{$checkedall ?? 'checked'}}>
        <label for="all">全て</label>
        <input class="form-item-input-radio" id="man" type="radio" name="gender" value="1" {{$checkedman ?? ''}}>
        <label for="man">男性</label>
        <input class="form-item-input-radio" id="woman" type="radio" name="gender" value="2" {{$checkedwoman ?? ''}}>
        <label for="woman">女性</label>
      </div>
      <div class="form-flex">
        <p class="form-item-label">登録日</p>
        <input class="form-item-input" type="date" name="created_from" value={{$created_from ?? ''}}>
        <span class="span-to">~</span>
        <input class="form-item-input" type="date" name="created_to" value={{$created_to ?? ''}}>
      </div>
      <div class="form-flex">
        <p class="form-item-label">メールアドレス</p>
        <input class="form-item-input" type="email" name="email" value={{$email ?? ''}}>
      </div>
      <button class="form-btn">検索</button>
      <a class="reset-link" href="/manage">リセット</a>
    </div>
  </form>
  <div class="search-result">
    <table class="search-result-list">
      <tr>
        <th class="content-id">ID</th>
        <th class="content-name">お名前</th>
        <th class="content-gender">性別</th>
        <th class="content-email">メールアドレス</th>
        <th class="content-opinion">ご意見</th>
        <th class="content-btn"></th>
      </tr>
      @if (@isset($contacts))
      {{ $contacts->appends(request()->input())->links() }}
      @foreach($contacts as $contact)
      <form action="/delete" name="manage" method="POST">
        @csrf
        <tr>
          <td class="content-id">
            <input class="input-id" type="text" name="id" value="{{$contact->id}}" readonly>
          </td>
          <td class="content-name">{{$contact->fullname}}</td>
          @php
          $gender_int = $contact->gender;
          if($gender_int == 1){
          $gender = "男性";
          } else {
          $gender = "女性";
          }
          @endphp
          <td class="content-gender">{{$gender}}</td>
          <td class="content-email">{{$contact->email}}</td>
          <td class="content-opinion">{{$contact->opinion}}</td>
          <td class="content-btn">
            <button class="form-btn-del">削除</button>
          </td>
      </form>
      </tr>
      @endforeach
      @endif
    </table>
  </div>
</body>
<style>
  body {
    width: 100vw;
    height: 100vh;
  }

  .ttl {
    text-align: center;
    font-size: 20px;
    margin: 20px;
    font-weight: bold;
  }

  .header {
    margin: 10px auto;
    margin-bottom: 40px;
    padding-top: 40px;
    padding-bottom: 20px;
    width: 90%;
    border: solid 1px black;
    text-align: center;
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

  .form-flex {
    display: flex;
  }

  .form-item-label {
    width: 130px;
    margin-left: 30px;
    margin-top: 8px;
    font-weight: bold;
    font-size: 14px;
    text-align: left;
  }

  .form-item-input {
    border: 1px solid gray;
    border-radius: 6px;
    padding: 0 10px;
    height: 40px;
    width: 200px;
    font-size: 15px;
    margin-bottom: 15px;
  }

  .span-to {
    display: block;
    padding: 10px 25px;
    font-weight: bold;
    font-size: 14px;
    text-align: center;
  }

  .form-item-label-gender {
    width: 60px;
    margin-left: 40px;
    margin-top: 8px;
    font-weight: bold;
    font-size: 14px;
    text-align: left;
  }

  /* radio-button */
  label {
    vertical-align: middle;
    position: relative;
    margin-left: 70px;
    margin-top: 6px;
  }

  label::before {
    content: '';
    width: 35px;
    height: 35px;
    position: absolute;
    top: -12%;
    right: 40px;
    background-color: white;
    border: solid black;
    border-width: 1px;
    border-radius: 50%;
    opacity: 0.5;
    cursor: pointer;
  }

  .form-item-input-radio {
    display: none;
  }

  input[type="radio"]:checked+label:after {
    content: '';
    width: 9px;
    height: 9px;
    position: absolute;
    top: 7px;
    right: 53px;
    background-color: black;
    border-radius: 50%;
    cursor: pointer;
  }

  .reset-link {
    font-size: 14px;
    color: black;
    text-decoration: underline;
  }

  .reset-link:hover {
    cursor: pointer;
    opacity: 0.5;
    transition: 0.3s;
  }


  .search-result {
    width: 90%;
    margin: 20px auto;
  }

  .search-result-list {
    margin-top: 20px;
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
    word-break: break-all;
  }

  th {
    border-bottom: 1px solid black;
    text-align: left;
    font-size: 14px;
  }

  td {
    text-align: left;
    font-size: 14px;
  }

  .form-btn-del {
    border-radius: 6px;
    margin-top: 10px;
    width: 70px;
    background: black;
    color: white;
    font-weight: bold;
    font-size: 15px;
    border: none;
    cursor: pointer;
    transition: 0.3s;
  }

  .form-btn-del:hover {
    cursor: pointer;
    opacity: 0.5;
    transition: 0.3s;
  }


  .input-id {
    border: none;
    width: 30px;
    outline: none;
    text-align: center;
    padding-bottom: 5px;
  }

  th.content-id,
  td.content-id {
    text-align: center;
    width: 10%;
  }

  th.content-name,
  td.content-name {
    width: 15%;
  }

  th.content-gender,
  td.content-gender {
    width: 10%;
  }

  th.content-email,
  td.content-email {
    width: 18%;
    word-break: break-all;
  }

  th.content-btn,
  td.content-btn {
    width: 10%;
  }

  th.content-opinion {
    width: 440px;
  }

  td.content-opinion {
    padding-right: 80px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  td.content-opinion:hover {
    padding-right: 0px;
    overflow: auto;
    text-overflow: clip;
    white-space: normal;
  }

  .current-page-backgroundcolor {
    background-color: black;
    color: white;
    padding: 0.2rem 0.5rem;
  }
</style>

</html>