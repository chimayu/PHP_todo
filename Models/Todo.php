<?php

require_once('config/dbconnect.php');

// Todo
// 1つのクラスに、1つの役割がある
// 2つ以上役割がある場合は、あまり設計がよくない
// Todoクラスの役割は、tasksテーブルとのやりとりをする
class Todo
{
    // プロパティ
    private $table = 'tasks';
    private $tb_content = 'name';
    private $db_manager;

    // インスタンス化した時に呼ばれるメソッド
    public function __construct()
    {
        // db_managerプロパティは、
        // DbManagerクラスのインスタンス
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }

    public function create($name)
    {
        // DBに保存
        // このクラスのインスタンスの
        // db_managerプロパティの
        // DbManagerクラスのインスタンス
        // dbhプロパティの
        // PDOのインスタンス
        // prepareメソッドを実行
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . ' (name) VALUES (?)');
        $stmt->execute([$name]);
    }

    // DBからすべて取得するメソッド
    // メソッド名はなるべく動詞にする意味で以下のように
    public function getAll()
    {
        // return === 関数の呼び出し元に値を返す
        // 実行するSQLを準備
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);
        // 準備したSQLを実行
        $stmt->execute();
        // 実行結果を取得
        $tasks = $stmt->fetchAll();
        // return === 関数の呼び出し元に、値を返す
        return $tasks;
        // $tasksの変数に入れずに、下記のように書いてもよい
        // return $stmt->fetchAll();
    }

    public function get($id)
    {
        // $idと一致するidを持つレコードを取得する
        // DBとの接続はdbconnect.phpで実施済みなので
        // ここではSQLを準備・実行し、実行結果を変数に代入する

        // SQL文を準備する
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        // 実行する
        // executeには[0 => '1'] みたいな配列の状態で渡す
        $stmt->execute([$id]);
        // 実行結果を変数に代入する
        $task = $stmt->fetch();
        // 結果を関数の呼び出し元に返す
        return $task;
    }

    public function update($id, $name)
    {
        // データの更新
        $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table . ' SET name = ? WHERE id = ?');
        $stmt->execute([$name, $id]);
    }


}
