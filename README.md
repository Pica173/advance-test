# お問い合わせ管理システム
概要説明
- 入力画面より、フォームに必要な情報を入力し、DBに登録ができる。
- 登録された情報は管理画面より、一覧表示・検索・削除が可能。

登録画面
![スクリーンショット 2022-09-23 16 19 51](https://user-images.githubusercontent.com/106429578/191910030-c94d661d-2580-4523-8c60-4767b327c60a.png)

管理画面
![スクリーンショット 2022-09-23 16 21 32](https://user-images.githubusercontent.com/106429578/191910226-de0f37ea-38e6-41bb-af07-e91ad6f6d07d.png)

## 作成した目的
テストの為。

## 機能一覧
- お問い合わせ登録機能
- お問い合わせ登録前確認機能
- お問い合わせ管理機能（一覧表示・検索・削除）

## 使用技術（実行環境）
- Laravel　8.83.23

## テーブル設計
contactsテーブル

 id:bigint unsigned PRIMARY KEY
 
 fullname:varchar(255) NOT NULL
 
 gender:tinyint NOT NULL (1:男性 2:女性)
 
 email:varchar(255) NOT NULL
 
 postcode:char(8) NOT NULL
 
 address:varchar(255) NOT NULL
 
 building_name:varchar(255)
 
 opinion:text NOT NULL
 
 created_at:timestamp
 
 updated_at:timestamp

## 環境構築
- データベース名：advancedtestdb
- シーディングコマンド：　php artisan db:seed
- FAKERの日本語対応のため、config/app.phpのFaker Localeを'faker_locale' => 'ja_JP'に変更

## その他
- LaravelのページネーションではTailwindCSSを使用
- 郵便番号から住所を自動入力する機能はYubinBangoを利用
