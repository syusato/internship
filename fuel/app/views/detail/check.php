<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>home</title>
	<?php echo Asset::css('bootstrap.css'); ?>
    <script src="/assets/js/knockout-min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>     
    <style>
		
	</style>
</head>
<body>
    <h3> details</h3>

    <h1>タイトル：<?php echo $for_check[0]['title']; ?> </h1>
    <h2>リンク　：<?php echo $for_check[0]['url']; ?> </h2>
    <div>
        <h2>コメント：<input type="text" data-bind="value: comment"></h2><br>
        <!--更新ボタンに data-bind を追加-->
        <button data-bind="click: updateComment">コメント更新（非同期）</button>
    </div>
    <br>
    <h3>追加日　：<?php echo $for_check[0]['insert_date']; ?> </h3>
    <h3>最終閲覧：<?php echo $for_check[0]['update_date']; ?> </h3>
    <br>

    <form action="/home/back">
		  <button>戻る</button>
	</form>
    <br>

    <!-- 削除ボタンに data-bind を追加 -->
    <button data-bind="click: deleteItem">削除（非同期）</button>
    <!-- 更新・削除どちらも合わせたViewModel -->
    <script>
    function ViewModel() {
        var self = this;

        self.id = <?php echo json_encode($id); ?>;
        self.comment = ko.observable(<?php echo json_encode($for_check[0]['comment']); ?>);
        
        //更新ボタン部分
        self.updateComment = function () {
            $.ajax({
                url: "/api/detail/update_comment/" + self.id,
                type: "POST",
                data: { comment: self.comment() },
                success: function () {
                    alert("コメント更新完了！");
                },
                error: function (xhr, status, error) {
                    alert("更新失敗：" + error);
                }
            });
        };

        //削除ボタン部分
        self.deleteItem = function () {
            if (!confirm("本当に削除しますか？")) return;

            $.ajax({
                url: "/api/detail/delete/" + self.id,
                type: "DELETE",
                success: function () {
                    alert("削除完了！");
                    window.location.href = "/home/back";
                },
                error: function (xhr, status, error) {
                    alert("削除失敗：" + error);
                }
            });
        };
    }

    ko.applyBindings(new ViewModel());
    </script>

</body>