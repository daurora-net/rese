# アプリケーション名
## 「Rese」

# 環境構築方法
## 前提条件
- PHP、Composerインストール済
- MailHogインストール済
- ローカル環境

## 1. git clone
```
git clone https://github.com/daurora-net/rese.git
```
## 2. envファイル準備
```
cp .env.example .env
```
## 3. .envファイル修正・追加
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
## . マイグレーションとシーディング
```
php artisan migrate:fresh --seed
```
## . 開発サーバー起動
```
php artisan serve

# サイトを表示
http://127.0.0.1:8000/
```
## . 
```

```

# 機能一覧
## 会員登録
## 認証
```
# 左上メニューボタンの「Registration」から会員登録、「ログイン」クリック
# MailHogを開く
http://127.0.0.1:8025/

# 認証ボタン「Verify Email Address」クリック
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

# ログイン画面が開くので情報入力してログイン
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
# トップページの店舗詳細の「詳しく見る」クリック、飲食店詳細ページへ
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

# 予約状況から、予約変更できる
```
## バリデーション
```
#会員登録時と予約追加・編集時にバリデーションがかかる
```

## 評価機能
```
# MySQLで過去の予約を追加
INSERT INTO reservations(id, user_id, shop_id, started_at, num_of_users) VALUES(10, 1, 1, 20220502200000, 2);

# 飲食店詳細ページにレビューフォームが追加される
http://127.0.0.1:8000/detail/1

# 値を入力して送信すると、レビューが表示される
```
## レスポンシブデザイン
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
# 管理画面から画像アップロード
```
# 管理画面、店舗ページ
http://127.0.0.1:8000/admin/shops

# 管理者でログイン
ID: admin
PW: admin

#右上の「＋新規」ボタンから、新規店舗の内容を入力、「画像URL」ではなく「image」から画像選択して「送信」クリック
#シンボリックリンク使用で、strageディレクトリに画像保存される
```
## メール送信
```
# 管理画面、利用者ページ
http://127.0.0.1:8000/admin/users

# 管理者でログイン
ID: admin
PW: admin

# 左上の「メール作成」ボタンから、メール作成フォーム画面へアクセス
# 左上のタブからユーザー全員宛か個別宛かを選択できる
# 内容を入力して「送信」クリック、上部に「Processed successfuly.」と出たら送信成功
# Mailhogへアクセスして受信確認
http://127.0.0.1:8025/
```
## リマインダー
```
# MySQLで今日の予約を追加
# 動作確認の日付を適宜変更
INSERT INTO reservations(id, user_id, shop_id, started_at, num_of_users) VALUES(20, 1, 1, 20230125200000, 2);

# rese/app/Console/Kernel.php
# 動作確認のため以下を変更

# before
->dailyAt('10:00');
# after
->everyMinute();

# リマインダーを送信させる
php artisan schedule:run

#Mailhogで確認
http://127.0.0.1:8025/
```
## QRコード
```
# マイページ
http://127.0.0.1:8000/mypage

# 予約状況の「QRコード表示」ボタンをクリック
# QRコード表示ページへ遷移される
http://127.0.0.1:8000/reserve{id}
```
## 決済機能
```
# マイページ
http://127.0.0.1:8000/mypage

# ユーザー名の下「有料会員登録へ」ボタンをクリック
# 入力画面へ遷移するので、内容入力
http://127.0.0.1:8000/subscription

# お名前：（自由）
# カード番号:4242 4242 4242 4242
# 月/年/CVC:（自由）

# 「送信」をクリックでマイページへ戻る 
# stripeサイト（テスト環境）で入金確認
https://dashboard.stripe.com/login

# メールアドレス:daurora.net@gmail.com
# パスワード:wen0606110483
```
## テストコード
# 【MySQL】 テスト用のデータベース作成
create database test_resedb;

# テスト用のenvファイル作成
cp .env .env.testing
```
.env.testingファイルを修正
```

```

---

## 使用技術（実行環境）

- Laravel8.83.23(PHPv7.3.29)

---

## テーブル設計

---

## ER図



## 他に記載することがあれば記述する

例） ## 環境構築、## アカウントの種類（テストユーザーなど）
