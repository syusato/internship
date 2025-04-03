# FuelPHP × Knockout.js 非同期リンク管理アプリ

## 📌 概要

FuelPHPとKnockout.jsを使って作成した、非同期処理対応のリンク管理アプリです。  
記事・論文・ツールなどのリンクを一覧表示し、詳細確認・編集・削除が非同期で可能です。

## 🛠 機能一覧

- 🔍 タブによる分類表示（記事 / 論文 / ツール）
- ✅ Knockout.jsによる非同期コメント編集
- 🗑 削除ボタンも非同期対応＆確認ダイアログ付き
- 📅 クリック時に最終閲覧日時を自動記録
- 🔐 `before()` を使ったログインチェック対応

## 📁 使用技術

- FuelPHP 1.9.x
- PHP 7.x / 8.x
- Knockout.js 3.5.1
- jQuery 3.6.0
- MySQL / MariaDB

## 各ファイルの説明

<Model>
・ariticles.php
 -記事・論文・ツールを保存するテーブル
・users.php
 -ユーザーテーブル

<View>
/detail
・check.php
 -各リンクの詳細を表示する画面
/login
・index.php
 -ログイン画面
・newaddition.php
 -新規ユーザ登録画面
/welcome
・hello.php
 -ダッシュボード（リンク一覧表示画面）
・newaddition.php
 -新規リンク追加画面

<Controller>
/api
・detail.php
 -詳細表示画面内で非同期処理を行うためのAPI

・articles.php
 -ArticlesテーブルのCRUDのためのコントローラ
・base.php
 -before()を用いたログインチェックのためのベースコントローラ
・detail.php
 -詳細画面表示コントローラ
・home.php
 -ダッシュボード表示用コントローラ
・login.php
 -ログイン画面・新規登録画面表示用コントローラ
・users.php
 -ログイン認証用コントローラ
・welcome.php
 -（もとからあったコントローラ、本機能には使用しない）
