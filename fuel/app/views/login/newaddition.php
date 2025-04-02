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
    <h1>登録ページ</h1>
    <form method= "POST" action="/users/insert">
        ユーザー名：<input type="text" name="username"><br>
        email：<input type="text" name="email"><br>
        パスワード：<input type="text" name="password"><br>
        <input type="submit" value="登録">
    </form>
    
</body>