<?php
    require_once('function.php');

    // DBからデータを取得する
    require_once('Models/Todo.php');

    // インスタンス化
    // インスタンスを$todoという変数に代入
    $todo = new Todo();

    // 変数の中身を確認したいとき
    // echo '<pre>';
    // var_dump($todo);
    // exit;

    // DBからデータを取得して、$tasksという変数に代入
    // DBからデータを取得 === TodoクラスのインスタンスのgetAllメソッドを実行
    $tasks = $todo->getAll();

    // 変数の中身を確認したいとき
    // echo '<pre>';
    // var_dump($tasks);
    // exit;
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
            <form class="form-row" action="create.php" method="POST">
                <div class="col-12 col-md-9 py-2">
                    <input type="text" class="form-control" placeholder="ADD TODO" name="task">
                </div>
                <div class="py-2 col-md-3 col-12">
                    <button type="submit" class="col-12 btn btn-primary btn-block">ADD</button>
                </div>
            </form>
        </section>

        <section class="mt-5">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-primary text-light">
                        <th class=>TODO</th>
                        <th>DUE DATE</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <!-- 取得したデータを一覧表示する -->
                <?php foreach ($tasks as $result): ?>
                    <tr>
                        <td><?php echo h($result['name']); ?></td>
                        <td><?php echo h($result['due_date']); ?></td>
                        <td>
                            <a class="text-success" href="edit.php">EDIT</a>
                        </td>
                        <td>
                            <a class="text-danger" href="delete.php">DELETE</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>  
        </section>
    </main>
    
    <script src="assets/js/app.js"></script>
</body>
</html>