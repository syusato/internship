<?php
use \Model\Users;

class Controller_Users extends Controller_Base
{
    public function action_insert()
    {
        $val = Validation::forge();
        $val->add('username', 'ユーザー名')->add_rule('required');
        $val->add('password', 'パスワード')->add_rule('required')->add_rule('min_length', 6);
        $val->add('email', 'メールアドレス')->add_rule('required')->add_rule('valid_email');

        if ($val->run()) {
            $username = Input::post('username');
            $password = Input::post('password');
            $email    = Input::post('email');

            // 重複チェック（ユーザー名）
            if (\Model\Users::exists($username)) {
                Session::set_flash('error', 'そのユーザー名は既に使用されています。');
                return Response::redirect('login/newaddition');
            }

            try {
                \Model\Users::create($username, $password, $email);
                Session::set_flash('success', 'ユーザー登録成功！');
                return Response::redirect('login/index');
            } catch (SimpleUserUpdateException $e) {
                Session::set_flash('error', 'ユーザー作成エラー: ' . $e->getMessage());
                return Response::redirect('login/newaddition');
            }
        } else {
            $errors = implode("<br>", array_map(function($e) { return $e->get_message(); }, $val->error()));
            Session::set_flash('error', $errors);
            return Response::redirect('login/newaddition');
        }
    }

    public function action_delete($user_id)
    {
        try {
            \Model\Users::remove($user_id);
            Session::set_flash('success', 'ユーザー削除成功！');
        } catch (Exception $e) {
            Session::set_flash('error', '削除エラー: ' . $e->getMessage());
        }
        return Response::redirect('login/index');
    }

    public function action_login()
    {
        $username = Input::post('username');
        $password = Input::post('password');

        if (Auth::login($username, $password)) {
            Session::set_flash('success', 'ログイン成功！');
            return Response::redirect('home/index');
        } else {
            Session::set_flash('error', 'ログイン失敗。');
            return Response::redirect('login/index');
        }
    }

    public function action_logout()
    {
        Auth::logout();
        Session::set_flash('success', 'ログアウトしました。');
        return Response::redirect('login/index');
    }
}