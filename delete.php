<?php

// echo json_encode('成功');
// exit;

// URLを入力
// クライアント -> リクエスト -> サーバ
// サーバ -> レスポンス -> クライアント
// レスポンス
// html, css, js, 画像, json
// サーバがレスポンスを作っている
// deleteでDBから削除 1 -> 0

// deleteボタンを押したら
// 対象のレコードを削除して
// 一覧画面に戻る

require_once('function.php');
require_once('Models/Todo.php');

// require: エラーが出た時に処理を止める
//  - require
//  - require_once
// include: エラーが出た時も処理を止めない
//  - include
//  - include_once

$id = $_GET['id'];
// echo '<pre>';
// var_dump($_GET);

// Todoクラスをインスタンス化
$todo = new Todo();

// データの削除：Todoクラスのdeleteメソッドを実行
$res = $todo->delete($id);

// 一覧画面に戻る
// header('Location: index.php');

echo json_encode(true);
exit;