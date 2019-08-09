<?php

// Todo.phpを読み込む
require_once('Models/Todo.php');

// ユーザーが入力した内容を取得
// $taskっていう変数にユーザーが入力した内容代入
// $task = ユーザーが入力した内容
$task = $_POST['task'];

// DBに保存

// Todoクラスをインスタンス化して$todoに代入
$todo = new Todo();

// Todoクラスのインスタンスの
// createメソッドを実行
$res = $todo->create($task);

// 一覧画面に戻る
header('Location: index.php');

echo json_encode(true);
exit;