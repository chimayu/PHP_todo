<?php
require_once('function.php');
// var_dump($_GET['id']);
// die();

// index.phpからデータ（id番号）の受け取り
$id = $_GET['id'];

// Todoクラスをインスタンス化、$todoという変数に代入
require_once('Models/Todo.php');
$todo = new Todo();

// DBからデータを取得
// Todoクラスのgetメソッドを実行
$task = $todo->get($id);
// echo '<pre>';
// var_dump($task, $_GET['id'], $task['id']);
// die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO APP</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="px-5 bg-primary">
        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">TODO APP</a>
            <div class="justify-content-end">
                <span class="text-light">
                    SeedKun
                </span>
            </div>
        </nav>
    </header>
    <main class="container py-5">
        <section>
            <form class="form-row" action="update.php" method="POST">
                <div class="col-12 col-md-9 py-2">
                    <input type="text" name="task" class="form-control" value="<?php echo h($task['name']) ?>">
                </div>
                <!-- データを表示する -->
                <input type="hidden" name="id" value="<?php echo h($task['id']); ?>">
                <div class="py-2 col-md-3 col-12">
                    <button type="submit" class="col-12 btn btn-primary btn-block">UPDATE</button>
                </div>
            </form>
        </section>
    </main>
    
    <script src="assets/js/app.js"></script>
</body>
</html>