<?php
namespace Model;

class Users extends \Model
{
    public static function create($username, $password, $email)
    {
        return \Auth::create_user($username, $password, $email);
    }

    public static function remove($user_id)
    {
        $user = \Auth::get_user_id($user_id);
        if ($user) {
            return \Auth::delete_user($user_id);
        }
        throw new \Exception('ユーザーが存在しません');
    }

    public static function exists($username)
    {
        return (bool) \DB::select()->from('users')->where('username', '=', $username)->execute()->count();
    }

}
