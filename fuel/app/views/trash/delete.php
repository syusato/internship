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
    <h3> details</h3>

    <h1>タイトル：<?php print_r($for_delete[0]['title']); ?> </h1>
    <h2>リンク　：<?php print_r($for_delete[0]['url']); ?> </h2>
    <h2>コメント：<?php print_r($for_delete[0]['comment']); ?> </h2>
    <br>
    <h3>追加日　：<?php print_r($for_delete[0]['insert_date']); ?> </h3>
    <h3>最終閲覧：<?php print_r($for_delete[0]['update_date']); ?> </h3>
    <br>

    <h1>本当に削除しますか？</h1>
    <form action="/articles/delete/<?php echo $id ?>">
	    <button style="color: red;">削除</button>
	</form>

    <br>
    <form action="/home/back">
		  <button>戻る</button>
	</form>
</body>