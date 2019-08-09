## TODOアプリ

### 機能
- taskの追加
- taskの一覧表示
- taskの更新
- taskの削除

### 画面
- task一覧画面
- task編集画面


### 準備
#### DB作成
- MySQLで任意の名前のDBを作成します。
  - サンプルでは `php_oop` となってます。

#### テーブル作成
作成したDBにテーブルを作成します。
`database/php_oop_sql` ファイルをphpMyAdminなどのツールでインポートするか、
ファイルに記述されてる内容をコピーしてSQLを実行してください。

#### DB設定
- 自身の環境に合わせて `config/dbconnect.php` の以下の内容を修正します。
  ※基本的にはデフォルトの設定で問題ありません。

```
$user = 'root';
$password='';
```

#### 動作確認
PHP_OOPにアクセスしてtaskの一覧画面が表示されることを確認します。

---

20190808

## ファイルの読み込みについて

- require: エラーが出た時に処理を止める
    - require
    - require_once
- include: エラーが出た時も処理を止めない
    - include
    - include_once

---

20190809

# Ajax
- Asynchronous JavaScript + XML の略称
- Asynchronousは非同期、XMLはデータ形式のひとつ
- 最近は XML より JSON でやることが多い
- JavaScript Object Notation
- 配列みたいなかたち
- いろいろなプログラミング言語で扱いやすいかたち

## できること
- ページをリロードせずにページの内容の一部を変更すること

## 例
- 郵便番号を入れたら住所が表示される
- いいねボタン
- Google map

## 書くこと
- JSでもjQueryでも書ける
- 今回はjQueryで
    - 何をどこに送信するか
    - 処理が成功した場合に実施すること
    - 処理が失敗した場合に実施すること

## 書き方
```
$.ajax({

})
.then(
    //成功した場合の処理
    function (data) {

    },
    //失敗した場合の処理
    function () {

    }
)
```

## 余談
- Vue, React と併用
    - SPA: Single Page Application
    - Webアプリケーションで流行ってる
    - データを全部入れ替える訳ではないので描画が速い

## 今日やること
- 画面を移動しないようにすること
- DBからデータを削除する
- 画面に表示されてるデータを削除する

1. jQueryをCDNで導入する
    - jQueryはJavaScriptのライブラリ
    - DOMを操作する
    - ファイルをダウンロード or CDN
        - CDN === Content Delivery Network
        - バージョン3.4.1 == メジャーアップデート.マイナーアップデート.パッチ 