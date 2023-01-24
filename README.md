# アプリケーション名
### Rese
- 会員専用の飲食店予約サイト
![toppage](https://user-images.githubusercontent.com/93467733/214284426-7a93eb75-2851-49fc-9aaf-d20c8f8546f6.png)

## 作成した目的
- 模擬案件として作成

# 使用技術（実行環境）
-   Laravel8.83.23(PHPv7.3.29)

# アプリケーションURL
### http://54.178.230.50/

# 環境構築方法
## 前提条件

-   PHP、Composer インストール済
-   MailHog インストール済
-   MAMP インストール済

## 1. git clone

```
git clone https://github.com/daurora-net/rese.git
```

## 2. env ファイル準備

```
cp .env.example .env
```

## 3. .env ファイル修正・追加

```
# URL修正
APP_URL=http://127.0.0.1:8000

# DB情報修正
DB_DATABASE=resedb
DB_PASSWORD=root

# メール情報修正
MAIL_HOST=localhost
MAIL_FROM_ADDRESS=info@mailhog.com（なんでも可）

# Stripe情報追加
STRIPE_KEY=pk_test_51MRB5nGpaB91XJcoSQk7cuteIyLVLkGFgQ90askDiUKNYJJKlIoa4Tprkcec4cXOnQOGxx4AFjMmhXfMrvGav7nq00M1iQSsRw
STRIPE_SECRET=sk_test_51MRB5nGpaB91XJcovPH4OT8j69f4zlBQLsZdgBadoLSpKp4OYjFwXdIvlR0pqPSZrk6Zb3jQlBF7lL26EeUrXvrP00aBzmftzp
STRIPE_BASIC_ID=price_1MRH0eGpaB91XJco1lPc3xxh
```

## 4. composer install

```
composer install
```

## 5. アプリケーションキー生成

```
php artisan key:generate
```

## 6. ローカルサーバー起動

## 7. 【MySQL】 ログイン

```
mysql -u root -p
PW: root

# データベース作成
CREATE DATABASE resedb;
```

## 8. マイグレーションとシーディング

```
php artisan migrate:fresh --seed
```

## 9. 開発サーバー起動

```
php artisan serve

# サイトを表示
http://127.0.0.1:8000/
```

### アカウント（テストユーザー）

```
Username: test_user
Email: test@example.com
Password: test123456789
```

# 機能一覧

## 会員登録

```
# 左上メニューボタンの「Registration」から新規会員情報入力、「登録」クリック
# 画面遷移したら「ログイン」クリック
```

## 認証

```
# MailHogを開く、認証メールが届いている
http://127.0.0.1:8025/

# メール内の認証ボタン「Verify Email Address」クリック
# トップページが開く
```

## ログアウト

```
# 左上メニューボタンの「Logout」からログアウト
```

## ログイン

```
#ログイン画面
http://127.0.0.1:8000/login

# 情報入力してログイン
```

## 飲食店一覧取得

```
# トップページに、飲食店一覧表示される
http://127.0.0.1:8000/
```

## エリアで検索する

## ジャンルで検索する

## 店名で検索する

```
# 検索は、トップページ右上の検索フォームから行える
```

## 飲食店詳細取得

```
# トップページの店舗詳細の「詳しく見る」クリック、飲食店詳細ページへ遷移する
http://127.0.0.1:8000/detail{id}
```

## 飲食店予約情報追加

```
# 飲食店詳細ページ
http://127.0.0.1:8000/detail{id}

# 予約フォームから予約を追加できる
```

## ユーザー飲食店予約情報取得

```
# マイページ
http://127.0.0.1:8000/mypage

# 予約情報一覧表示される
```

## 飲食店予約情報削除

```
# 予約情報一覧の×印クリックで削除できる
```

## ユーザー情報取得

```
# マイページ
http://127.0.0.1:8000/mypage

# 右上にユーザー名表示
```

## 飲食店お気に入り追加

```
# トップページ
http://127.0.0.1:8000/

# ハートマークをクリック、赤色でお気に入り追加される
```

## 飲食店お気に入り削除

```
# 赤色のハートマークをクリック、灰色でお気に入り削除される
```

## ユーザー飲食店お気に入り一覧取得

```
# マイページ
http://127.0.0.1:8000/mypage

# お気に入り店舗一覧表示される
```

## 予約変更機能

```
# マイページ
http://127.0.0.1:8000/mypage

# 予約状況から、予約内容変更後「変更」ボタンクリック
```

## バリデーション

```
# 会員登録時と予約追加・編集時にバリデーションがかかる
```

## 評価機能

```
# 過去の予約日1件シーディング済み
# 飲食店詳細ページ、左下にレビューフォームが表示される
http://127.0.0.1:8000/detail/1

# 値を入力して送信すると、レビューが表示される
```

## レスポンシブデザイン

```
# ブレイクポイントは768px
```

## 管理画面

```
# 管理者でログイン
http://127.0.0.1:8000/admin
ID: admin
PW: admin

# 左のサイドバーから店舗、予約、利用者の詳細一覧を表示、編集ができる
```

```
# 店舗代表者でログイン
http://127.0.0.1:8000/admin
ID: shop.member
PW: shop.member

# 左のサイドバーから店舗、予約の詳細一覧を表示、編集ができる
```

## ストレージ

```
# シンボリックリンクを作成
php artisan storage:link
```

### 管理画面から画像アップロード

```
# 店舗代表者でログイン
http://127.0.0.1:8000/admin
ID: shop.member
PW: shop.member

# もしくは..
# 管理者でログイン
http://127.0.0.1:8000/admin
ID: admin
PW: admin

# 左のサイドバー「店舗」から店舗ページへアクセス
http://127.0.0.1:8000/admin/shops

# 右上の「＋新規」ボタンから、新規店舗の内容を入力、「画像URL」ではなく「image」から画像選択して「送信」クリック
# シンボリックリンク使用で、strageディレクトリに画像保存される
```

## メール送信

```
# 管理者でログイン
http://127.0.0.1:8000/admin
ID: admin
PW: admin

# 左のサイドバー「利用者」から利用者ページへアクセス
http://127.0.0.1:8000/admin/users

# 左上の「メール作成」ボタンから、メール作成フォーム画面へアクセス
# 左上のタブからユーザー全員宛か個別宛かを選択できる
# 内容を入力して「送信」クリック、上部に「Processed successfuly.」と出たら送信成功
# Mailhogへアクセスして受信確認
http://127.0.0.1:8025/
```

## リマインダー

```
# テスト用の予約1件シーディング済み（予約日はnow指定）
# アカウントはテストユーザーでログイン
http://127.0.0.1:8000/
Email: test@example.com
Password: test123456789

# rese/app/Console/Kernel.php
# 動作確認のため以下を変更

# before
->dailyAt('10:00');
# after
->everyMinute();

# リマインダーを送信させる
php artisan schedule:run

#Mailhogで確認（最遅で1分後に確認できる）
http://127.0.0.1:8025/
```

## QR コード

```
# マイページ
http://127.0.0.1:8000/mypage

# 予約状況の「QRコード表示」ボタンをクリック
# QRコード表示ページへ遷移する
http://127.0.0.1:8000/reserve{id}

# QRコード内容は、管理画面の予約詳細ページURL
```

## 決済機能

```
# マイページ
http://127.0.0.1:8000/mypage

# ユーザー名の下「有料会員登録へ」ボタンをクリック
# 入力画面へ遷移する
http://127.0.0.1:8000/subscription

# 以下内容で入力
# お名前：（自由）
# カード番号:4242 4242 4242 4242
# 月/年/CVC:（自由）

# 「送信」をクリックで決済完了、マイページへリダイレクトされる
# stripeサイト（テスト環境）で入金確認
https://dashboard.stripe.com/test/payments
メールアドレス:daurora.net@gmail.com
パスワード:wen0606110483
```

## テストコード

テスト内容: ユーザー登録画面表示、登録後の画面遷移までの結果

```
# 【MySQL】 テスト用のデータベース作成
CREATE DATABASE test_resedb;
```

.env.testing ファイルを修正

```
# 空にする
APP_KEY=
```

```
# テスト用のアプリケーションキー生成
php artisan key:generate --env=testing

# テストを実行
php artisan test --filter RegistrationTest
```

## テーブル設計
![スクリーンショット 2023-01-20 13 15 25](https://user-images.githubusercontent.com/93467733/214115415-99778bbc-08d2-4ddc-bfc6-0df49fb03af9.png)
![スクリーンショット 2023-01-20 13 15 45](https://user-images.githubusercontent.com/93467733/214115434-78c2654f-ec22-4aa5-a491-1f4d0099a071.png)
![admin1](https://user-images.githubusercontent.com/93467733/214115447-26740e8f-514e-484b-a457-2d98fba47217.png)
![admin2](https://user-images.githubusercontent.com/93467733/214115468-97fb1aeb-b49d-48c4-a042-791893f99dd4.png)
![スクリーンショット 2023-01-24 2 57 01](https://user-images.githubusercontent.com/93467733/214115489-dc5bf2fe-dd40-494a-bc81-2d46d2d2c547.png)
---

## ER 図
![rese dio](https://user-images.githubusercontent.com/93467733/214115148-cef20dee-0541-4aec-b416-f5ca088ebcd6.png)
---
