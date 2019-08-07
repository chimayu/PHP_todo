<?php
// データ更新
// 更新するデータを特定する

// データの受け取り
// id, task
// echo '<pre>';
// var_dump($_POST['id'], $_POST['task']);
// die();
$id = $_POST['id'];
$task_name = $_POST['task'];

// 更新
// Todoクラスをインスタンス化、$todoという変数に代入
require_once('Models/Todo.php');
$todo = new Todo();

// Todoクラスのupdateメソッドを実行
$todo->update($id, $task_name);

// 一覧画面に戻る
header('Location: index.php');