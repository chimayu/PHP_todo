$(function(){

    // きちんとJSが読み込まれているか確認用のコンソール
    // console.log(123);

    // 非同期で追加された要素や
    // JSが読み込まれた後のDOM操作で生まれた要素などに対しては
    // ↓の書き方だと認識されない
    // $('.js-delete').on('click', function(){});

    // deleteボタンが押されたとき
    // 画面を移動しないようにする

    // eはeventの略だが、名前は何でもいい。
    // eはクリックされた要素のこと
    // functionの引数にはクリックされた要素が入る
    // preventDefaultでデフォルトの機能を防ぐ
    // id属性が、js-delete-btn- で始まる要素がクリックされたら
    $(document).on('click','[id^="js-delete-btn-"]', function(e){
        e.preventDefault();
        // console.log(123);

        // クリックされた要素のid属性の15文字目以降を取得
        let id = $(this)
            .attr('id')
            .substr('14');

        deleteTask(id);

        // Ajaxで処理をする
        // delete.php?key=value
        // key=value -> $_GET['key'] で valueが取れる
        // id = 33 -> $_GET['id'] で 33 が取れる
        function  deleteTask(id) {
            $.ajax({
                // どこに何を送るのか
                // 
                url: 'delete.php?id=' + id, // formタグでいうところの action属性
                type: 'GET', // formタグでいうところの method属性
                dataType: 'json'
            }) .then(
                //成功した場合の処理
                // functionの引数にはレスポンスが入ってる
                // 
                function(isDeleated) {
                    if (isDeleated) {
                        deleteDOM(id);
                    }
                },
                //失敗した場合の処理
                function() {
                    console.log('失敗');
                }
            );
        }

        function deleteDOM(id) {
            $('#js-task-' + id).remove();
        }

    });
});