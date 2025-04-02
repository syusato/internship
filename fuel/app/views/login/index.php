<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>index</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		
	</style>
</head>
<body>


    <!--  フラッシュメッセージ：ここが先頭付近 -->
    <?php if (Session::get_flash('error')): ?>
        <div class="error" style="color:red;">
            <?php 
                $errors = Session::get_flash('error');
                if (is_array($errors)) {  // 🔥 ここで配列かチェック
                    foreach ($errors as $field => $error) {
                        echo "<p>{$error}</p>";
                    }
                } else {
                    echo "<p>{$errors}</p>"; // 単体のエラーメッセージも表示
                }
            ?>
        </div>
    <?php endif; ?>


    <?php if (Session::get_flash('success')): ?>
        <div class="success" style="color:green;">
            <p><?= Session::get_flash('success') ?></p>
        </div>
    <?php endif; ?>


    <h1>ログイン</h1>
    

    <form action="auth" method="post">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">ログイン</button>
    </form>

    
</body>
</html>