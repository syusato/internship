<?php
use \Model\Users;

class Controller_Login extends Controller
{
    public function action_index()
    {
        return View::forge('login/index');
    }

    public function action_newaddition()
    {
        return View::forge('login/newaddition');
    }

    

    public function action_auth()
    {

        if (Input::method() === 'POST') {
            // バリデーションインスタンス作成
            $val = Validation::forge();

            // ルール定義
            $val->add('username', 'ユーザ名')
                ->add_rule('required')
                ->add_rule('min_length', 3)
                ->add_rule('max_length', 20);

            $val->add('password', 'パスワード')
                ->add_rule('required')
                ->add_rule('min_length', 6);

            // バリデーション実行
            if ($val->run()) {
                // 入力取得
                $username = Input::post('username');
                $password = Input::post('password');

                \Log::debug("ログイン試行: username={$username}, password={$password}", __METHOD__); // 🔥 ログ追加

                if (Auth::login($username, $password)) {
                    \Log::debug('ログイン成功！', __METHOD__);  // ログ追加
                    Session::set_flash('success', 'ログイン成功！');
                    Response::redirect('home/index');
                } else {
                    \Log::debug('ログイン失敗', __METHOD__);  // ログ追加
                    Session::set_flash('error', 'ユーザ名またはパスワードが違います');
                    Response::redirect('login/index');
                }

            } else {
                // エラーメッセージ表示
                Session::set_flash('error',(array) $val->error());
                Response::redirect('login/index');
            }

        } else {
            Response::redirect('login/index');
        }
    }

    public function action_logout()
    {
        Auth::logout();
        Session::set_flash('success', 'ログアウトしました');
        Response::redirect('login/index');
    }


}