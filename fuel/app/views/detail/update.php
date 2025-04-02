<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>home</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		
	</style>
</head>
<body>
    <h1>更新</h1>
    <form method = "POST" action = "/articles/update/<?php echo $id?>">
        タイトル：<input type="text" name="title" value="<?php echo $for_update[0]['title']?>"><br>
        URL：<input type="text" name="url" value="<?php echo $for_update[0]['url']?>"><br>
        コメント：<input type="text" name="comment" value="<?php echo $for_update[0]['comment']?>"><br>
        
        <input type="submit" value="更新">
    </form>

    <!-- ここでホームに戻ると同時に、追加した記事を更新したい-->
    <form action="/home/back">
		<button>戻る</button>
	</form>

</body>
    