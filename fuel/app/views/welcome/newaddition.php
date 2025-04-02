<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>newaddition</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		
	</style>
</head>
<body>
    <h1>新しいリンクを登録</h1>
    <form method = "POST" action = "/articles/insert">
        タイトル：<input type="text" name="title"><br>
        URL：<input type="text" name="url"><br>
        コメント：<input type="text" name="comment"><br>
        
        <input type="radio" name="type" value="webpage"checked>記事<br>
        <input type="radio" name="type" value="paper">論文<br>
        <input type="radio" name="type" value="tool">ツール<br>
        <input type="submit" value="追加">
    </form>

    <!-- ここでホームに戻ると同時に、追加した記事を更新したい-->
    <form action="/home/back">
		<button>戻る</button>
	</form>

</body>