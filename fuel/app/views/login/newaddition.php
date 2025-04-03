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

    <?php if (Session::get_flash('error')): ?>
    <div style="color:red;">
        <?php echo Session::get_flash('error'); ?>
    </div>
    <?php endif; ?>

    <form method= "POST" action="/users/insert">
        ユーザー名：<input type="text" name="username"><br>
        email：<input type="email" name="email"><br>
        パスワード：<input type="password" name="password"><br>
        <input type="submit" value="登録">
    </form>
    
</body>