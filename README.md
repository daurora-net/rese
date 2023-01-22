# アプリケーション名
## Rese

# 環境構築方法

## 前提条件
- PHP、Composerインストール済

## 1. git clone
```
git clone https://github.com/daurora-net/rese.git
```
## 2. envファイル準備
```
cp .env.example .env
```
## 3. .envファイルにDB設定追加
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=resedb
DB_USERNAME=root
DB_PASSWORD=root
```
## 4. composer install
```
composer install
```
## 5. アプリケーションキーの生成
```
php artisan key:generate
```

# 機能一覧
- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報削除
- エリアで検索する
- ジャンルで検索する
- 店名で検索する
- 予約変更機能
- 評価機能
- バリデーション
- レスポンシブデザイン
- 管理画面
- ストレージ
- 認証
- メール送信
- リマインダー
- QRコード
- 決済機能
- テストコード

---

## 使用技術（実行環境）

- Laravel8.83.23(PHPv7.3.29)

---

## テーブル設計

---

## ER図



## 他に記載することがあれば記述する

例） ## 環境構築、## アカウントの種類（テストユーザーなど）
