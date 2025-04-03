<?php

//事前ログインチェック（beforeメソッド）
class Controller_Base extends Controller
{
    // review: good
    // Baseコントローラーを作って継承して使っているのいいね！
    public function before()
    {
        parent::before();

        if (!Auth::check()) {
            \Response::redirect('/login/index');
        }
    }
}
