<?php
use \Model\Users;

class Controller_Login extends Controller
{
    //初期ログイン画面
    public function action_index()
    {
        return View::forge('login/index');
    }

    //ユーザー登録画面
    public function action_newaddition()
    {
        return View::forge('login/newaddition');
    }
}