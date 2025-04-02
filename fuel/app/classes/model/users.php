<?php
namespace Model;

class Users extends \Model
{
   
    // ユーザー情報取得
    public static function select($id)
    {
        $result = \DB::select('*')
        ->from('users')
        ->where('id', '=', $id)
        ->execute()
        ->as_array();

        return $result;
    }


    // 新規登録
    public static function insert()
    {
        $username = \Input::post('username');
        $password = \Input::post('password');
        $email = \Input::post('email');

        try {
            $user_id = \Auth::create_user($username, $password, $email);
            \Session::set_flash('success', 'ユーザー登録成功！');
            \Response::redirect('login/index');
        } catch (SimpleUserUpdateException $e) {
            \Session::set_flash('error', 'ユーザー作成エラー: ' . $e->getMessage());
            \Response::redirect('login/newaddition');
        }

        $result = \DB::select('*')
        ->from('users')
        ->where('username', '=', $username)
        ->where('password', '=', $password)
        ->where('email', '=', $email)
        ->execute()
        ->as_array();

        return $result;
    }


    // ログイン
    public static function login()
    {
        $username = Input::post('username');
        $password = Input::post('password');

        $result = DB::select('*')
        ->from('users')
        ->where('username', '=', $username)
        ->where('password', '=', $password)
        ->execute()
        ->as_array();

        return $result;
  }


    // 更新
    public static function update($id)
    {
        DB::update('users')
        ->set(array(
        'username' => Input::post('username'),
        'password' => Input::post('password'),
        'email' => Input::post('email')
        ))
        ->where('id', '=', $id)
        ->execute();

        return;
  }


    // 削除
    public static function delete($id)
    {
        DB::delete('users')
        ->where('id', '=', $id)
        ->execute();

        return;
    }

    
}