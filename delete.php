<?php
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

// Todoクラスのdeleteメソッドを実行
$todo->delete($id);

// 一覧画面に戻る
header('Location: index.php');